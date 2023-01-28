<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Product To Store</title>
    <style>
        @media only screen and (max-width:543px){
            h1{
            font-size:1.5rem;
        }
        .container1{
            width:300px;
            padding:20px;  
            padding:20px 10px;      
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
            padding: 5px;
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
    <div class="container1">
        <h1>Add Product</h1>
        <img src="./images/electroproduct.png">
        <form action="insert.php"  method="post" enctype="multipart/form-data">  
                <input type="text" name="prodName" placeholder="Product Name" required pattern="^[a-zA-Z0-9-\s]+">
                <input type="text" name="prodPrice" placeholder="Product Price" required pattern="^[0-9]{1,}\$"> <br>
                <div class="btns">
                    <label for="image">Choose image</label>
                    <input type="file" name="prodImage" accept="image/*" id="image" required style="display: none;">
                    <button type="submit" name="addProd">Add Product</button> 
                </div>      
        </form>
        <a href="products.php" style="margin-top:10px;color:#0d6efd;">Show all products</a>
    </div>
 
</body>
</html>