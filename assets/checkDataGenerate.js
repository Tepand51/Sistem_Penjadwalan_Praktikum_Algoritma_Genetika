$(document).ready(function() {

    // Function to check if the user has jadwal Data
    function checkDataPraktikan() {
        $.ajax({
            url: '../php/checkPraktikanGenerate.php',
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                if (response.scheduleData && Object.keys(response.scheduleData).length > 0) {
                    var scheduleData = response.scheduleData;
                    //console.log(scheduleData);

                    // Create a 24-bit binary representation with commas
                    var binaryArray = []; // Initialize as an array
                    for (var i = 0; i <= 23; i++) {
                        if (scheduleData[i]) {
                            binaryArray.push(1); // Append 1 to the array
                        } else {
                            binaryArray.push(0); // Append 0 to the array
                        }
                    }

                    var binary = binaryArray.join(',');

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
                                var value = scheduleData[binaryIndex];
                                $(this).text(value).addClass('text');
                            }
                        });
                    });
                }
            },
            error: function() {
                // Handle the case when an error occurs during the Ajax request
                alert('An error occurred while checking user input.');
            }
        });
    }

    // Function to check if the user has jadwal Data
    function checkDataAssistant() {
        $.ajax({
            url: '../php/checkAssistantGenerate.php',
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                if (response.scheduleData && Object.keys(response.scheduleData).length > 0) {
                    var scheduleData = response.scheduleData;
                    //console.log(scheduleData);

                    // Convert string values to integers
                    var scheduleArray = scheduleData.map(function(bit) {
                        return parseInt(bit);
                    });

                    // Toggle the table cells based on the binary array
                    var rows = $('.schedule-table tbody tr');

                    // Remove "active" class from all cells
                    $('.schedule-table .toggle').removeClass('active').text('');

                    //Activate every toggle 
                    rows.each(function(rowIndex) {
                        var rowCells = $(this).find('.toggle');
                        rowCells.each(function(cellIndex) {
                            var binaryIndex = rowIndex + (cellIndex * rows.length);
                            if (scheduleArray[binaryIndex] === 1) {
                                $(this).addClass('active');
                            }
                        });
                    });
                }
            },
            error: function() {
                // Handle the case when an error occurs during the Ajax request
                alert('An error occurred while checking user input.');
            }
        });
    }

    // Function to check user role and call the appropriate function
    function checkUserRole(userRole) {
        //console.log(userRole);
        if (userRole === 'praktikan') {
          checkDataPraktikan();
        } else if (userRole === 'asisten') {
          checkDataAssistant();
        } else {
          console.log('Unknown user role.');
        }
      }

    // Call the function to check user input when the page is ready
    checkUserRole(userRole);

});


