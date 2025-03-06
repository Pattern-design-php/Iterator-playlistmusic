<?php

namespace Iterator;

class SongIterator {
    private $playlist;
    private $currentIndex;

    public function __construct(Playlist $playlist, $currentIndex = 0) {
        $this->playlist = $playlist;
        $this->currentIndex = $currentIndex;
    }

    // Check if there is a next song
    public function hasNext() {
        return $this->currentIndex < count($this->playlist->getSongs()) - 1;
    }

    // Check if there is a previous song
    public function hasPrev() {
        return $this->currentIndex > 0;
    }

    // Move to the next song
    public function next() {
        if ($this->hasNext()) {
            $this->currentIndex++;
        }
    }

    // Move to the previous song
    public function prev() {
        if ($this->hasPrev()) {
            $this->currentIndex--;
        }
    }

    // Get the current song
    public function current() {
        return $this->playlist->getSongs()[$this->currentIndex];
    }

    // Get the current index
    public function getCurrentIndex() {
        return $this->currentIndex;
    }
}
