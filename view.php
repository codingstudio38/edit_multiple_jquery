<?php
error_reporting(0);
include_once("dbdb.php");
?>  

  
<?php
$i=1;   
$sql2="SELECT * FROM `posts` order by id DESC";
foreach($dbConnection->query($sql2, PDO::FETCH_ASSOC) as $row)
 {
  ?>
    <tr id="<?php echo $row['id'];?>">
    <td width="20%" align="left"><?php echo $i++;?></td>
    <td width="20%" align="left"><?php echo $row['title'];?></td>
    <td width="20%" align="left"><a href="<?php echo $row['link'];?>"><?php echo $row['link'];?></a></td>
    <td width="20%" align="left"><?php echo $row['email'];?></td>
    <td width="20%" align="left">
 <div class="row">
 <div class="col-sm-5" style="margin-left: 10px;">
 <div id="edit_div">   
 Edit-<input type="checkbox" class="edit_customer" name="editid"  value="<?php echo $row['id'];?>" autocomplete="off"/>
 </div>
 </div>   
 <div class="col-sm-5">
 <div id="dalete_div">   
 Delete-<input type="checkbox" class="delete_customer" name="deleteid"  value="<?php echo $row['id'];?>" autocomplete="off"/>
 </div>
 </div>
 </div>       
       </td>
     </tr>
<?php  }  ?>
