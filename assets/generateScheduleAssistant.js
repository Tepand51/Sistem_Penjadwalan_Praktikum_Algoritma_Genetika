
    var binaryValue;

    function callPHP(){
      const startTime = performance.now();
        $.ajax({
            url: '../php/callingAGAssistant.php',
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                //Checking if the response is empty or not
                if (response.completeArray && Object.keys(response.completeArray).length > 0) {
                    var completeArray = response.completeArray;
                    //console.log(completeArray);
                    binaryValue = completeArray;

                    // Create a 24-bit binary representation with commas
                    var binaryArray = []; // Initialize as an array
                    for (var i = 0; i <= 23; i++) {
                        if (completeArray.includes(i)) {
                            binaryArray.push(1);
                        } else {
                            binaryArray.push(0);
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

                            }
                        });
                    });
                    $('#result').text('Complete Array: ' + completeArray);
                }else {
                    // Handle the case when the response is empty or incomplete
                  console.log("Not Found");
                    //alert('All member need to input schedule first or contact Laboran for unavailable schedule.');
                }   
        },
            error: function() {
                alert('An error occurred while calling the PHP file.');
            }
        });
      const endTime = performance.now();
      const runningTime = endTime - startTime;
      console.log(`Running time: ${runningTime} milliseconds`);
    };

    function acceptPHP(){
        // Convert divided array to a single line of binary without commas 
        console.log(binaryValue);
        if (binaryValue) {
            // Transfer binaryArray to a new PHP file
            $.ajax({
                url: '../php/inputJadwalNgajar.php',
                type: 'POST',
                data: { binary: binaryValue},
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    alert('An error occurred while transferring the binaryArray.');
                }
            });
        } else {
            alert('Binary array is not available. Please generate it first.');
        }
    };

