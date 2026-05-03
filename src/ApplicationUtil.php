<?php

class ApplicationUtil {
    private $apps;
    private $baseUrl;
    function __construct() {
        if (file_exists("/mnt/sample.json")) {
            $data = json_decode(file_get_contents("/mnt/sample.json"), false);
            $this->apps = $data->apps;
            $this->baseUrl = $data->BaseUrl;
        }
    }

    public function FirstAppUrl($https = true) {
        return $this->getUrl($this->apps[0]->subdomain,$https);
    }

    public function displayAllApplications(){
        foreach ($this->apps as $app) {
            $this->displayApplication($app);
        }
    }

    function getUrl($subDomain, $https = true)
    {
        $url = $subDomain . "." . $this->baseUrl;
        if ($https) {
            return "https://" . $url;
        }
        return $url;
    }

    function GetGithubUrl($imageUrl)
    {
        if ($imageUrl == ""){
            return "";
        }
        return "https://github.com/" . implode('/', array_slice(explode('/',$imageUrl), 1));
    }

    function echoTypeBadge($type){
        echo "<span class='badge " . ($type ?  "text-bg-info" : "text-bg-success") . " text-bg-secondary'>";
    }
    function echoProjectHeader($app){
        echo "<h3>";
        $this->echoTypeBadge($app->sample);
        echo $app->sample ?  "sample" : "team";
        echo  "</span> ". $app->name ."</h3>";
    }

    public function displayApplication($app){
        echo "<div class='app' data-subdomain='" . $app->subdomain . "' data-sample='". $app->sample . "' >";
        $this->echoProjectHeader($app);

        echo "<div class='container ProjectContent'>";

        echo "<a target='_blank' href='" . $this->getUrl($app->subdomain) ."'><div class='viewPage'>View Page</div></a>";

        if (isset($app->image)){
            echo "<a target='_blank' href='" . $this->GetGithubUrl($app->image)
                . "'><img src='images/GitHub_Invertocat_White_Clearspace.svg' class='gitLink' alt='link to github repository'/></a>";
        }
        echo "</div>";

        
    echo "</div>";
}



}




