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
    <?php //echo "<pre>";print_r($product);echo "</pre>"; ?>
    <section class="py-10 dark:bg-gray-800">
        <div class="max-w-6xl px-4 mx-auto">
            <div class="flex flex-wrap mb-24 -mx-4">
                <div class="w-full px-4 mb-8 md:w-1/2 md:mb-0">
                    <div class="sticky top-0 overflow-hidden ">
                        <div class="relative mb-6 lg:mb-10 lg:h-96">
                            <!-- <a class="absolute left-0 transform lg:ml-2 top-1/2 translate-1/2" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-7 h-7 text-gray-500 bi bi-chevron-left bg-white rounded-sm p-1 hover:text-green-400" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                </svg>
                            </a> -->
                            <img id="mainImage" class="object-contain w-full lg:h-full rounded-sm transition duration-300 ease-in-out" src="<?= !empty($product['photos'][0]) ? BASE_URL . "public/assets/uploads/product/" . $product['id'] . "/" . $product['photos'][0]['photo'] : BASE_URL . "public/assets/uploads/product/default/default.png" ?>" alt="">
                            <!-- <a class="absolute right-0 transform lg:mr-2 top-1/2 translate-1/2" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-7 h-7 text-gray-500 bi bi-chevron-right bg-white rounded-sm p-1 hover:text-green-400" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                            </a> -->
                        </div>
                        <div class="flex-wrap hidden -mx-2 md:flex">
                            <?php foreach ($product['photos'] as $photo) : ?>
                                <div class="w-1/2 p-2 sm:w-1/4">
                                    <a class="block rounded-sm border hover:border-gray-400 <?= $photo['photo'] == $product['photos'][0]['photo'] ? "border-green-400" : "border-gray-200" ?>" href="#" data-image-src="<?= BASE_URL . "public/assets/uploads/product/" . $product['id'] . "/" . $photo['photo'] ?>">
                                        <img class="object-contain w-full lg:h-28" src="<?= BASE_URL . "public/assets/uploads/product/" . $product['id'] . "/" . $photo["photo"] ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="">
                        <div class="mb-10">
                            <h2 class="flex items-center max-w-xl mt-6 mb-3 text-xl font-semibold leading-loose tracking-wide text-gray-700 md:text-2xl dark:text-gray-300">
                                <?= $product['title'] ?>
                                <?php
                                    // Calcul de la différence entre $product['created_at] et la date actuelle
                                    $date = new DateTime($product['created_at']);
                                    $now = new DateTime();
                                    $interval = $now->diff($date);

                                    // Si la différence est inférieure à 7 jours, on affiche le badge "Nouveauté"
                                    if($interval->days < 7) {
                                ?>
                                    <span class="ml-3 px-2.5 py-0.5 text-xs text-green-600 bg-green-200 rounded-xl">Nouveauté</span>
                                <?php
                                    }
                                ?>
                            </h2>
                            <div class="flex flex-wrap items-center mb-6">
                                <ul class="flex mb-4 mr-2 lg:mb-0">
                                    <?php for($i = 0; $i < $product['trust']; $i++) { ?>
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
                                                <svg class="w-4 h-4 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                    <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <a class="mb-4 text-xs underline hover:text-gray-500 lg:mb-0 tooltip" href="#" data-tip="L'indice de confiance est un chiffre allant de 1 à 5 qui permet d'estimer  la fiabilité d'un produit. Il est à titre indictif.">
                                    Qu'est ce que l'indice de confiance ?
                                </a>
                            </div>
                            <p class="inline-block text-2xl font-semibold text-gray-700 ">
                                <span><?= $product['price_unite'] ?>€ (par <?= $product['unite'] ?>)</span>
                                <span class="ml-3 text-xl font-normal text-gray-500 line-through"><?= $product['price_new'] ?>€</span>
                            </p>
                        </div>
                        <div class="mb-6">
                            <div class="mb-6">
                                <div class="rounded-xl">
                                    <div class="p-3 lg:p-6">
                                        <h3 class="text-xs font-semibold uppercase text-gray-500 mb-4">Mensurations :</h3>
                                        <div class="flex flex-wrap gap-x-10 gap-y-4">
                                            <?php
                                                foreach ($product as $key => $value) :
                                                    if($key != "title" && $key != "id" && $key != "caption" && $key != "carbon_footprint" && $key != "price_new" && $key != "price_unite" && $key != "unite" && $key != "trust" && $key != "created_at" && $key != "slug" && $key != "photos" && $key != "category_id" && $key != "storage_location" && $key != "location_id" && $key != "available" && $key != "availability_date" && $key != "active" && $key != "booked" && $key != "description" && $key != "quantity" && $key != "brand" && $key != "reference" && $key != "material" && $key != "assembly" && $key != "code_article" && $key != "state" && $key != "sold_at" && $key != "sold") :
                                            ?>
                                                        <div class="w-full mb-4 md:w-2/5">
                                                            <div class="flex ">
                                                                <span class="mr-3 text-gray-500">
                                                                    <?= findSVGByName($key); ?>
                                                                </span>
                                                                <div>
                                                                    <p class="mb-2 text-sm font-medium text-gray-500">
                                                                        <?= isset($translates[$key]) ? ucfirst($translates[$key]) : ucfirst($key) ?>
                                                                    </p>
                                                                    <h2 class="text-base font-semibold text-gray-700">
                                                                        <?php
                                                                            echo $value . " ";
                                                                            if ($key == "weight") {
                                                                                echo "kg";
                                                                            } else if ($key == "packaging") {
                                                                                continue;
                                                                            } else {
                                                                                echo "m";
                                                                            }
                                                                        ?>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                            <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mb-6 lg:p-6 border-t border-b border-gray-200">                                   
                                    <?php if($product['quantity'] < 5 && $product['quantity'] > 1 && $product['booked'] == 0): ?>
                                        <span class="mb-2 text-red-500 font-bold">Il n'en reste que <?= $product['quantity'] ?> !</span>
                                    <?php elseif($product['quantity'] == 1): ?>
                                        <span class="mb-2 text-red-500 font-bold">Dernier article en stock !</span>
                                    <?php elseif($product['quantity'] > 5): ?>
                                        <span class="font-bold text-green-500">En stock</span>
                                    <?php elseif($product['quantity'] == 0): ?>
                                        <span class="font-bold text-red-500">Rupture de stock</span>
                                    <?php elseif($product['booked'] == 1): ?>
                                        <span class="font-bold text-yellow-500">Réservé</span>
                                    <?php endif; ?>
                                    <p class="mt-2 text-sm text-gray-600 font-bold">
                                        <span class="text-gray-600 font-normal">L'article est disponible <?= $product['storage_location'] == "chantier" ? "sur </span>" . $product['storage_location'] : "à notre </span>" . $product['storage_location'] ?>
                                    </p>
                                    <?php if($product['storage_location'] == "chantier"): ?>
                                        <p class="mt-2 text-sm text-gray-600">L'article est pour le moment sur un chantier à <span class="font-bold"><?= $location['place'] ?></span>. Quand il sera disponible au retrait, plus ample informations vous serons communiquées.</p>
                                    <?php elseif($product['storage_location'] == "dépôt"): ?>
                                        <p class="mt-2 text-sm text-gray-600"><?= $location ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="p-3 lg:p-6 flex gap-4 mb-6">
                                    <a href="#" class="w-full px-4 py-3 text-center text-gray-100 bg-blue-400 border border-transparent hover:bg-blue-600 rounded-xl <?= $product['quantity'] == 0 || $product['booked'] == 1 || $product['sold'] == 1 ? 'bg-gray-500 text-white hover:bg-gray-600 cursor-not-allowed" disabled' : "" ?>">
                                        J'appelle pour réserver 🚀
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900"><?= $product['title'] ?></h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"><?= $product['caption'] ?></p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Brand</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= ucfirst($product['brand']) ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Matériaux</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= ucfirst($product['material'] )?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Montage</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= ucfirst($product['assembly']) ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Quantité disponible</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= ucfirst($product['quantity']) ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Description</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= ucfirst($product['description']) ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Pièce(s) jointe(s)</dt>
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex w-0 flex-1 items-center">
                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">reborn_disclaimer.pdf</span>
                                            <span class="flex-shrink-0 text-gray-400">2.4mb</span>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="<?= BASE_URL ?>public/assets/uploads/files/reborn_disclaimer.pdf" class="font-medium text-indigo-600 hover:text-indigo-500" download>Télécharger</a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>
</main>