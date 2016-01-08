
<html>
    <head>
        <meta charset="UTF-8">
        <title>Joti's Tic-Tac-Toe</title>
    </head>
    <body>


        <?php
        //check parameters are set
        if (isset($_GET['board'])) {

            $position = $_GET['board'];
            $squares = str_split($position);



            //function __construct($squares) {
            //    $this->position = str_split($squares);
            // }
            
            //ERROR CHECKING: Making sure that the length of URL is 9
            if (strlen($position) != 9) {
                echo "Error: <br /> Enter only 9 values in the URL <br /><br /> i.e. /?board=-xx-oo-xx-";
            } else {

                for ($x = 0; $x < 9; $x++) {
                    echo $squares[$x];
                    if (($x + 1) % 3 == 0) {
                        echo '<br />';
                    }
                }
                if (winner('x', $squares)) {
                    echo ' WooHoo! X wins.';
                } else if (winner('o', $squares)) {
                    echo 'Yippy! O wins.';
                } else {
                    echo 'Awwwee! No winner yet.';
                }
            }
        }
        //Parameter check error message
        else
            echo 'Error: <br /> add "  /?board=---------  " at the end of your URL link';
        ?>

    </body>
</html>

<?php

function winner($token, $position) {
    $won = false;

    //HORIZONTAL CHECK
    //check row from 0-3
    for ($row = 0; $row < 3; $row++) {
        $won = true;

        //check column from 0-3
        for ($col = 0; $col < 3; $col++) {

            echo "row check for token " . $token . ": " . ($row + 1) . "," . ($col + 1) . " position: " . (3 * $row + $col);

            if ($position[3 * $row + $col] != $token) {
                $won = false;
            }
            echo " result: " . $won . "<br/>";
        }
        if ($won) {
            return $won;
        }
    }



    //VERTICAL CHECK
    //check column from 0-3
    for ($col = 0; $col < 3; $col++) {
        $won = true;

        //check row from 0-3
        for ($row = 0; $row < 3; $row++) {

            echo "col check for token " . $token . ": " . ($col + 1) . "," . ($row + 1) . " position: " . (3 * $row + $col);

            if ($position[3 * $row + $col] != $token) {
                $won = false;
            }

            echo " result: " . $won . "<br/>";
        }
        if ($won) {
            return $won;
        }
    }

    //DIAGONAL CHECK
    if
    (($position[0] == $token) &&
            ($position[4] == $token) &&
            ($position[8] == $token)) {
        $won = true;
    } else if
    (($position[2] == $token) &&
            ($position[4] == $token) &&
            ($position[6] == $token)) {
        $won = true;
    }

    return $won;
}
