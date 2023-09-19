// Cek apakah mode gelap telah diatur sebelumnya
const isDarkMode = localStorage.getItem('darkMode');

// Jika mode gelap telah diatur sebelumnya, tambahkan kelas "dark-mode" ke elemen body
if (isDarkMode === 'true') {
  document.body.classList.add('dark-mode');
}

// Toggle mode gelap saat tombol di klik
const darkModeToggle = document.getElementById('dark-mode-toggle');
const body = document.body;

darkModeToggle.addEventListener('click', function () {
  body.classList.toggle('dark-mode');

  // Simpan preferensi pengguna di penyimpanan lokal
  const isDarkMode = body.classList.contains('dark-mode');
  localStorage.setItem('darkMode', isDarkMode);
});

// Dapatkan elemen <a> dalam elemen <li>
var menuItems = document.querySelectorAll("#menu .items li a");

// Loop melalui setiap elemen <a>
menuItems.forEach(function(item) {
    // Cek apakah href sama dengan URL saat ini
    if (item.href === window.location.href) {
        // Tambahkan kelas "active" pada elemen <li> yang sesuai
        item.parentNode.classList.add("active");
    }
});
// const dropdowns = document.querySelectorAll('.dropdown');

// dropdowns.forEach(dropdown=>{
//   const select = dropdown.querySelector('.select')
//   const caret = dropdown.querySelector('.caret')
//   const menu = dropdown.querySelector('.menu')
//   const options = dropdown.querySelector('.menu li')
//   const selected = dropdown.querySelector('.selected')

//   select.addEventListener('click',()=>{
//     select.classList.toggle('select-clicked');
//     select.classList.toggle('caret-rotate');
//     menu.classList.toggle('menu-open');

//   });
//   options.forEach(options=>{
//     options.addEventListener('click',()=>{
//       selected.innerText = options.innerText;
//       select.classList.remove('select-clicked');
//       caret.classList.remove('caret-rotate');
//       menu.classList.remove('menu-open');
//       options.forEach(option=>{
//         option.classList.remove('active');
//       });
//       options.classList.add('active');
//     });
//   });
// });