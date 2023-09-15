<?php

const HOST = "localhost"; 
const USER = "root";
const PASSWORD = "123";
const DATABASE = "db_contato";

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if($conexao === false){
    die(mysqli_connect_error());
}