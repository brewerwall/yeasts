<?php

//CONFIG
$config = json_decode(file_get_contents("config.json"), true);

// SCRIPTS VARS
$master_file = $config['data']."_master.json";
$json = file_get_contents($master_file);
$array = json_decode($json, true);

// CONVERT MASTER FILE TO CSV
$f_csv = fopen('formats/'.$config['data'].'.csv', 'w');

$keys_set = false;
foreach ($array as $line){
    if(!$keys_set){
        fputcsv($f_csv, array_keys($line));
        $keys_set = true;
    }
    fputcsv($f_csv, $line);
}

//CONVERT MASTER FILE TO MYSQL INSERT STATEMENTS
$f_mysql = fopen('formats/'.$config['data'].'.mysql', 'w');

$keys_set = false;
foreach ($array as $line){
    if(!$keys_set){
        fwrite($f_mysql, "INSERT INTO ".$config['data']." (".implode(',',array_keys($line)).")\nVALUES\n");
        $keys_set = true;
    }

    //Wrap strings in quotes.
    $line = array_map(function($obj){
      if(!is_numeric($obj))
        return "'".addslashes($obj)."'";
      else
        return $obj;
    }, $line);

    $insert_values[] = "(".implode(',',$line).")";
}
fwrite($f_mysql, implode(",\n", $insert_values));

// COPY MASTER FILE TO FORMATS
copy($master_file, "formats/".$config['data'].".json");
