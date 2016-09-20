<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$newPw = "";

function generatePassword($numWord, $numCheck, $numNum, $symCheck, $numSym) {
    global $newPw;
    
    $pwGen = array();
    
    $wordList = file("words.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $posNum = range(0, 9);
    $posSym = array("!", "@", "#", "$", "%", "&");

    shuffle($wordList);

    for ($i = 0; $i < $numWord; $i++) {
        array_push($pwGen, $wordList[$i]);
    }

    if ($numCheck == "on") {
        while($numNum > 0) {
            $randNum = array_rand($posNum);
            array_push($pwGen, $posNum[$randNum]);
            --$numNum;
        }
    }

    if ($symCheck == "on") {
        while($numSym > 0) {
            $randSym = array_rand($posSym);
            array_push($pwGen, $posSym[$randSym]);
            --$numSym;
        }
    }

    shuffle($pwGen);
    $newPw = join("-", $pwGen);
}

$numWord = "";
$numCheck = "";
$numNum = "";
$symCheck = "";
$numSym = "";

if(isset($_POST["go"])){
    if(isset($_POST["numWord"])){ 
    $numWord = $_POST["numWord"]; 
        if($numWord == "") {
            $error1 = "Please enter a number";
            return;
        }
        elseif(ctype_digit($numWord) == False) {
            $error2 = "Please enter a number";
            return;
        }
        elseif(($numWord < 1) or ($numWord > 9)) {
            $error3 = "Please enter a max number of 9";
            return;
        }
    }

    if(isset($_POST["numCheck"])){ 
        $numCheck = $_POST["numCheck"];
        if(isset($_POST["numNum"])) {
            $numNum = $_POST["numNum"];
            if(ctype_digit($numNum) == False) {
                $error4 = "Please enter a number";
                return;
            }
            elseif($numNum > 10) {
                $error5 = "Please enter a max number of 10";
                return;
            }
        } 
    }
    elseif((isset($_POST["numCheck"]) != True) and ($_POST["numNum"] > 0)) {
        $error6 = "Please make sure 'Add a number' is checked";
        return;
    }

    if(isset($_POST["symCheck"])){ 
        $symCheck = $_POST["symCheck"];
        if(isset($_POST["numSym"])) {
            $numSym = $_POST["numSym"];
            if(ctype_digit($numSym) == False) {
                $error7 = "Please enter a number";
                return;
            }
            elseif($numSym > 6) {
                $error8 = "Please enter a max number of 6";
                return;
            }
        } 
    }
    elseif((isset($_POST["symCheck"]) != True) and ($_POST["numSym"] > 0)) {
        $error9 = "Please make sure 'Add a symbol' is checked";
        return;
    }

    generatePassword($numWord, $numCheck, $numNum, $symCheck, $numSym);
    
    return $newPw;
}