<?php
  session_start();
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

        <!-- css -->
        <link rel="stylesheet" href="../assets/style.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="../assets/script.js" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/inputScheduleAssistant.js"></script>
        <link rel="icon" href="../image/telkom.png" type="image/png">
        
</head>
    <body>
        <section id="menu">
            <div class="logo">
                <img src="../image/telkom.png" alt="">
                <h2>PraTech </h2>
            </div>
            <div class="items">
                <li style="display: flex; align-items: center;">
                    <a href="../index.php" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <?php
                    // Tentukan tautan halaman berdasarkan peran (role)
                    if ($role == "praktikan") {
                        $inputJadwalLink = "inputjadwal.php";
                        $jadwalPrakLink = "jadwalprak.php";
                    } elseif ($role == "asisten") {
                        $inputJadwalLink = "inputjadwalasis.php";
                        $jadwalPrakLink = "jadwalngjar.php";
                    } else {
                        // Peran tidak valid, tangani sesuai kebutuhan Anda
                        die("Peran tidak valid");
                    }
                    ?>
                <li style="display: flex; align-items: center;">
                    <a href="<?php echo $inputJadwalLink; ?>" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar-day"></i> Input Jadwal Kuliah
                    </a>
                </li>
                <li style="display: flex; align-items: center;">
                    <a href="<?php echo $jadwalPrakLink; ?>" style="text-decoration: none; flex: 1;">
                        <i class="fas fa-calendar"></i> <?php echo ($role == "asisten") ? "Jadwal Mengajar" : "Jadwal Praktikum"; ?>
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
				<li style="display: flex; align-items: center;">
                    <a href="https://drive.usercontent.google.com/download?id=1HlN8-diVudvjvrd32iBdeQoJn_Fxsc7-&export=download&authuser=0&confirm=t&uuid=0534b688-cda0-49f2-badf-6d10d8872bc9&at=AC2mKKSoMKuiruISAjniyTvK9xU5:1691074170160" style="text-decoration: none; flex: 1;" download>
                        <i class="fas fa-info-circle"></i> Panduan
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
                    <img src="../image/pic-6.jpg" class="user-pic" onclick="toggleMenu()">
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="../image/pic-6.jpg">
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
                            <a href="../php/logout.php" class="sub-menu-link">
                                <div class="sub-menu-link-item">
                                    <p class="fas fa-door-open"> </p>
                                    <p>  Logout</p>
                                </div>
                                <span>></span>
                            </a>

                            <!-- <a href="#" class="sub-menu-link">
                                <p class="fas fa-user">Profile</p>
                                <span>></span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <p class="i-name">Input Jadwal Kuliah</p>
            <div class="status">
              <!-- input jadwal -->
                <div class="status">
                        <div class="container" style="display: block;">
                            <div style="display: flex; margin-right: 10px;">
                                <h3 style="margin-left: 20px;">Keterangan:</h3>
                            </div>
                            <ul style="display: block; margin-left: 30px;">
                              <li class="isi_ket">Pastikan anda telah memeriksa jadwal kuliah yang sudah diinputkan </li>
                              <li class="isi_ket">Jadwal yang sudah diinputkan dalam tabel akan ditandai dengan warna hijau</li>
                              <li class="isi_ket">Pastikan anda telah memilih praktikum teknik komputer yang sudah ditentukan </li>
                              <li class="isi_ket">Jika anda mengalami kendala atau pertanyaan harap menghubungi laboran</li>
                            </ul>
                        </div>
                </div>
                <div class="container">
                    <div style="display:flex; margin-left: 30px;">
                                <div class="dropdown">
                                <select id="categoryDropdown" class="pilihan">
                                <option disabled selected>Pilih Praktikum</option>
                                <option value="Rangkaian Listrik">Rangkaian Listrik</option>
                                <option value="Pemrograman Berbasis Objek">Pemrograman Berbasis Objek</option>
                                <option value="Elektronika Dasar">Elektronika Dasar</option>
                                <option value="Desain Sistem Digital">Desain Sistem Digital</option>
                                <option value="Pengolahan Sinyal Digital">Pengolahan Sinyal Digital</option>
                                <option value="Komputasi Awan">Komputasi Awan</option>
                                <option value="Kecerdasan Buatan">Kecerdasan Buatan</option>
                                <option value="Mikroprosesor Dan Antarmuka">Mikroprosesor Dan Antarmuka</option>
                                <option value="Keamanan Sistem">Keamanan Sistem</option>
                                </select>
                                </div>
                                <div type="button" class="button" onclick="submitValues()">submit</div>                                                                                                        
                    </div>
                    <table class="schedule-table table table-bordered table-responsive-md">
                      <thead>
                          <tr>
                              <th scope="col">Hour</th>
                              <th scope="col">Monday</th>
                              <th scope="col">Tuesday</th>
                              <th scope="col">Wednesday</th>
                              <th scope="col">thursday</th>
                              <th scope="col">Friday</th>
                              <th scope="col">Saturday</th>
                          </tr>
                      </thead>
                      <tbody class="table-light align-items-center">
                          <tr>
                              <th scope="col">6:30</th>
                              <td><div  class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>7:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>8:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>9:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>10:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>11:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>12:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>13:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>14:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>15:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>16:30</th>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                              <td><div class="toggle"></div></td>
                            </tr>
                            <tr>
                              <th>17:30</th>
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
            
        </section>
        
        <script>
            function toggleMenu() {
                let subMenu = document.getElementById("subMenu");
                subMenu.classList.toggle("open-menu");
            }

            document.addEventListener("click", function(event) {
                let targetElement = event.target; // Element yang diklik

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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script>
          var selectedCategory = null;

          function selectCategory(category) {
              selectedCategory = category;
              document.getElementById('categoryDropdown').innerText = category;
            }
       </script>
        <script src="../assets/checkAssistantKuliah.js"></script> 
    </body>
</html>