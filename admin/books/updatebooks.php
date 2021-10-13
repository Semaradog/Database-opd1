<?php
    
    // onderstaand bestand wordt ingeladen
    include('../../core/header.php');
    // include('../core/checklogin_admin.php');
?>

<?php
//prettyDump($_POST);
    if (isset($_POST['submit']) && $_POST['submit'] != '') {
        //default user: test@test.nl
        //default password: test123
        $id = $con->real_escape_string($_POST['uid']);
        $title = $con->real_escape_string($_POST['title']);
        $author = $con->real_escape_string($_POST['author']);
        $isbn13 = $con->real_escape_string($_POST['isbn13']);
        $format = $con->real_escape_string($_POST['format']);
        $publisher = $con->real_escape_string($_POST['publisher']);
        $pages = $con->real_escape_string($_POST['pages']);
        $dimensions = $con->real_escape_string($_POST['dimensions']);
        $overview = $con->real_escape_string($_POST['overview']);



        $query1 = $con->prepare("UPDATE books SET title = ?, author = ?, isbn13 = ?, format = ?, publisher = ?, pages = ?, dimensions = ?, overview = ?, WHERE id = ? LIMIT 1;");
        if ($query1 === false) {
            echo mysqli_error($con);
        }
                    
        $query1->bind_param('ssississi',$title,$author,$isbn13,$format,$publisher,$pages,$dimensions,$overview,$id);
        if ($query1->execute() === false) {
            echo mysqli_error($con);
        } else {
            echo '<div style="border: 2px solid red">BOOK UPDATED!</div>';
        }
        $query1->close();
                    
    }
?>

<h1 style="background-color: red">Edit Book</h1>


<form action="" method="POST">
<?php
    if (isset($_GET['uid']) && $_GET['uid'] != '') {
        $id = $con->real_escape_string($_GET['uid']);

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
                    echo '$id: <input type="text" name="uid" value="' . $id . '" readonly><br>';
                    echo '$title: <input type="text" name="title" value="' . $title . '"><br>';
                    echo '$author: <input type="text" name="author" value="' . $author . '"><br>';
                    echo '$isbn13: <input type="text" name="isbn13" value="' . $isbn13 . '"><br>';
                    echo '$format: <input type="text" name="format" value="' . $format . '"><br>';
                    echo '$publisher: <input type="text" name="publisher" value="' . $publisher . '"><br>';
                    echo '$pages: <input type="text" name="pages" value="' . $pages . '"><br>';
                    echo '$dimensions: <input type="text" name="dimensions" value="' . $dimensions . '"><br>';
                    echo '$overview: <input type="text" name="overview" value="' . $overview . '"><br>';
                }
            }
        }
        $liqry->close();

    }
?>
<input type="submit" name="submit" value="Opslaan">
</form>

<?php
    include('../../core/footer.php');
?>