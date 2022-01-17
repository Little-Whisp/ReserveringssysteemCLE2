<?php
/** @var mysqli $db */

//I want to check if the form is submitted.
if (isset($_POST["submit"])) {

    require_once "..//includes/database.php";

    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    //Require database in this file & image helpers
    require_once "form-validation.php";


if (empty($errors)) {

        //I want to save the information to the database
        $query = "INSERT INTO form (date, time) VALUES ('$date', '$time')";



    $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        if ($result) {
            header('Location: homepage.php');
            exit;
        } else {
            $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
}
        //Close connection
        mysqli_close($db);

}

?>
<!doctype html>
<html lang="en">

    <title>Reservering maken</title>

    <nav>
        <div>
            <p><a href="homepage.php">Back to homepage</a></p>
        </div>
    </nav>

    <header>
        <link rel="stylesheet" href="../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">
        <h1>Syteemtraining aanvragen</h1>
    </header>
    <?php if (isset($errors['db'])) { ?>
        <div><span class="errors"><?= $errors['db']; ?></span></div>
    <?php } ?>

    <!-- The form -->
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
    </section>


</div>

<footer></footer>

</body>

</html>