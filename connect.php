<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];


    //data base connection code
    $connection = new mysqli( 'localhost', 'root', '', 'test1');

    $temp = $connection->prepare("insert into regform(firstName, lastName, gender, email, password, phone) values(?,?,?,?,?,?)");

    if(!$temp)
    {
        die('Connection Failed '.$connection->error);
    }

    $temp -> bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $phone);


    if(!$temp->execute())
    {
        die('Execution Failed '.$temp->error);  
    }

     echo "reg successful....";
            
     $temp -> close();
     $connection -> close();
?>