<?php
    include_once 'dbh.php';
    $title = $_POST['title'];
    $type = $_POST['type'];
    $image_tmp = $_POST['image'];
    $description = $_POST['description'];
    $image = 'images/'.$image_tmp;
    $pris = $_POST['pris'];
    if(!empty($_POST['clockspeed'])) {
       $clockspeed = $_POST['clockspeed'].'MHz';
    }
    if(!empty($_POST['watt'])) {
       $watt = $_POST['watt'].'MHz';
    }
    
    if(!empty($title)|| !empty($image) || !empty($description))
    {
        if(mysqli_connect_error())
        {
            die('error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
            $SELECT = "SELECT title FROM products";
            $INSERT = "INSERT INTO products(Title, Type, Image, Description, Pris, Clockspeed, Watt) values(?,?,?,?,?,?,?)";
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_Param("ssssiss",$title, $type, $image, $description, $pris, $clockspeed, $watt);
            $stmt->execute();
            ?>
            <html>
                <head>
                    <title>Dator&Fynd - Produkt tillagd</title>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                    <meta name="viewport" content="width=device-width">
                    <link rel="shortcut icon" href="images/favicon.svg" type="image/ico" />

                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
                </head>
                <body class="bg-image" style="background-image: linear-gradient(12deg, rgba(193, 193, 193,0.05) 0%, rgba(193, 193, 193,0.05) 2%,rgba(129, 129, 129,0.05) 2%, rgba(129, 129, 129,0.05) 27%,rgba(185, 185, 185,0.05) 27%, rgba(185, 185, 185,0.05) 66%,rgba(83, 83, 83,0.05) 66%, rgba(83, 83, 83,0.05) 100%),linear-gradient(321deg, rgba(240, 240, 240,0.05) 0%, rgba(240, 240, 240,0.05) 13%,rgba(231, 231, 231,0.05) 13%, rgba(231, 231, 231,0.05) 34%,rgba(139, 139, 139,0.05) 34%, rgba(139, 139, 139,0.05) 71%,rgba(112, 112, 112,0.05) 71%, rgba(112, 112, 112,0.05) 100%),linear-gradient(236deg, rgba(189, 189, 189,0.05) 0%, rgba(189, 189, 189,0.05) 47%,rgba(138, 138, 138,0.05) 47%, rgba(138, 138, 138,0.05) 58%,rgba(108, 108, 108,0.05) 58%, rgba(108, 108, 108,0.05) 85%,rgba(143, 143, 143,0.05) 85%, rgba(143, 143, 143,0.05) 100%),linear-gradient(96deg, rgba(53, 53, 53,0.05) 0%, rgba(53, 53, 53,0.05) 53%,rgba(44, 44, 44,0.05) 53%, rgba(44, 44, 44,0.05) 82%,rgba(77, 77, 77,0.05) 82%, rgba(77, 77, 77,0.05) 98%,rgba(8, 8, 8,0.05) 98%, rgba(8, 8, 8,0.05) 100%),linear-gradient(334deg, hsl(247,0%,2%),hsl(247,0%,2%)); height: 100vh">
                    
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 p-3 mb-4" id="menu">   
                  <form class="form-inline my-2 my-lg-0 w-100 d-flex justify-content-center">
                      <a class="navbar-brand" href="index.php"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
                  </form>
                </nav> 
                    <div class="text-light p-4 m-auto bg-dark text-center w-25">
                        <h1 class="pb-3">Ny produkt tillagd!</h1>
                        <div>
                            <button class="btn btn-primary btn-warning text-light" onclick="window.location.href='addproduct.php'">Lägg till en ny produkt</button>
                            <button class="btn btn-primary btn-warning text-light" onclick="window.location.href='index.php'">Återgå hem</button>
                        </div>
                    </div>
                </body>
            </html>
            <?php
        }
    } else {
        echo "Vänligen fyll i alla fält";
        die();
    }
?>