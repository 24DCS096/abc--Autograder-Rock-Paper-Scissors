<?php
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die("Name parameter missing");
}

// Handle logout
if (isset($_POST['logout'])) {
    header("Location: index.php");
    return;
}

$name = htmlentities($_GET['name']);
$human = isset($_POST['human']) ? $_POST['human'] : -1;
$names = array("Rock", "Paper", "Scissors");
$computer = rand(0, 2);
$result = false;

function check($computer, $human) {
    if ($human == $computer) {
        return "Tie";
    } elseif (($human == 0 && $computer == 2) ||
              ($human == 1 && $computer == 0) ||
              ($human == 2 && $computer == 1)) {
        return "You Win";
    } else {
        return "You Lose";
    }
}

if ($human != -1) {
    $result = check($computer, $human);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors - ba63c271</title>
</head>
<body>
    <h1>Rock Paper Scissors</h1>
    <p>Welcome: <?= $name ?></p>

    <form method="post">
        <select name="human">
            <option value="-1">--Select--</option>
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
        </select>
        <input type="submit" value="Play">
        <input type="submit" name="logout" value="Logout">
    </form>

    <?php
    if ($human == -1) {
        echo "<p>Please select a strategy and press Play.</p>";
    } else {
        echo "<p>Your Play={$names[$human]} Computer Play={$names[$computer]} Result=$result</p>";
    }
    ?>
</body>
</html>
