<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function generatepassword($numword, $numcheck, $numnum, $symcheck, $numsym) {
    $pwgen = array();
    
    $wordlist = file("words.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $posnum = range(0, 9);
    $possym = array("!", "@", "#", "$", "%", "&");

    shuffle($wordlist);

    for ($i = 0; $i < $numword; $i++) {
        array_push($pwgen, $wordlist[$i]);
    }

    if ($numcheck == "on") {
        while($numnum > 0) {
            $randnum = array_rand($posnum);
            array_push($pwgen, $posnum[$randnum]);
            --$numnum;
        }
    }

    if ($symcheck == "on") {
        while($numsym > 0) {
            $randsym = array_rand($possym);
            array_push($pwgen, $possym[$randsym]);
            --$numsym;
        }
    }

    shuffle($pwgen);
    $newpw = join("-", $pwgen);
    echo $newpw;
}

$numword = "";
$numcheck = "";
$numnum = "";
$symcheck = "";
$numsym = "";

if(isset($_POST["go"])){
    if(isset($_POST["numword"])){ 
    $numword = $_POST["numword"]; 
        if($numword == "") {
            $error = "Please enter a value";
            return;
        }
        elseif(ctype_digit($numword) == False) {
            $error2 = "Please enter a number";
            return;
        }
        elseif(($numword < 1) or ($numword > 9)) {
            $error3 = "Please enter a number between 1 and 9";
            return;
        }
    }

    if(isset($_POST["numcheck"])){ 
        $numcheck = $_POST["numcheck"];
        if(isset($_POST["numnum"])) {
            $numnum = $_POST["numnum"];
            if(ctype_digit($numnum) == False) {
                $error4 = "Please enter a number!!";
                return;
            }
            elseif($numnum > 10) {
                $error5 = "Please enter a maximum number of 10!!";
                return;
            }
        } 
    }
    elseif((isset($_POST["numcheck"]) != True) and ($_POST["numnum"] > 0)) {
        $error6 = "Please check 'add a number'";
        return;
    }

    if(isset($_POST["symcheck"])){ 
        $symcheck = $_POST["symcheck"];
        if(isset($_POST["numsym"])) {
            $numsym = $_POST["numsym"];
            if(ctype_digit($numsym) == False) {
                $error7 = "Please enter a number!!!!";
                return;
            }
            elseif($numsym > 6) {
                $error8 = "Please enter a maximum number of 6!!";
                return;
            }
        } 
    }
    elseif((isset($_POST["symcheck"]) != True) and ($_POST["numsym"] > 0)) {
        $error9 = "Please check 'add a symbol'";
        return;
    }

    generatepassword($numword, $numcheck, $numnum, $symcheck, $numsym);
}