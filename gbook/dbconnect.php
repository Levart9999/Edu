<?php

class dbconnect
{
  protected $host = "localhost";
  protected $dbname = "gbook";
  protected $user = "root";
  protected $password = "";
  protected $option = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');


  public function connection()
  {
      $link = 'mysql:host='.$this->host.';dbname='.$this->dbname;
      try
      {
          $connect = new PDO($link,$this->user,$this->password,$this->option);
          $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          return $connect;
      }
      catch (PDOException $e)
      {
       return "failed to connection".$e->getMessage();
      }
  }

}