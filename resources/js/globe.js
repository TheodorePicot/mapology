let isPaused = false;

// Create tooltip element
const tooltip = document.createElement('div');
tooltip.style.position = 'absolute';
tooltip.style.background = 'white';
tooltip.style.border = '1px solid #ccc';
tooltip.style.padding = '5px';
tooltip.style.display = 'none';
tooltip.style.pointerEvents = 'none'; // Prevent tooltip from blocking mouse events
document.body.appendChild(tooltip);

// Add hover event listeners to paths
document.querySelectorAll('.globe path').forEach(path => {
    path.addEventListener('mouseenter', (e) => {
        const sovereignty = path.getAttribute('data-sovereignt');
        tooltip.textContent = sovereignty;
        tooltip.style.display = 'block';

        // Highlight the path
        path.classList.add('highlighted');
    });

    path.addEventListener('mousemove', (e) => {
        tooltip.style.left = e.pageX + 10 + 'px';
        tooltip.style.top = e.pageY + 10 + 'px';
    });

    path.addEventListener('mouseleave', () => {
        tooltip.style.display = 'none';

        // Remove highlight from the path
        path.classList.remove('highlighted');
    });
});

// Add event listeners to handle click and unclick (pause/resume translation)
document.querySelector('.globe').addEventListener('mousedown', () => {
    isPaused = true; // Pause rotation
    document.querySelector('.globe svg').style.animationPlayState = 'paused'; // Pause animation
    console.log('Translation paused');
});

document.querySelector('.globe').addEventListener('mouseup', () => {
    isPaused = false; // Resume rotation
    document.querySelector('.globe svg').style.animationPlayState = 'running'; // Resume animation
    console.log('Translation resumed');
});
