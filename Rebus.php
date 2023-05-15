<!--<form action="action.php" method="post">
    <p>Ваше имя: <input type="text" name="name" /></p>
    <p>Ваш возраст: <input type="text" name="age" /></p>
    <p><input type="submit" /></p>
</form>-->

<?php

class Rebus
{
    private $a = 'КОКА';
    private $b = 'КОЛА';
    private $c = 'ВОДА';
}

mb_internal_encoding("UTF-8");
#  1.
// Здесь вводятся три строки через сайт
// и преобразуются в массив
$strIn_1 = "кока";
$arrStr_1 = mb_str_split($strIn_1);

$strIn_2 = "кола";
$arrStr_2 = mb_str_split($strIn_2);

$strIn_3 = "водаб";
$arrStr_3 = mb_str_split($strIn_3);

// Вывод строк
echo "str1<br/>";
foreach ($arrStr_1 as $key => $value)
{
    echo "{$key} => {$value}<br/>";
}
echo "<br/>";

echo "str2<br/>";
foreach ($arrStr_2 as $key => $value)
{
    echo "{$key} => {$value}<br/>";
}
echo "<br/>";

echo "str3<br/>";
foreach ($arrStr_3 as $key => $value)
{
    echo "{$key} => {$value}<br/>";
}
echo "<br/>";

$flagLen = true;
if (abs(count($arrStr_1) - count($arrStr_2)) > 1)
{
    echo "Ошибка длины слов";
    $flagLen = false;
}

#  2.
// Создаём массивы с уникальными значениями
// Убираем повторяющиеся значения из массива
$arrUniq_1 = array_unique($arrStr_1);
echo "--arrUnig1--<br/>";
print_r($arrUniq_1);
echo "<br/><br/>";

$arrUniq_2 = array_unique($arrStr_2);
echo "--arrUnig2--<br/>";
print_r($arrUniq_2);
echo "<br/><br/>";

$arrUniq_3 = array_unique($arrStr_3);
echo "--arrUnig3--<br/>";
print_r($arrUniq_3);
echo "<br/><br/>";

#  3.
// Перенумеруем
// Выбирает все значения массива (перенумерация)
$arrUniq_1 = array_values($arrUniq_1);
echo "--Перенумерация arrUnig1--<br/>";
print_r($arrUniq_1);
echo "<br/><br/>";

$arrUniq_2 = array_values($arrUniq_2);
echo "--Перенумерация arrUnig2--<br/>";
print_r($arrUniq_2);
echo "<br/><br/>";

$arrUniq_3 = array_values($arrUniq_3);
echo "--Перенумерация arrUnig3--<br/>";
print_r($arrUniq_3);
echo "<br/><br/>";

#  4.
// Объединяем входные массивы для получения всех уникальных значений
echo "--Объединение всех массивов--<br/>";
$uniqResult = array_merge($arrUniq_1, $arrUniq_2, $arrUniq_3);
print_r($uniqResult);
echo "<br/><br/>";
// И оставляем уникальные значения
echo "--Уникальные значения всех массивов--<br/>";
$uniqResult = array_values(array_unique($uniqResult));
print_r($uniqResult);
echo "<br/><br/>";

#  5.
// Проверка на кол-во уникальных эл-в
$flagUniq = true;
if (count($uniqResult) > 10)
{
    echo "ERROR!";
    $flagUniq = false;
    // И тут как-то надо остановиться
}
else
{
    echo "OK!<br/><br/>";
    // Тут продолжить
}


    function permutationFunc($array, $num, $sequence = "")
    {
        if (strlen($sequence) === $num) {
            global $permutations_mas;
            $permutations_mas[] = str_split($sequence);
            return;
        }
        if ($sequence !== '') {
            unset($array[(int)$sequence[-1]]);
        }
        foreach ($array as $item) {
            permutationFunc($array, $num, $sequence . $item);
        }
    }

#  6. Создание массива со всеми перестановками
if ($flagUniq && $flagLen)
{
    $code = range(0, 9, 1);
    $permutations_mas = array();
    permutationFunc($code, count($uniqResult));
}

#  7. test Кодировка символов
//if ($flagUniq && $flagLen)
//{
//    for ($i = 0; $i < 10; $i++)
//    {
//        echo "arrCODE: ";
//        $arrCode = array_combine($uniqResult, $permutations_mas[$i]);
//        print_r($arrCode);
//        echo "<br/>";
//
//        echo "arr1: ";
//        print_r($arrStr_1);
//        echo "<br/>";
//        echo "arrCode1: ";
//        print_r($arrCode[$arrStr_1[0]]);
//        echo "<br/>";
//
//        echo "arr2: ";
//        print_r($arrStr_2);
//        echo "<br/>";
//        echo "arrCode2: ";
//        print_r($arrCode[$arrStr_2[0]]);
//        echo "<br/>";
//
//        echo "arr3: ";
//        print_r($arrStr_3);
//        echo "<br/>";
//        echo "arrCode3: ";
//        print_r($arrCode[$arrStr_3[0]]);
//        echo "<br/><br/>";
//    }
//    $arr = array();
//    for ($i = 0; $i < count($arrStr_1); $i++)
//    {
//        $arr[] = $arrCode[$arrStr_1[$i]];
//        print_r($arr);
//        echo "END<br/><br/>";
//    }
//}

#  8. Поиск нужной кодировки

function createArrCode($inArr, $arrCode)
{
    for ($i = 0; $i < count($inArr); $i++)
    {
        $arr[] = (int)$arrCode[$inArr[$i]];
    }
    return $arr;
}

function masToNum($inArr)
{
    $result = 0;
    for ($i = 0; $i < count($inArr); $i++)
    {
        $result += (int)$inArr[$i] * 10**(count($inArr) - $i - 1);
    }
    return $result;
}



for ($i = 0; $i < count($permutations_mas); $i++)
{
    $arrCode = array_combine($uniqResult, $permutations_mas[$i]);
    $num1 = masToNum(createArrCode($arrStr_1, $arrCode));
    $num2 = masToNum(createArrCode($arrStr_2, $arrCode));
    $num3 = masToNum(createArrCode($arrStr_3, $arrCode));

    if ($num1 + $num2 === $num3)
    {
        echo "permutations_mas[$i]:<br/>";
        print_r($arrCode);
        echo "<br/>";

        echo $strIn_1." = ";
        echo masToNum(createArrCode($arrStr_1, $arrCode))."<br/>";
        echo $strIn_2." = ";
        echo masToNum(createArrCode($arrStr_2, $arrCode))."<br/>";
        echo $strIn_3." = ";
        echo masToNum(createArrCode($arrStr_3, $arrCode));

        echo "<br/><br/>";
    }
//    $flag = true;
//
//    for ($j = count($arrStr_3) - 1; $j >= 0; $j--)
//    {
//        if ((int)$arrCode[$arrStr_1[$j]] + (int)$arrCode[$arrStr_2[$j]] ===
//            (int)$arrCode[$arrStr_3[$j]])
//        {
////            echo "j = $j<br/>";
////            echo (int)$arrCode[$arrStr_1[$j]]." + ";
////            echo (int)$arrCode[$arrStr_2[$j]]." = ";
////            echo (int)$arrCode[$arrStr_3[$j]]." ";
////            echo (boolean)((int)$arrCode[$arrStr_1[$j]] + (int)$arrCode[$arrStr_2[$j]] == (int)$arrCode[$arrStr_3[$j]])."<br/>";
//           //echo "true<br/>";
//        }
//        else
//        {
//            $flag = false;
//            //echo "<br/><br/>";
//            break;
//        }
//    }
//    if ($flag)
//    {
//        echo "permutations_mas[$i]:<br/>";
//        print_r($permutations_mas[$i]);
//        echo "<br/>";
//        print_r(createArrCode($uniqResult, $arrCode));
//        echo "<br/><br/>";
//    }
}

