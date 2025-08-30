<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            padding: 2.5rem;
            max-width: 450px;
            width: 100%;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .form-switch {
            background: #667eea;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .form-switch:hover {
            background: #764ba2;
            transform: scale(1.05);
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        
        .text-muted a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .text-muted a:hover {
            color: #764ba2;
        }
        
        .hidden {
            display: none;
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }
        
        .loading::after {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-left: 10px;
            border: 2px solid #fff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            vertical-align: middle;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container me-5">
        <div class="form-container p-4">
            <!-- Login Form -->
            <div id="loginForm" class="fade-in">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-primary">Welcome Back</h2>
                    <p class="text-muted">Please sign in to your account</p>
                </div>
                
                <form id="loginFormElement" novalidate>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
                        <div class="error-message" id="emailError">Please enter a valid email</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                        <div class="error-message" id="passwordError">Please enter your password</div>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">
                            Remember me
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-3" id="loginBtn">Sign In</button>
                    
                    <div class="text-center">
                        <p class="text-muted">
                            <a href="#" class="text-decoration-none">Forgot your password?</a>
                        </p>
                        <p class="text-muted">
                            Don't have an account? 
                            <a href="regisgter.php">Sign up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '#signIn', function() {
            
        });

        $(document).on('click', '#login', function(){
            let loginEmail = $('#loginEmail').val();
            let loginPassword = $('#loginPassword').val();

            if(!loginEmail || !loginPassword) {
                alert('All feild require');
                return;
            }
            
            $.ajax({
                url: "functions/code.php",
                method: "POST",
                data: {
                    login: true,
                    loginEmail: loginEmail,
                    loginPassword: loginPassword

                },
                success: function(response){
                    response = response.trim(); 

                    if(response == "Login SuccessFully") {
                        alert(response);
                        window.location.href = "index.php";
                    }else {
                        alert(response);
                    }
                }    
            })
        })
    </script>
</body>
</html>