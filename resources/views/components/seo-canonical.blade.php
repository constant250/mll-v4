@props([
    'url' => null,
])

@php
    $canonicalUrl = $url ?? url()->current();
@endphp

<link rel="canonical" href="{{ $canonicalUrl }}">

