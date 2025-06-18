<?php
require 'vendor/autoload.php'; // Carrega a biblioteca DomPDF

use Dompdf\Dompdf;

// Inicializa variáveis para evitar erros
$nome = $email = $telefone = $endereco = $objetivo = $formacao = $experiencia = $habilidades = '';
$gerado = false;

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $telefone = htmlspecialchars($_POST['telefone'] ?? '');
    $endereco = htmlspecialchars($_POST['endereco'] ?? '');
    $objetivo = htmlspecialchars($_POST['objetivo'] ?? '');
    $formacao = htmlspecialchars($_POST['formacao'] ?? '');
    $experiencia = htmlspecialchars($_POST['experiencia'] ?? '');
    $habilidades = htmlspecialchars($_POST['habilidades'] ?? '');
    $gerado = true;

    // Geração do PDF se solicitado
    if (isset($_POST['gerar_pdf'])) {
        $dompdf = new Dompdf();
        $html = <<<EOD
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Currículo</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { color: #2c3e50; }
                h2 { color: #34495e; border-bottom: 1px solid #34495e; }
                p, li { font-size: 14px; line-height: 1.5; }
                .section { margin-bottom: 20px; }
            </style>
        </head>
        <body>
            <h1>$nome</h1>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Telefone:</strong> $telefone</p>
            <p><strong>Endereço:</strong> $endereco</p>
            <div class="section">
                <h2>Objetivo</h2>
                <p>$objetivo</p>
            </div>
            <div class="section">
                <h2>Formação</h2>
                <p>$formacao</p>
            </div>
            <div class="section">
                <h2>Experiência Profissional</h2>
                <p>$experiencia</p>
            </div>
            <div class="section">
                <h2>Habilidades</h2>
                <p>$habilidades</p>
            </div>
        </body>
        </html>
EOD;
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("curriculo_$nome.pdf", ["Attachment" => true]);
        exit;
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
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gerador de Currículo</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco; ?>">
            </div>
            <div class="mb-3">
                <label for="objetivo" class="form-label">Objetivo Profissional</label>
                <textarea class="form-control" id="objetivo" name="objetivo" rows="4"><?php echo $objetivo; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="formacao" class="form-label">Formação Acadêmica</label>
                <textarea class="form-control" id="formacao" name="formacao" rows="4"><?php echo $formacao; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="experiencia" class="form-label">Experiência Profissional</label>
                <textarea class="form-control" id="experiencia" name="experiencia" rows="4"><?php echo $experiencia; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="habilidades" class="form-label">Habilidades</label>
                <textarea class="form-control" id="habilidades" name="habilidades" rows="4"><?php echo $habilidades; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gerar Currículo</button>
            <button type="submit" class="btn btn-success" name="gerar_pdf">Baixar PDF</button>
        </form>

        <?php if ($gerado): ?>
        <div class="mt-5">
            <h2>Pré-visualização do Currículo</h2>
            <div class="card">
                <div class="card-body">
                    <h1><?php echo $nome; ?></h1>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
                    <p><strong>Endereço:</strong> <?php echo $endereco; ?></p>
                    <h2>Objetivo</h2>
                    <p><?php echo nl2br($objetivo); ?></p>
                    <h2>Formação</h2>
                    <p><?php echo nl2br($formacao); ?></p>
                    <h2>Experiência Profissional</h2>
                    <p><?php echo nl2br($experiencia); ?></p>
                    <h2>Habilidades</h2>
                    <p><?php echo nl2br($habilidades); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>