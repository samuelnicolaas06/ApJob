<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Currículo - <?php echo $name; ?></title>
    <style>
        /* Estilos gerais */
        body { 
            font-family: 'Arial', sans-serif;
            max-width: 850px;
            /* margin: 0 auto; */
            color: #333;
            /* line-height: 1.6; */
        }
        
        .container { 
        }
        
        .sidebar { 
            /* background: linear-gradient(180deg, #333333, #151510); */
            background-color: #151510;
            color: white;
            width: 300px;
            float: left;
            padding: 30px 20px;
            box-sizing: border-box;
            border-radius: 30px;
            overflow: auto; /* Permite rolagem se o conteúdo for grande */
            position: relative; /* Mantém no lugar */
        }
        
        .sidebar h3 { 
            font-size: 24px;
            /*margin: 0 0 20px;*/
            font-weight: 300;
            text-align: center;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            padding-bottom: 15px;
        }
        
        .sidebar .contact-info {
            margin-bottom: 30px;
        }
        
        .sidebar .contact-info p {
            /*margin: 8px 0;*/
            font-size: 14px;
        }
        
        .sidebar h4 { 
            font-size: 18px;
            /*margin: 25px 0 10px;*/
            color: #fff;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            padding-bottom: 5px;
        }
        
        .sidebar p {
            font-size: 14px;
            margin: 10px 0;
            line-height: 1.5;
        }
        
        .content { 
            /* width: 65%; */
            width: calc(100% - 300px);
            min-height: 100%;
            float: left; /* Match sidebar float */
            /*padding: 30px 25px;*/
            background-color: white;
        }
        
        .content .section { 
            /*background-color: #f8f9fa;*/
            /*padding: 20px;*/
            background-color: #f8f9fa;
            margin-bottom: 20px;
            margin: 20px 0 0 20px;
            padding: 15px;
            border-radius: 8px;
            page-break-inside: avoid;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .content h4 { 
            font-size: 20px;
            color: #151510;
            border-bottom: 2px dashed #17a2b8;
            margin-bottom: 15px;
            padding-bottom: 8px;
        }
        
        .content p {
            font-size: 15px;
            /*margin: 10px 0;*/
            text-align: justify;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h3><?php echo $name; ?></h3>
            
            <div class="contact-info">
                <?php if (!empty($email)): ?>
                    <p><strong>Email:</strong><br><?php echo $email; ?></p>
                <?php endif; ?>
                <?php if (!empty($phone)): ?>
                    <p><strong>Telefone:</strong><br><?php echo $phone; ?></p>
                <?php endif; ?>
                <?php if (!empty($address)): ?>
                    <p><strong>Endereço:</strong><br><?php echo $address; ?></p>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($skills)): ?>
            <div>
                <h4>Habilidades</h4>
                <p><?php echo nl2br($skills); ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($languages)): ?>
            <div>
                <h4>Idiomas</h4>
                <p><?php echo nl2br($languages); ?></p>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="content">
            <?php if (!empty($objective)): ?>
            <div class="section">
                <h4>Sobre Mim</h4>
                <p><?php echo nl2br($objective); ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($experience)): ?>
            <div class="section">
                <h4>Experiência Profissional</h4>
                <p><?php echo nl2br($experience); ?></p>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($education)): ?>
            <div class="section">
                <h4>Formação Acadêmica</h4>
                <p><?php echo nl2br($education); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>