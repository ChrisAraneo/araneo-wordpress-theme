function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    const viewHeight = (window.innerHeight || document.documentElement.clientHeight);
    const viewWidth = (window.innerWidth || document.documentElement.clientWidth);

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom - (rect.bottom - rect.top) / 2.0 <= viewHeight &&
        rect.right <= viewWidth
    );
}

function initScrollAnimation() {
    const className = "scroll-script";
    const delay = 0.1;
    const duration = 0.5;

    const elements = document.querySelectorAll("h1, h2, h3, p");
    if (elements) {
        for (let i = 0; i < elements.length; ++i) {
            const element = elements[i];
            element.classList.add(className);
            if (isInViewport(element)) {
                element.style.transitionDuration = "0s"; // Reset
                element.style.transitionDuration = `${duration}s`;
                setTimeout(() => element.classList.add("visible"), delay * 1000);
            } else {
                element.style.transitionDuration = `${duration}s`;
            }
        }
    }

    document.addEventListener('scroll', (event) => {
        for (let i = 0; i < elements.length; ++i) {
            const element = elements[i];
            if (isInViewport(element)) {
                if (!element.classList.contains("visible")) {
                    element.classList.add("visible");
                }
            }
        }
    });
}


// document.addEventListener('load', (event) => scrollAnimationListener(elementsToUpdate, event));
// }

document.addEventListener('DOMContentLoaded', function () {
    initScrollAnimation();
}, false);