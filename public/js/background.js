document.addEventListener('DOMContentLoaded', function() {
    const background = document.getElementById('background');
  
    // Colores en formato hexadecimal para el fondo
    const colors = ['#F7CAC9', '#F8E6E6', '#F7E6A3', '#FFB7C3', '#B5EAEA'];
  
    // Función para generar un color aleatorio
    function getRandomColor() {
      return colors[Math.floor(Math.random() * colors.length)];
    }
  
    // Función para generar un granadiente aleatorio
    function generateRandomGradient() {
      const startColor = getRandomColor();
      const endColor = getRandomColor();
      const gradient = `linear-gradient(45deg, ${startColor}, ${endColor})`;
      return gradient;
    }
  
    // Función para animar el fondo con colores en movimiento
    function animateBackground() {
      const gradient = generateRandomGradient();
      background.style.background = gradient;
      setTimeout(animateBackground, 2000); // Cambia el granadiente cada 2 segundos
    }
  
    // Iniciar la animación del fondo
    animateBackground();
  });