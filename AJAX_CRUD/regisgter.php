<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .form-switch {
            background: #667eea;
            color: white;
            border: none;
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
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
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

        .spinner {
            display: none;
            margin-left: 10px;
        }
    </style>
</head>
<body class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="form-container p-5 fade-in">
                    <!-- Register Form -->
                    <div id="registerForm">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">Create Account</h2>
                            <p class="text-muted">Please fill in the details to register</p>
                        </div>
                        
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="First name">
                                    <div class="invalid-feedback">First name is required.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Last name">
                                    <div class="invalid-feedback">Last name is required.</div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="registerEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="registerEmail" placeholder="Enter your email">
                                <div class="invalid-feedback">Valid email is required.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="registerPhone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="registerPhone" placeholder="Enter your phone number" pattern="[0-9]{10}" >
                                <div class="invalid-feedback">Valid 10-digit phone number is required.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="registerPassword" placeholder="Create a password">
                                <div class="invalid-feedback">Password is required.</div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3" id="submit">
                                Create Account
                                <span class="spinner-border spinner-border-sm spinner" role="status" aria-hidden="true"></span>
                            </button>
                            
                            <div class="text-center">
                                <p class="text-muted">
                                    Already have an account? 
                                    <a href="login.php" class="btn btn-link p-0 form-switch">Sign in</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '#submit', function() {
            let firstName = $('#firstName').val();
            let lastName = $('#lastName').val();
            let fullName = firstName + ' ' + lastName;
            let registerEmail = $('#registerEmail').val();
            let registerPhone = $('#registerPhone').val();
            let registerPassword = $('#registerPassword').val();

            if(!firstName || !lastName || !registerEmail || !registerPhone || !registerPassword) {
                alert('All feild require');
                return;
            }

            $.ajax({
                url: "functions/code.php",
                method: "POST",
                data: {
                    register: true,
                    fullName: fullName,
                    registerEmail: registerEmail,
                    registerPhone: registerPhone,
                    registerPassword: registerPassword
                },
                success: function(response) {
                    response = response.trim(); 

                    if(response == "Registered SuccessFully") {
                        alert(response);
                        window.location.href = "login.php";
                    }else {
                        alert(response);
                    }
                },
            });

        });
    </script>
</body>
</html>