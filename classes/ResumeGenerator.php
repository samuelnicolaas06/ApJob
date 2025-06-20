<?php
use Dompdf\Dompdf;

class ResumeGenerator {
    private $dompdf;
    
    public function __construct() {
        $this->dompdf = new Dompdf();
    }
    
    /**
     * Gera o HTML do currículo baseado no template
     */
    public function generateHTML($data, $template) {
        $templateFile = "templates/{$template}.php";
        
        if (!file_exists($templateFile)) {
            throw new Exception("Template não encontrado: {$template}");
        }
        
        ob_start();
        extract($data);
        include $templateFile;
        $html = ob_get_clean();
        
        return $html;
    }
    
    /**
     * Gera a pré-visualização do currículo
     */
    public function generatePreview($data, $template) {
        $previewFile = "templates/preview/{$template}_preview.php";
        
        if (!file_exists($previewFile)) {
            throw new Exception("Template de preview não encontrado: {$template}");
        }
        
        ob_start();
        extract($data);
        include $previewFile;
        $preview = ob_get_clean();
        
        return $preview;
    }
    
    /**
     * Gera e baixa o PDF
     */
    public function generatePDF($data, $template) {
        try {
            $html = $this->generateHTML($data, $template);
            
            $this->dompdf->loadHtml($html);
            $this->dompdf->setPaper(PDF_PAPER_SIZE, PDF_ORIENTATION);
            $this->dompdf->render();
            
            $filename = "curriculo_" . $this->sanitizeFilename($data['name']) . ".pdf";
            $this->dompdf->stream($filename, ["Attachment" => true]);
            
        } catch (Exception $e) {
            throw new Exception("Erro ao gerar PDF: " . $e->getMessage());
        }
    }
    
    /**
     * Sanitiza o nome do arquivo
     */
    private function sanitizeFilename($filename) {
        return preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename);
    }
    
    /**
     * Valida os dados do formulário
     */
    public function validateData($data) {
        $errors = [];
        
        if (empty($data['name'])) {
            $errors[] = "Nome é obrigatório";
        }
        
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email válido é obrigatório";
        }
        
        return $errors;
    }
}