<footer id="contact" class="site-footer">
    <div class="site-footer__benefits">
        <div class="container">
            <div class="row g-0">
                <div class="col-6 col-lg-3">
                    <div class="site-footer__benefit">
                        <span class="site-footer__benefit-icon" aria-hidden="true">01</span>
                        <span class="site-footer__benefit-copy">Thoughtful digital design</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="site-footer__benefit">
                        <span class="site-footer__benefit-icon" aria-hidden="true">02</span>
                        <span class="site-footer__benefit-copy">Built around your business</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="site-footer__benefit">
                        <span class="site-footer__benefit-icon" aria-hidden="true">03</span>
                        <span class="site-footer__benefit-copy">Clear, practical support</span>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="site-footer__benefit">
                        <span class="site-footer__benefit-icon" aria-hidden="true">04</span>
                        <span class="site-footer__benefit-copy">Here to help you grow</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-footer__main">
        <div class="container">
            <div class="site-footer__newsletter row align-items-center g-4">
                <div class="col-lg-7">
                    <p class="site-footer__eyebrow mb-2">Stay connected</p>
                    <h2 class="h3 fw-semibold mb-2">Good things start with a conversation.</h2>
                    <p class="text-white-50 mb-0">Tell us what you’re building and let’s explore what’s possible.</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <a href="#HP-hero-banner-6" class="btn btn-light fw-semibold px-4 py-3">Start a project <span aria-hidden="true">→</span></a>
                </div>
            </div>

            <div class="site-footer__links row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <a class="site-footer__brand" href="#HP-hero-banner-1">LIKHA</a>
                    <p class="site-footer__description text-white-50 mb-0">
                        Creating digital solutions that help local businesses build their presence, connect with customers, and grow.
                    </p>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h3 class="site-footer__heading">Explore</h3>
                    <ul class="site-footer__list">
                        <li><a href="#HP-hero-banner-2">Our services</a></li>
                        <li><a href="#HP-hero-banner-3">Featured</a></li>
                        <li><a href="#HP-hero-banner-4">Why Likha</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h3 class="site-footer__heading">Discover</h3>
                    <ul class="site-footer__list">
                        <li><a href="#HP-hero-banner-5">Latest updates</a></li>
                        <li><a href="#HP-hero-banner-6">Start a project</a></li>
                        <li><a href="#HP-hero-banner-1">Back to top</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-4">
                    <h3 class="site-footer__heading">Let’s connect</h3>
                    <p class="text-white-50 mb-3">Have a question or an idea? We’d be glad to hear from you.</p>
                    <a class="site-footer__contact-link" href="#HP-hero-banner-6">Get in touch <span aria-hidden="true">→</span></a>
                </div>
            </div>

            <div class="site-footer__bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                <p class="mb-0">© <?php echo date("Y"); ?> LIKHA. Creating possibilities through technology.</p>
                <a href="#HP-hero-banner-1">Back to top ↑</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Particle Canvas Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('hp-hero-banner-1-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let particles = [];

    function resizeCanvas() {
        canvas.width = canvas.parentElement.offsetWidth;
        canvas.height = canvas.parentElement.offsetHeight;
        initParticles();
    }

    function initParticles() {
        particles = [];
        const particleCount = Math.floor((canvas.width * canvas.height) / 10000);
        for (let i = 0; i < particleCount; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 2 + 1.5,
                vx: (Math.random() - 0.5) * 0.8,
                vy: (Math.random() - 0.5) * 0.8,
                color: '#00dc96' // Tech green color
            });
        }
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw and update particles
        particles.forEach((p, i) => {
            p.x += p.vx;
            p.y += p.vy;

            // Bounce off edges
            if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
            if (p.y < 0 || p.y > canvas.height) p.vy *= -1;

            // Draw dot
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
            ctx.fillStyle = p.color;
            ctx.shadowBlur = 10;
            ctx.shadowColor = p.color;
            ctx.fill();

            // Draw connecting lines between close particles
            for (let j = i + 1; j < particles.length; j++) {
                const p2 = particles[j];
                const dx = p.x - p2.x;
                const dy = p.y - p2.y;
                const dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 120) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(0, 220, 150, ${1 - dist / 120})`;
                    ctx.lineWidth = 0.6;
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.stroke();
                }
            }
        });

        requestAnimationFrame(animate);
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();
    animate();
});
</script>
<script>
window.addEventListener('scroll', function() {
    const nav = document.getElementById('mainNav');
    if (window.scrollY > 50) {
        nav.classList.remove('navbar-transparent');
        nav.classList.add('navbar-scrolled');
    } else {
        nav.classList.remove('navbar-scrolled');
        nav.classList.add('navbar-transparent');
    }
});
</script>

</body>
</html>