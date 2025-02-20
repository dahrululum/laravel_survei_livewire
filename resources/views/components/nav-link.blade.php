@props(['active' => false])

@php
  $clasess = ($active) ? 'nav-link active' : 'nav-link';  
@endphp
<li class="nav-item">
    <a wire:navigate.hover {{ $attributes->merge(['class' => $clasess ]) }}>{{ $slot }}</a>
  </li>