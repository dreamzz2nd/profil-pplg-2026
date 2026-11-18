<!DOCTYPE html>
<html lang="en">

@php
    $articleImage = !empty($article->images) ? asset('storage/images/' . $article->images) : url('logo.png');
@endphp
@include('components.head', [
    'title' => ($article->title ?? 'Artikel') . ' - PPLG SMKN 1 Cirebon',
    'description' => $article->description ?? '',
    'keywords' => ($article->category_name ?? 'Artikel') . ', PPLG SMKN 1 Cirebon, Berita PPLG',
    'image' => $articleImage,
    'author' => $article->author ?? 'PPLG SMKN 1 Cirebon',
    'publishedTime' => $article->date ?? null,
    'type' => 'article',
])

<body>
    <main class="pt-24">
        <header>
            <nav class="fixed top-0 w-full z-50">
                <div class="flex justify-between items-center h-18 py-2 md:px-20 px-4 py-2 text-black bg-white" id="nav">
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
        <section class="md:px-20 px-5 md:pt-10 pt-4 grid md:grid-cols-3 grid-cols-1 gap-x-14 pb-20">
            <div class="md:col-span-2">
                <div>
                    <img src="{{asset('storage/images/' . $article->images)}}" class="w-full rounded">
                </div>
                <div class="flex md:justify-between md:items-start max-md:flex-col gap-y-4 gap-y-8 mt-8">
                    <h1 class="text-3xl font-semibold">{{$article->title}}</h1>
                    <p class="text-gray-700">
                        <span>{{$article->author}}</span>
                        &nbsp;
                        <span>{{$article->date}}</span>
                    </p>
                </div>
                <div class="articles-body mt-9">
                    <p class="text-gray-800 text-justify">
                        {{$article->description}}
                    </p>
                </div>
            </div>
            <div class="md:col-span-1">
                @foreach($articles as $article)
                <br class="md:hidden" />
                    <div class="flex max-md:flex-col gap-5">
                        <div class="md:pt-[5px]">
                            <p class="text-lg font-semibold">
                                <a href="{{'/artikel/'.$article->id}}">{{$article->title}}</a>
                            </p>
                            <p class="text-gray-400 text-sm">
                                {{$article->author}} - {{$article->date}}
                            </p>
                            <p class="text-gray-500">
                                {{substr($article->description, 0, 80)}}...
                            </p>
                            <div class="flex gap-x-4 my-3">
                                <div class="badge border border-gray-600 text-sm text-gray-600 px-2">
                                    {{$article->category_name}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-8 w-full text-center">
                    <a href="/artikel" class="block w-full bg-black py-3 px-5 text-white hover:bg-gray-800" id="title">Semua
                        Artikel</a>
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
