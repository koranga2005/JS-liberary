<?php
session_start();
include("config.php");
include("middleware.php");
if(isset($_SESSION['name'] , $_SESSION['email'], $_SESSION['password']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
    }
    /* Sidebar */
    .sidebar {
      width: 220px;
      background: #1e293b;
      color: white;
      height: 100vh;
      position: fixed;
      padding: 20px;
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .sidebar a {
      display: block;
      color: white;
      padding: 10px;
      margin: 5px 0;
      text-decoration: none;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background: #334155;
    }

    /* Main Content */
    .main {
      margin-left: 220px;
      padding: 20px;
      flex: 1;
      background: #f8fafc;
      min-height: 100vh;
    }
    .header {
      background: white;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Admin</h2>
    <a href="#">Dashboard</a>
    <a href="#">Users</a>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      <h1>Dashboard</h1>
      <span>Welcome<br><?php echo $_SESSION['name'];?></span>
    </div>
    

    <div class="cards">
      <div class="card">
        <h3><?php echo $_SESSION['email'];?></h3>
        <p>150</p>
      </div>
      <div class="card">
        <h3>Sales</h3>
        <p>$1,250</p>
      </div>
      <div class="card">
        <h3>Reports</h3>
        <p>25</p>
      </div>
    </div>
  </div>
</body>
</html>