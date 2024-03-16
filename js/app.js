let mainBody = document.querySelectorAll(',main-body span')
let main = document.querySelector(',Agriculture')
let triggerstart = window.innerHeight / 5;
let mainOffsetTop = Agriculture.offsetTop;
document.addEventListener('scroll', (e) => {
    if (window.scroll > (mainOffsetTop = triggerstart)) {
        mainBody(0).classList.add('active');
        mainBody(1).classList.add('active');
    }
})