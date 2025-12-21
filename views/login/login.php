<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page connexion</title>
    <link rel="stylesheet" href="views/login/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Bienvenue</h1>
            <p>Veuillez entrer vos informations pour vous connecter</p>
        </div>
        <form id="login-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email" required>
                <div class="error-message" id="email-error"></div>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" placeholder="Enter your password" required>
                <div class="error-message" id="password-error"></div>
            </div>
            <div class="remember-forgot">
                <div class="remember">
                    <input type="checkbox" id="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <a href="#" class="forgot-password">Mot de passe oublié?</a>
            </div>
            <button type="submit" class="login-button">Connecter</button>
        </form>
        <div class="signup">
            <p>Vous n'avez pas de compte? <a href="inscription">Inscrivez vous?</a></p>
        </div>
        <div style="margin-top: 2px;">
            <div class="google-signin">
                <p>Ou connectez-vous avec Google</p>
            </div>
            <!-- g_id_onload contains Google Identity Services settings -->
            <div
                id="g_id_onload"
                data-auto_prompt="false"
                data-context="signing"
                data-login_uri="myplan/index.php"
                data-client_id="129059625998-neoc7u2ieh8o23n3ejtrc1tc84d0ln0g.apps.googleusercontent.com"
            ></div>
            <!-- g_id_signin places the button on a page and supports customization -->
            <div class="g_id_signin"></div>
        </div>
    </div>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <script src="./views/js/script.js"></script>
    <script src="views/login/script.js"></script>
</body>
</html>
