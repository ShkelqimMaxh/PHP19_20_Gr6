<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Brad Traversy">
    <title>Acme Web Deisgn | Services</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/Todo.css">
  </head>
  <body>

  <?php include 'Header.php';
        include '../services/userDbConn.php';
  ?>



    <section id="main">
      <div class="container">
        <article id="main-col">
          <h1 class="page-title">Services</h1>

            <ul id="services">
            <?php
            session_start();
                if(isset( $_SESSION['firstname'] )){

                    $cookie_name = "activeUser";
                    $cookie_value = $_SESSION['firstname'];
                    setcookie($cookie_name, $cookie_value, time() + (3600 * 30), "/");

                    echo sprintf("Mireseerdhet: %s", $cookie_value);
                }
                else {
                    echo 'Ju nuk jeni i loguar';
                }

            //Get Todos
            $query = "SELECT * FROM todos WHERE userId='".$_SESSION['idUser']."' ORDER BY todoId desc";
            $result = mysqli_query($conn, $query);
            $todos = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);

            //Delete Records
            if(isset($_POST['deleteTodo'])){

                $activeTask = mysqli_real_escape_string($conn, $_POST['deleteTodo']);
                $deleteQuery = "DELETE FROM  todos WHERE todoId = {$activeTask}";

                if(mysqli_query($conn, $deleteQuery))
                {
                    $_SESSION['totalTodos']--;
                    header('Location: Services.php');
                }
                else {
                    echo "Bad";
                }

            }

            if(isset($_POST['editTodo'])) {
                $_SESSION['actualTodo'] = $_POST['edit'];
                header('Location:editpost.php');
            }

            ?>
            <?php foreach($todos as $todo):?>

                <li class="record">
                    <h1 id="title">         <?php echo $todo['todoTitle'];?></h1>
                    <p><span class="text">  <?php echo $todo['todoText'];?></span></p>
                    <form method='POST'>
                        <input type='hidden' name='deleteTodo' value='<?php echo $todo["todoId"];?>'>
                        <input class="deleteTodo\" type="submit" name="delete" value="X" >
                    </form>

                    <form method="POST">
                        <input type='hidden' name='edit' value='<?php echo $todo["todoId"];?>'>
                        <input type="submit" name="editTodo" value="Edit">
                    </form>

                </li>
                <?php endforeach;?>



          </ul>
        </article>

          <?php

          //Add new post to logged in user

          $errors = array('title'=> '','text' => '');

          if(isset($_POST['submitTodo'])) {

              if(empty($_POST['titleTodo'])){
                  $errors['title'] = 'Titulli nuk mund te jete i zbrazte';
              }
              if(empty($_POST['textTodo'])){
                  $errors['text'] = "Teksti nuk mund te jete i zbrazte";
              }

              if(!array_filter($errors)){
                  $title = htmlentities($_POST['titleTodo']);
                  $activeUser = $_SESSION["idUser"];
                  $text   = htmlentities($_POST['textTodo']);

                  $createTodoSql = "INSERT INTO todos(todoTitle,userId, todoText) VALUES ('$title','$activeUser','$text')";

                  if (mysqli_query($conn, $createTodoSql)) {
                      $_SESSION['totalTodos']++;
                      header('Location: Services.php');
                  } else {
                      echo "Error: " . $createTodoSql . "<br>" . mysqli_error($conn);
                  }
              }
          }


          ?>



        <aside id="sidebar">
          <div class="dark">
            <h3>Add or edit task</h3>
            <form class="quote" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  						<div>
  							<label>Title</label><br>
  							<input type="text" name='titleTodo' placeholder="Name"><br />
                            <label class="redText"><?php echo $errors['title']?></label>
  						</div>
  						<div>
  							<label>Text</label></span><br>
  							<input type="text" name="textTodo" placeholder="Message"><br />
                            <label class="redText"><?php echo $errors['text']?></label>
  						</div>
  						<input class="button_1" type="submit" name="submitTodo" value="Add Todo">
					</form>
          </div>
        </aside>
      </div>
    </section>

  <?php
    include 'Footer.php';
  ?>
  </body>
</html>
