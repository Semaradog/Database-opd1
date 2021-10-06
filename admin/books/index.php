<?php
    
    // onderstaand bestand wordt ingeladen
    include('../../core/header.php');

?>

<h1 style="background-color: red">Books</h1>
<?php
        $liqry = $con->prepare("SELECT id,product.name AS product_name,price,category.category_id,product.active,category.name AS cat_name FROM product INNER JOIN category ON product.category_id = category.category_id");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_result($id,$product_name,$price,$category_id,$product_active,$category_name);
            if($liqry->execute()){
                $liqry->store_result();

                echo '<table border=1>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Category_ID</td>
                            <td>Active</td>
                            <td>Category_Naam</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>';

                while($liqry->fetch()) { ?>
                    <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $product_name; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $category_id; ?></td>
                    <td><?php echo $product_active; ?></td>
                    <td><?php echo $category_name; ?></td>
                    <td><a href="edit_product.php?uid=<?php echo $id; ?>">EDIT</a></td>
                    <td><a href="delete_product.php?uid=<?php echo $id; ?>">DELETE</a></td>
                    </tr>
                    <?php
                }
                echo '</table>';
            }
            $liqry->close();
        }

?>
    <br><table style="border : 5px solid red"><td><a style="margin:auto;" href="add_product.php">ADD PRODUCTS</a></td></table>

<?php
    include('../core/footer.php');
?>
