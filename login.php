<?php
// Obtiene los datos enviados por el formulario html
$username = $_POST['username'];
$password = $_POST['password'];

// Verifica si el usuario y contraseña son correctos
if ($username === 'admin' && $password === 'admin') {
  // Si son correctos
  header("Location: htmlseleccion.html");
  exit;
} else {
  // Si son incorrectos
  header("Location: index.html?error=1");
  exit;
}
?>