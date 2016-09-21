<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Miranda Mu - Password Generator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css" />
    <?php require("generator.php"); ?>
</head>
<body>
   <section>
    <p>Tired of using your usual password? Looking for some inspiration to keep your sensitive accounts protected? Look no further! Our password generator does the work for you.</p>
    <ul>
        <li>Choose how many words you'd like to include in your password. (We recommend at least 2)</li>
        <li>Additional options include adding numbers or special symbols (e.g. "!", "@", "#", etc.) -- just be sure to check the appropriate box!</li>
        <li>Required = <strong class="requiredast">***</strong></li>
    </ul>
    </section>
    
    <h1>Random Password Generator</h1>
    <form method="POST" action="index.php">
        <fieldset>
            <legend>Words</legend>
            <label for="numWord">How many words would you like in your password? (Max 9)</label>
            <input type="number" name="numWord" min="1" max="9" required><strong class="requiredast"> ***</strong>
            <?php if(isset($error)): ?>
                <span class="error"><?php echo $error1; ?></span>
            <?php endif ?>
            <?php if(isset($error2)): ?>
                <span class="error"><?php echo $error2; ?></span>
            <?php endif ?>
            <?php if(isset($error3)): ?>
                <span class="error"><?php echo $error3; ?></span>
            <?php endif ?><br><br>
        </fieldset>
        
        <fieldset>
           <legend>Numbers</legend>
            <label for="numCheck">Add a number</label>
            <input id="numCheck" type="checkbox" name="numCheck">
            <?php if(isset($error6)): ?>
                <span class="error"><?php echo $error6; ?></span>
            <?php endif ?><br>

            <label for="numNum">How many numbers? (Max 10)</label>
            <input type="number" name="numNum" min="1" max="10">
            <?php if(isset($error4)): ?>
                <span class="error"><?php echo $error4; ?></span>
            <?php endif ?>
            <?php if(isset($error5)): ?>
                <span class="error"><?php echo $error5; ?></span>
            <?php endif ?><br><br>
        </fieldset>
        
        <fieldset>
            <legend>Special Symbols</legend>
            <label for="symCheck">Add a special symbol</label>
            <input id="symCheck" type="checkbox" name="symCheck">
            <?php if(isset($error9)): ?>
                <span class="error"><?php echo $error9; ?></span>
            <?php endif ?><br>

            <label for="numSym">How many symbols? (Max 6)</label>
            <input type="number" name="numSym" min="1" max="6">
            <?php if(isset($error7)): ?>
                <span class="error"><?php echo $error7; ?></span>
            <?php endif ?>
            <?php if(isset($error8)): ?>
                <span class="error"><?php echo $error8; ?></span>
            <?php endif ?><br><br>
        </fieldset>
        
        <input type="submit" name="go" value="Generate your password!">
    </form>
    
    <br>
    <div id="pwbox">
        <?php if(isset($newPw)): ?>
            <span id="newpw"><?php echo $newPw; ?></span>
        <?php endif ?>
    </div>
       
</body>
</html>