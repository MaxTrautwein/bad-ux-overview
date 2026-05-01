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

    public function displayApplication($app){
        echo "<div class='app' data-subdomain='" . $app->subdomain . "'>";
        echo "<h3>";
        echo "<span class='badge text-bg-secondary text-bg-info'>";
        echo $app->sample ?  "sample" : "team";
        echo  "</span>";
        echo " ".$app->name;
        echo "</h3>";

        echo "<a target='_blank' href='" . $this->getUrl($app->subdomain) ."'>".$app->subdomain."</a>";

    echo "</div>";
}



}




