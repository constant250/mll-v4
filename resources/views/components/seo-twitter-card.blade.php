@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'card' => 'summary_large_image',
    'site' => '@MelbourneLegalLawyers',
    'creator' => '@MelbourneLegalLawyers',
])

@php
    $defaultTitle = 'Melbourne Legal Lawyers | Legal Solutions That Put People First';
    $defaultDescription = 'Melbourne Legal Lawyers is a locally based law firm in Lara, VIC. We provide expert legal services in Family Law, Commercial Law, Immigration, and Wills & Estate planning.';
    $defaultImage = asset('images/MLL - LOGO - WEB.png');
    
    $twitterTitle = $title ?? $defaultTitle;
    $twitterDescription = $description ?? $defaultDescription;
    $twitterImage = $image ?? $defaultImage;
    
    // Ensure absolute URL for image
    if (!filter_var($twitterImage, FILTER_VALIDATE_URL)) {
        $twitterImage = url($twitterImage);
    }
@endphp

<!-- Twitter Card -->
<meta name="twitter:card" content="{{ $card }}">
<meta name="twitter:site" content="{{ $site }}">
<meta name="twitter:creator" content="{{ $creator }}">
<meta name="twitter:title" content="{{ $twitterTitle }}">
<meta name="twitter:description" content="{{ $twitterDescription }}">
<meta name="twitter:image" content="{{ $twitterImage }}">
<meta name="twitter:image:alt" content="{{ $twitterTitle }}">

