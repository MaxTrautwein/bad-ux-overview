const main = {
    SampleToggle: undefined,
    TeamToggle: undefined,
    Iframe: undefined,
    UrlDisplay: undefined,
    UpdateIframe(subdomain){
        const url = `${subdomain}.${this.Iframe.src.split("/")[2].split(".").slice(1).join(".")}`

        this.UrlDisplay.innerHTML = url;
        this.Iframe.src = `https://${url}`;
    },
    ConfigureProjectVisibility(){
        const allSamples = document.querySelectorAll(`[data-sample="1"]`);
        const allTeams = document.querySelectorAll(`[data-sample="0"]`);

        if(this.SampleToggle.checked){
            allSamples.forEach(el => {el.classList.remove('hidden');});
        }else {
            allSamples.forEach(el => {el.classList.add('hidden');});
        }
        if(this.TeamToggle.checked){
            allTeams.forEach(el => {el.classList.remove('hidden');});
        }else {
            allTeams.forEach(el => {el.classList.add('hidden');});
        }
    },
    init(){
        main.SampleToggle = document.querySelector('#toggle-sample');
        main.TeamToggle = document.querySelector('#toggle-team');
        main.Iframe = document.querySelector('iframe');
        main.UrlDisplay = document.querySelector('#iframeUrlDisplay');

        main.SampleToggle.addEventListener('change', (_) => {main.ConfigureProjectVisibility()});
        main.TeamToggle.addEventListener('change', (_) => {main.ConfigureProjectVisibility()});

        const elements = document.querySelectorAll('.app');
        elements.forEach(el => {
            el.addEventListener('click', (event) => {
                const data = event.currentTarget.dataset.subdomain;
                main.UpdateIframe(data);
                document.querySelector('.selectedApp').classList.remove('selectedApp');
                event.currentTarget.classList.add('selectedApp');
            });
        });
    }
}



document.addEventListener('DOMContentLoaded', main.init);