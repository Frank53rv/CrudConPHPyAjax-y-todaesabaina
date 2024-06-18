<?php
// Configuración de reportes de errores
if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
    // En entorno de desarrollo, mostrar todos los errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    // En entorno de producción, no mostrar notificaciones ni advertencias
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set('display_errors', 0);
    // Puedes configurar aquí para registrar los errores en un archivo de log
    ini_set('log_errors', 1);
    ini_set('error_log', '/path/to/your/error.log');
}
?>
