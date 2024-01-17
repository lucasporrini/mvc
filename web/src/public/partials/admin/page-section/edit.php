<?php 
    function getValue($array, $key) {
        return isset($array[$key]) ? htmlspecialchars($array[$key]) : '';
    }
    $item = $item[0];
    echo '<pre>';print_r($item);echo'</pre>';
?>

<form method="post" class="space-y-4">
    
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
    <h2 class="text-lg font-semibold">Stockage du produit:</h2>
    <div class="flex gap-3">
        <div>
            <label for="<?= $item['storage_location'] ?>" class="block text-sm font-medium text-gray-700">Lieu</label>
            <select name="location" id="location">
                <option value="1">Intérieur</option>
            </select>
            <input type="text" name=storage_location id="item-storage_location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= $item['storage_location'] ?>">
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
    <div class="max-w-xs flex gap-2">
        <?php 
            $photos = json_decode($item['photos'], true);
            if ($photos):
                foreach ($photos as $index => $photo):
        ?>
            <div>
                <label for="photo<?= $index ?>" class="block text-sm font-medium text-gray-700">Photo <?= $index + 1 ?></label>
                <input type="text" name="photos[]" id="photo<?= $index ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= htmlspecialchars($photo['photo']) ?>">
                <img id="preview<?= $index ?>" src="public/assets/uploads/product/<?= $item['id']?>/<?= htmlspecialchars($photo['photo']) ?>" alt="Photo Preview" class="mt-2 rounded-md max-w-xs max-h-32" style="display: <?= $photo['photo'] ? 'block' : 'none' ?>;">
            </div>
        <?php endforeach;  endif;?>
    </div>
    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Soumettre</button>
    </div>
    <?php echo '<pre>'; print_r($enum); echo '</pre>'; ?>
</form>