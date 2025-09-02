<?php
include 'db.php';

$sql = "SELECT * FROM nicholas_records";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
         table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            background: #fafbfc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(44,62,80,0.04);
            table-layout: fixed; /* Ensures table fits container */
        }
        th, td {
            border: 1px solid #e0e0e0;
            padding: 12px 10px;
            text-align: left;
            font-size: 1rem;
            word-wrap: break-word; /* Prevents overflow */
        }
        .container {
            max-width: 950px;
            margin: 40px auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            padding: 32px 24px 24px 24px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 18px;
            letter-spacing: 1px;
        }
        .add-btn {
            display: inline-block;
            background: #218c3a;
            color: #fff;
            padding: 10px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 18px;
            transition: background 0.2s;
        }
        .add-btn:hover {
            background: #18632a;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            background: #fafbfc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(44,62,80,0.04);
        }
        th, td {
            border: 1px solid #e0e0e0;
            padding: 12px 10px;
            text-align: left;
            font-size: 1rem;
        }
        th {
            background: #f2f2f2;
            color: #34495e;
            font-weight: 700;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .delete-btn {
            background: #c0392b;
            color: #fff;
            padding: 7px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            border: none;
            transition: background 0.2s;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #922b1a;
        }
        .no-records {
            text-align: center;
            color: #888;
            font-size: 1.1rem;
            margin-top: 30px;
        }
        @media (max-width: 700px) {
            .container {
                padding: 12px 2vw 12px 2vw;
            }
            table, th, td {
                font-size: 0.95rem;
            }
            th, td {
                padding: 8px 4px;
            }
        }
        @media (max-width: 500px) {
            .container {
                padding: 8px 0 8px 0;
            }
            h2 {
                font-size: 1.2rem;
            }
            .add-btn {
                padding: 8px 10px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>
        <a class="add-btn" href="index.php">+ Add New Student</a>
        <?php
        if ($result && $result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Matric Number</th>
                        <th>Action</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".htmlspecialchars($row["id"])."</td>
                        <td>".htmlspecialchars($row["full_name"])."</td>
                        <td>".htmlspecialchars($row["email"])."</td>
                        <td>".htmlspecialchars($row["department"])."</td>
                        <td>".htmlspecialchars($row["matric_number"])."</td>
                        <td>
                            <a class='delete-btn' href='delete.php?id=".urlencode($row["id"])."' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='no-records'>No students registered.</div>";
        }
        ?>
    </div>
</body>
</html>