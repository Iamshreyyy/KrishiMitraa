<html>
 <head>
  <title>
   Krishi Mitra
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
        .profile-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, #28a745, #ffc107, #dc3545, #007bff);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            z-index: 0;
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
        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, #28a745, #ffc107, #dc3545, #007bff);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            z-index: 0;
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
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
  </style>
 </head>
 <body>
  <nav class="navbar navbar-expand-lg">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">
     Krishi Mitra
    </a>
    <div class="collapse navbar-collapse justify-content-end">
     <ul class="navbar-nav">
      <li class="nav-item">
       <a class="nav-link" href="#">
        Profile
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">
        Logout
       </a>
      </li>
     </ul>
    </div>
   </div>
  </nav>
  <div class="container mt-5">
   <div class="row justify-content-center">
    <div class="col-md-4">
     <div class="profile-card">
      <img alt="Profile Picture" height="150" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-Hh5RPsKhtBPsWCFSiEKnUJ6x/user-8qgiVpCV0U0b7zDjfFInHgjl/img-65G8rhTKCQ4MGf89AoldnTS2.png?st=2024-09-08T05%3A56%3A16Z&amp;se=2024-09-08T07%3A56%3A16Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-07T21%3A51%3A47Z&amp;ske=2024-09-08T21%3A51%3A47Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=5AMCWQQBoMqDLG6XSWT/k9U0FvQgHP/r8YkFJGgkr5Y%3D" width="150"/>
      <h3>
       John Doe
      </h3>
      <p>
       Farmer
      </p>
     </div>
    </div>
    <div class="col-md-8">
     <div class="row">
      <div class="col-md-6 mb-4">
       <div class="card">
        <div class="card-header">
         Recent Transactions
        </div>
        <div class="card-body">
         <p>
          Transaction History
         </p>
         <a class="btn btn-primary" href="#">
          <i class="fas fa-history">
          </i>
          View Transactions
         </a>
        </div>
       </div>
      </div>
      <div class="col-md-6 mb-4">
       <div class="card">
        <div class="card-header">
         Crop Listing
        </div>
        <div class="card-body">
         <p>
          Manage Your Crop Listings
         </p>
         <a class="btn btn-primary" href="#">
          <i class="fas fa-seedling">
          </i>
          List Your Crop
         </a>
        </div>
       </div>
      </div>
      <div class="col-md-6 mb-4">
       <div class="card">
        <div class="card-header">
         Market Insights
        </div>
        <div class="card-body">
         <p>
          Get Latest Market Trends
         </p>
         <a class="btn btn-primary" href="#">
          <i class="fas fa-chart-line">
          </i>
          View Insights
         </a>
        </div>
       </div>
      </div>
      <div class="col-md-6 mb-4">
       <div class="card">
        <div class="card-header">
         Support
        </div>
        <div class="card-body">
         <p>
          Contact our Support Team
         </p>
         <a class="btn btn-primary" href="#">
          <i class="fas fa-headset">
          </i>
          Get Support
         </a>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="row market-prices">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       Current Market Prices
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-md-3">
         <div class="card">
          <div class="card-body">
           <h5>
            Wheat
           </h5>
           <p>
            ₹2000/quintal
           </p>
          </div>
         </div>
        </div>
        <div class="col-md-3">
         <div class="card">
          <div class="card-body">
           <h5>
            Rice
           </h5>
           <p>
            ₹3000/quintal
           </p>
          </div>
         </div>
        </div>
        <div class="col-md-3">
         <div class="card">
          <div class="card-body">
           <h5>
            Paddy
           </h5>
           <p>
            ₹2500/quintal
           </p>
          </div>
         </div>
        </div>
        <div class="col-md-3">
         <div class="card">
          <div class="card-body">
           <h5>
            Maize
           </h5>
           <p>
            ₹1800/quintal
           </p>
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