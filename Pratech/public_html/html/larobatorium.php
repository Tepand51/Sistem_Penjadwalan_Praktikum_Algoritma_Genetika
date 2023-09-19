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
            <p class="i-name">Laboratorium</p>
            <div class="status">
                     <!-- fisdas -->
                     <div class="container" >
                        <p class="name justify-content-around">Lab Fisika Dasar (FD)</p>
                        <div class="split2">
                            <div>
                                <img src="../image/fisdas.png" style="width: 150px; height: auto;"alt="Finding fisdas">
                            </div>
                            <div style="width: 80%; margin-left:-3%">
                                <p class="name justify-content-around">Fisdas Laboratory</p>
                                <p>Laboratorium Fisika Dasar merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan pelaksanaan Praktikum Fisika Dasar I dan II.</p>
                                <p>Praktikum : praktikum Fisika Dasar I dan II </p>
                                <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> labfisdas_telu</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @168etyde</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-10.103- 10.105</i>
                              </p>
                            </div>
                              
                        </div>
                    </div>
                    <!-- edes -->
                    <div class="container">
                        <p class="name justify-content-around">Lab Electronic Device and Embedded System (EDES)</p>
                        <div class="split2">
                            <div>
                                <img src="../image/elka.png" style="width: 150px; height: auto;" alt="Finding elka">
                            </div>
                            <div style="width: 80%;margin-left:-3%">
                                <p class="name justify-content-around">Elektronika Laboratory</p>
                                <p>Laboratorium Elektronika merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan pelaksanaan Praktikum Elektronika.</p>
                                <p>Praktikum Teknik Komputer 1 : Praktikum Elektronika Dasar</p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> elektronicslaboratory</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @yig5562</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-10.06</i>
                              </p>
                            </div>
                        </div>
                        <div class="split2">
                            <div>
                                <img src="../image/RL.png" style="width: 150px; height: auto;" alt="Finding RL">
                            </div>
                            <div style="width: 80%; margin-left:-3%">
                                <p class="name justify-content-around">Rangkaian Listrik Laboratory</p>
                                <p>Laboratorium Rangkaian Listrik merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan Praktikum Rangkaian Listrik.</p>
                                <p>Praktikum Teknik Komputer  1 : Praktikum Rangkaian Listrik</p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> rangkaianlistriklab</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @kss3173p</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-10.07</i>
                              </p>
                            </div>
                        </div>
                    </div>
                    <!-- cc -->
                    <div class="container">
                        <p class="name justify-content-around">Lab Continuous Computing (CC)</p>
                        <div class="split2">
                            <div>
                                <img src="../image/evconn.png"  style="width: 150px; height: auto;" alt="Finding evconn">
                            </div>
                            <div style="width: 80%; margin-left:-3%">
                                <p class="name justify-content-around">EvCon Laboratory</p>
                                <p>Laboratorium Everything Connected merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan Praktikum Jaringan Komunikasi dan Data.</p>
                                <p>Pratikum Teknik Komputer 3 : Praktikum Komputasi Awan</p>
                                <p>Pratikum Teknik Komputer Dasar : Praktikum Jaringan Komputer & Data </p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> labevconn</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @077xjusr</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-10.16</i>
                              </p>
                            </div>
                        </div>
                        <div class="split2">
                            <div>
                                <img src="../image/seculab.png" style="width: 150px; height: auto;" alt="Finding Virginia trying to approac">
                            </div>
                            <div style="width: 80%; margin-left:-4%">
                                <p class="name justify-content-around">Seculab Laboratory</p>
                                <p>Laboratorium Security  merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan Praktikum Keamanan Sistem.</p>
                                <p>Pratikum Teknik Komputer 4 : Praktikum Keamanan Sistem</p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> seculab</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @scs1140j</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-10.15</i>
                              </p>
                            </div>
                        </div>
                        <div class="split2">
                            <div>
                                <img src="../image/renst.png" style="width: 150px; height: auto;" alt="Finding renst">
                            </div>
                            <div style="width: 80%;margin-left:-4%">
                                <p class="name justify-content-around">RnEST Laboratory</p>
                                <p>Laboratorium Robotics and Embedded System Technology merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan pelaksanaan Praktikum Desain Sistem Digital dan Praktikum Mikroprosessor Dan Antarmuka.</p>
                                <p>Pratikum Teknik Komputer 2 : Praktikum Desain Sistem Digital</p>
                                <p>Pratikum Teknik Komputer 4 : Praktikum Mikroprosessor Dan Antarmuka</p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> rnestlab.official</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @wdj5608n</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-14.04</i>
                              </p>
                            </div>
                        </div>
                    </div>
                    <!-- raid -->
                    <div class="container">
                        <p class="name justify-content-around">Lab Realm of Artificial Intelligent Design (RAID)</p>
                        <div class="split2">
                            <div>
                                <img src="../image/sea.png" style="width: 150px; height: auto;" alt="Finding sea">
                            </div>
                            <div style="width: 80%; margin-left:-4%">
                                <p class="name justify-content-around">Sea Laboratory</p>
                                <p>Laboratorium Software Engineering and Application merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan pelaksanaan Praktikum Algoritma dan Pemrograman Praktikum Pemograman Berbasis Objek.</p>
                                <p>Pratikum Teknik Komputer 1 : Praktikum Pemograman Berbasis Objek </p>
                                <p>Partikum Teknik Komputer Dasar : Praktikum Algoritma & Pemrograman  </p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> sea.laboratory</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @748waapd</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-11.15</i>
                              </p>
                            </div>
                        </div>
                        <div class="split2">
                            <div>
                                <img src="../image/magics.png"style="width: 150px; height: auto;"alt="Finding magics">
                            </div>
                            <div style="width: 80%;margin-left:-4%">
                                <p class="name justify-content-around">MAGICS Laboratory</p>
                                <p>Laboratorium Multimedia Arts Graphics Computation & Simulation merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan pelaksanaan praktikum Pengolahan Sinyal Digital.</p>
                                <p>Pratikum Teknik Komputer 2 : Praktikum Pengolahan Sinyal Digital </p>
                               <p style = "margin-bottom: -1rem;"> Contact us:</p>
                              <p style="margin-right: 10px;"> 
                                <i style="margin-right: 5px;" class="fab fa-instagram-square"> magics_laboratory</i> 
                                <i style="margin-right: 5px;" class="fab fa-line"> @896eorgg</i>
                                <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-11.15</i>
                              </p>
                            </div>
                        </div>
                        <div class="split2">
                            <div>
                                <img src="../image/ismile.png" style="width: 150px; height: auto;" alt="Finding ismile">
                            </div>
                            <div style="width: 80%;margin-left:-4%">
                                <p class="name justify-content-around">i-SMILE Laboratory</p>
                                <p>Laboratorium Intelligent System and Machine Learning merupakan Laboratorium Fakultas Teknik Elektro yang menyelenggarakan pelaksanaan praktikum Artificial Intelligence.</p>
                              	<p>Pratikum Teknik Komputer 3 : Praktikum Kecerdasan Buatan</p>
                               	<p style = "margin-bottom: -1rem;"> Contact us:</p>
                              	<p style="margin-right: 10px;"> 
                                	<i style="margin-right: 5px;" class="fab fa-instagram-square"> ismilelabs</i> 
                                	<i style="margin-right: 5px;" class="fab fa-line"> @qup6728v</i>
                                	<i style="margin-right: 5px;" class="fas fa-map-marker-alt"> TULT-11.16</i>
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