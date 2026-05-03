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

    public function FirstAppUrl($https = true): string
    {
        return $this->getUrl($this->apps[0]->subdomain,$https);
    }

    public function displayAllApplications(): void
    {
        $first = true;
        foreach ($this->apps as $app) {
            $this->displayApplication($app, $first);
            $first = false;
        }
    }

    function getUrl($subDomain, $https = true): string
    {
        $url = $subDomain . "." . $this->baseUrl;
        if ($https) {
            return "https://" . $url;
        }
        return $url;
    }

    function GetGithubUrl($imageUrl): string
    {
        if ($imageUrl == ""){
            return "";
        }
        return "https://github.com/" . implode('/', array_slice(explode('/',$imageUrl), 1));
    }

    public function echoTypeBadge(bool $isTypeSample): void
    {
        echo "<span class='badge " . ($isTypeSample ?  "text-bg-info" : "text-bg-success") . " text-bg-secondary'>";
        echo $isTypeSample ?  "Sample" : "Team";
        echo  "</span>";

    }
    function echoProjectHeader($app): void
    {
        echo "<h3>";
        $this->echoTypeBadge($app->sample);
        echo  " ". $app->name ."</h3>";
    }


    public function displayApplication($app, bool $isFirst = false): void
    {
        echo "<div class='app ". ($isFirst ? "selectedApp" : "") ."' data-subdomain='" . $app->subdomain . "' data-sample='". $app->sample . "' >";
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




