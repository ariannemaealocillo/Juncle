<?php
session_start();
//----> Database Connection Credentials
require 'database.php';



//-----> Form Data

$Username = "";
$Password = "";

if(isset($_POST['username']) AND isset($_POST['password'])){
    $Username = $_POST['username'];
    $Password = $_POST['password'];
}else{
    echo "No credentials submitted.";
    ?>
<!-- <meta http-equiv="refresh" content="0; url=../index.php" /> -->
<?php
}



$query = "select * from admin";
$run_query = mysqli_query($connection,$query);
$return_request_from_run_query = mysqli_num_rows($run_query) > 0;

while($row = mysqli_fetch_array($run_query)){
    // echo $row['first_name'];
    if($Username == $row['user_name'] AND $Password == $row['password']){
        echo "Logging in...";
    
    $_SESSION["username"] = $row['user_name'];
    header("Location:dashboard.php")
    ?>
<script>
//LocalStorage Data for User Credentials
localStorage.setItem("username", "<?php echo $row['user_name']?>");

// localStorage.setItem("admin_status", "<?php //echo $row['account_status']?>");
</script>

<?php
break;
    }else{
  
    }
}

// if(){

// }
?>