{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/artikel') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/karya-siswa') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($articles as $article)
    <url>
        <loc>{{ url('/artikel/' . $article->id) }}</loc>
        <lastmod>{{ !empty($article->updated_at) ? date('Y-m-d', strtotime($article->updated_at)) : date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    @foreach ($portfolios as $portfolio)
    <url>
        <loc>{{ url('/karya-siswa/' . $portfolio->id) }}</loc>
        <lastmod>{{ !empty($portfolio->updated_at) ? date('Y-m-d', strtotime($portfolio->updated_at)) : date('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
