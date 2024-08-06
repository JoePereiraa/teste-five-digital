import './bootstrap';

import Alpine from 'alpinejs';
import typingAnimation from './alpine/typingAnimation';
import buttonEffects from './alpine/buttonEffects';

function fileUploader() {
    return {
        fileName: '',
        fileSize: '',
        errorMessage: '',

        handleFiles(event) {
            const selectedFile = event.target.files[0];
            if (selectedFile) {
                this.fileName = selectedFile.name;
                this.fileSize = (selectedFile.size / 1024).toFixed(2); // Tamanho em KB
            } else {
                this.fileName = '';
                this.fileSize = '';
            }
        },
        checkAndSubmit() {
            if (!this.fileName) {
                this.errorMessage = 'Por favor selecione um arquivo antes de fazer o uploading.';
            } else {
                this.errorMessage = ''; // Limpa a mensagem de erro
                this.$refs.fileInput.form.submit(); // Submete o formulário
            }
        }
    };
}

window.Alpine = Alpine;

Alpine.data('typingAnimation', typingAnimation);
Alpine.data('buttonEffects', buttonEffects);
Alpine.data('fileUploader', fileUploader);

Alpine.start();
