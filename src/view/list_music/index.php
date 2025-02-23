<?php

?>

<div class="w-full flex flex-row gap-4">
    <div class="w-fit p-4 flex flex-col bg-primary text-white">
        <a style="white-space: nowrap;" href="add.php">Add New Song</a>
        <a style="white-space: nowrap;" href="index.php">List Music</a>
    </div>
    <div class="w-full">
        <?= $playlist = include 'src/view/list_music/list.php'; ?>
    </div>
</div>