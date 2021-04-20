<?php
    include_once 'dbh.php';
    session_start();
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
    
    <script>
        function getData()
        {
              var str=localStorage.getItem("theData");
              var anchor = document.createElement("a");
              anchor.setAttribute("href", encodeURI(str));
              anchor.setAttribute("download", "my_data.csv");
              anchor.innerHTML= "Click Here to download";
              document.body.appendChild(anchor);
              anchor.click();
        }
        
        let iterations=7;
        function testmeasure(){
            setTimeout(function() {
                var t = performance.timing;
                var delta = t.loadEventEnd - t.responseEnd;
                cnt=parseInt(localStorage.getItem("Counter"));

          if(cnt>iterations){
              alert("Finished!"+cnt);
              getData();
              localStorage.clear();
          }else{
              if(isNaN(cnt)) cnt=0;
              var t = performance.timing;
              var str=localStorage.getItem("theData");
              str+= ',' +delta;         
              if(cnt==0){
                  str="data:text/csv;charset=utf-8";
              }

              // Increase counter and save data to local storage
              cnt++;
              localStorage.setItem("Counter",cnt);
              localStorage.setItem("theData",str);

              document.getElementById("next").click();
          }

            }, 1000);       
        }
    
        
    </script>
</head>

<body class="bg-image" style="background-image: linear-gradient(12deg, rgba(193, 193, 193,0.05) 0%, rgba(193, 193, 193,0.05) 2%,rgba(129, 129, 129,0.05) 2%, rgba(129, 129, 129,0.05) 27%,rgba(185, 185, 185,0.05) 27%, rgba(185, 185, 185,0.05) 66%,rgba(83, 83, 83,0.05) 66%, rgba(83, 83, 83,0.05) 100%),linear-gradient(321deg, rgba(240, 240, 240,0.05) 0%, rgba(240, 240, 240,0.05) 13%,rgba(231, 231, 231,0.05) 13%, rgba(231, 231, 231,0.05) 34%,rgba(139, 139, 139,0.05) 34%, rgba(139, 139, 139,0.05) 71%,rgba(112, 112, 112,0.05) 71%, rgba(112, 112, 112,0.05) 100%),linear-gradient(236deg, rgba(189, 189, 189,0.05) 0%, rgba(189, 189, 189,0.05) 47%,rgba(138, 138, 138,0.05) 47%, rgba(138, 138, 138,0.05) 58%,rgba(108, 108, 108,0.05) 58%, rgba(108, 108, 108,0.05) 85%,rgba(143, 143, 143,0.05) 85%, rgba(143, 143, 143,0.05) 100%),linear-gradient(96deg, rgba(53, 53, 53,0.05) 0%, rgba(53, 53, 53,0.05) 53%,rgba(44, 44, 44,0.05) 53%, rgba(44, 44, 44,0.05) 82%,rgba(77, 77, 77,0.05) 82%, rgba(77, 77, 77,0.05) 98%,rgba(8, 8, 8,0.05) 98%, rgba(8, 8, 8,0.05) 100%),linear-gradient(334deg, hsl(247,0%,2%),hsl(247,0%,2%)); height: 100vh" onload="testmeasure();">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 p-3" id="menu">   
      <form class="form-inline my-2 my-lg-0 w-100 d-flex justify-content-center">
          <a class="navbar-brand" href="index.php"><img src="images/logo.svg" alt="Dator&Fynd" width="150px"></a>
          <div class="input-group w-50" style="min-width: 18rem;">
              <form action="" method="GET">
                  <input type="search" class="form-control rounded" placeholder="Sök" aria-label="Search"
                    aria-describedby="search-addon" name="keyword"/>
                  <input type="submit" class="btn btn-primary btn-warning" name="submit" value="Sök"/>
              </form>
          </div>
      </form>
        <button class="btn btn-primary btn-warning" onclick="window.location.href='varukorg.php'">Varukorg</button>
    </nav> 
    <nav class="navbar nav-fill navbar-expand-lg navbar-dark bg-dark" id="menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav nav-tabs w-100 nav-fill bg-dark">
            <li class="nav-item"><a class="nav-link" href="index.php">Grafikkort</a></li>
            <li class="nav-item"><a class="nav-link" href="processorer.php">Processorer</a></li>
            <li class="nav-item"><a class="nav-link" href="moderkort.php">Moderkort</a></li>
            <li class="nav-item"><a class="nav-link" href="nataggregat.php">Nätaggregat</a></li>
            <li class="nav-item"><a class="nav-link active" href="minne.php">Minne</a></li>
            <li class="nav-item"><a class="nav-link" href="chassi.php">Chassi</a></li>
        </ul>
        </div>
    </nav>
    
   <div class="content text-light pt-4 ml-5 mr-5">
        <div class="row">  
        <?php
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
            $searchstring = "SELECT * FROM products WHERE type='minne' AND ";
            $displaywords = "";
            $keywords = explode(' ', $keyword);
            foreach ($keywords as $word){
                $searchstring .= "Title LIKE '%".$word."%' OR ";
                $displaywords .= $word.' ';
            }
            $searchstring = substr($searchstring, 0, strlen($searchstring)-4);
            $displaywords = substr($displaywords, 0, strlen($displaywords)-1);
            $query = mysqli_query($conn, $searchstring);
            $resultnr = mysqli_num_rows($query);
    
            if (isset($_GET['sidnr'])) {
                $sidnr = $_GET['sidnr'];
            } else {
                $sidnr = 1;
            }
            $products_per_page = 12;
            $offset = ($sidnr-1) * $products_per_page;
            $pages = ceil($resultnr / $products_per_page);

            $sql = "$searchstring LIMIT $offset, $products_per_page";
            $result_data = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result_data)){
                    ?>
        <div class="col-md-4 col-sm-12 col-lg-2">
                <div class="card bg-dark mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <?php echo '<a href="produkt.php?ID='.$row['ID'].'" class="cardlink">' ?>
                            <h5 class="card-title text-nowrap text-truncate"><?php echo $row['Title']; ?></h5>
                            <img class="card-img" src="<?php echo $row['Image']; ?>">
                            <p class="card-text text-nowrap text-truncate"><?php echo $row['Description']; ?></p>
                            <p class="card-text text-nowrap text-truncate"><?php echo 'Pris: '.$row['Pris'].'kr'; ?></p>
                        </a>
                    <form method="post" action="varukorg.php?type=add&ID=<?php echo $row['ID']; ?>">
                        <div class="w-100"><input type="submit" value="Lägg till i varukorg" class="btn btn-primary btn-warning m-1" /></div>
                    </form>
                    </div>
                </div>
              </div>
        <?php
            }
            mysqli_close($conn);
        ?>
        </div>
        
        <?php
        if(isset($_GET['submit'])){
            echo '<div class="text-center"><b><u>'.number_format($resultnr).'</u></b>&nbspresultat hittades';
            echo '&nbspför sökordet&nbsp<i>"'.$displaywords.'"</i></div>';
        }
        if($resultnr > $products_per_page) {
        ?>
            <nav>
              <ul class="pagination pagination-lg justify-content-center fixed-bottom">
                <li class="<?php if($sidnr <= 1){ echo 'disabled'; } ?> active"><a class="page-link bg-dark text-light border-warning" href="<?php if($sidnr <= 1){ echo '#'; } else { echo "?sidnr=".($sidnr - 1); } ?>">&laquo;</a></li>
                  <?php
                  for($x = ($sidnr - 1); $x <= ($sidnr + 1); $x++){
                      if($x>0 && $x<=$pages){
                  ?>
                    <li><a class="page-link bg-dark text-light border-warning" href="<?php echo "?sidnr=".($x); ?>"><?php echo $x;?></a></li>
                  <?php
                      }
                  }
                  ?>
                <li class="page-item <?php if($sidnr >= $pages){ echo 'disabled'; } ?>"><a class="page-link bg-dark text-light border-warning" href="<?php if($sidnr >= $pages){ echo '#'; } else { echo "?sidnr=".($sidnr + 1); } ?>">&raquo;</a></li>
              </ul>
            </nav>
        <?php
            }
        ?>
</body>
</html>