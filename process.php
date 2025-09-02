<?php
include 'db.php';

function show_message($message, $success = true) {
    $color = $success ? "#218c3a" : "#c0392b";
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration Status</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f4f6f8;
                margin: 0;
                padding: 0;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .status-container {
                background: #fff;
                border-radius: 10px;
                box-shadow: 0 2px 16px rgba(0,0,0,0.08);
                padding: 32px 28px 24px 28px;
                max-width: 400px;
                width: 100%;
                text-align: center;
                border-top: 6px solid ' . $color . ';
            }
            .status-message {
                color: ' . $color . ';
                font-size: 1.2rem;
                font-weight: 600;
                margin-bottom: 18px;
            }
            a {
                display: inline-block;
                margin: 8px 6px 0 6px;
                padding: 8px 18px;
                background: #218c3a;
                color: #fff;
                border-radius: 5px;
                text-decoration: none;
                font-weight: 500;
                transition: background 0.2s;
            }
            a:hover {
                background: #18632a;
            }
            @media (max-width: 600px) {
                .status-container {
                    max-width: 95vw;
                    padding: 18px 5vw 12px 5vw;
                }
            }
        </style>
    </head>
    <body>
        <div class="status-container">
            <div class="status-message">' . $message . '</div>
            <a href="index.php">Register Another</a>
            <a href="view.php">View Students</a>
        </div>
    </body>
    </html>
    ';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric_number = trim($_POST['matric_number']);

    // Validation
    if (empty($full_name) || empty($email) || empty($department) || empty($matric_number)) {
        show_message("All fields are required.", false);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        show_message("Invalid email format.", false);
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO nicholas_records (full_name, email, department, matric_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

    if ($stmt->execute()) {
        show_message("Student registered successfully!");
    } else {
        show_message("Error: " . htmlspecialchars($stmt->error), false);
    }

    $stmt->close();
    $conn->close();
}
?>