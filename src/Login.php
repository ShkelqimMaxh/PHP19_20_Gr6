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

  <?php include 'Header.php' ?>



    <section id="main">
      <div class="container">

          <h1>LOGIN</h1>
          <p>Please fill in this form to login.</p>
          <form action="#">
              <div class="container">
                  <hr>

                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="email" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" required>

                  <button type="submit" class="registerbtn">LOGIN</button>
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
