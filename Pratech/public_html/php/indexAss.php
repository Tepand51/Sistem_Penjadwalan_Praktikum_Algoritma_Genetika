<?php

//Start session to get session value
// session_start();
// $nim= $_SESSION['nim'];
// $name= $_SESSION['name'];
// $role= $_SESSION['role'];

$nim= 1102194122;
$role= "asisten";
$shiftNumber=12;
$prakNumber=120;

// Include the file containing the functions
require_once 'algoritmaAssistant.php';

//Step 1 : Call the function from test3.php and pass the variable
$dataPrak = getNamaPrak($nim);

    if ($dataPrak) {
        $nama_prak = $dataPrak['nama_prak'];
        $jadwal_kuliah = $dataPrak['jadwal_kuliah'];

        echo "Nama Prak: " . $nama_prak . "<br>";
        echo "Jadwal Kuliah: " . $jadwal_kuliah . "<br>";
    } else {
        echo "No matching data found.";
    }


//Step 2 : Call the function to retrieve the data
$data = getNamaPrakData($nama_prak);
    $converted_data=[];

    // Access the 'jadwal_kuliah' data from the returned array
    $jadwal_kuliah_data = $data['jadwal_kuliah'];

    // Display the 'jadwal_kuliah' values
    foreach ($jadwal_kuliah_data as $jadwal_kuliah) {
        $data = str_split($jadwal_kuliah);
        $converted_data[] = $data;
    }

    // Re-index the array numerically
    $jadwalKuliah = array_values($converted_data);

    // Count the total data
    $total_data = count($jadwalKuliah);

    // // Display the total data
    echo "<br>";
    print_r($jadwalKuliah);
    echo "<br><br>";
    echo "Jumlah Asisten : " . $total_data . "<br>";


// Step 3 : call function to generate freeshift
$freeShift = availableShift($jadwalKuliah,$shiftNumber);
    echo "<br>";
    echo "Jadwal Kosong bagi semua assistant :<br>";
    print_r($freeShift);


//Step 4 : call function to separate 0's values from 1's values
$freeShiftZero = separateZero($freeShift);
    echo "<br><br>";
    echo "Hasil pemisahan nilai 0 dari nilai 1 :<br>";
    print_r($freeShiftZero);

//Step 5 : get average teach time for each assistant depend on the number of assistant
    $assistantCount=$total_data;// Number of assistants
    $shiftCount = 4;// Number of shifts
    $days = 3;// Number of days
    $teachEachShift = 4;// Number of assistants required per shift
    $praktikanPershift = 16;//Number of assistant one shift can contain
    $totalShifts = $prakNumber / $praktikanPershift;// Calculate the total number of shifts
    $totalAssistantTimeneed = $totalShifts * $teachEachShift;

    // Calculate the average teach count per assistant
    $averageTeachCount = ceil($totalAssistantTimeneed / $assistantCount);
    
    echo "<br><br>";
    echo "Rata-rata jumlah ngajar per Asisten : ". $averageTeachCount;
    echo "<br>";

//Check if the value of average teach count is over the number of freeshift
if (count($freeShiftZero)<$averageTeachCount){
    $jsonData = json_encode(array('completeArray' => []));
    echo '<br>UNAVAILABLE SCHEDULE DETECTED';
    echo '<br>';
}else{
    //Just retry the code if something went wrong
    retryInsufficient :
    //Step 6 : Generating population
        $populationSize = 10;
        $population = generatePopulation($freeShiftZero, $averageTeachCount, $populationSize);

        //Display population
        echo "<br>Populasi : <br>";
        foreach ($population as $index => $chromosome) {
            echo "Chromosome " . ($index + 1) . ": ";
            print_r($chromosome);
            echo "<br>";
        }


    //Step 7 : EValuate Fitness
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


    //Step 8: Selection
        $threshold = 6;
        $selected = performSelection($population, $fitnessValues,$threshold);

        // Output the selected individual
        echo '<br>';
        echo 'Selected Individuals :<br>';
        // Display the selected individuals and their fitness values
        foreach ($selected as $index => $individual) {
            echo "<br>Individual: <br>";
            print_r($individual);
        }

    //step 9 : crossover
        $parent1 = $selected[0];
        $parent2 = $selected[1];
        $crossoverOffspring = performCrossover($parent1, $parent2);

        echo "<br> <br>";
        echo "Crossover :";
        echo "<br>Parent 1: <br>";
        print_r($parent1);
        echo "<br>Parent 2: <br>";
        print_r($parent2);
        echo "<br>";
        echo "Offspring: <br>";
        print_r($crossoverOffspring);


    //Step 10 : Mutation
        $mutationRate = 0.1; // Set the mutation rate to 10%
        $mutatedChromosome = performMutation($crossoverOffspring, $mutationRate);

        echo "<br><br>MUTATION :";
        echo "<br>Crossover Offspring: ";
        print_r($crossoverOffspring);
        echo "<br>";
        echo "Mutated Chromosome: ";
        print_r($mutatedChromosome);
        echo "<br>";

    //Step 11 : get existing schedule
        $mutated = $mutatedChromosome;
        $jadwalNgajar = getDataNgajar($nama_prak,$mutated);
        echo "<br>";
        echo "Data get from database : <br>";
        print_r($jadwalNgajar);
        echo "<br>";

    //Step 11.1 : Count the number of 1 in each index
        $countOnes = countOnesByIndex($jadwalNgajar);
        echo "<br>";
        echo "Ones count each Index : <br>";
        print_r($countOnes);
        echo "<br>";

    //Step 11.2 : Filter out variable into binary value
        $converted = convertDataNgajar($countOnes,$shiftNumber);
        echo "<br>";
        echo "Converted data ngajar: <br>";
        print_r($converted);
        echo "<br>";

    //Step 11.3 : find available indices
        $availableIndices = findAvailableIndices($converted, $mutatedChromosome,$shiftNumber);
        $Indices = separateIndices($availableIndices);

        echo "<br>";
        echo "Mutated Chromosome : <br>";
        print_r($mutatedChromosome);
        echo "<br><br>";
        echo "indices : <br>";
        print_r($availableIndices);
        echo "<br><br>";
        echo "Available Indices : <br>";
        print_r($Indices);
        echo "<br>";

    //Step 12 : Checking the algorithm schedule on available schedule
        $ranges = [[0, 3], [4, 7],[8, 11],[12,15],[16, 19],[20, 23]];
        $threshold = 2;
            echo "<br>input :<br>";
            print_r($mutatedChromosome);
            echo "<br>";
            echo "<br>not :<br>";
            print_r($converted);
            echo "<br>";
        
        $availableIndices = findAvailableIndice($converted,$mutatedChromosome,$shiftNumber);
            echo "<br>yes :<br>";
            print_r($availableIndices);
            echo "<br>";

        $mutatedChromosome = convertValue($mutatedChromosome);
            echo "<br>input 2 :<br>";
            print_r($mutatedChromosome);
            echo "<br>";

        $converted= convertValue($converted);
            echo "<br>not 2 :<br>";
            print_r($converted);
            echo "<br>";

        $available = convertValue($availableIndices);
            echo "<br>yes 2 :<br>";
            print_r($available);
            echo "<br>";
        
        $countRange = countRange($mutatedChromosome,$ranges);
            echo "<br>count Range :";
            print_r($countRange);
            echo "<br>";
        
        $filteredAvailable = filterYes($available, $ranges, $countRange, $threshold);
            echo "<br> filtered Yes :";
            print_r($filteredAvailable);
            echo "<br>";
        
        $output = checkAndModify($mutatedChromosome, $ranges, $filteredAvailable, $converted, $threshold, $countRange);
        //Check if the available is insufficient
        if ($output=="insufficient"){
            echo "<br>";
            echo "IT IS INSUFFICIENT FOR FILTEREDYES";
            goto retryInsufficient;
        }else{
            $countRange = countRange($output,$ranges);
            echo "<br> count Range :";
            print_r($countRange);
            echo "<br>";
            echo "<br> filtered Yes :";
            print_r($filteredAvailable);
            echo "<br>";
        
            echo "<br> output :";
            print_r($output);
            echo "<br>";
        
            $outputs = convertBinary($output);
            echo "<br>output :";
            print_r($outputs);
            echo "<br>";
        }
            
        
}



?>

