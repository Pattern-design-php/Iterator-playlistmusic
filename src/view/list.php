<?php

use Iterator\Playlist;
use Iterator\Song;
use Iterator\SongIterator;

// Initialize Playlist
$playlist = new Playlist();
$playlist->addSong(new Song("Time To Rise", "Mann Vannda"));
$playlist->addSong(new Song("Send To Ex", "Mann Vannda"));
$playlist->addSong(new Song("មេឃបើកថ្ងៃ", "KWAN ft. Vannda"));

// Get Playlist Songs
$songs = $playlist->getSongs();

// Initialize SongIterator with current index from session
$iterator = new SongIterator($playlist, $_SESSION['current_index'] ?? 0);

// Handle POST requests for navigation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['next'])) {
        // Move to next song if possible
        if ($iterator->hasNext()) {
            $iterator->next(); // Move to next song
            $_SESSION['current_index'] = $iterator->getCurrentIndex(); // Update session index
        }
    } elseif (isset($_POST['prev'])) {
        // Move to previous song if possible
        if ($iterator->hasPrev()) {
            $iterator->prev(); // Move to previous song
            $_SESSION['current_index'] = $iterator->getCurrentIndex(); // Update session index
        }
    }
}

// Get the current song from the iterator
$currentSong = $iterator->current();
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
                <tr class="<?= $index == $_SESSION['current_index'] ? 'active' : '' ?>" style="background: <?= $index == $_SESSION['current_index'] ? '#d3d3d3' : 'white' ?>;">
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($song->title) ?></td>
                    <td><?= htmlspecialchars($song->artist) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="flex flex-row justify-end items-center py-0 px-4">
        <form method="post" class="controls flex flex-row items-center gap-2">
            <button class="py-1 px-4" type="submit" name="prev" style="<?php echo !$iterator->hasPrev() ? 'opacity: 0.5; cursor: not-allowed;' : '' ?>">⏮️ Previous</button>
            <p><?= $_SESSION['current_index'] + 1; ?> of <?= count($songs); ?></p>
            <button class="py-1 px-4" type="submit" name="next" style="<?php echo !$iterator->hasNext() ? 'opacity: 0.5; cursor: not-allowed;' : '' ?>">⏭️ Next</button>
        </form>
    </div>
</div>
