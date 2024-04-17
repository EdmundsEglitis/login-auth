<?php

require "validator.php";
require "Database.php";
$config = require("config.php");
$validators = new Validator();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$db = new Database($config);

    $errors = [];
    if(!Validator::email($_POST["email"])) {
        $errors["email"] = "nepareizs epasta formats";
    }

    if(!Validator::password($_POST["password"])) {
        $errors["password"] = "parole ir nepilniga";
    }
    $query = "SELECT * FROM users WHERE email = :email";
    $params = [":email" => $_POST["email"]];
    $result=$db->execute($query, $params)->fetch();

    if($result){
        $errors["email"] = "epasts jau ir registrets";
    }

    if(empty($errors)){

        $query = "INSERT INTO users (email, password)
        VALUES (:email, :password);";
        $params = [
        ":email" => $_POST["email"],
        ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)

        ];
        $db->execute($query, $params); 
        die();
    
        }}
        require "views/register.view.php";