<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('images/leaf-background.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main Content */
        main {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-grow: 1;
        }

        .sellers {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .seller-box {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
    width: 320px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden; /* Prevent overflow */
    text-align: center;
    box-sizing: border-box; /* Ensure padding is within the box size */
    max-height: 500px; /* Define a maximum height to prevent overflow */
}

        .seller-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .seller-box img {
    width: 100%;
    height: 180px;
    max-height: 180px; /* Ensure image doesn't grow too large */
    border-radius: 12px;
    object-fit: cover;
    margin-bottom: 15px;
    display: block;
}

        .seller-details h3 {
            font-size: 24px;
            margin: 0 0 10px;
            color: #333;
            font-weight: 700;
        }

        .seller-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .seller-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Main Content: Seller Information -->
    <main>
        <section class="sellers">
            <div class="seller-box">
                <img src="images/buy1.jpg" alt="not success">
                <div class="seller-details">
                    <h3>Aditya Dixit</h3>
                    <p>Rating: ★★★★☆</p>
                    <p>Location: Uttar Pradesh, India</p>
                    <p>Quantity: 100 kg</p>
                    <p>Price: ₹50/Kg</p>
                    <p>Phone: 9310296487</p>
                    <button><a href="enquire.html"> Enquire now</a></button>
                </div>
            </div>
            <div class="seller-box">
                <img src="images/buy2.jpeg" alt="Seller 2">
                <div class="seller-details">
                    <h3>Shreyansh Agarwal</h3>
                    <p>Rating: ★★★☆☆</p>
                    <p>Location: Bareilly, India</p>
                    <p>Quantity: 150 kg</p>
                    <p>Price: ₹25/Kg</p>
                    <p>Phone: 9876543219</p>
                    <button><a href="enquire.html"> Enquire now</a></button>
                </div>
            </div>
            <div class="seller-box">
                <img src="images/buy3.jpeg" alt="Seller 3">
                <div class="seller-details">
                    <h3>Archit Nigam</h3>
                    <p>Rating: ★★★★☆</p>
                    <p>Location: Lucknow, India</p>
                    <p>Quantity: 200 kg</p>
                    <p>Price: ₹ 30/Kg</p>
                    <p>Phone: 5678912349</p>
                    <button><a href="enquire.html"> Enquire now</a></button>
                </div>
            </div>
            <div class="seller-box">
                <img src="images/buy4.jpg" alt="Seller 4">
                <div class="seller-details">
                    <h3>Hardik Kaushik</h3>
                    <p>Rating: ★★★★☆</p>
                    <p>Location: Haryana, India</p>
                    <p>Quantity: 50 kg</p>
                    <p>Price: ₹ 20/kg</p>
                    <p>Phone: 1111111111</p>
                    <button><a href="enquire.html"> Enquire now</a></button>
                </div>
            </div>
            <div class="seller-box">
                <img src="images/buy5.png" alt="Seller 5">
                <div class="seller-details">
                    <h3>Shashank Pandey</h3>
                    <p>Rating: ★★★☆☆</p>
                    <p>Location: Karnataka, India</p>
                    <p>Quantity: 80 kg</p>
                    <p>Price: ₹ 30/Kg</p>
                    <p>Phone: 222222222</p>
                    <button><a href="enquire.html"> Enquire now</a></button>
                </div>
            </div>
            <div class="seller-box">
                <img src="images/buy6.jpeg" alt="Seller 6">
                <div class="seller-details">
                    <h3>Aarsh Sharma</h3>
                    <p>Rating: ★★★★★</p>
                    <p>Location: Assam, India</p>
                    <p>Quantity: 120 kg</p>
                    <p>Price: ₹29</p>
                    <p>Phone: (222) 222-22</p>
                    <button><a href="enquire.html"> Enquire now</a></button>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 DivyAstra | Address: Manipal University | Contact: 9310296487</p>
    </footer>

</body>
</html>