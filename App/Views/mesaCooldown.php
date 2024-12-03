<div id="timer-container">
    Tempo restante: <span id="timer"><?= $tempoInicial  ?></span>
</div>
<script>
    function startCountdownTimer(totalSegundosRestantes) {
        let remainingSeconds = totalSegundosRestantes;

        const timerDisplay = document.getElementById('timer');

        const countdownInterval = setInterval(() => {
            const minutesLeft = Math.floor(remainingSeconds / 60);
            const secondsLeft = remainingSeconds % 60;

            const formattedMinutes = minutesLeft < 10 ? '0' + minutesLeft : minutesLeft;
            const formattedSeconds = secondsLeft < 10 ? '0' + secondsLeft : secondsLeft;

            timerDisplay.textContent = `${formattedMinutes}:${formattedSeconds}`;

            remainingSeconds--;

            if (remainingSeconds < 0) {
                clearInterval(countdownInterval);
                window.location.reload();
            }
        }, 1000);
    }

    // Inicializa o timer com os segundos calculados no PHP
    document.addEventListener('DOMContentLoaded', () => {
        startCountdownTimer(<?= $segundosRestantes ?>);
    })
</script>