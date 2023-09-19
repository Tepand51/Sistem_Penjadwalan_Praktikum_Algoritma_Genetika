<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style1.css">
  <title>Pratech</title>
  <link rel="icon" href="../image/telkom.png" type="image/png">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <form action="../php/check_login.php" method="post">
    <div class="txt_field">
        <input type="text" id="nim" name="nim" required>
        <span></span>
        <label for="nim">Username</label>
      </div>
      <div class="txt_field">
        <input type="password" id="pass" name="pass" required>
        <span></span>
        <label for="pass">Password</label>
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role">
          <option value="praktikan">Praktikan</option>
          <option value="asisten">Asisten</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" id="btn">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
