<!-- Sidebar Toggle -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center py-4">
      <!-- Navigation Toggle -->
      <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="w-5 h-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </button>
      <!-- End Navigation Toggle -->

      <!-- Breadcrumb -->
      <ol class="ms-3 flex items-center whitespace-nowrap" aria-label="Breadcrumb">
        <li class="flex items-center text-sm text-gray-800">
          Reborn
          <svg class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </li>
        <li class="text-sm font-semibold text-gray-800 truncate" aria-current="page">
          Dashboard
        </li>
      </ol>
      <!-- End Breadcrumb -->
    </div>
  </div>
  <!-- End Sidebar Toggle -->

  <!-- Sidebar -->
  <div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-6">
      <a class="flex-none text-xl font-semibold dark:text-white" href="/" aria-label="Brand">Reborn</a>
    </div>
    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap">
        <ul class="space-y-1.5">
            <?php foreach ($header_informations['menu'] as $item): ?>
                <?php if ($item['is_parent'] == 1 && $item['has_child'] == 0): ?>
                    <?php if ($item['superadmin'] == 0): ?>
                        <li>
                            <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100" href="<?= htmlspecialchars($item['url']) ?>">
                                <?= htmlspecialchars($item['name']) ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($item['superadmin'] == 1 && $_SESSION['user']['role'] == 'superadmin'): ?>
                        <li>
                            <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100" href="<?= htmlspecialchars($item['url']) ?>">
                                <?= htmlspecialchars($item['name']) ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div class="py-3 px-7 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
        <p class="text-sm text-gray-500 dark:text-gray-400">Connecté en tant que</p>
        <p class="text-sm font-medium text-gray-800 dark:text-gray-300"><?= $_SESSION['user']['email'] ?></p>
    </div>
  </div>
  <!-- End Sidebar -->