<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('image.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }
        .overlay {
            min-height: 100vh;
            width: 100vw;
            background: rgba(255,255,255,0.75);
            position: absolute;
            top: 0; left: 0;
            z-index: 1;
        }
        .center-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            position: relative;
            z-index: 2;
        }
        .form-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 24px 20px 16px 20px;
            border: 1px solid #ccc;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
        }
        
        h3 {
            text-align: center;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 18px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 0;
            border: 1px solid #bbb;
            border-radius: 5px;
            font-size: 1rem;
            background: #f7f7f7;
            transition: border 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus {
            border: 1.5px solid #2980b9;
            outline: none;
        }
        button {
            padding: 10px 0;
            background: #218c3a;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        button:hover {
            background: #18632a;
        }
        a {
            display: block;
            margin-top: 18px;
            text-align: center;
            color: #1a237e;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        a:hover {
            color: #0d47a1;
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .form-wrapper {
                max-width: 95vw;
                padding: 16px 5vw 12px 5vw;
            }
            h1 { font-size: 1.5rem; }
            h2 { font-size: 1.1rem; }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="center-container">
        <div class="form-wrapper">
            <h3>Register a Student</h3>
            <form action="process.php" method="post" autocomplete="off">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="department" placeholder="Department" required>
                <input type="text" name="matric_number" placeholder="Matric Number" required>
                <button type="submit">Register</button>
            </form>
            <a href="view.php">View Registered Students</a>
        </div>
    </div>
</body>
</html>