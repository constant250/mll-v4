@props([
    // Meta tags
    'title' => null,
    'description' => null,
    'keywords' => null,
    'author' => 'Melbourne Legal Lawyers',
    'robots' => 'index, follow',
    
    // Open Graph
    'ogTitle' => null,
    'ogDescription' => null,
    'ogImage' => null,
    'ogUrl' => null,
    'ogType' => 'website',
    'ogSiteName' => 'Melbourne Legal Lawyers',
    
    // Twitter Card
    'twitterTitle' => null,
    'twitterDescription' => null,
    'twitterImage' => null,
    'twitterCard' => 'summary_large_image',
    'twitterSite' => '@MelbourneLegalLawyers',
    'twitterCreator' => '@MelbourneLegalLawyers',
    
    // Canonical
    'canonicalUrl' => null,
    
    // Structured Data
    'structuredDataType' => 'LegalService',
    'structuredDataName' => 'Melbourne Legal Lawyers',
    'structuredDataDescription' => null,
    'structuredDataUrl' => null,
    'structuredDataLogo' => null,
    'structuredDataImage' => null,
])

@php
    // Use title/description for OG and Twitter if not specifically provided
    $finalOgTitle = $ogTitle ?? $title;
    $finalOgDescription = $ogDescription ?? $description;
    $finalTwitterTitle = $twitterTitle ?? $title;
    $finalTwitterDescription = $twitterDescription ?? $description;
    $finalStructuredDescription = $structuredDataDescription ?? $description;
@endphp

{{-- Meta Tags --}}
<x-seo-meta 
    :title="$title"
    :description="$description"
    :keywords="$keywords"
    :author="$author"
    :robots="$robots"
/>

{{-- Canonical URL --}}
<x-seo-canonical :url="$canonicalUrl" />

{{-- Open Graph Tags --}}
<x-seo-open-graph 
    :title="$finalOgTitle"
    :description="$finalOgDescription"
    :image="$ogImage"
    :url="$ogUrl"
    :type="$ogType"
    :siteName="$ogSiteName"
/>

{{-- Twitter Card Tags --}}
<x-seo-twitter-card 
    :title="$finalTwitterTitle"
    :description="$finalTwitterDescription"
    :image="$twitterImage"
    :card="$twitterCard"
    :site="$twitterSite"
    :creator="$twitterCreator"
/>

{{-- Structured Data (JSON-LD) --}}
<x-seo-structured-data 
    :type="$structuredDataType"
    :name="$structuredDataName"
    :description="$finalStructuredDescription"
    :url="$structuredDataUrl"
    :logo="$structuredDataLogo"
    :image="$structuredDataImage"
/>

