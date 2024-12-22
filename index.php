<!-- this is index page -->

<?php 
require_once "helper/Session.php";
Session::init();

define('ROOT','http://localhost/web/event/');
define('BNO',3);

include_once "helper/redirect.php";
require_once "helper/db.php";

$module="users";
$file="index";
$uid=null;
$url=$_GET['url']??null;
if($url){
     $url=explode('/',rtrim($url,'/'));
     $module=$url[0];
     $file=$url[1]??$file;
     $uid=$url[2]??null;

    //  print_r($url);
}
//  print_r($_GET);
$path="modules/$module/$file.php";
if(file_exists($path)){
    include_once "header.php";
include_once "$path";
include_once "footer.php";
}
else{
    redirect('404.php');
 
}
// include_once "modules/booking/index.php";
?>