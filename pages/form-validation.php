<?php
$errors = [];

/** @var $date */
/** @var $time */

/*I want a message that notifies me when I miss information in the form fields*/
if ($date == '') {
    $errors['date'] = 'Date cant be empty';
}
if ($time == '') {
    $errors['time'] = 'Time cant be empty';
}
