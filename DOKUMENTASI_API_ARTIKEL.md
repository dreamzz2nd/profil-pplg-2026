# 📰 Dokumentasi REST API Artikel & Berita PPLG

Dokumentasi ini menjelaskan cara menggunakan dan mengintegrasikan REST API Artikel & Berita **PPLG SMKN 1 Cirebon** agar dapat dikonsumsi oleh aplikasi eksternal, website lain (WordPress, Next.js, React, Vue, HTML statis), aplikasi mobile (Flutter, React Native, Android, iOS), atau script backend.

---

## 1. 🌐 Base URL

| Environment | Base URL |
| :--- | :--- |
| **Lokal (Development)** | `http://127.0.0.1:8000/api` atau `http://localhost/api` |
| **Produksi (Live)** | `https://pplg.neperone.id/api` |

> [!NOTE]
> Semua endpoint sudah dilengkapi **CORS header** (`Access-Control-Allow-Origin: *`), sehingga dapat dipanggil langsung dari JavaScript browser di domain mana pun tanpa kendala Cross-Origin Resource Sharing.

---

## 2. 📋 Ringkasan Endpoint

| No | Method | Endpoint | Deskripsi |
| :---: | :---: | :--- | :--- |
| 1 | `GET` | `/artikel` atau `/articles` | Mengambil daftar artikel (dengan filter, pencarian, dan pagination) |
| 2 | `GET` | `/artikel/{id}` atau `/articles/{id}` | Mengambil detail 1 artikel lengkap beserta artikel terkait |
| 3 | `GET` | `/artikel/kategori` atau `/articles/categories` | Mengambil daftar seluruh kategori artikel beserta jumlah artikel |

---

## 3. 🔍 Detail Endpoint & Parameter

### A. GET `/api/artikel` (Daftar Artikel)

Mengambil daftar artikel berita secara berurutan dari yang terbaru.

#### Query Parameters (Opsional):
| Parameter | Tipe | Default | Keterangan |
| :--- | :--- | :--- | :--- |
| `limit` / `per_page` | Integer | `10` | Jumlah artikel per halaman (min: 1, max: 100) |
| `page` | Integer | `1` | Nomor halaman pagination |
| `search` / `q` | String | - | Mencari artikel berdasarkan judul, penulis, atau isi |
| `category` | String/Int | - | Filter berdasarkan nama kategori atau ID kategori |
| `category_id` | Integer | - | Filter berdasarkan ID kategori spesifik |
| `featured` | Boolean | - | Filter artikel pilihan/unggulan (`1` / `true` / `0` / `false`) |
| `sort` | String | `created_at` | Bidang pengurutan (`created_at`, `date`, `title`, `id`) |
| `order` | String | `desc` | Arah pengurutan (`desc` terbaru, `asc` terlama) |

#### Contoh Request:
```http
GET https://pplg.neperone.id/api/artikel?limit=5&page=1
GET https://pplg.neperone.id/api/artikel?search=coding&category=Prestasi
```

#### Contoh Response JSON (200 OK):
```json
{
  "status": "success",
  "message": "Articles retrieved successfully",
  "pagination": {
    "total": 25,
    "per_page": 5,
    "current_page": 1,
    "last_page": 5,
    "has_more": true,
    "next_page_url": "https://pplg.neperone.id/api/artikel?page=2",
    "prev_page_url": null
  },
  "data": [
    {
      "id": 90,
      "title": "Siswa PPLG Raih Juara LKS Web Technologies 2026",
      "slug": "siswa-pplg-raih-juara-lks-web-technologies-2026",
      "author": "Admin PPLG",
      "date": "2026-11-18",
      "excerpt": "Prestasi membanggakan kembali diraih oleh perwakilan siswa keahlian PPLG dalam ajang LKS...",
      "category": {
        "id": 2,
        "name": "Prestasi"
      },
      "is_featured": true,
      "image": {
        "file_name": "1731934821.jpg",
        "url": "https://pplg.neperone.id/storage/images/1731934821.jpg"
      },
      "web_url": "https://pplg.neperone.id/artikel/90",
      "created_at": "2026-11-18T10:00:00.000000Z",
      "updated_at": "2026-11-18T10:00:00.000000Z"
    }
  ]
}
```

---

### B. GET `/api/artikel/{id}` (Detail Artikel)

Mengambil 1 artikel lengkap berdasarkan ID-nya, termasuk isi artikel (`content`) dan 4 artikel terkait (`related_articles`).

#### Contoh Request:
```http
GET https://pplg.neperone.id/api/artikel/90
```

#### Contoh Response JSON (200 OK):
```json
{
  "status": "success",
  "message": "Article detail retrieved successfully",
  "data": {
    "id": 90,
    "title": "Siswa PPLG Raih Juara LKS Web Technologies 2026",
    "slug": "siswa-pplg-raih-juara-lks-web-technologies-2026",
    "author": "Admin PPLG",
    "date": "2026-11-18",
    "excerpt": "Prestasi membanggakan kembali diraih...",
    "content": "Isi lengkap artikel berita dari awal sampai akhir paragraf...",
    "category": {
      "id": 2,
      "name": "Prestasi"
    },
    "is_featured": true,
    "image": {
      "file_name": "1731934821.jpg",
      "url": "https://pplg.neperone.id/storage/images/1731934821.jpg"
    },
    "web_url": "https://pplg.neperone.id/artikel/90",
    "created_at": "2026-11-18T10:00:00.000000Z",
    "updated_at": "2026-11-18T10:00:00.000000Z",
    "related_articles": [
      {
        "id": 89,
        "title": "Kunjungan Industri Siswa PPLG ke Startup Teknologi",
        "slug": "kunjungan-industri-siswa-pplg-ke-startup-teknologi",
        "author": "Admin PPLG",
        "date": "2026-11-15",
        "excerpt": "Siswa kelas XI melakukan kunjungan industri...",
        "category": {
          "id": 2,
          "name": "Prestasi"
        },
        "is_featured": false,
        "image": {
          "file_name": "1731732000.jpg",
          "url": "https://pplg.neperone.id/storage/images/1731732000.jpg"
        },
        "web_url": "https://pplg.neperone.id/artikel/89",
        "created_at": "2026-11-15T08:00:00.000000Z",
        "updated_at": "2026-11-15T08:00:00.000000Z"
      }
    ]
  }
}
```

#### Response Error (404 Not Found):
```json
{
  "status": "error",
  "message": "Article not found",
  "data": null
}
```

---

### C. GET `/api/artikel/kategori` (Daftar Kategori)

Mengambil seluruh kategori artikel beserta jumlah artikel yang tersedia di setiap kategori.

#### Contoh Request:
```http
GET https://pplg.neperone.id/api/artikel/kategori
```

#### Contoh Response JSON (200 OK):
```json
{
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
      "name": "Teknologi & Tutorial",
      "total_articles": 15
    }
  ]
}
```

---

## 4. 💻 Contoh Integrasi Kode

### A. JavaScript / Web (Fetch API)
```javascript
// Mengambil 6 artikel terbaru
async function getLatestArticles() {
  try {
    const response = await fetch('https://pplg.neperone.id/api/artikel?limit=6');
    const result = await response.json();

    if (result.status === 'success') {
      const articles = result.data;
      console.log('Daftar artikel:', articles);

      // Render ke HTML
      const container = document.getElementById('articles-list');
      container.innerHTML = articles.map(item => `
        <div class="card">
          <img src="${item.image.url}" alt="${item.title}" style="width:100%; height:200px; object-fit:cover;">
          <span class="badge">${item.category.name || 'Umum'}</span>
          <h3><a href="${item.web_url}" target="_blank">${item.title}</a></h3>
          <p>${item.excerpt}</p>
          <small>${item.author} • ${item.date}</small>
        </div>
      `).join('');
    }
  } catch (error) {
    console.error('Gagal memuat artikel:', error);
  }
}

getLatestArticles();
```

---

### B. React / Next.js / Vue
```jsx
import { useEffect, useState } from 'react';

export default function PplgNewsWidget() {
  const [articles, setArticles] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch('https://pplg.neperone.id/api/artikel?limit=3')
      .then(res => res.json())
      .then(res => {
        if (res.status === 'success') setArticles(res.data);
        setLoading(false);
      })
      .catch(() => setLoading(false));
  }, []);

  if (loading) return <p>Memuat berita PPLG...</p>;

  return (
    <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
      {articles.map(article => (
        <div key={article.id} className="border rounded-lg overflow-hidden shadow">
          <img src={article.image.url} alt={article.title} className="w-full h-48 object-cover" />
          <div className="p-4">
            <span className="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">{article.category.name}</span>
            <h4 className="font-bold text-lg mt-2">{article.title}</h4>
            <p className="text-gray-600 text-sm mt-1">{article.excerpt}</p>
            <a href={article.web_url} target="_blank" rel="noreferrer" className="text-blue-600 text-sm font-semibold mt-3 inline-block">
              Baca Selengkapnya &rarr;
            </a>
          </div>
        </div>
      ))}
    </div>
  );
}
```

---

### C. PHP (cURL)
```php
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://pplg.neperone.id/api/artikel?limit=5");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if (!empty($result['status']) && $result['status'] === 'success') {
    foreach ($result['data'] as $item) {
        echo "<h3>" . htmlspecialchars($item['title']) . "</h3>";
        echo "<img src='" . htmlspecialchars($item['image']['url']) . "' width='300'>";
        echo "<p>" . htmlspecialchars($item['excerpt']) . "</p>";
    }
}
?>
```

---

### D. Flutter / Dart
```dart
import 'dart:convert';
import 'package:http/http.dart' as http;

Future<List<dynamic>> fetchPplgArticles() async {
  final url = Uri.parse('https://pplg.neperone.id/api/artikel?limit=10');
  final response = await http.get(url, headers: {'Accept': 'application/json'});

  if (response.statusCode == 200) {
    final Map<String, dynamic> data = json.decode(response.body);
    return data['data']; // List artikel
  } else {
    throw Exception('Gagal mengambil artikel');
  }
}
```

---

### E. Python
```python
import requests

url = "https://pplg.neperone.id/api/artikel"
params = {"limit": 5, "sort": "created_at", "order": "desc"}

response = requests.get(url, params=params)
if response.status_code == 200:
    data = response.json()
    for article in data.get("data", []):
        print(f"[{article['category']['name']}] {article['title']}")
        print(f"Cover: {article['image']['url']}\n")
```
