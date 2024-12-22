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
<div class="container">
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="item">Item Name</label>
        <input type="text" class="form-control" placeholder="Enter Item Name" required name="item"  id="item" value="<?=$info['item']??''?>">
    </div>
    <div class="mb-3">
        <label for="discription">Discription</label>
        <textarea class="form-control" rows=1 placeholder="Enter discription"  name="discription"  id="discription"><?=$info['discription']??''?></textarea>
    </div>

    <div class="mb-3">
        
        <label>Select Category</label>
        <?php $cats=explode(',',$info['category']??'');?>
        <select name="category[]" class="form-select" multiple>
            <option value="starter" <?=(in_array('starter',$cats))?'selected':'';?>>starter</option>
            <option value="maincourse" <?=(in_array('maincourse',$cats))?'selected':'';?>>maincourse</option>
            <option value="dessert" <?=(in_array('dessert',$cats))?'selected':'';?>>dessert</option>
            <option value="fastfood" <?=(in_array('fastfood',$cats))?'selected':'';?>>fastfood</option>
        </select>
    </div>


    <div class="mb-3">
        <label for="availablity">Status</label>
        <select name="availablity" class="form-select" >
            <option value="yes">Yes</option>
            <option value="no" <?=($info['availablity']??'')=='no'? 'selected':'';?>>No

            </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="price">Enter Price</label>
        <input type="number" class="form-control" placeholder="Enter Price" required name="price"  id="price" value="<?=$info['price']??''?>">
    </div>

    <?php
    if(isset($picture)){
        ?>

    
    <div class="mb-3">
        <label for="picture">Uploaded Picture</label>
        <div class="form-control">
        <img src="<?=ROOT.'fileupload/images/'.$picture;?>" height="100px" >
    </div>
    </div>
    <?php
    }
    ?>
    <div class="mb-3">
        <label for="picture">Upload Picture</label>
        <input type="file" name="picture" id="picture" accept="image/*" class="form-control form-control-sm">
    </div>

   
    
    <div class="mb-3 text-center">
        <button class="btn btn-success"> <?=$uid?"Update":"Save"?>
        </button>
    </div>
</form>
</div>