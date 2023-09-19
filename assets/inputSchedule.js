/* JavaScript code */
var selectedCategory = null;
function submitValues() {
  var dropdown = document.getElementById('categoryDropdown');
  selectedCategory = dropdown.value

  console.log(selectedCategory);
  if (selectedCategory == "Pilih Praktikum") {
      alert("Mohon Pilih Praktikum");
      return;
  }else{
		// Function untuk menampilkan notifikasi konfirmasi
    	var isConfirmed = confirm('Apakah Anda yakin menyimpan jadwal?');
    	if (isConfirmed) {
      // Assign category values based on the selected category
      switch (selectedCategory) {
        case "Praktikum Teknik Komputer I":
            categoryValue = 'ptk1';
            break;
        case "Praktikum Teknik Komputer II":
            categoryValue = 'ptk2';
            break;
        case "Praktikum Teknik Komputer III":
            categoryValue = 'ptk3';
            break;
        case "Praktikum Teknik Komputer IV":
            categoryValue = 'ptk4';
            break;
        default:
            categoryValue = 0;
            break;
      }

      const toggles = document.getElementsByClassName('toggle');
      const binaryArray = [[], [], [], [], [], []]; // Array for each day of the week

      for (let i = 0; i < toggles.length; i++) {
        const toggle = toggles[i];
        const dayIndex = i % 6; // Calculate the day index (0-6) based on the toggle index
        const value = toggle.classList.contains('active') ? 1 : 0;
        binaryArray[dayIndex].push(value);
      }

      // Divide the 8 bits into two 4-bit groups and determine the new bits
      const dividedArray = binaryArray.map(dayArray => [
        (dayArray[0] || dayArray[1] || dayArray[2]) ? 1 : 0,
        (dayArray[3] || dayArray[4] || dayArray[5]) ? 1 : 0,
        (dayArray[6] || dayArray[7] || dayArray[8]) ? 1 : 0,
        (dayArray[9] || dayArray[10] || dayArray[11]) ? 1 : 0
      ]);

      // Convert divided array to a single line of binary with commas
      const binaryLine = dividedArray.flat().join('');

      // calling simpanJadwal.php
       $.ajax({
            type: 'POST',
            url: '../php/inputJadwalKuliah.php',
            data: {
              category: categoryValue,
              jadwal: binaryLine
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log('Error storing binary line in the database:', error);
            }
      	});
       alert('Jadwal Sudah Disimpan');
    }
  }
    
  // Redirect to another page
  window.location.href = "../html/jadwalprak.php";
}

// Add event listeners to toggle elements
window.addEventListener('DOMContentLoaded', function() {
  const toggles = document.querySelectorAll('.toggle');
  toggles.forEach(function(toggle) {
    toggle.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
});