function initTags() {
    const hostname = window.location.hostname;
    const links = document.getElementsByTagName("a");
    for (let i = 0; i < links.length; ++i) {
        const link = links[i];
        const href = link.getAttribute("href");
        if (href == "?tag") {
            const name = String(link.innerHTML).toLowerCase().replace(" ", "-");
            link.setAttribute("href", `https://${hostname}/tag/${name}`);
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    initTags();
}, false);