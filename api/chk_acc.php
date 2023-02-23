<?php
include_once "base.php";
// dd($_POST);
// dd($User->find(['acc'=>$_POST['acc']]));
echo $User->count(['acc'=>$_POST['acc']]);


?>