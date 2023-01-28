<?php
    include('connect_db.php');
    error_reporting(0);
    if($_SERVER['HTTP_REFERER']==="http://localhost/e_shopping/products.php"){
        $prodID=$_GET['prodId'];
        // $statement=$db->prepare("DELETE FROM products WHERE `products`.`prod_id` = $prodID");
        $statement=$db->prepare("SELECT * FROM `products` WHERE prod_id=$prodID");
        $statement->execute();
        $allProducts=$statement->fetch();

        if($allProducts){
           $deleteStatement=$db->prepare("DELETE FROM products WHERE `products`.`prod_id` = $prodID");
           $deleteStatement->execute();
           header("Location:products.php");
        }else{
            echo "there is no product that has '$prodID' as an ID";
        }
    }else{
        header('Location:error.php');
    }
 
?>
