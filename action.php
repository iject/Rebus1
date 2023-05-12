<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
</head>

<body>

<?php
mb_internal_encoding("UTF-8");
#  1.
// Здесь вводятся три строки через сайт
// и преобразуются в массив
$strIn_1 = "ирррсвол";
$arrStr_1 = mb_str_split($strIn_1);

$strIn_2 = "иркум";
$arrStr_2 = mb_str_split($strIn_2);

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

/*foreach (count_chars($str, 1) as $i => $value)
{
    echo "\"" , chr($i) , "\" встречается в строке $value раз(а).<br/>";
}*/

/*echo "--Вывод массива--<br/>";
print_r($arrStr_1);
echo "<br/><br/>";*/

// Подсчитываем количество всех значений массива
echo "--Кол-во символов str1--<br/>";
print_r(array_count_values($arrStr_1));
echo "<br/><br/>";

echo "--Кол-во символов str2--<br/>";
print_r(array_count_values($arrStr_2));
echo "<br/><br/>";

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

#  4.
// Объединяем входные массивы для получения всех уникальных значений
$uniqResult = array_merge($arrUniq_1, $arrUniq_2);
print_r($uniqResult);
echo "<br/><br/>";
// И оставляем уникальные значения
$uniqResult = array_values(array_unique($uniqResult));
print_r($uniqResult);
echo "<br/><br/>";

#  5.
// Проверка на кол-во уникальных эл-в
$flag = false;
if (count($uniqResult) > 10)
{
    echo "ERROR!";
    // И тут как-то надо остановиться
}
else
{
    echo "OK!<br/><br/>";
    $flag = true;
    // Тут продолжить
}

#  6. Первичное кодирование
// Создаю массив цифр
$code = range(0, 9, 1);

// Первичное кодирование
echo "Первичное кодирование<br/>";
if ($flag)
{
    $arrCode = array_combine($uniqResult,
        array_slice($code, 0, count($uniqResult)));
    print_r($arrCode);
    echo "<br/><br/>";
}

#  7. Перебор всех вариков
//global $mas = array();
function kuda_mir_katitsa($array, $sequence = '') {
    // Условие остановки рекурсии - когда длина составленной последовательности
    // равна количеству элементов в нашем массиве
    if (strlen($sequence) === count($array)) {
        echo $sequence . '<br>';
        return;
    }
    // Перебор всех элементов в нашем массиве
    foreach ($array as $item) {
        // К составленной последовательности прицепляем очередной символ и ныряем дальше
        kuda_mir_katitsa($array, $sequence . $item);
    }
}

$arr = array('a', 'b', 'c');
kuda_mir_katitsa($arr);
?>


</body>

</html>
