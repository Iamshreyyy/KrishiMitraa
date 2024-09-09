<?php
session_start();

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'buyer') {
    header('Location: login/index.php'); // Redirect to login page if not a buyer
    exit();
}

// Database connection
$host = 'localhost';  // Database host
$dbname = 'krishimitra';  // Database name
$user = 'root';  // Database username
$pass = '';  // Database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch buyer details using session user_id
$buyer_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM Buyers WHERE buyer_id = :buyer_id");
$stmt->execute(['buyer_id' => $buyer_id]);
$buyer = $stmt->fetch(PDO::FETCH_ASSOC);

// If buyer not found, logout and redirect to login
if (!$buyer) {
    header('Location: logout.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishi Mitra - Buyer Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-card img {
            border-radius: 50%;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            font-weight: bold;
        }
        .card-body {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .market-prices {
            margin-top: 20px;
        }
        .market-prices .card-header {
            background-color: #ffc107;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Krishi Mitra</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a> <!-- Logout link -->
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="profile-card">
                <i class="fa fa-user" style="font-size:48px;color:light blue"></i>
                <h3><?php echo htmlspecialchars($buyer['username']); ?></h3>
                <p>Buyer</p>
                <p>Phone: <?php echo htmlspecialchars($buyer['phone_number']); ?></p>
                <p>Email: <?php echo htmlspecialchars($buyer['email']); ?></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Recent Purchases</div>
                        <div class="card-body">
                            <p>Purchase History</p>
                            <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> View Purchases</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Crop Listings</div>
                        <div class="card-body">
                            <p>Browse Available Crops</p>
                            <a href="#" class="btn btn-primary"><i class="fas fa-seedling"></i> Browse Crops</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Market Insights</div>
                        <div class="card-body">
                            <p>Get Latest Market Trends</p>
                            <a href="#" class="btn btn-primary"><i class="fas fa-chart-line"></i> View Insights</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Support</div>
                        <div class="card-body">
                            <p>Contact our Support Team</p>
                            <a href="#" class="btn btn-primary"><i class="fas fa-headset"></i> Get Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row market-prices">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Current Market Prices</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Wheat</h5>
                                    <p>₹2000/quintal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Rice</h5>
                                    <p>₹3000/quintal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Paddy</h5>
                                    <p>₹2500/quintal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Maize</h5>
                                    <p>₹1800/quintal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
