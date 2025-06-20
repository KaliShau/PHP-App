<?php 
    session_start();

    if ($_SESSION['user']) {
        header('Location: ./src/pages/home/home.php');
      };
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/auth.scss"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Test PHP APP</title>
</head>
<body class="bg-image">
    
    <!-- SignIn form -->

    <div class="glass">

    <h1>Форма входа</h1>
    <form action='./src/pages/sign-in/signIn.php' method='POST'>
        <label>Логин</label>
        <input name="login" type="text" placeholder="Введите логин">

        <label>Пароль</label>
        <input name="password" type="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>

        <a href="./src/pages/sign-up/signUp.ui.php">Переход к регистрации</a>

        <?php if ($_SESSION['error']) {
            echo '<p>'. $_SESSION['error'] .'</p>';
            unset($_SESSION['error']);
        } 
        ?>
    </form>

    </div>

</body>
</html>