<?php
// Configurações do projeto
define('PROJECT_NAME', 'Gerador de Currículo');
define('PROJECT_VERSION', '1.0.0');

// Configurações de PDF
define('PDF_ORIENTATION', 'portrait');
define('PDF_PAPER_SIZE', 'A4');

// Autoload do Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Templates disponíveis
define('AVAILABLE_TEMPLATES', [
    'standard' => 'Padrão',
    'template2' => 'Modelo 2 - Moderno',
    'template3' => 'Modelo 3 - Lateral'
]);

// Configurações de erro
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>