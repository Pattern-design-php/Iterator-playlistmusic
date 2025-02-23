<?php 


namespace Iterator;

class Song {
    public string $title;
    public string $artist;

    public function __construct(string $title, string $artist) {
        $this->title = $title;
        $this->artist = $artist;
    }
}