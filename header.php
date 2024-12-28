<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- DataTables CSS (Styling for DataTable) -->
<link href="https://cdn.jsdelivr.net/npm/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ROOT;?>public/css/custom.css">
</head>
<body>
  <div class="container border main">
    <header><nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="#">Catering System</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#">Home</a>
</li>
<?php if(!Session::get('logindtl')){?>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="<?=ROOT?>menu/display">Menu</a>
</li>


<ul style="list-style-type: none; margin:0; padding:0; display:">
<li class="nav-item dropdown" style="margin-left: 880px;">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            <img src="<?=ROOT;?>profile logo.png" alt="Profile Logo" class="profile-logo" width="30" height="30">
            <span class="name">Admin</span>
       
</a>
<ol class="dropdown-menu" aria-labelledby="navbarDropdown" style="list-style-type: none;">
<li><a class="dropdown-item" href="#">Profile</a></li>
<li><a class="dropdown-item" href="<?=ROOT?>users">Login</a></li>

  


</ol>
</li>
</ul>

<?php }?>

<?php if(Session::get('logindtl')){?>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Menu
</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="<?=ROOT?>menu/form">Add Menu</a></li>
<li><a class="dropdown-item" href="<?=ROOT?>menu">Show Menu</a></li>
</ul>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
User
</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="<?=ROOT?>users/form">Register new member</a></li>
<li><a class="dropdown-item" href="<?=ROOT?>users/changepwd">Change Password</a></li>

</ul>
</li>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="<?=ROOT?>booking/form">Booking</a>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li>
</ul>
<ul style="list-style-type: none;">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            <img src="<?=ROOT;?>profile logo.png" alt="Profile Logo" class="profile-logo" width="30" height="30">
            <span class="name">Admin</span>
       
</a>
<ol class="dropdown-menu" aria-labelledby="navbarDropdown" style="list-style-type: none;">
<li><a class="dropdown-item" href="#">Profile</a></li>
<li><a class="dropdown-item" href="<?=ROOT?>users/logout">Logout</a></li>
<?php } ?>


</ol>
</li>
</ul>
</div>
</div>
</nav>
</header>
  <section>

 