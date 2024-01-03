<?php
    $this->layout(
        '../template/page_template',
        [
            'title' => $this->e($title),
            'header_informations' => $header_informations
        ]
    );
?>

<main>
    <h1 class="text-center text-xl font-bold"><?= $this->e($title_in_page) ?></h1>
    <section class="container mx-auto p-10 md:py-12 px-0 md:p-8 md:px-0">
        <section class="p-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10 items-start ">
            <?php foreach($products as $product): ?>
                <a href="/product/<?= $product['slug'] ?>" class="border border-gray-200 rounded-md dark:border-none">
                    <div class="bg-gray-200 ">
                        <img src="<?= isset($product['photos'][0]['photo']) && !empty($product['photos'][0]['photo']) ? BASE_URL . "public/assets/uploads/product/" . $product['id'] . "/" . $product['photos'][0]['photo'] : BASE_URL . "public/assets/uploads/product/default/default.png" ?>" class="object-cover w-full h-56 mx-auto" alt="">
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-900">
                        <h3 class="mb-2 text-xl font-medium dark:text-gray-400">
                            <?= $product['title']; ?>
                        </h3>
                        <?= $product['quantity'] > 0 ? '<div class="mb-2 text-green-500 font-bold dark:text-green-400">En stock</div>' : '<div class="mb-2 text-red-500 font-bold dark:text-red-400">Rupture de stock</div>' ?>
                        <div class="flex justify-between mb-2">
                            <p class="mb-2 text-lg text-gray-600 dark:text-gray-400 ">
                                <span><?= $product['price_unite'] ?> € (par <?= $product['unite'] ?>) <span class="p-0 m-0 line-through"><?= $product['price_new'] ?>€</span></span>
                            </p>
                            <ul class="flex ">
                                <?php for($i = 0; $i < $product['trust']; $i++): ?>
                                    <li>
                                        <div>
                                            <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                            </svg>
                                        </div>
                                    </li>
                                <?php
                                    endfor;

                                    for($i = 0; $i < 5 - $product['trust']; $i++):
                                ?>
                                    <li>
                                        <div>
                                            <svg class="w-4 h-4 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                            </svg>
                                        </div>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <div class="flex justify-center items-center">
                            <button class=<?= $product['quantity'] > 0 ? '"p-2 px-6 bg-blue-500 text-white rounded-md hover:bg-blue-600 bg-blue-500 hover:bg-blue-600"' : '"p-2 px-6 bg-blue-500 text-white rounded-md hover:bg-blue-600 bg-gray-500 hover:bg-gray-600 cursor-not-allowed" disabled' ?>>
                                Réserver 🚀
                            </button>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>
    </section>
</main>