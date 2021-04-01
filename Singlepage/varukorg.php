<script>
    $(document).ready(function() {
            $("button.varukorg").click(function() {
                var ID=this.name;
                var submittype="remove";
            $("#content").load("varukorg.php", {
                productID: ID,
                type: submittype
            });
        });
    });
</script>

<?php
    include_once 'dbh.php';
    session_start();
    $pricetotal = 0;
    if(isset($_POST["productID"])){
        $ID = $_POST["productID"];
        $productbyid = "SELECT * FROM products WHERE ID=$ID";
        $result = mysqli_query($conn,$productbyid);
        $product=mysqli_fetch_array ($result);
        $cartitems = array($product["ID"]=>array('Title'=>$product["Title"], 'ID'=>$product["ID"], 'Price'=>$product["Pris"], 'Image'=>$product["Image"], 'Type'=>$product["Type"]));
    }

    if(isset($_POST["type"]) && $_POST["type"]=="add"){
        if(!empty($_SESSION["cartitem"])) {
                $_SESSION["cartitem"] = array_merge($_SESSION["cartitem"],$cartitems);
            } else {
                $_SESSION["cartitem"] = $cartitems;
        }
    }
    if(isset($_POST["type"]) && $_POST["type"]=="remove"){
        if(!empty($_SESSION["cartitem"])) {
            foreach($_SESSION["cartitem"] as $k => $v) {
                if($v['ID'] == $_POST["productID"]){
                    unset($_SESSION["cartitem"][$k]);
                    break;
                }
            }
        }
    }
?>

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
                <td><img src="<?php echo $item["Image"]; ?>" class="w-20" /><?php echo " ".$item["Title"]; ?></td>
                <td style="text-align:left;"><?php echo $item["Type"]; ?></td>
                <td><?php echo $item["ID"]; ?></td>
                <td style="text-align:right;"><?php echo $item["Price"]." kr"; ?></td>
                <td style="text-align:center;"> <button class="btn btn-primary btn-warning varukorg" name="<?php echo $item['ID']; ?>">X</button></td>
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
