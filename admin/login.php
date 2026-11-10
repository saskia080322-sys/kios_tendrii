<?php
session_start();
include '../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $cek = mysqli_query($conn, "SELECT * FROM db_admin WHERE username = '$user' AND password = '$pass'");
    
    if (mysqli_num_rows($cek) == 1) {
        $_SESSION['admin_login'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Admin — Kios Tendri</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        body {
            background: #FAF7F0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            text-align: center;
            color: #0F5132;
            margin-bottom: 25px;
        }
        .error {
            background: #fdecea;
            color: #c0392b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #333;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
        }
        input:focus {
            outline: none;
            border-color: #27ae60;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #0F5132;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🔐 Login Admin</h2>
    <?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>
        
        <label>Password</label>
        <input type="password" name="password" required>
        
        <button type="submit">Masuk</button>
    </form>
</div>

</body>
</html>