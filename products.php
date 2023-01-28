<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
    crossorigin="anonymous">
    <title>Store | All Products</title>

    <style>
        img{
           width:100%;
           height:150px;
        }
        .card{
            margin:5px 0;
        }
        .card-body{
            display: flex;
            justify-content: space-evenly;

        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
        
          <div class="col-12 p-5 pb-1 text-center " style="color: rgb(127, 143, 143);">
            <div class="w-100  text-start d-flex justify-content-between">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class=" btn btn-primary ">Go Back</a>
              <a href="index.php" class="btn btn-success ">Add Product</a>        
            </div>
            <p class="fw-bold fs-2">All Products</p>
          </div>
          <div class="col-12 ">
               <div class="row p-2">
                    <?php 
                        include('connect_db.php');
                        $mylist=explode("=",$_SERVER['HTTP_REFERER']);
                        $prodid=end($mylist);
                        $allowed=array("http://localhost/e_shopping/index.php","http://localhost/e_shopping/change.php?prodId=$prodid");               
                        if( in_array($_SERVER['HTTP_REFERER'],$allowed)){
                        $mylist=explode("=",$_SERVER['HTTP_REFERER']);
                        $statement=$db->prepare("SELECT * FROM `products`");
                        $statement->execute();
                        $allProducts=$statement->fetchAll();
                        if(count($allProducts)){
                          foreach($allProducts as $singleProduct)
                          {
                       
                      ?>
                      <!-- ------------ -->
                          <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 text-center" id="mycardBox">
                              <div class="card" style="width:100%;">
                                  <img src=<?php echo $singleProduct['prod_image']?> class="card-img-top" >
                                  <ul class="list-group list-group-flush">
                                      <li class="list-group-item"><?php echo $singleProduct['prod_name']?> </li>
                                      <li class="list-group-item"><?php echo $singleProduct['prod_price']?> </li>
                                  </ul>
                                  <div class="card-body">
                                      <a href="delete.php?prodId=<?php echo $singleProduct['prod_id'];?>" class="btn btn-danger" name="deletepro">Delete</a>
                                      <a href="change.php?prodId=<?php echo $singleProduct['prod_id'];?>" class="btn btn-primary" name="editpro">Edit</a>
                                  </div>
                              </div>
                          </div>   
                      <!-- ------------ -->                 
                      <?php
                          }
                        }else{
                          echo "<p class='fw-bold fs-2 w-100 text-center'>No product Found</p>";
                        }
                      }else{
                        header('Location:error.php');
                      }
                    ?>                 
               </div>
          </div>
        </div>
      </div>
</body>
</html>