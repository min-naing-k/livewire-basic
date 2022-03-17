<form wire:submit.prevent="submitForm" action="#" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div>
    <div>
      <div>
        <a href="/" class="text-blue-600">Back to main page</a>
        <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">
          Edit Post
        </h3>
        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
          You can edit your post here.
        </p>
        @if ($successMessage)
          <x-success-alert :successMessage="$successMessage" />
        @endif
      </div>
      <div class="mt-6 sm:mt-5">
        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Title
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
              <input wire:model="title" id="title" name="title"
                class="form-input form-control block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                value="{{ $post->title }}">
              @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        <div
          class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="content" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Content
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-lg flex rounded-md shadow-sm">
              <textarea wire:model="content" id="content" name="content" rows="5"
                class="form-textarea form-control block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ $post->content }}</textarea>
            </div>
            @error('content')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div
          class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="photo" class="block text-sm leading-5 font-medium text-gray-700 sm:mt-px sm:pt-2">
            Cover Photo
          </label>
          <div
            class="mt-2 sm:mt-0 sm:col-span-2"
            x-data="{isUploading: false, progress: 0}"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false, progress = 0"
            x-on:livewire-upload-error="isUploading = false, progress = 0"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
            <input wire:model="photo" type="file" name="photo">
            @error('photo')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div x-show="isUploading" wire:loading wire:target="photo" class="relative w-full" style="display: none">
              <progress max="100" x-bind:value="progress" class="w-full"></progress>
              <p class="absolute left-1/2 top-1 -translate-x-1/2 text-white text-xs" x-text="`${progress}%`"></p>
            </div>

            <div>
              <svg wire:loading wire:target="photo" class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-600"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
              </svg>
            </div>

            <div class="mt-4">
              @if ($photo)
                <img src="{{ $tempUrl }}" alt="temp" class="rounded-md">
              @elseif ($post->photo)
                <img src="{{ asset('storage/' . $post->photo) }}" alt="cover image" class="rounded-md">
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-8 border-t border-gray-200 pt-5">
    <div class="flex justify-end">
      <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit"
          class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium 
          rounded-md text-white bg-indigo-600 hover:bg-indigo-500 
          focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 
          transition duration-150 ease-in-out disabled:opacity-50">
          <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-600"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
          </svg>
          <span>Update</span>
        </button>
      </span>
    </div>
  </div>
</form>
