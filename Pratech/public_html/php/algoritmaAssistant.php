<?php
// Include the database connection file
require_once 'db_connect.php';

//Function to search data jadwal with the same nim
function getNamaPrak($nim) {
    global $conn;
    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT nama_prak, jadwal_kuliah FROM hasil_ag_asisten WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim); // Assuming 'nim' is of string type

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();

        $data = array(
            'nama_prak' => $row['nama_prak'],
            'jadwal_kuliah' => $row['jadwal_kuliah']
        );

        return $data;
    }

    return null; // Return null if no matching data is found
}

// Function to search data by nama_prak and retrieve the total data and jadwal_kuliah
function getNamaPrakData($nama_prak) {
    global $conn;
    
    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT jadwal_kuliah FROM hasil_ag_asisten WHERE nama_prak = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama_prak); // Assuming 'nama_prak' is of string type

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();

    $jadwal_kuliah_data = array(); // Initialize an empty array

    if ($result->num_rows > 0) {
        // Fetch all rows
        while ($row = $result->fetch_assoc()) {
            $jadwal_kuliah_data[] = $row['jadwal_kuliah'];
        }
    }

    $data = array(
        'nama_prak' => $nama_prak,
        'jadwal_kuliah' => $jadwal_kuliah_data
    );

    return $data;
}

//Function to find the available shift based on overal jadwal Kuliah each assistant
function availableShift($jadwalKuliah,$shiftNumber) {
    $freeShift = array_fill(0, $shiftNumber, 0); // Initialize $freeShift with all values as 0

    $totalArrays = count($jadwalKuliah); // Get the total number of arrays in $jadwalKuliah

    foreach ($jadwalKuliah as $shift) {
        for ($i = 0; $i < $shiftNumber; $i++) {
            if ($shift[$i] == 0) {
                $freeShift[$i]++; // Increment the count if the value is 0
            }
        }
    }
    
    for ($i = 0; $i < $shiftNumber; $i++) {
        if ($freeShift[$i] < 1) {
            $freeShift[$i] = 1; // Set the value to 1 if the count of 0s is less than 4
        } else {
            $freeShift[$i] = 0; // Set the value to 0 if the count of 0s is equal to or greater than 4
        }
    }

    return $freeShift;
}

//function for excluding user's schedule
function excludeUsers($freeShift,$jadwalKuliahUser) {
    $jadwalKuliah = str_split($jadwalKuliahUser);
    $free = [];

    foreach ($freeShift as $index => $bit) {
        foreach ($jadwalKuliah as $indexs => $value){
            if ($jadwalKuliah[$index] == 0) {
                $free[$index] = $bit;
            }
        }

    }
    return $free;
}


//function for separating the zeros from the ones
function separateZero($freeShift) {

    $jadwal = $freeShift;
    $free = [];

    foreach ($jadwal as $index => $bit) {
        if ($bit == 0) {
            $free[$index] = $bit;
        }
    }
    return $free;
}


//------------------------------------Genetic Algorithm-----------------------------------------
// Function to generate a chromosome with the exact number of 1
function generateChromosome($freeShiftZero,$averageTeachCount) {
    $chromosome = array_fill_keys(array_keys($freeShiftZero), 0); // Initialize chromosome with all 0s

    $onesCount = 0;

    while ($onesCount < $averageTeachCount) {
        $index = array_rand($freeShiftZero); // Choose a random index from the $free array

        if ($chromosome[$index] === 0) {
            $chromosome[$index] = 1; // Set the value at the index to 1
            $onesCount++; // Increment the counter
        }
    }
    return $chromosome;
}

//Function for generating population from chromosome
function generatePopulation($freeShiftZero,$averageTeachCount,$populationSize){
    $population = [];

    // Generate and add chromosomes to the population
    for ($i = 0; $i < $populationSize; $i++) {
        $chromosome = generateChromosome($freeShiftZero, $averageTeachCount);
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

        // Apply penalty if there there's more 1 in 1 day
        if ($rangeCount > 2) {
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

//Function to do Selection from the population based on their fitness values
function performSelection($population, $fitnessValues, $threshold) {
    // Initialize selected individuals array
    $selectedIndividuals = [];

    // Select individuals based on fitness threshold
    foreach ($fitnessValues as $index => $fitness) {
        if ($fitness['fitness'] >= $threshold) {
            $selectedIndividuals[] = $population[$index];        }
    }

    // Randomly select two individuals
    $randomKeys = array_rand($selectedIndividuals, 2);
    $selected = [];
    foreach ($randomKeys as $key) {
        $selected[] = $selectedIndividuals[$key];
    }

    return $selected;
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


// Function to get the existing data ngajar in database
function getDataNgajar($nama_prak, $mutated) {
    global $conn;

    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT jadwal_ngajar FROM hasil_ag_asisten WHERE nama_prak = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama_prak);

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();
    $jadwal_ngajar_data = array();

    if ($result->num_rows > 0) {
        // Fetch all rows
        while ($row = $result->fetch_assoc()) {
            if (!empty($row['jadwal_ngajar'])) {
                $jadwal_ngajar_data[] = $row['jadwal_ngajar'];
            }
        }
    }

    $data = array(
        'nama_prak' => $nama_prak,
        'jadwal_ngajar' => $jadwal_ngajar_data
    );

    //Convert Data to be usabble
    $converted_data=[];

    // Access the 'jadwal_ngajar' data from the returned array
    $jadwal_ngajar_data = $data['jadwal_ngajar'];

    // Display the 'jadwal_kuliah' values
    foreach ($jadwal_ngajar_data as $jadwal_ngajar) {
        $data = str_split($jadwal_ngajar);
        $converted_data[] = $data;
    }

    // Re-index the array numerically
    $jadwalNgajar = $converted_data;
    return $jadwalNgajar;
}

//Count number of 1's in each index
function countOnesByIndex($jadwal){
    $countByIndex = array();
    foreach ($jadwal as $array) {
        foreach ($array as $index => $value) {
            if ($value == 1) {
                if (!isset($countByIndex[$index])) {
                    $countByIndex[$index] = 1;
                } else {
                    $countByIndex[$index]++;
                }
            }
        }
    }
    ksort($countByIndex);
    return $countByIndex;
}

//Function to check existing data ngajar
function convertDataNgajar($countOnes,$shiftNumber) {
    $converted = array();
        
    // Create a 24-bit array
    for ($i = 0; $i < $shiftNumber; $i++) {
        // Check if the value in $inputArray is greater than or equal to 4
        if (isset($countOnes[$i]) && $countOnes[$i] >= 4) {
            $converted[$i] = 1;
        } else {
            $converted[$i] = 0;
        }
    }
    return $converted;
}

//Function to find available indices within $binaryArray
function findAvailableIndices($converted, $mutatedChromosome,$shiftNumber)
{
    $availableIndices = array();

    for ($i = 0; $i < $shiftNumber; $i++) {
        $value = isset($mutatedChromosome[$i]) ? $mutatedChromosome[$i] : 1;
        $convertedValue = isset($converted[$i]) ? $converted[$i] : 1;

        // Check if either of the corresponding indices in $converted and $mutatedChromosome has a value of 1
        $availableIndices[$i] = ($convertedValue == 1 || $value == 1) ? 1 : 0;
    }

    return $availableIndices;
}

//Function to only take the index with value of 0
function separateIndices($availableIndices){
    //Take the index with the value of 0
    $indices = array_keys(array_filter($availableIndices, function ($value) {
        return $value == 0;
    }));
    return $indices;
}

//Function to convert 1's index as value
function convertValue($input){
    $output = [];

    foreach ($input as $index => $value) {
        if ($value === 1) {
            $output[] = $index;
        }
    }

    return $output;
}

//Function for convert to Value
function convertToValue($input){
    $output=[];

    foreach ($input as $index => $value){
        if ($value == 1){
            $output[] = $index;
        }
    }
    return $output;
}

//Function to convert into binary
function convertBinary($input){
    $output = [];
    for ($i = 0; $i <= 23; $i++) {
        if (in_array($i,$input)) {
            $output[$i]=1;
        }else{
            $output[$i] = 0;
        }
    }
    return $output;
}

//Function to find available indices within $binaryArray
function findAvailableIndice($converted, $mutatedChromosome,$shiftNumber)
{
    $availableIndices = array();

    for ($i = 0; $i < $shiftNumber; $i++) {
        $value = isset($mutatedChromosome[$i]) ? $mutatedChromosome[$i] : 1;
        $convertedValue = isset($converted[$i]) ? $converted[$i] : 1;

        // Check if either of the corresponding indices in $converted and $mutatedChromosome has a value of 1
        $availableIndices[$i] = ($convertedValue == 1 || $value == 1) ? 0 : 1;
    }

    return $availableIndices;
}

//Function to count how many value is in each range
function countRange($input,$ranges){
    foreach ($ranges as $range) {
        $count = 0;

        // Count the occurrences of values within the range
        foreach ($input as $value) {
            if ($value >= $range[0] && $value <= $range[1]) {
                $count++;
            }
        }
        $countRange[] = $count;
    }
    return $countRange;
}

//Function to filter the $yess Array
function filterYes($yes, $ranges, $countRange, $threshold) {
    $filteredYes = [];

    foreach ($ranges as $key => $range) {
        $count = $countRange[$key];

        if ($count < $threshold) {
            foreach ($yes as $value) {
                if ($value >= $range[0] && $value <= $range[1]) {
                    $filteredYes[] = $value;
                }
            }
        }
    }
    return $filteredYes;
}

//Function to apply logic 1 and logic 2
function checkAndModify($input, $ranges, $filteredYes, $not, $threshold, $countRange) {
    $output = $input;

    // Logic 1: Check if any values in $input are in $not
    foreach ($output as $index => $value) {
        if (in_array($value, $not) && !in_array($value, $filteredYes)) {
            if (count($filteredYes) < $threshold) {
                // Restart the process if the number of values in $filteredYes is insufficient
                return "insufficient";
            }
            $randomIndex = array_rand($filteredYes);
            $output[$index] = $filteredYes[$randomIndex];
            unset($filteredYes[$randomIndex]);
        }
    }

    // Logic 2: Apply threshold for values within ranges
    foreach ($ranges as $range) {
        $rangeCount = 0;
        $rangeIndices = [];

        foreach ($output as $index => $value) {
            if ($value >= $range[0] && $value <= $range[1]) {
                $rangeCount++;
                $rangeIndices[] = $index;
            }
        }

        if ($rangeCount > $threshold) {
            shuffle($rangeIndices);

            for ($i = $threshold; $i < $rangeCount; $i++) {
                if (count($filteredYes) < $threshold) {
                    // Restart the process if the number of values in $filteredYes is insufficient
                    return "insufficient";
                }
                $randomIndex = array_rand($filteredYes);
                $output[$rangeIndices[$i]] = $filteredYes[$randomIndex];
                unset($filteredYes[$randomIndex]);
            }
        }
    }
    return $output;
}

function fillArray($array){
    $completeArray = [];
    for ($i = 0; $i < 24; $i++) {
        if (isset($array[$i])) {
            $completeArray[$i] = $array[$i];
        } else {
            $completeArray[$i] = 0;
        }
    }
    return $completeArray;
}

//Fill the rest of array with 0
function fillArrayWithZeros(array $availableSchedules): array {
    $completeArray = [];
    for ($i = 0; $i < 24; $i++) {
        if (isset($availableSchedules[$i])) {
            $completeArray[$i] = $availableSchedules[$i];
        } else {
            $completeArray[$i] = 0;
        }
    }
    return $completeArray;
}


?>
