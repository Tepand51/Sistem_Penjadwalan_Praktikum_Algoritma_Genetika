// Add event listeners to toggle
    window.addEventListener('DOMContentLoaded', function() {
      const toggles = document.querySelectorAll('.toggle');
      toggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
          if (!this.classList.contains('disable')) {
          this.classList.toggle('active');
          }
        });
      });
    });

//Get Unavailable Schedule from Databse   
   $.ajax({
      url: '../php/getUnavailableSchedule.php',
      dataType: 'json',
      success: function(response) {
          console.log(response);
          //Checking if the response is empty or not
          if (response && response.completeArray && response.completeArray.length > 0) {
              var binaryArray = response.completeArray;

              // Toggle the table cells based on the binary array
              var rows = $('.schedule-table tbody tr');
              var cellsPerRow = binaryArray.length / rows.length;

              //Activate every toggle 
              rows.each(function(rowIndex) {
                  var rowCells = $(this).find('.toggle');
                  rowCells.each(function(cellIndex) {
                      var binaryIndex = rowIndex + (cellIndex * rows.length);
                      if (binaryArray[binaryIndex] === 1) {
                          $(this).addClass('disable');
                      }
                  });
              });
          }else {
              // Handle the case when the response is empty or incomplete
              alert('Please contact Laboran for unavailable schedule.');
          }   
    },
      error: function() {
          alert('An error occurred while calling the PHP file.');
      }
    });


//Input Teach Schedule to Database
    function callPHP() {
      const toggles = document.getElementsByClassName('toggle');
      const binaryArray = [[], [], [], [], [], []]; // Array for each day of the week

      for (let i = 0; i < toggles.length; i++) {
        const toggle = toggles[i];
        const dayIndex = i % 6; // Calculate the day index (0-6) based on the toggle index
        const value = toggle.classList.contains('active') ? 1 : 0;
        binaryArray[dayIndex].push(value);
      }

      // Combine the binary arrays into a single variable
      const combinedBinaryArray = binaryArray.flatMap(arr => arr);

      console.log(combinedBinaryArray);

      //Send Data to php file to transfer to database
      $.ajax({
        type: 'POST',
        url: '../php/inputJadwalNgajar.php',
        data: { combinedBinaryArray: combinedBinaryArray },
        success: function(response) {
          console.log(response);
          // Handle the response from the PHP file
          
        },
        error: function(xhr, status, error) {
          console.error(error);
          // Handle the error if the request fails
        }
      });
      
    }
