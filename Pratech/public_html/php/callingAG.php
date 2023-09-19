<?php
//Start session to get session value
session_start();
$nim= $_SESSION['nim'];
$name= $_SESSION['name'];
$role= $_SESSION['role'];


//step 1 : get jadwal data from database
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


// Step 2 : Convert data to be usable
    $jadwalKul = str_split($jadwalKuliahValue);
    $pracCount = $totalPrak;

// Step 3 : Find Array of zeros
    $free = findArray($jadwalKul,$pracCount);

//Step 4 : Cheking how many available Free Schedule
    $freeCount = countFreeTime($free);
    
    //Checking if the number of available shift is bigger than the number of praktikum
    if($freeCount<$totalPrak){
        $jsonData = json_encode(array('completeArray' => []));
    }else{
        // Step 5: Chromosome Generation
            $populationSize = 100;
            $population = generatePopulation($free, $pracCount, $populationSize);

        // Step 6 : Fitness Evaluation
            $fitnessValues = evaluatePopulationFitness($population);

        // step 7 :selection
            $selectedIndividual = performSelection($population, $fitnessValues);

            // Perform roulette wheel selection
            $selectedIndividual = performSelection($population, $fitnessValues);

        // step 8 : Crossover
            $parent1 = $selectedIndividual[0];
            $parent2 = $selectedIndividual[1];
            $crossoverOffspring = performCrossover($parent1, $parent2);

        // step 9 : Mutation
            $mutationRate = 0.5; // Set the mutation rate to 10%
            $mutatedChromosome = performMutation($crossoverOffspring, $mutationRate);

        // step 10 : Checking the kuota value of the shift
            $usedIndices = addUsedIndices($mutatedChromosome);//Putting unavailable shift on usedIndices
            $namaPrakData = getNamaPrak($tipePrakValue);
            $keyPrak = putKeyOnName($mutatedChromosome, $namaPrakData);

            // Iterate over each input in $namaPrak and call getKuotaPrakData() function
            foreach ($keyPrak as $index => $namaPrak) {
                $availableKuota = getKuotaPrakData([$index => $namaPrak]);
            }

            // Usage
            $modified = checkAndModifyBinaryArray($keyPrak, $usedIndices);
        
        //Checking if no shift is available
        if(empty($modified)){
            $jsonData = json_encode(array('completeArray' => []));

            }else{
            // Create an associative array with the variables
                $data=array(
                    'completeArray'=>$modified,
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