<?php
echo "RUNDOWN PROSES ALGORITMA <br>";
//Start session to get session value
// session_start();
$nim= 1103210207;
$role= "praktikan";
$shiftNumber=12;
$populationSize = 10;

//step -1 : get jadwal data from database
require_once 'algoritmaPraktikan.php';

    // Get data from function in getjadwalkuliah.php
    $data = getJadwalKuliah($nim);
    
    // Process the data
    if (!empty($data)) {
        $row = $data[0];

        $nimValue = $row["nim"];
        $jadwalKuliahValue = $row["jadwal_kuliah"];
        $tipePrakValue = $row["tipe_prak"];
        $jadwalPrakValue = $row["jadwal_prak"];
    }

    //get data praktikum from getJadwalPrak.php
    $namaPrakValues = getNamaPrak($tipePrakValue);
    $totalPrak = count($namaPrakValues);

    //Display data retrieved
    echo "NIM: " . $nimValue . "<br>";
    echo "Jadwal Kuliah: " . $jadwalKuliahValue . "<br>";
    echo "Tipe Praktikum: " . $tipePrakValue . "<br>";
    echo "Jumlah Praktikum yang diambil : ".$totalPrak ."<br> <br>";
    echo "List Nama praktikum yang diambil : <br>";

    print_r($namaPrakValues);
    echo "<br>";

    // Process the nama_prak values
    if (!empty($namaPrakValues)) {
        foreach ($namaPrakValues as $namaPrak) {
            echo "Nama Prak: " . $namaPrak . "<br>";
        }
    } else {
        echo "No nama prak found.";
    }
    echo "<br>";


// Step 0 : Convert data to be usable
    $jadwalKul = str_split($jadwalKuliahValue);
    $pracCount = $totalPrak;

    //Display Jadwal Kuliah Binary
    echo "Jadwal Kuliah : <br>";
    print_r($jadwalKul);
    echo '<br>';

// Step 1 : Find Array of zeros
    $free = findArray($jadwalKul,$pracCount);

    // Output
    echo '<br>Devided Free schedule :<br>';
    print_r($free);
    echo '<br>';

//Step 4 : Cheking how many available Free Schedule
    $freeCount = countFreeTime($free);

    //Checking if the number of available shift is bigger than the number of praktikum
    if($freeCount<$totalPrak){
        echo '<br>UNAVAILABLE SCHEDULE DETECTED';
        echo '<br>';
    }else{
        // Step 2: Chromosome Generation
            $population = generatePopulation($free, $pracCount, $populationSize);

            //Output the population
            echo "<br>Population: <br>";
            foreach ($population as $index => $chromosome) {
                echo "Chromosome " . ($index + 1) . ": ";
                print_r($chromosome);
                echo "<br>";
            }
            echo '<br>';


        // Step 3: Fitness Evaluation
            $fitnessValues = evaluatePopulationFitness($population);

            // Output the fitness values (count the existing zeros)
            echo "Fitness Values:\n";
            echo '<br>';
            foreach ($fitnessValues as $value) {
                echo "Chromosome Index: " . $value['index'] . "\n";
                echo "Chromosome: ";
                foreach ($value['chromosome'] as $index => $bit) {
                    echo $index . "=>" . $bit . " ";
                }
                echo "\n";
                echo "Fitness: " . $value['fitness'] . "\n";
                echo '<br>';
            }

        // step 4 :selection
            $selectedIndividual = performSelection($population, $fitnessValues);

            // Perform roulette wheel selection
            $selectedIndividual = performSelection($population, $fitnessValues);

            // Output the selected individual
            echo '<br><br>';
            echo 'Selected Individuals :<br>';
            print_r($selectedIndividual);


        // step 5 : Crossover
            $parent1 = $selectedIndividual[0];
            $parent2 = $selectedIndividual[1];
            $crossoverOffspring = performCrossover($parent1, $parent2);

            echo "<br> <br>";
            echo "Crossover :";
            echo "<br>Parent 1: ";
            print_r($parent1);
            echo "<br>Parent 2: ";
            print_r($parent2);
            echo "<br>";
            echo "Offspring: ";
            print_r($crossoverOffspring);

        // step 6 : Mutation
            $mutationRate = 0.1; // Set the mutation rate to 10%
            $mutatedChromosome = performMutation($crossoverOffspring, $mutationRate);
            
            echo "<br><br>MUTATION :";
            echo "<br>Crossover Offspring: ";
            print_r($crossoverOffspring);
            echo "<br>";
            echo "Mutated Chromosome: ";
            print_r($mutatedChromosome);
            echo "<br>";

        // step 7 : Checking the kuota value of the shift
            $usedIndices = addUsedIndices($mutatedChromosome);
            echo "<br>Used Indices Array: ";
            echo "<br>";
            print_r($usedIndices);
            echo "<br>";

            $namaPrakData = getNamaPrak($tipePrakValue);
            echo "<br>Nama-nama Prak : <br>";
            print_r($namaPrakData);
            echo "<br>";
            
            $keyPrak = putKeyOnName($mutatedChromosome, $namaPrakData);
            echo "<br>key on mutated : <br>";
            print_r($keyPrak);
            echo "<br>";

            // Iterate over each input in $namaPrak and call getKuotaPrakData() function
            foreach ($keyPrak as $index => $namaPrak) {
                $availableKuota = getKuotaPrakData([$index => $namaPrak]);

                // Display the modified values for each input
                echo "<br>Binary for $namaPrak: ";
                echo "<br>";
                print_r($availableKuota);
                echo "<br>";
            }

            // Example usage

            $modified = checkAndModifyBinaryArray($keyPrak, $usedIndices);

            // Display the usedIndices and modified array
            echo "<br>Used Indices Array: ";
            echo "<br>";
            print_r($usedIndices);
            echo "<br><br>Modified Array: ";
            echo "<br>";
            print_r($modified);
            echo "<br>";


            if(empty($modified)){
                echo '<br>UNAVAILABLE INDICES OCCURED';
                echo '<br>';
            }else{
                // step  : Filling the missing array back
                $completeArray = fillArrayPrak($modified,$shiftNumber);
                echo "<br> Completed Chedule : <br>";
                print_r($completeArray);

                }
                
    }


?>
