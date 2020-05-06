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
                  echo nl2br ('Emri im eshte: ' .$developerName. " \n Une jam student ne " .implode(" ",$developerEducation). " \n Email-i im eshte " .$developerEmail . ". \n And my hobbies are " .join(", ", $developerHobbies) );
              ?>
          </p>
            <?php
                if(isset($_POST['submit'])){
                $to = "shkelqim.maxharraj@student.uni-pr.edu"; // Emaila e pranuesit (developerit)
                $from = $_POST['email'];                    // Emaili qe e shkruajme ne input
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $subject = "Projekti  PI";
                $subject2 = "Mbrotja e projektit ne PI";
                $message = $first_name . " " . $last_name . " Ka shkruar se :" . "\n\n" . $_POST['message'];
                $message2 = "Ja nje kopje e mesazhit " . $first_name . "\n\n" . $_POST['message'];

                $headers = "From:" . $from;
                $headers2 = "From:" . $to;
                mail($to,$subject,$message,$headers);
                mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
                echo "Emaili eshte derguar " . $first_name . ", faleminderit do ju kontaktojme se shpejti.";
                // You can also use header('Location: thank_you.php'); to redirect to another page.
                }
            ?>


            <form action="" method="post">
                First Name: <input type="text" name="first_name"><br>
                Last Name: <input type="text" name="last_name"><br>
                Email: <input type="text" name="email"><br>
                Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </article>

      </div>
    </section>

    <footer>
      <p>Acme Web Deisgn, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
