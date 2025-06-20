<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Currículo - <?php echo $name; ?></title>
    <style>
        /* Estilos gerais */
        body { 
            font-family: Arial, sans-serif;
            margin: 20px;
            max-width: 800px;
            line-height: 1.6;
            color: #333;
        }
        
        h1 { 
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 10px;
            text-align: center;
            border-bottom: 3px solid #2c3e50;
            padding-bottom: 10px;
        }
        
        .contact-info {
            text-align: center;
            margin-bottom: 30px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        .contact-info p {
            margin: 5px 0;
            font-size: 14px;
        }
        
        h2 { 
            color: #34495e;
            font-size: 18px;
            border-bottom: 2px solid #34495e;
            margin: 25px 0 15px;
            padding-bottom: 5px;
        }
        
        p { 
            font-size: 14px;
            line-height: 1.6;
            margin: 10px 0;
            text-align: justify;
        }
        
        .section { 
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        
        strong { 
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <h1><?php echo $name; ?></h1>
    
    <div class="contact-info">
        <?php if (!empty($email)): ?>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
        <?php endif; ?>
        <?php if (!empty($phone)): ?>
            <p><strong>Telefone:</strong> <?php echo $phone; ?></p>
        <?php endif; ?>
        <?php if (!empty($address)): ?>
            <p><strong>Endereço:</strong> <?php echo $address; ?></p>
        <?php endif; ?>
    </div>
    
    <?php if (!empty($objective)): ?>
    <div class="section">
        <h2>Objetivo Profissional</h2>
        <p><?php echo nl2br($objective); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($experience)): ?>
    <div class="section">
        <h2>Experiência Profissional</h2>
        <p><?php echo nl2br($experience); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($education)): ?>
    <div class="section">
        <h2>Formação Acadêmica</h2>
        <p><?php echo nl2br($education); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($skills)): ?>
    <div class="section">
        <h2>Habilidades</h2>
        <p><?php echo nl2br($skills); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($languages)): ?>
    <div class="section">
        <h2>Idiomas</h2>
        <p><?php echo nl2br($languages); ?></p>
    </div>
    <?php endif; ?>
</body>
</html>