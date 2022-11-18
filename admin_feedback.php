<!--<?php 
    require 'database.php'; 
    session_start();
?>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/mainComponent.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Customer Feedback</title>
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
            <div class="column-display-wrapper bg-white rounded shadow-sm" style="width: 1000px;">
            <h1 class="section title" style="padding-left: 5px;">Customer Feedback</h1>
            <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="search-bar-container bg-white d-flex align-items-center p-1 rounded shadow-sm">
                                <img class="search-icon me-1" src="assets/search_icon.svg">
                                <input class="search_field p-0" id="searchBarFilter" type="text" placeholder="Search">
                            </div>
                            
                        </div>
                        
                    </div>
                    
            <div id="searchresult">

            </div>

            
            </div>
        </div>
        </section>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#searchBarFilter").keyup(function(){
            var input = $(this).val();
            //alert(input);

            if(input != ""){
                $.ajax({
                    url: "api/feedback_search.php",
                    method: "POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display","block");
                    }
                });
            }else{
                $("#searchresult").css("display","none");
            }
            
        });
    });


</script>
</html>
