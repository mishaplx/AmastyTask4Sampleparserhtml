<?php

include 'simple_html_dom.php';
$nameteam = $_POST['nameteam'];


// Create DOM from URL or file

$html = file_get_html('https://terrikon.com/football/italy/championship/archive');
$arr_href = [];
foreach ($html->find('.news') as $e)
    foreach ($e->find('a') as $a) {
        array_push($arr_href, $a->href);
    }
$url_table_arr = [];
$main_html = 'https://terrikon.com';
for ($i = 0; $i < 11; $i++) {
    array_push($url_table_arr, $main_html . $arr_href[$i]);
}

//echo (count($url_table_arr));
for ($i = 0; $i < count($url_table_arr); $i++) {
    $table_html = file_get_html($url_table_arr[$i]); // https://terrikon.com/football/italy/championship/2019..
    $arr_text = [];
    foreach ($table_html->find('table td') as $e)
        foreach ($e->find('a') as $a) {
            array_push($arr_text, $a->innertext);
        }


    $result = array_values(array_unique($arr_text));
    unset($result[1]);
    $end_result_array = array_values($result);
    //print_r($end_result_array);
    //echo '<br>';
    $team_place = array_search($nameteam, $result) + 1;

    foreach ($table_html->find('h1') as $element)
        echo $element . '<br>';
    echo "заняла ${team_place} место команда ${nameteam}";

    $table_html->clear();
    unset($table_html);
}

?>