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
    <form method="POST" action="index.php">  
        <label for="numword">How many words would you like in your password? (Max 9)</label>
        <input type="number" name="numword" min="1" max="9"><br>
        <label for="numcheck">Add a number</label>
        <input type="checkbox" name="numcheck"><br>
        <label for="symcheck">Add a special symbol</label>
        <input type="checkbox" name="symcheck"><br>
        <input type="submit" name="go" value="Generate your password!"><br>
    </form>
    <?php if(isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif ?>
</body>
</html>