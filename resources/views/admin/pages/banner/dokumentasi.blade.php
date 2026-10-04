<div class="modal fade" id="modalDokumentasi" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white d-flex align-items-center">
                    <i class="bx bx-book-bookmark me-2 fs-4"></i> Dokumentasi Integrasi REST API Banner Hotspot
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tab Nav -->
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tab-endpoint">
                            <i class="bx bx-link-alt me-1"></i> 1. Endpoint & JSON
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab-frontend">
                            <i class="bx bx-code-curly me-1"></i> 2. Kode JS Hotspot
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tab-mikrotik">
                            <i class="bx bx-network-chart me-1"></i> 3. Walled Garden Mikrotik
                        </button>
                    </li>
                </ul>

                <div class="tab-content border rounded p-3">
                    <!-- Tab 1: Endpoint & JSON -->
                    <div class="tab-pane fade show active" id="tab-endpoint" role="tabpanel">
                        <h6 class="fw-bold mb-2">Endpoint URL</h6>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-success text-white fw-bold">GET</span>
                            <input type="text" class="form-control" id="apiUrlInput" value="{{ url('/api/iklan') }}" readonly>
                            <a href="{{ url('/api/iklan') }}" target="_blank" class="btn btn-outline-primary">
                                <i class="bx bx-link-external me-1"></i> Buka JSON
                            </a>
                            <button class="btn btn-secondary" onclick="copyToClipboard('#apiUrlInput')">
                                <i class="bx bx-copy me-1"></i> Salin
                            </button>
                        </div>

                        <h6 class="fw-bold mb-2">Contoh Response JSON:</h6>
                        <pre class="bg-dark text-light p-3 rounded" style="max-height: 250px; font-size: 13px;"><code>{
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
      "image_url": "{{ url('/banner.png') }}"
    }
  ]
}</code></pre>
                    </div>

                    <!-- Tab 2: Frontend Code -->
                    <div class="tab-pane fade" id="tab-frontend" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Script untuk dipasang di template <code>login.html</code>:</h6>
                            <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard('#codeJsHotspot')">
                                <i class="bx bx-copy me-1"></i> Salin Semua Kode JS
                            </button>
                        </div>
                        <textarea id="codeJsHotspot" class="form-control font-monospace bg-dark text-light p-3 rounded" rows="14" readonly style="font-size: 12px;">// Fetch dynamic banners dari Laravel API
(async function fetchHotspotBanners() {
  const wrapper = document.getElementById('banner-swiper-wrapper');
  if (!wrapper) return;

  const API_URLS = [
    '{{ url("/api/iklan") }}',
    'https://pplg.neperone.id/api/iklan'
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
          if (typeof initSwiperSlider === 'function') initSwiperSlider();
          break;
        }
      }
    } catch (err) {
      console.warn('Gagal fetch banner dari:', apiUrl, err.message);
    }
  }
})();</textarea>
                    </div>

                    <!-- Tab 3: Walled Garden Mikrotik -->
                    <div class="tab-pane fade" id="tab-mikrotik" role="tabpanel">
                        <div class="alert alert-warning mb-3">
                            <i class="bx bx-info-circle me-1"></i>
                            <strong>Penting:</strong> Pengguna Hotspot yang belum login belum memiliki koneksi internet bebas. Agar perangkat siswa bisa mendownload gambar banner dan data API, daftarkan domain/IP web ke Walled Garden Mikrotik.
                        </div>

                        <h6 class="fw-bold mb-2">Perintah Terminal Mikrotik:</h6>
                        <pre class="bg-dark text-warning p-3 rounded" style="font-size: 13px;"><code>/ip hotspot walled-garden
add dst-host=pplg.neperone.id action=allow
add dst-host=*.pplg.neperone.id action=allow</code></pre>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(selector) {
    const el = document.querySelector(selector);
    if (!el) return;
    const text = el.value || el.innerText;
    navigator.clipboard.writeText(text).then(() => {
        alert('Teks berhasil disalin ke clipboard!');
    }).catch(() => {
        el.select();
        document.execCommand('copy');
        alert('Teks berhasil disalin!');
    });
}
</script>
