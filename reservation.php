<?php
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 

    if(isset($_REQUEST['submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->check_available($checkin, $checkout);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking - Check Availability</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day != 0), ''];
            }
        });
    });
    </script>
    
    <style>
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            background: rgba(0, 0, 0, 0.85);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
        }
        
        .search-box {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 2px solid #ffbb2b;
        }
        
        .room-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border-left: 5px solid #007bff;
        }
        
        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            color: #2c3e50;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .datepicker {
            background: white;
            cursor: pointer;
        }
        
        .btn-check {
            background: linear-gradient(135deg, #ffbb2b, #ff9800);
            border: none;
            color: #2c3e50;
            font-weight: bold;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 18px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-check:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 187, 43, 0.4);
            color: #2c3e50;
        }
        
        .btn-book {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            color: white;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .room-title {
            color: #2c3e50;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 15px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        
        .room-detail {
            color: #495057;
            font-size: 16px;
            margin-bottom: 8px;
            padding-left: 10px;
        }
        
        .availability-badge {
            background: #28a745;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
        }
        
        .price-tag {
            background: linear-gradient(135deg, #ffbb2b, #ff9800);
            color: #2c3e50;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 18px;
            display: inline-block;
            margin: 10px 0;
        }
        
        .facility-badge {
            display: inline-block;
            background: #17a2b8;
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 13px;
            margin: 3px;
            font-weight: 600;
        }
        
        .navbar {
            border-radius: 0;
            margin-bottom: 20px;
            background: rgba(44, 62, 80, 0.95) !important;
        }
        
        .navbar-inverse .navbar-nav > li > a {
            color: #ecf0f1;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .navbar-inverse .navbar-nav > li > a:hover {
            color: #ffbb2b;
            background: transparent;
        }
        
        .navbar-inverse .navbar-nav > .active > a {
            background: #ffbb2b;
            color: #2c3e50;
        }
        
        .page-title {
            text-align: center;
            color: #ffbb2b;
            margin: 20px 0 30px 0;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .no-rooms {
            text-align: center;
            color: #ffbb2b;
            font-size: 18px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            margin: 20px 0;
        }
        
        .social-icon {
            width: 24px;
            height: 24px;
            transition: transform 0.3s ease;
        }
        
        .social-icon:hover {
            transform: scale(1.2);
        }
        
        .icon {
            margin-right: 8px;
            color: #007bff;
        }
        
        @media (max-width: 768px) {
            .search-box {
                padding: 20px;
            }
            
            .room-card {
                text-align: center;
                padding: 20px;
            }
            
            .btn-book {
                width: 100%;
                text-align: center;
            }
        }
        
        .date-input-group {
            display: flex;
            gap: 15px;
        }
        
        .date-input-group .form-group {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px; border-radius: 10px 10px 0 0;">      
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li class="active"><a href="reservation.php">Online Reservation</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png" class="social-icon"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png" class="social-icon"></a></li>                    
                </ul>
            </div>
        </nav>
        
        <h2 class="page-title"><i class="fas fa-search"></i> Check Room Availability</h2>
        
        <div class='row'>
            <div class='col-md-3'></div>
            <div class='col-md-6 search-box'>
                <form action="" method="post" name="room_category">
                    <div class="date-input-group">
                        <div class="form-group">
                            <label for="checkin"><i class="fas fa-calendar-check icon"></i>Check In Date:</label>
                            <input type="text" class="form-control datepicker" name="checkin" placeholder="Select check-in date" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="checkout"><i class="fas fa-calendar-times icon"></i>Check Out Date:</label>
                            <input type="text" class="form-control datepicker" name="checkout" placeholder="Select check-out date" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-check" name="submit">
                        <i class="fas fa-search"></i> Check Availability
                    </button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div> 
        
        <?php   
        if(isset($_REQUEST['submit'])) {
            if($result && mysqli_num_rows($result) > 0) {
                echo "<h3 class='page-title' style='font-size: 24px; margin-top: 20px;'><i class='fas fa-list'></i> Available Rooms</h3>";
                
                while($row = mysqli_fetch_array($result)) {
                    $room_cat = $row['room_cat'];
                    $sql = "SELECT * FROM room_category WHERE roomname='$room_cat'";
                    $query = mysqli_query($user->db, $sql);
                    $row2 = mysqli_fetch_array($query);
                    
                    // Split facilities by comma for better display
                    $facilities = explode(",", $row2['facility']);
                    
                    echo "
                    <div class='row'>
                        <div class='col-md-2'></div>
                        <div class='col-md-7'>
                            <div class='room-card'>
                                <h3 class='room-title'><i class='fas fa-door-open icon'></i>" . $row2['roomname'] . "</h3>
                                
                                <div class='room-detail'>
                                    <strong><i class='fas fa-bed icon'></i>Bed Configuration:</strong> " . $row2['no_bed'] . " " . $row2['bedtype'] . " bed(s)
                                </div>
                                
                                <div class='room-detail'>
                                    <strong><i class='fas fa-calendar-check icon'></i>Available Rooms:</strong> 
                                    <span class='availability-badge'>" . $row2['available'] . " rooms available</span>
                                </div>
                                
                                <div class='room-detail'>
                                    <strong><i class='fas fa-concierge-bell icon'></i>Facilities:</strong><br>";
                    
                    foreach($facilities as $facility) {
                        $trimmed_facility = trim($facility);
                        if(!empty($trimmed_facility)) {
                            echo "<span class='facility-badge'><i class='fas fa-check'></i> " . $trimmed_facility . "</span>";
                        }
                    }
                    
                    echo "
                                </div>
                                
                                <div class='price-tag'>
                                    <i class='fas fa-tag'></i> " . $row2['price'] . " tk/night
                                </div>
                            </div>
                        </div>
                        <div class='col-md-3' style='display: flex; align-items: center; justify-content: center;'>
                            <a href='./booknow.php?roomname=" . $row2['roomname'] . "&checkin=" . $_REQUEST['checkin'] . "&checkout=" . $_REQUEST['checkout'] . "' class='btn-book'>
                                <i class='fas fa-calendar-plus'></i> Book Now
                            </a>
                        </div>   
                    </div>";
                }
            } else {
                echo "<div class='no-rooms'>
                        <i class='fas fa-calendar-times' style='font-size: 48px; margin-bottom: 20px;'></i>
                        <h3>No Rooms Available</h3>
                        <p>Sorry, no rooms are available for the selected dates. Please try different dates.</p>
                      </div>";
            }
        }
        ?>
    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>