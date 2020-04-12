<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Brad Traversy">
    <title>Acme Web Deisgn | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Projekti</span> ne PI</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="index.php">Home</a></li>
            <li><a href="src/about.php">     About</a></li>
            <li><a href="src/services.php">  Services</a></li>
            <li><a href="src/Register.php">  Register</a></li>
            <li><a href="src/Login.php"></a> LOGIN</li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
        <h1>Affordable Professional Web Design</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu luctus ipsum, rhoncus semper magna. Nulla nec magna sit amet sem interdum condimentum.</p>
      </div>
    </section>

    <section id="newsletter">
      <div class="container">
        <h1>Subscribe To Our Newsletter</h1>
        
        <form action='index.php' method="POST" >
          <input type="text" name='email' placeholder="Enter Email...">
          <input type="submit" name='submit' class="button_1" value='Subscribe'>
        </form>
    
      <?php 
            if(isset($_POST['submit'])) if(empty($_POST['email'])){
                echo 'An email is required to subscribe';
            }
            else{
                $subemail= $_POST['email'];

                if (!preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $subemail))
                {
                    echo 'Please use the right email format to subscribe';
                }
            }
      ?>

      </div>
    </section>

    <section id="boxes">
      <div class="container">
        <div class="box">
          <img src="./img/logo_html.jpg">
          <h3>TODO list</h3>
          <p>Manage your todo notes </p>
        </div>
        <div class="box">
          <img src="./img/logo_css.png">
          <h3>Register</h3>
          <p>Register in our database</p>
        </div>
        <div class="box">
          <img src="./img/logo_brush.png">
          <h3>About me</h3>
          <p>Read about me to see the whole other requirments</p>
        </div>
      </div>
    </section>

    <footer>
      <p>Acme Web Deisgn, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
