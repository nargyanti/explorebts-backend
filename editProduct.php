<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/styleLogin.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>Edit Product</title>
    </head>
    <body>
        <?php
            include "connection.php";
            $product_id = $_GET['product_id'];
            $query = "SELECT * FROM products WHERE product_id = '$product_id'";
            $result = mysqli_query($connect, $query);        
            $row = mysqli_fetch_array($result)    
        ?>
        <div class="card container">
            <div class="card-body">
                <form action="editProductProcess.php?product_id=<?php echo $product_id;?>" method="POST" enctype="multipart/form-data">                
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']; ?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="product_pict" class="form-label">Product Picture</label>
                        <input class="form-control" type="file" name="product_pict" value="<?php echo $row['product_pict']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_code" class="form-label">Category Code</label>
                        <?php $default_category_code = $row['category_code'];?>
                        <select class="form-select" name="category_code" required>                            
                            <option value='<?php echo $default_category_code;?>' selected='selected' hidden><?php echo $default_category_code;?></option>
                            <option value="CMP">Camping Tools</option>
                            <option value="INN">Inn</option>                            
                            <option value="JEEP">Jeep</option>                            
                            <option value="TRIP">Trip</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="text" class="form-control" name="unit_price" value="<?php echo $row['unit_price']; ?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="product_stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" name="product_stock" value="<?php echo $row['product_stock']; ?>" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="product_desc" class="form-label">Description</label><br>
                        <textarea name="product_desc" id="product_desc" cols="100" rows="5" required><?php echo $row['product_desc']; ?></textarea>
                    </div>                        
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>    
        </div> 
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>