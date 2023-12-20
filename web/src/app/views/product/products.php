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
            <?php
                foreach($products as $product) {
            ?>
                <!-- ====== Template for product card start ====== -->
                <a href="/product/<?= $product['slug'] ?>" class="p-5 py-10 bg-blue-100 text-center rounded-l transform duration-500 hover:-translate-y-2 cursor-pointer">
                    <figure class="relative max-w-sm aspect-w-1 aspect-h-1">
                        <img class="rounded-lg w-full object-cover" src="<?= isset($product['photos'][0]['photo']) && !empty($product['photos'][0]['photo']) ? BASE_URL . "public/assets/uploads/product/" . $product['id'] . "/" . $product['photos'][0]['photo'] : BASE_URL . "public/assets/uploads/product/default/default.png" ?>" alt="">
                    </figure>
                    <div class="space-x-1 flex justify-center mt-5">
                        <?php for($i = 0; $i < $product['trust']; $i++) { ?>
                            <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                            </svg>
                        <?php
                            }

                            for($i = 0; $i < 5 - $product['trust']; $i++) {
                        ?>
                            <svg class="w-4 h-4 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 14 14">
                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                            </svg>
                        <?php } ?>
                    </div>
                    <h2 class="text-xl my-3 font-bold"><?= $product['title']; ?></h2>
                    <p class="mb-3"><?= $product['caption']; ?></p>
                    <div class="mb-3">
                        <?php if($product['quantity'] > 0) { ?>
                            <h2 class="">Quantité restante : <?= $product['quantity'] ?></h2>
                        <?php } else { ?>
                            <h2 class="text-red-500 font-bold">Rupture de stock</h2>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <h2 class="p-0 m-0 font-semibold"><?= $product['price_unite'] ?>€ (par <?= $product['unite'] ?>) <span class="p-0 m-0 font-semibold line-through"><?= $product['price_new'] ?>€</span></h2>
                    </div>
                    <?php
                        if($product['quantity'] > 0) {
                    ?>
                        <button class="p-2 px-6 bg-blue-500 text-white rounded-md hover:bg-blue-600">Réserver</button>
                    <?php
                        } else {
                    ?>
                        <button class="p-2 px-6 bg-gray-500 text-white rounded-md hover:bg-gray-600 cursor-not-allowed" disabled>Réserver</button>
                    <?php
                        }
                    ?>
                </a>
                    <!-- ====== Template for product card end ====== -->
            <?php
                }
            ?>
        </section>
    </section>
</main>