function initTypewriter() {
    const speed = 60;
    const dataClass = "typewriter";
    const dataString = "data-typewriter";
    const delayString = "data-delay";

    const elements = document.getElementsByClassName(dataClass);
    if (elements) {
        for (let i = 0; i < elements.length; ++i) {
            const element = elements[i];
            element.setAttribute(dataString, element.innerHTML);
            element.innerHTML = "&nbsp;"; // Dummy Text

            const timer = setInterval(
                () => {
                    const data = element.getAttribute(dataString);
                    const delay = element.getAttribute(delayString);

                    if (Number(delay) > 0) {
                        element.setAttribute(delayString, Math.floor(Number(delay) - 1));
                    } else {
                        if (data) {
                            const char = data.charAt(0);
                            if (element.innerHTML === "&nbsp;") {
                                element.innerHTML = char;
                            } else {
                                element.innerHTML += char;
                            }
                            element.setAttribute(dataString, data.substr(1, data.length));
                        } else {
                            clearInterval(timer);
                        }
                    }
                },
                speed
            );
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    initTypewriter();
}, false);