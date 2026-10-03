<div class="modal fade" id="edit{{$data->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <form action="/admin-pplg/banner/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Banner Iklan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Judul Banner</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}" placeholder="Contoh: Banner Promosi PPDB">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Gambar Saat Ini</label>
                            <div class="mb-2">
                                <img src="{{ $data->image_url }}" alt="Preview" class="img-fluid rounded border" style="max-height: 120px;">
                            </div>
                            <label class="form-label">Ganti Gambar (Opsional)</label>
                            <input type="file" class="form-control" name="image" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Link Tujuan (Opsional)</label>
                            <input type="url" class="form-control" name="link_url" value="{{$data->link_url}}" placeholder="https://instagram.com/rpl_smk1crb">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Urutan Tampil</label>
                            <input type="number" class="form-control" name="order" value="{{$data->order}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="statusActive{{$data->id}}" {{$data->is_active ? 'checked' : ''}}>
                                <label class="form-check-label" for="statusActive{{$data->id}}">Aktifkan Iklan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
