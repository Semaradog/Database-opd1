<?php
    
    // onderstaand bestand wordt ingeladen
    include('../../core/header.php');

?>

<h1 style="background-color: red">Books</h1>
<?php
        $liqry = $con->prepare("SELECT id,title,author,isbn13,format,publisher,pages,dimensions,overview FROM books LIMIT 400, 15");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_result($id,$title,$author,$isbn13,$format,$publisher,$pages,$dimensions,$overview);
            if($liqry->execute()){
                $liqry->store_result();

                echo '<table border=1>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Author</td>
                            <td>Isbn13</td>
                            <td>format</td>
                            <td>publisher</td>
                            <td>pages</td>
                            <td>dimensions</td>
                            <td>overview</td>
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
                    <td><a href="updatebooks.php?uid=<?php echo $id; ?>">EDIT</a></td>
                    <td><a href="deletebooks?uid=<?php echo $id; ?>">DELETE</a></td>
                    </tr>
                    <?php
                }
                echo '</table>';
            }
            $liqry->close();
        }

?>
    <br><table style="border : 5px solid red"><td><a style="margin:auto;" href="addbooks.php">Add Books</a></td></table>

<?php
    include('../../core/footer.php');
?>
