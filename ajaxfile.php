<?php 
error_reporting(0);
include_once("dbdb.php");
$type = $_REQUEST['type'];
if($type=="insert"){
 
$name = $_POST['names'];
$link = $_POST['links'];
$email = $_POST['emails'];
$total_in=count($name);
if($total_in == "0"){
echo "No Record Found..";exit;
}else{
for($i=0; $i < $total_in; $i++){
$insert_que="INSERT INTO `posts` SET title='$name[$i]',link='$link[$i]',email='$email[$i]'";
$dbConnection->exec($insert_que);
}
echo "Upload Successfully..";exit;
}

}else if($type=="update"){

$titles=$_POST['title'];
$links=$_POST['link'];
$iddds=$_POST['editid'];
$count=count($_POST['editid']);
for ($i=0; $i<$count; $i++) {
$update_que="UPDATE `posts` SET title='$titles[$i]',link='$links[$i]' WHERE `id`='$iddds[$i]'"; 
$dbConnection->exec($update_que);
}
echo "Update Successfully";exit; 

}else if($type=="delete"){

$idss=$_POST['post_id'];
$total=count($idss);
if($total == "0"){
echo "No Record Found..";exit;
}else{
foreach($idss as $key => $val) {
$delete_que="DELETE from `posts` WHERE `id`='$val'"; 
$query_delete = $dbConnection->prepare( $delete_que );
$query_delete->execute();
 }
echo "Record Delete Successfully";exit; 
}

}
?> 