<?php
    include_once 'dbh.php';
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dator&Fynd - Varukorg</title>
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

    <?php
        $pricetotal = 0;
        if(isset($_GET["ID"])){
            $ID = $_GET["ID"];
            $productbyid = "SELECT * FROM products WHERE ID=$ID";
            $result = mysqli_query($conn,$productbyid);
            $product=mysqli_fetch_array ($result);
            $cartitems = array($product["ID"]=>array('Title'=>$product["Title"], 'ID'=>$product["ID"], 'Price'=>$product["Pris"], 'Image'=>$product["Image"], 'Type'=>$product["Type"]));
        }
        
        if(isset($_GET["type"]) && $_GET["type"]=="add"){
            if(!empty($_SESSION["cartitem"])) {
                    $_SESSION["cartitem"] = array_merge($_SESSION["cartitem"],$cartitems);
                } else {
                    $_SESSION["cartitem"] = $cartitems;
            }
        }
        if(isset($_GET["type"]) && $_GET["type"]=="remove"){
            if(!empty($_SESSION["cartitem"])) {
                foreach($_SESSION["cartitem"] as $k => $v) {
                    if($v['ID'] == $_GET["ID"]){
                        unset($_SESSION["cartitem"][$k]);
                        break;
                    }
                }
            }
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 p-3 mb-4" id="menu">  
        <button class="btn btn-primary btn-warning pt-0 pb-0 pl-2 pr-2" onclick="window.location.href='/index.php'"><h1>&larr;</h1></button>
      <form class="form-inline my-2 my-lg-0 w-100 d-flex justify-content-center">
          <a class="navbar-brand" href="index.php"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
      </form>
    </nav> 
    
    <div class="align-top mt-4 col-md-8 m-auto">
        <table class="table table-dark mt-5" border=1>
            <tr>
                <th style="text-align:left;">Titel</th>
                <th style="text-align:left;">Typ</th>
                <th style="text-align:left;">ID</th>
                <th style="text-align:right;" width="15%">Pris</th>
                <th style="text-align:center;" width="10%">Remove</th>
            </tr>
    
    <?php
        if(isset($_SESSION["cartitem"])){
            foreach ($_SESSION["cartitem"] as $item){
                $pricetotal += ($item["Price"]);
                ?>
                <tr>
                    <td><img src="<?php echo $item["Image"]; ?>" class="w-10" /><?php echo " ".$item["Title"]; ?></td>
                    <td style="text-align:left;"><?php echo $item["Type"]; ?></td>
                    <td><?php echo $item["ID"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["Price"]." kr"; ?></td>
                    <td style="text-align:center;"> <button class="btn btn-primary btn-warning pt-0 pb-0 pl-2 pr-2" onclick="window.location.href='/varukorg.php?type=remove&ID=<?php echo $item["ID"]; ?>'">X</button></td>
                </tr>
            <?php
            }
        }
        ?>
            <tr>
                <td style="text-align:center;" colspan=5><?php echo "Totalt: ".$pricetotal." kr" ?></td>
            </tr>
        </table>
    </div>
</body>
</html>