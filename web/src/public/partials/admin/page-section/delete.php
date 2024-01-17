<div class="flex flex-col pt-2">
  <div class="-m-1.5 overflow-x-auto">
    <?php
        if(isset($_GET['error'])) {
            if($_GET['error'] == 1) {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-2" role="alert"><strong class="font-bold">Erreur !</strong><span class="block sm:inline"> La suppression n\'a pas pu avoir lieu.</span></div>';
            
            }
        }
    ?>
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Titre</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Prix unité</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Quantité</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Unité</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php foreach($products as $product) { ?>
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?= $product['title'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= $product['price_unite'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= $product['quantity'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= $product['unite'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <?php
                            if($product['active'] == 1) {
                                echo '<a href="delete-product/' . $product['slug'] . '" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800">Désactiver</a>';
                            } else {
                                echo '<a href="enable-product/' . $product['slug'] . '" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800">Activer</a>';
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>