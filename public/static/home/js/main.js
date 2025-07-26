// Crear partículas flotantes
function createParticles() {
    const container = document.getElementById('particles');
    const particleCount = 30;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('sun-particle');
        
        // Tamaño aleatorio
        const size = Math.random() * 4 + 1;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Posición aleatoria
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Animación personalizada
        const duration = Math.random() * 15 + 10;
        const delay = Math.random() * 5;
        particle.style.animation = `float ${duration}s ease-in-out ${delay}s infinite`;
        
        container.appendChild(particle);
    }
}

// Efecto de aparición al hacer scroll
function setupScrollAnimations() {
    const cards = document.querySelectorAll('.card-hover');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach((card, index) => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        card.style.transitionDelay = `${index * 0.1}s`;
        observer.observe(card);
    });
}

// Inicializar efectos
document.addEventListener('DOMContentLoaded', () => {
    createParticles();
    setupScrollAnimations();
    
    // Efecto de pulsación en el logo
    const logo = document.querySelector('.sun-logo');
    setInterval(() => {
        logo.classList.toggle('text-sun-secondary');
        logo.classList.toggle('text-sun-accent');
    }, 3000);
});


    tailwind.config = {
    theme: {
        extend: {
            colors: {
                'sun-primary': '#FF7A00',
                'sun-secondary': '#FFD700',
                'sun-accent': '#FF4500',
                'sun-dark': '#1E1E2A',
                'sun-darker': '#0F0F17'
            },
            fontFamily: {
                'poppins': ['Poppins', 'sans-serif']
            },
            animation: {
                'pulse-slow': 'pulse 8s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'float': 'float 6s ease-in-out infinite',
                'sun-glow': 'sun-glow 3s ease-in-out infinite alternate',
                'rotate-slow': 'rotate-slow 20s linear infinite'
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' }
                },
                'sun-glow': {
                    '0%': { 'box-shadow': '0 0 10px rgba(255, 122, 0, 0.5)' },
                    '100%': { 'box-shadow': '0 0 30px rgba(255, 122, 0, 0.8), 0 0 50px rgba(255, 215, 0, 0.5)' }
                },
                'rotate-slow': {
                    '0%': { transform: 'rotate(0deg)' },
                    '100%': { transform: 'rotate(360deg)' }
                }
            }
        }
    }
}