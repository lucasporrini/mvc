<?php
    $this->layout(
        '../template/page_template',
        [
            'title' => $this->e($title),
            'header_informations' => $header_informations,
        ]
    );
?>

<main>
    <section class="hero h-[91%]" style="background-image: url(<?= BASE_URL ?>public/assets/uploads/home/header.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-center text-neutral-content">
                <div class="max-w-xl">
                    <h2 class="mb-5 text-4xl font-bold">Reborn</h2>
                    <p class="mb-5 text-xl">Redonnons vie aux matériaux</p>
                    <button id="heroButton" class="btn btn-primary">C'est parti</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero section -->
    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <div class="container flex flex-col px-6 py-10 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-lg">
                    <h2 class="text-2xl font-semibold tracking-wide text-gray-800 lg:text-3xl">Pourquoi le réemploi avec Reborn ?</h2>
                    <p class="mt-4 text-gray-600">En passant par le réemploi pour vos besoins vous faites le bon choix :</p>
                    <div class="grid gap-6 mt-8 sm:grid-cols-2">
                        <div class="flex items-center text-gray-800 -px-3 dark:text-gray-200">
                            <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
    
                            <span class="mx-3">Réduisez de l'impact environnemental</span>
                        </div>
    
                        <div class="flex items-center text-gray-800 -px-3 dark:text-gray-200">
                            <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
    
                            <span class="mx-3">Réduisez votre dépense</span>
                        </div>
    
                        <div class="flex items-center text-gray-800 -px-3 dark:text-gray-200">
                            <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
    
                            <span class="mx-3">Soutenez l'économie locale</span>
                        </div>
    
                        <div class="flex items-center text-gray-800 -px-3 dark:text-gray-200">
                            <svg class="w-5 h-5 mx-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
    
                            <span class="mx-3">Consommez raisonnanlement</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                <img class="object-cover w-full h-full max-w-2xl rounded-md" src="<?= BASE_URL ?>public/assets/uploads/home/recycle.jpg" alt="benne de réemploi">
            </div>
        </div>
    </section>
    <!-- End Hero section -->

    <!-- Features -->
    <section id="statsSection" class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid gap-6 grid-cols-2 sm:gap-12 lg:grid-cols-3 lg:gap-8">
            <!-- Stats -->
            <div class="flex flex-col items-center">
                <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">Bilan carbone</h4>
                <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-green-600">99</p>
                <p class="mt-1 text-gray-500">kg d'émission carbone évitées</p>
            </div>
            <!-- End Stats -->

            <!-- Stats -->
            <div class="flex flex-col items-center">
                <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">Produits réemployés</h4>
                <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-green-600">2000+</p>
                <p class="mt-1 text-gray-500">grâce à Reborn</p>
            </div>
            <!-- End Stats -->

            <!-- Stats -->
            <div class="flex flex-col items-center">
                <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-gray-200">Recommandations par les utilisateurs</h4>
                <p class="mt-2 sm:mt-3 text-4xl sm:text-6xl font-bold text-green-600">85%</p>
                <p class="mt-1 text-gray-500">seulement cette année</p>
            </div>
            <!-- End Stats -->
        </div>
        <!-- End Grid -->
    </section>
    <!-- End Features -->

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12 mb-8">
                <!-- <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                        <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                    </svg>
                    Tutorial
                </a> -->
                <h2 class="text-gray-800 text-2xl md:text-3xl font-bold mb-2">Comment passer au réemploi ?</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Pour passer le pas du réemploi, il suffit de consulter notre catalogue et de trouver un produit qui vous servira et qui vous convient. Ensuite, vous nous appelez, on vous le met de côté et vous venez le voir en boutique voir s'il correspond à ce que vous voulez.</p>
                <a href="/products" class="inline-flex justify-center items-center group py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Voir tous nos produits
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180 group-hover:translate-x-1 transition ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
                    <!-- <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z"/>
                        </svg>
                        Design
                    </a> -->
                    <h2 class="text-gray-800 text-2xl md:text-3xl font-bold mb-2">Le réemploi plus précisemment ?</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Tu aimerais savoir ce qu'est le réemploi ou tu souhaites tout simplement en apprendre plus sur le sujet ?</p>
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">En savoir plus sur le réemploi
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    </a>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
                    <!-- <a href="#" class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15"/>
                        </svg>
                        Code
                    </a> -->
                    <h2 class="text-gray-800 text-2xl md:text-3xl font-bold mb-2">Nos processus</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Reborn c'est avant tout une expertise dans le réemploi de produits provenant du BTP, nous avons justement un article qui vous expliquera tout</p>
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Lire l'article
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="tabsSection" class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="relative p-6 md:p-16">
            <!-- Grid -->
            <div class="relative z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
                <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2">
                    <h2 class="text-2xl text-gray-800 font-bold sm:text-3xl dark:text-gray-200">
                        Reborn en 3 points clés
                    </h2>

                    <!-- Tab Navs -->
                    <nav class="grid gap-4 mt-5 md:mt-10" aria-label="Tabs" role="tablist">
                    <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 active" id="tabs-with-card-item-1" data-hs-tab="#tabs-with-card-1" aria-controls="tabs-with-card-1" role="tab">
                        <span class="flex">
                        <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"/><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"/><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"/><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"/><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"/></svg>
                        <span class="grow ms-6">
                            <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Innovation</span>
                            <span class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Première plateforme de réemploi d'entreprise par une entreprise pour les particuliers</span>
                        </span>
                        </span>
                    </button>

                    <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" id="tabs-with-card-item-2" data-hs-tab="#tabs-with-card-2" aria-controls="tabs-with-card-2" role="tab">
                        <span class="flex">
                        <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/></svg>
                        <span class="grow ms-6">
                            <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Recyclage</span>
                            <span class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Il est important de concidérer nos déchets et de les minimiser, c'est pourquoi Reborn les remets au goût du jour</span>
                        </span>
                        </span>
                    </button>

                    <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-slate-900 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" id="tabs-with-card-item-3" data-hs-tab="#tabs-with-card-3" aria-controls="tabs-with-card-3" role="tab">
                        <span class="flex">
                        <svg class="flex-shrink-0 mt-2 h-6 w-6 md:w-7 md:h-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
                        <span class="grow ms-6">
                            <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-gray-200">Réemploi</span>
                            <span class="block mt-1 text-gray-800 dark:hs-tab-active:text-gray-200 dark:text-gray-200">Réutiliser. Economiser. Gagner.</span>
                        </span>
                        </span>
                    </button>
                    </nav>
                    <!-- End Tab Navs -->
                </div>
                <!-- End Col -->

                <div class="lg:col-span-6">
                    <div class="relative">
                    <!-- Tab Content -->
                    <div>
                        <div id="tabs-with-card-1" role="tabpanel" aria-labelledby="tabs-with-card-item-1">
                        <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/[.2]" src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&h=1220&q=80" alt="Image Description">
                        </div>

                        <div id="tabs-with-card-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-2">
                        <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/[.2]" src="https://images.unsplash.com/photo-1665686306574-1ace09918530?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&h=1220&q=80" alt="Image Description">
                        </div>

                        <div id="tabs-with-card-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-3">
                        <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/[.2]" src="https://images.unsplash.com/photo-1598929213452-52d72f63e307?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&h=1220&q=80" alt="Image Description">
                        </div>
                    </div>
                    <!-- End Tab Content -->

                    <!-- SVG Element -->
                    <div class="hidden absolute top-0 end-0 translate-x-20 md:block lg:translate-x-20">
                        <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <!-- End SVG Element -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->

            <!-- Background Color -->
            <div class="absolute inset-0 grid grid-cols-12 w-full h-full">
                <div class="col-span-full lg:col-span-7 lg:col-start-6 bg-gray-100 w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full dark:bg-white/[.075]"></div>
            </div>
            <!-- End Background Color -->
        </div>
    </section>
    <!-- End Features -->

</main>

