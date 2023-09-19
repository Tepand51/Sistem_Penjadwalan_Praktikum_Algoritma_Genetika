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
                <h2>PraTech</h2>
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
                        </div>
                    </div>
                </div>
            </div>
            <p class="i-name">Akun</p>
            <div class="status">
                <div class="container" style="display: flex; justify-content: center;align-items: center; ">
                    <p class="name justify-content-around"style="">Profil</p>
                    <div class="container">
                        <div class="split" style="width:auto; ">
                            <div>
                                <img src="../../image/pic-6.jpg" style="width: 100px; height: auto;" alt="Finding fisdas">
                            </div>
                            <div >
                                <?php
                                    $nameArray = explode(' ', $name);
                                    $firstName = $nameArray[0];
                                    $middleName = $nameArray[1] ?? '';
                                    $lastName = $nameArray[2] ?? '';
                                    
                                    // Menampilkan nama sesuai kondisi
                                    if ($middleName !== '' && $lastName !== '') {
                                        $lastNameInitial = substr($lastName, 0, 1);
                                        echo '<h2 style="font-size: 20px;">Nama: ' . $firstName . ' ' . $middleName . ' ' . $lastNameInitial . '.</h2>';
                                    } elseif ($middleName !== '') {
                                        echo '<h2 style="font-size: 20px;">Nama: ' . $firstName . ' ' . $middleName . '</h2>';
                                    } else {
                                        echo '<h2 style="font-size: 20px;">Nama: ' . $firstName . '</h2>';
                                    }
                                ?>
                                <h2 style="font-size: 20px;">Nim: <?php echo $nim;?></h2>
                                <h2 style="font-size: 20px;">
                                    <?php
                                        if ($role === 'praktikan') {
                                        echo 'Praktikan';
                                        } elseif ($role === 'asisten') {
                                        echo 'Asisten';
                                        }
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="status">
                <div class="container" style="justify-content: center; align-items: center; background: #4b0303;">
                    <form class="row d-flex justify-content-center" action="../php/ganti_pass.php" method="post">
                        <h1 class="judpass">Change Password</h1>
                        <?php if (isset($_GET['error'])) { ?>
                          <p class="error" style="color: white; margin-bottom: 10px;"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                                      
                        <?php if (isset($_GET['success'])) { ?>
                          <p class="success"  style="color: white;margin-bottom: 10px;"><?php echo $_GET['success']; ?></p>
                        <?php } ?>
                  
                        <div class="row col-8 mt-3 align-content-between">
                          <label class="katagan">Old Password</label>
                          <input class="mb-3" type="password" name="op" placeholder="Old Password">
                                      
                          <label class="katagan">New Password</label>
                          <input class="mb-3" type="password" name="np" placeholder="New Password">
                                      
                          <label class="katagan">Confirm New Password</label>
                          <input class="mb-3" type="password" name="c_np" placeholder="Confirm New Password">
                                      
                          <input class="simpass"type="submit" value="Submit">
                        </div>
                      </form>
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