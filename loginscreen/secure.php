<?php
session_start();

//May I even visit this page?
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit;
}


//Get email from session
$email = $_SESSION['loggedInUser']['email'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">
    <title>Veilige pagina</title>
</head>
<section>
<body>
<h2>Secure page</h2>
<!--This is only accessible page when you're logged in-->
<p>You are logged in!.</p>
<p>Welkom, <?= $email ?></p>
<p>
<ul>
    <h1>
        <li><a href="logoutpage.php">logout</a></li>

        <h1>
</ul>
</p>

<p>
<ul>
    <h1>
        <li><a href="../pages/homepage.php">Homepage</a></li>

        <h1>
</ul>
</p>

</body>
</section>
</html>