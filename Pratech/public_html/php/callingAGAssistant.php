<?php
//Start session to get session value
session_start();
$nim= $_SESSION['nim'];
$name= $_SESSION['name'];
$role= $_SESSION['role'];

$shiftNumber=24;
$prakNumber=200;
$populationSize = 100;

//Peusdocode Algoritma Asisten

// Include the file containing the functions
require_once 'algoritmaAssistant.php';

//Step 1 : Call the function from test3.php and pass the variable
    $dataPrak = getNamaPrak($nim);
        $nama_prak = $dataPrak['nama_prak'];
        $jadwalKuliahUser = $dataPrak['jadwal_kuliah'];

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

// Step 3 : call function to generate freeshift
    $freeShift = availableShift($jadwalKuliah,$shiftNumber);

//Step 3.5 : Call function to exclude user's schedule
    $freeShiftUser = excludeUsers($freeShift, $jadwalKuliahUser);

//Step 4 : call function to separate 0's values from 1's values
    $freeShiftZero = separateZero($freeShiftUser);


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

//Check if the value of average teach count is over the number of freeshift
if (count($freeShiftZero)<$averageTeachCount){
    $jsonData = json_encode(array('completeArray' => []));

}else{
    retryInsufficient:
    //Step 6 : Generating population
        $population = generatePopulation($freeShiftZero, $averageTeachCount, $populationSize);

    //Step 7 : EValuate Fitness
        $fitnessValues = evaluatePopulationFitness($population);

        

    //Step 8: Selection
        $threshold = 6;
        $selected = performSelection($population, $fitnessValues,$threshold);

    //step 9 : crossover
        $parent1 = $selected[0];
        $parent2 = $selected[1];
        $crossoverOffspring = performCrossover($parent1, $parent2);

    //Step 10 : Mutation
        $mutationRate = 0.5; // Set the mutation rate to 10%
        $mutatedChromosome = performMutation($crossoverOffspring, $mutationRate);

    //Step 11 : get existing schedule
        $mutated = $mutatedChromosome;
        $jadwalNgajar = getDataNgajar($nama_prak,$mutated);

    //Step 11.1 : Count the number of 1 in each index
        $countOnes = countOnesByIndex($jadwalNgajar);

    //Step 11.2 : Filter out variable into binary value
    $converted = convertDataNgajar($countOnes,$shiftNumber);

    //Step 11.3 : find available indices
        $availableIndices = findAvailableIndices($converted, $mutatedChromosome,$shiftNumber);
        $Indices = separateIndices($availableIndices);

    //Step 12 : Checking the algorithm schedule on available schedule
        $ranges = [[0, 3], [4, 7],[8, 11],[12,15],[16, 19],[20, 23]];
        $threshold = 2; //Max teach each day
        
        //Find available index/key and put it in an array
        $availableIndices = findAvailableIndice($converted,$mutatedChromosome,$shiftNumber);

        //Convert keys array into value, tobe usable
        $mutatedChromosome = convertValue($mutatedChromosome); //For mutated chromosome
        $converted= convertValue($converted); //For unavailable schedule
        $available = convertValue($availableIndices); 
        
        //Find how many value in each range [0,3][4,7], ..
        $countRange = countRange($mutatedChromosome,$ranges);
        
        //Find available value filtered without range that has exeed threshold
        $filteredAvailable = filterYes($available, $ranges, $countRange, $threshold);

        //Check and modify the mutated chromosome with each unavailable and available value
        $output = checkAndModify($mutatedChromosome, $ranges, $filteredAvailable, $converted, $threshold, $countRange);
                //In case the FIlteredYes is Insufficient
                if ($output=="insufficient"){
                    goto retryInsufficient;
                }else{
                //Step 14 : Send Output to client side
                    // Create an associative array with the variables
                        $data=array(
                            'completeArray'=>$output,
                        );
            
                    // Convert the array to JSON
                        $jsonData = json_encode($data);
                        
            
                    // Set the response headers to indicate JSON
                        header('Content-Type: application/json');
                }
}

// Last Step : Transfer Data to web page
    echo $jsonData;
?>

