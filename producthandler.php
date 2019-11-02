<?php

    $db = mysqli_connect('localhost', 'root', '', 'crudtest');
// HANDLING VENDORS

    // NEW PRODUCT
    $id = "";
    $name ="";
    $price ="";
    $quantity = "";
    $updateprod = false;

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        $query = "INSERT INTO products (id,name,price,stock_qty) VALUES ('$id','$name', '$price', '$quantity')";
        
        mysqli_query($db, $query);
        header('location: products.php');
    }

    // EDIT PRODUCT
    // FILL THE FORM WITH DETAILS
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $updateprod = true;
        $result = $db->query("SELECT * FROM products WHERE id=$id") or die($db>error());
        if($result->num_rows){
            $row = $result->fetch_array();
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $quantity = $row['stock_qty'];
        } 
    }
    
    // UPDATE RECORD
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        $db->query("UPDATE products SET id='$id', name='$name', price='$price', stock_qty='$quantity' WHERE products.id='$id'");
        header('location: products.php');
    }
    
    //DELETE PRODUCT
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $db->query("DELETE FROM products WHERE products.id='$id'");
        $id ="";
    }

?>