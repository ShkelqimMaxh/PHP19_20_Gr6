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
                    echo sprintf("Mireseerdhet: %s", $_SESSION['firstname']);
                }
                else {
                    echo 'Ju nuk jeni i loguar';
                }


            $query = "SELECT * FROM todos WHERE userId='".$_SESSION['idUser']."'";
            $result = mysqli_query($conn, $query);
            $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);

            //Delete Records
            if(isset($_POST['deleteTodo'])){

                $activeTask = mysqli_real_escape_string($conn, $_POST['deleteTodo']);
                $deleteQuery = "DELETE FROM  todos WHERE todoId = {$activeTask}";

                if(mysqli_query($conn, $deleteQuery))
                {
                    echo "<script>window.onload(); </script>";
                }
                else {
                    echo "Bad";
                }
            }



        //Get Records
            foreach ($projects as $todo){
                echo (sprintf("<li class=\"record\">
                                              <div class=\"card\">
                                                <h1 id=\"title\">%s
                                                    <form method='POST'>
                                                        <input type='hidden' name='deleteTodo' value='%s']>
                                                        <input class=\"deleteTodo\" type=\"submit\" name=\"delete\" value=\"X\" >
                                                    </form>
                                                </span></h1>
                                                <span class=\"text\">%s</span>
                                                <p class=\"editTodo\">Edit this task</p>
                                              </div>
                                      </li>", $todo["todoTitle"],$todo['todoId'], $todo["todoText"]));
            }


            ?>

          </ul>
        </article>

        <aside id="sidebar">
          <div class="dark">
            <h3>Add or edit atsk</h3>
            <form class="quote">
  						<div>
  							<label>Title</label><br>
  							<input type="text" placeholder="Name">
  						</div>
  						<div>
  							<label>Email</label><br>
  							<input type="email" placeholder="Emial Address">
  						</div>
  						<div>
  							<label>Text</label><br>
  							<textarea placeholder="Message"></textarea>
  						</div>
  						<button class="button_1" type="submit">Send</button>
					</form>
          </div>
        </aside>
      </div>
    </section>

    <footer>
      <p>Acme Web Deisgn, Copyright &copy; 2017</p>
    </footer>
  </body>
</html>
