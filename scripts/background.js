function loadBackground(src, className) {
    const img = new Image();
    img.onload = () => {
        const elements = document.getElementsByClassName(className);
        if (elements) {
            for (let i = 0; i < elements.length; ++i) {
                const element = elements[i];
                element.setAttribute("style", `background-image: url(${src});background-repeat: no-repeat;background-size: cover;background-position: left bottom;`);
            }
        }
        const befores = document.getElementsByClassName(`${className}-outer`);
        console.log(befores);
        if (befores) {
            for (let i = 0; i < befores.length; ++i) {
                const before = befores[i];
                before.classList.add("background-gradient");
            }
        }
    }
    img.onerror = (err) => {
        console.error("Error", err);
    }
    img.src = src;
}

document.addEventListener('DOMContentLoaded', function () {
    // Data object is passed from functions.php
    const { path } = data;
    loadBackground(`${path}/images/background-lines-1.png`, 'background-lines-1');
    loadBackground(`${path}/images/background-lines-2.png`, 'background-lines-2');
    loadBackground(`${path}/images/background-lines-3.png`, 'background-lines-3');
    loadBackground(`${path}/images/background-lines-full.png`, 'background-lines-full');
}, false);

// var templateUrl = object_name.templateUrl;