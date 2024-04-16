<?php
session_start();

$host = 'localhost';
$db = 'ifoa_blog';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$stmt = $pdo->query("SELECT * FROM posts");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
    <div class="container">
        <a href="http://localhost/pratica-s2-l1-php/register.php" class="<?= isset($_SESSION['user_id']) ? 'd-none' : 'btn btn-primary my-5' ?>">Registrati</a>
        <a href="http://localhost/pratica-s2-l1-php/login.php" class="<?= isset($_SESSION['user_id']) ? 'd-none' : 'btn btn-success my-5' ?>">Login</a>
        <a href="http://localhost/pratica-s2-l1-php/" class="<?= isset($_SESSION['user_id']) ? 'btn btn-danger my-5' :  'd-none' ?>" onclick="<?= session_destroy() ?>">Logout</a>
        <div class="row">
        <?php
         foreach ($stmt as $row) {
         echo "<div class='col-3 my-2'>
         <div class='card h-100 bg-img-book'>
         <div class='card-body'>
         <h5 class='card-title fs-4 mb-4'>$row[title]</h5>
         <h6 class='card-subtitle mb-2 text-body-secondary mb-3'><span class='fw-semibold'>category_id: </span>$row[category_id]</h6>
         <p class='card-text'><span class='fw-semibold'>user_id: </span>$row[user_id]</p>   </div>
     </div>
         </div>";
    };
    ?>
        </div>
    </div>
    
</body>
</html>