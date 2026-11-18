<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    @php
        $portfolioImage = !empty($item->student_image) 
            ? asset('storage/images/' . $item->student_image) 
            : (!empty($item->thumbnail) ? asset('storage/images/' . $item->thumbnail) : url('logo.png'));
    @endphp
    @include('components.seo', [
        'title' => ($item->title ?? 'Karya Siswa') . ' - Karya ' . ($item->student_name ?? 'Siswa') . ' | PPLG SMKN 1 Cirebon',
        'description' => $item->description ?? 'Portofolio karya siswa PPLG SMKN 1 Cirebon.',
        'keywords' => ($item->title ?? 'Karya Siswa') . ', Karya Siswa PPLG, Portofolio Siswa, SMKN 1 Cirebon',
        'image' => $portfolioImage,
        'author' => $item->student_name ?? 'PPLG SMKN 1 Cirebon',
        'type' => 'article',
    ])
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <style>
        * {
            font-family: "Poppins", sans-serif !important;
        }
    </style>
</head>
<body>
    <main>
        <section class="min-h-screen bg-[#FFD700] md:px-12 px-5"> <!-- Mengganti warna latar belakang menjadi kuning yang lebih cocok -->
            <div class="grid md:grid-cols-4 md:gap-12 gap:6 h-full">
                <div class="md:col-span-1">
                    <div class="relative max-md:max-w-full bg-white rounded-b-full flex flex-col items-center justify-end gap-3 p-6 pt-[60px]">
                        <div class="text-center">
                            <h3 class="font-semibold text-xl">
                                {{ $item->student_name }}
                            </h3>
                            <p class="text-slate-800">
                                {{ $item->school_name ?? '' }}
                            </p>
                            <div class="flex justify-center my-3 space-x-4">
                                @if (isset($item->student_instagram_url))
                                    <a href="{{ $item->student_instagram_url }}" target="_blank" class="text-pink-500 hover:opacity-75">
                                        <i class="fa-brands fa-instagram fa-2x"></i>
                                    </a>
                                @endif
                                @if (isset($item->student_linkedin_url))
                                    <a href="{{ $item->student_linkedin_url }}" target="_blank" class="text-blue-700 hover:opacity-75">
                                        <i class="fa-brands fa-linkedin fa-2x"></i>
                                    </a>
                                @endif
                                @if (isset($item->student_github_url))
                                    <a href="{{ $item->student_github_url }}" target="_blank" class="text-gray-800 hover:opacity-75">
                                        <i class="fa-brands fa-github fa-2x"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <img src="{{ asset('storage/images/' . $item->student_image) }}" alt="{{ $item->student_name }}" class="w-full aspect-square object-cover rounded-full border border-8 border-[#FFD700]"> <!-- Mengganti warna border menjadi kuning -->
                    </div>
                </div>
                <div class="md:col-span-3">
                    <div class="py-6">
                        <img src="{{ asset('logo.png') }}" alt="Logo Neper" class="w-20 mt-1">
                        <p class="mt-5">
                            {{ $item->description }}
                        </p>
                        <div class="mt-4 flex max-md:flex-col md:items-center md:gap-10 gap-4">
                            <div>
                                <h5 class="text-base font-semibold">Nama Karya:</h5>
                                <p class="text-base">{{ $item->title }}</p>
                            </div>
                            <div class="max-md:hidden">
                                <span class="inline-block h-[80%] w-1 rounded-xl bg-slate-800"></span>
                            </div>
                            <div>
                                <h5 class="text-base font-semibold">Perusahaan Tempat Magang:</h5>
                                <p class="text-base">{{ $item->company_name }}</p>
                            </div>
                        </div>
                        @if (isset($item->yt_embed_url) || isset($item->thumbnail))
                            <div class="mt-8">
                                <div class="border border-8 rounded-lg border-white">
                                    @if (isset($item->yt_embed_url) && $item->yt_embed_url !== '-')
                                        <iframe width="560" height="auto" src="{{ $item->yt_embed_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" class="aspect-video w-full" allowfullscreen></iframe>
                                    @elseif (isset($item->thumbnail))
                                        <img
                                            src="{{ asset('storage/images/' . $item->thumbnail) }}"
                                            alt="{{ $item->title }}"
                                            class="w-full object-contain"
                                        >
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex items-center pb-4">
                <a href="javascript:history.back()" class="flex items-center text-gray-800 hover:opacity-75">
                    <i class="fa-solid fa-arrow-left fa-lg mr-2"></i>
                    Kembali
                </a>
            </div>
        </section>
    </main>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
</body>
</html>
