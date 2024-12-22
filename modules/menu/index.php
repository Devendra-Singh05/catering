<?php
mustlogin();
$dbobj=db('menu');
$data= $dbobj->all();
if(isset($_POST['del'])){
    $delid=implode(",",$_POST['del']);
    foreach($_POST['del'] as $did){
        if($pn=($dbobj->find($did,'picture')['picture'])){
            unlink("fileupload/images/$pn");
        }
    }
    $dbobj->delete($delid);
    Session::set('gt',"Data Deleted Successfully");
redirect('menu');
exit;
}
?>
<div class="mb-2 mt-2">
    <a href="<?=ROOT;?>menu/form" class="btn btn-primary"> Add Items </a>
</div>
<?php
if($msg=Session::get('gt')){
    ?>
    <div class="alert alert-success text-center h3"><?=$msg?></div>
    <?php
    Session::delete('gt');
}?>
<form method="post">
<table class="table table-stripted border" id='myTable'>
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            <th><input type="checkbox" id="all" onclick="checkdel(this)"><label for="all">All</label></th>
            <th>Item Name</th>
            <th>Picture</th>
            <th>Category</th>
            <th>Status</th>
            <th>Price</th>
            <th>Item Inserted</th>
            <th>Item Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index=0;
        foreach($data as $info){?>
        <tr>
            <td><?=++$index?></td>
            <td><input type="checkbox" onclick="displaybtn()" name="del[]"  class="delc" value="<?=$info['id']?>"></td>
            <td>
            <a href="<?=ROOT;?>menu/form/<?= $info['id'];?>" title="click for edit">
            <?=$info['item'];?>
        </td>
        <td>
            <?php
            if($info['picture']){?>
        <img class="rounded mx-auto d-block" src="<?=ROOT.'fileupload/images/'.$info['picture'];?>" height="100px" >
        <?php
            }
            else{
                echo "<span class='text-muted'>N/A</span>";
            }
            ?>
        </td>
            <td><?=$info['category'];?></td>
            <td><?=$info['availablity'];?></td>
            <td>
                <?php 
            if($info['price']){
                echo "₹".$info['price'];
            }
            ?>
            </td>
            <td><?= date('d-M-Y h:i:s A',strtotime($info['created_at']));?></td>
            <td><?=date('d-M-Y h:i:s A',strtotime($info['updated_at']));?></td>
        </tr>
        <?php
        }
        ?>
      
    </tbody>
</table>
<div id="ditem"    style="display: none;" >
                <button class="btn btn-danger" onclick="return confirm('do you really want to delete this record')">Delete Selected Items</button>  
</div>
</form>