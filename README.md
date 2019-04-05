## インストール

> user $ composer require robust-inc/csv2Sql

## サンプルスクリプト実行
> user $ ./vendor/bin/csv2Sql -d mydb -t mytable --with-header -in ./tests/sample.csv -out test.sql

## テスト
> user $ composer run-script test
