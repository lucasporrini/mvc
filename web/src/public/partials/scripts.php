<script src="<?= BASE_URL ?>public/assets/js/header.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/cookies.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/product-slider.js"></script>
<?php
// If current page is home page
if($_SERVER['REQUEST_URI'] == "/") {
    ?>
    <script src="<?= BASE_URL ?>public/assets/js/home.js"></script>
    <?php
}
?>