<!DOCTYPE HTML>

<?php
session_start();

// Enters here only in POST request.
if( isset($_POST['who']) ) {
    $who = ( !empty($_POST['who']) ? $_POST['who'] : '' );
    $pass = ( !empty($_POST['pass']) ? $_POST['pass'] : '' );
    $_SESSION['message'] = false;
    $userbase = array(
        'guest' => '1a52e17fa899cf40fb04cfc42e6352f1',
        'danilofmaia' => '1a52e17fa899cf40fb04cfc42e6352f1',
        'ricardo' => 'a5411b673b7e6f7f5f5bcedfc5a019b0'
    );

    if( !empty($who) && !empty($pass) ){
        $error_message = 'Incorrect password';
        $salt = 'XyZzy12*_';

        if (!isset($userbase[$who])) {
            $_SESSION['message'] = $error_message;
        } else {
            $check = hash('md5', $salt . $pass);
            if ( $check == $userbase[$who] ) {
                session_destroy();
                // Redirects to game.php using GET request and $who as parameter.
                // This is not secure! Easily hackable. Check how to redirect using POST request!
                header('Location: game.php?name='.urlencode($who));
                exit;
            } else {
                $_SESSION['message'] = $error_message;
            }
        }
    }

    // Redirects to this same page using GET request.
    header('Location: login.php');
    return;
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
        </header>

        <form class="box" method="post">
            <p>
                <label for='who'>Username: </label>
                <input type='text' name='who' id='who' size='20' value=''>
            </p>
            <p>
                <label for='who'>Password: </label>
                <input type='password' name='pass' id='pass' size='20' value=''>
            </p>
            <p>
                <input type='submit' class='button' value='Log In'>
                <input type='submit' class='button' value='Play'>
            </p>
            <?php
            if( isset($_SESSION['message']) && $_SESSION['message'] != false ){
                echo "<p id='error'>";
                echo    ( htmlentities($_SESSION['message']) );
                echo "</p>";
                echo "<p id='login_tip'>";
                echo    "Use <span class='pre'>guest</span> as username and <span class='pre'>php123</span> as password.";
                echo "</p>";
                
                session_destroy();
            }
            ?>
        </form>
    </div>

</body>
</html>
