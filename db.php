<?php

session_start();
$con = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);

if(isset($con)){
    
}else{
    echo "Não conectou";
}
