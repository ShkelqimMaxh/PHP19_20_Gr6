<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Todo.css">
</head>

<body>
<?php
session_start();
include 'Header.php';
include '../services/userDbConn.php';


$activeUser =$_SESSION['actualTodo'];


if(isset($_POST['editTodoSubmit'])) {
    $newTitle =  $conn ->real_escape_string($_POST['editTodoTitle']);
    $newText   = $conn ->real_escape_string($_POST['editTodoText']);



    $sql = "UPDATE todos SET todoTitle='". $newTitle ."', todoText='" . $newText . "' WHERE `todoId` = " . $activeUser;

    if ($conn->query($sql) === TRUE) {
        header('Location: Services.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}

?>

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