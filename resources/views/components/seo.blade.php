@php
    $siteName = 'PPLG SMKN 1 Cirebon';
    $defaultTitle = 'Pengembangan Perangkat Lunak dan Gim - SMKN 1 Cirebon';
    $defaultDescription = 'Website Resmi Kompetensi Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) SMKN 1 Cirebon. Informasi jurusan, artikel teknologi, dan portofolio karya siswa.';
    $defaultKeywords = 'PPLG, Pengembangan Perangkat Lunak dan Gim, RPL, Rekayasa Perangkat Lunak, SMKN 1 Cirebon, Coding, Game Development, Web Development, SMK Pusat Keunggulan';
    $defaultImage = url('logo.png');

    $seoTitle = !empty($title) ? $title : $defaultTitle;
    $rawDescription = !empty($description) ? $description : $defaultDescription;
    $seoDescription = \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($rawDescription))), 160);
    $seoKeywords = !empty($keywords) ? $keywords : $defaultKeywords;
    $seoAuthor = !empty($author) ? $author : 'PPLG SMKN 1 Cirebon';
    $seoUrl = !empty($url) ? $url : url()->current();
    $seoType = !empty($type) ? $type : 'website';

    if (!empty($image)) {
        if (\Illuminate\Support\Str::startsWith($image, ['http://', 'https://'])) {
            $seoImage = $image;
        } else {
            $seoImage = url(ltrim($image, '/'));
        }
    } else {
        $seoImage = $defaultImage;
    }
@endphp

<!-- Primary Meta Tags -->
<title>{{ $seoTitle }}</title>
<meta name="title" content="{{ $seoTitle }}" />
<meta name="description" content="{{ $seoDescription }}" />
<meta name="keywords" content="{{ $seoKeywords }}" />
<meta name="author" content="{{ $seoAuthor }}" />
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
<meta name="googlebot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
<link rel="canonical" href="{{ $seoUrl }}" />

<!-- Favicon & Icons -->
<link rel="shortcut icon" href="{{ url('logo.png') }}" type="image/x-icon" />
<link rel="icon" href="{{ url('logo.png') }}" type="image/png" />
<link rel="apple-touch-icon" href="{{ url('logo.png') }}" />

<!-- Open Graph / Facebook / WhatsApp / LinkedIn -->
<meta property="og:type" content="{{ $seoType }}" />
<meta property="og:locale" content="id_ID" />
<meta property="og:site_name" content="{{ $siteName }}" />
<meta property="og:url" content="{{ $seoUrl }}" />
<meta property="og:title" content="{{ $seoTitle }}" />
<meta property="og:description" content="{{ $seoDescription }}" />
<meta property="og:image" content="{{ $seoImage }}" />
<meta property="og:image:secure_url" content="{{ $seoImage }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" content="{{ $seoTitle }}" />

<!-- Twitter / X Cards -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ $seoUrl }}" />
<meta name="twitter:title" content="{{ $seoTitle }}" />
<meta name="twitter:description" content="{{ $seoDescription }}" />
<meta name="twitter:image" content="{{ $seoImage }}" />
<meta name="twitter:image:alt" content="{{ $seoTitle }}" />

<!-- Schema.org JSON-LD Structured Data for Google Search -->
@if($seoType === 'article')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": {!! json_encode($seoUrl) !!}
  },
  "headline": {!! json_encode($seoTitle) !!},
  "description": {!! json_encode($seoDescription) !!},
  "image": [{!! json_encode($seoImage) !!}],
  "author": {
    "@type": "Person",
    "name": {!! json_encode($seoAuthor) !!}
  },
  "publisher": {
    "@type": "Organization",
    "name": "PPLG SMKN 1 Cirebon",
    "logo": {
      "@type": "ImageObject",
      "url": {!! json_encode(url('logo.png')) !!}
    }
  },
  "datePublished": {!! json_encode(!empty($publishedTime) ? date('c', strtotime($publishedTime)) : date('c')) !!}
}
</script>
@else
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "PPLG SMKN 1 Cirebon",
  "url": {!! json_encode(url('/')) !!},
  "description": {!! json_encode($seoDescription) !!},
  "publisher": {
    "@type": "EducationalOrganization",
    "name": "PPLG SMKN 1 Cirebon",
    "logo": {
      "@type": "ImageObject",
      "url": {!! json_encode(url('logo.png')) !!}
    }
  }
}
</script>
@endif
