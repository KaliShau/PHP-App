<?php 
  session_start();

  $connect = require_once('../../core/db.php');

  if (!$_SESSION['user']) {
    header('Location: ../../../index.php');
     exit();
  };
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/home.scss"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Test PHP APP</title>
</head>
<body >
    
  <aside>
    <h2>PHP APP</h2>
    <a href="../home/home.php">Home</a>
    <a href="./posts.php">Posts</a>
    <a href="./createPost.ui.php">Create post</a>
  </aside>
  
  <main>

  <div class="glass">


  <h1>Create post</h1>
    <form class="form" action='./createPost.php' method='POST' enctype="multipart/form-data">
      <div>

        <label>Заголовок</label>
        <input name="title" type="text" placeholder="Введите загаловок">
        
        <label>Содержание</label>
        <input name="content" type="text" placeholder="Напишите содержание">
        
        <label>Картинка</label>
        <input name="image" type="file" placeholder="Напишите содержание">
        <button type="submit">Добавить</button>
        
        <?php if ($_SESSION['error']) {
          echo '<p>'. $_SESSION['error'] .'</p>';
          unset($_SESSION['error']);
        } 
        ?>
      </div>
    </form>

  </div>

  </main>

</body>
</html>