<?php
    $host = 'localhost';    //資料庫網址
    $dbuser ='root';    //登錄用戶
    $dbpassword = '';    //密碼
    $dbname = 'test1';    //要訪問的資料表單
    $todo = mysqli_connect($host,$dbuser,$dbpassword,$dbname) or die('Error with MySQL connection');    //鏈接

mysqli_query($todo,"SET NAMES utf8");
?>