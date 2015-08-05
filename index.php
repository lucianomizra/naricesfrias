<?php 
    // Bienvenido a nuestro codigo fuente. NaricesFrias.Org
    // Asi nos desenvolvemos:
    define('VERSION', '0.1.0');
    define('URL', '//localhost/naricesfrias/');
    define('BASE', '/');
    
    // Este es nuestro entorno:
    define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

    switch (ENVIRONMENT)
    {
        case 'development':
            error_reporting(-1);
            ini_set('display_errors', 1);
        break;

        case 'testing':
        case 'production':
            ini_set('display_errors', 0);
            if (version_compare(PHP_VERSION, '5.3', '>='))
            {
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
            }
            else
            {
                error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
            }
        break;

        default:
            header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
            echo 'The application environment is not set correctly.';
            exit(1); // EXIT_ERROR
    }

    // Las carpetas del sistema

    define('PATH', getcwd () .'/');
    define('COREPATH', PATH.'core/');
    define('CTSPATH', 'controllers/');
    define('MDSPATH', 'models/');
    define('VWSPATH', 'views/');
    define('MODULESPATH', 'modules/');
    define('UPLOADSPATH', PATH.'uploads/');

    define('ASSETS', URL.'assets/');

    // Las rutas a definir
    require_once('routes.php');
    require_once(COREPATH.'Bootstrap.php');

?>