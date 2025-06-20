<div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px;">
    <h1 style="color: #2c3e50; font-size: 28px; margin-bottom: 10px; text-align: center; border-bottom: 3px solid #2c3e50; padding-bottom: 10px;">
        <?php echo $name; ?>
    </h1>
    
    <div style="text-align: center; margin-bottom: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 5px;">
        <?php if (!empty($email)): ?>
            <p style="margin: 5px 0; font-size: 14px;"><strong>Email:</strong> <?php echo $email; ?></p>
        <?php endif; ?>
        <?php if (!empty($phone)): ?>
            <p style="margin: 5px 0; font-size: 14px;"><strong>Telefone:</strong> <?php echo $phone; ?></p>
        <?php endif; ?>
        <?php if (!empty($address)): ?>
            <p style="margin: 5px 0; font-size: 14px;"><strong>Endereço:</strong> <?php echo $address; ?></p>
        <?php endif; ?>
    </div>
    
    <?php if (!empty($objective)): ?>
    <div style="margin-bottom: 25px;">
        <h2 style="color: #34495e; font-size: 18px; border-bottom: 2px solid #34495e; margin: 25px 0 15px; padding-bottom: 5px;">
            Objetivo Profissional
        </h2>
        <p style="font-size: 14px; line-height: 1.6; margin: 10px 0; text-align: justify;">
            <?php echo nl2br(htmlspecialchars($objective)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($experience)): ?>
    <div style="margin-bottom: 25px;">
        <h2 style="color: #34495e; font-size: 18px; border-bottom: 2px solid #34495e; margin: 25px 0 15px; padding-bottom: 5px;">
            Experiência Profissional
        </h2>
        <p style="font-size: 14px; line-height: 1.6; margin: 10px 0; text-align: justify;">
            <?php echo nl2br(htmlspecialchars($experience)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($education)): ?>
    <div style="margin-bottom: 25px;">
        <h2 style="color: #34495e; font-size: 18px; border-bottom: 2px solid #34495e; margin: 25px 0 15px; padding-bottom: 5px;">
            Formação Acadêmica
        </h2>
        <p style="font-size: 14px; line-height: 1.6; margin: 10px 0; text-align: justify;">
            <?php echo nl2br(htmlspecialchars($education)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($skills)): ?>
    <div style="margin-bottom: 25px;">
        <h2 style="color: #34495e; font-size: 18px; border-bottom: 2px solid #34495e; margin: 25px 0 15px; padding-bottom: 5px;">
            Habilidades
        </h2>
        <p style="font-size: 14px; line-height: 1.6; margin: 10px 0; text-align: justify;">
            <?php echo nl2br(htmlspecialchars($skills)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($languages)): ?>
    <div style="margin-bottom: 25px;">
        <h2 style="color: #34495e; font-size: 18px; border-bottom: 2px solid #34495e; margin: 25px 0 15px; padding-bottom: 5px;">
            Idiomas
        </h2>
        <p style="font-size: 14px; line-height: 1.6; margin: 10px 0; text-align: justify;">
            <?php echo nl2br(htmlspecialchars($languages)); ?>
        </p>
    </div>
    <?php endif; ?>
</div>