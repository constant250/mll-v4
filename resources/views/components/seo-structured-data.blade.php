@props([
    'type' => 'LegalService',
    'name' => 'Melbourne Legal Lawyers',
    'description' => null,
    'url' => null,
    'logo' => null,
    'image' => null,
    'address' => [
        'streetAddress' => '26 Hicks Street',
        'addressLocality' => 'Lara',
        'addressRegion' => 'VIC',
        'postalCode' => '3212',
        'addressCountry' => 'AU',
    ],
    'telephone' => '+61312345678',
    'email' => 'info@melbournelegallawyers.com.au',
    'priceRange' => '$$',
    'openingHours' => [
        'Mo-Fr 09:00-17:00',
    ],
    'areaServed' => [
        'Melbourne',
        'Geelong',
        'Lara',
        'Greater Geelong',
    ],
    'serviceType' => [
        'Family Law',
        'Commercial Law',
        'Immigration Law',
        'Wills & Estate Planning',
    ],
])

@php
    $defaultDescription = 'Melbourne Legal Lawyers is a locally based law firm in Lara, VIC. We provide expert legal services in Family Law, Commercial Law, Immigration, and Wills & Estate planning.';
    $defaultUrl = url()->current();
    $defaultLogo = url(asset('images/MLL - LOGO - WEB.png'));
    $defaultImage = url(asset('images/HEADER-IMAGE.jpg'));
    
    $structuredDescription = $description ?? $defaultDescription;
    $structuredUrl = $url ?? $defaultUrl;
    $structuredLogo = $logo ?? $defaultLogo;
    $structuredImage = $image ?? $defaultImage;
    
    $structuredData = [
        '@context' => 'https://schema.org',
        '@type' => $type,
        'name' => $name,
        'description' => $structuredDescription,
        'url' => $structuredUrl,
        'logo' => $structuredLogo,
        'image' => $structuredImage,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $address['streetAddress'],
            'addressLocality' => $address['addressLocality'],
            'addressRegion' => $address['addressRegion'],
            'postalCode' => $address['postalCode'],
            'addressCountry' => $address['addressCountry'],
        ],
        'telephone' => $telephone,
        'email' => $email,
        'priceRange' => $priceRange,
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => [
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                ],
                'opens' => '09:00',
                'closes' => '17:00',
            ],
        ],
        'areaServed' => array_map(function($area) {
            return [
                '@type' => 'City',
                'name' => $area,
            ];
        }, $areaServed),
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Legal Services',
            'itemListElement' => array_map(function($service, $index) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service,
                    ],
                    'position' => $index + 1,
                ];
            }, $serviceType, array_keys($serviceType)),
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

