<?php
$dsn = "mysql:host=hostname;dbname=nome_da_base_dados";
$username = "nome_do_usuario_no_banco_de_dados";
$password = "senha_do_usuario_no_banco_de_dados";
$pdo = new PDO($dsn, $username, $password);