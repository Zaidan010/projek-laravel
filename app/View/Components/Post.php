<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{

    public $title;
    public $author;
    public $thumbnail;
    public $description;
    public $publishedAt;
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $author, $thumbnail, $description, $publishedAt, $href)
    {
      $this->title = $title;
      $this->author = $author;
      $this->thumbnail = $thumbnail;
      $this->description = $description;
      $this->publishedAt = $publishedAt;
      $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post');
    }
}
