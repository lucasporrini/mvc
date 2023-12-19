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
    <!-- Hero section -->
    <div class="flex justify-center p-10">
        <div class="diff aspect-[16/9] w-[50%] rounded">
            <div class="diff-item-1">
                <img alt="daisy" src="<?= BASE_URL ?>/public/assets/uploads/home/new.png" />
                <div class="text-green-400 text-9xl font-black grid place-content-center">
                    Après
                </div>
            </div>
            <div class="diff-item-2">
                <img alt="daisy" src="<?= BASE_URL ?>/public/assets/uploads/home/old.png" />
                <div class="text-primary-content text-9xl font-black grid place-content-center">
                    Avant
                </div>
            </div>
            <div class="diff-resizer">
            </div>
        </div>
    </div>

    <!-- Statistic cards -->
    <div class="flex justify-center p-10">
        <div class="stats shadow">
            <div class="stat">
                <div class="stat-figure text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="stat-title">Downloads</div>
                <div class="stat-value">31K</div>
                <div class="stat-desc">Jan 1st - Feb 1st</div>
            </div>
            
            <div class="stat">
                <div class="stat-figure text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <div class="stat-title">New Users</div>
                <div class="stat-value">4,200</div>
                <div class="stat-desc">↗︎ 400 (22%)</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                </div>
                <div class="stat-title">New Registers</div>
                <div class="stat-value">1,200</div>
                <div class="stat-desc">↘︎ 90 (14%)</div>
            </div>
        </div>
    </div>
</main>

