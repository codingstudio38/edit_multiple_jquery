<?php
error_reporting(0);
include_once('dbdb.php');
if(isset($_POST['editids'])){
$edit_ids=$_POST['editids'];
$totaledit_ids=count($_POST['editids']);
}
?>
<style type="text/css">
input {
      padding: 5px;
      margin: 5px;
    }
    #h3ee{
      text-align:center; background-color: #06b606; line-height: inherit; color: white; font-weight: bold;
    }
    b{
      background-color: #06b606; padding: 6px; border-radius: 5px; color: white;
    }
	#v_tbl{
      border: 3px solid #06b606; background-color: white;
    }
    #slno{
      width: 50px; text-align: center; background: #d1d1d1;
    }
    #titlee{
        margin-top: 5px; margin-bottom: 5px;
    }
</style>

<table width="95%" border="0" align="center" id="v_tbl">
<tr>
    <td>
<h3 id="h3ee">TOTAL EDIT IDS "<?php echo $totaledit_ids;?>"</h3>

    </td>
</tr>
  <tr>
    <td>


<?php
$j = 0;
foreach($edit_ids as $key => $val)
  {
  $view_que="SELECT * FROM `posts` WHERE `id`='$val'";
  foreach($dbConnection->query($view_que, PDO::FETCH_ASSOC) as $row) { 
    ?>
<table width="100%">
  <tr>
    <td align="left">
<input type="text" name="" value="<?php echo ++$j;?>" class="form-control" readonly="true" id="slno">     
    </td>
    <td align="center">
<input type="text" value="<?=$row['title'];?>" placeholder="Title" class="form-control Titless" id="titlee_<?=$row['id'];?>">
<input type="text" value="<?=$row['link'];?>" placeholder="Link" class="form-control linkss" id="links_<?=$row['id'];?>">
      </td>
    <td align="right">
<input type="hidden"  class="editidss" value="<?=$row['id'];?>" >
<b>
ID-<?=$row['id'];?>
</b>
    </td>
  </tr>
</table>
<br>
  <?php  } } ?>
  

 </td>
  </tr>
</table>