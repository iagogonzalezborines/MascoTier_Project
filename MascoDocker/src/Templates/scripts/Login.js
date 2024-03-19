let form = document.getElementById("form");
    form.addEventListener("submit",(e)=>{
        e.preventDefault();
        let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controller/login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                console.log(response);
                if (response.success) {
                    // Credenciales válidas, redireccionar o realizar alguna acción
                    window.location.href = 'carerList.php';
                } else {
                    // Credenciales inválidas, mostrar mensaje de error
                    document.getElementById('error-message').innerText = response.message;
                }
            } else {
                // Error al realizar la solicitud AJAX
                console.error('Error en la solicitud AJAX');
            }
        }
    }
    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
    })