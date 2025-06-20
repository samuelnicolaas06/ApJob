<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Currículo - <?php echo $name; ?></title>
    <style>
        /* Estilos gerais */
        body { 
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }
        
        .header { 
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        
        .header h1 { 
            font-size: 32px;
            margin: 0 0 10px;
            font-weight: 300;
        }
        
        .header p { 
            font-size: 16px;
            margin: 5px 0;
            opacity: 0.9;
        }
        
        .section { 
            background-color: white;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-left: 5px solid #28a745;
        }
        
        .section:last-child {
            border-radius: 0 0 10px 10px;
        }
        
        .section-title { 
            font-size: 22px;
            color: #28a745;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .section p {
            font-size: 15px;
            margin: 10px 0;
            text-align: justify;
        }
        
        .text-muted { 
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?php echo $name; ?></h1>
        <div>
            <?php if (!empty($email)): ?>
                <span>Email: <?php echo $email; ?></span>
            <?php endif; ?>
            <?php if (!empty($phone) && !empty($email)): ?>
                <span> | </span>
            <?php endif; ?>
            <?php if (!empty($phone)): ?>
                <span>Telefone: <?php echo $phone; ?></span>
            <?php endif; ?>
        </div>
        <?php if (!empty($address)): ?>
            <p><?php echo $address; ?></p>
        <?php endif; ?>
    </div>
    
    <?php if (!empty($objective)): ?>
    <div class="section">
        <h2 class="section-title">Sobre Mim</h2>
        <p><?php echo nl2br($objective); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($experience)): ?>
    <div class="section">
        <h2 class="section-title">Experiência Profissional</h2>
        <p><?php echo nl2br($experience); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($education)): ?>
    <div class="section">
        <h2 class="section-title">Formação Acadêmica</h2>
        <p><?php echo nl2br($education); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($skills)): ?>
    <div class="section">
        <h2 class="section-title">Habilidades</h2>
        <p><?php echo nl2br($skills); ?></p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($languages)): ?>
    <div class="section">
        <h2 class="section-title">Idiomas</h2>
        <p><?php echo nl2br($languages); ?></p>
    </div>
    <?php endif; ?>
</body>
</html>