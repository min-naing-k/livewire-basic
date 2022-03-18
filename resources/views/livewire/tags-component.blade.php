<div
    wire:ignore
    class="w-1/2 border rounded-md border-gray-300 px-4 py-2 ml-10"
    x-data
    x-init="
      new Taggle($el, {
        tags: JSON.parse('{{ $tags }}'),
        duplicateTagClass: 'bounce',
        onTagAdd: function(e, tag) {
          Livewire.emit('tagAdded', tag);
        },
        onTagRemove: function(e, tag) {
          Livewire.emit('tagRemoved', tag);
        },
      });

      Livewire.on('tagAddedFromBackend', tag => {
        console.log(tag);
      })
    ">
    
  </div>
