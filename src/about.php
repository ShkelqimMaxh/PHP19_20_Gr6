<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Brad Traversy">
    <title>Acme Web Deisgn | About</title>
    <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/about.css">
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
          <p style="display: inline-block; float: left">
              <?php 
                  echo nl2br ('Emri im eshte: ' .$developerName. " \n Une jam student ne " .implode(" ",$developerEducation). " \n Email-i im eshte " .$developerEmail . ". \n And my hobbies are " .join(", ", $developerHobbies) );
              ?>
          </p>
            <?php

                if(isset($_POST['submit'])){
                    $toEmail = "shkelqim.maxharraj@student.uni-pr.edu";
                    $mailHeaders = "From: " . $_POST["name"] . "\r\n";
                    if(mail($toEmail, $_POST["subject"], $_POST["message"], $mailHeaders))
                    {
                        print "<p class='success'>Mail Sent.</p>";
                    }
                    else
                    {
                        print "<p class='Error'>Problem in Sending Mail.</p>";
                    }

                }


            class Person   {
                private $personName;
                private $personEmail;
                function __construct($personName,$personEmail)
                {
                    $this->personName   = $personName;
                    $this->personEmail  = $personEmail;
                }
                function getName(){
                    return $this->personName;
                }
                function getEmail(){
                    return $this->personEmail;
                }
            }

            class Student extends Person    {
                private $id;
                function __construct($personName,$personEmail,$id)
                {
                    parent::__construct($personName,$personEmail);
                    $this->id = $id;
                }
                function getId(){
                    return $this->id;
                }

            }
            $komisioner = new Person("Shkelqim","Shk@gmail.com");
            $punues = new Student("Ismet","Ka@dri.net",113322);



            ?>

        </article>
            <form class="emailMeForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="float: right; display:inline-block">
                <h1>Email me for deails</h1>
                <label for="">First Name:       <input type="text" name="name"></label>
                <label for="">Subject           <input type="text" name="subject"></label>
                <label for="">Message:          <input type="text" name="message" style="height: 60px" /></label><br /><br />
                <input type="submit" name="submit" value="Submit">
            </form>

<!---
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <label for="file">Filename:</label> <input type="file" name="file" id="file"/>
                <input type="submit" value="Submit">
            </form>
            
            <?php
/*
                if ($_FILES["file"]["error"] > 0) {
                    echo "Error: " . $_FILES["file"]["error"] . "<br />";
                }
                elseif ($_FILES["file"]["type"] !== "text/plain") {
                    echo "File must be a .txt";
                }
                else {
                    $fp = fopen($_FILES['uploadFile']['tmp_name'], 'rb');
                    while ( ($line = fgets($fp)) !== false) {
                        echo "$line<br>";
                    }
                }
*/
            ?>
--->


      </div>
    </section>

        <div class="container">
            <a href="readFile.php">To see project tasks</a><br />
            <a href="relase.php">Relase a new version</a>
        </div>

    <footer>
      <p>Acme Web Deisgn, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
