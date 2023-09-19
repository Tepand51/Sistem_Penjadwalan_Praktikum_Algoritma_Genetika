var namedBinary;
var binary;
var failedCount = 0;
var numberOfIterations = 100;
var totalProcessTime = 0;

function callPHPAG() {
    for (var i = 0; i < numberOfIterations; i++) {
        callPHPAG();
    }

    var averageProcessTime = totalProcessTime / numberOfIterations;
    console.log("Number of failed : ", failedCount);
    console.log("Average time Processed : ", averageProcessTime);
}

function callPHP(){
    const startTime = performance.now();
    $.ajax({
        url: '../php/callingAG.php',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            //Checking if the response is empty or not
            if (response.completeArray && Object.keys(response.completeArray).length > 0) {
                var completeArray = response.completeArray;
                //console.log(completeArray);
                namedBinary=completeArray;

                // Create a 24-bit binary representation with commas
                var binaryArray = []; // Initialize as an array
                for (var i = 0; i <= 23; i++) {
                    if (completeArray[i]) {
                        binaryArray.push(1); // Append 1 to the array
                    } else {
                        binaryArray.push(0); // Append 0 to the array
                    }
                }

                binary = binaryArray.join(',');

                //console.log(binary);

                // Toggle the table cells based on the binary array
                var rows = $('.schedule-table tbody tr');
                var cellsPerRow = binary.length / rows.length;

                // Remove "active" class from all cells
                $('.schedule-table .toggle').removeClass('active').text('');

                //Activate every toggle 
                rows.each(function(rowIndex) {
                    var rowCells = $(this).find('.toggle');
                    rowCells.each(function(cellIndex) {
                        var binaryIndex = rowIndex + (cellIndex * rows.length);
                        if (binaryArray[binaryIndex] === 1) {
                            $(this).addClass('active');
                            var value = completeArray[binaryIndex];
                            $(this).text(value).addClass('text');
                        }
                    });
                });
                $('#result').text('Complete Array: ' + completeArray);
            } else {
                failedCount++;
                console.log("failed");
                // Handle the case when the response is empty or incomplete
                alert('Please contact Laboran for unavailable schedule.');
            }   
    },
        error: function () {
            failedCount++;
            console.log("failed");
            alert('An error occurred while calling the PHP file.');
        }
    });
    //const endTime = performance.now();
    //const runningTime = endTime - startTime;
    //totalProcessTime = totalProcessTime + runningTime;
    //console.log(`Running time: ${runningTime} milliseconds`);
};

function acceptPHP(){
    // Convert divided array to a single line of binary without commas 
    console.log(namedBinary);
    if (namedBinary) {
        // Transfer binaryArray to a new PHP file
        $.ajax({
            url: '../php/inputJadwalPraktikum.php',
            type: 'POST',
            data: { binary: namedBinary },
            success: function(response) {
                console.log(response);
                // Handle the response from the PHP file as needed
            },
            error: function() {
                alert('An error occurred while transferring the binaryArray.');
            }
        });
    } else {
        alert('Binary array is not available. Please generate it first.');
    }
};


