<html>
    <!-- head -->
    <? require_once RELATIVE_PATH_PARTIALS . "/admin/head.php" ?>
    <body class="bg-gray-50 dark:bg-slate-900">
        <!-- header -->
        <? require_once RELATIVE_PATH_PARTIALS . "/admin/header.php" ?>

        <!-- main -->
        <?= $this->section('content') ?>

        <!-- footer -->
        <? require_once RELATIVE_PATH_PARTIALS . "/admin/footer.php" ?>

        <!-- scripts -->
        <? require_once RELATIVE_PATH_PARTIALS . "/admin/scripts.php" ?>
    </body>
</html>