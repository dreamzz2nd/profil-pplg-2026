<!DOCTYPE html>
<html lang="en">

@include('components.head', [
    'title' => 'Artikel & Berita - PPLG SMKN 1 Cirebon',
    'description' => 'Kumpulan berita, artikel teknologi, informasi kegiatan, dan kabar seputar Pengembangan Perangkat Lunak dan Gim SMKN 1 Cirebon.',
    'keywords' => 'Artikel PPLG, Berita PPLG SMKN 1 Cirebon, Berita Teknologi, Artikel Coding, PPLG Neper',
    'type' => 'website',
])

<body>
    <main class="pt-24">
        <header>
            <nav class="fixed top-0 w-full z-50">
                <div class="flex justify-between items-center h-18 py-2 md:px-20 px-4 text-black bg-white" id="nav">
                    <div class="logo">
                        <img src="{{asset('logo.png')}}" alt="" class="w-12 h-12" />
                    </div>
                    <div class="flex gap-4 max-md:hidden">
                        <a href="/#">
                            <span class="nav-link">Beranda</span>
                        </a>
                        <a href="/#tentang">
                            <span class="nav-link">Tentang</span>
                        </a>
                        <a href="/#keahlian">
                            <span class="nav-link">Keahlian</span>
                        </a>
                        <a href="/#artikel">
                            <span class="nav-link">Artikel</span>
                        </a>
                        <a href="/#pengajar">
                            <span class="nav-link">Pengajar</span>
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <section class="md:px-10 px-3 pb-20" id="artikel">
            <div class="my-5">
                <p class="text-3xl font-semibold font-serif" id="title">Artikel dan Berita</p>
            </div>
            <div class="flex gap-7 max-md:flex-wrap">
                <div class="md:w-8/12 w-full flex flex-col gap-4 gap-y-6">
                    @foreach($articles as $article)
                    <a href="{{'/artikel/'.$article->id}}" class="flex max-md:flex-col gap-5">
                        <!--<div class="h-[230px] max-md:h-[200px] md:w-1/2">-->
                        <div class="h-[230px] max-md:h-[200px] md:w-1/2">
                            <img src="{{asset('storage/images/' . $article->images)}}" class="object-cover w-full h-full" alt="" />
                        </div>
                        <div class="md:pt-[5px] md:w-1/2">
                            <p class="text-gray-400 text-sm">
                                {{$article->author}} - {{$article->date}}
                            </p>
                            <p class="text-lg font-semibold">
                                {{$article->title}}
                            </p>
                            <p class="text-gray-500">
                                {{substr($article->description, 0, 80)}}...
                            </p>
                            <div class="flex gap-x-4 mt-3">
                                <div class="badge border border-gray-600 text-sm text-gray-600 px-2">
                                    {{$article->category_name}}
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 40,
            once: true,
            duration: 700
        })
    </script>
</body>

</html>
