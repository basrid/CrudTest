<?php

    $db = mysqli_connect('localhost', 'root', '', 'crudtest');
    

    // HANDLING PRODUCTS

    //NEW PRODUCT
    if(isset($_POST['subproducts'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        $query = "INSERT INTO products (id,name,price,stock_qty) VALUES ('$id','$name', '$price', '$quantity')";
        
        mysqli_query($db, $query);
        header('location: products.php');
    }

    // HANDLING VENDORS

    // NEW VENDOR
    $id = "";
    $contact ="";
    $company ="";
    $phone = "";
    $updatevend = false;
    if(isset($_POST['subvendors'])){
        $id = $_POST['id'];
        $contact = $_POST['contact'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        
        $query = "INSERT INTO vendors (id,contact_person,company_name,phone_number) VALUES ('$id','$contact', '$company', '$phone')";
        
        mysqli_query($db, $query);
        header('location: vendors.php');
    }
    // EDIT VENDOR
    // FILL THE FORM WITH DETAILS
    if(isset($_GET['editvend'])){
        $id = $_GET['editvend'];
        $updatevend = true;
        $result = $db->query("SELECT * FROM vendors WHERE id=$id") or die($db>error());
        if($result->num_rows){
            $row = $result->fetch_array();
            $id = $row['id'];
            $contact = $row['contact_person'];
            $company = $row['company_name'];
            $phone = $row['phone_number'];
        } 
    }
    
    // UPDATE RECORD
    if(isset($_POST['updvend'])){
        $editid = $_GET['editvend'];
        $id = $_POST['id'];
        $contact = $_POST['contact'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        
        $db->query("UPDATE vendors SET id=$id, contact_person=$contact, company_name=$company, phone_number=$phone WHERE id=$editid");
        header('location: vendors.php');
    }
    
    //DELETE VENDOR
    if(isset($_GET['delvend'])){
        $id = $_GET['delvend'];
        $db->query("DELETE FROM vendors WHERE vendors.id=$id");
    }
    
    // HANDLING CUSTOMERS

    //NEW CUSTOMER
    if(isset($_POST['subcustomers'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        
        $query = "INSERT INTO customers (id,name,surname) VALUES ('$id','$name', '$surname')";
        mysqli_query($db, $query);
        header('location: customers.php');
    }

    //EDIT CUSTOMER
?>