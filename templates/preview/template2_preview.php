<div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; background-color: #f4f6f9; border-radius: 10px; overflow: hidden;">
    <div style="background: linear-gradient(135deg, #333333, #151510); color: white; padding: 30px 20px; text-align: center;">
        <h1 style="font-size: 32px; margin: 0 0 10px; font-weight: 300; color: #f4f6f9;">
            <?php echo $name; ?>
        </h1>
        <div style="font-size: 16px; margin: 10px 0;">
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
            <p style="margin: 5px 0; opacity: 0.9;"><?php echo $address; ?></p>
        <?php endif; ?>
    </div>
    
    <?php if (!empty($objective)): ?>
    <div style="background-color: white; padding: 25px; margin: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 5px solid #222222;">
        <h2 style="font-size: 22px; color: #333333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 15px; font-weight: 600;">
            Sobre Mim
        </h2>
        <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($objective)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($experience)): ?>
    <div style="background-color: white; padding: 25px; margin: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 5px solid #222222;">
        <h2 style="font-size: 22px; color: #333333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 15px; font-weight: 600;">
            Experiência Profissional
        </h2>
        <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($experience)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($education)): ?>
    <div style="background-color: white; padding: 25px; margin: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 5px solid #222222;">
        <h2 style="font-size: 22px; color: #333333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 15px; font-weight: 600;">
            Formação Acadêmica
        </h2>
        <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($education)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($skills)): ?>
    <div style="background-color: white; padding: 25px; margin: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 5px solid #222222;">
        <h2 style="font-size: 22px; color: #333333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 15px; font-weight: 600;">
            Habilidades
        </h2>
        <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($skills)); ?>
        </p>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($languages)): ?>
    <div style="background-color: white; padding: 25px; margin: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 5px solid #222222;">
        <h2 style="font-size: 22px; color: #333333; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 15px; font-weight: 600;">
            Idiomas
        </h2>
        <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($languages)); ?>
        </p>
    </div>
    <?php endif; ?>
</div>