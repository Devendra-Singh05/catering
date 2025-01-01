<?php

$ddata= db('menu')->filter(['availablity'=>'yes']);
$finaldata=[];
$size=0;
$categories=[];
foreach($ddata as $info){
   $cats= explode(',',$info['category']);
   if($categories){
      foreach($cats as $value){
        if(!in_array($value,$categories)){
            $categories[]=$value;
        }
    }
}
     else{
            $categories=$cats;
        }
}

foreach($ddata as $info){
   $cats= explode(',',$info['category']);
    foreach($cats as $val){
        if(in_array($val,$categories)){
            $finaldata[$val][]=$info;
        }
    }
}

?>
<form method="post">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Display</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS for Styling -->
<link rel="stylesheet" href="<?=ROOT;?>public/css/userindex.css">
<style>
        /* Container for the product image with a fixed size of 300x200 pixels */
        .product-container {
            width: 300px;
            height: 200px;
            overflow: hidden; /* Ensures the image fits within the frame */
            border: 1px solid #ccc; /* Optional border for visibility */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Style for the image to ensure it fits properly in the container */
        .product-container img {
            width: 100%; /* Scale the width of the image to 100% of the container */
            height: 100%; /* Scale the height of the image to 100% of the container */
            object-fit: cover; /* Ensures the image covers the frame, cropping if necessary */
        }

        /* Style for the product title and description */
        .product-info {
            text-align: center;
        }
    </style>
</head>

<body>


<div class="container my-5">
    <div class="menu-header">
      <h1 class="display-4">Our Menu</h1>
      <p class="lead">Delicious meals prepared just for you</p>
    </div>

   
  <?php foreach($finaldata as $category=>$data){?>
    <h3 class="mb-4 text-danger"><?= strtoupper($category) ?></h3>
    <div class="row">
      <!-- Menu Item 1 -->
      <?php
        $index=0;
        foreach($data as $info){?>
      <div class="col-md-4">
        <div class="card menu-item" class="product-container">
          <img src="<?=ROOT."fileupload/images/".(($info['picture'])? $info['picture']:"notfound.png");?>" alt="Grilled Chicken" class="card-img-top"> 

          <div class="card-body menu-item-body" class="product-info">
            <h5 class="card-title"><?=$info['item'];?></h5>
            <p class="card-text"><?=$info['discription'];?></p>
            <p class="price" style="color: red;">
                <?php
                if(isset($info['price']) or isset($info['unit'])){
                 echo  "₹".$info['price']." / ".($info['unit']);
                }
                else{
                    echo "price N/A";
                }
                ?>
            </p>
          </div>

          
        </div>
      </div>
      <?php
        }
        ?>
        <hr>
    <?php
  }?>
</body>

</html>

