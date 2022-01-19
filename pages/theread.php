<?php

/** @var $db */

//Require reservation data to use variable in this file.
require_once "../includes/database.php";

//Get the result set from the database with a SQL query.
$query = "SELECT * FROM form";

//Shows the result from what the query selected from the Form.
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array.
$form = [];
while ($row = mysqli_fetch_assoc($result)) {
    $form[] = $row;
}

//I want to check if the user is logged in or not
if(isset($_SESSION['loggedInUser'])) {
    $login = true;
} else {
    $login = false;
}

//Close connection
mysqli_close($db);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="https://freight.cargo.site/w/1000/i/342d3ecd769707cc69f3765beaeaddd06e772fe37d9d934f849e071e1889e817/feeble-basic-logo.png" />
    <title>Reservations</title>
    <link rel="stylesheet" href="../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">

    <nav>
        <div>
            <p><a href="homepage.php">Back to homepage</a></p>
        </div>
    </nav>


</head>
<body>
<section>
<header>
    <h1>Reservations list</h1>
</header>


<table>
    <thead>
    <tr>
        <th></th>
        <th>date</th>
        <th>time</th>
        <th>More</th>
    </tr>
    </thead>
    <tbody>
    <!--This is the list were the reservations will be saved-->
    <?php foreach ($form as $for) { ?>
        <tr>
            <td><?= $for['id'] ?></td>
            <td><?= $for['date'] ?></td>
            <td><?= $for['time'] ?></td>
<!--            <td><a href="detail.php?id=--><?//= $for['id'] ?><!--">Details</a></td>-->
            <td><a href="delete.php?id=<?= $for['id'] ?>">Delete</a></td>
            <td><a href="edit.php?id=<?= $for['id'] ?>">Edit</a></td>
        </tr>
    <?php } ?>
    <!--This is where the reservation list ends-->
    </tbody>
</table>
</section>
</body>
</html>

<footer><a href="create.php">Make new reservation</a></footer>