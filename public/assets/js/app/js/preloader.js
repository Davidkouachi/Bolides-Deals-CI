window.addEventListener('load', function() {
    // Minimum time for the preloader to be displayed (in milliseconds)
    const Time = 1000; // 2 seconds (2000 ms)

    // Use setTimeout to ensure the preloader is shown for at least the minimum time
    setTimeout(function() {
        document.getElementById('preloader').style.display = 'none';
    }, Time);
});
