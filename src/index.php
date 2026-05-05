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
<header>
    <h1>Overview</h1>
</header>
<main>
    <?php
    require_once 'ApplicationUtil.php';
    $util = new ApplicationUtil();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 column-1-minWidth">
                <input type="checkbox" checked="checked" class="btn-check" id="toggle-sample" autocomplete="off">
                <label class="btn" for="toggle-sample">
                    <?php $util->echoTypeBadge(true); ?>
                </label>

                <input type="checkbox" checked="checked" class="btn-check" id="toggle-team" autocomplete="off">
                <label class="btn" for="toggle-team">
                    <?php $util->echoTypeBadge(false); ?>
                </label>

                <input type="checkbox" checked="checked" class="btn-check" id="toggle-agent" autocomplete="off">
                <label class="btn" for="toggle-agent">
                    <?php $util->echoAgentBadge(true); ?>
                </label>
            </div>
            <div class="col">
                <h2 id="iframeUrlDisplay"><?php echo $util->FirstAppUrl(false) ?></h2>
            </div>
        </div>
        <div class="row h-100">
            <div class="col-3 max-h-100 column-1-minWidth">
                <div class="app-list max-h-100">
                    <?php
                    $util->displayAllApplications();
                    ?>
                </div>
            </div>
            <div class="col">
                    <iframe src="<?php echo $util->FirstAppUrl(true) ?>"></iframe>
            </div>
        </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>
