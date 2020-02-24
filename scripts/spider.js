function updateSpider(element, event) {
    if (element && event) {
        var e = event || window.event;
        const mouseX = e.clientX;
        const mouseY = e.clientY;
        var rect = element.getBoundingClientRect();

        const max = 2;
        let tX = (-2 * (rect.x - mouseX) / element.offsetWidth).toFixed(2);
        let tY = (2 * (rect.y - mouseY) / element.offsetHeight).toFixed(2);
        if (Math.abs(tX) > max) {
            tX = Math.sign(tX) * max;
        }
        if (Math.abs(tY) > max) {
            tY = Math.sign(tY) * max;
        }

        const style = `rotateX(${tY}deg) rotateY(${tX}deg)`;
        element.style.transform = style;
        element.style.webkitTransform = style;
        element.style.mozTransform = style;
        element.style.msTransform = style;
        element.style.oTransform = style;
        element.style.display = "inline-block";
    }
}

function initSpider() {
    const id = "spider";
    const element = document.getElementById(id);
    if (element) {
        document.body.addEventListener('mousemove', (event) => {
            updateSpider(element, event);
        });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    initSpider();
}, false);