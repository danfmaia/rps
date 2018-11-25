<!DOCTYPE HTML>

<?php
if( ! isset($_GET['name']) || strlen($_GET['name']) < 1 ){
    die("Name parameter missing");
} else {
    $name = $_GET['name'];
}

if( isset($_POST['logout']) ){
    header('Location: index.php');
    return;
}

$human = ( isset($_POST['human']) ? $_POST['human']+0 : -1 );
if( $human == -1 ){
    $msg = "Please select a strategy and press Play.";
} elseif( $human == 3 ){
    include 'functions.php';
    $msgArray = test( $names );
} else {
    include 'functions.php';
    $computer = rand(0,2);
    $msg = returnResultMessage( $human, $computer, $names );
}
?>

<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='css/style.css'>
    <title> Dan Maia's Rock Paper Scissors - 6e361e90 </title>
</head>

<body>
    <div id='fb'>
        <header>
            <h1> Dan Maia's Rock Paper Scissors </h1>
            <p> Welcome, <?= htmlentities($name) ?>. </p>
        </header>

        <form class='box' method='post'>
            <select name="human">
                <option value="-1" selected="selected">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play" class="button" >
            <input type="submit" class="button" name="logout" value="Logout">
            <p>
                <?php
                if( isset($msg) ){
                    echo $msg;
                }
                if( isset($msgArray) ){
                    foreach( $msgArray as $msg ){
                        echo "$msg<br>";
                    }
                }
                ?>
            </p>
        </form>
    </div>
</body>
</html>