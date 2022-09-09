<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/mainComponent.css">
    <title>Dashboard</title>
</head>
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
        <div class="col-7">
            <div class="column-display-wrapper bg-white mx-1 my-2 w-100 p-3 rounded shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Schedule</h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="search-bar-container bg-white d-flex align-items-center p-1 rounded shadow-sm">
                            <img class="search-icon me-1" src="assets/search_icon.svg">
                            <input class="search_field p-0" type="text" placeholder="Search here">
                        </div>
                        <select name="" id="" class="p-1 rounded shadow-sm ms-3">
                            <option value="">Pending</option>
                            <option value="">Approved: Paid</option>
                            <option value="">Approved: Unpaid</option>
                            <option value="">Cancelled</option>
                        </select>
                    </div>
                    
                </div>
                <div class="float-end mt-2 d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-between me-4">
                        <img class="action-list-icon me-2" src="assets/refresh_data_icon.svg">
                        <p class="text-sm text-muted m-0 fw-bold">Refresh Data</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <img class="action-list-icon me-2" src="assets/delete_schedule_icon.svg">
                        <p class="text-sm text-muted m-0 fw-bold">Delete Schedule</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-3">
            <div class="column-display-wrapper bg-white my-2 w-100 rounded shadow-sm">
                asdasdasdsddd
            </div>
        </div>
    </section>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>