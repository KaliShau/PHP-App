<?php 
  session_start();

  $connect = require_once('../../core/db.php');

  if (!$_SESSION['user']) {
    header('Location: ../../../index.php');
     exit();
  };

  $result = mysqli_query($connect, 'SELECT * FROM posts;');

  $posts = []; 
  while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row; 
  }
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

    <div class="posts">
      <?php foreach ($posts as $post): ?>
        <div class="post glass">
          <?php if (!empty($post['image'])): ?>
            <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" />
          <?php endif; ?>
          
          <h2 class="post-title"><?= htmlspecialchars($post['title']) ?></h2>
          
          <?php if (!empty($post['content'])): ?>
            <p class="post-content"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

  </main>

</body>
</html>