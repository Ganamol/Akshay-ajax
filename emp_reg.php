<?php
include('connection.php');
$data=mysqli_query($conn,"select * from dep_reg");
?>
<script type = "text/javascript"src = "https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<form action="" method="POST">
<!-- <input type="text" id="user" onkeyup="handle()">
<br> -->
<select  id="dep">
<option value="">--Select Department--</option>
<?php
while($row=mysqli_fetch_assoc($data))
{ 
  ?>  
   <option value="<?php echo $row['id'];?>">  <?php echo $row['dep_name'];?></option>
   <?php
}
?>
</select>
<select id="emp">
      <option value="">--Select Employee--</option>
 </select> 

</form>
<script>
$('#dep').change(function(){
           var dep_id   = $('#dep').val();
           $.ajax({
             url:'get_employee.php',
             method: 'post',
             data: {
              dep: dep_id},
             dataType: 'json',
             success: function(response){
                 // Remove options 
               $('#emp').find('option').not(':first').remove();
              //  Add options
               $.each(response,function(index,data){
                  $('#emp').append('<option value="'+data['id']+'">'+data['name']+'</option>');
               });
             }
          });
         });
</script>

 


    
 



