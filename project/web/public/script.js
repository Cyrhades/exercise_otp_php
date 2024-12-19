document.getElementById('burger-menu').addEventListener('click', function() {
    const mainMenu = document.getElementById('main-menu');
    const multiLang = document.getElementById('multi-lang');
    mainMenu.style.display = mainMenu.style.display === 'flex' ? 'none' : 'flex';
    multiLang.style.display = multiLang.style.display === 'flex' ? 'none' : 'flex';
});

// Écouteur d'événements pour la redimension de la fenêtre
window.addEventListener('resize', function() {
    const mainMenu = document.getElementById('main-menu');
    const multiLang = document.getElementById('multi-lang');

    // Vérifiez la largeur de la fenêtre
    if (window.innerWidth > 520) {
        // Réinitialiser le style en cas de largeurs plus grandes
        mainMenu.style.display = 'flex';
        multiLang.style.display = 'flex';
    } else {
        mainMenu.style.display = 'none';
        multiLang.style.display = 'none';
    }
});

