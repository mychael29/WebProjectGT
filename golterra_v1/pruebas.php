<?php
$c = array(array(1,2,3));
//echo "Array no asociativo retornado como objeto: ", json_encode($c, JSON_FORCE_OBJECT), "\n\n";

$call_survey[] = array(array(array('info1' => 'uno', 'label1' => 'value1')));
$call_survey[] = array(array(array('info2' => 'dos', 'label2' => 'value2')));


//echo "Array no asociativo retornado como objeto: ", json_encode($call_survey, JSON_FORCE_OBJECT), "\n\n";
echo "\n\n";
$json = json_encode($call_survey, JSON_FORCE_OBJECT);
//$array_survey = json_decode($json, true);

$array_survey = json_decode($json, 1);
foreach ($array_survey as $key => $value) {
    echo $key . " > " . $value;
}
/*
foreach($array_survey as $key => $value){
    foreach ($value as $key2 => $value2) {
        foreach ($value2 as $key3 => $value3) {
            foreach ($value3 as $key4 => $value4) {
                echo $key4 . " : " . $value4 . " - ";
            }
        }
    }
}*/

/*
foreach ($datosFormularios as $tuplaFormulario) {
    $call_survey[$tuplaFormulario['id_form']][] = array(
        'id'    => $tuplaFormulario['id'],
        'label' => $tuplaFormulario['label'],
        'value' => $tuplaFormulario['value'],
    );
}*/


?>