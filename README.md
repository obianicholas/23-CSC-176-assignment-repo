# Obia Nicholas Ogbogo
# 23/CSC/176
# CSC 282
# Registration system


## Setup Instructions

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd nicholas_system
   ```

2. **Create a MySQL database**:
   Create a database named `nicholas_system` and a table named `nicholas_records` with the following structure:
   ```sql
   CREATE TABLE nicholas_records (
       id INT AUTO_INCREMENT PRIMARY KEY,
       full_name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       department VARCHAR(100) NOT NULL,
       matric_number VARCHAR(50) NOT NULL
   );
   ```

3. **Configure the database connection**:
   Edit the `src/config/db.php` file to include your database credentials:
   ```php
   <?php
   $host = 'localhost';
   $db   = 'student_registration';
   $user = 'your_username';
   $pass = 'your_password';
   $charset = 'utf8mb4';

   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   $options = [
       PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES   => false,
   ];

   try {
       $pdo = new PDO($dsn, $user, $pass, $options);
   } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }
   ```

4. **Run the application**:
   Open `index.php` in your web browser to access the registration form. Fill in the details and submit to register a student.

