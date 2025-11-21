@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'url' => null,
    'type' => 'website',
    'siteName' => 'Melbourne Legal Lawyers',
])

@php
    $defaultTitle = 'Melbourne Legal Lawyers | Legal Solutions That Put People First';
    $defaultDescription = 'Melbourne Legal Lawyers is a locally based law firm in Lara, VIC. We provide expert legal services in Family Law, Commercial Law, Immigration, and Wills & Estate planning.';
    $defaultImage = asset('images/MLL - LOGO - WEB.png');
    $defaultUrl = url()->current();
    
    $ogTitle = $title ?? $defaultTitle;
    $ogDescription = $description ?? $defaultDescription;
    $ogImage = $image ?? $defaultImage;
    $ogUrl = $url ?? $defaultUrl;
    
    // Ensure absolute URL for image
    if (!filter_var($ogImage, FILTER_VALIDATE_URL)) {
        $ogImage = url($ogImage);
    }
@endphp

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $ogUrl }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $ogTitle }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="en_AU">

