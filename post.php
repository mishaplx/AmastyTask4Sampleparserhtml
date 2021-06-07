<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_post.css">
    <title>football</title>
</head>

<body>
   

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
//echo count($arr_href);
$main_html = 'https://terrikon.com';
for ($i = 0; $i < 12; $i++) {
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
    $team_place = array_search($nameteam, $result);
    if ($team_place == 0) {
        $team_place = 1;
    }
?>
<div class="div__h1"> <?php foreach ($table_html->find('h1') as $element)
        echo $element . '<br>'; ?>
        
        <p><?php  echo " команда ${nameteam} заняла ${team_place} место" ;
    echo '<br>'; ?></p>
    </div>
    

   <?php 
    $table_html->clear();
    unset($table_html);
}

?>

   

</body>

</html>