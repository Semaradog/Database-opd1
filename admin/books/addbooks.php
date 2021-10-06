<?php

    include('../../core/header.php');

    if (isset($_POST['title']) && $_POST['title'] != "") {
        $title = $con->real_escape_string($_POST['title']);
        $author = $con->real_escape_string($_POST['author']);
        $isbn13 = $con->real_escape_string($_POST['isbn13']);
        $format = $con->real_escape_string($_POST['format']);
        $publisher = $con->real_escape_string($_POST['publisher']);
        $pages = $con->real_escape_string($_POST['pages']);
        $dimensions = $con->real_escape_string($_POST['dimensions']);
        $overview = $con->real_escape_string($_POST['overview']);

        $liqry = $con->prepare("INSERT INTO books (title,author,isbn13,format,publisher,pages,dimensions,overview) VALUES (?,?,?,?,?,?,?,?)");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_param('ssississ',$title,$author,$isbn13,$format,$publisher,$pages,$dimensions,$overview);
            if($liqry->execute()){
                echo "Book Was Succesfully Added.";
            }
        }
        $liqry->close();

    }
?>

<form action="" method="POST">
Book title: <input style = "text-align : center;" type="text" name="title" value=""><br><br>
Book author: <input  type="text" name="author" value=""><br><br>
Book isbn13: <input type="text" name="isbn13" value=""><br><br>
Book format: <input type="text" name="format" value=""><br><br>
Book publisher: <input type="text" name="publisher" value=""><br><br>
Book pages: <input type="text" name="pages" value=""><br><br>
Book dimensions: <input type="text" name="dimensions" value=""><br><br>
Book overview: <input type="text" name="overview" value=""><br><br>
<input type="submit" name="submit" value="Opslaan">
</form>


<a href="../../index.php">Go Back</a>