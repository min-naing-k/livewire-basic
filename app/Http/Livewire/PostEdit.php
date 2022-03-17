<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
  use WithFileUploads;

  public $post, $title, $content, $photo, $tempUrl, $successMessage;
  protected $rules = [
    'title' => 'required',
    'content' => 'required',
    'photo' => 'nullable|sometimes|image|mimes:jpg,jpeg,png|max:5000',
  ];

  public function mount(Post $post)
  {
    $this->post = $post;
    $this->title = $this->post->title;
    $this->content = $this->post->content;
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function updatedPhoto()
  {
    try {
      $this->tempUrl = $this->photo->temporaryUrl();
    } catch (Exception $e) {
      $this->tempUrl = '';
    }

    $this->validate();
  }

  public function submitForm()
  {
    $attributes = $this->validate();
    $original_photo = $this->post->photo ?? null;
    $attributes['photo'] = $this->photo ? $this->photo->store('posts', 'public') : $original_photo;
    if ($this->photo && Storage::exists($this->post->photo)) {
      Storage::delete($this->post->photo);
    }
    $this->post->update($attributes);
    $this->successMessage = 'Post was posted successfully!';
  }

  public function render()
  {
    return view('livewire.post-edit');
  }
}
