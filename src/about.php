<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Brad Traversy">
    <title>Acme Web Deisgn | About</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    <?php 
          include 'Header.php';
          include '../services/DeveloperDetails.php';
    ?>



    <section id="main">
      <div class="container">
        <article id="main-col">
          <h1 class="page-title">About Me</h1>
          <p>
              <?php 
                  echo 'Emri im eshte: ' .$developerName. 'jam student ne ' .implode(" ",$developerEducation). ' email-i im eshte ' .$developerEmail . '. And my hobbies are ' .join(", ", $developerHobbies) ;
              ?>
          </p>
          <p class="dark">
Aliquam eget pharetra diam. Nulla placerat lorem at turpis tempor, vel ultrices dui tincidunt. Proin quis egestas lorem. Mauris vehicula lectus odio, sit amet dictum justo feugiat a. Praesent id dictum lacus. Sed ullamcorper id erat ut dictum. Fusce porttitor lorem sapien, in aliquet sapien convallis et. Donec nec mauris nulla. Curabitur cursus semper odio, et hendrerit ante. Nunc at cursus ante. Maecenas gravida ligula ut efficitur suscipit. Nulla id turpis varius, pretium nunc sed, fermentum sem. Sed lacinia nunc non interdum pellentesque.
          </p>
        </article>

      </div>
    </section>

    <footer>
      <p>Acme Web Deisgn, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
