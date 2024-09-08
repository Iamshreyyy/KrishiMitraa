<?php
session_start();

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header('Location: login.php'); // Change 'login.php' to your login page
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

// Fetch farmer details using session user_id
$farmer_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM Farmers WHERE farmer_id = :farmer_id");
$stmt->execute(['farmer_id' => $farmer_id]);
$farmer = $stmt->fetch(PDO::FETCH_ASSOC);

// If farmer not found, logout and redirect to login
if (!$farmer) {
    header('Location: logout.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishi Mitra - Farmer Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #28a745;
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
            position: relative;
            overflow: hidden;
        }
        .profile-card img {
            border-radius: 50%;
            position: relative;
            z-index: 1;
        }
        .profile-card h3, .profile-card p {
            position: relative;
            z-index: 1;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .card-header, .card-body {
            position: relative;
            z-index: 1;
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
            background-color: #28a745;
            border: none;
        }
        .btn-primary i {
            margin-right: 5px;
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
                <img src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-Hh5RPsKhtBPsWCFSiEKnUJ6x/user-8qgiVpCV0U0b7zDjfFInHgjl/img-65G8rhTKCQ4MGf89AoldnTS2.png?st=2024-09-08T05%3A56%3A16Z&amp;se=2024-09-08T07%3A56%3A16Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T21%3A51%3A47Z&amp;ske=2024-09-08T21%3A51%3A47Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=5AMCWQQBoMqDLG6XSWT/k9U0FvQgHP/r8YkFJGgkr5Y%3D" alt="Profile Picture" width="150" height="150">
                <h3><?php echo htmlspecialchars($farmer['username']); ?></h3>
                <p>Farmer</p>
                <p>Phone: <?php echo htmlspecialchars($farmer['phone_number']); ?></p>
                <p>Email: <?php echo htmlspecialchars($farmer['email']); ?></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Recent Transactions</div>
                        <div class="card-body">
                            <p>Transaction History</p>
                            <a href="#" class="btn btn-primary"><i class="fas fa-history"></i> View Transactions</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">Crop Listing</div>
                        <div class="card-body">
                            <p>Manage Your Crop Listings</p>
                            <a href="#" class="btn btn-primary"><i class="fas fa-seedling"></i> List Your Crop</a>
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
