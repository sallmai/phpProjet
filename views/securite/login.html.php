<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projet</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-6T6dY1vnQQFbXafmZQ1MYA6+QH0XZ4z7RZywD1e/XEqVf+nF1aMdqsmZ7Ll/jM5G1r7R57bM+Z0ZbpvF6msBBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login_container">
        <h2 class="login_heading">Connectez-vous!</h2>
        <form action="" method="post" class="login-form">
            <div class="input-container">
                <i class="fas fa-user"></i>
                <input type="text" name="email" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="input-container">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" name="action" value="form-login">Se connecter</button>
        </form>
    </div>
</body>
</html>
