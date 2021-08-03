<?php
include "";
//create empty
$myArray = [];
//loop through db results
foreach($appointments as $appointment):

$events = [
    'title'=>$appointment->behandelingID,
    'start'=>$appointment->startdatetime,
    'end'=>$appointment->enddatetime
];
//merge data in container (myArray)
array_merge($events, $myArray);

endforeach;
//push to Javascript FullCalendar
echo json_encode($myArray);

// echo 'hi';