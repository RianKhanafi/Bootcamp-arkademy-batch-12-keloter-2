<?php
function groupNumber($number = "993141 -1 1323 -09-787772")
{
    $arr = explode(
        " ",
        str_replace(
            array("", "-"),
            " ",
            $number
        )
    );
    $arrimpl = implode($arr);
    $arr = str_split($arrimpl);
    $cnt =  count($arr);
    $ples = 0;
    echo substr($arrimpl, 0, 3);
    for ($i = 1; $i <= floor($cnt / 3); $i++) {
        $ples += 3;
        // echo "-" . substr($arrimpl, $ples, 3);
        $data[] = "-" . substr($arrimpl, $ples, 3);
    }
    $cou_arr =  count($data);
    $arr_l = $data[$cou_arr - 2];
    $arr_r = end($data);
    $arr_all = $arr_l . $arr_r;
    $r = explode("-", $arr_all);
    $ia = implode($r);
    $str = str_split($ia);
    if (count($str) % 2 == 0) {
        for ($i = 0; $i < 1; $i++) {
            $hsatu =  "-" . substr($ia, 0, 2);
            $hdua = "-" . substr($ia, 2, 2);
            $hsl[] = $hsatu . $hdua;
        }
    } elseif (count($str) % 2 == 1) {
        for ($i = 0; $i < 1; $i++) {
            $hsatu =  "-" . substr($ia, 0, 3);
            $hdua = "-" . substr($ia, 2, 3);
            $htiga = "-" . substr($ia, 4, 6);
            $hsl[] = $hsatu . $hdua . $htiga;
        }
    }


    for ($i = 0; $i <= count($data) - 2; $i++) {
        echo $data[$i];
    }
    foreach ($hsl as $a) {
        echo $a;
    }
}
echo groupNumber();
