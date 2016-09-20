<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Miranda Mu - P2</title>
    <link rel="stylesheet" href="css/main.css" />
    <?php require("generator.php"); ?>
</head>
<body>
   <p>Required = *</p>
    <form method="POST" action="index.php">  
        <label for="numWord">How many words would you like in your password? (Max 9)</label>
        <input type="number" name="numWord" min="1" max="9"><span> *</span><br>
        
        <label for="numCheck">Add a number</label>
        <input id="numCheck" type="checkbox" name="numCheck"><br>
        
        <label for="numNum">How many numbers would you like in your password? (Max 10)</label>
        <input type="number" name="numNum" min="1" max="10"><br>
        
        <label for="symCheck">Add a special symbol</label>
        <input id="symCheck" type="checkbox" name="symCheck"><br>
        
        <label for="numSym">How many symbols would you like in your password? (Max 6)</label>
        <input type="number" name="numSym" min="1" max="6"><br>
        
        <input type="submit" name="go" value="Generate your password!"><br>
    </form>
    <?php if(isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif ?>
    <?php if(isset($error2)): ?>
        <div class="error"><?php echo $error2; ?></div>
    <?php endif ?>
    <?php if(isset($error3)): ?>
        <div class="error"><?php echo $error3; ?></div>
    <?php endif ?>
    <?php if(isset($error4)): ?>
        <div class="error"><?php echo $error4; ?></div>
    <?php endif ?>
    <?php if(isset($error5)): ?>
        <div class="error"><?php echo $error5; ?></div>
    <?php endif ?>
    <?php if(isset($error6)): ?>
        <div class="error"><?php echo $error6; ?></div>
    <?php endif ?>
    <?php if(isset($error7)): ?>
        <div class="error"><?php echo $error7; ?></div>
    <?php endif ?>
    <?php if(isset($error8)): ?>
        <div class="error"><?php echo $error8; ?></div>
    <?php endif ?>
    <?php if(isset($error9)): ?>
        <div class="error"><?php echo $error9; ?></div>
    <?php endif ?>
    <br><br>
    <table>
        <tr>
            <td>placeholder</td>
        </tr>
        <tr>
            <td>another</td>
            <td>one</td>
        </tr>
    </table>
</body>
</html>