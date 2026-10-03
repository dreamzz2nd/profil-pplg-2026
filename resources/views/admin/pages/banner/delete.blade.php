<div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <form action="/admin-pplg/banner/{{$data->id}}" method="post">
            @csrf
            @method("DELETE")
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Banner Iklan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus banner <strong>"{{$data->title ?: 'Tanpa Judul'}}"</strong> ini?</p>
                    <div class="text-center my-2">
                        <img src="{{ $data->image_url }}" alt="Preview" class="img-fluid rounded border" style="max-height: 100px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
