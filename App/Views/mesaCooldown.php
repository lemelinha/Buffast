<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffast</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <link rel="icon" type="image/png" href="/assets/images/Logo-Buffast2.png" class="h-8 w-8">
</head>
<body>
  <div class="center bg-landing h-screen w-screen text-center place-content-center main-font">
  <div id="timer-container"><span class="text-amber-300 text-5xl">
    Tempo restante:</span> <span id="timer" class="text-white text-5xl"><?= $tempoInicial  ?></span>
    </div>
  </div>
</body>

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
        startCountdownTimer(<?= $segundosRestantes+5 ?>);
    })
</script>