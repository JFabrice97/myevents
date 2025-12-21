
const lastName = document.getElementById('lastName');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPassword = document.getElementById('conf_pass');
const birthDate = document.getElementById('birthdate');
const sexe = document.getElementById('sex');
const passwordError = document.getElementById('birthdate');

loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    let isValid = true;

    // Validate email
    if (!emailInput.value.trim()) {
        emailError.textContent = 'Veuillez entrer votre adresse e-mail';
        emailError.style.display = 'block';
        isValid = false;
    } else if (!isValidEmail(emailInput.value)) {
        emailError.textContent = 'Votre adresse e-mail n\'est pas valide';
        emailError.style.display = 'block';
        isValid = false;
    } else {
        emailError.style.display = 'none';
    }

    // Validate password
    if (!passwordInput.value.trim()) {
        passwordError.textContent = 'veuillez entrer votre mot de passe';
        passwordError.style.display = 'block';
        isValid = false;
    } else {
        passwordError.style.display = 'none';
    }
});

// Email validation function
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Clear errors on input
emailInput.addEventListener('input', function() {
    emailError.style.display = 'none';
});

passwordInput.addEventListener('input', function() {
    passwordError.style.display = 'none';
});