<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Shkelqim Maxharraj">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Register.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body>



<?php   include '../src/Header.php';
        include '../services/userDbConn.php';
?>

<section id="main">
    <div class="container">
        <div class="form-style-8">
            <h2>Register for more</h2>

            <?php


            $name  = '';
            $password= '';
            $email = '';
            $password_repat='';

            //Validation of a register form

            $errors = array('name'=> '','email' => '', 'password'=>'', 'password-repat'=>'');

            if(isset($_POST['registerSubmit'])){

                if(empty($_POST['registerName'])){
                    $errors['name'] = "Name can't be empty";
                }
                else {
                    $name = $_POST['registerName'];
                    if (!preg_match("/^[a-zA-Z0-9]+$/",$name)) {
                        $errors['name'] = "Please use the right form for name";
                    }
                }

                if(empty($_POST['registerEmail'])){
                    $errors['email'] = "Email can't be empty";
                }
                else {
                    $email = $_POST['registerEmail'];
                    if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$email)) {
                        $errors['email'] = "Please use the right form for email";
                    }
                }


                if(empty($_POST['registerPassword'])){
                    $errors['password'] = "Password can't be empty";
                }
                else {
                    $password = $_POST['registerPassword'];
                    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W\_])[a-zA-Z0-9\W\_]{8,15}$/",$password)) {
                        $errors['password'] = "Password should contain at least 1 uppercase letter 1 lowercase letter 1 number and 1 character";
                    }
                }

                if(empty($_POST['registerPassword-repat'])){
                    $errors['password-repat'] = "Email can't be empty";
                }
                else {
                        $password_repat = $_POST['registerPassword-repat'];
                        if ($password != $password_repat) {
                            $errors['password-repat'] = "Bad";
                        }

                }


                //If form have errors or if it does not
                if (!array_filter($errors)){
                        //If form does not have errors
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $createUserSql = "INSERT INTO Users(userName,userEmail,userPassword) VALUES ('$name','$email','$hash')";
                        if (mysqli_query($conn, $createUserSql)) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $createUserSql . "<br>" . mysqli_error($conn);
                        }
                    }
                else {
                        //If form have erros
                        echo 'Bad';

                }
            }



            ?>



            <form action="Register.php" method="POST">
                <div class="container">
                    <h1>Register</h1>
                    <p>Please fill in this form to create an account.</p>
                    <hr>

                    <label for="registerName"><b>Name</b></label>
                    <input type="text" placeholder="Enter Name..." name="registerName" >
                    <p class="red-Text"><?php echo  $errors['name']?></p>


                    <label for="registerEmail"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email..." name="registerEmail" >
                    <p class="red-Text"><?php echo  $errors['email']?></p>


                    <label for="registerPassword"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password..." name="registerPassword" >
                    <p class="red-Text"><?php echo  $errors['password']?></p>


                    <label for="registerPassword-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password..." name="registerPassword-repat" >
                    <p class="red-Text"><?php echo $errors['password-repat'] ?></p>
                    <hr>
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                    <input type="submit" name="registerSubmit" class="registerbtn" value="Register" >
                </div>

                <div class="container signin">
                    <p>Already have an account? <a href="#">Sign in</a>.</p>
                </div>
            </form>


        </div>
    </div>
</section>

    <?php
        include 'Footer.php';
    ?>





<script type="text/javascript">
    //auto expand textarea
    function adjust_textarea(h) {
        h.style.height = "20px";
        h.style.height = (h.scrollHeight)+"px";
    }
</script>
</body>
</html>
