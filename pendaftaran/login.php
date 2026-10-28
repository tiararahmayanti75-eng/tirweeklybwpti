<?php
session_start();

// Jika admin sudah login sebelumnya, langsung dialihkan ke halaman admin
// HAPUS SEMENTARA BAGIAN INI:
if (isset($_SESSION['login_admin'])) {
    header("Location: admin.php");
    exit;
}

// SILAHKAN ATUR USERNAME & PASSWORD ADMIN DI BAWAH INI:
$username_admin = "admin";
$password_admin = "kalihaksa123";

$error = false;

if (isset($_POST['login'])) {
    $user_input = $_POST['username'];
    $pass_input = $_POST['password'];

    // Cek apakah username dan password cocok
    if ($user_input === $username_admin && $pass_input === $password_admin) {
        // Set session tanda sukses login
        $_SESSION['login_admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kalihaksa</title>
    <style>
        /* TEMA PINK SOFT & MARUN ESTETIK */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fce4ec; /* Background Pink Soft */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff; /* Box Putih Bersih */
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(136, 14, 79, 0.08);
            box-sizing: border-box;
        }

        .login-box h2 {
            color: #880e4f; /* Warna Marun Gelap */
            text-align: center;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 26px;
            font-weight: 600;
        }

        .login-box p {
            color: #ad1457;
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 14px;
            font-style: italic;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #4a148c;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #e1bee7;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
            outline: none;
            background-color: #fff;
        }

        .form-group input:focus {
            border-color: #ba68c8;
            box-shadow: 0 0 5px rgba(186, 104, 200, 0.3);
        }

        .error-msg {
            color: #d32f2f;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 500;
        }

        .btn-login {
            background-color: #9c27b0; /* Ungu/Marun Cantik */
            color: white;
            border: none;
            padding: 12px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            font-size: 15px;
            margin-top: 10px;
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background-color: #880e4f;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Counseling</h2>
    <p>Admin Login Page</p>

    <?php if ($error) : ?>
        <div class="error-msg">Username atau Password salah!</div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" name="login" class="btn-login">Masuk Aplikasi</button>
    </form>
</div>

</body>
</html>