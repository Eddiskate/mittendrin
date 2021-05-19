<?php

#date_default_timezone_set(‘Europe/Bucharest’); //Change this to your time/zone
$datafile = "data.txt"; //How is named the txt file?
$lines2display = 3; //How many entries to display?
$pswd = "WczasowA"; //The password set in rdj options

file_put_contents('songname_region.txt', str_replace('%20',' ',$_GET['title']));