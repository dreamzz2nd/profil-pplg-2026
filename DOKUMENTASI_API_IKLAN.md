# 📘 Dokumentasi Integrasi API Banner Iklan Hotspot

Dokumentasi ini menjelaskan arsitektur, spesifikasi REST API, cara konsumsi data di landing page login hotspot Mikrotik, serta konfigurasi jaringan (Walled Garden).

---

## 1. 🏗️ Arsitektur Sistem

- **Backend (Headless CMS)**: Laravel `profil-pplg` mengelola data banner dan menyediakannya dalam bentuk REST API JSON.
- **Frontend (Client)**: Template Hotspot Mikrotik (`login.html`) mengambil data secara dinamis tanpa perlu edit HTML berulang kali.

---

## 2. 📡 Spesifikasi API Endpoint

### **GET `/api/iklan`** (atau `/api/banners`)
Mengambil daftar seluruh banner iklan yang berstatus **Aktif (`is_active = 1`)** diurutkan berdasarkan kolom `order` (urutan) dan waktu pembuatan terbaru.

#### **Detail Request**:
- **Method**: `GET`
- **URL Lokal**: `http://127.0.0.1:8000/api/iklan`
- **URL Produksi**: `https://pplg-smkn1cirebon.sch.id/api/iklan`
- **Headers**:
  ```http
  Accept: application/json
  ```

#### **Headers Response (CORS Support)**:
```http
Access-Control-Allow-Origin: *
Access-Control-Allow-Methods: GET, OPTIONS
Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With
Content-Type: application/json
```

---

## 3. 📄 Format Response JSON

### **Contoh Response Sukses (`200 OK`)**:
```json
{
  "status": "success",
  "message": "Active banners retrieved successfully",
  "count": 3,
  "data": [
    {
      "id": 1,
      "title": "Let's Join With Us - RPL SMKN 1 Cirebon",
      "image": "banner.png",
      "link_url": "https://instagram.com/rpl_smk1crb",
      "is_active": 1,
      "order": 1,
      "created_at": "2026-10-03T10:47:58.000000Z",
      "image_url": "http://127.0.0.1:8000/banner.png"
    },
    {
      "id": 2,
      "title": "mantap",
      "image": "1727954123_651a2b.jpg",
      "link_url": null,
      "is_active": 1,
      "order": 2,
      "created_at": "2026-10-03T11:20:10.000000Z",
      "image_url": "http://127.0.0.1:8000/images/1727954123_651a2b.jpg"
    }
  ]
}
```

### **Struktur Objek Banner**:

| Field | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | `Integer` | ID unik banner |
| `title` | `String` / `null` | Judul / deskripsi banner |
| `image` | `String` | Nama file gambar tersimpan |
| `image_url` | `String (URL)` | **Full URL gambar siap pakai untuk tag `<img>`** |
| `link_url` | `String (URL)` / `null` | Link tujuan saat banner diklik |
| `is_active` | `Integer (0 / 1)` | Status aktif iklan |
| `order` | `Integer` | Nomor urutan prioritas slider |

---

## 4. 💻 Implementasi Client di `login.html`

### A. Struktur HTML (Swiper Wrapper)
```html
<div id="swiper" class="swiper rounded-2xl shadow-sm overflow-hidden border border-slate-200 w-full">
    <!-- ID ini digunakan JavaScript untuk menyisipkan slide -->
    <div class="swiper-wrapper" id="banner-swiper-wrapper">
        <!-- Fallback Slide (Tampil jika server/internet offline) -->
        <div class="overflow-hidden rounded-2xl swiper-slide">
            <img src="img/banner-default.png" alt="Banner Default" class="w-full aspect-[16/9] object-cover rounded-2xl" />
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev text-slate-100 md:scale-75 scale-50"></div>
    <div class="swiper-button-next text-slate-100 md:scale-75 scale-50"></div>
</div>
```

### B. JavaScript Fetch & Re-init Swiper
```javascript
let hotspotSwiper = null;

function initSwiperSlider() {
  try {
    if (hotspotSwiper && typeof hotspotSwiper.destroy === 'function') {
      hotspotSwiper.destroy(true, true);
    }
    const slideCount = document.querySelectorAll('#banner-swiper-wrapper .swiper-slide').length;
    hotspotSwiper = new Swiper("#swiper", {
      direction: "horizontal",
      loop: slideCount > 1,
      autoplay: slideCount > 1 ? {
        delay: 3500,
        disableOnInteraction: false,
      } : false,
      spaceBetween: 10,
      grabCursor: true,
      slidesPerView: 1,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  } catch (e) {
    console.warn("Swiper init error:", e);
  }
}

// Inisialisasi awal
initSwiperSlider();

// Fetch Banner dari API
(async function fetchHotspotBanners() {
  const wrapper = document.getElementById('banner-swiper-wrapper');
  if (!wrapper) return;

  const API_URLS = [
    'http://127.0.0.1:8000/api/iklan',
    'https://pplg-smkn1cirebon.sch.id/api/iklan'
  ];

  for (const apiUrl of API_URLS) {
    try {
      const controller = new AbortController();
      const timeoutId = setTimeout(() => controller.abort(), 3500);
      const response = await fetch(apiUrl, {
        cache: 'no-cache',
        headers: { 'Accept': 'application/json' },
        signal: controller.signal
      });
      clearTimeout(timeoutId);

      if (response.ok) {
        const result = await response.json();
        if (result.status === 'success' && Array.isArray(result.data) && result.data.length > 0) {
          let slidesHtml = '';
          result.data.forEach((banner) => {
            const title = banner.title || 'Banner Iklan PPLG';
            const imgTag = `<img src="${banner.image_url}" alt="${title}" class="w-full aspect-[16/9] object-cover rounded-2xl" />`;
            const slideContent = banner.link_url 
              ? `<a href="${banner.link_url}" target="_blank" class="block w-full h-full cursor-pointer">${imgTag}</a>` 
              : imgTag;
            slidesHtml += `<div class="overflow-hidden rounded-2xl swiper-slide">${slideContent}</div>`;
          });

          wrapper.innerHTML = slidesHtml;
          initSwiperSlider();
          break;
        }
      }
    } catch (err) {
      // Fallback diam (tidak merusak tampilan)
    }
  }
})();
```

---

## 5. 🌐 Konfigurasi Jaringan Mikrotik (Walled Garden)

Sebelum user login ke Hotspot Mikrotik, perangkat user **belum memiliki akses internet penuh**. Agar browser user dapat mendownload API JSON dan gambar banner dari web profil, domain / IP server Laravel **harus didaftarkan ke Walled Garden**.

### Perintah Terminal Mikrotik:
```routeros
/ip hotspot walled-garden
add dst-host=pplg-smkn1cirebon.sch.id action=allow
add dst-host=*.pplg-smkn1cirebon.sch.id action=allow
```

Jika server berada di IP lokal yang sama dalam satu jaringan:
```routeros
/ip hotspot walled-garden ip
add dst-address=192.168.1.100 action=accept
```
