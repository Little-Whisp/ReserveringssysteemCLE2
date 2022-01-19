<!--# ReserveringssysteemCLE2-->
<?php
//I want to check if the user is logged in or not
if(isset($_SESSION['loggedInUser'])) {
    $login = true;
} else {
    $login = false;
}
?>

<doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link href="http://fonts.cdnfonts.com/css/avenir-next-lt-pro" rel="Stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../Stylesheet/Stylesheet.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Kalender</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/><link
            href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
<head/>
<!-- Nav-->
<nav>
    <div>
        <p><a href="theread.php">Reserveringen lijst</a></p>
    </div>
</nav>
<!-- Nav ends-->



<!-- Side menu-->
<div class="left-col">
<h3>Trainingen</h3>
<ul>
    <h4>
    <li><a href="create.php">Systeemtraining</a></li>
    <li><a href="Extra/Communicatie-training.php">Communicatietraining</a></li>
    <li><a href="Extra/Kennisinhoudelijke-trainingen.php">Kennisinhoudelijke trainingen</a></li>
    <li><a href="Extra/Opfris-trainingen.php">opfris trainingen</a></li>
    <li><a href="Extra/Coachings.php">Coachings</a></li>
    <h4>
</ul>
</div>
<!-- Side menu end-->


<!-- Calender-->
    <div class="center-col">
        <div class="container">
            <div class="calendar">
                <div class="month">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                        <h1></h1>
                        <p></p>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days"></div>


    <script src="Extra/script.js"></script>
            <!-- Calender end-->

    <footer><a href="../loginscreen/logoutpage.php">Logout</a></footer>



</html>