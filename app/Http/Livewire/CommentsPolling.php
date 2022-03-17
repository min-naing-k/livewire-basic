<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CommentsPolling extends Component
{
  public $post_id;
  public $comments;

  public function mount($post_id)
  {
    $this->post_id = $post_id;
    $this->comments = $this->getComment();
  }

  public function getComment()
  {
    $post = Post::with('comments')->findOrFail($this->post_id);
    $this->comments = $post->comments;

    return $this->comments;
  }

  public function render()
  {
    return view('livewire.comments-polling');
  }
}
