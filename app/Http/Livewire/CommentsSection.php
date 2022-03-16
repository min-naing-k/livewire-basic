<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
  # Method A
  /*
    public $post;
    public function mount(Post $post)
    {
      $this->post = $post;
    } 
  */
  # Method B
  public Post $post;
  public $successMessage;
  public $content;
  protected $rules = [
    'content' => 'required|min:4'
  ];

  public function postComment()
  {
    $attributes = $this->validate();
    $attributes['post_id'] = $this->post->id;
    $attributes['username'] = 'Guest';

    Comment::create($attributes);
    $this->content = '';
    $this->post->refresh();
    $this->successMessage = 'Comment is posted';
  }

  public function render()
  {
    return view('livewire.comments-section');
  }
}
