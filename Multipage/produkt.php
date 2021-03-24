<?php
    include_once 'dbh.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dator&Fynd - Produkt</title>
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
        <button class="btn btn-primary btn-warning pt-0 pb-0 pl-2 pr-2" onclick="javascript:history.back()"><h2>&larr;</h2></button>
      <div class="m-auto">
          <a class="navbar-brand" href="index.php"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
      </div>
    </nav> 
    
    <?php
        $ID = $_GET['ID'];
        $query = 'SELECT * FROM products WHERE ID = '.$ID.' LIMIT 1';
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result); 
    ?>
    <div class="bg-dark m-4 text-light w-75 m-auto row">
        <div class="col-md-6 col-lg-3 m-3">
            <img class="card-img d-inline-block" src="<?php echo $row['Image']; ?>">
        </div>
        <div class="d-inline-block align-top mt-4 col-md-4 ml-3 mr-3">
            <h1 class="card-title"><?php echo $row['Title']; ?></h1>
            <p class="card-text"><?php echo $row['Description']; ?></p>
            <h2 class="card-text"><?php echo 'Pris: '.$row['Pris'].'kr'; ?></h2>
            <table class="table table-dark mt-5" border=1>
                <th colspan="2" class="text-center">Specs</th>
                <?php
                    $sql = "SELECT column_name
                    FROM information_schema.columns
                    WHERE  table_name = 'products'
                    AND table_schema = 'datorochfynd' AND column_name != 'Image' AND column_name != 'Description' AND column_name != 'Pris'";
                    $result2 = mysqli_query($conn,$sql);
                    while($row2 = mysqli_fetch_array($result2)){
                        if($row[$row2['column_name']] != NULL){
                        ?>
                            <tr>
                                <td><?php echo $row2['column_name'].':'; ?></td>   
                                <td><?php echo $row[$row2['column_name']]; ?></td> 
                            </tr>
                        <?php
                                }
                            }
                        ?>
            </table>
        </div>
    </div>  
</body>
</html>