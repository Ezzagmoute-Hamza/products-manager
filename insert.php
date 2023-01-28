<?php
include("connect_db.php");
  if(isset($_POST['addProd']) && $_SERVER['REQUEST_METHOD']==="POST"){
    $prodName=$_POST["prodName"];
    $prodPrice=$_POST["prodPrice"];
    $imageName = $_FILES['prodImage']['name'];
    $imageTmpName = $_FILES['prodImage']['tmp_name'];
    $imageError = $_FILES['prodImage']['error'];
    $imageExt = explode('.', $imageName);
    $imageActualExtension = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($imageActualExtension, $allowed)) {
        if ($imageError === 0) {
            $imageNameNew=uniqid('',true).".".$imageActualExtension;
            $imageDestination="images_server/$imageNameNew";
            if(move_uploaded_file($imageTmpName,$imageDestination)){
                // this commands allows to insert a product to the database.//
                $statement=$db->prepare("INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_image`) VALUES (NULL,'$prodName','$prodPrice','$imageDestination')");
                $statement->execute();
                // -------//
                header("Location:$_SERVER[HTTP_REFERER]");
            }else{
                header("Location:$_SERVER[PHP_SELF]");
                echo "a problem occured during moving the image to folder";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
  }
  ?>
