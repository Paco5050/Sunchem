<?php

define("MAIN_ROUTE", "http://localhost:3000/Susmit/server/public/");

function DateFormat($value){
  $date  = date_create($value);
  $date  = date_format($date, 'd-n-Y');
  return $date;
}