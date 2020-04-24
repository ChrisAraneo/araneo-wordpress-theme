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
                window.IMAGES_LOADED++;
                // Need to edit base64 string
                const base64svg = base64.replace("data:text/html;", "data:image/svg+xml;");
                localStorage.setItem(src, base64svg);
                setBackground(base64svg, className);
                updateLoading();
            });
        } else {
            window.IMAGES_LOADED++;
            setBackground(item, className);
            updateLoading();
        }
    }
    // If local storage is not supported
    // image will fetch every time
    else {
        fetchImageBase64(src, () => {
            setBackground(item, className);
        });
    }
}

function updateLoading() {
    const string = `Ładowanie... ${window.IMAGES_LOADED} / ${window.IMAGES_MAX}`;
    console.log(string);

    // // BLACK LAYER ON PAGE... RIGHT NOW IT IS DISABLED
    // if (window.IMAGES_LOADED < window.IMAGES_MAX || window.IMAGES_LOADED == 0) {
    //     const layer = document.getElementById("layer-loading");
    //     if (layer.children.length < 1) {
    //         const p = document.createElement("p");
    //         p.style.color = "rgba(255,255,255,0.6)";
    //         p.style.textAlign = "center";
    //         layer.appendChild(p);
    //         p.innerHTML = string;
    //     } else {
    //         if (layer.children[0]) {
    //             const p = layer.children[0];
    //             p.innerHTML = string;
    //         }
    //     }
    // } else {
    //     const pages = document.getElementsByClassName("page");
    //     for (let i = 0; i < pages.length; ++i) {
    //         const page = pages[i];
    //         if (!page.classList.contains("animation-opacity")) {
    //             page.classList.add("animation-opacity");
    //         }
    //     }
    //     const layer = document.getElementById("layer-loading");
    //     if (layer) {
    //         layer.remove();
    //     }
    // }
}


document.onreadystatechange = function (e) {
    if (document.readyState === 'complete') {
        // Data object is passed from functions.php
        const { path } = data;

        window.IMAGES_LOADED = 0;
        window.IMAGES_MAX = 4;

        loadBackground(`${path}/images/background-lines-1.svg`, 'background-lines-1');
        loadBackground(`${path}/images/background-lines-2.svg`, 'background-lines-2');
        loadBackground(`${path}/images/background-lines-3.svg`, 'background-lines-3');
        loadBackground(`${path}/images/background-lines-full.svg`, 'background-lines-full');
        updateLoading();
    }
};




