<?php

class Database{
  public static function connectDB(){
    $host = 'overbyclock.org';
    $user = '';
    $pass = '';
    $db   = 'shopProject';

    $connectDB = new mysqli($host,$user,$pass,$db);
    $connectDB->query("SET NAMES 'utf8'");
    return $connectDB;
  }
}