export default function buttonEffects() {
    return {
        clicked: false,

        handleClick() {
            this.clicked = true;
            setTimeout(() => {
                this.clicked = false;
            }, 2000); // Duração do efeito de clique
        }
    }
}
