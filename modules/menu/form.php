<?php
mustlogin();
$obj=DB('menu');
if($uid){
    $info=$obj->find($uid);
    // $maxSize = 1 * 1024 * 1024;
    $picture=$info['picture'];
    
}
//for file size
    // if (($_FILES['picture']['size']) > isset($maxSize)){
    //     $valid = 0;
    //     $error = "The file is too large. The maximum allowed size is 1MB.";
    // }
if(isset($_POST['item'])){
    $valid=1;
    
    if($_FILES['picture']['error']==0){
        
    if('image'==substr($_FILES['picture']['type'],0,strpos($_FILES['picture']['type'],'/'))){
        if(isset($picture)){
            unlink("fileupload/images/$picture");
        }
      $picture=time().$_FILES['picture']['name'];
      move_uploaded_file($_FILES['picture']['tmp_name'],"fileupload/images/$picture");

    }else{
             $valid=0;
             $error= "file type not supported";
    }
    }
    
    if($valid){
    $info=[
        'item'=>$_POST['item'],
        'discription'=>$_POST['discription'],
        'category'=>$_POST['category']?implode(',',$_POST['category']):"",
        'availablity'=>$_POST['availablity'],
        'price'=>$_POST['price'],
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

      <?php
        if(isset($picture)){
      ?>
      <div class="mb-3">
        <label for="picture">Uploaded Picture</label>
        <div class="form-control">
          <img src="<?=ROOT.'fileupload/images/'.$picture;?>" height="100px">
        </div>
      </div>
      <?php
        }
      ?>

      <div class="mb-3">
        <label for="picture">Upload Picture</label>
        <input type="file" name="picture" id="picture" accept="image/*" class="form-control form-control-sm">
      </div>

 

  <script>
    document.getElementById('picture').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const img = new Image();
        const reader = new FileReader();

        reader.onload = function(e) {
          img.src = e.target.result;
          img.onload = function() {
            // Create a canvas to resize the image
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 300;  // Resize width
            canvas.height = 200; // Resize height

            // Draw the image onto the canvas
            ctx.drawImage(img, 0, 0, 300, 200);

            // Convert the resized image to a Data URL and display the preview
            const resizedImageUrl = canvas.toDataURL('image/jpeg');
            // Show the preview in the image tag or in any other element
            document.getElementById('picture').setAttribute('data-resized', resizedImageUrl);
          };
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
</body>
</html>

    
    <div class="mb-3 text-center">
        <button class="btn btn-success"> <?=$uid?"Update":"Save"?>
        </button>
    </div>
 
</form>
</div>