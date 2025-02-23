<?php

namespace Iterator;

class SongIterator implements PlaylistIterator {
    private array $songs;
    private int $index = 0;

    public function __construct(array $songs) {
        $this->songs = $songs;
    }

    public function next(): ?Song {
        return $this->hasNext() ? $this->songs[$this->index++] : null;
    }

    public function hasNext(): bool {
        return $this->index < count($this->songs);
    }
}

