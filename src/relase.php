<html lang="en">
    <head>
        <style>
            input{
                margin: 3%;
                width: 20%;
            }
        </style>
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>Relase a new version</title>

    </head>

    <body>
        <?php
            include 'Header.php';
        ?>

    <div class="container">
        <h3>Search Users</h3>
        <form>
            Search User: <input type="text" id="txtInput" class="form-control" onkeyup="showSuggestion()">
        </form>
        <p>Suggestions: <span id="output" style="font-weight:bold"></span></p>



        <br /> <br />
        <h3>Relase a new version</h3>
        <p style="font-size: 0.8em">If you relase a new version everybody in subscribers list will get a new email with message: <span>THE NEW VERSION IS HERE AND A LINK OF WEBPAGE</p>


        <form action="../services/subscribers.php" method="POST">
            <input type="submit" name="relaseNewVersion" value="RELASE">
        </form>

    </div>

        <?php
             include 'Footer.php';
        ?>
        <script src="js/showUsers.js"></script>
    </body>
</html>
