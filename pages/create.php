<?php
/** @var mysqli $db */

//I want to check if the user is logged in or not


//If I click on submit I want to
// check if the form is submitted.
if (isset($_POST["submit"])) {

    //I use require_once to only make connection with the database when I use the submit button.
    require_once "../includes/database.php";

    /*These are for the SQL Injection*/
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    //I use require_once to only make connection with the form validation when I use the submit button
    //to check if all the needed information is filled out in the form.
    require_once "form-validation.php";

//If the form is empty you should see errors.
if (empty($errors)) {

        //I want to save the information to the database (form).
        $query = "INSERT INTO form (date, time) VALUES ('$date', '$time')";


    $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        //If the form is filled in, you will be redirected to the homepage.
        if ($result) {
            header('Location: homepage.php');
            exit;

        //Else it will show that there is something wrong in the database.
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
    <!-- If there is an error in the database it will show 'something went wrong in your database query'-->
    <?php if (isset($errors['db'])) { ?>
        <div><span class="errors"><?= $errors['db']; ?></span></div>
    <?php } ?>

    <!-- The form -->
    <section>
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
                <!-- If 'date' field is not filled in it will show error = 'Time can't be empty' -->
                <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
            </div>
            <div class="data-submit">
                <input type="submit" name="submit" value="Save"/>
            </div>
        </form>
        <!-- End the form -->
    </section>


</div>

<footer></footer>

</body>

</html>