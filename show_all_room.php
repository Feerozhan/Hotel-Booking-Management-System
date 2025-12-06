<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking - Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
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
        
        .booking-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            border-left: 5px solid #007bff;
        }
        
        .booking-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
        
        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }
        
        .room-title {
            color: #2c3e50;
            font-weight: bold;
            font-size: 22px;
            margin: 0;
        }
        
        .booking-id {
            background: #6c757d;
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .booking-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .detail-item {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            border-left: 3px solid #007bff;
        }
        
        .detail-label {
            font-weight: bold;
            color: #495057;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .detail-value {
            color: #2c3e50;
            font-size: 16px;
            font-weight: 600;
        }
        
        .status-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
        }
        
        .status-booked {
            background: #28a745;
            color: white;
        }
        
        .status-available {
            background: #6c757d;
            color: white;
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-logout {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
            color: white;
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
            color: #3498db;
            background: transparent;
        }
        
        .page-title {
            text-align: center;
            color: #ffbb2b;
            margin: 20px 0 30px 0;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .no-data {
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
        
        @media (max-width: 768px) {
            .booking-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .booking-details {
                grid-template-columns: 1fr;
            }
            
            .btn-edit {
                width: 100%;
                text-align: center;
            }
        }
        
        .icon {
            margin-right: 8px;
            color: #007bff;
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
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li class="active"><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin.php?q=logout" style="padding: 8px 15px;">
                            <button type="button" class="btn-logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png" class="social-icon"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png" class="social-icon"></a></li>                    
                </ul>
            </div>
        </nav>
        
        <h2 class="page-title"><i class="fas fa-tachometer-alt"></i> Admin Dashboard - Booked Rooms</h2>
        
        <?php
        $sql = "SELECT * FROM rooms WHERE book='true'";
        $result = mysqli_query($user->db, $sql);
        
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo "
                    <div class='booking-card'>
                        <div class='booking-header'>
                            <h3 class='room-title'><i class='fas fa-hotel icon'></i>" . $row['room_cat'] . "</h3>
                            <span class='booking-id'>ID: " . $row['room_id'] . "</span>
                        </div>
                        
                        <div class='booking-details'>
                            <div class='detail-item'>
                                <div class='detail-label'><i class='fas fa-calendar-check icon'></i>Check-in</div>
                                <div class='detail-value'>" . $row['checkin'] . "</div>
                            </div>
                            <div class='detail-item'>
                                <div class='detail-label'><i class='fas fa-calendar-times icon'></i>Check-out</div>
                                <div class='detail-value'>" . $row['checkout'] . "</div>
                            </div>
                            <div class='detail-item'>
                                <div class='detail-label'><i class='fas fa-user icon'></i>Guest Name</div>
                                <div class='detail-value'>" . $row['name'] . "</div>
                            </div>
                            <div class='detail-item'>
                                <div class='detail-label'><i class='fas fa-phone icon'></i>Phone</div>
                                <div class='detail-value'>" . $row['phone'] . "</div>
                            </div>
                        </div>
                        
                        <div class='d-flex justify-content-between align-items-center'>
                            <span class='status-badge status-booked'>
                                <i class='fas fa-check-circle'></i> " . ucfirst($row['book']) . "
                            </span>
                            <a href='edit_all_room.php?id=" . $row['room_id'] . "' class='btn-edit'>
                                <i class='fas fa-edit'></i> Edit Booking
                            </a>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='no-data'>
                        <i class='fas fa-info-circle' style='font-size: 48px; margin-bottom: 20px;'></i>
                        <h3>No Booked Rooms Found</h3>
                        <p>There are currently no rooms marked as booked in the system.</p>
                      </div>";
            }
        } else {
            echo "<div class='no-data' style='background: rgba(220, 53, 69, 0.1);'>
                    <i class='fas fa-exclamation-triangle' style='font-size: 48px; margin-bottom: 20px;'></i>
                    <h3>Database Error</h3>
                    <p>Cannot connect to server. Please try again later.</p>
                  </div>";
        }
        ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>