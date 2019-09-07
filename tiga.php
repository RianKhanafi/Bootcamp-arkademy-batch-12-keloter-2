<?php

function triangle($n = 3)
{
    for ($i = $n; $i > 0; $i--) {
        for ($j = $n - $i; $j > 0; $j--)
            echo "&nbsp;&nbsp;";
        for ($j = 2 * $i - 1; $j > 0; $j--)
            if ($i != 2) {
                echo "&nbsp$j";
            }
        echo "<br>";
    }
}
echo triangle();
