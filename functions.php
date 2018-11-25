<?php
$names = array(
    'Rock',
    'Paper',
    'Scissors'
);

function check( $human, $computer ){
    if( empty($computer) && $computer != 0 ){
        return "Error";
    }
    if( $human === $computer ){
        return "Tie";
    }
    if      ( $human == 0 ){
        if      ( $computer == 1 ){
            return "You Lose";
        } elseif( $computer == 2 ){
            return "You Win";
        }
    } elseif( $human == 1 ){
        if      ( $computer == 0 ){
            return "You Win";
        } elseif( $computer == 2 ){
            return "You Lose";
        }
    } elseif( $human == 2 ){
        if      ( $computer == 0 ){
            return "You Lose";
        } elseif( $computer == 1 ){
            return "You Win";
        }
    }
}

function returnResultMessage( $human, $computer, $names ){
    $result = check( $human, $computer );
    return "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result";
}

function test( $names ){
    $msgArray = array();

    for ($computer=0; $computer<=2; $computer++) {
        for ($human=0; $human<=2; $human++) {
            $result = check($human, $computer);
            $msg = "Human=$names[$human] Computer=$names[$computer] Result=$result";
            array_push($msgArray, $msg);
        }
    }

    return $msgArray;
}
?>