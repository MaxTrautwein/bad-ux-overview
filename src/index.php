<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overview</title>
    <link href="lib/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap.bundle.min.js"></script>
    <link href="index.css?v=<?php echo filemtime('index.css'); ?>" rel="stylesheet">
    <script src="index.js?v=<?php echo filemtime('index.js'); ?>"></script>
</head>
<body>
<h1>Overview</h1>
<main>
    <div class="app-list">
        <?php
        require_once 'ApplicationUtil.php';
        $util = new ApplicationUtil();
        $util->displayAllApplications();
        ?>
    </div>
    <div class="preview">
        <h2 id="iframeUrlDisplay"><?php echo $util->FirstAppUrl(false) ?></h2>
        <iframe src="<?php echo $util->FirstAppUrl(true) ?>"></iframe>
    </div>
</main>
</body>
</html>
