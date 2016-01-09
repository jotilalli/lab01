
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
        }
        //Parameter check error message
        else
            $game = new Game('---------');

//ERROR CHECKING: Making sure that the length of URL is 9
        if (strlen($position) != 9) {
            echo "Error: <br /> Enter only 9 values in the URL <br /><br /> i.e. /?board=-xx-oo-xx-";
        } else {


            $game = new Game($position);

            //INVOKING METHODS
            $game->pick_move();     //calling the pick_move method
            $game->display();       //calling the display method


            if ($game->winner('x')) {
                echo'iWin. ';
            } else if ($game->winner('o')) {
                echo'You win. ';
            } else
                echo'No winner yet, but you are losing.';
        }
        ?>

    </body>
</html>

<?php

class Game {

    var $position;

    function __construct($squares) {
        $this->position = str_split($squares);
    }

    //function to create cell for the board
    function show_cell($which) {

        $token = $this->position[$which];

        //deal with the easy case
        if ($token <> '-')
            return '<td>' . $token . '</td>';


        //now the hard case
        $this->new_position = $this->position;       // copy the original
        $this->new_position[$which] = 'o';           // this would be their move
        $move = implode($this->newposition);        // make a string from the board array
        $link = '?board=' . $move;                     // this is what we want the link to be
        // so return a cell containing an anchor and showing a hyphen

        return '<td><a href="' . $link . '">-</a></td>';
    }

    function pick_move() {

        //for loop iterates through the entire board
        for ($cell = 0; $cell < 8; $cell++) {

            //if this the cell is a dash put an X in it
            if ($this->position[$cell] == '-') {

                //place X in the following cell
                $this->position[$cell] = 'x';
                break;
            }
        }
    }

    //function to display the board
    function display() {
        echo'<table cols="3" style="font-size:large; font-weight:bold">';
        echo'<tr>'; //first row
        for ($pos = 0; $pos < 9; $pos++) {
            echo $this->show_cell($pos);
            if ($pos % 3 == 2)
                echo '</tr><tr>'; //next square is in a new row
        }
        echo'</tr>';
        echo'</table>';
    }

    function winner($token) {
        $won = false;

        //HORIZONTAL CHECK
        //check row from 0-3
        for ($row = 0; $row < 3; $row++) {
            $won = true;

            //check column from 0-3
            for ($col = 0; $col < 3; $col++) {

                //echo "row check for token " . $token . ": " . ($row + 1) . "," . ($col + 1) . " position: " . (3 * $row + $col);

                if ($this->position[3 * $row + $col] != $token) {
                    $won = false;
                }
                // echo " result: " . $won . "<br/>";
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

                //echo "col check for token " . $token . ": " . ($col + 1) . "," . ($row + 1) . " position: " . (3 * $row + $col);

                if ($this->position[3 * $row + $col] != $token) {
                    $won = false;
                }

                //echo " result: " . $won . "<br/>";
            }
            if ($won) {
                return $won;
            }
        }

        //DIAGONAL CHECK
        if
        (($this->position[0] == $token) &&
                ($this->position[4] == $token) &&
                ($this->position[8] == $token)) {
            $won = true;
        } else if
        (($this->position[2] == $token) &&
                ($this->position[4] == $token) &&
                ($this->position[6] == $token)) {
            $won = true;
        }

        return $won;
    }

}
