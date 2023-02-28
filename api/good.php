<?php
include_once "base.php";
$news=$_POST['news'];
$user=$_POST['user'];
$chk=$Log->count(['news'=>$news,'user'=>$user]);
$row=$News->find($news);

if($chk>0){
    $Log->del(['news'=>$news,'user'=>$user]);
    $row['good']--;
    $News->save($row);
}else{
    $row['good']++;
    $Log->save(['news'=>$news,'user'=>$user]);
    $News->save($row);
}
?>