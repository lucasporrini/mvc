<?php
    $this->layout(
        '../template/page_template',
        [
            'title' => $this->e($title),
            'menu' => $menu
        ]
    );
?>

<main>
    <?php
        print_r($user);
    ?>
</main>

