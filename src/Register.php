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

            $error = array('name'=>'','email'=>'','password'=>'','passwordRepat'=>'');
            if(isset($_POST['registerSubmit'])) {

                    if (empty($_POST('registerName'))) {
                        $error['name'] = "Emri nuk mund te jete i zbrazte";
                    } else {
                        $registerName = $_POST['registerName'];
                        if(!preg_match('/^[a-zA-Z]+$/',$registerName)){
                            $error['name'] = 'Emri duhet te permbaje vetem shkronja';
                        }
                    }

                    if(empty($_POST('registerEmail'))) {
                        $error['email'] = "Email nuk mund te jete i zbrazte";
                    } else {
                        $registerEmail = $_POST['registerEmail'];
                        if (!preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/',$registerEmail)) {
                            $error['email'] = 'Email duhet te jete ne formatin e saj';
                        }
                    }

                    if(empty($_POST('registerPassword'))) {
                        $error['password'] = "Passwordi nuk mund te jete i zbrazte";
                    } else {
                        $registerPassword = $_POST['registerPassword'];
                        if (!preg_match('/"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"/',$registerPassword)) {
                            $error['email'] = 'Passwordi i dobet. Passwordi duhet te permbaje te pakten 8 karaktere nje shkronje
                            tevogel nje te madhe te pakten nje numer te 1 special karakter';
                        }
                    }

                    if (empty($_POST('registerPassword-repat'))) {
                        $error['passwordRepat'] = "Email nuk mund te jete i zbrazte";
                    }
                    else {
                        if ($_POST['registerPassword']!= $_POST['registerPassword-repat']) {
                            $error['passwordRepat'] = "Passwordet nuk perputhen. Rishikoni perseri";
                        }
                    }

                    if(array_filter($error)){
                        //Ka errora
                    }
                    else {
                        //Nuk ka errora proceduro me tutje
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

                    <label for="registerEmail"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email..." name="registerEmail" >

                    <label for="registerPassword"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password..." name="registerPassword" >

                    <label for="registerPassword-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password..." name="registerPassword-repat" >
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

<footer>
    <p>Projekti ne lenden: <br /> Programimi ne internet</p>
</footer>






<script type="text/javascript">
    //auto expand textarea
    function adjust_textarea(h) {
        h.style.height = "20px";
        h.style.height = (h.scrollHeight)+"px";
    }
</script>
</body>
</html>
