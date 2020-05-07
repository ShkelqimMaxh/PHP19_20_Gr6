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

  <?php
        include 'Header.php';
        include '../services/userDbConn.php';
  ?>



    <section id="main">
      <div class="container">
      <h1>LOGIN</h1>

      <?php

      session_start();


          if(isset($_POST['loginSubmit'])) {
              $loginEmail = trim($_POST['loginEmail']);
              $loginPassword = trim($_POST['loginPassword']);

              $loginEmail = mysqli_real_escape_string($conn, $loginEmail);
              $loginPassword = mysqli_real_escape_string($conn, $loginPassword);


              $sql = "SELECT * FROM users WHERE userEmail='".$loginEmail."'";
              $resultati = mysqli_query($conn, $sql);

              if(mysqli_num_rows($resultati)>0){
                  $row = mysqli_fetch_array($resultati);
                  $password_hash= $row['userPassword'];

                  if(password_verify($loginPassword,$password_hash)){
                      //Save user there and go to services
                      $_SESSION["firstname"] = $row['userName'];
                      $_SESSION["idUser"] = $row['userId'];

                      header('Location: Services.php');
                  }
                  else{
                      echo "Passwordi: ". $row['userPassword'];
                  }
              }
              else
              {
                  echo ' Bad attempt';
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
