
const loginForm = document.getElementById('login-form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const emailError = document.getElementById('email-error');
const passwordError = document.getElementById('password-error');

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

// Google Sign-In script
function decodeJWT(token) {
                    let base64Url = token.split(".")[1];
    let base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
    let jsonPayload = decodeURIComponent(
    atob(base64)
        .split("")
        .map(function (c) {
        return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
        })
        .join("")
    );
    return JSON.parse(jsonPayload);
}
function handleCredentialResponse(response) {
    console.log("response: ", response );
    // console.log("Encoded JWT ID token: " + response.credential);
    const responsePayload = response.credential;
    // console.log("Decoded JWT ID token fields:");
    // console.log("  Full Name: " + responsePayload.name);
    // console.log("  Given Name: " + responsePayload.given_name);
    // console.log("  Family Name: " + responsePayload.family_name);
    // console.log("  Unique ID: " + responsePayload.sub);
    // console.log("  Profile image URL: " + responsePayload.picture);
    // console.log("  Email: " + responsePayload.email);
    
    saveUserToDatabase(responsePayload, true);
}