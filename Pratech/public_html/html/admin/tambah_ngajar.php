<?php
  session_start();
  if($_SESSION["nim"] != true){
      header("location:../login.php");
  }
  $nim= $_SESSION['nim'];
  $name= $_SESSION['name'];
  $role= $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PraTech</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css">

    <!-- <link rel="stylesheet" href="../../assets/style.css"> -->
    <link rel="stylesheet" href="../../assets/style _admin.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../../assets/script.js" defer></script>
    <link rel="icon" href="../../image/telkom.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
    <body>
        <section id="menu">
            <div class="logo">
                <img src="../../image/telkom.png" alt="">
                <h2>PraTech </h2>
            </div>
            <div class="items">
                <li style="display: flex; align-items: center;">
                    <a  href="adminhome.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="adminuser.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar-day"></i> Data User
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="adminprak.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar-day"></i> Data Kuota Praktikum
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="adminjadwal_maha.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar"></i> Data Jadwal Kuliah
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="adminpraktikan.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar"></i> Data Jadwal Praktikum
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="adminassis.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar"></i> Data Jadwal Ngajar
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="laboran.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-atom"></i> Laboran
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="larobatorium.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-flask"></i> Laboratorium
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="akun.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-user"></i> Akun
                    </a>
                </li>
            </div>
        </section>
        <section id="interface">
            <div class="navigation">
                <div class="n1">
                    <i id="menu-btn" class="fas fa-bars"></i>
                    <i id="dark-mode-toggle" class="fas fa-sun"></i>
                </div>
                <div class="profile">
                    <img src="../../image/pic-6.jpg" class="user-pic" onclick="toggleMenu()">
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="../../image/pic-6.jpg">
                               <div class="indentitas">
                                    <?php
                                        $nameArray = explode(' ', $name);
                                        $firstName = $nameArray[0];
                                        $middleName = $nameArray[1] ?? '';
                                        $lastName = $nameArray[2] ?? '';
                                    
                                        // Menampilkan nama sesuai kondisi
                                        if ($middleName !== '' && $lastName !== '') {
                                            $lastNameInitial = substr($lastName, 0, 1);
                                            echo '<h4>' . $firstName . ' ' . $middleName . ' ' . $lastNameInitial . '.</h4>';
                                        } elseif ($middleName !== '') {
                                            echo '<h4>' . $firstName . ' ' . $middleName . '</h4>';
                                        } else {
                                            echo '<h4>' . $firstName . '</h4>';
                                        }
                                    ?>
                                    <h4><?php echo $nim; ?></h4>
                                    <h4>
                                        <?php
                                            if ($role === 'praktikan') {
                                            echo 'Praktikan';
                                            } elseif ($role === 'asisten') {
                                            echo 'Asisten';
                                            }elseif($role === 'admin'){
                                                echo 'Admin';
                                            }
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <a href="akun.php" class="sub-menu-link">
                                <div class="sub-menu-link-item">
                                    <p class="fas fa-user "> </p>
                                        <p>  Profile</p>
                                </div>
                                <span>></span>
                            </a>
                            <a href="../../php/logout.php" class="sub-menu-link">
                                <div class="sub-menu-link-item">
                                    <p class="fas fa-door-open"> </p>
                                    <p>  Logout</p>
                                </div>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="i-name">Tambah Jadwal Mengajar</p>
            <div class="status">
                    <div class="status">
                                <div class="container" style="display: block;">
                                    <div style="display: flex; margin-right: 10px;">
                                        <h4 style="margin-left: 20px;">Keterangan:</h4>
                                    </div>
                                    <ul style="display: block; margin-left: 30px;">
                                        <li class="isi_ket">Pada kolom "Praktikum" berisi daftar nama praktikum yang akan diadakan.</li>
                                        <li class="isi_ket">Pada kolom "NIM" diisi dengan nomor induk mahasiswa. </li>
                                        <li class="isi_ket">Pada kolom "Nama" diisi dengan nama-nama mahasiswa.</li>

                                    </ul>
                                </div>
                    </div>
              <!-- Data Praktikum  -->
              <div class="status">
                <div style="display:blok; margin-left: 30px;">
                    <a href="adminassis.php"><button class="kembali">Kembali</button></a>
                </div>
                    <div class="container">
                        <table  class="schedule-table">
                            <thead>
                            <tr>
                                <th scope="col"colspan='3'>Praktikum</th>
                                <th scope="col"colspan='2'>Nim</th>
                                <th scope="col" colspan='3'>Nama</th>
                                <th scope="col"colspan='2'></th>
                            </tr>
                        </thead>
                            <tbody class="table-light align-items-center">
                                <form>
                                    <tr>
                                        <td colspan="3">
                                            <select id="id_praktikum" name="id_praktikum" required class="prak">
                                                <option value="">Pilih Praktikum</option>
                                                <option value="1">Rangkaian Listrik</option>
                                                <option value="2">Pemrograman Berbasis Objek</option>
                                                <option value="3">Elektronika Dasar</option>
                                                <option value="4">Desain Sistem Digital</option>
                                                <option value="5">Pengolahan Sinyal Digital</option>
                                                <option value="6">Komputasi Awan</option>
                                                <option value="7">Kecerdasan Buatan</option>
                                                <option value="8">Mikroprosesor Dan Antarmuka</option>
                                                <option value="9">Keamanan Sistem</option>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <label for="nim"></label>
                                            <input placeholder="Nim" class="hari" type="text" id="nim" name="nim" required >
                                        </td>
                                        <td colspan="3">
                                            <label for="nama"></label>
                                            <input placeholder="Nama" class="hari" type="text" id="name" name="name" required >
                                        </td>

                                        <td colspan="2">
                                            <button class="tambah" onclick="submitForm()">Tambahkan</button>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                    <table class="schedule-table">
                        <thead>
                            <tr>
                                <th scope="col">Hour</th>
                                <th scope="col">Monday</th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th> 
                                <th scope="col">Friday</th>
                                <th scope="col">Saturday</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <th scope="row">6:30 - 9:00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                                <th scope="row">9:30 - 12:00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                                <th scope="row">12:30 - 15:00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                                <th scope="row">15:30 - 18:00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function toggleMenu() {
                let subMenu = document.getElementById("subMenu");
                subMenu.classList.toggle("open-menu");
            }

            document.addEventListener("click", function(event) {
                let targetElement = event.target;

                // Periksa apakah elemen yang diklik bukan foto profil atau bagian dari sub-menu
                if (!targetElement.closest(".user-pic") && !targetElement.closest(".sub-menu-wrap")) {
                    let subMenu = document.getElementById("subMenu");
                    subMenu.classList.remove("open-menu");
                }
            });
            $('#menu-btn').click(function(){
                $('#menu').toggleClass("active");
            })
        </script>

        <script src="../../assets/existScheduleNgajar.js"></script>

    </body>
</html>