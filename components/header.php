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
    <link rel="stylesheet" href="styles/mainComponent.css">
    <title>Document</title>
</head>
<body>
    <section class="header-section">
        <div class="header d-flex align-items-center justify-content-between shadow-sm px-3">
            <div class="d-flex align-items-center justify-content-around">
                <img class="header_logo_icon me-1" src="assets/header_logo.svg">
                <p class="header_logo_word fs-4 fw-bold my-0 ms-1">Juncle</p>
            </div>
            <div class="header-nav d-flex align-items-center justify-content-between">
                <img class="header_icon_notification" src="assets/notification.svg">
                <div class="profile_header d-flex justify-content-between align-items-center">
                    <img class="header_logo_icon me-1" src="assets/image_placeholder.svg">
                    <div class="profile_desc">
                        <p class="profile-text-header mb-0 fw-bold"><?php echo $_SESSION['username'] ?></p>
                        <p class="profile-text-header mb-0">Admin/Moderator</p>
                    </div>
                </div>
                <a id="logout" class="me-2">Sign out</a>
            </div>
        </div>
    </section>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#logout').click(function() {
       
        console.log("User logged out.");
        localStorage.clear();
        window.location.href = "index.php";
    });
</script>

</html>