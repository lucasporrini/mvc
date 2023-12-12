<html>
    <!-- head -->
    <? require_once RELATIVE_PATH_PARTIALS . "/head.php" ?>
    <body>
        <!-- header -->
        <? require_once RELATIVE_PATH_PARTIALS . "/header.php" ?>

        <!-- main -->
        <?= $this->section('content') ?>

        <!-- footer -->
        <? require_once RELATIVE_PATH_PARTIALS . "/footer.php" ?>

        <!-- scripts -->
        <? require_once RELATIVE_PATH_PARTIALS . "/scripts.php" ?>
    </body>
</html>