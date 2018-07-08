<?php

function file_work ($file_name, $mode, $data = ''){
$f = fopen($file_name, $mode);// fopen открывает файл 'file.txt' ('r' - тoлько для чтения) в переменную $f
    //$f = fopen('new.txt', 'a');  флаг 'w' предназначен для записи в файл 'new.txt' (который толлько что и создался)
//('w' полностью перезапишет файл, 'a' - допишет)

    if($mode == 'r') {
        $out = [];
        while (!feof($f)) {//feof - Проверяет, достигнут ли конец файла
            $line = fgets($f, 1024);//fgets — Читает строку из файла (перебирает содержимое файла)
            $out[]= $line . '<br>';
        };
        $out = implode('',$out);
        fclose($f);//обязательно закрываем файл после работы с ним
        return $out;
    }elseif($mode == 'w'|| $mode == 'a'){
        fwrite($f, $data);//fwrite — Бинарно-безопасная запись в файл.
        fclose($f);
        return true;
    }
    return false;
}
file_work ('new.txt','a', date('y-m-d, h:i:s')."\n");// функция date() — Форматирует вывод системной даты/времени
$file_data = file_work ('new.txt','r');
$file_data = explode ("\n", $file_data);
foreach ($file_data as $line){
    echo '<div>'.$line.'</div>'."\n";//тут "\n" для того чтоб каждая строка кода переходила на следующую строку
};
