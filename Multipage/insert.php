<?php
    include_once 'dbh.php';

    $title = $_POST['title'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $test = 'images/'.$image;
    if(!empty($title)|| !empty($image) || !empty($description))
    {
        if(mysqli_connect_error())
        {
            die('error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
            $SELECT = "SELECT title FROM products";
            $INSERT = "INSERT INTO products(Title, Image, Description) values(?,?,?)";
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_Param("sss",$title, $test, $description);
            $stmt->execute();
            echo "Ny produkt tillagd!";
        }
    } else {
        echo "Vänligen fyll i alla fält";
        die();
    }
?>