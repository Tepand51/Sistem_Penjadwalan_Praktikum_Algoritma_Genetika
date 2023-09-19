$(document).ready(function() {
    // Function to check if the user has input data
    function checkUserInput() {
        $.ajax({
            url: '../php/checkPraktikanKuliah.php',
            dataType: 'json',
            success: function(response) {
                if (response.scheduleData && Object.keys(response.scheduleData).length > 0) {
                    var scheduleData = response.scheduleData;
                    console.log(scheduleData);

                    // Convert string values to integers
                    var scheduleArray = scheduleData.map(function(bit) {
                        return parseInt(bit);
                    });
                          
                    console.log(scheduleArray);

                    // Toggle the table cells based on the binary array
                    var rows = $('.schedule-table tbody tr');
                    var cellsPerRow = scheduleArray.length / rows.length;

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

    // Call the function to check user input when the page is ready
    checkUserInput();

});
