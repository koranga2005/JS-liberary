<?php
session_start();
include("conection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Luxury Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
      color: #fff;
    }

    .login-card {
      width: 100%;
      max-width: 420px;
      border-radius: 15px;
      padding: 40px 35px;
      box-shadow: 0 0 25px rgba(212, 175, 55, 0.3);
      border: 1px solid rgba(212, 175, 55, 0.4);
      transform: translateY(50px);
    }

    .login-card h3 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
      color: #d4af37; /* Gold */
      letter-spacing: 1px;
    }

    .form-label {
      color: #dcdcdc;
      font-weight: 500;
    }

    .form-control {
      border-radius: 8px;
      padding: 10px;
      border: 1px solid #333;
    }
    .form-control:focus {
      border-color: #d4af37;
      box-shadow: 0 0 0 0.2rem rgba(212,175,55,0.25);
    }

    .btn-login {
      background: linear-gradient(90deg, #d4af37, #c5a028);
      border: none;
      border-radius: 8px;
      padding: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      color: #111;
      transition: all 0.3s ease-in-out;
    }
    .btn-login:hover {
      background: linear-gradient(90deg, #c5a028, #d4af37);
      color;white
      box-shadow: 0 0 15px rgba(212,175,55,0.6);
    }

    .extra-links {
      text-align: center;
      margin-top: 15px;
      font-size: 0.9rem;
    }
    .extra-links a {
      text-decoration: none;
      color: #d4af37;
      font-weight: 500;
    }
    .extra-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3>Luxury Access</h3>
    <form action="code.php" method= "POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@luxury.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
      </div>
      <div class="d-flex justify-content-between mb-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="remember">
          <label class="form-check-label text-light" for="remember">Remember me</label>
        </div>
        <a href="#" class="text-decoration-none">Forgot Password?</a>
      </div>
      <button type="submit" class="btn btn-login w-100" name= "login">Login</button>
    </form>
    <div class="extra-links">
      <p class="mt-3 mb-0">Don’t have an account? <a href="about.php">Register</a></p>
    </div>
  </div>

  <script>

  </script>
</body>
</html>
