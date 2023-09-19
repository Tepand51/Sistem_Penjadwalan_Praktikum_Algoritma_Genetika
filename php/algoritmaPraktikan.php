<?php
// Include the database connection file
require_once 'db_connect.php';

// Function to get data based on nim
function getJadwalKuliah($nim) {
    global $conn; // Access the database connection

    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT nim, jadwal_kuliah, tipe_prak, jadwal_prak FROM hasil_ag WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nim);

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();
    $data = array(); // Initialize an empty array

    if ($result->num_rows > 0) {
        // Store data in the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Close the prepared statement
    $stmt->close();

    return $data;
}

// Function to get nama_prak values from the 'praktikum' table based on tipe_prak
function getNamaPrak($tipePrakValue) {
    global $conn; // Access the database connection

    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT nama_prak FROM praktikum WHERE tipe_prak = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tipePrakValue); // Assuming 'tipe_prak' is of string type

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();
    $namaPrakData = array(); // Initialize an empty array

    if ($result->num_rows > 0) {
        // Store nama_prak values in the array
        while ($row = $result->fetch_assoc()) {
            $namaPrakData[] = $row["nama_prak"];
        }
    }
    return $namaPrakData;
}

function putKeyOnName($mutated, $namaPrakData)
{
    $modified = [];

    $mutatedKeys = array_keys($mutated, 1);
    $namaPrakDataValues = array_values($namaPrakData);

    foreach ($mutatedKeys as $index => $value) {
        if (isset($namaPrakDataValues[$index])) {
            $modified[$value] = $namaPrakDataValues[$index];
        }
    }
    return $modified;
}

//FUnction to separatre Free shcedule
function findArray($jadwalKuliah,$pracCount) {

    $jadwal = $jadwalKuliah;
    $class = [];
    $free = [];

    foreach ($jadwal as $index => $bit) {
        if ($bit == 1) {
            $class[$index] = $bit;
        } elseif ($bit == 0) {
            $free[$index] = $bit;
        }
    }


    // Replace values at random positions of 0s in the $free array with 1s
    $numReplacements = $pracCount;
    $zeroKeys = array_keys($free);

    if ($numReplacements <= count($zeroKeys)) {
        $replacementIndices = array_rand($free, $numReplacements); // Randomly select positions to replace
        $replacementIndices = is_array($replacementIndices) ? $replacementIndices : [$replacementIndices]; // Ensure it's an array even for single replacement
        foreach ($replacementIndices as $index) {
            $free[$index] = 1; // Replace the value at the position with 1
        }
    }
    return $free;

}

//Function to count how many free schedule
function countFreeTime($free) {
    $freeCount = 0;
    foreach ($free as $value) {
        if ($value === 1 || $value === 0) {
            $freeCount++;
        }
    }
    return $freeCount;
}

// Function to generate a chromosome with exactly 3 1s based on the previous $free input
function generateChromosome($free,$pracCount) {
    $chromosome = array_fill_keys(array_keys($free), 0); // Initialize chromosome with all 0s

    $onesCount = 0; // Counter for the number of 1s generated

    while ($onesCount < $pracCount) {
        $index = array_rand($free); // Choose a random index from the $free array

        if ($chromosome[$index] === 0) {
            $chromosome[$index] = 1; // Set the value at the index to 1
            $onesCount++; // Increment the counter
        }
    }

    return $chromosome;
}

function generatePopulation($free,$pracCount,$populationSize){
    $population = [];

    // Generate and add chromosomes to the population
    for ($i = 0; $i < $populationSize; $i++) {
        $chromosome = generateChromosome($free, $pracCount);
        $population[] = $chromosome;
    }

    // Return the population array
    return $population;
}

// Function to evaluate the fitness of a chromosome based on index positions and ranges
function evaluateFitness($chromosome) {
    $fitness = 0;

    // Define the ranges
    $ranges = [
        [0, 3],
        [4, 7],
        [8, 11],
        [12, 15],
        [16, 19], 
        [20, 23]
    ];

    $rangePenalty = 1; // Penalty value for two 1's within the same range

    // Iterate over the ranges
    foreach ($ranges as $range) {
        $rangeStart = $range[0];
        $rangeEnd = $range[1];

        $rangeCount = 0; // Counter for the number of 1's within the range

        // Check if the chromosome has 1's within the range
        foreach ($chromosome as $index => $bit) {
            if ($bit === 1 && $index >= $rangeStart && $index <= $rangeEnd) {
                $rangeCount++; // Increment the counter
            }
        }

        // Apply penalty if there are two 1's within the same range
        if ($rangeCount >= 2) {
            $fitness += 1 - $rangePenalty;
        } else {
            $fitness += 1;
        }
    }

    return $fitness;
}

// Function to evaluate the fitness values for the entire population
function evaluatePopulationFitness($population) {
    $fitnessValues = [];

    foreach ($population as $index =>$chromosome) {
        $fitness = evaluateFitness($chromosome);
        $fitnessValues[] = ['index' => $index, 'chromosome' => $chromosome, 'fitness' => $fitness];
    }

    return $fitnessValues;
}

// Function to perform roulette wheel selection
function performSelection($population, $fitnessValues) {
    $totalFitness = array_sum($fitnessValues);

    // Calculate selection probabilities based on fitness values
    $selectionProbabilities = [];
    $totalFitness = array_sum(array_column($fitnessValues, 'fitness')); // Calculate the total fitness

    // To avoid zero fitness probability
    if ($totalFitness != 0) {
        foreach ($fitnessValues as $value) {
            $fitness = $value['fitness'];
            $probability = $fitness / $totalFitness;
            $selectionProbabilities[] = $probability;
        }
    } else {
        $equalProbability = 1 / count($fitnessValues);
        $selectionProbabilities = array_fill(0, count($fitnessValues), $equalProbability);
    }
    

    // Perform roulette wheel selection to choose two individuals
    $selectedIndividuals = [];
    for ($i = 0; $i < 2; $i++) {
        $rouletteValue = mt_rand() / mt_getrandmax(); // Generate a random value between 0 and 1

        $sum = 0;
        $selectedIndividualIndex = null;

        // Find the individual based on the roulette value
        foreach ($selectionProbabilities as $index => $probability) {
            $sum += $probability;
            if ($rouletteValue <= $sum) {
                $selectedIndividualIndex = $index;
                break;
            }
        }

        // Add the selected individual to the list
        $selectedIndividuals[] = $population[$selectedIndividualIndex];
    }

    return $selectedIndividuals;
}

// Function to perform crossover between two parent chromosomes
function performCrossover($parent1, $parent2) {
    $offspring = [];
    $keys = array_keys($parent1);
    $minOnes = min(countOnes($parent1), countOnes($parent2));

    // Uniform Crossover
    do {
        $offspring = [];
        
        // Iterate through each key in the chromosomes
        foreach ($keys as $key) {
            // Compare the corresponding bits in both parents
            if ($parent1[$key] === $parent2[$key]) {
                // If the bits are the same, add the bit to the offspring
                $offspring[$key] = $parent1[$key];
            } else {
                // If the bits are different, randomly select one of the bits
                $randomBit = mt_rand(0, 1);
                $offspring[$key] = $randomBit;
            }
        }
    } while (countOnes($offspring) !== $minOnes);

    return $offspring;
}

// Function to count the number of 1's in a chromosome
function countOnes($chromosome) {
    $count = 0;
    foreach ($chromosome as $bit) {
        if ($bit === 1) {
            $count++;
        }
    }
    return $count;
}

// Function to perform mutation on an individual chromosome
function performMutation($chromosome, $mutationRate) {
    $mutatedChromosome = $chromosome;

    // Iterate through each key (position) in the chromosome
    foreach ($mutatedChromosome as $key => $bit) {
        // Generate a random number between 0 and 1
        $randomNumber = mt_rand() / mt_getrandmax();

        // Check if the random number is less than the mutation rate
        if ($randomNumber < $mutationRate) {
            // Perform mutation by swapping the bit at the current position with a random bit
            $randomPosition = array_rand($mutatedChromosome);
            $temp = $mutatedChromosome[$key];
            $mutatedChromosome[$key] = $mutatedChromosome[$randomPosition];
            $mutatedChromosome[$randomPosition] = $temp;
        }
    }

    return $mutatedChromosome;
}

// Function to get data from the 'kuota_prak' table and update the binary array
function getKuotaPrakData($namaPrak = null) {
    global $conn; // Access the database connection

    // Prepare the SQL query
    $sql = "SELECT nama_prak, hari, shift, kuota FROM kuota_prak";

    // Add filter for the 'nama_prak' column if provided
    if ($namaPrak !== null) {
        $filterValues = array_values($namaPrak);
        $filterValues = implode("', '", $filterValues);
        $sql .= " WHERE nama_prak IN ('$filterValues')";
    }

    // Execute the query
    $result = $conn->query($sql);

    $binaryArray = array_fill(0, 24, 1); // Initialize a 24-length binary array

    if ($result->num_rows > 0) {
        // Update the binary array based on the retrieved data
        while ($row = $result->fetch_assoc()) {
            if ($row['kuota'] > 1) {
                $index = getArrayIndex($row['hari'], $row['shift']);
                $binaryArray[$index] = 0;
            }
        }
    }

    return $binaryArray;
}

// Function to get the index in the binary array based on day and shift
function getArrayIndex($hari, $shift) {
    $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
    $hariIndex = array_search($hari, $days);
    $shiftIndex = $shift - 1;
    return ($hariIndex * 4) + $shiftIndex;
}

//========================================================================================

function checkAndModifyBinaryArray($filterValues, &$usedIndices)
{
    $modified = []; // Initialize the modified array
    
    foreach ($filterValues as $index => $namaPrak) {
        $binaryArray = getKuotaPrakData([$index => $namaPrak]); //Get the binary with available kuota from database
        $availableIndices = findAvailableIndices($binaryArray, $usedIndices); // Get the available indices

        //Checking if the availableIndices is empty
        if (empty($availableIndices)) {
            // If the availableIndices array is empty, skip processing the rest of the data
            $modified = []; // Set the modified array as empty
            break; // Exit the loop

        }else{
            if ($binaryArray[$index] === 1) {
                $randomIndex = array_rand($availableIndices); // Randomly select an index from the available indices
                $modified[$availableIndices[$randomIndex]] = $namaPrak; // Change the key to the randomly selected index
                $usedIndices[] = $availableIndices[$randomIndex]; // Add the randomly selected index to usedIndices
                unset($availableIndices[$randomIndex]); // Remove the used index from the available indices
                
            }else {
                // Value doesn't need to be modified, but still check used indices
                if (!in_array($index, $usedIndices)) {
                    $modified[$index] = $namaPrak; // Add the value to the modified array
                    $usedIndices[] = $index; // add it to usedIndices
    
                }
                else {
                    $randomIndex = array_rand($availableIndices); // Randomly select an index from the available indices
                    $modified[$availableIndices[$randomIndex]] = $namaPrak; // Change the value of the key to the randomly selected index
                    $usedIndices[] = $availableIndices[$randomIndex]; // Add the randomly selected index to usedIndices
                    unset($availableIndices[$randomIndex]); // Remove the used index from the available indices
                }
            }

        }

    }

    return $modified;
}

//Function to find available indices within $binaryArray
function findAvailableIndices($binaryArray, $usedIndices)
{
    $availableIndices = [];
    foreach ($binaryArray as $index => $value) {
        if ($value === 0 && !in_array($index, $usedIndices)) {
            $availableIndices[] = $index;
        }
    }
    return $availableIndices;
}

//Function to add unavailable schedule to usedIndices
function addUsedIndices($availableKuota){
    $fullIndices = range(0, 23);
    $missingIndices = array_diff($fullIndices, array_keys($availableKuota));
    return array_values($missingIndices);
}

//Fill the rest of array with 0
function fillArrayWithZeros(array $mutatedchromosome): array {
    $completeArray = [];
    for ($i = 0; $i < 24; $i++) {
        if (isset($mutatedchromosome[$i])) {
            $completeArray[$i] = $mutatedchromosome[$i];
        } else {
            $completeArray[$i] = 0;
        }
    }
    return $completeArray;
}

//Fill the other index other than the chromosome as 0
function fillArrayPrak(array $modified): array {
    $completeArray = [];
    for ($i = 0; $i < 24; $i++) {
        if (isset($modified[$i])) {
            $completeArray[$i] = 1;
        } else {
            $completeArray[$i] = 0;
        }
    }
    return $completeArray;
}

?>