@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h4 class="card-title mb-1 text-primary fw-bold">
                            <i class="bx bx-book-bookmark me-2 fs-3 align-middle"></i>Dokumentasi & Panduan REST API
                        </h4>
                        <p class="text-muted mb-0">
                            Gunakan panduan ini untuk mengintegrasikan data Artikel, Kategori, dan Banner Iklan Hotspot ke website lain atau aplikasi eksternal.
                        </p>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="badge bg-label-success fs-7">
                            <i class="bx bx-check-shield me-1"></i> CORS Enabled (Aman diakses lintas domain)
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-artikel" aria-controls="navs-artikel" aria-selected="true">
                        <i class="tf-icons bx bx-news me-1"></i> 1. API Artikel & Berita
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-kategori" aria-controls="navs-kategori" aria-selected="false">
                        <i class="tf-icons bx bx-category me-1"></i> 2. API Kategori
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-banner" aria-controls="navs-banner" aria-selected="false">
                        <i class="tf-icons bx bx-broadcast me-1"></i> 3. API Iklan Hotspot Mikrotik
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <!-- TAB 1: API ARTIKEL -->
                <div class="tab-pane fade show active" id="navs-artikel" role="tabpanel">
                    <div class="mb-4">
                        <h5 class="fw-bold mb-2 text-dark">A. Endpoint Daftar Artikel (List Articles)</h5>
                        <p class="text-muted small">Mengambil daftar artikel dengan dukungan pagination, pencarian judul/isi, filter kategori, dan filter artikel pilihan.</p>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success text-white fw-bold">GET</span>
                            <input type="text" class="form-control" id="urlApiArtikel" value="{{ url('/api/artikel') }}" readonly>
                            <a href="{{ url('/api/artikel') }}" target="_blank" class="btn btn-outline-primary">
                                <i class="bx bx-link-external me-1"></i> Buka JSON
                            </a>
                            <button class="btn btn-primary" onclick="salinTeks('#urlApiArtikel', this)">
                                <i class="bx bx-copy me-1"></i> Salin URL
                            </button>
                        </div>

                        <div class="table-responsive mb-4">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 150px;">Parameter</th>
                                        <th style="width: 100px;">Tipe</th>
                                        <th style="width: 100px;">Default</th>
                                        <th>Keterangan & Contoh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>limit</code> / <code>per_page</code></td>
                                        <td>Integer</td>
                                        <td>10</td>
                                        <td>Jumlah artikel per halaman (min: 1, max: 100). Contoh: <code>?limit=6</code></td>
                                    </tr>
                                    <tr>
                                        <td><code>page</code></td>
                                        <td>Integer</td>
                                        <td>1</td>
                                        <td>Halaman pagination yang ingin diambil. Contoh: <code>?page=2</code></td>
                                    </tr>
                                    <tr>
                                        <td><code>search</code> / <code>q</code></td>
                                        <td>String</td>
                                        <td>-</td>
                                        <td>Mencari berdasarkan kata kunci judul/isi. Contoh: <code>?search=coding</code></td>
                                    </tr>
                                    <tr>
                                        <td><code>category</code></td>
                                        <td>String / Int</td>
                                        <td>-</td>
                                        <td>Filter berdasarkan nama kategori atau ID. Contoh: <code>?category=Prestasi</code></td>
                                    </tr>
                                    <tr>
                                        <td><code>featured</code></td>
                                        <td>Boolean</td>
                                        <td>-</td>
                                        <td>Ambil hanya artikel pilihan/unggulan. Contoh: <code>?featured=1</code></td>
                                    </tr>
                                    <tr>
                                        <td><code>sort</code> & <code>order</code></td>
                                        <td>String</td>
                                        <td>created_at / desc</td>
                                        <td>Urutan data (<code>sort=date&order=desc</code>)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-2 text-dark">B. Endpoint Detail 1 Artikel (Single Article)</h5>
                        <p class="text-muted small">Mengambil isi artikel lengkap berdasarkan ID termasuk cover gambar absolut dan 4 artikel terkait.</p>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-info text-white fw-bold">GET</span>
                            <input type="text" class="form-control" id="urlApiDetail" value="{{ url('/api/artikel/{id}') }}" readonly>
                            <button class="btn btn-outline-info" onclick="salinTeks('#urlApiDetail', this)">
                                <i class="bx bx-copy me-1"></i> Salin URL
                            </button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-2 text-dark">C. Contoh Integrasi Kode di Website / Aplikasi Lain</h5>
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active btn-sm" role="tab" data-bs-toggle="tab" data-bs-target="#code-js">
                                    JavaScript (Fetch)
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link btn-sm" role="tab" data-bs-toggle="tab" data-bs-target="#code-react">
                                    React / Next.js
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link btn-sm" role="tab" data-bs-toggle="tab" data-bs-target="#code-php">
                                    PHP (cURL)
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link btn-sm" role="tab" data-bs-toggle="tab" data-bs-target="#code-dart">
                                    Flutter / Dart
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content border rounded p-3 bg-dark">
                            <div class="tab-pane fade show active" id="code-js" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white-50 small">Kode JavaScript untuk website lain / HTML statis:</span>
                                    <button class="btn btn-sm btn-outline-light" onclick="salinKode('#jsCodeText', this)">
                                        <i class="bx bx-copy me-1"></i> Salin Kode
                                    </button>
                                </div>
                                <pre class="text-light mb-0" id="jsCodeText" style="font-size: 13px;"><code>// Mengambil 4 artikel terbaru dari PPLG
fetch('{{ url("/api/artikel") }}?limit=4')
  .then(response => response.json())
  .then(res => {
    if (res.status === 'success') {
      const articles = res.data;
      console.log('Artikel PPLG:', articles);

      // Contoh render ke elemen HTML:
      const container = document.getElementById('daftar-berita');
      if (container) {
        container.innerHTML = articles.map(item => `
          &lt;div class="berita-card"&gt;
            &lt;img src="${item.image.url}" alt="${item.title}" style="max-width:100%; border-radius:8px;"&gt;
            &lt;h4&gt;&lt;a href="${item.web_url}" target="_blank"&gt;${item.title}&lt;/a&gt;&lt;/h4&gt;
            &lt;p&gt;${item.excerpt}&lt;/p&gt;
            &lt;small&gt;${item.author} • ${item.date}&lt;/small&gt;
          &lt;/div&gt;
        `).join('');
      }
    }
  })
  .catch(err => console.error('Gagal mengambil artikel:', err));</code></pre>
                            </div>

                            <div class="tab-pane fade" id="code-react" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white-50 small">Komponen React / Next.js:</span>
                                    <button class="btn btn-sm btn-outline-light" onclick="salinKode('#reactCodeText', this)">
                                        <i class="bx bx-copy me-1"></i> Salin Kode
                                    </button>
                                </div>
                                <pre class="text-light mb-0" id="reactCodeText" style="font-size: 13px;"><code>import { useEffect, useState } from 'react';

export default function PplgNews() {
  const [news, setNews] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch('{{ url("/api/artikel") }}?limit=3')
      .then(res => res.json())
      .then(result => {
        if (result.status === 'success') setNews(result.data);
        setLoading(false);
      })
      .catch(() => setLoading(false));
  }, []);

  if (loading) return &lt;p&gt;Memuat berita...&lt;/p&gt;;

  return (
    &lt;div className="news-grid"&gt;
      {news.map(item => (
        &lt;div key={item.id} className="news-item"&gt;
          &lt;img src={item.image.url} alt={item.title} /&gt;
          &lt;span className="badge"&gt;{item.category.name}&lt;/span&gt;
          &lt;h3&gt;{item.title}&lt;/h3&gt;
          &lt;p&gt;{item.excerpt}&lt;/p&gt;
          &lt;a href={item.web_url} target="_blank" rel="noreferrer"&gt;Baca Selengkapnya&lt;/a&gt;
        &lt;/div&gt;
      ))}
    &lt;/div&gt;
  );
}</code></pre>
                            </div>

                            <div class="tab-pane fade" id="code-php" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white-50 small">Kode PHP (cURL):</span>
                                    <button class="btn btn-sm btn-outline-light" onclick="salinKode('#phpCodeText', this)">
                                        <i class="bx bx-copy me-1"></i> Salin Kode
                                    </button>
                                </div>
                                <pre class="text-light mb-0" id="phpCodeText" style="font-size: 13px;"><code>&lt;?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '{{ url("/api/artikel") }}?limit=5');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);

$data = json_decode($res, true);
if (!empty($data['status']) && $data['status'] === 'success') {
    foreach ($data['data'] as $article) {
        echo '&lt;h3&gt;' . htmlspecialchars($article['title']) . '&lt;/h3&gt;';
        echo '&lt;img src="' . htmlspecialchars($article['image']['url']) . '" width="300"&gt;';
        echo '&lt;p&gt;' . htmlspecialchars($article['excerpt']) . '&lt;/p&gt;';
    }
}
?&gt;</code></pre>
                            </div>

                            <div class="tab-pane fade" id="code-dart" role="tabpanel">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white-50 small">Flutter / Dart (Package http):</span>
                                    <button class="btn btn-sm btn-outline-light" onclick="salinKode('#dartCodeText', this)">
                                        <i class="bx bx-copy me-1"></i> Salin Kode
                                    </button>
                                </div>
                                <pre class="text-light mb-0" id="dartCodeText" style="font-size: 13px;"><code>import 'dart:convert';
import 'package:http/http.dart' as http;

Future&lt;List&lt;dynamic&gt;&gt; fetchArticles() async {
  final res = await http.get(Uri.parse('{{ url("/api/artikel") }}?limit=10'));
  if (res.statusCode == 200) {
    final Map&lt;String, dynamic&gt; data = json.decode(res.body);
    return data['data']; // List artikel PPLG
  } else {
    throw Exception('Gagal memuat artikel');
  }
}</code></pre>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: API KATEGORI -->
                <div class="tab-pane fade" id="navs-kategori" role="tabpanel">
                    <h5 class="fw-bold mb-2 text-dark">Endpoint Daftar Kategori Artikel</h5>
                    <p class="text-muted small">Mengambil daftar seluruh kategori artikel beserta jumlah artikel aktif yang dimiliki.</p>
                    
                    <div class="input-group mb-4">
                        <span class="input-group-text bg-success text-white fw-bold">GET</span>
                        <input type="text" class="form-control" id="urlApiKategori" value="{{ url('/api/artikel/kategori') }}" readonly>
                        <a href="{{ url('/api/artikel/kategori') }}" target="_blank" class="btn btn-outline-primary">
                            <i class="bx bx-link-external me-1"></i> Buka JSON
                        </a>
                        <button class="btn btn-primary" onclick="salinTeks('#urlApiKategori', this)">
                            <i class="bx bx-copy me-1"></i> Salin URL
                        </button>
                    </div>

                    <h6 class="fw-bold mb-2">Contoh Response JSON:</h6>
                    <pre class="bg-dark text-light p-3 rounded" style="max-height: 250px; font-size: 13px;"><code>{
  "status": "success",
  "message": "Categories retrieved successfully",
  "count": 3,
  "data": [
    {
      "id": 1,
      "name": "Kegiatan",
      "total_articles": 12
    },
    {
      "id": 2,
      "name": "Prestasi",
      "total_articles": 8
    },
    {
      "id": 3,
      "name": "Teknologi",
      "total_articles": 15
    }
  ]
}</code></pre>
                </div>

                <!-- TAB 3: API BANNER HOTSPOT -->
                <div class="tab-pane fade" id="navs-banner" role="tabpanel">
                    <h5 class="fw-bold mb-2 text-dark">A. Endpoint Banner Iklan Hotspot</h5>
                    <p class="text-muted small">Mengambil banner promosi/iklan aktif untuk slider login hotspot.</p>
                    
                    <div class="input-group mb-4">
                        <span class="input-group-text bg-success text-white fw-bold">GET</span>
                        <input type="text" class="form-control" id="urlApiBanner" value="{{ url('/api/iklan') }}" readonly>
                        <a href="{{ url('/api/iklan') }}" target="_blank" class="btn btn-outline-primary">
                            <i class="bx bx-link-external me-1"></i> Buka JSON
                        </a>
                        <button class="btn btn-primary" onclick="salinTeks('#urlApiBanner', this)">
                            <i class="bx bx-copy me-1"></i> Salin URL
                        </button>
                    </div>

                    <h5 class="fw-bold mb-2 text-dark">B. Script Pemasangan di Template <code>login.html</code> Hotspot</h5>
                    <pre class="bg-dark text-light p-3 rounded" style="max-height: 250px; font-size: 13px;"><code>// Pasang di template login.html Hotspot Mikrotik
(async function fetchHotspotBanners() {
  try {
    const res = await fetch('{{ url("/api/iklan") }}');
    const json = await res.json();
    if (json.status === 'success' && json.data.length > 0) {
      console.log('Banner aktif:', json.data);
    }
  } catch (err) {
    console.error('Gagal memuat banner:', err);
  }
})();</code></pre>

                    <h5 class="fw-bold mt-4 mb-2 text-dark">C. Konfigurasi Walled Garden Mikrotik</h5>
                    <p class="text-muted small">Jalankan di terminal Mikrotik agar pengguna yang belum login bisa melihat gambar iklan:</p>
                    <pre class="bg-dark text-warning p-3 rounded" style="font-size: 13px;"><code>/ip hotspot walled-garden
add dst-host=pplg.neperone.id action=allow
add dst-host=*.pplg.neperone.id action=allow</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function salinTeks(selector, button) {
    const input = document.querySelector(selector);
    if (!input) return;
    navigator.clipboard.writeText(input.value).then(() => {
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="bx bx-check me-1"></i> Tersalin!';
        button.classList.remove('btn-primary', 'btn-outline-primary', 'btn-outline-info');
        button.classList.add('btn-success');
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-primary');
        }, 2000);
    });
}

function salinKode(selector, button) {
    const el = document.querySelector(selector);
    if (!el) return;
    navigator.clipboard.writeText(el.innerText).then(() => {
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="bx bx-check me-1"></i> Tersalin!';
        button.classList.remove('btn-outline-light');
        button.classList.add('btn-success');
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('btn-success');
            button.classList.add('btn-outline-light');
        }, 2000);
    });
}
</script>
@endsection
