<?php include('producthandler.php')?>
<!DOCTYPE html>
<html>
<head>
<title> Products </title>
</head>
<h2 style = "text-align:center">Products</h2>
<body>
    <?php
    $db = new mysqli('localhost', 'root', '', 'crudtest');
    $result = $db->query("SELECT * FROM products") or die($db->error);

    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_array()){ ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['stock_qty'];?></td>
                <td>
                    <a href="products.php?edit=<?php echo $row['id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="products.php?delete=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
    <form method="post" action="producthandler.php">
        <div class="input-group">
            <label>ID</label>
            <input type="number" name="id" value="<?php echo $id ?>">
        </div>
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name ?>">
        </div>
        <div class="input-group">
            <label>Price</label>
            <input type="number" name="price" value="<?php echo $price ?>">
        </div>
        <div class="input-group">
            <label>Quantity</label>
            <input type="number" name="quantity" value="<?php echo $quantity ?>">
        </div>
        <?php 
                if($updateprod == true):
            ?>
                <button type="submit" name="update" class="button">Update</button>
            <?php 
                else:
            ?>
                <button type="submit" name="save" class="button">Save</button>
            <?php endif ;?>
    </form>
</body>

    <a href="landing.php">Back to home</a>
</html>