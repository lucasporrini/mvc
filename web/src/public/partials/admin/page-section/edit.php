<?php 
    if(count($_GET) > 2) {
        print_r($item);
    }
    function getValue($array, $key) {
        return isset($array[$key]) ? htmlspecialchars($array[$key]) : '';
    }
    $item = $item[0];
?>

<form method="post" class="space-y-4">
    <?php foreach ($item as $key => $value): ?>
        <?php if ($key !== 'photos'): // Gérer les champs normaux ?>
            <div>
                <label for="<?= $key ?>" class="block text-sm font-medium text-gray-700"><?= ucfirst($key) ?></label>
                <input type="text" name="<?= $key ?>" id="<?= $key ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= getValue($item, $key) ?>">
            </div>
        <?php else: // Gérer le cas particulier des photos ?>
            <?php 
                $photos = json_decode($value, true); 
                if ($photos):
                    foreach ($photos as $index => $photo):
            ?>
                <div>
                    <label for="photo<?= $index ?>" class="block text-sm font-medium text-gray-700">Photo <?= $index + 1 ?></label>
                    <input type="text" name="photos[]" id="photo<?= $index ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= htmlspecialchars($photo['photo']) ?>">
                </div>
            <?php endforeach; endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Soumettre</button>
    </div>
</form>