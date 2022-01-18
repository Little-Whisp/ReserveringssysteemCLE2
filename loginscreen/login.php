<?php
session_start();

if(isset($_SESSION['loggedInUser'])) {
    $login = true;
} else {
    $login = false;
}

/** @var mysqli $db */
require_once "../includes/database.php";


/*These are for the SQL Injection*/
if (isset($_POST['submit'])) {
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $errors = [];
    if($email == '') {
        $errors['email'] = 'Fill in your email';
    }
    if($password == '') {
        $errors['password'] = 'Fill in your password';
    }

    if(empty($errors))
    {
        //I want to get information based on the email
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $login = true;

                $_SESSION['loggedInUser'] = [
                    'email' => $user['email'],
                    'id' => $user['id']
                ];


            } else {
                //Error if your login information is incorrect
                $errors['loginFailed'] = 'The combination of the email and password are not known';
            }
        } else {
            //Error if your login information is incorrect
            $errors['loginFailed'] = 'The combination of the email and password are not known';
        }

        if ($result) {
            header('Location: secure.php');
            exit;
        }

    }
}
?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Stylesheet/Stylesheet.css" />

    <title>Login</title>
</head>
<body>

<h2>log in</h2>

<section>

<?php if ($login) { ?>
    <p>You are loggen in!</p>
    <p><a href="logoutpage.php">Log out</a> / <a href="secure.php">To secure page</a></p>

<?php } else { ?>
    <form action="" method="post">
        <div>
            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="<?= $email ?? '' ?>"/>
            <span class="errors"><?= $errors['email'] ?? '' ?></span>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input id="password" type="password" name="password" />
            <span class="errors"><?= $errors['password'] ?? '' ?></span>
        </div>
        <div>
            <p class="errors"><?= $errors['loginFailed'] ?? '' ?></p>
            <input type="submit" name="submit" value="Login"/>
        </div>
    </form>

    <ul>
        <h1>
            <li><a href="register.php">Don't have an account yet?</a></li>

            <h1>
    </ul>
</section>
<?php } ?>

</body>
</html>