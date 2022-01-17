<?php
///** @var mysqli $db */
//
//// redirect when uri does not contain a id
//if(!isset($_GET['id']) || $_GET['id'] == '') {
//    // redirect to homepage.php
//    header('Location: theread.php');
//    exit;
//}
//
////Require database in this file
//require_once "includes/database.php";
//
////Retrieve the GET parameter from the 'Super global'
//$albumId = mysqli_escape_string($db, $_GET['id']);
//
////Get the record from the database result
//$query = "SELECT * FROM form WHERE id = '$albumId'";
//$result = mysqli_query($db, $query)
//or die ('Error: ' . $query );
//
//if(mysqli_num_rows($result) != 1)
//{
//    // redirect when db returns no result
//    header('Location: theread.php');
//    exit;
//}
//
//$album = mysqli_fetch_assoc($result);
//
////Close connection
//mysqli_close($db);
//?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <title>Music Collection Details</title>-->
<!--    <meta charset="utf-8"/>-->
<!--    <link rel="stylesheet" type="text/css" href="css/style.css"/>-->
<!--</head>-->
<!--<body>-->
<!--<h1>--><?//= $album['artist'] . ' - ' . $album['name'] ?><!--</h1>-->
<!---->
<!--<div>-->
<!--    <img src="images/--><?//= $album['image'] ?><!--" alt=""/>-->
<!--</div>-->
<!--<ul>-->
<!--    <li>Year:   --><?//= $album['year'] ?><!--</li>-->
<!--    <li>Tracks: --><?//= $album['tracks'] ?><!--</li>-->
<!--</ul>-->
<!--<div>-->
<!--    <a href="homepage.php">Go back to the list</a>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->