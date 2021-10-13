<?php
    
    // onderstaand bestand wordt ingeladen
    include('../../core/header.php');

?>

<h1 style="background-color: red">Books</h1>
<?php
<<<<<<< HEAD
        $liqry = $con->prepare("SELECT id,title,author,isbn13,format,publisher,pages,dimensions,overview FROM books LIMIT 400,10");
=======
        $liqry = $con->prepare("SELECT id,title,author,isbn13,format,publisher,pages,dimensions,overview FROM books LIMIT 400, 15");
>>>>>>> 7f34464d6b352c9d9daeb02ed76657033d5b41e2
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_result($id,$title,$author,$isbn13,$format,$publisher,$pages,$dimensions,$overview);
            if($liqry->execute()){
                $liqry->store_result();

                echo '<table border=1>
                        <tr>
                            <td>ID</td>
<<<<<<< HEAD
                            <td>TITLE</td>
                            <td>AUTHOR</td>
                            <td>ISBN13</td>
                            <td>FORMAT</td>
                            <td>PUBLISHER</td>
                            <td>PAGES</td>
                            <td>DIMENSIONS</td>
                            <td>OVERVIEW</td>
=======
                            <td>Title</td>
                            <td>Author</td>
                            <td>Isbn13</td>
                            <td>format</td>
                            <td>publisher</td>
                            <td>pages</td>
                            <td>dimensions</td>
                            <td>overview</td>
>>>>>>> 7f34464d6b352c9d9daeb02ed76657033d5b41e2
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>';

                while($liqry->fetch()) { ?>
                    <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $author; ?></td>
                    <td><?php echo $isbn13; ?></td>
                    <td><?php echo $format; ?></td>
                    <td><?php echo $publisher; ?></td>
                    <td><?php echo $pages; ?></td>
                    <td><?php echo $dimensions; ?></td>
                    <td><?php echo $overview; ?></td>
<<<<<<< HEAD
                    <td><a href="updatebooks.php?uid=<?php echo $id; ?>">UPDATE</a></td>
                    <td><a href="deletebooks.php?uid=<?php echo $id; ?>">DELETE</a></td>
=======
                    <td><a href="updatebooks.php?uid=<?php echo $id; ?>">EDIT</a></td>
                    <td><a href="deletebooks?uid=<?php echo $id; ?>">DELETE</a></td>
>>>>>>> 7f34464d6b352c9d9daeb02ed76657033d5b41e2
                    </tr>
                    <?php
                }
                echo '</table>';
            }
            $liqry->close();
        }

?>
<<<<<<< HEAD
    <br><table style="border : 5px solid red"><td><a style="margin:auto;" href="addbooks.php">ADD BOOKS</a></td></table>
=======
    <br><table style="border : 5px solid red"><td><a style="margin:auto;" href="addbooks.php">Add Books</a></td></table>
>>>>>>> 7f34464d6b352c9d9daeb02ed76657033d5b41e2

<?php
    include('../../core/footer.php');
?>
