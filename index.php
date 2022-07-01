<?php
error_reporting(0);
include_once("dbdb.php");
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Delete multiple rows using Ajax Jquery with PHP</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

<script src="js/jquery.min.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>

<script src="js/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script> 

<script type="text/javascript" src="js/xlsx.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

  
<style>
body{
background-color: #d9f2ff !important;
}
.example{
background-color: white;
 }  
.example thead, tfoot {
display:table;
width:100%;
}
.example thead tr, tfoot tr{
background-color: #17b900;
border-color: #00bd41;
}
.example tbody {
height:400px;
overflow:auto;
overflow-x:hidden;
display:block;
width:100%;
}

.example tbody tr {
display:table;
width:100%;
table-layout:fixed;
}
#edit_div{
padding:1px; background-color:#f6b800; color: white; text-align: center; font-weight: initial; width: 80px;
}
#dalete_div{
padding:1px; background-color: red; color: white; text-align: center; font-weight: initial; width: 80px;
}
#btn_edit{
 width: 80px !important; padding: 2px !important;   
}
#btn_delete{
 width: 80px !important; padding: 2px !important;  
}
</style>
 </head>
 <body>
 <div class="container">


   <br /> 
<!--index tbl start-->    
<div class="col-sm-12">
   <h3 align="center">Edit & Delete Multiple Rows using Jquery with PHP</h3>
   <h3 align="center" id="result" ></h3>
   <br /> 
 <table align="center" width="100%">
     <tr>
         <td align="center">
        <button type="button" name="pdf_rx" id="pdf_rx" class="btn btn-warning" onclick="generate()" >PDF Export</button>
 <button type="button"  class="btn btn-primary" onclick="ExportToExcel()">XL Export</button>  
 <a href="insert.html" class="btn btn-info">Add New</a>     
         </td>
     </tr>
 </table>  
 

   <br/> 
<table width="100%" class="table table-striped example" id="example">
  <thead>
   <tr>
      <th width="20%" align="center">Sl No</th>  
      <th width="20%" align="center">Titles</th>
       <th width="20%" align="center">Links</th>
        <th width="20%" align="center">Email Id</th>
      <th width="20%" align="center">
<div class="row">
<div class="col-sm-5">
<div id="edit_div">
Edit-<input type='checkbox' id='EditAll' autocomplete="off" >
</div>
 </div>    
<div class="col-sm-5">
<div id="dalete_div">
Delete-<input type='checkbox' id='DeleteAll' autocomplete="off">
</div>
</div>
</div>

    </th>
    </tr>
  </thead>

<tbody id="after_viewtr">
  
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

</tbody>

  <tfoot>
     <tr>
      <th width="20%" align="center">Sl No</th>  
      <th width="20%" align="center">Titles</th>
       <th width="20%" align="center">Links</th>
        <th width="20%" align="center">Email Id</th>
      <th width="20%" align="center">
       
        
<div class="row">
 <div class="col-sm-5">
 <button type="button" name="btn_edit" id="btn_edit" class="btn btn-warning" >Edit</button>
 </div>   
<div class="col-sm-5" >
<button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger" >Delete</button>
 </div>
 </div>

        </th>
    </tr>
  </tfoot>
</table>

</div>
<!--index tbl end-->    
 <style type="text/css">
   #Example3_{
z-index: 9999;
background-color: rgba(0, 0, 0, 0.7);
position: fixed;
left: 0;
top: 0;
width: 100%;
height: 100%;
display: none;
   }
#clo_btn{
color: #FFFFFF;
text-align: center;
font-size: 15px;
border: 1px solid transparent;
padding: 3px 10px;
text-decoration: none;
border-radius: .25rem;
background-color: #e92929;
margin-top:10px;
float: right;
cursor: pointer;
margin-right: 5px;
}
#Example3_indiv{
width: 700px;
height: 600px;
overflow-y: scroll;
border: 5px solid #e36900;
margin: auto;
margin-top: 5%;
background-color: white;
}
 </style>

 <!--<table view area start>-->
<div id="Example3_" >
  <div id="Example3_indiv">
    <div>
   <span  id="clo_btn">Close</span>
   <br>
   <br>
<div id="view_tbl">
    
</div>
<table width="95%" border="0" align="center">
<tr>
    <td>
 <button type="button" name="btn_dataupdate" id="btn_dataupdate" class="btn btn-primary btn-block" >Update Data</button>       
    </td>
</tr>
</table>
    </div>
  </div>
</div>
     <!--<table view area end>--> 

</div>


   
   <script>
 
$('#clo_btn').on('click',function(){
  $('.edit_customer').prop('checked',false);
   $('#EditAll').prop('checked',false); 
   $("#Example3_").css("display","none");  
   $("#view_tbl").html("");     
});

function loaddata() {
    $.ajax({
    type: "POST",
    url: "view.php",
    success: function(data){
    $("#after_viewtr").html(data);     
    }
  });
}

$('#DeleteAll').on('click',function(){
    
        if($('#DeleteAll:checked').length == $('#DeleteAll').length){
           $('.delete_customer').prop('checked',true);
        }else{
            $('.delete_customer').prop('checked',false);
        }
    });


$('#btn_delete').click(function(){
var delete_id = [];
//$(".delete_customer:checkbox:checked").each(function(i){
$("input[name='deleteid']:checked").each(function(i){
    delete_id[i] = $(this).val();
   });
if(delete_id.length > 0) {
var isDelete = confirm("Do you really want to delete this records ?");
if (isDelete == true){
 $.ajax({
     url:'ajaxfile.php?type=delete',
     method:'POST',
     data:{post_id:delete_id},
     success:function(response)
     {
  //for(var i=0; i<delete_id.length; i++){
       //$('tr#'+delete_id[i]+'').css('background-color', '#ff6565');
       //$('tr#'+delete_id[i]+'').fadeOut('slow');
      //}         
$("#result").html(response); 
setTimeout(function() {
$('#result').html('');
}, 2000);
$('.delete_customer').prop('checked',false);  
$('#DeleteAll').prop('checked',false);
loaddata();
return false;
    }
}); 

}else{ 
$('.delete_customer').prop('checked',false);  
$('#DeleteAll').prop('checked',false);
return false;
}

} else{
    alert("Sorry.. No Records Selected..!!");
}


});
 



$('#EditAll').on('click',function(){
        if($('#EditAll:checked').length == $('#EditAll').length){
           $('.edit_customer').prop('checked',true);
        }else{
            $('.edit_customer').prop('checked',false);
        }
});

$('#btn_edit').click(function(){
    var edit_id = [];
$("input[name='editid']:checked").each(function(i){
    edit_id[i] = $(this).val();
   });

if(edit_id.length == "0") {
  alert("Sorry.. No Records Selected..!!");exit;   
}else{
$("#view_tbl").html(""); 
$("#Example3_").css("display","block");   
   $.ajax({
     url:'tblview.php',
     method:'POST',
     data:{editids:edit_id},
     success:function(response){
     $("#view_tbl").html(response); 
    }
});   
}
});


$('#btn_dataupdate').click(function(){
  var titless = [];
  $('.Titless').each(function(i){
  if ((this.value) == "") { 
    alert("Title is required"); 
    $("#"+this.id).focus();exit;
  }
    titless[i] = $(this).val();
  });

  var linkss = [];
  $('.linkss').each(function(i){
  if ((this.value) == "") { 
    alert("Link is required"); 
    $("#"+this.id).focus();exit;
  }
    linkss[i] = $(this).val();
  });

  var editidss = [];
  $('.editidss').each(function(i){
    editidss[i] = $(this).val();
  });
 $.ajax({
     url:'ajaxfile.php?type=update',
     method:'POST',
     data:{title:titless,link:linkss,editid:editidss},
     success:function(response) {
    $("#view_tbl").html("");     
    $("#Example3_").css("display","none");     
    $("#result").html(response);
    loaddata();
    setTimeout(function(){ 
      $("#result").html(""); }, 2000);
     }
    });
 

});













function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('example');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }

    function generate() {  
    var doc = new jsPDF('p', 'pt', 'letter');  
    var pageHeight = 0;  
    pageHeight = doc.internal.pageSize.height;  
    specialElementHandlers = {  
        '#bypassme': function(element, renderer) {  
            return true  
        }  
    };  
    margins = {  
        top: 150,  
        bottom: 60,  
        left: 0,  
        right: 0,  
        width: 600  
    };  
    var y = 20;  
    doc.setLineWidth(2);  
    doc.text(200, x = y + 30, "TOTAL MARKS OF STUDENTS");  
    doc.autoTable({  
        html: '#example',  
        startY: 60,  
        theme: 'grid',  
        columnStyles: {  
            0: {  
                cellWidth: 50,  
            },  
            1: {  
                cellWidth: 50,  
            },  
            2: {  
                cellWidth: 50,  
            },
            3: {  
                cellWidth: 50,  
            },
            4: {  
                cellWidth: 50,  
            }    
        } 
    })  
    doc.save('val.pdf');  
} 


</script>
 </body>
</html>

