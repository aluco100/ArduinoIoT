<?php
$sensor = $_REQUEST["input"];
$time = date("h:i:s");

$link = mysqli_connect("173.194.238.124", "aluco100", "", "ardulioDB") or die(mysqli_error());

$query = "INSERT INTO data(sensor,hour) VALUES(".$sensor.",'".$time."')";

mysqli_query($link, $query) or die(mysqli_error($link));

mysqli_close($link);