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
    <div class="app-list-container" >
        <div id="app-list-header">
            <input type="checkbox" checked="checked" class="btn-check" id="toggle-sample" autocomplete="off">
            <label class="btn" for="toggle-sample"><span class='badge text-bg-secondary text-bg-info'>Sample</span></label>

            <input type="checkbox" checked="checked"  class="btn-check" id="toggle-team" autocomplete="off">
            <label class="btn" for="toggle-team"><span class='badge text-bg-secondary text-bg-success'>Team</span></label>
        </div>
        <div  class="app-list">
            <?php
            require_once 'ApplicationUtil.php';
            $util = new ApplicationUtil();
            $util->displayAllApplications();
            ?>
        </div>
    </div>
    <div class="preview">
        <h2 id="iframeUrlDisplay"><?php echo $util->FirstAppUrl(false) ?></h2>
        <iframe src="<?php echo $util->FirstAppUrl(true) ?>"></iframe>
    </div>
</main>
</body>
</html>
