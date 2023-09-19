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
        <script>
          /* java */
          // Add event listener to toggle the class "active" on click
          window.addEventListener('DOMContentLoaded', function() {
            var toggles = document.querySelectorAll('.toggle');
            toggles.forEach(function(toggle) {
              toggle.addEventListener('click', function() {
                this.classList.toggle('active');
              });
            });
          });
        </script>
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
                        </div>
                    </div>
                </div>
            </div>
            <p class="i-name">Data Jadwal Praktikum</p>
            <div class="status">
              <!-- Data Praktikum  -->
                <div class="container">
                  <div style="display:flex; margin-left: 30px;">
                    <form id="search-form" style="display: flex;">
                          <input class="pencarian" type="text" id="search-input" placeholder="Pencarian ">
                          <button type="submit" class="cari">Cari</button>
                    </form>
                  </div>
                <table class="schedule-table table table-bordered table-responsive-md" id="search-results">
                  <thead>
                      <tr>
                          <th scope="col">NO</th>
                          <th scope="col"colspan="3">Tipe Praktikum</th>
                          <th scope="col"colspan="7">Praktikum</th>
                          <th scope="col"colspan="3">Nim</th>
                          <th scope="col" colspan='5'>Nama</th>
                          <th scope="col"colspan='2'>Hari</th>
                          <th scope="col"colspan='2'>Shift</th>
                          <th scope="col"colspan='3'></th>
                      </tr>
                  </thead>
                  <tbody class="table-light align-items-center">
                  <?php
                        include "../../php/db_connect.php";
                        $no=1;
                        $ambildata = mysqli_query($conn, "SELECT jadwal_prak.*, praktikum.tipe_prak, praktikum.nama_prak FROM jadwal_prak INNER JOIN praktikum ON jadwal_prak.id_praktikum = praktikum.id_praktikum");
                                while ($tampil = mysqli_fetch_array($ambildata)) {
                                    $nameArray = explode(' ', $tampil['name']);
                                    $firstName = $nameArray[0];
                                    $middleName = $nameArray[1] ?? '';
                                    $lastName = $nameArray[2] ?? '';
                                
                                    echo "
                                        <tr>
                                            <td>$no</td>
                                            <td colspan='3'>$tampil[tipe_prak]</td>
                                            <td colspan='7'>$tampil[nama_prak]</td>
                                            <td colspan='3'>$tampil[nim]</td>
                                            <td colspan='5'>";
                                
                                    // Menampilkan nama sesuai kondisi
                                    if ($middleName !== '' && $lastName !== '') {
                                        $lastNameInitial = substr($lastName, 0, 1);
                                        echo $firstName . ' ' . $middleName . '.' . $lastNameInitial;
                                    } elseif ($middleName !== '') {
                                        echo $firstName . ' ' . $middleName;
                                    } else {
                                        echo $firstName;
                                    }
                                
                                    echo "</td>
                                    <td colspan='2'>$tampil[hari]</td>
                                    <td colspan='2'>$tampil[shift]</td>
                                    <td scope='row' colspan='3'>
                                    <a href='?kode=$tampil[nim]&confirm=yes' onclick='return confirmDelete()'>
                                    <button type='button' class='hapus'>Hapus</button>
                                    </a>
                                    </td>

                                </tr>
                            ";
                        
                            $no++;
                        }
                        ?> 
                        <?php
                            include "../../php/db_connect.php";
                            if (isset($_GET['kode']) && isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
                                mysqli_query($conn, "DELETE FROM jadwal_prak WHERE nim = '$_GET[kode]'");
                                // Mengarahkan pengguna kembali ke halaman adminjadwal_maha.php setelah menghapus
                                echo "<script>window.location.href = 'adminpraktikan.php';</script>";
                            }
                        ?>
                  </tbody>
                  
              </table>
                </div>
            </div>
            
        </section>
        <script>
            function confirmDelete() {
                var result = confirm('Apakah Anda yakin menghapus data ini?');
                if (result === true) {
                    showDataDeletedNotification();
                }
                return result;
            }

            function showDataDeletedNotification() {
                alert('Data Jadwal Praktikum Sudah Dihapus');
            }
        </script>
        <script>
          const searchForm = document.getElementById('search-form');
          const searchInput = document.getElementById('search-input');
          const searchResults = document.getElementById('search-results');

          searchForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const searchTerm = searchInput.value.toLowerCase();
            const tableRows = searchResults.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < tableRows.length; i++) {
              const row = tableRows[i];
              const rowData = row.getElementsByTagName('td');
              let foundMatch = false;

              for (let j = 0; j < rowData.length; j++) {
                const cell = rowData[j];
                const cellText = cell.innerHTML.toLowerCase();

                if (cellText.includes(searchTerm)) {
                  foundMatch = true;
                  break;
                }
              }

              if (foundMatch) {
                row.style.display = '';
              } else {
                row.style.display = 'none';
              }
            }
          });
        </script>
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
    </body>
</html>