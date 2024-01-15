<?php
    $this->layout(
        '../template/admin_template',
        [
            'title' => $this->e($title),
            'header_informations' => $header_informations,
        ]
    );
?>

<!-- Content -->
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
    <!-- Page Heading -->
    <div style="width: 200 !important">
        <canvas id="productChart"></canvas>
    </div>
    <!-- End Page Heading -->
  </div>
  <!-- End Content -->