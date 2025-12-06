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
    <title>Hotel Booking - Manage Room Categories</title>

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
        
        .room-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            border-left: 5px solid #007bff;
        }
        
        .room-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
        
        .room-header {
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
        
        .price-tag {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 3px 10px rgba(40, 167, 69, 0.3);
        }
        
        .room-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
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
        
        .facilities-list {
            background: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
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
        
        .btn-edit {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
        
        .navbar-inverse .navbar-nav > .active > a {
            background: #3498db;
            color: white;
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
        
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-top: 15px;
        }
        
        @media (max-width: 768px) {
            .room-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .room-details {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                justify-content: center;
            }
            
            .btn-edit {
                width: 100%;
                justify-content: center;
            }
        }
        
        .icon {
            margin-right: 8px;
            color: #007bff;
        }
        
        .stats-badge {
            background: #6f42c1;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
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
        
        <h2 class="page-title"><i class="fas fa-cogs"></i> Manage Room Categories</h2>
        
        <?php
        $sql = "SELECT * FROM room_category";
        $result = mysqli_query($user->db, $sql);
        
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    // Split facilities by comma for better display
                    $facilities = explode(",", $row['facility']);
                    
                    echo "
                    <div class='room-card'>
                        <div class='room-header'>
                            <h3 class='room-title'><i class='fas fa-door-open icon'></i>" . $row['roomname'] . "</h3>
                            <span class='price-tag'><i class='fas fa-tag'></i> " . $row['price'] . " tk/night</span>
                        </div>
                        
                        <div class='room-details'>
                            <div class='detail-item'>
                                <div class='detail-label'><i class='fas fa-bed icon'></i>Bed Configuration</div>
                                <div class='detail-value'>" . $row['no_bed'] . " " . $row['bedtype'] . " Bed(s)</div>
                            </div>
                            <div class='detail-item'>
                                <div class='detail-label'><i class='fas fa-users icon'></i>Room Capacity</div>
                                <div class='detail-value'>Up to " . ($row['no_bed'] * 2) . " Guests</div>
                            </div>
                        </div>
                        
                        <div class='detail-item'>
                            <div class='detail-label'><i class='fas fa-concierge-bell icon'></i>Facilities</div>
                            <div class='facilities-list'>";
                    
                    foreach($facilities as $facility) {
                        $trimmed_facility = trim($facility);
                        if(!empty($trimmed_facility)) {
                            echo "<span class='facility-badge'><i class='fas fa-check'></i> " . $trimmed_facility . "</span>";
                        }
                    }
                    
                    echo "
                            </div>
                        </div>
                        
                        <div class='action-buttons'>
                            <a href='admin/edit_room_cat.php?roomname=" . $row['roomname'] . "' class='btn-edit'>
                                <i class='fas fa-edit'></i> Edit Category
                            </a>
                        </div>
                    </div>";
                }
            } else {
                echo "<div class='no-data'>
                        <i class='fas fa-info-circle' style='font-size: 48px; margin-bottom: 20px;'></i>
                        <h3>No Room Categories Found</h3>
                        <p>There are currently no room categories in the system.</p>
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
        
        <div class="text-center" style="margin-top: 30px;">
            <a href="admin/add_room_cat.php" class="btn-edit" style="background: linear-gradient(135deg, #28a745, #20c997);">
                <i class="fas fa-plus"></i> Add New Room Category
            </a>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>