const main = {
    SampleToggle: undefined,
    TeamToggle: undefined,
    AgentToggle: undefined,
    Iframe: undefined,
    UrlDisplay: undefined,
    UpdateIframe(subdomain){
        const url = `${subdomain}.${this.Iframe.src.split("/")[2].split(".").slice(1).join(".")}`

        this.UrlDisplay.innerHTML = url;
        this.Iframe.src = `https://${url}`;
    },
    ConfigureProjectVisibility(){
        const allSamples = document.querySelectorAll(`[data-sample="1"]`);
        const allTeams = document.querySelectorAll(`[data-sample=""]`);
        const allAgents = document.querySelectorAll(`[data-agent="1"]`);

        let shouldBeHidden = []
        let shouldBeShown = []

        if(this.SampleToggle.checked){
            shouldBeShown.push(...allSamples);
        }else {
            shouldBeHidden.push(...allSamples);
        }
        if(this.TeamToggle.checked){
            shouldBeShown.push(...allTeams);
        }else {
            shouldBeHidden.push(...allTeams);
        }
        if(this.AgentToggle.checked){
            shouldBeShown.push(...allAgents);
        }else {
            shouldBeHidden.push(...allAgents);
        }

        shouldBeShown.forEach(el => {el.classList.remove('hidden');});
        shouldBeHidden.forEach(el => {el.classList.add('hidden');});

        if(!this.AgentToggle.checked){
            allAgents.forEach(el => {el.classList.add('hidden');});
        }
        if(this.AgentToggle.checked && !this.TeamToggle.checked && !this.SampleToggle.checked){
            allAgents.forEach(el => {el.classList.remove('hidden');});
        }

    },
    init(){
        main.SampleToggle = document.querySelector('#toggle-sample');
        main.TeamToggle = document.querySelector('#toggle-team');
        main.AgentToggle = document.querySelector('#toggle-agent');
        main.Iframe = document.querySelector('iframe');
        main.UrlDisplay = document.querySelector('#iframeUrlDisplay');

        main.SampleToggle.addEventListener('change', (_) => {main.ConfigureProjectVisibility()});
        main.TeamToggle.addEventListener('change', (_) => {main.ConfigureProjectVisibility()});
        main.AgentToggle.addEventListener('change', (_) => {main.ConfigureProjectVisibility()});

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