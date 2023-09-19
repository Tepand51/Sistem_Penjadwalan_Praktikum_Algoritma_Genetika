<?php
    session_start();
    include "db_connect.php";

    if(isset($_POST["nim"])&&isset($_POST["pass"])&&isset($_POST["role"])){
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = test_input($_POST['nim']);
        $password = test_input($_POST['pass']);
        $role = test_input($_POST['role']);
        if(empty($username)) {
            header("Location:../html/login.php?error=User Name is Required");
        }else if(empty($password)) {
            header("Location:../html/login.php?error=Password is Required");
        }else {
            $sql = "SELECT * FROM users WHERE nim='$username' AND pass='$password' AND role='$role'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                // the user name must be unique
                $row = mysqli_fetch_assoc($result);
                if ($row['pass'] === $password && $row['role'] == $role) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['nim'] = $row['nim'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['pass'] = $row['pass'];

                    if($row['role'] == 'praktikan'){
                        header("Location: ../index.php?showModal=true");
                        exit();
                    }else if($row['role'] == 'asisten'){
                        header("Location: ../index.php?showModal=true");
                        exit();
                    }else if($row['role'] == 'admin'){
                        header("Location: ../html/admin/adminhome.php?showModal=true");
                        exit();
                    }
                
                }else {
                    header("Location: ../html/login.php?error=Incorrect username or password");
                    exit();
                }
            } else {
                header("Location: ../html/login.php?error=Incorrect username or password");
                exit();
            }
        }
    } else {
        header("Location:../html/login.php?error=Error occurred");
        exit();
    }
    ?>
    