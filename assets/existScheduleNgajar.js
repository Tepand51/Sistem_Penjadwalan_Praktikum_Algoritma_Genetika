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


function submitForm(){
    event.preventDefault();
    var praktikumInput = document.getElementById('id_praktikum');
    var nimInput = document.getElementById('nim');
    var nameInput = document.getElementById('name');

    // Cek apakah semua bidang form telah diisi
    if ( praktikumInput.value === '' || nimInput.value === '' || nameInput.value === '' ) {
        alert('Mohon isi semua data pada form.');
    } else {

      const idPraktikum = document.querySelector('#id_praktikum').value;
      const nim = document.querySelector('#nim').value;
      const nama = document.querySelector('#name').value;

      console.log(idPraktikum);
      console.log(nim);
      console.log(nama);

      const toggles = document.getElementsByClassName('toggle');
      const binaryArray = [[], [], [], [], [], []];
  
      for (let i = 0; i < toggles.length; i++) {
        const toggle = toggles[i];
        const dayIndex = i % 6;
        const value = toggle.classList.contains('active') ? 1 : 0;
        binaryArray[dayIndex].push(value);
      }

      const combinedArray = binaryArray.flatMap(arr => arr);
  
      console.log(combinedArray);
      
      //Send Data to php file to transfer to database
      $.ajax({
        type: 'POST',
        url: '../../php/proses_tambah_ngajar.php',
        data: {
          idPraktikum :idPraktikum,
          nim:nim,
          nama:nama,
          binaryArray:combinedArray
        },
        success: function(response) {
          alert(response);
          console.log(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
};



//Get Unavailable Schedule from Databse   
//  $.ajax({
//     url: 'getUnavailableSchedule.php',
//     dataType: 'json',
//     success: function(response) {
//         console.log(response);
//         //Checking if the response is empty or not
//         if (response && response.completeArray && response.completeArray.length > 0) {
//             var binaryArray = response.completeArray;

//             // Toggle the table cells based on the binary array
//             var rows = $('.schedule-table tbody tr');
//             var cellsPerRow = binaryArray.length / rows.length;

//             //Activate every toggle 
//             rows.each(function(rowIndex) {
//                 var rowCells = $(this).find('.toggle');
//                 rowCells.each(function(cellIndex) {
//                     var binaryIndex = rowIndex + (cellIndex * rows.length);
//                     if (binaryArray[binaryIndex] === 1) {
//                         $(this).addClass('disable');
//                     }
//                 });
//             });
//         }else {
//             // Handle the case when the response is empty or incomplete
//             alert('Please contact Laboran for unavailable schedule.');
//         }   
//   },
//     error: function() {
//         alert('An error occurred while calling the PHP file.');
//     }
//   });


