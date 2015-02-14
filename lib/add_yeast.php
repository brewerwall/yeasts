<?php

if(!defined('STDIN')){
  echo "Run from command line!";
  exit;
}

// Pull in our master file
$filename = __DIR__."/../src/yeasts_master.json";
$filecontents = file_get_contents($filename);
$yeasts = json_decode($filecontents);

// Increase the ID by 1.
$last_yeast = end($yeasts);
$id = (string)($last_yeast->id + 1);
$data["id"] = $id;

echo "What is the name of the lab: ";
$data['laboratory'] = trim(fgets(STDIN));

echo "What is the strain number or Id: ";
$data['strain'] = trim(fgets(STDIN));

echo "What is the name of the yeast: ";
$data['name'] = trim(fgets(STDIN));

echo "What is the description of the yeast: ";
$data['description'] = trim(fgets(STDIN));

echo "What is the minimum attenuation of fermentation: ";
$data['attenuation_min'] = trim(fgets(STDIN));

echo "What is the maximum attenuation of fermentation: ";
$data['attenuation_max'] = trim(fgets(STDIN));

echo "What is the flocculation of the yeast: ";
$data['flocculation'] = trim(fgets(STDIN));

echo "What is the minimum temperature for fermentation: ";
$data['temperature_min'] = trim(fgets(STDIN));

echo "What is the maximum temperature for fermentation: ";
$data['temperature_max'] = trim(fgets(STDIN));

echo "What is the abv tolerance of the yeast: ";
$data['tolerance'] = trim(fgets(STDIN));

echo "What is the form of the yeast (Liquid or Dry): ";
$data['form'] = trim(fgets(STDIN));

$yeasts[] = $data;

file_put_contents($filename, json_encode($yeasts, JSON_PRETTY_PRINT));
