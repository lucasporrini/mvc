<?php 
    function getValue($array, $key) {
        return isset($array[$key]) ? htmlspecialchars($array[$key]) : '';
    }
    $item = $item[0];
    echo '<pre>';print_r($item);echo'</pre>';
?>

<form method="post" class="space-y-4" action="votre_script.php" enctype="multipart/form-data">
    
<hr>    
<h2 class="text-lg font-semibold">Description du produit:</h2>
    <div>
        <div>
            <label for="<?= $item['title'] ?>" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name=title id="item-title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['title'] ?>">
        </div>
        <div>
            <label for="<?= $item['caption'] ?>" class="block text-sm font-medium text-gray-700">Légende</label>
            <input type="text" name=caption id="item-caption" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['caption'] ?>">
        </div>
        <div>
            <label for="<?= $item['description'] ?>" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name=description id="item-description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['description'] ?>">
        </div>
    </div>
    <hr>
    <h2 class="text-lg font-semibold">Caractéristiques techniques du produit:</h2>
    <div class="flex gap-3">
        <div>
            <label for="<?= $item['height'] ?>" class="block text-sm font-medium text-gray-700">Hauteur (m)</label>
            <input type="text" name=height id="item-height" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['height'] ?>">
        </div>
        <div>
            <label for="<?= $item['width'] ?>" class="block text-sm font-medium text-gray-700">Largeur (m)</label>
            <input type="text" name=width id="item-width" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['width'] ?>">
        </div>
        <div>
            <label for="<?= $item['depth'] ?>" class="block text-sm font-medium text-gray-700">Profondeur (m)</label>
            <input type="text" name=depth id="item-depth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['depth'] ?>">
        </div>
        <div>
            <label for="<?= $item['weight'] ?>" class="block text-sm font-medium text-gray-700">Poids (kg)</label>
            <input type="text" name=weight id="item-weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['weight'] ?>">
        </div>
    </div>
    <hr>
    <h2 class="text-lg font-semibold">Stockage du produit:</h2>
    <div class="flex gap-3">
        <div class="flex flex-col gap-1">
            <label for="<?= $item['storage_location'] ?>" class="block text-sm font-medium text-gray-700">Lieu</label>
            <select name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg min-w-48 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php foreach($enum['storage_location'] as $location): ?>
                    <option value="<?= $location ?>" <?= $location == $item['storage_location'] ? 'selected' : '' ?>><?= $location ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="<?= $item['width'] ?>" class="block text-sm font-medium text-gray-700">Largeur (m)</label>
            <input type="text" name=width id="item-width" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['width'] ?>">
        </div>
        <div>
            <label for="<?= $item['depth'] ?>" class="block text-sm font-medium text-gray-700">Profondeur (m)</label>
            <input type="text" name=depth id="item-depth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['depth'] ?>">
        </div>
        <div>
            <label for="<?= $item['weight'] ?>" class="block text-sm font-medium text-gray-700">Poids (kg)</label>
            <input type="text" name=weight id="item-weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['weight'] ?>">
        </div>
    </div>
    <hr>
    <h2 class="text-lg font-semibold">Photos du produit:</h2>
    <div class="flex gap-3 items-center">
        <?php 
            $photos = json_decode($item['photos'], true);
            if ($photos):
                foreach ($photos as $index => $photo):
        ?>
            <div class="relative" data-slug="<?= $item['slug'] ?>" data-index="<?= $index ?>">
                <label for="photo<?= $index ?>" class="block text-sm font-medium text-gray-700">Photo <?= $index + 1 ?></label>
                <input type="text" name="photos[]" id="photo<?= $index ?>" class="max-w-xs mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= htmlspecialchars($photo['photo']) ?>">
                <span class="delete-photo absolute top-0 right-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-red-500 text-white cursor-pointer">X</span>
                <img id="preview<?= $index ?>" src="public/assets/uploads/product/<?= $item['id']?>/<?= htmlspecialchars($photo['photo']) ?>" alt="Photo Preview" class="mt-2 rounded-md max-w-xs max-h-32" style="display: <?= $photo['photo'] ? 'block' : 'none' ?>;">
            </div>
        <?php endforeach; endif;?>

        <div id="file-input-container">
            <label for="small-file-input" class="sr-only">Choose file</label>
            <input type="file" name="small-file-input" id="small-file-input" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm cursor-pointer focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:bg-gray-100 file:me-4 file:py-2 file:px-4">
        </div>
    </div>

    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Soumettre</button>
    </div>
    <?php echo '<pre>'; print_r($enum); echo '</pre>'; ?>
</form>