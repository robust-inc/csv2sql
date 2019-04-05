<?php
use PHPUnit\Framework\TestCase;

class Csv2SqlTest extends TestCase
{
  // ヘッダあり。カラム数1
  public function test_with_header_column1()
  {
    $csv2sql = new RobustInc\Csv2Sql\Csv2Sql("mytable","mydb");
    $sql_str = $csv2sql->convertToSql(__DIR__."/test_with_header_column1.csv",true);
    $content = file_get_contents(__DIR__."/test_with_header_column1.sql");
    $this->assertEquals($content,$sql_str);
  }

  // ヘッダあり。カラム数4
  public function test_with_header_column4()
  {
    $csv2sql = new RobustInc\Csv2Sql\Csv2Sql("mytable","mydb");
    $sql_str = $csv2sql->convertToSql(__DIR__."/test_with_header_column4.csv",true);
    $content = file_get_contents(__DIR__."/test_with_header_column4.sql");
    $this->assertEquals($content,$sql_str);
  }

  // ヘッダなし。カラム数1
  public function test_without_header_column1()
  {
    $csv2sql = new RobustInc\Csv2Sql\Csv2Sql("mytable","mydb");
    $sql_str = $csv2sql->convertToSql(__DIR__."/test_without_header_column1.csv",false);
    $content = file_get_contents(__DIR__."/test_without_header_column1.sql");
    $this->assertEquals($content,$sql_str);
  }

  // ヘッダなし。カラム数4
  public function test_without_header_column4()
  {
    $csv2sql = new RobustInc\Csv2Sql\Csv2Sql("mytable","mydb");
    $sql_str = $csv2sql->convertToSql(__DIR__."/test_without_header_column4.csv",false);
    $content = file_get_contents(__DIR__."/test_without_header_column4.sql");
    $this->assertEquals($content,$sql_str);
  }

  // DB名なし。
  public function test_without_db_name()
  {
    $csv2sql = new RobustInc\Csv2Sql\Csv2Sql("mytable");
    $sql_str = $csv2sql->convertToSql(__DIR__."/test_without_db_name.csv",true);
    $content = file_get_contents(__DIR__."/test_without_db_name.sql");
    $this->assertEquals($content,$sql_str);
  }
}
