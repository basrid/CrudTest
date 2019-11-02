<?php

    $db = mysqli_connect('localhost', 'root', '', 'crudtest');
// HANDLING CUSTOMERS

    // NEW CUSTOMER
    $id = "";
    $name ="";
    $surname ="";
    $updatecust = false;

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        
        $query = "INSERT INTO customers (id,name,surname) VALUES ('$id','$name', '$surname')";
        
        mysqli_query($db, $query);
        header('location: customers.php');
    }

    // EDIT CUSTOMER
    // FILL THE FORM WITH DETAILS
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $updatecust = true;
        $result = $db->query("SELECT * FROM customers WHERE id=$id") or die($db>error());
        if($result->num_rows){
            $row = $result->fetch_array();
            $id = $row['id'];
            $name = $row['name'];
            $surname = $row['surname'];
        } 
    }
    
    // UPDATE RECORD
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        
        $db->query("UPDATE customers SET id='$id', name='$name', surname='$surname' WHERE customers.id='$id'");
        header('location: customers.php');
    }
    
    //DELETE CUSTOMER
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $db->query("DELETE FROM customers WHERE customers.id=$id");
        $id ="";
    }

?>