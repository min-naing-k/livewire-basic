@props(['posts'])

<div class="my-8">
  <h2 class="text-lg font-semibold mt-4">Livewire Blog Posts w/ Comments</h2>

  <ul class="list-disc mt-4">
    @foreach ($posts as $post)
      <li>
        <a href="{{ route('post.show', $post) }}" class="text-blue-600">{{ $post->title }}</a>
        <a href="{{ route('post.edit', $post->id) }}">(Edit)</a>
      </li>
    @endforeach
  </ul>
</div>
