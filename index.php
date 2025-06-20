<?php
require_once 'config/config.php';
require_once 'classes/ResumeGenerator.php';

$resumeGenerator = new ResumeGenerator();
$data = [];
$generated = false;
$selected_template = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST recebido: " . print_r($_POST, true));
    
    $data = [
        'name' => htmlspecialchars($_POST['name'] ?? ''),
        'email' => htmlspecialchars($_POST['email'] ?? ''),
        'phone' => htmlspecialchars($_POST['phone'] ?? ''),
        'address' => htmlspecialchars($_POST['address'] ?? ''),
        'objective' => htmlspecialchars($_POST['objective'] ?? ''),
        'education' => htmlspecialchars($_POST['education'] ?? ''),
        'experience' => htmlspecialchars($_POST['experience'] ?? ''),
        'skills' => htmlspecialchars($_POST['skills'] ?? ''),
        'languages' => htmlspecialchars($_POST['languages'] ?? '')
    ];
    
    $selected_template = $_POST['template'] ?? null;
    $generated = $selected_template !== null;

    if (isset($_POST['generate_pdf']) && $selected_template) {
        error_log("Tentando gerar PDF com template: $selected_template");
        try {
            $resumeGenerator->generatePDF($data, $selected_template);
            exit;
        } catch (Exception $e) {
            error_log("Erro no generatePDF: " . $e->getMessage());
            echo "Erro ao gerar PDF: " . htmlspecialchars($e->getMessage());
            exit;
        }
    } else {
        error_log("generate_pdf não definido ou template ausente");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Main">
        <h1>Gerador de Currículo</h1>
        <h2>Está em busca do emprego dos seus sonhos? 
            <p>Nosso gerador de currículos online é rápido, fácil de usar e totalmente gratuito.</h2>
        <button onclick="document.getElementById('sobre').scrollIntoView({ behavior: 'smooth' })" type="submit" class="btn btn-success btn-lg">Iniciar</button>
    </div>
    
    <div class="container mt-5" id="sobre">
        <div class="row">
            <div class="col-md-12">
                
                
                <?php include 'includes/form.php'; ?>
                
                <?php if ($generated): ?>
                    <div class="mt-5">
                        <h2 class="mb-4">Pré-visualização do Currículo</h2>
                        <div class="preview-container">
                            <?php echo $resumeGenerator->generatePreview($data, $selected_template); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>