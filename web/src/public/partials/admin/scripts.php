<script src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"></script>
<?php
    // Si la page actuelle est la page d'administration
    if($_SERVER['REQUEST_URI'] == "/admin") {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="<?= BASE_URL ?>public/assets/js/chart.js"></script>
        <?php
    }
?>
<script src="<?= BASE_URL ?>public/assets/js/back.js"></script>