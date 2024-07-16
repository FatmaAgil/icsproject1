
<script>
    const gameContainer = document.getElementById('gameContainer');
    const plasticContainer = document.getElementById('plasticContainer');
    const timerElement = document.getElementById('timer');
    const scoreElement = document.getElementById('score');
    const startButton = document.getElementById('startButton');
    const gameOverModal = document.getElementById('gameOverModal');

    let plastics = [];
    let score = 0;
    let timer = 20;
    let plasticTypes = [
      { img: 'PvcImage.png', points: 10 },
      { img: 'PetImage.png', points: 20 },
      { img: 'HdpeImage.png', points: 30 },
      { img: 'LdpeImage.png', points: 40 },
      { img: 'PpImage.png', points: 50 },
    ];

    startButton.addEventListener('click', startGame);

    function startGame() {
      startButton.style.display = 'none'; // Hide start button
      gameContainer.style.display = 'block'; // Show game container
      startTimer();
      generatePlastics();
      addPlasticListeners();
    }

    function startTimer() {
      const gameTimer = setInterval(() => {
        timer--;
        timerElement.textContent = timer + ' seconds';
        if (timer === 0) {
          clearInterval(gameTimer);
          endGame();
        }
      }, 1000);
    }

    function generatePlastics() {
      for (let i = 0; i < 40; i++) {
        const plastic = document.createElement('div');
        plastic.className = 'plastic';
        const randomPlasticType = plasticTypes[Math.floor(Math.random() * plasticTypes.length)];
        plastic.innerHTML = `<img src="{{ asset('assets/img/${randomPlasticType.img}') }}" alt="${randomPlasticType.img}">`;
        plastic.dataset.points = randomPlasticType.points;
        plasticContainer.appendChild(plastic);
        plastics.push(plastic);
      }
    }

    function addPlasticListeners() {
      plastics.forEach((plastic) => {
        plastic.addEventListener('click', () => {
          disposePlastic(plastic);
        });
        plastic.addEventListener('mouseover', () => {
          plastic.style.transform = 'scale(1.1)';
        });
        plastic.addEventListener('mouseout', () => {
          plastic.style.transform = 'scale(1)';
        });
      });
    }

    function disposePlastic(plastic) {
      plastic.remove();
      score += parseInt(plastic.dataset.points);
      scoreElement.textContent = `Score: ${score}`;
      checkForCombo();
    }

    function checkForCombo() {
      const comboCount = plastics.filter((plastic) => plastic.style.transform === 'scale(1.1)').length;
      if (comboCount >= 3) {
        score += comboCount * 10;
        scoreElement.textContent = `Score: ${score}`;
        comboCount.forEach((plastic) => {
          plastic.style.transform = 'scale(1)';
        });
      }
    }

    function endGame() {
      document.getElementById('gameOverScore').textContent = `Your score: ${score}`;
      gameOverModal.style.display = 'block'; // Show game over modal
      gameContainer.style.display = 'none'; // Hide the game container
    }
  </script>



   <!-- Game Section -->
