g<?php 
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
    <link rel="stylesheet" href="/styles/mainComponent.css">
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
            <div class="column-display-wrapper bg-white rounded shadow-sm" style="width: 1000px;">
            <h1 class="section title" style="padding-left: 5px;">User Management</h1>
            <table class="table table-hover" >
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Settings</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-left: 10px;">
                        <div class="m-r-10"><img src="assets/images/logo.png>" alt="user" width="35"></div>
                    </td>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Admin</td>
                    <td>Pending</td>
                    <td>
                        <div class="w3-container">
                            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green">View Details</button>
                                <div id="id01" class="w3-modal">
                                <div class="w3-modal-content w3-animate-left">
                                <div class="w3-container">
                                    <header class="w3-container w3-green">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <h2>User Details</h2>
                                    </header>    
                                    <form>
                                            <div class="mb-3">
                                            <label for="full_name" class="col-form-label">Fullname:</label>
                                            <input type="text" id="full_name" value="adrian james" disabled>
                                            </div>
                                            <div class="mb-3">
                                            <label for="email_address" class="col-form-label">Email Address:</label>
                                            <input type="text" id="email_address" value="ajfdad@gmail.com" disabled>
                                            </div>
                                    </form>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Delete</button>
                                <button type="button" class="btn btn-primary">Verify</button>
                                <button type="button" class="btn btn-success">Edit</button>
                                </div>
                        </div>
                                </div>
                                </div>
                                </div>
	                </td>
                </tr>
                <tr>
                    <td>
                        <div class="m-r-10"><img src="assets/images/logo.png>" alt="user" width="35"></div>
                    </td>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>
                        <div class="m-r-10"><img src="assets/images/logo.png>" alt="user" width="35"></div>
                    </td>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>Bird</td>
                    <td>@twitter</td>
                    <td>
                        
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </section>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

</script>
</html>