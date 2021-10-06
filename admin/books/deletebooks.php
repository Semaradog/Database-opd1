<?php
    // onderstaand bestand wordt ingeladen
    include('../../core/header.php');
?>

<h1 style="background-color: red">Delete a Book</h1>

<?php
//prettyDump($_POST);
    if (isset($_POST['submit']) && $_POST['submit'] != '') {
        //default user: test@test.nl
        //default password: test123
        $id = $con->real_escape_string($_POST['uid']);
        $query1 = $con->prepare("DELETE FROM books WHERE id = ? LIMIT 1;");
        if ($query1 === false) {
            echo mysqli_error($con);
        }

        $query1->bind_param('i',$id);
        if ($query1->execute() === false) {
            echo mysqli_error($con);
        } else {
            echo '<div style="border: 2px solid red"> Book with ID '.$id.' Deleted!</div>';
        }
        $query1->close();
    }
?>


<?php
    if (isset($_GET['uid']) && $_GET['uid'] != '') {

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

        <h2 style="color: red">Are you sure that you want to delete this book?</h2><?php

        $product_id = $con->real_escape_string($_GET['uid']);

        $liqry = $con->prepare("SELECT title,author,isbn13,format,publisher,pages,dimensions,overview FROM books WHERE id = ? LIMIT 1;");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_param('i',$id);
            $liqry->bind_result($title,$author,$isbn13,$format,$publisher,$pages,$dimensions,$overview);
            if($liqry->execute()){
                $liqry->store_result();
                $liqry->fetch();
                if($liqry->num_rows == '1'){
                    echo 'id: ' . $id . '<br>';
                    echo 'Title: ' . $title . '<br>';
                    echo 'author: ' . $author . '<br>';
                    echo 'isbn13: ' . $isbn13 . '<br>';
                    echo 'format: ' . $format . '<br>';
                    echo 'publisher: ' . $publisher . '<br>';
                    echo 'pages: ' . $pages . '<br>';
                    echo 'dimensions: ' . $dimensions . '<br>';
                    echo 'overview: ' . $overview . '<br>';
                }
            }
        }
        $liqry->close();

        ?>
        <br>
        <input type="submit" name="submit" value="Yes, Delete!">
        <input type="hidden" name="uid" value = "<?php echo $id ?>">
        </form>
        <?php
    }
?>