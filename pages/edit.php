<?php
/** @var mysqli $db */


//I use this code to prefent deeplinks,
//and I want to check if the user is logged in or not.
if(isset($_SESSION['loggedInUser'])) {
    $login = true;
} else {
    $login = false;
        header("Location: index.php");
    exit;
}

$formId = $_GET['id'];

//Explained 'if (isset($_POST['submit'])) {' in the 'create.php'
if (isset($_POST['submit'])) {

    //I use require_once to only make connection with the database when I use the submit button.
    require_once "../includes/database.php";

    //These are for the SQL Injections//
    $date   = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);


    //Explained 'require_once "form-validation.php";' in the 'create.php'
    require_once "form-validation.php";

    //If the form is empty you should see errors.
    if (empty($errors)) {
        //Save the record to the database
        $query = "UPDATE form SET date='$date',time='$time' WHERE id='$formId'";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        //Explained 'if ($result) {' in the 'create.php'
        if ($result) {
            header('Location: theread.php');
            exit;

            //Explained '} else { $errors' in the 'create.php'
        } else {
            $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }


        //Close connection
        mysqli_close($db);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title> Edit page</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">
</head>


<body>
<header>
<h1>Edit reservation</h1>
    </header>

<section>
    <!-- The form -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="date">Date</label>
        <input id="date" type="date" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>"/>
        <!-- If 'date' field is not filled in it will show error = 'Date can't be empty' -->
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="time">Time</label>
        <input id="time" type="time" name="time" value="<?= isset($time) ? htmlentities($time) : '' ?>"/>
        <!-- If 'date' field is not filled in it will show error = 'Date can't be empty' -->
        <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
    <!-- End the form -->
<div>
    </section>
        <ul>
            <h1>
                <li><a href="theread.php">Back to the list</a></li>

                <h1>
        </ul>
</div>
</body>
</html>