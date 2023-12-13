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
    <?php //echo "<pre>";print_r($product);echo "</pre>"; ?>
    <section class="py-10 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 mx-auto">
            <div class="flex flex-wrap mb-24 -mx-4">
                <div class="w-full px-4 mb-8 md:w-1/2 md:mb-0">
                    <div class="sticky top-0 overflow-hidden ">
                        <div class="relative mb-6 lg:mb-10 lg:h-96">
                            <a class="absolute left-0 transform lg:ml-2 top-1/2 translate-1/2" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 text-red-500 bi bi-chevron-left dark:text-red-200" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                </svg>
                            </a>
                            <img class="object-contain w-full lg:h-full" src="https://i.postimg.cc/0jwyVgqz/Microprocessor1-removebg-preview.png" alt="">
                            <a class="absolute right-0 transform lg:mr-2 top-1/2 translate-1/2" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 text-red-500 bi bi-chevron-right dark:text-red-200" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="flex-wrap hidden -mx-2 md:flex">
                            <div class="w-1/2 p-2 sm:w-1/4">
                                <a class="block border border-gray-200 hover:border-red-400 dark:border-gray-700 dark:hover:border-red-300" href="#">
                                    <img class="object-contain w-full lg:h-28" src="https://i.postimg.cc/Z5KhRkD6/download-1-removebg-preview.png" alt="">
                                </a>
                            </div>
                            <div class="w-1/2 p-2 sm:w-1/4">
                                <a class="block border border-gray-200 hover:border-red-400 dark:border-gray-700 dark:hover:border-red-300" href="#">
                                    <img class="object-contain w-full lg:h-28" src="https://i.postimg.cc/8kJBrw03/download-removebg-preview.png" alt="">
                                </a>
                            </div>
                            <div class="w-1/2 p-2 sm:w-1/4">
                                <a class="block border border-gray-200 hover:border-red-400 dark:border-gray-700 dark:hover:border-red-300" href="#">
                                    <img class="object-contain w-full lg:h-28" src="https://i.postimg.cc/0jwyVgqz/Microprocessor1-removebg-preview.png" alt="">
                                </a>
                            </div>
                            <div class="w-1/2 p-2 sm:w-1/4">
                                <a class="block border border-gray-200 hover:border-red-400 dark:border-gray-700 dark:hover:border-red-300" href="#">
                                    <img class="object-contain w-full lg:h-28" src="https://i.postimg.cc/0N4Kk1PN/black-microprocessors-removebg-preview.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20">
                        <div class="mb-6 ">
                            <h2 class="max-w-xl mt-6 mb-6 text-xl font-semibold leading-loose tracking-wide text-gray-700 md:text-2xl dark:text-gray-300">
                                <?= $product['title'] ?>
                                <?php
                                    // Calcul de la différence entre $product['created_at] et la date actuelle
                                    $date = new DateTime($product['created_at']);
                                    $now = new DateTime();
                                    $interval = $now->diff($date);

                                    // Si la différence est inférieure à 7 jours, on affiche le badge "Nouveauté"
                                    if($interval->days < 7) {
                                ?>
                                    <span class="px-2.5 py-0.5 text-xs text-red-600 bg-red-100 dark:bg-gray-700 rounded-xl dark:text-gray-200">Nouveauté</span>
                                <?php
                                    }
                                ?>
                            </h2>
                            <div class="flex flex-wrap items-center mb-6">
                                <ul class="flex mb-4 mr-2 lg:mb-0">
                                    <?php
                                        for($i = 0; $i < $product['trust']; $i++) {
                                    ?>
                                        <li>
                                            <a href="#">
                                                <svg class="w-4 h-4 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                    <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php
                                        }

                                        for($i = 0; $i < 5 - $product['trust']; $i++) {
                                    ?>
                                        <li>
                                            <a href="#">
                                                <svg class="w-4 h-4 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 14 14">
                                                    <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                                <a class="mb-4 text-xs underline hover:text-red-600 dark:hover:text-gray-300 lg:mb-0" href="#">
                                    Qu'est ce que l'indice de confiance ?
                                </a>
                            </div>
                            <p class="inline-block text-2xl font-semibold text-gray-700 ">
                                <span><?= $product['price_unite'] ?>€ (par <?= $product['unite'] ?>)</span>
                                <span class="ml-3 text-base font-normal text-gray-500 line-through"><?= $product['price_new'] ?>€</span>
                            </p>
                         </div>
                        <div class="mb-6">
                            <h2 class="mb-2 text-lg font-bold text-gray-700">Informations techniques :</h2>
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-xl">
                                <div class="p-3 lg:p-5 ">
                                    <div class="p-2 rounded-xl lg:p-6 dark:bg-gray-800 bg-gray-50">
                                        <div class="flex flex-wrap justify-center gap-x-10 gap-y-4">
                                            <?php
                                                if(isset($product['height']) && $product['height'] != null) :
                                            ?>
                                                    <div class="w-full mb-4 md:w-2/5">
                                                        <div class="flex ">
                                                            <span class="mr-3 text-gray-500">
                                                                <?= findSVGByName("double_arrow") ?>
                                                            </span>
                                                            <div>
                                                                <p class="mb-2 text-sm font-medium text-gray-500">
                                                                    Hauteur
                                                                </p>
                                                                <h2 class="text-base font-semibold text-gray-700">
                                                                    12 Cores
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                endif;
                                            ?>
                                            <div class="w-full mb-4 md:w-2/5">
                                                <div class="flex ">
                                                    <span class="mr-3 text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gpu-card w-7 h-7" viewBox="0 0 16 16">
                                                            <path d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"></path>
                                                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5Zm5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0Z"></path>
                                                            <path d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5v-1Zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5Z"></path>
                                                        </svg>
                                                    </span>
                                                        <div>
                                                            <p class="mb-2 text-sm font-medium text-gray-500">
                                                                Graphic
                                                            </p>
                                                            <h2 class="text-base font-semibold text-gray-700">
                                                                Intel UHD
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mb-4 lg:mb-0 md:w-2/5">
                                                    <div class="flex ">
                                                        <span class="mr-3 text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-7 h-7 bi bi-cpu" viewBox="0 0 16 16">
                                                                <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"></path>
                                                            </svg>
                                                        </span>
                                                        <div>
                                                            <p class="mb-2 text-sm font-medium text-gray-500">
                                                                Processor
                                                            </p>
                                                            <h2 class="text-base font-semibold text-gray-700">
                                                                INTEL 80486
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full mb-4 lg:mb-0 md:w-2/5">
                                                    <div class="flex ">
                                                        <span class="mr-3 text-gray-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history w-7 h-7" viewBox="0 0 16 16">
                                                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"></path>
                                                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"></path>
                                                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"></path>
                                                            </svg>
                                                        </span>
                                                        <div>
                                                            <p class="mb-2 text-sm font-medium text-gray-500">
                                                                Frequency
                                                            </p>
                                                            <h2 class="text-base font-semibold text-gray-700">
                                                                3.5 GHz
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6 mb-6 border-t border-b border-gray-200">
                                <?php
                                    if($product['quantity'] < 1 && $product['booked'] == 0) {
                                ?>
                                    <span class="mb-2 text-red-500 font-bold">Rupture de stock</span>
                                    <?php
                                    } else {
                                        ?>
                                    <span class="text-base text-gray-600">En stock</span>
                                    <p class="mt-2 text-sm text-red-500">
                                        <span class="text-gray-600">L'article est disponible <?= $product['storage_location'] == "chantier" ? "sur </span>" . $product['storage_location'] : "à notre </span>" . $product['storage_location'] ?>
                                        <span class="text-gray-600">
                                            Most customers receive within 3-31 days.
                                        </span>
                                    </p>
                                    <?php
                                        if($product['storage_location'] == "chantier") {
                                    ?>
                                        <p class="mt-2 text-sm text-gray-600">Info chantier</p>
                                    <?php
                                        }
                                    ?>
                                <?php
                                    }
                                ?>
                                </div>
                                <div class="flex gap-4 mb-6">
                                    <a href="#" class="w-full px-4 py-3 text-center text-gray-100 bg-blue-400 border border-transparent hover:bg-blue-600 rounded-xl">
                                        Reserver maintenant
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>