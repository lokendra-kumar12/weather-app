<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

$servername = "localhost"; 

$username = "root"; 

$password = ""; 

$database = "diksha"; 

$conn = mysqli_connect($servername, $username, $password, $database); 

if (!$conn) die("Connection failed: " . mysqli_connect_error()); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    $name = trim($_POST['name'] ?? ''); 

    $email = trim($_POST['email'] ?? ''); 

    $concern = trim($_POST['da'] ?? ''); 

    if ($name && $email && $concern) { 

        $stmt = mysqli_prepare($conn, "INSERT INTO dik (name, email, concern) VALUES (?, ?, ?)"); 

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $concern); 

        mysqli_stmt_execute($stmt); 

        mysqli_stmt_close($stmt); 

        echo '<div style="text-align:center; color:green;">login  successfully!</div>'; 

    } else { 

        echo '<div style="text-align:center; color:red;">Please fill all fields.</div>'; 

    } 

} 

mysqli_close($conn); 

?> 
<div class="container"> 

    <h2>Contact Me</h2> 

    <form action="index.php" method="post"> 

        <div class="mb-3"> 

            <label>Name</label> 

            <input type="text" name="name" required class="form-control"> 

        </div> 

        <div class="mb-3"> 

            <label>Email</label> 

            <input type="email" name="email" required class="form-control"> 

        </div> 

        <div class="mb-3"> 

            <label>Description</label> 

            <textarea name="da" rows="4" required class="form-control"></textarea> 

        </div> 

        <button type="submit" class="btn btn-primary">Submit</button> 

    </form> 

</div> 

    
</body>
</html>