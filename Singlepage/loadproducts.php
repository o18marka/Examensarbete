<script>
    $(document).ready(function() {
        $("a.cardlink").click(function() {
            var ID=this.name;
          $("#content").load("productdetails.php", {
              productID: ID
          });
       });
    });
    
    $(document).ready(function() {
        $("button.varukorg").click(function() {
            var ID=this.name;
            var submittype="add";
            $("a").removeClass("active");
          $("#content").load("varukorg.php", {
              productID: ID,
              type: submittype
          });
       });
    });
    

     $("#1").removeClass("bg-dark");
        $("#1").addClass("bg-warning");
     $(document).ready(function() { 
        
        $("#forward").click(function() {
        var nextPage = parseInt($('#sidnr').val())+1;
        var totalpagenr = parseInt($('#totalpagenr').val());
        var type = $('#producttype').val();
         $.ajax({
             url: 'loadproducts.php',
             type: 'POST',
             data: { sidnr: nextPage, producttype: type },
             success: function(data){
                 if(data != '' && nextPage <= totalpagenr){							 
                     $('#content').empty().append(data),
                     $('#sidnr').val(nextPage);
                     $('#'+nextPage).removeClass("bg-dark");
                     $('#'+nextPage).addClass("bg-warning");
                     $("#1").removeClass("bg-warning");
                     $("#1").addClass("bg-dark");
                 } 
             }
         });
     })
         
     $("#backward").click(function() {
    var prevPage = parseInt($('#sidnr').val())-1;  
    var type = $('#producttype').val();
     $.ajax({
         url: 'loadproducts.php',
         type: 'POST',
         data: { sidnr: prevPage, producttype: type },
         success: function(data){
             if(data != '' && prevPage >0){							 
                 $('#content').empty().append(data),
                 $('#sidnr').val(prevPage);
                 $('#'+prevPage).removeClass("bg-dark");
                 $('#'+prevPage).addClass("bg-warning");
                 if(prevPage!=1){
                     $("#1").removeClass("bg-warning");
                     $("#1").addClass("bg-dark");
                 }
             } 
         }
     });
     })
         
     $(".pagenumbernav").click(function() {
         console.log("clicked!");
         $('#sidnr').val(this.id);
         var type = $('#producttype').val();
         var Page = parseInt($('#sidnr').val()); 
         $.ajax({
         url: 'loadproducts.php',
         type: 'POST',
         data: { sidnr: Page, producttype: type },
         success: function(data){
             if(data != ''){							 
                 $('#content').empty().append(data),
                 $('#sidnr').val(Page);
                 $('#'+Page).removeClass("bg-dark");
                 $('#'+Page).addClass("bg-warning");
                 if(Page!=1){
                     $("#1").removeClass("bg-warning");
                     $("#1").addClass("bg-dark");
                 }
             } 
         }
     });
     })
});     
        
    
</script>

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

    if (isset($_POST['sidnr'])) {
        $sidnr = $_POST['sidnr'];
    } else {
        $sidnr = 1;
    }
    $products_per_page = 2;
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
            <?php echo '<a class="cardlink" name='.$row['ID'].'>' ?>
                <h5 class="card-title text-nowrap text-truncate"><?php echo $row['Title']; ?></h5>
                <img class="card-img" src="<?php echo $row['Image']; ?>">
                <p class="card-text text-nowrap text-truncate"><?php echo $row['Description']; ?></p>
                <p class="card-text text-nowrap text-truncate"><?php echo 'Pris: '.$row['Pris'].'kr'; ?></p>
            </a>
            <button class="btn btn-primary btn-warning varukorg" name="<?php echo $row['ID']; ?>">Lägg till i varukorg</button>
            </div>
        </div>
    </div>
<?php
    }
?>

</div>
<input type="hidden" id="sidnr" value="1"/>
<input type="hidden" id="totalpagenr" value="<?php echo $pages ?>"/>
<input type="hidden" id="producttype" value="<?php echo $type ?>">
<?php
    if(isset($_GET['submit'])){
        echo '<div class="text-center"><b><u>'.number_format($resultnr).'</u></b>&nbspresultat hittades';
        echo '&nbspför sökordet&nbsp<i>"'.$displaywords.'"</i></div>';
    }
    if($resultnr > $products_per_page) {
    ?>
      <nav>
          <ul class="pagination pagination-lg justify-content-center fixed-bottom">
            <li><a class="page-link bg-dark text-light border-warning" id="backward">&laquo;</a></li>
               <?php
                  for($x = 1; $x <= $pages; $x++){
                  ?>
                    <li><a class="page-link bg-dark text-light border-warning pagenumbernav" id="<?php echo $x;?>"><?php echo $x;?></a></li>
                  <?php
                  }
                  ?>
            <li><a class="page-link bg-dark text-light border-warning" id="forward">&raquo;</a></li>
          </ul>
        </nav>  
<?php
    }
?>