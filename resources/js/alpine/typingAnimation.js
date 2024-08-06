export default function typingAnimation() {
    return {
        words: ['Organize', 'Armazene', 'Compartilhe'],
        currentWord: '',
        wordIndex: 0,
        charIndex: 0,
        typingSpeed: 100,
        pauseTime: 2000,

        init() {
            this.type();
        },

        type() {
            if (this.charIndex < this.words[this.wordIndex].length) {
                this.currentWord += this.words[this.wordIndex].charAt(this.charIndex);
                this.charIndex++;
                setTimeout(() => this.type(), this.typingSpeed);
            } else {
                setTimeout(() => this.erase(), this.pauseTime);
            }
        },

        erase() {
            if (this.charIndex > 0) {
                this.currentWord = this.currentWord.substring(0, this.charIndex - 1);
                this.charIndex--;
                setTimeout(() => this.erase(), this.typingSpeed);
            } else {
                this.wordIndex = (this.wordIndex + 1) % this.words.length;
                setTimeout(() => this.type(), this.typingSpeed);
            }
        }
    }
}
