@props(['field', 'sortField', 'sortAsc'])

@if ($sortField !== $field)
  <span></span>
@elseif ($sortAsc)
  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7l4-4m0 0l4 4m-4-4v18" />
  </svg>
@else
  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
  </svg>
@endif
