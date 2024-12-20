<?php

$data= db('menu')->all();

?>


<form method="post">
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