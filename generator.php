<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function generatepassword($numword, $numcheck, $symcheck) {
    $pwgen = array();
    
    $wordlist = file("words.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $posnum = range(0, 9);
    $possym = array("!", "@", "#", "$", "%", "&");

    shuffle($wordlist);

    for ($i = 0; $i < $numword; $i++) {
        array_push($pwgen, $wordlist[$i]);
    }

    if ($numcheck == "on") {
        $randnum = array_rand($posnum);
        array_push($pwgen, $posnum[$randnum]);
    }

    if ($symcheck == "on") {
        $randsym = array_rand($possym);
        array_push($pwgen, $possym[$randsym]);
    }

    shuffle($pwgen);
    $newpw = join("-", $pwgen);
    echo $newpw;
}

$numword = 0;
$numcheck = "";
$symcheck = "";

if(isset($_POST["go"])){
    if(isset($_POST["numword"])){ 
    $numword = $_POST["numword"]; 
        if($numword == "") {
            $error = "Please enter a number";
            return;
        }
    }

    if(isset($_POST["numcheck"])){ 
        $numcheck = $_POST["numcheck"]; } 

    if(isset($_POST["symcheck"])){ 
        $symcheck = $_POST["symcheck"]; } 

    generatepassword($numword, $numcheck, $symcheck);
}