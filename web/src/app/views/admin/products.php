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
    <!-- Page Tabs -->
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
        <li class="me-2">
            <a href="?page=products" aria-current="page" class="inline-block p-4 rounded-t-lg <?= $page == 'products' ? 'text-blue-600 bg-gray-100 active' : 'hover:text-gray-600 hover:bg-gray-50' ?>">Tous les produits</a>
        </li>
        <li class="me-2">
            <a href="?page=add-product" class="inline-block p-4 rounded-t-lg <?= $page == 'add-product' ? 'text-blue-600 bg-gray-100 active' : 'hover:text-gray-600 hover:bg-gray-50' ?>">Ajouter un produit</a>
        </li>
        <li class="me-2">
            <a href="?page=edit-product" class="inline-block p-4 rounded-t-lg <?= $page == 'edit-product' ? 'text-blue-600 bg-gray-100 active' : 'hover:text-gray-600 hover:bg-gray-50' ?>">Modifier un produit</a>
        </li>
        <li class="me-2">
            <a href="?page=delete-product" class="inline-block p-4 rounded-t-lg <?= $page == 'delete-product' ? 'text-blue-600 bg-gray-100 active' : 'hover:text-gray-600 hover:bg-gray-50' ?>">Désactiver un produit</a>
        </li>
    </ul>
    <!-- End Page Tabs -->

    <!-- Imported section -->
    <? require_once RELATIVE_PATH_PARTIALS . "/admin/page-section/" . $page . ".php" ?>
    <!-- End Imported section -->
  </div>
  <!-- End Content -->