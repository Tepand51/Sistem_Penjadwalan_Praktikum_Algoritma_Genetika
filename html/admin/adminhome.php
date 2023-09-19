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

        <!-- css -->
        <link rel="stylesheet" href="../../assets/style _admin.css">
        <!-- <link rel="stylesheet" href="../../assets/style.css"> -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="../../assets/script.js" defer></script>
        <link rel="icon" href="../../image/telkom.png" type="image/png">
        
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
                        <i class="fas fa-calendar"></i> Data Jadwal Mengajar
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
                                    } elseif ($role === 'admin') {
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
            <p class="i-name">Home</p>
            <div class="status">
                <div class="container">
                    <p class="name justify-content-around">News</p>
                    <div class="split">
                        <div>
                          <img src="../../image/oprek_magics.jpg" alt="recruting MAGICS">
                        </div>
                        <div>
                            <h2>MAGICS LABORATORY NOW RECRUTING</h2>
                            <p>💥 MAGICS LABORATORY OPEN RECRUITMENT IS FINALLY OPEN 💥</p>
                            <p>The recruitment is open for students of Computer Engineering (2020 &amp; 2021)</p>
                            <p>OPEN REGISTRATION FROM NOW UNTIL 31 MAY 2023 DON'T WAIT ANY LONGER!!
                                    <p>Apply yourself now by clicking the link down below:</p>
                                    <p><a href="bit.ly/RecruitasiAslabMAGICS8">bit.ly/RecruitasiAslabMAGICS8</a></p>
                                    <p>For further information,<br></p>
                                    <p>please contact us:<br></p>
                                    <p>WA: 085777802285 (Salman), OA Line: @896eorgg,</p>
                                    <p> Instagram: @magics_laboratory</p>
                            </p>
                            <p>
                             MAGICS Laboratory
                            </p>
                            <p>
                                <strong>#OpenRecruitmentMAGICS8</strong>
                                <strong>#MAGICSLaboratory</strong>
                            </p>
                        </div>

                    </div>
                  
                </div>
            </div>
            <div class="status">
                <div class="container">
                    <div class="split">
                        <div>
                          <img src="../../image/ismile_seminar.jpg" alt="seminar is-smile">
                        </div>
                        <div>
                          <h2>[I-SMILE LABORATORY]</h2>
                          <h2>“Workshop For Developer Of Object Detection System Robotics  </h2>
                          <h2>with AREI (Association Robot Education Indonesia)”</h2>
                          <p>👋🏻Hello Smiletizen 👋🏻</p>
                          <p>Tahukah kamu tentang Artificial Intelligence dalam Computer Vision?</p>
                          <p>Kamu ingin mempelajari tentang object detection dalam bidang</p>
                          <p>robotik, sehingga kamu ingin mengenal bidang robotik juga?</p>
                          <p>atau sedang belajar machine learning </p>
                          <p>tapi bingung mau mulai belajar darimana?</p>
                          <p>❗Daftar sekarang❗</p>
                          <p>🗓 Hari/Tanggal : Sabtu, 10 Juni 2023</p>
                          <p>⏰ Waktu : 12.30 WIB (Open Gate) - Selesai</p>
                          <p>📍Tempat : GKU 03.01 Telkom University & Via Zoom </p>
                          <p>📝*note : Kursi Terbatas Untuk Luring</p>
                          <p>🔗Link Pendaftaran: <a href="https://bit.ly/Workshopismile2023">https://bit.ly/Workshopismile2023</a></p>
                          <p>
                            <strong> #ismileosile</strong>
                            <strong>#seminarismile</strong>
                          </p>
                        </div>
                      </div>
                  
                </div>
            </div>
            <div class="status">
                <div class="container">
                    <div class="split">
                        <div>
                          <img src="../../image/oprek_seculab.jfif" alt="recruting seculab">
                        </div>
                        <div>
                          <h2>[EXTENDED OPEN RECRUITMENT]</h2>
                          <p>Ready to be Next Security Laboratory assistant?</p>
                          <p>Hai teman - teman, bagi yang kemarin belum sempat daftar,</p>
                          <p> pendaftarannya diperpanjang nihh. So,</p>
                          <p>jangan sampai ketinggalan yah!</p>
                          <p>Informasi persyaratan dan pengumpulan berkas Link Pendaftaran Asistent : </p>
                          <p><a href="https://linktr.ee/seculab2022">https://linktr.ee/seculab2022</a></p>
                          <p>
                            <strong> #recruitmentseculab</strong>
                            <strong>#seculab</strong>
                          </p>
                        </div>
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
    </body>
</html>