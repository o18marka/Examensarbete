<?php
    include_once 'dbh.php';
    session_start();
    $ID = $_POST['productID']; 
    $query = 'SELECT * FROM products WHERE ID = '.$ID.' LIMIT 1';
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result); 
?>
    <div class="bg-dark m-4 text-light m-auto row">
        <div class="col-md-6 col-lg-3 m-3">
            <img class="card-img d-inline-block" src="<?php echo $row['Image']; ?>">
        </div>
        <div class="d-inline-block align-top mt-4 col-md-4 ml-3 mr-3">
            <h1 class="card-title"><?php echo $row['Title']; ?></h1>
            <p class="card-text"><?php echo $row['Description']; ?></p>
            <h2 class="card-text"><?php echo 'Pris: '.$row['Pris'].'kr'; ?></h2>
            <form method="post" action="varukorg.php?type=add&ID=<?php echo $row['ID']; ?>">
                <div class="w-100"><input type="submit" value="Lägg till i varukorg" class="btn btn-primary btn-warning m-1" /></div>
            </form>
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