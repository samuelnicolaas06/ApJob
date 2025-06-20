// JavaScript para o gerador de currículo
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('resumeForm');
    const generateButton = document.getElementById('generateButton');
    const downloadButton = document.getElementById('downloadButton');
    const templateRadios = document.querySelectorAll('input[name="template"]');
    
    // Função para verificar se um template foi selecionado
    function checkTemplateSelection() {
        const isSelected = Array.from(templateRadios).some(radio => radio.checked);
        generateButton.disabled = !isSelected;
        downloadButton.disabled = !isSelected;
        
        // Adiciona classe visual aos botões
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
    
    // Event listeners para os radio buttons
    templateRadios.forEach(radio => {
        radio.addEventListener('change', checkTemplateSelection);
    });
    
    // Verificação inicial
    checkTemplateSelection();
    
    // Validação do formulário
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
        // Remove alertas existentes
        const existingAlerts = document.querySelectorAll('.alert');
        existingAlerts.forEach(alert => alert.remove());
        
        // Cria novo alerta
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Insere o alerta no topo do container
        const container = document.querySelector('.container');
        container.insertBefore(alertDiv, container.firstChild);
        
        // Remove automaticamente após 5 segundos
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
    
    // Event listener para o formulário
    form.addEventListener('submit', function(e) {
        // Só valida se não for geração de PDF
        if (!e.submitter || e.submitter.name !== 'generate_pdf') {
            if (!validateForm()) {
                e.preventDefault();
                return false;
            }
        }
        
        // Adiciona loading state aos botões
        if (e.submitter) {
            e.submitter.classList.add('loading');
            e.submitter.disabled = true;
        }
    });
    
    // Auto-save dos dados do formulário no sessionStorage
    const formFields = ['name', 'email', 'phone', 'address', 'objective', 'education', 'experience', 'skills', 'languages'];
    
    // Carrega dados salvos
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
        
        // Carrega template selecionado
        const savedTemplate = sessionStorage.getItem('resume_template');
        if (savedTemplate) {
            const templateRadio = document.getElementById(savedTemplate);
            if (templateRadio) {
                templateRadio.checked = true;
                checkTemplateSelection();
            }
        }
    }
    
    // Salva dados automaticamente
    function autoSave() {
        formFields.forEach(field => {
            const element = document.getElementById(field);
            if (element) {
                element.addEventListener('input', function() {
                    sessionStorage.setItem(`resume_${field}`, this.value);
                });
            }
        });
        
        // Salva template selecionado
        templateRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    sessionStorage.setItem('resume_template', this.value);
                }
            });
        });
    }
    
    // Inicializa auto-save
    loadSavedData();
    autoSave();
    
    // Função para limpar dados salvos
    window.clearSavedData = function() {
        if (confirm('Tem certeza que deseja limpar todos os dados salvos?')) {
            formFields.forEach(field => {
                sessionStorage.removeItem(`resume_${field}`);
            });
            sessionStorage.removeItem('resume_template');
            location.reload();
        }
    };
    
    // Adiciona contador de caracteres para textareas
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
    
    // Smooth scroll para seções
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
    
    // Adiciona tooltips do Bootstrap se disponível
    if (typeof bootstrap !== 'undefined') {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
});