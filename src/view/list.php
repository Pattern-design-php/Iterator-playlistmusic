<?php

use Iterator\Playlist;
use Iterator\Song;

// Initialize Playlist
$playlist = new Playlist();
$playlist->addSong(new Song("Shape of You", "Ed Sheeran"));
$playlist->addSong(new Song("Blinding Lights", "The Weeknd"));
$playlist->addSong(new Song("Levitating", "Dua Lipa"));

// Get Playlist Songs
$songs = $playlist->getSongs();

// Get Current Song Index from Session
$currentIndex = $_SESSION['current_index'] ?? 0;

// Handle Next/Previous Controls
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['next'])) {
        $currentIndex = ($currentIndex + 1) % count($songs);
    } elseif (isset($_POST['prev'])) {
        $currentIndex = ($currentIndex - 1 + count($songs)) % count($songs);
    }
    $_SESSION['current_index'] = $currentIndex;
}

// Get Current Song
$currentSong = $songs[$currentIndex];
?>

<div>
    <div class="bg-primary p-2 flex justify-center items-center">
        <h2>Music List</h2>
    </div>

    <div class="flex justify-center items-center px-4">
        <table class="table-collapse">
            <tr>
                <th>№</th>
                <th>Title</th>
                <th>Artist</th>
            </tr>
            <?php foreach ($songs as $index => $song): ?>
                <tr style="background: <?= $index == $currentIndex ? '#d3d3d3' : 'white' ?>;">
                    <td><?= $index + 1 ?></td>
                    <td><?= \htmlspecialchars($song->title) ?></td>
                    <td><?= htmlspecialchars($song->artist) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="flex flex-row justify-end items-center py-0 px-4">
        <!-- <h3>Now Playing: <span><?= htmlspecialchars($currentSong->title) ?></span> by <span><?= htmlspecialchars($currentSong->artist) ?></span></h3> -->

        <form method="post" class="controls flex flex-row items-center gap-2">
            <button class="py-1 px-4" type="submit" name="prev">⏮️ Previous</button>
            <p><?php echo $currentIndex + 1; ?>/ <?php echo count($songs); ?></p>
            <button class="py-1 px-4" type="submit" name="next">⏭️ Next</button>
        </form>
    </div>
</div>