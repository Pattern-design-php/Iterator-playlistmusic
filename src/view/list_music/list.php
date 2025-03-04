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

<div class="">
    <h2>Music Playlist</h2>
    <table class="table-collapse">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Artist</th>
        </tr>
        <?php foreach ($songs as $index => $song): ?>
            <tr style="background: <?= $index == $currentIndex ? '#d3d3d3' : 'white' ?>;">
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($song->title) ?></td>
                <td><?= htmlspecialchars($song->artist) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Now Playing: <span><?= htmlspecialchars($currentSong->title) ?></span> by <span><?= htmlspecialchars($currentSong->artist) ?></span></h3>

    <form method="post" class="controls">
        <button type="submit" name="prev">⏮️ Previous</button>
        <button type="submit" name="next">⏭️ Next</button>
    </form>
</div>