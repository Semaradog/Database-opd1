<?php

    include('core/header.php');

?>

<h1 style = "text-align : center; text-decoration: none; border : 5px solid red; width : fit-content; margin : auto;"><a href="admin/books">ADMIN CRUD</a></h1>

<?php

    $liqry = $con->prepare("SELECT title, author, pages FROM books  LIMIT 20, 10");
            if($liqry === false) {
            echo mysqli_error($con);
            } else{
                $liqry->bind_result($title,$author,$pages);
                if($liqry->execute()){
                    $liqry->store_result();

                    while($liqry->fetch()) { ?>
                        <div style = "border : solid 1px black ; max-width: 50%; margin: auto; font-family: Calibri, sans-serif;">
                        <div style = "text-align : center; font-family: Calibri, sans-serif; font-weight: bold;"><?php echo $title; ?></div>
                        <div style = "text-align : center;"><?php echo "Written By: " . $author; ?></div>
                        <div style = "text-align : center;"><?php echo "Pages: " . $pages; ?></div>
                        </div>
                        <br>
                        <?php
                    }
                }
                $liqry->close();
            }
?>