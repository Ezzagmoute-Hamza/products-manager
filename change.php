<?php
    include("connect_db.php");
    error_reporting(0);
    if($_SERVER['HTTP_REFERER']==="http://localhost/e_shopping/products.php"){
        $prodID=$_GET['prodId'];
        $statement=$db->prepare("SELECT * FROM `products` WHERE prod_id=$prodID");
        $statement->execute();
        $allProducts=$statement->fetch();
    }else{
        header('Location:error.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin | Update product</title>
    <style>
        .go_back{
            position: absolute;
            top: 60px;
            left: 120px;
            color:#0d6efd;
            text-decoration: solid !important;
            padding: 6px 12px;
            background-color: #0d6efd;
            color: #ffffff;
            font-size: 1rem;
            border-radius: 6px;
        }
         @media only screen and (max-width:543px){
        h1{
            color: red;
            font-size:1.5rem;
        }
        .container1{
            width:300px;
            padding:20px;  
            padding:20px 10px;      
        }
        .container1 input{
            width: 80%;
            padding: 5px;
            margin:8px 0;
            outline: none;
        }
        .btns{
            width: 80%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: -15px;
            background-color: white;

        }
        .btns label,button{
            padding:10px;
            width:100%;
            margin:5px 0;
        }
        }
        @media only screen and (max-width:320px){
            h1{
            font-size:1rem;
        }
        .container1{
            width:250px;
            padding:10px;  
            padding:20px 10px;      
        }
        .container1 input{
            width: 90%;
            padding:5px;
            margin:10px 0;
            outline: none;
        }
        .btns{
            width: 90%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: -15px;
            background-color: white;

        }
        .btns label,button{
            padding:10px;
            width:100%;
            margin:5px 0;
        }
        }
    </style>
</head>
<body>
    <a href="products.php" class="go_back">Go Back</a>
    <div class="container1">
        <h1>Update Product</h1>
        <form method="post" action="edit.php" enctype="multipart/form-data">
                <input type="number" placeholder="Product ID" readonly name="prodId" value="<?php echo $prodID?>">
                <input type="text" placeholder="New Product Name" name="prodName" required pattern="[a-zA-Z0-9-\s]+" value="<?php echo $allProducts['prod_name']?>">
                <input type="text" placeholder="New Product Price" name="prodPrice" required pattern="^[0-9]{1,}\$" value="<?php echo $allProducts['prod_price']?>"> <br>
                <div class="btns">
                    <label for="image">Change Image</label>
                    <input type="file" name="prodImage" accept="image/*" id="image" style="display: none;" required>
                    <button name="updateProd" type="submit">Update Product</button> 
                </div>      
        </form>
    </div>
 
</body>
</html>