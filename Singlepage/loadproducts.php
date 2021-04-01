<?php
    include_once 'dbh.php';
    session_start();
    $type = $_POST['producttype']; 
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $searchstring = "SELECT * FROM products WHERE type='$type' AND ";
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
    echo '<div class="row">'; 
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
              for($x = 1; $x <= $pages; $x++){
              ?>
                <li class="active"><a class="page-link bg-dark text-light border-warning" href="<?php echo "?sidnr=".($x); ?>"><?php echo $x;?></a></li>
              <?php
              }
              ?>
            <li class="page-item <?php if($sidnr >= $pages){ echo 'disabled'; } ?>"><a class="page-link bg-dark text-light border-warning" href="<?php if($sidnr >= $pages){ echo '#'; } else { echo "?sidnr=".($sidnr + 1); } ?>">&raquo;</a></li>
          </ul>
        </nav>
<?php
    }
?>