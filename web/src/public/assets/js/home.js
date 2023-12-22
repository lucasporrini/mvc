document.addEventListener("DOMContentLoaded", function() {
    const stats = document.querySelectorAll(".grid p.text-4xl");
    
    const totalDuration = 2000; // Durée totale de l'animation en millisecondes

    const countUp = (el, target) => {
        const stepTime = 1000 / 60; // Incrément chaque 60ème de seconde (pour une animation fluide)
        const totalSteps = totalDuration / stepTime;
        const incrementPerStep = target / totalSteps;
        let current = 0;

        const timer = setInterval(() => {
            current += incrementPerStep;
            if (current > target) current = target;
            el.textContent = `${Math.floor(current)}${el.innerText.replace(/[\d.-]/g, '')}`;

            if (current >= target) {
                clearInterval(timer);
                el.textContent = el.innerText;
            }
        }, stepTime);
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                stats.forEach(stat => {
                    const target = +stat.innerText.replace(/[^\d.-]/g, '');
                    countUp(stat, target);
                });
                observer.disconnect();
            }
        });
    }, { threshold: 0.5 });

    observer.observe(document.getElementById("statsSection"));
});
