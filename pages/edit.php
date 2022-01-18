<?php
/** @var mysqli $db */

$formId = $_GET['id'];
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {

    //I use require_once to only make connection with the database when I use the submit button.
    require_once "../includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $date   = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);


    //I use require_once to only make connection form validation
    require_once "form-validation.php";


    if (empty($errors)) {
        //Save the record to the database
        $query = "UPDATE form SET date='$date',time='$time' WHERE id='$formId'";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        if ($result) {
            header('Location: theread.php');
            exit;
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
<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="date">Date</label>
        <input id="date" type="date" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>"/>
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="time">Time</label>
        <input id="time" type="time" name="time" value="<?= isset($time) ? htmlentities($time) : '' ?>"/>
        <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
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