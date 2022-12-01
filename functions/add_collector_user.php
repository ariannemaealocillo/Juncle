<?php
session_start();

//----> Database Connection Credentials
require '../database.php';
//LIVE ARRAY TO USE
$post_params_field_array = array(
     "collector_fname",//0
     "collector_mname",//1
     "collector_lname",//2
     "email",//3
     "address",//4
     "collector_contact", //5

     );
     ?>
<script>
console.log($post_params_field_array);
</script>
<?php
$post_params_field_array_data_value = array();


 for($i = 0;$i < sizeof($post_params_field_array); $i++){
    $post_params_field_string_holder = $post_params_field_array[$i];
    if(isset($_POST[(String)$post_params_field_array[$i]])){
        array_push($post_params_field_array_data_value, $_POST[(String)$post_params_field_array[$i]]);
        // print_r($post_params_field_array_data_value[$i].", "); 
    ?>

<!-- For Console Debugging -->
<script>
console.log("<?php echo $post_params_field_array[$i].' is Set.'; ?>");
console.log('Collector Value: ' + "<?php echo $_POST[(String)$post_params_field_array[$i]]; ?>");
</script>





<?php
        }else{
        //Form Fields have not been set.
        }
}



$query_push_new_collector = "insert into collector( collector_firstname, collector_middlename, collector_lastname, collector_email, collector_address, password, contact_number, account_status) values (
'".$post_params_field_array_data_value[0]."','".$post_params_field_array_data_value[1]."','".$post_params_field_array_data_value[2]."',
'".$post_params_field_array_data_value[3]."', '".$post_params_field_array_data_value[4]."', '1234', '".$post_params_field_array_data_value[5]."','0')";

$query_run = mysqli_query($connection, $query_push_new_collector);
// header("Location: ../admin_usermanagement.php");




?>