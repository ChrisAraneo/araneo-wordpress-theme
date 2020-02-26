function fetchImageBase64(src, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        var reader = new FileReader();
        reader.onloadend = function () {
            callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', src);
    xhr.responseType = 'blob';
    xhr.send();
}

function setBackground(base64, className) {
    const elements = document.getElementsByClassName(className);
    if (elements) {
        for (let i = 0; i < elements.length; ++i) {
            const element = elements[i];
            element.setAttribute("style", `background-image: url("${base64}");background-repeat: no-repeat;background-size: 100% 100%;background-position: left bottom;`);
        }
    }
    const befores = document.getElementsByClassName(`${className}-outer`);
    if (befores) {
        for (let i = 0; i < befores.length; ++i) {
            const before = befores[i];
            before.classList.add("background-gradient");
        }
    }
}

function loadBackground(src, className) {
    // If local storage is supported
    // we will fetch image and save it in storage
    if (typeof (Storage) !== "undefined") {
        const item = localStorage.getItem(src);
        if (!item) {
            fetchImageBase64(src, (base64) => {
                localStorage.setItem(src, base64);
                setBackground(base64, className);
            });
        } else {
            setBackground(item, className);
        }
    }
    // If local storage is not supported
    // image will fetch every time
    else {
        fetchImageBase64(src, (base64) => {
            setBackground(item, className);
        });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // Data object is passed from functions.php
    const { path } = data;
    loadBackground(`${path}/images/background-lines-1.png`, 'background-lines-1');
    loadBackground(`${path}/images/background-lines-2.png`, 'background-lines-2');
    loadBackground(`${path}/images/background-lines-3.png`, 'background-lines-3');
    loadBackground(`${path}/images/background-lines-full.png`, 'background-lines-full');
}, false);