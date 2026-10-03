@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">Data Artikel</h5>
            <div class="me-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                    Tambah Data Artikel
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Foto Siswa</th>
                            <th>Nama Karya</th>
                            <th>Deskripsi</th>
                            <th>Nama Tempat Magang</th>
                            <th>Thumbnail</th>
                            <th>YouTube Embed Url</th>
                            <th>Instagram Siswa</th>
                            <th>LinkedIn Siswa</th>
                            <th>Github Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentPortfolios as $item)
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit-{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg>
                                    </button>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->student_name }}</td>
                                <td><img src="{{ asset('storage/images/' . $item->student_image) }}" style="width: 100px" alt="">
                                </td>
                                <td>{!! wordwrap($item->title, 25, "<br>\n") !!}</td>
                                <td>{!! wordwrap($item->description, 50, "<br>\n") !!}</td>
                                <td>{{ $item->company_name }}</td>
                                <td><img src="{{ asset('storage/images/' . $item->thumbnail) }}" style="width: 200px" alt="">
                                </td>
                                <td>
                                    <iframe width="200" height="100" src="{{ $item->yt_embed_url }}" frameborder="0" allowfullscreen></iframe>
                                </td>
                                <td>
                                    @if($item->student_instagram_url)
                                        <a href="{{ $item->student_instagram_url }}" target="_blank">Instagram</a>
                                    @endif
                                </td>
                                <td>
                                    @if($item->student_linkedin_url)
                                        <a href="{{ $item->student_linkedin_url }}" target="_blank">LinkedIn</a>
                                    @endif
                                </td>
                                <td>
                                    @if($item->student_github_url)
                                        <a href="{{ $item->student_github_url }}" target="_blank">GitHub</a>
                                    @endif
                                </td>
                                @include('admin.pages.karya-siswa.edit')
                                @include('admin.pages.karya-siswa.delete')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="py-4">
                {{ $studentPortfolios->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    @include('admin.pages.karya-siswa.tambah')
@endsection
