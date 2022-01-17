<?php
//Require reservation data to use variable in this file
/** @var $db */
require_once "..//includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM form";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$form = [];
while ($row = mysqli_fetch_assoc($result)) {
    $form[] = $row;
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
    <p><a href="homepage.php">Back homepage</a></p>
</div>

    </nav>

</head>
<body>
<header>
    <h1>Reservations list</h1>
</header>

<section>

    <ul>
        <h4>
            <li>  <a href="create.php">Make new reservation</a>

            <h4>
    </ul>
    </div>

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
    </tbody>
</table>
</section>

</body>
</html>
<footer>
</footer>