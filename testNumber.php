<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/31/18
 * Time: 5:15 AM
 */
function convert($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    return $englishNumbersOnly;
}
echo convert('۲۲۲۲۲');
echo '۲۲۲۲۲';