<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overview</title>
    <link href="index.css" rel="stylesheet">
</head>
<body>
<h1>Overview</h1>
<?php
require_once 'ApplicationUtil.php';

$util = new ApplicationUtil();
$util->displayAllApplications();



?>
</body>
</html>
