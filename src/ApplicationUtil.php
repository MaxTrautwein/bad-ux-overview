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

    public function displayAllApplications(){
        foreach ($this->apps as $app) {
            $this->displayApplication($app);
        }
    }

    function getUrl($subDomain)
    {
        return "https://" . $subDomain . "." . $this->baseUrl;
    }

    public function displayApplication($app){
        echo "<div class='app'>";

        echo "<h3>".$app->name."</h3>";
        echo "<a href='" . $this->getUrl($app->subdomain) ."'>".$app->subdomain."</a>";

    echo "</div>";
}



}




