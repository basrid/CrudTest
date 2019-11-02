<?php require_once 'vendorhandler.php' ?>
<!DOCTYPE html>
<html>
<head>
<title> Vendors </title>
</head>
<h2 style = "text-align:center">Vendors</h2>
<body>
    <?php
    $db = new mysqli('localhost', 'root', '', 'crudtest');
    $result = $db->query("SELECT * FROM vendors") or die($db->error);

    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Contact Name</th>
                <th>Company</th>
                <th>Phone</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_array()){ ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['contact_person'];?></td>
                <td><?php echo $row['company_name'];?></td>
                <td><?php echo $row['phone_number'];?></td>
                <td>
                    <a href="vendors.php?edit=<?php echo $row['id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="vendors.php?delete=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
    <form method="post" action="vendorhandler.php">
        <div class="input-group">
            <label>ID</label>
            <input type="number" name="id" value="<?php echo $id ?>">
        </div>
        <div class="input-group">
            <label>Contact Name</label>
            <input type="text" name="contact" value="<?php echo $contact ?>">
        </div>
        <div class="input-group">
            <label>Company</label>
            <input type="text" name="company" value="<?php echo $company ?>">
        </div>
        <div class="input-group">
            <label>Number</label>
            <input type="number" name="phone" value="<?php echo $phone?>">
        </div>
        <div class="input-group">
            <?php 
                if($updatevend == true):
            ?>
                <button type="submit" name="update" class="button">Update</button>
            <?php 
                else:
            ?>
                <button type="submit" name="save" class="button">Save</button>
            <?php endif ;?>
        </div>
        
    </form>
</body>

    <a href="landing.php">Back to home</a>
</html>