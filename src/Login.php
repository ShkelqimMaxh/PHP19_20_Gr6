<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
  	<meta name="author" content="Shkelqim Maxharraj">
    <title>Regjistrohu</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Register.css">
  </head>
  <body>

  <?php include 'Header.php';
        include '../services/userDbConn.php';
  ?>



    <section id="main">
      <div class="container">
      <h1>LOGIN</h1>
      <p>Please fill in this form to login.</p>

      <?php

          if(isset($_POST['loginSubmit'])) {
              $loginEmail = mysqli_real_escape_string($conn,$_POST['loginEmaill']);
              $password = trim($_POST['loginPassword']);

              $sql              = "SELECT * FROM Users WHERE email = '$email'";
              $resultati        = mysqli_query($conn, $sql);
              $numRows          = mysqli_num_rows($resultati);

              if ($numRows == 1) {
                  $row = mysqli_fetch_assoc($resultati);
                  if (password_verify($password, $row['password'])) {
                      echo "Passwordi u verifikua. Mirese erdhet";
                        //E ridergon userin ne taska. Dhe nese useri klikon login ja shfaq nje div i cili tregon se useri eshte i loguar
                  } else {
                      echo "Wrong Password";
                  }
              } else {
                  echo "No User found";
              }
          }

      ?>



          <form action="login.php" method="post">
              <div class="container">
                  <hr>
                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="loginEmail" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="loginPassword" required>

                  <input type="submit" class="registerbtn" name="loginSubmit" value="Login">
              </div>

              <div class="container signin">
                  <p>Not a member <a href="#">Sign up</a>.</p>
              </div>
          </form>

      </div>
    </section>

    <footer>
      <p>Acme Web Deisgn, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
