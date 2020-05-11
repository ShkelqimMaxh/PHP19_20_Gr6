<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
            include 'Header.php';

            if(isset($_POST['uploadFile'])) {
                if ($_FILES['file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'])) { //checks that file is uploaded
                    echo file_get_contents($_FILES['file']['tmp_name']);
                }
            }

        ?>
    <div class="kriteretProjektit">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label> <input type="file" name="file" id="file"/>
            <input type="submit" name="uploadFile" value="Submit">
        </form>
    </div>

    </body>
</html>