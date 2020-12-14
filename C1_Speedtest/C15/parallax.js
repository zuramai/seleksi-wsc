window.addEventListener('mousemove', function(event) {
    let x = event.clientX;
    let y = event.clientY;
    let w = window.innerWidth/2;
    let h = window.innerHeight/2;
    let el = document.getElementById('parallax');

    
    let pos1 = `${50 - (x - w)  * 0.01}% ${50 - (y - w)  * 0.01}%`;
    let pos2 = `${50 - (x - w)  * 0.04}% ${50 - (y - w)  * 0.01}%`;
    let pos3 = `${50 - (x - w)  * 0.05}% ${50 - (y - w)  * 0.01}%`;

    el.style.backgroundPosition = `${pos3}, ${pos2}, ${pos1}`
    console.log('mouse move ',pos1)
}); 