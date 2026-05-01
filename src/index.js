const main = {
    UpdateIframe(subdomain){
        const iframe = document.querySelector('iframe');
        const urlDisplay = document.querySelector('#iframeUrlDisplay');
        const url = `${subdomain}.${iframe.src.split("/")[2].split(".").slice(1).join(".")}`

        urlDisplay.innerHTML = url;
        iframe.src = `https://${url}`;
    },
    init(){


        const elements = document.querySelectorAll('.app');
        elements.forEach(el => {
            el.addEventListener('click', (event) => {
                const data = event.currentTarget.dataset.subdomain;
                main.UpdateIframe(data);
            });
        });
    }
}



document.addEventListener('DOMContentLoaded', main.init);