<?php
function count_vowels($text = "programmer")
{
    $low = strtolower($text);
    $arr = str_split($low);
    foreach ($arr as $data) {
        if ($data == 'a' or $data == 'i' or $data == 'u' or $data == 'e' or $data == 'o') {
            $hitung[] = $data;
        }
    }
    if (isset($hitung)) {
        echo count($hitung);
    } else {
        echo "0";
    }
}

echo count_vowels();
