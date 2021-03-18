<?php
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dator&Fynd - Hem</title>
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
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 p-3" id="menu">   
      <form class="form-inline my-2 my-lg-0 w-100 d-flex justify-content-center">
          <a class="navbar-brand" href="index.html"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
          <div class="input-group w-50" style="min-width: 18rem;">
              <input type="search" class="form-control rounded" placeholder="Sök" aria-label="Search"
                aria-describedby="search-addon" />
              <button type="button" class="btn btn-primary btn-warning text-light">sök</button>
          </div>
      </form>
        <button class="btn btn-primary btn-warning text-light" onclick="window.location.href='/addproduct'">Lägg till produkt</button>
    </nav> 
    <nav class="navbar nav-fill navbar-expand-lg navbar-dark bg-dark" id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav nav-tabs w-100 nav-fill bg-dark">
            <li class="nav-item"><a class="nav-link" href="index.php">Kategori-1</a></li>
            <li class="nav-item"><a class="nav-link active" href="">Kategori-2</a></li>
            <li class="nav-item"><a class="nav-link" href="">Kategori-3</a></li>
            <li class="nav-item"><a class="nav-link" href="">Kategori-4</a></li>
            <li class="nav-item"><a class="nav-link" href="">Kategori-5</a></li>
            <li class="nav-item"><a class="nav-link" href="">Kategori-6</a></li>
        </ul>
        </div>
    </nav>
    <div class="content text-light pt-4 ml-5 mr-5">
        <div class="row">
        <?php
            $sql = "SELECT * FROM products WHERE type='produkt2';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
              <div class="col-md-4 col-sm-12 col-lg-2">
                <div class="card bg-dark mb-3" style="max-width: 20rem;">
                  <div class="card-body">
                    <h5 class="card-title text-nowrap text-truncate"><?php echo $row['Title']; ?></h5>
                      <img class="card-img" src="<?php echo $row['Image']; ?>">
                    <p class="card-text text-nowrap text-truncate"><?php echo $row['Description']; ?></p>
                  </div>
                </div>
              </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
</body>
</html>