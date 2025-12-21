<?php
// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $lastName = htmlspecialchars($_POST["lastName"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $sex = htmlspecialchars($_POST["sex"]);
    $birthdate = htmlspecialchars($_POST["birthdate"]);
    
    // Here you would typically:
    // 1. Perform additional validation
    // 2. Connect to database
    // 3. Insert data into database
    // 4. Redirect or show success message
    
    // For demo purposes, just display the received data
    echo "<div class='success-message'>";
    echo "<h3>Registration Successful!</h3>";
    echo "<p>Last Name: $lastName</p>";
    echo "<p>First Name: $firstName</p>";
    echo "<p>Sex: $sex</p>";
    echo "<p>Birthdate: $birthdate</p>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        <?php if(file_exists("views/signup/style.css")){ echo file_get_contents("views/signup/style.css"); } ?>
    </style>
</head>
<body>
    <div class="container">
        <h2>Créer votre compte</h2>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="lastName">Nom:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            
            <div class="form-group">
                <label for="firstName">Prénom:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            
            <div class="form-group">
                <label for="sex">Sexe:</label>
                <select id="sex" name="sex" required>
                    <option value=""></option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                    <option value="A">Autre</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="birthdate">Date de naissance:</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="conf_pass">Confirmer mot de passe:</label>
                <input type="password" id="conf_pass" name="conf_pass" required>
            </div>
            <div class="display-inline">
                <button type="submit">S'inscrire</button>
                <button><a href="connexion">Annuler</a></button>
            </div>
        </form>
    </div>    
    <script>        
        <?php if(file_exists("views/signup/script.js")){ echo file_get_contents("views/signup/script.js"); } ?>
    </script>