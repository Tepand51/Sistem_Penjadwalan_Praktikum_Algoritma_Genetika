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
        <script  type="text/javascript" src="../assets/generateScheduleAssistant.js"></script>
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
            <p class="i-name">Jadwal Mengajar</p>
            <div class="status">
                <div class="status">
                        <div class="container" style="display: block;">
                            <div style="display: flex; margin-right: 10px;">
                                <h4 style="margin-left: 20px;">Keterangan:</h4>
                            </div>
                            <ul style="display: block; margin-left: 30px;">
                              <li class="isi_ket">Sebelum melakukan generate diharapkan semua anggota asisten sudah melakukan input jadwal kuliah</li>
                              <li class="isi_ket">Pastikan anda telah memeriksa hasil jadwal mengajar saat klik tombol generate sebelum melakukan submit</li>
                              <li class="isi_ket">Hasil jadwal Mengajar akan di tampilkan pada tabel yang berwarna hijau</li>
                              <li class="isi_ket">Jika anda mengalami kendala atau pertanyaan harap menghubungi laboran</li>

                            </ul>
                        </div>
                </div>
                <div class="container">
                    <table width="100%" class="schedule-table">
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
                                <th scope="col">6:30 - 9:00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                              </tr>
                              <tr>
                                <th>9:30 - 12.00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                              </tr>
                              <tr>
                                <th>12:30 - 15:00</th>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                                <td><div class="toggle"></div></td>
                              </tr>
                              <tr>
                                <th>15:30 - 18:00</th>
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
            <div class="status">
                <div class="latar_tombol" style="display: block; ">
                    <div style="display: flex; ">
                        <div type="button" id="callPHP" onclick="callPHP()" class="generate">generate</div>
                        <div class="submit" id="submitButton" type="button">submit</div>                                                                                                        
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
        <script>
            function showConfirmation() {
                var isConfirmed = confirm('Apakah Anda yakin menyimpan jadwal?');
                if (isConfirmed) {
                    // Lakukan aksi menyimpan data
                    acceptPHP();
                    alert('Jadwal Sudah Disimpan');
                } else {
                    // Tidak ada tindakan yang diambil jika pengguna memilih 'Cancel'
                }
            }

            // Menambahkan event listener untuk tombol "submit"
            document.getElementById('submitButton').addEventListener('click', showConfirmation);
        </script>
        <script>
            var userRole = '<?php echo $_SESSION["role"]; ?>';
        </script>

        <script src="../assets/checkDataGenerate.js" type="text/javascript"></script>
    </body>
</html>