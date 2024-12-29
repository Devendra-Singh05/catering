<?php
$info=(DB('menu')->find($_GET['id'],'price,unit'));
?>
<label for="price" class="form-label">Price</label>
<div class="input-group">


<input type="number" id="price" name="price" class="form-control" readonly value="<?=$info['price']?>" placeholder="price" min="1" required disabled>
<div class="input-group-append">
    <span class="input-group-text"><?=$info['unit']?></span>
    
  </div>
  </div>