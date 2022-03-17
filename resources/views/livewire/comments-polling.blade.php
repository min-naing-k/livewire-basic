<div wire:poll.1s="getComment">
  @forelse ($comments->sortDesc() as $comment)
    <div class="flex">
      <img class="h-10 w-10 rounded-full" src="https://www.gravatar.com/avatar/?d=mp&f=y" alt="avatar">
      <div class="ml-4">
        <div class="flex items-center">
          <div class="font-semibold">{{ $comment->username }}</div>
          <div class="text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div class="text-gray-700 mt-2">{{ $comment->content }}</div>
      </div>
    </div>
  @empty
    <div>
      <p class="text-sm text-gray-500">There is no comments yet...</p>
    </div>
  @endforelse
</div>
