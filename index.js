function showError() {
    var urlParams = new URLSearchParams(window.location.search);
    var error = urlParams.get('error');
    if (error === '1') {
        alert('Credenciales incorrectas. Por favor, inténtalo de nuevo.');
    }
}