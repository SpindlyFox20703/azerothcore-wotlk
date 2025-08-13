<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AzerothCore WotLK - Login</title>
    <meta name="description" content="Login to your AzerothCore World of Warcraft account">
    <style>
        /* Reset and base styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
            background-attachment: fixed;
            min-height: 100vh;
            color: #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-container {
            background: rgba(30, 30, 30, 0.95);
            backdrop-filter: blur(15px);
            border: 2px solid #4a5568;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
            position: relative;
        }
        
        .auth-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3182ce, #805ad5, #d69e2e);
        }
        
        .form-header {
            background: linear-gradient(135deg, #2d3748, #4a5568);
            padding: 24px;
            text-align: center;
            color: #f7fafc;
            border-bottom: 1px solid #4a5568;
        }
        
        .form-header h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #ffd700;
        }
        
        .form-header p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .form-content {
            padding: 32px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #e2e8f0;
        }
        
        .form-input {
            width: 100%;
            background: rgba(45, 55, 72, 0.8);
            border: 2px solid #4a5568;
            color: #f7fafc;
            padding: 14px 16px;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
            background: rgba(45, 55, 72, 0.9);
        }
        
        .form-button {
            width: 100%;
            background: linear-gradient(135deg, #3182ce, #2c5282);
            color: #ffffff;
            border: none;
            padding: 16px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .form-button:hover {
            background: linear-gradient(135deg, #2c5282, #2a4365);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(49, 130, 206, 0.3);
        }
        
        .footer-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #4a5568;
            font-size: 14px;
            color: #a0aec0;
        }
        
        .footer-link a {
            color: #ffd700;
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer-link a:hover {
            text-decoration: underline;
        }
        
        .helper-text {
            font-size: 12px;
            color: #a0aec0;
            margin-top: 4px;
        }
        
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .auth-container {
                max-width: 100%;
            }
            
            .form-content {
                padding: 24px;
            }
            
            .form-header {
                padding: 20px;
            }
            
            .form-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="form-header">
            <h1>AzerothCore</h1>
            <p>Wrath of the Lich King - Login</p>
        </div>
        
        <div class="form-content">
            <form method="post" action="">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           class="form-input" 
                           placeholder="Enter your username" 
                           required
                           autocomplete="username">
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-input" 
                           placeholder="Enter your password" 
                           required
                           autocomplete="current-password">
                </div>
                
                <button type="submit" class="form-button">
                    Login
                </button>
            </form>
            
            <div class="footer-link">
                <p>Don't have an account? <a href="auth.html">Create one here</a></p>
                <p style="margin-top: 8px;"><a href="#">Forgot your password?</a></p>
            </div>
        </div>
    </div>
</body>
</html>