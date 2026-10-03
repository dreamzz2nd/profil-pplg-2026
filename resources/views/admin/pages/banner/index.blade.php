@extends('admin.layouts.main')

@section('content')
<div class="card">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-3 pb-0">
        <div>
            <h5 class="card-title mb-1">Pengaturan Iklan Hotspot</h5>
            <p class="text-muted mb-0 small">Kelola banner iklan / promosi yang tampil di halaman login hotspot</p>
        </div>
        <div>
            <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#modalDokumentasi">
                <i class="bx bx-book-bookmark me-1"></i> Dokumentasi Integrasi API
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="bx bx-plus me-1"></i> Tambah Banner
            </button>
        </div>
    </div>
    
    @if(session('success'))
    <div class="mx-3 mt-3 alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th style="width: 100px;">Aksi</th> 
              <th style="width: 50px;">No</th>
              <th>Preview Banner</th>
              <th>Judul</th>
              <th>Link Tujuan</th>
              <th style="width: 80px;">Urutan</th>
              <th style="width: 100px;">Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($banners as $data)
            <tr>
              <td>
                <div class="d-flex gap-1">
                    <button type="button" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#edit{{$data->id}}" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                    </button>
                </div>
              </td>
              <td>{{ $loop->iteration + ($banners->currentPage() - 1) * $banners->perPage() }}</td> 
              <td>
                <img src="{{ $data->image_url }}" style="height: 65px; width: 130px; object-fit: cover;" class="rounded border shadow-sm" alt="{{ $data->title }}">
              </td>
              <td>
                <strong>{{ $data->title ?: '-' }}</strong>
              </td>
              <td>
                @if($data->link_url)
                <a href="{{ $data->link_url }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 200px;">
                    <i class="bx bx-link-external me-1"></i>{{ $data->link_url }}
                </a>
                @else
                <span class="text-muted">-</span>
                @endif
              </td>
              <td>
                <span class="badge bg-label-secondary">{{ $data->order }}</span>
              </td>
              <td>
                @if($data->is_active)
                <span class="badge bg-success">Aktif</span>
                @else
                <span class="badge bg-secondary">Nonaktif</span>
                @endif
              </td>
              @include('admin.pages.banner.edit')
              @include('admin.pages.banner.delete')
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center py-4 text-muted">
                <i class="bx bx-image-alt fs-1 mb-2 d-block"></i>
                Belum ada banner iklan. Silakan klik tombol "Tambah Banner" di atas.
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-end mt-3">
        {{ $banners->links() }}
      </div>
    </div>
</div>
@include('admin.pages.banner.tambah')
@include('admin.pages.banner.dokumentasi')

@endsection
