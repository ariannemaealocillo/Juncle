<?php 
    require 'database.php'; 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>User Management</title>
</head>
<script>
    function checkUserIsSignedIn() {
    if (localStorage.getItem("username") === null) {
        window.location.href = "index.php";
       
    } else {
        //Do nothing since the user is not yet authenticated

    }
}
</script>
<script>

    checkUserIsSignedIn();
    </script>
<body class="body-background">

    <?php
        include('components/header.php');
    ?>
    <section class="main_container row wrapper">
        <div class="col-2">
            <?php
                include('components/navbar.php');
            ?>
        </div>
        
        <div class="col-3" style="padding-left:50px;">
          <!-- ari imo code -->
            <div style="width:1000px">
           <div style="display:flex;" >
            <h1 class=" float-start section title" style="flex:50%;padding-left: 5px; position:block;">Admin Account Management</h1>
         
        

            <button onclick="document.getElementById('add_modal').style.display='block'" class="btn btn-primary btn-sm" style="padding-left: 5px; margin-top:2%;float:right; height :50%; margin-right:3%;">+ Add New User</button>
            </div>
            <br>
            </div>
            <div class="column-display-wrapper bg-white rounded shadow-sm" style="width: 1000px; height:50%; overflow:hidden; overflow-y: scroll;">

            <!-- start admin management -->
           
            <table name="admin_table" id="admin_table" class= "w3-hoverable w3-centered table-responsive" style="width:100%;"  >
            <thead>
                <tr>
                    <th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Settings</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  
                    <?php 
                             $query_get_last_id = "select * from admin where deleted_status != '1'; ";
                             $query_run = mysqli_query($connection, $query_get_last_id);       

                        
                             while($row = mysqli_fetch_array($query_run)){
                              
                          
                            ?>

        
                   
                    <td></td>
                    <td><?php echo $row['admin_id'];?></td>
                    <td><?php echo $row['admin_first_name']." ".$row['admin_last_name'];?></td>
                    <td><?php echo $row['admin_email'];?></td>
                    <td><?php echo $row['admin_username'];?></td>
                    <?php 
                        // if user_status == 0 == active
                        // if user_status == 1 == Suspended
                  
                        if($row['suspend_status']==0)
                            {
                                ?>
                                    <td> <p style="color:green;"> Active</p></td>
                                <?php
                            }
                        else if($row['suspend_status']==1)
                            {
                                ?>
                                    <td> <p style="color:red;"> Suspended</p></td>
                                <?php
                            }
                           
                    ?>
              
                    <td>
                    <div class="w3-container">
                            <button onclick="opendetails('<?php echo $row['admin_id'];?>', '<?php echo $row['admin_first_name'];?>', '<?php echo $row['admin_last_name'];?>'
                            ,'<?php echo $row['admin_email'];?>', '<?php echo $row['admin_username'];?>',
                            '<?php echo $row['admin_password'];?>')" class="w3-button w3-green btn-sm" style ="border-radius:5px;">View Details</button>
                        
                         <?php if($row['suspend_status']=='0'){?> 
                          <button onclick="suspend(<?php echo $row['admin_id']; ?>)" class="w3-button w3-red btn-sm" style ="border-radius:5px;"> Suspend</button>
                    
                         
                            <?php } else if($row['suspend_status']=='1') { ?>
                          <button onclick="activate(<?php echo $row['admin_id'];?>)" class="w3-button w3-green btn-sm" style ="border-radius:5px;"> Activate</button>
                                <?php } ?>
                       
                                <script>
                                function suspend(admin){
                                   
                                    $.ajax({
                                                        url: 'functions/suspend.php',
                                                        type: 'POST',
                                                        data: {

                                                            suspend_admin_id: admin,
                                                           
                                                        },
                                                        success: function(result) {
                                                            alert("Successfully Suspended a record!");
                                                            console.log("Successfully suspended a record.");
                                                            console.log(admin);
                                                           
                                                            //display loader
                                                            window.location.href = "admin_usermanagement.php";
                                                        
                                                        },
                                                        error: function(data) {
                                                            alert("error occured" + data); //===Show Error Message====

                                                        }

                                                    });
                                }
                                function activate(admin){
                                   
                                   $.ajax({
                                                       url: 'functions/activate.php',
                                                       type: 'POST',
                                                       data: {

                                                        activate_admin_id: admin,
                                                          
                                                       },
                                                       success: function(result) {
                                                           alert("Successfully Activated a record!");
                                                           console.log("Successfully Activated a record.");
                                                           console.log(admin);
                                                          
                                                           //display loader
                                                           window.location.href = "admin_usermanagement.php";
                                                       
                                                       },
                                                       error: function(data) {
                                                           alert("error occured" + data); //===Show Error Message====

                                                       }

                                                   });
                               }
                                </script>

                                <div id="id01" class="w3-modal">
                                <div class="w3-modal-content w3-animate-bottom" style="width:20%;" >
                                  <!-- start edit modal -->
                                <div id="id01" class="modal-header w3-green">
                                    <span onclick="closeviewmodal()" class="w3-button w3-display-topright">&times;</span>
                                    <script>
                                        function closeviewmodal(){
                                            document.getElementById('id01').style.display='none';
                                            document.getElementById("edit_username").disabled = true;
                                            document.getElementById("edit_password").disabled = true;
                                            document.getElementById("edit_lname").disabled = true;
                                            document.getElementById("edit_fname").disabled = true;
                                            document.getElementById("edit_email").disabled = true;
                                            var p = document.getElementById('edit_password');
                                            p.setAttribute('type', 'password');
                                        }
                                        </script>

                                    <h4 class="modal-title ">View Details</h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <p style ="color:red;" class="result_display" id="result_display"> </p>
                                    <form method="POST" id="editform">
                                    <label>ID: </label>
                                    <input type="text" name="edit_id" id = "edit_id" style = "width: 100%;"  value = "" disabled>
                                    
                                    <br>
                            
                                    <label>First Name</label><br>
                                    <input type="text" name="edit_fname" id = "edit_fname" style = "width: 100%;"  value = "" disabled>
                                    <br>
                                    <label>Last Name</label><br>
                                    <input type="text" name="edit_lname" id = "edit_lname" style = "width: 100%;" value = "" style="border-radius:5px; width:100%; " disabled>
                                   
                                    <br>
                                    <label>Email Address</label><br>
                                    <input type="text" name="edit_email" id = "edit_email" style = "width: 100%;"  value = ""  disabled>
                                    <br>
                                    <label>Username</label><br>
                                    <input type="text" name="edit_username" id = "edit_username" style = "width: 100%;" value = "" disabled>
                                    <br>
                                    <label>Password</label><br>
                                    <input type="password" name="edit_password" id = "edit_password" style = "width: 100%;" value = ""  disabled>
                                    <br>
                                    <!-- e add pani -->
                             
                 
  
                        <br>
                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="deletefunc()">Delete</button>
                                        <button type="button" name="edit" id="edit" class="btn btn-secondary">Edit</button>
                                        <button type="button" value="Submit" name= "updatebtn" id="updatebtn" class="btn btn-primary">Confirm</button>
                                        </form>
                                    </div>
                                    <script>
                                            function deletefunc(){
                                                var admin_id= document.getElementById("edit_id").value;
                                                openconfirmation(admin_id);
                                            }
                                        </script>
                                
                                   <!-- Confirmation pop up modal -->
                                  
                                        <!-- Modal -->
                                        

                                   <!-- confirmation popup modal end -->
                            <!-- end modal -->
                        </div>
                                </div>



                                <div id="confirmationModal" class="w3-modal" >
                                            <div class="w3-modal-content w3-animate-bottom modal-sm" >

                                                <!-- Modal content-->
                                                <div class="w3-modal-content w3-animate-bottom modal-sm">
                                                <div class="modal-header">
                                                    
                                                    <h4 class="modal-title">Delete Account</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Are you sure to delete account with ID:  </p>
                                                    <input type ="text" value = "" name ="delete_id" id ="delete_id" style="border:none; padding-left:20px;" disabled>
                                                    <br>
                                                <p>Do you wish to proceed?</p>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" name="delete" onclick="deleteaccount()" id="deletebtn" data-dismiss="modal">Delete</button>
                                                    <button type="button" class="btn btn-default" onclick="closeconfirmation()" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>

                                            </div>
                                            </div>
                                            <script>
                                                function deleteaccount(){
                                                    var admin_id= document.getElementById("edit_id").value;
                                                    deleteconfirmed(admin_id);
                                                }
                                                function deleteconfirmed(admin_id){
                                                    $.ajax({
                                                        url: 'functions/delete_user_admin.php',
                                                        type: 'POST',
                                                        data: {

                                                            delete_admin_id: admin_id,
                                                           
                                                        },
                                                        success: function(result) {
                                                        
                                                            console.log("Successfully deleted a record.");
                                                            console.log(admin_id);
                                                           
                                                            //display loader
                                                            window.location.href = "admin_usermanagement.php";
                                                        
                                                        },
                                                        error: function(data) {
                                                            alert("error occured" + data); //===Show Error Message====

                                                        }

                                                    });
                                                    
                                                }
                                                function openconfirmation(admin_id){
                                                    // document.getElementById('id01').style.display='none';
                                                    document.getElementById("delete_id").value = admin_id;
                                                    document.getElementById('confirmationModal').style.display='block';
                                                  

                                                }
                                                function closeconfirmation(){
                                                    // document.getElementById('id01').style.display='block';
                                                    document.getElementById('confirmationModal').style.display='none';
                                                }

                                            
                                                </script>
                                <!-- end container -->
                                </div>
	                </td>
                   
                </tr>
             
                
                </tbody>
                <?php   }?>
            </table>
            

            </div>
            <br>
             <!-- start collector -->
             <div style="width:1000px">
                <div style="display:flex;" >
                    <h1 class=" float-start section title" style="flex:50%;padding-left: 5px; position:block;">Collector Account Management</h1>
                

                    <button onclick="document.getElementById('add_collector_modal').style.display='block'" class="btn btn-primary btn-sm" style="padding-left: 5px; margin-top:2%;float:right; height :50%; margin-right:3%;">+ Add New User</button>
                    </div>
                    <br>
                    </div>
                    <div class="column-display-wrapper bg-white rounded shadow-sm" style="width: 1000px; height:50%; overflow:hidden; overflow-y: scroll;">

                    <!-- start admin management -->
                    <br>
                    <table name="collect_account" id="collect_account"  class= "w3-hoverable w3-centered table-responsive" style="width:100%;" >
                            <!-- end collector -->
                                
                            <tr>
                                <th style="width:5%$">ID</th>
                                <th style="width:12.5%;">Full Name</th>
                                <th style="width:12.5%;">Email</th>
                                <th style="width:12.5%;">Address</th>
                                <th style="width:12.5%;">Contact Number</th>
                                <th style="width:12.5%;">Plate Number</th>
                                <th style="width:12.5%;">Account Status</th>
                                <th style="width:17.5%;">Settings</th>

                                

                            </tr>
                          
                            <?php 
                            // collector table:
                            // account_status 
                            // 1 - active
                            // 0 - pending
                            // 2- suspended
                            // 3- deleted
                            
                             $query_get_last_id = "select * from collector where account_status != '3'";
                             $query_run = mysqli_query($connection, $query_get_last_id);       

                        
                             while($row = mysqli_fetch_array($query_run)){
                              
                          
                            ?>
                              <tr>
                                <td><?php echo $row['collector_id']; ?></td>
                                <td><?php echo $row['collector_firstname']." ".$row['collector_lastname']; ?></td>
                                <td><?php echo $row['collector_email']; ?></td>
                                <td><?php echo $row['collector_address']; ?></td>
                                <td><?php echo $row['contact_number']; ?></td>
                                <td><?php echo $row['plate_number']; ?></td>


                                  <div id="editcollectormodal" class="w3-modal">
                                <div class="w3-modal-content w3-animate-bottom" style="width:20%;" >
                                  <!-- start edit modal -->
                                <div id="editcollectormodal" class="modal-header w3-green">
                                    <span onclick="closeviewcollectormodal()" class="w3-button w3-display-topright">&times;</span>
                                    <script>
                                        function closeviewcollectormodal(){
                                            document.getElementById('editcollectormodal').style.display='none';
                                            document.getElementById("edit_collector_fname").disabled = true;
                                            document.getElementById("edit_collector_mname").disabled = true;
                                            document.getElementById("edit_collector_lname").disabled = true;
                                            document.getElementById("edit_collector_email").disabled = true;
                                            document.getElementById("edit_collector_address").disabled = true;
                                            document.getElementById("edit_plate_number").disabled = true;
                                            document.getElementById("edit_collector_address").disabled = true;
                                            var pw = document.getElementById('edit_collector_password');
                                            pw.setAttribute('type', 'password');
                                        }
                                        </script>

                                    <h4 class="modal-title ">View Details</h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <p style ="color:red;" class="result_display" id="result_display"> </p>
                                    <form method="POST" id="editform">
                                    <label>ID: </label>
                                    <input type="text" name="edit_collector_id" id = "edit_collector_id" style = "width: 100%;"  value = "" disabled>
                                    
                                    <br>
                                    <label>First Name</label><br>
                                    <input type="text" name="edit_collector_fname" id = "edit_collector_fname" style = "width: 100%;"  value = "" disabled>
                                    <br>
                                 
                                    <label>Middle Name</label><br>
                                    <input type="text" name="edit_collector_mname" id = "edit_collector_mname" style = "width: 100%;"  value = "" disabled>
                                    <br>
                                    <label>Last Name</label><br>
                                    <input type="text" name="edit_collector_lname" id = "edit_collector_lname" style = "width: 100%;" value = "" style="border-radius:5px; width:100%; " disabled>
                                   
                                    <br>
                                    <label>Email Address</label><br>
                                    <input type="text" name="edit_collector_email" id = "edit_collector_email" style = "width: 100%;"  value = ""  disabled>
                                    <br>
                                    <label>Address</label><br>
                                    <input type="text" name="edit_collector_address" id = "edit_collector_address" style = "width: 100%;" value = "" disabled>
                                    <br>
                                    <label>Plate Number</label><br>
                                    <input type="text" name="edit_plate_number" id = "edit_plate_number" style = "width: 100%;" value = "" disabled>
                                    <br>
                                    <label>Password</label><br>
                                    <input type="password" name="edit_collector_password" id = "edit_collector_password" style = "width: 100%;"   disabled>
                                    <br>
                                    <!-- e add pani -->
                             
                 
  
                        <br>
                       
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"  id="deletecollector" name ="deletecollector">Delete</button>
                                        <button type="button" name="editcollector" id="editcollector" class="btn btn-secondary">Edit</button>
                                        <button type="button" value="Submit" name= "updatecollectorbtn" id="updatecollectorbtn" class="btn btn-primary">Confirm</button>
                                        </form>
                                    </div>
                                  
                                    <!-- ari ko nahunong -->

                                    <div id="deleteConfirmationModal" class="w3-modal" style="z-index:1;">
                                            <div class="w3-modal-content w3-animate-bottom modal-sm" >

                                                <!-- Modal content-->
                                                <div class="w3-modal-content w3-animate-bottom modal-sm">
                                                <div class="modal-header">
                                                    
                                                    <h4 class="modal-title">Delete Account</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Are you sure to delete account with ID:  </p>
                                                    <input type ="text" value = "" name ="delete_id" id ="delete_id" style="border:none; padding-left:20px;" disabled>
                                                    <br>
                                                <p>Do you wish to proceed?</p>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" name="delete" onclick="confirmdeletion()" id="deletebtn" data-dismiss="modal">Delete</button>
                                                    <button type="button" class="btn btn-default" onclick="confirmationclose()" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>

                                            </div>
                                            </div>









                                   
                        </div>
                                



                                <?php
                                if($row['account_status']==0){
                                 ?>
                                   <td><p style="color:orange; ">Pending</p></td>
                                   <?php
                                }
                                ?>
                                <?php
                                if($row['account_status']==1){
                                 ?>
                                      <td><p style="color:green; ">Active</p></td>
                                   <?php
                                }
                                ?>
                                <?php
                                if($row['account_status']==2){
                                 ?>
                                     <td><p style="color:red; ">Suspended</p></td>
                                   <?php
                                }
                                if($row['account_status']==3){
                                    ?>
                                        <td><p style="color:red; ">Deleted</p></td>
                                      <?php
                                   }
                                ?>
                                <td>



                              






                                   <button onclick="displaycollector('<?php echo $row['collector_id']?>' , '<?php echo $row['collector_firstname']?>', '<?php echo $row['collector_middlename']?>','<?php echo $row['collector_lastname']?>',
                                   '<?php echo $row['collector_email']?>','<?php echo $row['collector_address']?>','<?php echo $row['plate_number']?>','<?php echo $row['password']?>')" class="w3-button w3-green btn-sm" style ="border-radius:5px;">View Details</button> 
                                   <script>
                                    function displaycollector(id,fname,mname,lname,email, address, pnumber, pw){
                                        document.getElementById('editcollectormodal').style.display='block';

                                        document.getElementById("edit_collector_id").value = id;
                                        document.getElementById("edit_collector_fname").value = fname;
                                        document.getElementById("edit_collector_mname").value = mname;
                                        document.getElementById("edit_collector_lname").value = lname;
                                        document.getElementById("edit_collector_email").value = email;
                                        document.getElementById("edit_collector_address").value = address;
                                        document.getElementById("edit_plate_number").value = pnumber;
                                        document.getElementById("edit_collector_password").value = pw;

                                    }
                                   </script>
                                   <?php if($row['account_status']=='1'){ ?>
                                    <button onclick="suspend_collector('<?php echo $row['collector_id'];?>')" class="w3-button w3-red btn-sm" style ="border-radius:5px;">Suspend</button> 
                                    <?php }else if ($row['account_status']=='0'||$row['account_status']=='2'){?>

                                        <button onclick="activatecollector('<?php echo $row['collector_id'];?>')" class="w3-button w3-green btn-sm" style ="border-radius:5px;">Activate</button> 
                                  <?php  } ?>

                            </td>
                            <script>
function suspend_collector(id){
   
    $.ajax({
                        url: 'functions/suspend_collector.php',
                        type: 'POST',
                        data: {

                            suspend_id: id,
                           
                        },
                        success: function(result) {
                            alert("Successfully Suspended a record!");
                            console.log("Successfully suspended a record.");
                            console.log(id);
                           
                            //display loader
                            window.location.href = "admin_usermanagement.php";
                        
                        },
                        error: function(data) {
                            alert("error occured" + data); //===Show Error Message====

                        }

                    });
}
function activatecollector(id){
   
   $.ajax({
                       url: 'functions/activate_collector.php',
                       type: 'POST',
                       data: {

                        activate_id: id,
                          
                       },
                       success: function(result) {
                           alert("Successfully Activated a record!");
                           console.log("Successfully Activated a record.");
                           console.log(id);
                          
                           //display loader
                           window.location.href = "admin_usermanagement.php";
                       
                       },
                       error: function(data) {
                           alert("error occured" + data); //===Show Error Message====

                       }

                   });
}
</script>

                            <tr>
                                <?php
                             }
                                ?>
                     </table>
                </div>
                
    </section>
    <br>
    

                                    </div>
</body>


<!-- add modal -->
            <div class="w3-container">
                            
                          



                                <div id="add_modal" class="w3-modal">
                                <div class="w3-modal-content w3-animate-bottom" style="width:20%;" >
                                  <!-- start modal -->
                                <div id="add_modal" class="modal-header w3-green">
                                    <span onclick="closeaddmodal()" class="w3-button w3-display-topright">&times;</span>
                                    <h4 class="modal-title ">Admin User Details</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                    <?php 
                                    $query_get_last_id = "select auto_increment from information_schema.tables where table_name = 'admin' and table_schema = DATABASE();";
                                    $query_run = mysqli_query($connection, $query_get_last_id);
                                    $return_request_from_get_last_id = mysqli_num_rows($query_run) > 0;
            
                                    $last_id_value = 0;

                                    while($row = mysqli_fetch_array($query_run)){
                                        $last_id_value = (int)$row['auto_increment'];
                                    }
                                    ?>
                                    <form method="post" id="addForm">
                                    <p style ="color:red;" class="result_display" id="result_display"> </p>
                                    <label>ID: <?php echo $last_id_value;?></label><input type="text" class="add_admin_id" id="add_admin_id" minlength="3" maxlength="50"
                                name="add_admin_id  " value="<?php  $last_id_value;?>" value="DEFAULT_ID"
                                style="pointer-events: none;cursor: default;border: none;width: 100%;font-size: 1.2rem;font-weight: normal;text-align: right;" />
                                    <br>
                                    
                                   
                                    <label>First Name</label><br>
                                    <input type="text" class = "add_fname" name="add_fname"  id="add_fname" style="border-radius:5px; width:100%; " required>
                                    <br> 
                                    <label>Last Name</label><br>
                                    <input type="text" class = "add_lname"  name="add_lname"  id="add_lname" style="border-radius:5px; width:100%; " required >
                                    <br>
                                    <label>Email Address</label><br>
                                    <input type="text" name="add_email" class="add_email"   id="add_email" style="border-radius:5px; width:100%; " required>
                                    <br>
                                    <label>Username</label><br>
                                    <input type="text" name="add_username"  class="add_username" id="add_username" style="border-radius:5px; width:100%; " required>
                                    <br>
                                    <label>Password</label><br>
                                    <input type="password" name="add_password"  class="add_password" id="add_password" style="border-radius:5px; width:100%; " required>
                                    <br>
                                    
                            
                                    
                        <br>
                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="closeaddmodal()" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                       
                                        <button type="button" value="Submit" name ="addbtn" id="addbtn" class="btn btn-primary">Add</button>
                                        </form>
                                        <script>
                                        function closeaddmodal(){
                                            document.getElementById('add_modal').style.display="";
                                            document.getElementById('add_fname').value="";
                                            document.getElementById('add_lname').value="";
                                            document.getElementById('add_email').value="";
                                            document.getElementById('add_username').value="";
                                            document.getElementById('add_password').value="";

                                        }
                                            </script>
                                    </div>
                                  


                                    









                            <!-- end modal -->
                        </div>
                                    </div>
                        <div id="add_collector_modal" class="w3-modal">
                                <div class="w3-modal-content w3-animate-bottom" style="width:20%;" >
                                  <!-- start modal -->
                                <div id="add_collector_modal" class="modal-header w3-green">
                                    <span onclick="closecollectoraddmodal()" class="w3-button w3-display-topright">&times;</span>
                                    <h4 class="modal-title ">Collector User Details</h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                    <?php 
                                    $query_get_last_id = "select auto_increment from information_schema.tables where table_name = 'collector' and table_schema = DATABASE();";
                                    $query_run = mysqli_query($connection, $query_get_last_id);
                                    $return_request_from_get_last_id = mysqli_num_rows($query_run) > 0;
            
                                    $last_id_value = 0;

                                    while($row = mysqli_fetch_array($query_run)){
                                        $last_id_value = (int)$row['auto_increment'];
                                    }
                                    ?>
                                    <form method="post" id="addCollectorForm">
                                    <p style ="color:red;" class="result_display" id="result_display"> </p>
                                    <label>ID: <?php echo $last_id_value;?></label><input type="text" class="add_collector_id" id="add_collector_id" minlength="3" maxlength="50"
                                name="add_collector_id" value="<?php  $last_id_value;?>" value="DEFAULT_ID"
                                style="pointer-events: none;cursor: default;border: none;width: 100%;font-size: 1.2rem;font-weight: normal;text-align: right;" />
                                    <br>
                                    
                                   
                                    <label>First Name</label><br>
                                    <input type="text" class = "add_collector_fname" name="add_collector_fname"  id="add_collector_fname" style="border-radius:5px; width:100%; " required>
                                    <br> 
                                    <label>Middle Name</label><br>
                                    <input type="text" class = "add_collector_mname" name="add_collector_mname"  id="add_collector_mname" style="border-radius:5px; width:100%; " required>
                                    <br> 
                                    <label>Last Name</label><br>
                                    <input type="text" class = "add_collector_lname"  name="add_collector_lname"  id="add_collector_lname" style="border-radius:5px; width:100%; " required >
                                    <br>
                                    <label>Email</label><br>
                                    <input type="text" name="add_collector_email" class="add_collector_email"   id="add_collector_email" style="border-radius:5px; width:100%; " required>
                                    <br>
                                    <label>Address</label><br>
                                    <input type="text" name="add_collector_address"  class="add_collector_address" id="add_collector_address" style="border-radius:5px; width:100%; " required>
                                    <br>
                                    <label>Contact Number</label><br>
                                    <input type="text" name="add_collector_contact"  class="add_collector_contact" id="add_collector_contact" style="border-radius:5px; width:100%; " required>
                                    <br>
                                    <!-- <label>Password</label><br>
                                    <input type="password" name="password_collector"  class="password_collector" id="password_collector" style="border-radius:5px; width:100%; " required>
                                    <br> -->
                                    

                            
                                    
                                    

                        <br>
                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="closecollectoraddmodal()" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                       
                                        <button type="button" value="Submit" name ="addcollectorbtn" id="addcollectorbtn" class="btn btn-primary">Add</button>
                                        </form>
                                        <script>
                                        function closecollectoraddmodal(){
                                            document.getElementById('add_collector_modal').style.display="";
                                            document.getElementById('add_collector_fname').value="";
                                            document.getElementById('add_collector_mname').value="";
                                            document.getElementById('add_collector_lname').value="";
                                            document.getElementById('add_collector_email').value="";
                                            document.getElementById('add_collector_contact').value="";
                                            document.getElementById('add_collector_address').value="";
                                            // document.getElementById('password_collector').value="";

                                        }
                                            </script>
                                    </div>
                                  

                            <!-- end modal -->
                        </div>
                        
                                </div>

                       <!-- end admin management -->

                      
                                <!-- end container -->
                                </div>
                            
<script>
let btnEdit = document.querySelector('#edit');

btnEdit.addEventListener('click', () => {
    document.getElementById("edit_username").disabled = false;
    document.getElementById("edit_password").disabled = false;
    document.getElementById("edit_lname").disabled = false;
    document.getElementById("edit_fname").disabled = false;
    document.getElementById("edit_email").disabled = false;
  
    
    var p = document.getElementById('edit_password');


     p.setAttribute('type', 'text');
});

    </script>
<script>
function submitRecord() {
  
  //Add trapping
  $.ajax({
      url: 'functions/add_user_admin.php',
      type: 'POST',
      data: {

          admin_fname: $(".add_fname").val(),
          admin_lname: $(".add_lname").val(), 
          admin_email: $(".add_email").val(), 
          admin_username: $(".add_username").val(), 
          admin_password: $(".add_password").val(), 
          admin_id: $(".admin_add_id").val(),
       
      },
      success: function(result) {
       
          console.log("Successfully Added a record.");
          console.log($(".add_fname").val());
          console.log($(".add_lname").val());
          console.log($(".add_email").val());
          console.log($(".add_username").val());
          console.log($(".add_password").val());
        
          //display loader
          window.location.href = "admin_usermanagement.php";
       
      },
      error: function(data) {
          alert("error occured" + data); //===Show Error Message====

      }

  });
}

function submitUpdateRecord() {
  
  //Add trapping
  $.ajax({
      url: 'functions/update_user_admin.php',
      type: 'POST',
      data: {

          edit_admin_fname: $("#edit_fname").val(),
          edit_admin_lname: $("#edit_lname").val(), 
          edit_admin_email: $("#edit_email").val(), 
          edit_admin_username: $("#edit_username").val(), 
          edit_admin_password: $("#edit_password").val(), 
          edit_admin_id: $("#edit_id").val(),
         
      },
      success: function(result) {
       
          console.log("Successfully Updated a record.");
          console.log($("#edit_fname").val());
          console.log($("#edit_lname").val());
          console.log($("#edit_email").val());
          console.log($("#edit_username").val());
          console.log($("#edit_password").val());
          console.log($("#edit_id").val());
       
          //display loader
          window.location.href = "admin_usermanagement.php";
       
      },
      error: function(data) {
          alert("error occured" + data); //===Show Error Message====

      }

  });
}
    </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">


// add
const btn = document.querySelector('#addbtn');



btn.addEventListener('click', function(e) {

e.preventDefault();

        if(document.getElementById("add_fname").value ==""){
        alert("Error: First Name Field cannot be empty! Please try again...");    
        }
    
        else if(document.getElementById("add_lname").value ==""){
            alert("Error: Last Name Field cannot be empty! Please try again...");    
        }
       
        else if(document.getElementById("add_email").value ==""){
            alert("Error: Email Field cannot be empty! Please try again...");    
        }
        else if(document.getElementById("add_username").value ==""){
            alert("Error: Username Field cannot be empty! Please try again...");    
        }
        else if(document.getElementById("add_password").value ==""){
            alert("Error: Password Field cannot be empty! Please try again...");    
        }

       
        else{
    
            submitRecord();
        
        }
    

})

</script>

<!-- display edit -->
<script>
// const btn = document.querySelector('#addbtn');

function opendetails(admin_id, admin_first_name, admin_last_name, admin_email, admin_username, admin_password){
    

    document.getElementById('id01').style.display='block'
 


    document.getElementById("edit_id").value = admin_id;
    document.getElementById("edit_fname").value = admin_first_name;
    document.getElementById("edit_lname").value = admin_last_name;
    document.getElementById("edit_email").value = admin_email;
    document.getElementById("edit_username").value = admin_username;
    document.getElementById("edit_password").value = admin_password;


   
}

    </script>

<!-- update -->
<script>
    const editbtn = document.querySelector('#updatebtn');

    editbtn.addEventListener('click', function(e) {
    e.preventDefault();

            if(document.getElementById("edit_fname").value ==""){
            alert("Error: First Name Field cannot be empty! Please try again...");    
            }
        
            else if(document.getElementById("edit_lname").value ==""){
                alert("Error: Last Name Field cannot be empty! Please try again...");    
            }
        
            else if(document.getElementById("edit_email").value ==""){
                alert("Error: Email Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("edit_username").value ==""){
                alert("Error: Username Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("edit_password").value ==""){
                alert("Error: Password Field cannot be empty! Please try again...");    
            }

        
            else{
        
                submitUpdateRecord();
            
            }
    

})
    </script>
    <!-- collector functions -->
    <script>

const addcolbtn = document.querySelector('#addcollectorbtn');

addcolbtn.addEventListener('click', function(e) {
    e.preventDefault();
            
            if(document.getElementById("add_collector_fname").value ==""){
            alert("Error: First Name Field cannot be empty! Please try again...");    
            }
        
            else if(document.getElementById("add_collector_mname").value ==""){
                alert("Error: Middle Name Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("add_collector_lname").value ==""){
                alert("Error: Last Name Field cannot be empty! Please try again...");    
            }
        
            else if(document.getElementById("add_collector_email").value ==""){
                alert("Error: Email Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("add_collector_address").value ==""){
                alert("Error: Address Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("add_collector_contact").value ==""){
                alert("Error: Contact Number Field cannot be empty! Please try again...");    
            }
            // else if(document.getElementById("password_collector").value ==""){
            //     alert("Error: Password Field cannot be empty! Please try again...");    
            // }

        
            else{
        
                submitCollectorRecord();
            
            }
    

})

function submitCollectorRecord() {
  
  //Add trapping
  $.ajax({
      url: 'functions/add_collector_user.php',
      type: 'POST',
      data: {

          collector_fname: $(".add_collector_fname").val(),
          collector_mname: $(".add_collector_mname").val(), 
          collector_lname: $(".add_collector_lname").val(), 
          email: $(".add_collector_email").val(), 
          address: $(".add_collector_address").val(), 
          collector_contact: $(".add_collector_contact").val(), 
         
        
       
      },
      success: function(result) {
       
          console.log("Successfully Added a record.");
          console.log($(".add_collector_fname").val());
          console.log($(".add_collector_mname").val());
          console.log($(".add_collector_lname").val());
          console.log($(".add_collector_email").val());
          console.log($(".add_collector_address").val());
          console.log($(".add_collector_contact").val());
          
       
        
        
          //display loader
          window.location.href = "functions/add_collector_user.php";
       
      },
      error: function(data) {
          alert("error occured" + data); //===Show Error Message====

          console.log($(".add_collector_fname").val());
          console.log($(".add_collector_mname").val());
          console.log($(".add_collector_lname").val());
          console.log($(".add_collector_email").val());
          console.log($(".add_collector_address").val());
          console.log($(".add_collector_contact").val());
          console.log($(".add_password").val());
          console.log($(".add_collector_id").val());
      }

  });
}


let btnColEdit = document.querySelector('#editcollector');

btnColEdit.addEventListener('click', () => {
    document.getElementById("edit_collector_fname").disabled = false;
    document.getElementById("edit_collector_mname").disabled = false;
    document.getElementById("edit_collector_lname").disabled = false;
    document.getElementById("edit_collector_email").disabled = false;
    document.getElementById("edit_collector_address").disabled = false;
    document.getElementById("edit_plate_number").disabled = false;
    document.getElementById("edit_collector_password").disabled = false;
  
    
    var p = document.getElementById('edit_collector_password');
     p.setAttribute('type', 'text');
});

let btnSubmitEdit = document.querySelector('#updatecollectorbtn');

btnSubmitEdit.addEventListener('click', () => {

            if(document.getElementById("edit_collector_fname").value ==""){
            alert("Error: First Name Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("edit_collector_mname").value ==""){
                alert("Error: Middle Name Field cannot be empty! Please try again...");    
            }
        
            else if(document.getElementById("edit_collector_lname").value ==""){
                alert("Error: Last Name Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("edit_collector_email").value ==""){
                alert("Error: Email Field cannot be empty! Please try again...");    
            }
           
            else if(document.getElementById("edit_collector_address").value ==""){
                alert("Error: Address Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("edit_plate_number").value ==""){
                alert("Error: Plate Number Field cannot be empty! Please try again...");    
            }
            else if(document.getElementById("edit_collector_password").value ==""){
                alert("Error: Password Field cannot be empty! Please try again...");    
            }       
            else{
        
                submitUpdateCollectorRecord();
            
            }
   
});

function submitUpdateCollectorRecord(){
    $.ajax({
      url: 'functions/update_user_collector.php',
      type: 'POST',
      data: {
          edit_id: $("#edit_collector_id").val(),
          edit_fname: $("#edit_collector_fname").val(),
          edit_mname: $("#edit_collector_mname").val(),
          edit_lname: $("#edit_collector_lname").val(), 
          edit_email: $("#edit_collector_email").val(), 
          edit_address: $("#edit_collector_address").val(), 
          edit_password: $("#edit_collector_password").val(), 
          edit_plate_number: $("#edit_plate_number").val(), 


      },
      success: function(result) {
       
          console.log("Successfully Updated a record.");
          console.log($("#edit_collector_id").val());
          console.log($("#edit_collector_fname").val());
          console.log($("#edit_collector_mname").val());
          console.log($("#edit_collector_lname").val());
          console.log($("#edit_collector_email").val());
          console.log($("#edit_collector_address").val());
          console.log($("#edit_collector_password").val());
          console.log($("#edit_plate_number").val());
       
          //display loader
          window.location.href = "admin_usermanagement.php";
       
      },
      error: function(data) {
          alert("error occured" + data); //===Show Error Message====

      }

  });

}







let btnColDel = document.querySelector('#deletecollector');
btnColDel.addEventListener('click', () => {
    
  
    // document.getElementById('editcollectormodal').style.display='none'
    var p = document.getElementById('edit_collector_id').value;
    document.getElementById('deleteConfirmationModal').style.display='block'
 
   
});
function confirmationclose(){
    document.getElementById('deleteConfirmationModal').style.display='none'

}
function confirmdeletion(){
    var id = document.getElementById('edit_collector_id').value;
    deletecollectorid(id)
}


</script>
<script>


function deletecollectorid(id){
    

    // deleteConfirmationModal

    $.ajax({
            url: 'functions/delete_user_collector.php',
            type: 'POST',
            data: {

            delete_id: id,
                                                           
            },
            success: function(result) {
         
            console.log("Successfully deleted a record.");
            console.log(id);
                                                           
                                                            //display loader
            window.location.href = "admin_usermanagement.php";
                                                        
            },
            error: function(data) {
             alert("error occured" + data); //===Show Error Message====

            }

         });
}
    </script>
</html> 



