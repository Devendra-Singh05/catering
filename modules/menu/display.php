<?php

$data= db('menu')->filter(['availablity'=>'yes']);
echo "<pre>";
$finaldata=[];
foreach($data as $info){
   $cats= explode(',',$info['category']);
    $finaldata[$info['category']][]=$info;

}
print_r($finaldata);
exit;
?>
<form method="post">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ROOT;?>public/css/custom.css">
    
</head>

<body>

    <div class="container menu-container">
        <h1 class="menu-title">Menu</h1>

        <?php
        $index=0;
        foreach($data as $info){?>
        <!-- Appetizers Section -->
        <div class="category-title">Appetizers</div>
        <div class="row d-flex justify-content-start">
        
            <!-- Menu Item 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="<?=ROOT."fileupload/images/".(($info['picture'])? $info['picture']:"notfound.png");?>" alt="Appetizer 1">
                    <h3 class="item-title"><?=$info['item'];?></h3>
                    <p class="item-price">  
                        <?php 
                          if($info['price']){
                          echo $info['price']."$";
                        }
                     else{

                     echo "Price Not Updated";
                    }
            ?>
            </p>
                    <p class="item-description"><?=$info['discription'];?></p>
                    
                </div>
            </div>
                <?php
                }
                  ?>
        </div>
    </div>
    
</body>

</html>



<table class="table table-stripted border" id='myTable'>
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            
            <th>Item Name</th>
            <th>Category</th>
            <th>Status</th>
          
        </tr>
    </thead>
    <tbody>
        <?php
        $index=0;
        foreach($data as $info){?>
        <tr>
            <td><?=++$index?></td>
            
            <td>
         
            <?=$info['item'];?>
        </td>
            <td><?=$info['category'];?></td>
            <td><?=$info['availablity'];?></td>
       
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>

</form>