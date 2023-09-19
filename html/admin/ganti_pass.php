<?php 
session_start();

if (isset($_SESSION['nim']) && isset($_SESSION['pass'])) {

    include "../../php/db_connect.php";

    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
        

        function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);
        
        if(empty($op)){
        header("Location: ganti_pass.php?error=Old Password is required");
        exit();
        }else if(empty($np)){
        header("Location: ganti_pass.php?error=New Password is required");
        exit();
        }else if($np !== $c_np){
        header("Location: ganti_pass.php?error=The confirmation password  does not match");
        exit();
        }else {
            $id = $_SESSION['nim'];

            $sql = "SELECT pass
                    FROM users WHERE 
                    nim='$id' AND pass='$op'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $sql_2 = "UPDATE users
                        SET pass='$np'
                        WHERE nim='$id'";
                mysqli_query($conn, $sql_2);
                session_unset();
                session_destroy();
                header("Location: ../login.php");
                exit();

            }else {
                header("Location: ganti_pass.php?error=Incorrect password");
                exit();
            }

        }

        
    }else{
        header("Location: akun.php?error=You Password is required");
        exit();
    }

}else{
     header("Location: akun.php?error=welp, don't know why ?");
     exit();
}

?>