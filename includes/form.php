<form method="POST" action="" id="resumeForm" class="resume-form">
    <!-- Seleção de Template -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Escolha o Modelo do Currículo</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach (AVAILABLE_TEMPLATES as $key => $name): ?>
                <div class="col-md-4 mb-3">
                    <div class="form-check template-option">
                        <input class="form-check-input" type="radio" name="template" 
                               id="<?php echo $key; ?>" value="<?php echo $key; ?>" 
                               <?php echo ($selected_template === $key) ? 'checked' : ''; ?> required>
                        <label class="form-check-label template-label" for="<?php echo $key; ?>">
                            <div class="template-preview">
                                <!--<img src="assets/images/templates/<?php echo $key; ?>_thumb.png" 
                                     alt="<?php echo $name; ?>" class="img-fluid" 
                                     onerror="this.src='assets/images/template-placeholder.png'">-->
                                <div class="template-name"><?php echo $name; ?></div>
                            </div>
                        </label>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Dados Pessoais -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Dados Pessoais</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nome Completo *</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="<?php echo $data['name'] ?? ''; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="<?php echo $data['email'] ?? ''; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" 
                           value="<?php echo $data['phone'] ?? ''; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="address" name="address" 
                           value="<?php echo $data['address'] ?? ''; ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- Informações Profissionais -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Informações Profissionais</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="objective" class="form-label">Objetivo Profissional</label>
                <textarea class="form-control" id="objective" name="objective" rows="4" 
                          placeholder="Descreva seu objetivo profissional..."><?php echo $data['objective'] ?? ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experiência Profissional</label>
                <textarea class="form-control" id="experience" name="experience" rows="4" 
                          placeholder="Descreva suas experiências profissionais..."><?php echo $data['experience'] ?? ''; ?></textarea>
            </div>
        </div>
    </div>

    <!-- Formação e Habilidades -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Formação e Habilidades</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="education" class="form-label">Formação Acadêmica</label>
                <textarea class="form-control" id="education" name="education" rows="4" 
                          placeholder="Descreva sua formação acadêmica..."><?php echo $data['education'] ?? ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Habilidades</label>
                <textarea class="form-control" id="skills" name="skills" rows="4" 
                          placeholder="Liste suas habilidades..."><?php echo $data['skills'] ?? ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="languages" class="form-label">Idiomas</label>
                <textarea class="form-control" id="languages" name="languages" rows="3" 
                          placeholder="Liste os idiomas que você fala..."><?php echo $data['languages'] ?? ''; ?></textarea>
            </div>
        </div>
    </div>

    <!-- Botões de Ação -->
    <div class="card">
        <div class="card-body text-center">
            <button type="submit" class="btn btn-primary btn-lg me-3" id="generateButton" disabled>
                <i class="bi bi-eye"></i> Gerar Pré-visualização
            </button>
            <button type="submit" class="btn btn-success btn-lg" name="generate_pdf" id="downloadButton" disabled>
                <i class="bi bi-download"></i> Baixar PDF
            </button>
        </div>
    </div>
</form>