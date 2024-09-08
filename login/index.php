<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn&SignUp</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <?php
    // Include the database connection file
    include 'connection.php';

    $error = ""; // Initialize error message

    // Handle login form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $phone = $_POST['phone_number'];
        $password = $_POST['password'];

        // Check if user is a farmer
        $stmt = $conn->prepare("SELECT * FROM Farmers WHERE phone_number = :phone");
        $stmt->execute(['phone' => $phone]);
        $farmer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($farmer && password_verify($password, $farmer['password'])) {
            // Farmer login successful
            session_start();
          
            $_SESSION['user_id'] = $farmer['farmer_id'];
            $_SESSION['username'] = $farmer['username'];
            $_SESSION['role'] = 'farmer';
            header("Location: ../farmer_profile.php"); // Redirect to farmer dashboard
            exit();
        }

        // Check if user is a buyer
        $stmt = $conn->prepare("SELECT * FROM Buyers WHERE phone_number = :phone");
        $stmt->execute(['phone' => $phone]);
        $buyer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($buyer && password_verify($password, $buyer['password'])) {
            // Buyer login successful
            session_start();
            $_SESSION['user_id'] = $buyer['buyer_id'];
            $_SESSION['username'] = $buyer['username'];
            $_SESSION['role'] = 'buyer';
            header("Location: buyer_dashboard.php"); // Redirect to buyer dashboard
            exit();
        }

        // Login failed
        $error = "Invalid phone number or password!";
    }

    // Handle sign-up form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
        $phone = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

        // Check if the phone number is already registered
        $stmt = $conn->prepare("SELECT * FROM Farmers WHERE phone_number = :phone");
        $stmt->execute(['phone' => $phone]);
        $farmer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($farmer) {
            $error = "Phone number already registered!";
        } else {
            // Insert the new farmer into the database
            $stmt = $conn->prepare("INSERT INTO Farmers (username, email, phone_number, password) VALUES (:username, :email, :phone, :password)");
            $stmt->execute([
                'username' => $phone, // Use phone number as username
                'email' => $email,
                'phone' => $phone,
                'password' => $password
            ]);

            // Farmer registration successful
            session_start();
            $_SESSION['user_id'] = $conn->lastInsertId();
            $_SESSION['username'] = $phone;
            $_SESSION['role'] = 'farmer';
            header("Location:./farmer_dashboard.php"); // Redirect to farmer dashboard
            exit();
        }
    }
    ?>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Sign In Form -->
          <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="phone_number" placeholder="Phone Number" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <input type="submit" name="login" value="Login" class="btn solid" />

            <?php if (!empty($error)): ?>
              <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>

          <!-- Sign Up Form -->
          <form action="" method="POST" class="sign-up-form">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="phone_number" placeholder="Phone Number" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <input type="submit" name="signup" value="Sign Up" class="btn solid" />

            <?php if (!empty($error)): ?>
              <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <!-- Panel Section -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here?</h3>
            <p>Ready to score the best deals for your crops? Join KrishiMitra now and start selling!</p>
            <button class="btn transparent" id="sign-up-btn">Sign Up</button>
          </div>
          <img src="./img/finalimage1.png" class="image" alt="" />
        </div>

        <div class="panel right-panel">
          <div class="content">
            <h3>One of us?</h3>
            <p>Part of the KrishiMitra family? Sign in and keep thriving!</p>
            <button class="btn transparent" id="sign-in-btn">Sign In</button>
          </div>
          <img src="./img/finalimage2.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="./app.js"></script>
  </body>
</html>
