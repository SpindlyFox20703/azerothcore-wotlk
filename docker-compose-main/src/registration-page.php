<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzerothCore WotLK - Account Registration</title>
    <style>
        :root {
            --warcraft-blue: #0066cc;
            --warcraft-gold: #ffcc00;
            --dark-bg: #121212;
            --light-bg: #1e1e1e;
            --text-color: #e0e0e0;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--dark-bg);
            background-image: url('https://placehold.co/1920x1080/0066cc/121212?text=Azeroth');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--text-color);
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            background-color: rgba(30, 30, 30, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--warcraft-gold);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo img {
            max-width: 200px;
            height: auto;
        }
        
        h1 {
            color: var(--warcraft-gold);
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-color);
            font-size: 16px;
            transition: all 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: var(--warcraft-blue);
            box-shadow: 0 0 5px rgba(0, 102, 204, 0.5);
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        button {
            background-color: var(--warcraft-blue);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        button:hover {
            background-color: #0055aa;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        
        .requirements {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }
        
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
        
        .error {
            background-color: var(--error-color);
            color: white;
        }
        
        .success {
            background-color: var(--success-color);
            color: white;
        }
        
        .password-strength {
            height: 5px;
            background-color: #ddd;
            margin-top: 5px;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .strength-bar {
            height: 100%;
            width: 0%;
            background-color: var(--error-color);
            transition: all 0.3s;
        }
        
        .strength-1 { background-color: var(--error-color); width: 25%; }
        .strength-2 { background-color: #f39c12; width: 50%; }
        .strength-3 { background-color: #f1c40f; width: 75%; }
        .strength-4 { background-color: var(--success-color); width: 100%; }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .login-link a {
            color: var(--warcraft-gold);
            text-decoration: none;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://placehold.co/300x100/0066cc/FFFFFF?text=AzerothCore&font=playfair" alt="AzerothCore WotLK Server Logo">
        </div>
        
        <h1>Create Your Account</h1>
        
        <?php
        // Define database connection parameters
        $dbhost = 'localhost';
        $dbuser = 'acore';
        $dbpass = 'acore';
        $dbname = 'acore_auth';
        
        // Initialize variables
        $messages = [];
        $username = $email = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize inputs
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            
            // Validate inputs
            $valid = true;
            
            if (empty($username)) {
                $messages[] = ['type' => 'error', 'text' => 'Username is required'];
                $valid = false;
            } elseif (strlen($username) < 3 || strlen($username) > 16) {
                $messages[] = ['type' => 'error', 'text' => 'Username must be between 3 and 16 characters'];
                $valid = false;
            } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                $messages[] = ['type' => 'error', 'text' => 'Username can only contain letters and numbers'];
                $valid = false;
            }
            
            if (empty($email)) {
                $messages[] = ['type' => 'error', 'text' => 'Email is required'];
                $valid = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $messages[] = ['type' => 'error', 'text' => 'Invalid email format'];
                $valid = false;
            }
            
            if (empty($password)) {
                $messages[] = ['type' => 'error', 'text' => 'Password is required'];
                $valid = false;
            } elseif (strlen($password) < 8) {
                $messages[] = ['type' => 'error', 'text' => 'Password must be at least 8 characters'];
                $valid = false;
            } elseif ($password !== $password_confirm) {
                $messages[] = ['type' => 'error', 'text' => 'Passwords do not match'];
                $valid = false;
            }
            
            // If validation passes, attempt to create account
            if ($valid) {
                try {
                    // Connect to database
                    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // Check if username exists
                    $stmt = $conn->prepare("SELECT id FROM account WHERE username = :username");
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();
                    
                    if ($stmt->rowCount() > 0) {
                        $messages[] = ['type' => 'error', 'text' => 'Username already exists'];
                    } else {
                        // Check if email exists
                        $stmt = $conn->prepare("SELECT id FROM account WHERE email = :email");
                        $stmt->bindParam(':email', $email);
                        $stmt->execute();
                        
                        if ($stmt->rowCount() > 0) {
                            $messages[] = ['type' => 'error', 'text' => 'Email already in use'];
                        } else {
                            // Hash password using SRP6 for AzerothCore
                            $salt = random_bytes(32);
                            $verifier = hash('sha256', strtoupper($username) . ':' . strtoupper($password));
                            $verifierHash = hash('sha256', $salt . $verifier, true);
                            
                            // Convert to hex for database
                            $saltHex = bin2hex($salt);
                            $verifierHex = bin2hex($verifierHash);
                            
                            // Insert new account
                            $stmt = $conn->prepare("
                                INSERT INTO account (username, salt, verifier, email, reg_mail, expansion)
                                VALUES (:username, :salt, :verifier, :email, :email, 2)
                            ");
                            
                            $stmt->bindParam(':username', $username);
                            $stmt->bindParam(':salt', $saltHex);
                            $stmt->bindParam(':verifier', $verifierHex);
                            $stmt->bindParam(':email', $email);
                            
                            if ($stmt->execute()) {
                                $messages[] = ['type' => 'success', 'text' => 'Account created successfully! You can now log in.'];
                                $username = $email = ''; // Clear form
                            } else {
                                $messages[] = ['type' => 'error', 'text' => 'Error creating account. Please try again.'];
                            }
                        }
                    }
                    
                } catch(PDOException $e) {
                    $messages[] = ['type' => 'error', 'text' => 'Database error: ' . $e->getMessage()];
                }
            }
        }
        
        // Display messages
        foreach ($messages as $message) {
            echo '<div class="message ' . $message['type'] . '">' . $message['text'] . '</div>';
        }
        ?>
        
        <form id="registrationForm" method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                <div class="requirements">3-16 characters, letters and numbers only</div>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <div class="password-strength">
                    <div class="strength-bar" id="strengthBar"></div>
                </div>
                <div class="requirements">Minimum 8 characters</div>
            </div>
            
            <div class="form-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" required>
            </div>
            
            <button type="submit">Create Account</button>
        </form>
        
        <div class="login-link">
            Already have an account? <a href="login.php">Log in here</a>
        </div>
    </div>

    <script>
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strengthBar');
            let strength = 0;
            
            if (password.length > 0) strength += 1;
            if (password.length >= 8) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength += 1;
            
            strengthBar.className = 'strength-bar';
            if (strength > 0) {
                strengthBar.classList.add('strength-' + strength);
            }
        });
        
        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirm').value;
            
            if (password !== confirm) {
                e.preventDefault();
                alert('Passwords do not match!');
                document.getElementById('password').focus();
            }
            
            const username = document.getElementById('username').value;
            if (!/^[a-zA-Z0-9]+$/.test(username)) {
                e.preventDefault();
                alert('Username can only contain letters and numbers');
                document.getElementById('username').focus();
            }
        });
    </script>
</body>
</html>
