
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/mainComponent.css">

    <title>Juncle « Notification</title>
    <link rel="stylesheet" href="/Juncle-main/styles/theme-notification/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/Juncle-main/styles/theme-notification/themes/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/Juncle-main/styles/theme-notification/themes/assets/generic.css">
    <link rel="stylesheet" href="/Juncle-main/styles/theme-notification/themes/default/style.css">

</head>

<body class="body-background" >

    <?php
        include('components/header.php');
    ?>
    <section class="main_container row wrapper">
        <div class="col-2">
            <?php
                include('components/navbar.php');
            ?>
        </div>
        <div class="col-9">
        <div class="column-display-wrapper bg-white mx-5 my-2 w-100 p-3 rounded shadow-sm">
            <!-- START -->
            <div id="wrapcontainer">
    	        <div id="container">
            <div id="content">
	        <div class="mtcntnr">
		        <h1 class="module_title">
        	        <img class="logo_notification" src="assets/notification_icon.svg"></i>  Notification 
                </h1>
            <div class="mtshad"></div>
            </div>
            <div id="message_container" style="display:none;" class="ui-state-highlight ui-corner-all message_box"> 
                <span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                <span class="message"></span><a class="ui-icon ui-icon-close" href="javascript:void(0)" onclick="javascript:$('#message_container').hide()" style="float:right" title="Close"></a>
            </div>
            <div id="main">
                <div class="module_content">

            <div id="notification_list_wrapper">
            <h2>Bookings</h2>
            <table style="margin:0px" summary="Schedule" class="formtable" id="box-table-a">
                <thead>
                    <tr>
                        <th width="30%" scope="col">Event</th>
                        <th width="40%" scope="col">Description</th>
                        <th width="10%" style="text-align:center" scope="col">Status</th>
                        <th width="20%" style="text-align:center" scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>
            <tr class="hover-link">
            <td>Schedule</td>
                <td>
                    <span class="badge badge-info"> 20</span> Customer(s) that are booking for a schedule.                          
                </td>
                <td style="text-align:center">
                    <span class="badge badge-success"><i class="icon icon-ok icon-white"> </i> Seen</span>                      </td>
                <td style="text-align:center">
                    <div class="overlay" style="height: -10px; display: true;">
                        <a href="" style="padding:0px 7px 0px 5px" class="btn btn-edit-type"><i class="icon-search"> </i> View Details</a>
                    </div>
                </td>
            </tr>
            <tr class="hover-link">
            <td>Pick Up</td>
                <td>
                    <span class="badge badge-info"> 360</span> Customer(s) scheduled for pick up.                          
                </td>
                <td style="text-align:center">
                    <span class="badge badge-success"><i class="icon icon-ok icon-white"> </i> Seen</span>                      </td>
                <td style="text-align:center">
                    <div class="overlay" style="height: -10px; display: true;"> <!--SHOULD BE none!-->
                        <a href="" style="padding:0px 7px 0px 5px" class="btn btn-edit-type"><i class="icon-search"> </i> View Details</a>
                    </div>
                </td>
            </tr>                  
            </table>
    <br><br>
            <h2>Feedbacks</h2>
                <table style="margin:0px" summary="Schedule" class="formtable" id="box-table-a">
                    <thead>
                        <tr>
                            <th width="30%" scope="col">Event</th>
                            <th width="40%" scope="col">Description</th>
                            <th width="10%" style="text-align:center" scope="col">Status</th>
                            <th width="20%" style="text-align:center" scope="col">Action</th>
                        </tr>
                    </thead>
                <tbody>
                <tr class="hover-link">
                    <td>Review</td>
                      <td>
                          <span class="badge badge-info">22</span> App Review                          
                      </td>
                      <td style="text-align:center">
                          <span class="badge badge-success"><i class="icon icon-ok icon-white"> </i> Seen</span>                      </td>
                      <td style="text-align:center">
                          <div class="overlay" style="height: -10px; display: true;">
                              <a href="" style="padding:0px 7px 0px 5px" class="btn btn-edit-type"><i class="icon-search"> </i> View Details</a>
                          </div>
                      </td>
                </tr>
                <tr class="hover-link">
                    <td>Service Review</td>
                      <td>
                          <span class="badge badge-info"> 3</span> Review of the transaction                          
                      </td>
                      <td style="text-align:center">
                          <span class="badge badge-warning"><i class="icon icon-info-sign icon-white"> </i> New</span>                      </td>
                      <td style="text-align:center">
                          <div class="overlay" style="height: -10px; display: true;">
                              <a href="" style="padding:0px 7px 0px 5px" class="btn btn-edit-type"><i class="icon-search"> </i> View Details</a>
                          </div>
                      </td>
                </tr>                       
                </table>
            </div><!-- #NOTIFICATION LIST WRAPPER -->

                </div><!-- #MODULE -->
            </div><!-- #MAIN -->
            </div><!-- #CONTENT -->
                </div><!-- #container -->
	        </div><!-- #wrapcontainer -->
        </div>
        </div>
    </section>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

</script>
</html>