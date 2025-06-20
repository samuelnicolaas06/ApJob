<div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; background-color: #f8f9fa; display: flex; min-height: 600px; border-radius: 10px; overflow: hidden; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
    <div style="background: linear-gradient(180deg, #333333, #151510); color: white; width: 35%; padding: 30px 20px; box-sizing: border-box;">
        <h3 style="font-size: 24px; margin: 0 0 20px; font-weight: 300; text-align: center; border-bottom: 2px solid rgba(255,255,255,0.3); padding-bottom: 15px;">
            <?php echo $name; ?>
        </h3>
        
        <div style="margin-bottom: 30px;">
            <?php if (!empty($email)): ?>
                <p style="margin: 8px 0; font-size: 14px; line-height: 1.5;">
                    <strong>Email:</strong><br><?php echo $email; ?>
                </p>
            <?php endif; ?>
            <?php if (!empty($phone)): ?>
                <p style="margin: 8px 0; font-size: 14px; line-height: 1.5;">
                    <strong>Telefone:</strong><br><?php echo $phone; ?>
                </p>
            <?php endif; ?>
            <?php if (!empty($address)): ?>
                <p style="margin: 8px 0; font-size: 14px; line-height: 1.5;">
                    <strong>Endereço:</strong><br><?php echo $address; ?>
                </p>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($skills)): ?>
        <div style="margin-bottom: 25px;">
            <h4 style="font-size: 18px; margin: 25px 0 10px; color: #fff; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 5px;">
                Habilidades
            </h4>
            <p style="font-size: 14px; margin: 10px 0; line-height: 1.5;">
                <?php echo nl2br(htmlspecialchars($skills)); ?>
            </p>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($languages)): ?>
        <div>
            <h4 style="font-size: 18px; margin: 25px 0 10px; color: #fff; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 5px;">
                Idiomas
            </h4>
            <p style="font-size: 14px; margin: 10px 0; line-height: 1.5;">
                <?php echo nl2br(htmlspecialchars($languages)); ?>
            </p>
        </div>
        <?php endif; ?>
    </div>
    
    <div style="width: 65%; padding: 30px 25px; background-color: white;">
        <?php if (!empty($objective)): ?>
        <div style="background-color: #f8f9fa; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h4 style="font-size: 20px; color: #17a2b8; border-bottom: 2px dashed #17a2b8; margin-bottom: 15px; padding-bottom: 8px;">
                Sobre Mim
            </h4>
            <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
                <?php echo nl2br(htmlspecialchars($objective)); ?>
            </p>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($experience)): ?>
        <div style="background-color: #f8f9fa; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h4 style="font-size: 20px; color: #17a2b8; border-bottom: 2px dashed #17a2b8; margin-bottom: 15px; padding-bottom: 8px;">
                Experiência Profissional
            </h4>
            <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
                <?php echo nl2br(htmlspecialchars($experience)); ?>
            </p>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($education)): ?>
        <div style="background-color: #f8f9fa; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h4 style="font-size: 20px; color: #17a2b8; border-bottom: 2px dashed #17a2b8; margin-bottom: 15px; padding-bottom: 8px;">
                Formação Acadêmica
            </h4>
            <p style="font-size: 15px; margin: 10px 0; text-align: justify; line-height: 1.6;">
                <?php echo nl2br(htmlspecialchars($education)); ?>
            </p>
        </div>
        <?php endif; ?>
    </div>
</div>