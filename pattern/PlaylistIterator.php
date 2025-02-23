<?php

namespace Iterator;

interface PlaylistIterator {
    public function next(): ?Song;
    public function hasNext(): bool;
}
