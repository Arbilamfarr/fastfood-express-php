</main>
    <footer>
        <div class="container">
            <p>Copyright © ELARBI <?= date('Y') ?></p>
        </div>
    </footer>
    <script>
        // Gestion du changement de thème
        document.getElementById('theme-toggle').addEventListener('click', function() {
            const currentTheme = document.body.classList.contains('dark') ? 'dark' : 'light';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            // Envoyer une requête pour changer le thème
            fetch('/theme?theme=' + newTheme)
                .then(() => {
                    document.body.classList.toggle('dark');
                    this.textContent = 'Mode ' + (newTheme === 'dark' ? 'clair' : 'sombre');
                });
        });

        // Gestion du changement de langue
        function changeLanguage(lang) {
            fetch('/language?lang=' + lang)
                .then(() => window.location.reload());
        }
    </script>
       <script>
    // Menu mobile
    document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
        document.querySelector('.main-nav').classList.toggle('active');
        document.querySelector('.user-actions').classList.toggle('active');
    });

    // Changement de thème amélioré
    document.getElementById('theme-toggle').addEventListener('click', function() {
        const currentTheme = document.body.classList.contains('dark') ? 'dark' : 'light';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        const icon = this.querySelector('i');
        
        // Animation du bouton
        this.style.transform = 'scale(0.9)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 200);
        
        // Changement du thème
        fetch('/theme?theme=' + newTheme)
            .then(() => {
                document.body.classList.toggle('dark');
                icon.classList.toggle('fa-sun');
                icon.classList.toggle('fa-moon');
                this.querySelector('span').textContent = 'Mode ' + (newTheme === 'dark' ? 'clair' : 'sombre');
            });
    });
</script>
</body>
</html>