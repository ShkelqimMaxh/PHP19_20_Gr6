<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Projekti ne programimi ne internet">
	  <meta name="keywords" content="Projekt, Projekt shkollor, Projekti ne programi ne internet">
  	<meta name="author" content="Shkelqimi">
    <title>Programimi ne Internet</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1 style="font-family: 'Brush Script MT'; font-size:3em "><span class="highlight" >Projekti</span> ne PI</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="index.php">Home    </a></li>
            <li><a href="src/about.php">        About       </a></li>
            <li><a href="src/Services.php">     Services    </a></li>
            <li><a href="src/Register.php">     Register    </a></li>
            <li><a href="src/Login.php">        Login       </a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
        <h1>Projekti: Programimi ne internet</h1>
        <p> Teknologjite e perdorura ne projekt : Php, Html, Css, MySql, Linkedin Web Api </p>
      </div>
    </section>

    <section id="newsletter">
      <div class="container">
        <h1>Subscribe for other projects </h1>

          <?php

          $servername = "localhost";
          $username   = "root";
          $password   = "";
          $dbname     = "subscribers";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }


          $email = '';
            $errors = array('email' => '');
            if(isset($_POST['submitSub'])){
                if(empty($_POST['email'])){
                    $errors['email'] = "Email can't be empty";
                }
                else {
                    $email = $_POST['email'];
                    if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$email)) {
                        $errors['email'] = "Please use the right form for email";
                    }
                }

                if (!array_filter($errors)){
                    //Here add text to database
                    $sql = "INSERT INTO Users(email) VALUES ('$email')";

                        if (mysqli_query($conn, $sql)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    mysqli_close($conn);
                    header('Location: index.php');

                }



            }

          ?>

        <form name="subscribeForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <label for=""><?php echo $errors['email']?></label>
            <input type="text" name='email' placeholder="Enter Email..." value="<?php echo htmlspecialchars($email) ?>">

            <input type="submit" name='submitSub' class="button_1" value='Subscribe'>
        </form>


      </div>
    </section>

    <section id="boxes">
        <?php
            include "services/webApi.php";
        ?>

        <div class="report-container">
            <h2><?php echo $data->name; ?> Weather Status</h2>
            <div class="time">
                <div><?php echo date("l g:i a", $currentTime); ?></div>
                <div><?php echo date("jS F, Y",$currentTime); ?></div>
                <div><?php echo ucwords($data->weather[0]->description); ?></div>
            </div>
            <div class="weather-forecast">
                <img
                        src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                        class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                        class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
            </div>
            <div class="time">
                <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
                <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
            </div>
        </div>

      </section>

    <footer>
      <p>Projekti ne lenden: Programimi ne Internet<br /> Punoi: Shkelqim Maxharraj 160714100079</p>
    </footer>
  </body>
</html>
