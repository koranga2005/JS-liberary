<?php
session_start();
include("conection.php");
if(isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>

  <!-- Bootstrap 5 CSS -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous"
  >

  <style>
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #fdf6e3, #fff8f0); /* Rash malai feel */
      font-family: "Poppins", sans-serif;
    }
    .card {
      max-width: 420px;
      width: 100%;
      border-radius: 20px;
      background: #ffffff;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15);
      overflow: hidden;
    }
    .card-header {
      background: linear-gradient(135deg, #f5d142, #ffeb99);
      border: none;
      text-align: center;
      padding: 1.5rem;
    }
    .card-header h3 {
      margin: 0;
      font-weight: 700;
      color: #4d3b00;
    }
    .form-control {
      border-radius: 12px;
    }
    .btn-submit {
      background: linear-gradient(135deg, #f5c542, #ffde80);
      border: none;
      border-radius: 12px;
      font-weight: 600;
      color: #4d3b00;
      box-shadow: 0 6px 16px rgba(245, 197, 66, 0.4);
      transition: all 0.3s ease-in-out;
    }
    .btn-submit:hover {
      background: linear-gradient(135deg, #ffde80, #f5c542);
      box-shadow: 0 8px 18px rgba(245, 197, 66, 0.6);
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="card shadow">
    <div class="card-header">
      <h3>🍮 Student Registration</h3>
    </div>
    <div class="card-body p-4">
      <form action="code.php" method="POST">
        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label">name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <!-- email -->
        <div class="mb-3">
          <label for="class" class="form-label">email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <!-- password -->
        <div class="mb-3">
          <label for="class" class="form-label">password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <!-- Submit -->.
        <button type="submit" class="btn btn-submit w-100 py-2" name="submit_student">
          Register Now
        </button>
      </form>
        <div class="extra-links">
        <p class="mt-3 mb-0">Don’t have an account? <a href="index.php">login</a></p>
        </div>
        </div>
        </div>

  <!-- Bootstrap JS Bundle (optional, for interactivity) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>
