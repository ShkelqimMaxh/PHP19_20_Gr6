<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Shkelqim Maxharraj">
    <title>Acme Web Deisgn | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <?php
		      include "./src/Header.php";
		?>

    <section id="showcase">
      <div class="container">
        <h1>Punoi Shkelqim Maxharraj</h1>
        <p>Teknologjite e perdorura: Php, Html, Css, MySql, Ajax, si the GitHub web API.</p>
      </div>
    </section>

    <section id="newsletter">
      <div class="container">
        <h1>Subscribe per versionet e radhes</h1>
        <form>
          <input type="email" placeholder="Enter Email...">
          <button type="submit" class="button_1">Subscribe</button>
        </form>
      </div>
    </section>

    <section id="boxes">
      <div class="container">
        <div class="box">
          <img src="./img/logo_html.png">
          <h3>Manage your tasks</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
        </div>
        <div class="box">
          <img src="./img/logo_css.png">
          <h3>Find GitHub users</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
        </div>
        <div class="box">
          <img src="./img/logo_brush.png">
          <h3>Register Now Its free
          </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
        </div>
      </div>
    </section>

    <?php
		      include "src\Footer.php";
		?>
  </body>
</html>
