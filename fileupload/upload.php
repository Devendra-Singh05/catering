<?php
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
if (isset($_FILES['img']) ) {
    $n=count($_FILES['img']['name']);
    for($i=0;$i<$n;$i++){
        $from = $_FILES['img']['tmp_name'][$i];
        $to = "ROOT/files/" . time() . "_" . $_FILES['img']['name'][$i];
        move_uploaded_file($from, $to);
    }
}
?>
<form action="" enctype="multipart/form-data" method="post">
    <input type="text" name="username">
    <br>
    <input type="file" name="img[]" multiple accept="image/*" >
    <input type="file" name="video" accept="video/*,audio/*">
    <button>Go</button>
</form>