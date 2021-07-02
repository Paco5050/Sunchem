<?php

define("MAIN_ROUTE", "http://192.168.1.80/SunChemical-main/server/public/");

function DateFormat($value){
  $date  = date_create($value);
  $date  = date_format($date, 'd-n-Y');
  return $date;
}