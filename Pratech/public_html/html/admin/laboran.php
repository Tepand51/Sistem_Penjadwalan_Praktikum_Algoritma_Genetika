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
        <!-- <link rel="stylesheet" href="../../assets/style.css"> -->
        <link rel="stylesheet" href="../../assets/style _admin.css">
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

                            <!-- <a href="#" class="sub-menu-link">
                                <p class="fas fa-user">Profile</p>
                                <span>></span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <p class="i-name">Laboran</p>
            <div class="status">
                <div class="container">
                    <p class="name justify-content-around">SEELABS</p>
                    <div class="split">
                        <div>
                          <img src="../../image/seelabsmob 1.png" alt="Finding Virginia trying to approac">
                        </div>
                        <div>
                          <p>Laboran FTE Waktu Pelayanan Online : </p>
                          <p>08.00-16.00 WIB</p>
                           <p> Contact us:</p>
                          <p style="margin-right: 10px;">
                            <i style="margin-right: 5px;" class="fas fa-envelope"> laboranfte@telkomuniversity.ac.id</i> 
                            <i style="margin-right: 5px;" class="fab fa-instagram-square"> seelabstelu</i> 
                            <i style="margin-right: 5px;" class="fab fa-line"> @seelabstelu</i>
                            <i style="margin-right: 5px;" class="fas fa-map-marker-alt"> N114, TULT 10.03</i>
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