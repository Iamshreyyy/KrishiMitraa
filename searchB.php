<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crop Search</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('images/leaf-background.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    /* Top navigation bar */
    .navbar {
      display: flex;
      align-items: center;
      background-color: #23d21d; /* Updated color */
      padding: 10px;
      color: white;
      position: sticky;
      top: 0;
    }

    /* Image on the left */
    .navbar img {
      height: 50px;
      width: 50px;
      border-radius: 50%; /* Circle avatar */
      margin-right: 20px;
    }

    /* Centered search bar */
    .search-container {
      flex-grow: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .search-container select {
      padding: 10px;
      width: 200px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-right: 10px;
    }

    .voice-search {
      margin-left: 10px;
      cursor: pointer;
      display: flex;
      align-items: center;
    }

    .voice-search i {
      font-size: 24px;
      color: white;
    }

    /* Right side options */
    .navbar-right {
      display: flex;
      align-items: center;
    }

    .navbar-right a {
      margin-left: 20px;
      color: white;
      text-decoration: none;
      padding: 8px 16px;
    }

    .navbar-right a:hover {
      background-color: #575757;
      border-radius: 5px;
    }

    .navbar-right i {
      font-size: 24px;
      color: white;
      margin-left: 20px;
    }

    /* Content section below the navbar */
    #content {
      margin-top: 20px;
      text-align: center;
    }

    /* Blur box styling */
    .blur-box {
      background: rgba(255, 255, 255, 0.8); /* White with opacity */
      backdrop-filter: blur(10px); /* Blur effect */
      padding: 20px;
      border-radius: 10px;
      margin: 20px auto;
      width: 80%;
      max-width: 800px;
      position: relative;
    }

    .number-input {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 10px 0;
    }

    .number-input label {
      margin-right: 10px;
    }

    .number-input input {
      width: 80px;
      text-align: center;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin: 0 5px;
      -moz-appearance: textfield;
    }

    .number-input input::-webkit-outer-spin-button,
    .number-input input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .number-input button {
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Submit button */
    .find-button {
      display: block;
      margin: 20px auto;
      padding: 10px 30px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    #cropImage {
      width: 200px;
      height: 200px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Navigation bar -->
  <div class="navbar">
    <!-- Image on the left -->
    <img src="images/logo3.png" alt="Logo">
    
    <!-- Search bar in the center -->
    <div class="search-container">
      <select id="cropSearch" onchange="searchCrops()">
        <option value="" disabled selected>Select Crop</option>
        <option value="wheat">Wheat</option>
        <option value="rice">Rice</option>
        <option value="corn">Corn</option>
        <option value="soybean">Soybean</option>
        <option value="barley">Barley</option>
      </select>
      <div class="voice-search" onclick="startVoiceRecognition()">
        <i class="fa">&#xf130;</i>
      </div>
    </div>
    
    <!-- Right side options -->
    <div class="navbar-right">
      <a href="#">How to use site?</a>
      <i class='fa'>&#xf2bd;</i>
    </div>
  </div>

  <!-- Placeholder for crop image and options -->
  <div id="content">
    <!-- Content will appear here -->
  </div>

  <script>
    function searchCrops() {
  const crop = document.getElementById('cropSearch').value;
  
  if (crop) {
    let cropImage = '';
  
    // Check the selected crop and assign the corresponding image
    if (crop === "rice") {
      cropImage = 'images/rice.jpg';
    } else if (crop === "wheat") {
      cropImage = 'images/wheat.jpg';
    } else if (crop === "corn") {
      cropImage = 'images/corn.jpg';
    } else if (crop === "barley") {
      cropImage = 'images/barley.jpg';
    } else if (crop === "soybean") {
      cropImage = 'images/soybean.jpg';
    }

    // Update the content div with the crop image and additional inputs
    document.getElementById('content').innerHTML = `
      <img id="cropImage" src="${cropImage}" alt="${crop}" onerror="this.src='images/placeholder.jpg';">
      <div class="blur-box">
        <div class="number-input">
          <label>Minimum Quantity:</label>
          <button onclick="changeValue('quantity', -1)">-</button>
          <input type="number" id="quantity" value="1" inputmode="numeric" pattern="[0-9]*" min="1">
          <button onclick="changeValue('quantity', 1)">+</button>
        </div>
        <div class="number-input">
          <label>Expected Price:</label>
          <button onclick="changeValue('price', -1)">-</button>
          <input type="number" id="price" value="1" inputmode="numeric" pattern="[0-9]*" min="1">
          <button onclick="changeValue('price', 1)">+</button>
        </div>
        <div>
          <label>Area:</label>
          <input type="text" id="area" placeholder="Enter area">
        </div>
        <button class="find-button" onclick="loadNewPage()">Find</button>
      </div>
    `;
  } else {
    // If no crop is selected, clear the content area
    document.getElementById('content').innerHTML = '';
  }
}
    

    function changeValue(id, delta) {
      const input = document.getElementById(id);
      let value = parseInt(input.value);
      value += delta;
      if (value < 1) value = 1;
      input.value = value;
    }

    function loadNewPage() {
      window.location.href = 'buyer.php';
      // const xhr = new XMLHttpRequest();
      // xhr.open('GET', 'buyer.html', true); // Ensure buyer.html exists in same folder
      // xhr.onreadystatechange = function() {
      //   if (xhr.readyState === 4 && xhr.status === 200) {
      //     document.getElementById('content').innerHTML = xhr.responseText;
      //   } else if (xhr.readyState === 4 && xhr.status !== 200) {
      //     alert("Could not load the page. Please make sure the file exists.");
      //   }
      //};
      xhr.send();
    }

    function startVoiceRecognition() {
      const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
      recognition.lang = 'en-US';
      
      recognition.onresult = function(event) {
        const transcript = event.results[0][0].transcript.toLowerCase();
        const cropSelect = document.getElementById('cropSearch');
        const options = cropSelect.options;

        // Search for the spoken text in the dropdown options
        for (let i = 0; i < options.length; i++) {
          if (options[i].value === transcript) {
            cropSelect.selectedIndex = i;  // Select the matched crop
            searchCrops();  // Call the search function to display the crop image and inputs
            return;
          }
        }

        // If no match, just place the spoken text in the search box (you can remove this part if it's not needed)
        cropSelect.options[0].text = transcript;
      };

      recognition.onerror = function(event) {
        console.log('Voice recognition error: ' + event.error);
      };

      recognition.start();
    }
  </script>

</body>
</html>