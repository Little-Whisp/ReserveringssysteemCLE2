<?php
/** @var mysqli $db */

//Require from data to use variable in this file.
require_once "../includes/database.php";


if (isset($_POST['submit'])) {
    $formId = mysqli_escape_string($db, $_POST['id']);
    //Get the id from the form.
    $query = "SELECT * FROM form WHERE id = '$formId'";
    // Get the form from the database result.
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    $form = mysqli_fetch_assoc($result);

    // Remove the form data from the database with the existing formId.
    $query = "DELETE FROM form WHERE id = '$formId'";
    mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

    //Close connection.
    mysqli_close($db);

    //Redirect to homepage after deleting your reservation.
    header("Location: theread.php");
    exit;

} else if (isset($_GET['id']) || $_GET['id'] != '') {
    //Retrieve the GET parameter from the 'Super global (info after ? in url)'
    $formId = mysqli_escape_string($db, $_GET['id']);

    //Get the form from the database result
    $query = "SELECT * FROM form WHERE id = '$formId'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    if (mysqli_num_rows($result) == 1) {
        $form = mysqli_fetch_assoc($result);
    } else {
        // redirect when db returns no result
        header('Location: theread.php');
        exit;
    }
} else {
    // Id was not present in the url OR the form was not submitted
    // redirect to theread.php (reservation list)
    header('Location: theread.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete - <?= $form['date'] ?></title>
</head>
<body>
<h2>Delete - <?= $form['date'] ?></h2>
<section>
    <div class="data-field">
        <form action="" method="post">
            <p>
                Are you sure that you want to delete this reservation? "<?= $form['date'] ?>"
            </p>
            <input type="hidden" name="id" value="<?= $form['id'] ?>"/>
            <input type="submit" name="submit" value="delete"/>
    </div>
</section>
</form>
</body>
</html>