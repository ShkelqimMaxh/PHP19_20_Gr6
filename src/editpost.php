<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/Todo.css">
    </head>

    <body>
    <?php

            include 'Header.php';
            include '../services/userDbConn.php';


            $activeUser = $_GET['id'];


            if(isset($_POST['editTodoSubmit'])) {
                $newTitle = $_POST['editTodoTitle'];
                $newText   = $_POST['editTodoText'];


                $sql = "UPDATE todos SET todoTitle='". $newTitle ."', todoText='" . $newText . "' WHERE todoId='". $activeUser . "'";

                if ($conn->query($sql) === TRUE) {
                    Header("Location: ../src/services.php");
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }



    ?>




    <div class="content">
        <div class="todoToUpdate">
            <h1><span class="redText">Title:</span><?php    ?></h1>
            <h3><span class="redText">Text</span><?php     ?></h3>
        </div>



        <div class="editTodoDiv">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="title">Task title</label>
                <input type="text" id="title" name="editTodoTitle" placeholder="Your name.." required>

                <label for="lname">Todo text</label>
                <input type="text" id="text" name="editTodoText" placeholder="Your last name.." required>

                <input type="submit" name="editTodoSubmit" value="Submit">
            </form>
        </div
    </div>
    </body>
</html>
