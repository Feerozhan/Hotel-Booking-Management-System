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
    <title>Hotel Booking - Rooms & Facilities</title>

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
            background: rgba(0, 0, 0, 0.8);
            padding: 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        
        .well {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .well:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }
        
        h4 {
            color: #d35400;
            font-weight: bold;
            border-bottom: 2px solid #d35400;
            padding-bottom: 10px;
            margin-top: 0;
        }
        
        h6 {
            color: #2c3e50;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .room-detail {
            color: #34495e;
            margin-bottom: 8px;
            padding-left: 10px;
        }
        
        .price-tag {
            background: linear-gradient(135deg, #e67e22, #d35400);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            box-shadow: 0 3px 10px rgba(230, 126, 34, 0.3);
        }
        
        .btn-book {
            background: linear-gradient(to right, #e67e22, #d35400);
            border: none;
            color: white;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            margin-top: 15px;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);
        }
        
        .btn-book:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(230, 126, 34, 0.5);
            color: white;
            background: linear-gradient(to right, #d35400, #e67e22);
        }
        
        .room-icon {
            font-size: 20px;
            margin-right: 10px;
            color: #e67e22;
            width: 25px;
            text-align: center;
        }
        
        .navbar {
            border-radius: 0;
            margin-bottom: 0;
            border: none;
        }
        
        .navbar-inverse {
            background: rgba(44, 62, 80, 0.95);
        }
        
        .navbar-inverse .navbar-nav > li > a {
            color: #ecf0f1;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .navbar-inverse .navbar-nav > li > a:hover {
            color: #e67e22;
            background: transparent;
        }
        
        .navbar-inverse .navbar-nav > .active > a {
            background: #e67e22;
            color: white;
        }
        
        .banner {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        
        .page-title {
            text-align: center;
            color: #e67e22;
            margin: 30px 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .facility-list {
            list-style-type: none;
            padding-left: 0;
            margin-top: 10px;
        }
        
        .facility-list li {
            margin-bottom: 8px;
            padding: 8px 12px;
            background: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #e67e22;
            color: #2c3e50;
            font-weight: 500;
        }
        
        .facility-list li:before {
            content: "✓ ";
            color: #27ae60;
            font-weight: bold;
            margin-right: 8px;
        }
        
        .facility-badge {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin: 2px;
            font-weight: 600;
        }
        
        .room-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .well {
                text-align: center;
                padding: 20px 15px;
            }
            
            .btn-book {
                width: 100%;
                margin-top: 10px;
            }
            
            .room-header {
                flex-direction: column;
                text-align: center;
            }
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            font-weight: 600;
        }
        
        footer {
            background: rgba(44, 62, 80, 0.9);
            color: #ecf0f1;
            padding: 20px;
            margin-top: 40px;
            border-top: 3px solid #e67e22;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="banner" src="images/home_banner.jpg" alt="Hotel Banner">
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="http://www.twitter.com"><i class="fab fa-twitter"></i></a></li>                    
                </ul>
            </div>
        </nav>
        
        <h2 class="page-title">Our Rooms & Facilities</h2>
        
        <?php
        $sql = "SELECT * FROM room_category";
        $result = mysqli_query($user->db, $sql);
        
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo "
                    <div class='row'>
                        <div class='col-md-8'>
                            <div class='well'>
                                <div class='room-header'>
                                    <h4><i class='fas fa-door-open room-icon'></i>" . $row['roomname'] . "</h4>
                                    <span class='price-tag'><i class='fas fa-tag room-icon'></i>" . $row['price'] . " tk/night</span>
                                </div>
                                
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <h6><i class='fas fa-bed room-icon'></i>Room Details:</h6>
                                        <div class='room-detail'>
                                            <strong>Beds:</strong> " . $row['no_bed'] . " " . $row['bedtype'] . " bed(s)
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <h6><i class='fas fa-concierge-bell room-icon'></i>Facilities:</h6>";
                    
                    // Split facilities by comma and display as list
                    $facilities = explode(",", $row['facility']);
                    echo "<ul class='facility-list'>";
                    foreach($facilities as $facility) {
                        $trimmed_facility = trim($facility);
                        if(!empty($trimmed_facility)) {
                            echo "<li>" . $trimmed_facility . "</li>";
                        }
                    }
                    echo "</ul>";
                    
                    echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4 text-center' style='display: flex; align-items: center; justify-content: center;'>
                            <a href='./booknow.php?roomname=" . $row['roomname'] . "'>
                                <button class='btn btn-book'><i class='fas fa-calendar-check'></i> Book Now</button>
                            </a>
                        </div>   
                    </div>";
                }
            } else {
                echo "<div class='alert alert-info text-center'>No rooms available at the moment. Please check back later.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Cannot connect to server. Please try again later.</div>";
        }
        ?>
        
        <footer class="text-center">
            <p>&copy; <?php echo date("Y"); ?> Hotel Booking System. All rights reserved.</p>
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>