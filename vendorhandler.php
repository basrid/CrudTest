<?php

    $db = mysqli_connect('localhost', 'root', '', 'crudtest');
// HANDLING VENDORS

    // NEW VENDOR
    $id = "";
    $contact ="";
    $company ="";
    $phone = "";
    $updatevend = false;

    if(isset($_POST['save'])){
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
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
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
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $contact = $_POST['contact'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        
        $db->query("UPDATE vendors SET id='$id', contact_person='$contact', company_name='$company', phone_number='$phone' WHERE vendors.id='$id'");
        header('location: vendors.php');
    }
    
    //DELETE VENDOR
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $db->query("DELETE FROM vendors WHERE vendors.id=$id");
        $id ="";
    }

?>