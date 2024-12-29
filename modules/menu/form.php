<?php
mustlogin();
$obj=DB('menu');
    $maxSize = 2 * 1024 * 1024;

if($uid){
    $info=$obj->find($uid);
    $picture=$info['picture'];
    
}

if(isset($_POST['item'])){
    $valid=1;
    
if ($_FILES['picture']['error'] == 0) {
    // Check if the uploaded file is an image
    if ('image' == substr($_FILES['picture']['type'], 0, strpos($_FILES['picture']['type'], '/'))) {
        
        // Remove the previous image if it exists (optional)
        if (isset($picture)) {
            unlink("fileupload/images/$picture");
        }
        
        // Generate a unique name for the uploaded file
        $picture = time() . $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileType = $_FILES['picture']['type'];
        $fileSize= $_FILES['picture']['size'];

        // Define the output file path
        $outputFilePath = "fileupload/images/$picture";


        // Check if it's a JPEG file
        if ($fileType == 'image/jpeg') {
            // Load the image
            $image = imagecreatefromjpeg($fileTmpName);
            
            // Set the new image quality (0 = worst quality, 100 = best quality)
            $quality = 20; // Adjust this value based on your needs

            do {
              if ($fileType == 'image/jpeg') {
                  imagejpeg($image, $outputFilePath, $quality);
              } 
              
              // Check file size
              $fileSize = filesize($outputFilePath);
              $quality -= 10; // Reduce quality with each iteration
          } while ($fileSize > $maxSize  && $quality > 2); 
      

            // Save the compressed image
            
            imagejpeg($image, $outputFilePath, $quality);
            
            // echo "JPEG image uploaded and compressed successfully!";
            
        } 
        // Check if it's a PNG file
        elseif ($fileType == 'image/png') {
            // Load the image
            $image = imagecreatefrompng($fileTmpName);
            
            // Set the compression level (0 = no compression, 9 = maximum compression)
            $compressionLevel = 6; // Adjust this value based on your needs
            
            // Save the compressed image
            imagepng($image, $outputFilePath, $compressionLevel);
            
            // echo "PNG image uploaded and compressed successfully!";
            
        } else {
            $valid = 0;
            $error = "File type not supported!";
        }

        // Clean up
        if(isset($image)){
        imagedestroy(($image));
        }
        
    } else {
        $valid = 0;
        $error = "Only image files are allowed!";
    }
}


  //   if($_FILES['picture']['error']==0){

    

        
  //   if('image'==substr($_FILES['picture']['type'],0,strpos($_FILES['picture']['type'],'/'))){
  //       if(isset($picture)){
  //           unlink("fileupload/images/$picture");
  //       }
  //     $picture=time().$_FILES['picture']['name'];
  //     move_uploaded_file($_FILES['picture']['tmp_name'],"fileupload/images/$picture");

  //   }else{
  //            $valid=0;
  //            $error= "file type not supported";
  //   }
  // }
  //   }
    
    if($valid){
    $info=[
        'item'=>$_POST['item'],
        'discription'=>$_POST['discription'],
        'category'=>$_POST['category']?implode(',',$_POST['category']):"",
        'availablity'=>$_POST['availablity'],
        'price'=>$_POST['price'],
        'unit'=>$_POST['unit'],
        'picture'=>$picture
    ];
    if($obj->save($info,$uid)){
        Session::set('gt',"Data ".($uid?"Updated ":"Saved ")."Successfully");
        redirect("menu");
    }
    else{
        $error="something went wrong";
    }
}
}
// $x=[
//     'item'=>'shahi paneer',
// 'discription'=>'kuch nhi'


// ];

?>
<?php if(isset($error)){?>
<div class="alert alert-danger"><?=$error;?></div>
<?php
}?>
<div class="alert alert-primary h3 text-center">
    Item <?=$uid?"Edit":"Add"?> Form
</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Item Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    .uploaded-img {
      max-width: 300px;
      max-height: 200px;
      margin-top: 20px;
      object-fit: cover;
      border: 2px solid #ddd;
    }
  </style>
</head>
<body>
  <div class="container">
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="item">Item Name</label>
        <input type="text" class="form-control" placeholder="Enter Item Name" required name="item" id="item" value="<?=$info['item']??''?>">
      </div>
      <div class="mb-3">
        <label for="discription">Description</label>
        <textarea class="form-control" rows=1 placeholder="Enter description" name="discription" id="discription"><?=$info['discription']??''?></textarea>
      </div>

      <div class="mb-3">
        <label>Select Category</label>
        <?php $cats = explode(',', $info['category'] ?? ''); ?>
        <select name="category[]" class="form-select" multiple>
          <option value="starter" <?= (in_array('starter', $cats)) ? 'selected' : ''; ?>>Starter</option>
          <option value="maincourse" <?= (in_array('maincourse', $cats)) ? 'selected' : ''; ?>>Main Course</option>
          <option value="dessert" <?= (in_array('dessert', $cats)) ? 'selected' : ''; ?>>Dessert</option>
          <option value="fastfood" <?= (in_array('fastfood', $cats)) ? 'selected' : ''; ?>>Fast Food</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="availablity">Status</label>
        <select name="availablity" class="form-select">
          <option value="yes">Yes</option>
          <option value="no" <?= ($info['availablity'] ?? '') == 'no' ? 'selected' : ''; ?>>No</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="price">Enter Price</label>
        <input type="number" class="form-control" placeholder="Enter Price" required name="price" id="price" value="<?=$info['price']??''?>">
      </div>

      <div class="mb-3">
        <label for="unit">Unit</label>
        <input type="text" placeholder="Enter Unit" class="form-select" required name="unit" id="unit" list="un" value="<?=$info['unit']??''?>">
         <datalist id="un">
         <option value="KG">
         <option value="Plate">
          <option value="Piece">
         </datalist>
      </div>

      <?php
        if(isset($picture)){
      ?>
      <div class="mb-3">
        <label for="picture">Uploaded Picture</label>
        <div class="form-control">
          <img src="<?=ROOT."fileupload/images/".(($info['picture'])? $info['picture']:"notfound.png");?>" height="100px">
        </div>
      </div>
      <?php
        }
      ?>

      <div class="mb-3">
        <label for="picture">Upload Picture</label>
        <input type="file" name="picture" id="picture" accept="image/*" class="form-control form-control-sm">
      </div>

 

  
</body>
</html>

    
    <div class="mb-3 text-center">
        <button class="btn btn-success"> <?=$uid?"Update":"Save"?>
        </button>
    </div>
 
</form>
</div>