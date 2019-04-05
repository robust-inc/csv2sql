<?php

namespace RobustInc\Csv2Sql;

use League\Csv\Reader;
use League\Csv\Statement;

class Csv2Sql {
  private $database;
  private $table;

  function __construct($table,$database=""){
    $this->table        = $table;
    $this->database     = $database;
  }

  public function convertToSql($input_filepath,$with_header = false){
    $csv = Reader::createFromPath($input_filepath, 'r');
    if($with_header){
      $csv->setHeaderOffset(0);
      $headers = $csv->getHeader();
    }else{
      $count = count($csv->fetchOne());
      for($i=1;$i<=$count;$i++){
        $headers[] = "col_$i";
      }
    }
    $headers = array_map(function($x){ return $this->_mb_trim($x); }, $headers);
    $stmt = (new Statement());
    $records = $stmt->process($csv);

    ob_start();
    if(!empty($this->database)){
      echo "use ". $this->database . ";" . PHP_EOL;
    }
    echo "DROP TABLE IF EXISTS ". $this->get_table_name() . ";" . PHP_EOL;

    echo "create table ". $this->get_table_name() . PHP_EOL;
    echo "(" . PHP_EOL;
    echo "`_id` integer primary key not null auto_increment," . PHP_EOL;
    foreach ($headers as $header) {
      echo "`$header` varchar(255)";
      echo ($header === end($headers) ? "" : ",") . PHP_EOL;
    }

    echo ");" . PHP_EOL;

    echo "INSERT INTO ". $this->get_table_name() . PHP_EOL;
    echo "(" . PHP_EOL;

    foreach ($headers as $header) {
      echo "`$header`" . ($header === end($headers) ? "" : ",") . PHP_EOL;
    }
    echo ")VALUES" . PHP_EOL;
    $record_count = $records->count();
    $count=1;
    foreach ($records as $record) {
      echo "(";
      foreach (array_values($record) as $idx => $value) {
        echo "\"" . $this->_mb_trim($value) . "\"";
        echo $idx+1 === count($record) ? "": ",";
      }
      echo ")". ($count === $record_count ? ";" : ",") . PHP_EOL;
      $count++;
    }

    $rtn = ob_get_contents();
    ob_end_clean();
    return $rtn;
  }

  private function _mb_trim($string) {
    return preg_replace("/^[\s　]*(.*?)[\s　]*$/u","$1",$string);
  }

  private function get_table_name(){
    return empty($this->database) ? "`".$this->table."`" : "`" . $this->database . "`.`" . $this->table . "`";
  }
}
