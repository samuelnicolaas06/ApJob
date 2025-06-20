document.addEventListener('DOMContentLoaded', function() {
    const resumeForm = document.getElementById('resumeForm');
    const pdfForm = document.getElementById('pdfForm');
    const generateButton = document.getElementById('generateButton');
    const downloadButton = document.getElementById('downloadButton');
    const templateRadios = document.querySelectorAll('input[name="template"]');
    const formFields = ['name', 'email', 'phone', 'address', 'objective', 'education', 'experience', 'skills', 'languages'];
    
    // Função para verificar se um template foi selecionado
    function checkTemplateSelection() {
        const isSelected = Array.from(templateRadios).some(radio => radio.checked);
        generateButton.disabled = !isSelected;
        downloadButton.disabled = !isSelected;
        
        if (isSelected) {
            generateButton.classList.remove('btn-secondary');
            generateButton.classList.add('btn-primary');
            downloadButton.classList.remove('btn-secondary');
            downloadButton.classList.add('btn-success');
        } else {
            generateButton.classList.remove('btn-primary');
            generateButton.classList.add('btn-secondary');
            downloadButton.classList.remove('btn-success');
            downloadButton.classList.add('btn-secondary');
        }
    }
    
    // Sincroniza os campos do pdfForm com o resumeForm
    function syncPdfForm() {
        formFields.forEach(field => {
            const resumeField = document.getElementById(field);
            const pdfField = pdfForm.querySelector(`input[name="${field}"]`);
            if (resumeField && pdfField) {
                pdfField.value = resumeField.value;
            }
        });
        
        const selectedTemplate = document.querySelector('input[name="template"]:checked');
        const pdfTemplateField = pdfForm.querySelector('input[name="template"]');
        if (selectedTemplate && pdfTemplateField) {
            pdfTemplateField.value = selectedTemplate.value;
        }
    }
    
    // Event listeners para os radio buttons
    templateRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            checkTemplateSelection();
            syncPdfForm();
        });
    });
    
    // Sincroniza campos de texto em tempo real
    formFields.forEach(field => {
        const element = document.getElementById(field);
        if (element) {
            element.addEventListener('input', syncPdfForm);
        }
    });
    
    // Verificação inicial
    checkTemplateSelection();
    syncPdfForm();
    
    // Validação do formulário de pré-visualização
    function validateForm() {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        
        if (!name) {
            showAlert('Nome é obrigatório', 'danger');
            return false;
        }
        
        if (!email || !isValidEmail(email)) {
            showAlert('Email válido é obrigatório', 'danger');
            return false;
        }
        
        return true;
    }
    
    // Função para validar email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Função para mostrar alertas
    function showAlert(message, type = 'info') {
        const existingAlerts = document.querySelectorAll('.alert');
        existingAlerts.forEach(alert => alert.remove());
        
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.container');
        container.insertBefore(alertDiv, container.firstChild);
        
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
    
    // Event listener para o formulário de pré-visualização
    resumeForm.addEventListener('submit', function(e) {
        e.preventDefault();
        if (!validateForm()) {
            return false;
        }
        console.log('Enviando formulário de pré-visualização');
        syncPdfForm(); // Garante que pdfForm está atualizado
        this.submit();
    });
    
    // Event listener para o formulário de PDF
    if (pdfForm) {
        pdfForm.addEventListener('submit', function(e) {
            console.log('Enviando formulário de PDF', new FormData(this));
            downloadButton.classList.add('loading');
            downloadButton.disabled = true;
        });
    }
    
    // Auto-save dos dados do formulário no sessionStorage
    function loadSavedData() {
        formFields.forEach(field => {
            const savedValue = sessionStorage.getItem(`resume_${field}`);
            if (savedValue) {
                const element = document.getElementById(field);
                if (element) {
                    element.value = savedValue;
                }
            }
        });
        
        const savedTemplate = sessionStorage.getItem('resume_template');
        if (savedTemplate) {
            const templateRadio = document.getElementById(savedTemplate);
            if (templateRadio) {
                templateRadio.checked = true;
                checkTemplateSelection();
                syncPdfForm();
            }
        }
    }
    
    function autoSave() {
        formFields.forEach(field => {
            const element = document.getElementById(field);
            if (element) {
                element.addEventListener('input', function() {
                    sessionStorage.setItem(`resume_${field}`, this.value);
                    syncPdfForm();
                });
            }
        });
        
        templateRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    sessionStorage.setItem('resume_template', this.value);
                    syncPdfForm();
                }
            });
        });
    }
    
    loadSavedData();
    autoSave();
    
    window.clearSavedData = function() {
        if (confirm('Tem certeza que deseja limpar todos os dados salvos?')) {
            formFields.forEach(field => {
                sessionStorage.removeItem(`resume_${field}`);
            });
            sessionStorage.removeItem('resume_template');
            location.reload();
        }
    };
    
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        const maxLength = textarea.getAttribute('maxlength');
        if (maxLength) {
            const counter = document.createElement('small');
            counter.className = 'form-text text-muted char-counter';
            counter.style.textAlign = 'right';
            counter.style.display = 'block';
            
            function updateCounter() {
                const remaining = maxLength - textarea.value.length;
                counter.textContent = `${textarea.value.length}/${maxLength} caracteres`;
                counter.style.color = remaining < 50 ? '#dc3545' : '#6c757d';
            }
            
            textarea.addEventListener('input', updateCounter);
            textarea.parentNode.appendChild(counter);
            updateCounter();
        }
    });
    
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    if (typeof bootstrap !== 'undefined') {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
});