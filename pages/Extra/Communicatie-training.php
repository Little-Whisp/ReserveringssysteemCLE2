<?php
/** @var mysqli $db */

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $Datum = mysqli_escape_string($db, $_POST['Datum']);
    $Tijd  = mysqli_escape_string($db, $_POST['Tijd']);

    //Require the form validation handling
    require_once "formvalidation.php";


    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO form (Datum, Tijd)
                  VALUES ('$Datum', '$Tijd')";
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);

        if(mysqli_query($db, $query)) {
            echo 'toevoegen gelukt';
        } else {
            echo 'Toevoegen niet gelukt';
        }

        if ($result) {
            header('Location: create.php');
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

<title>Reservering maken</title>
<meta charset="utf-8"/>
<link rel="Stylesheet" type="text/css" href="../../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">
</nav>

<head>
    <meta charset="utf-8" />
    <link href="http://fonts.cdnfonts.com/css/avenir-next-lt-pro" rel="Stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CMGT HTML CSS</title>
    <link rel="stylesheet" href="../../Stylesheet/Stylesheet.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"

</head>

<nav>
    <ul id="navigation">
        <div class="a"><a href="../homepage.php">Terug naar homepage </a>
    </ul>
</nav>

<h2>Communicatie Training aanvragen</h2>
<section>
    <div

    <?php if (isset($errors['db'])) { ?>
        <div><span class="errors"><?= $errors['db']; ?></span></div>
    <?php } ?>

    <!-- enctype="multipart/form-data" no characters will be converted -->
    <div class="data-field">
        <label for="Datum">Datum</label>
        <input id="Datum" type="date" name="Datum"
        <?= isset($Datum) ? $Datum : '' ?>
        <span class="errors"><?= isset($errors['Datum']) ? $errors['Datum'] : '' ?></span>

    </div>
    <div class="data-field">
        <label for="Tijd">Tijd</label>
        <input id="Tijd" type="time" name="Tijd" value=""
        <span class="errors"><?= isset($errors['Tijd']) ? $errors['Tijd'] : '' ?></span>

    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Submit"/>
    </div>

    <!--    Because I wanted to give this link another colour because the background is also a different colour-->
    <!--    I used classes to give them a different category-->

</section>

</div>

<footer></footer>

</body>

</html>

