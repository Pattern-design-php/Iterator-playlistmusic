<?php 

namespace Iterator;

class MusicPlayer {
    private PlaylistIterator $iterator;

    public function __construct(Playlist $playlist) {
        $this->iterator = $playlist->getIterator();
    }

    public function play(): void {
        echo "Starting music player...\n";
        while ($this->iterator->hasNext()) {
            $song = $this->iterator->next();
            if ($song) {
                echo "Playing: {$song->title} by {$song->artist}\n";
            }
        }
        echo "Playlist finished.\n";
    }
}

