<?php include('customerhandler.php')?>
<!DOCTYPE html>
<html>
<head>
<title> Customers </title>
</head>
<h2 style = "text-align:center">Customers</h2>
<body>
    <?php
    $db = new mysqli('localhost', 'root', '', 'crudtest');
    $result = $db->query("SELECT * FROM customers") or die($db->error);

    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_array()){ ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['surname'];?></td>
                <td>
                    <a href="customers.php?edit=<?php echo $row['id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="customers.php?delete=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
    <form method="post" action="customerhandler.php">
        <div class="input-group">
            <label>ID</label>
            <input type="number" name="id" value="<?php echo $id ?>">
        </div>
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name ?>">
        </div>
        <div class="input-group">
            <label>Surname</label>
            <input type="text" name="surname" value="<?php echo $surname ?>">
        </div>
        <div class="input-group">
            <?php 
                if($updatecust == true):
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