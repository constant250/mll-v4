@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'author' => 'Melbourne Legal Lawyers',
    'robots' => 'index, follow',
])

@php
    $defaultTitle = 'Melbourne Legal Lawyers | Legal Solutions That Put People First';
    $defaultDescription = 'Melbourne Legal Lawyers is a locally based law firm in Lara, VIC. We provide expert legal services in Family Law, Commercial Law, Immigration, and Wills & Estate planning. Book your consultation today.';
    $defaultKeywords = 'Melbourne Legal Lawyers, law firm Lara, family law, commercial law, immigration lawyer, wills and estate, legal services Victoria, Geelong lawyers';
    
    $pageTitle = $title ?? $defaultTitle;
    $pageDescription = $description ?? $defaultDescription;
    $pageKeywords = $keywords ?? $defaultKeywords;
@endphp

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="keywords" content="{{ $pageKeywords }}">
<meta name="author" content="{{ $author }}">
<meta name="robots" content="{{ $robots }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">
<meta name="rating" content="general">

