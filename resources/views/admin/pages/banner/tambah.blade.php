<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <form action="/admin-pplg/banner" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Banner Iklan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Judul Banner (Opsional)</label>
                            <input type="text" class="form-control" name="title" placeholder="Contoh: Banner Promosi PPDB">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">File Gambar Banner <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                            <small class="text-muted">Format: PNG, JPG, JPEG, WEBP (Maks: 5MB)</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Link Tujuan (Opsional)</label>
                            <input type="url" class="form-control" name="link_url" placeholder="https://instagram.com/rpl_smk1crb">
                            <small class="text-muted">Jika diisi, user yang klik banner di hotspot bisa diarahkan ke link ini.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Urutan Tampil</label>
                            <input type="number" class="form-control" name="order" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="statusActive" checked>
                                <label class="form-check-label" for="statusActive">Aktifkan Iklan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Banner</button>
                </div>
            </div>
        </form>
    </div>
</div>
