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
                      $countQuery = "select count(*)as count from todos WHERE userId='".$row['userId']."'";
                      $result = $conn->query($countQuery);
                      $count = $result->fetch_assoc()["count"];



                      $_SESSION["firstname"] = $row['userName'];
                      $_SESSION["idUser"] = $row['userId'];
                      $_SESSION['email'] = $row['userEmail'];
                      $_SESSION['totalTodos'] = $count;
                      $_SESSION['actualTodo'] = 0;



                      header('Location: Services.php');
                  }
                  else{
                      echo "Passwordi juaj eshte gabim..";
                  }
              }
              else
              {
                  echo 'Nuk eksizton useri me kete email';
              }

          }
              if(isset($_POST['logout']) || !isset($_COOKIE['activeUser']))
              {
                  session_destroy();
              }

      ?>


            <!--If user is not logged in than show this-->
          <form class="loginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" <?php if (isset($_SESSION['firstname'])){ echo 'style="display:none;"'; } ?> >
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

          <!---->
        <div class="userLogged" <?php if (!isset($_SESSION['firstname'])){ echo 'style="display:none;"'; } ?>>
            Ju jeni aktiv ne llogarine tuaj. Deshironi te dilni ?
            <h1><span class="red-Text">Emri:</span>         <?php echo $_SESSION['firstname']?> </h1>
            <h3><span class="red-Text">Email:</span>        <?php echo $_SESSION['email']?>     </h3>
            <h4><span class="red-Text">Total Tasks:</span>  <?php echo $_SESSION['totalTodos']?></h4>

            <form method="POST" class="logoutForm">
                <input type="submit" name="logout" value="Logout">
            </form>

        </div>




      </div>
    </section>

  <?php
    include 'Footer.php';
  ?>
  </body>
</html>
