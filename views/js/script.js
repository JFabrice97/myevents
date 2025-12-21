function ajaxRequest(url_action, method = 'POST', data='', async = true) {
    if (typeof url_action !== 'string' || url_action.trim() === '') {
      console.error('url_action invalide');
      return null;
    }
    console.log(data);
    const xhr = new XMLHttpRequest();
    xhr.open(method, '/myplan/controller/ajax.php?action='+encodeURIComponent(url_action)+"&data="+encodeURIComponent(JSON.stringify(data)), async);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/json');
  
    xhr.onload = () => {
        console.log(xhr);
      console.log('Réponse serveur:', xhr.responseText);
    };
  
    xhr.onerror = () => {
      console.error('Erreur AJAX');
    };
    console.log('data', data);
    xhr.send();
  
    return xhr;
  }
  
// create a ajax request to save the user in the database
function saveUserToDatabase(user, is_conn_google=false) {
    if(user === null) {
        console.error('User data is invalid');
        return;
    }
    let data = {};
    if(is_conn_google) {
        data = user;
    }else{
        data = {
            email: user.email ?? '',
            last_name: user.family_name ?? '',
            first_namee: user.given_name ?? '',
            password: user.password ?? '',
            birth_date: user.birthdate ?? '',
            sex : user.sex ?? '',
            is_user_google: is_conn_google,
            id_google: user.sub ?? '',
        };
        data = Object.entries(data).map(([key, value]) => `${key}=${encodeURIComponent(value)}`).join('&');
    }
    ajaxRequest('save_user_data', 'POST', data, true);
}

function getValueFromInput(inputId) {
    const inputElement = document.getElementById(inputId);
    if (inputElement) {
        return inputElement.value.trim();
    }
    return '';
}