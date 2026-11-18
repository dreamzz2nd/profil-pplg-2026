<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    @include('components.seo', [
        'title' => 'Karya & Portofolio Siswa - PPLG SMKN 1 Cirebon',
        'description' => 'Eksplorasi portofolio dan karya inovatif siswa PPLG SMKN 1 Cirebon, meliputi aplikasi web, mobile app, desain UI/UX, dan game.',
        'keywords' => 'Karya Siswa PPLG, Portofolio Siswa, Game Siswa, Web Siswa, Proyek SMKN 1 Cirebon',
        'type' => 'website',
    ])

    <link
      rel="stylesheet"
      href="{{ asset('fontawesome/css/all.min.css') }}"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <style>
      * {
        font-family: "Poppins", sans-serif !important;
      }
      *::selection {
        background-color: #6366f1;
        color: #fff;
      }
      html {
        scroll-behavior: smooth;
      }
      .gamepad {
        border: 5px solid #fff;
      }
      .swiper-pagination-bullet-active {
        background-color: #2e3c52;
        width: 25px;
        border-radius: 10px;
        transition: all 0.3s ease;
      }
      .kedap-kedip {
        animation: kedap-kedip 2s infinite;
      }
      @keyframes kedap-kedip {
        0%,
        100% {
          opacity: 0.4;
        }
        50% {
          opacity: 1;
        }
      }
      .animation-container {
        animation: slide 10s linear infinite alternate;
      }
      @keyframes slide {
        0% {
          transform: translateX(0%);
        }
        25% {
          transform: translateX(-5%);
        }
        50% {
          transform: translateX(0%);
        }
        75% {
          transform: translateX(5%);
        }
        100% {
          transform: translateX(0%);
        }
      }
      .loader {
        transform: rotateZ(45deg);
        perspective: 1000px;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        color: #fff;
      }
      .loader:before,
      .loader:after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: inherit;
        height: inherit;
        border-radius: 50%;
        transform: rotateX(70deg);
        animation: 1s spin linear infinite;
        color: #6366f1;
      }
      .loader:after {
        color: #ff3d00;
        transform: rotateY(70deg);
        animation-delay: 0.4s;
      }

      @keyframes rotate {
        0% {
          transform: translate(-50%, -50%) rotateZ(0deg);
        }
        100% {
          transform: translate(-50%, -50%) rotateZ(360deg);
        }
      }

      @keyframes rotateccw {
        0% {
          transform: translate(-50%, -50%) rotate(0deg);
        }
        100% {
          transform: translate(-50%, -50%) rotate(-360deg);
        }
      }

      @keyframes spin {
        0%,
        100% {
          box-shadow: 0.2em 0px 0 0px currentcolor;
        }
        12% {
          box-shadow: 0.2em 0.2em 0 0 currentcolor;
        }
        25% {
          box-shadow: 0 0.2em 0 0px currentcolor;
        }
        37% {
          box-shadow: -0.2em 0.2em 0 0 currentcolor;
        }
        50% {
          box-shadow: -0.2em 0 0 0 currentcolor;
        }
        62% {
          box-shadow: -0.2em -0.2em 0 0 currentcolor;
        }
        75% {
          box-shadow: 0px -0.2em 0 0 currentcolor;
        }
        87% {
          box-shadow: 0.2em -0.2em 0 0 currentcolor;
        }
      }

      .image-showing-animation {
        border: 1px solid rgb(99 102 241);
        animation: showImg 10s ease infinite;
      }

      @keyframes showImg {
        0% {
          transform: scale(0.2) rotate(0deg);
          opacity: 1;
        }
        25% {
          transform: scale(1) rotate(0deg);
          opacity: 1;
        }
        50% {
          transform: scale(1) rotate(0deg);
          opacity: 1;
        }
        75% {
          transform: scale(1) rotate(0deg);
          opacity: 0.7;
        }
        100% {
          transform: scale(0.2) rotate(720deg);
          opacity: 0;
        }
      }
    </style>
  </head>
  <body>
    <header class="relative">
      <div
        id="top-nav"
        class="bg-[#213555] py-3 md:px-10 px-4 flex justify-between items-center"
      >
        <div class="flex gap-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="#fff"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
            />
          </svg>
          <p class="text-white">{{ $major->telp }}</p>
        </div>
        <div class="flex gap-3">
          <a href="{{ $major->facebook }}">
            <img
              src="{{ asset('icons8-facebook-144.png') }}"
              alt="Instagram"
              class="w-6 aspect-square"
            />
          </a>
          <a href="{{ $major->instagram }}">
            <img
              src="{{ asset('icons8-instagram-144.png') }}"
              alt="Instagram"
              class="w-6 aspect-square"
            />
          </a>
          <a href="{{ $major->twitter }}">
            <img
              src="{{ asset('icons8-twitter-144.png') }}"
              alt="Instagram"
              class="w-6 aspect-square"
            />
          </a>
        </div>
      </div>
    </header>
    <header class="sticky top-0 z-[105] bg-white">
      <nav
        id="nav-bar"
        class="flex justify-between items-center md:px-10 px-4 py-3"
      >
        <div>
          <img
            src="{{ asset('logo.png') }}"
            class="w-10 aspect-square"
            alt="SMKN 1 Cirebon"
          />
        </div>
        <div
          id="nav-bar-items"
          class="md:flex gap-10 max-md:absolute max-md:bg-white max-md:top-20 max-md:min-h-44 max-md:right-8 max-md:w-1/2 max-md:pt-6 max-md:px-10 max-md:pb-10 max-md:text-left max-md:z-[101] max-md:backdrop-blur-3xl max-md:bg-opacity-10 max-md:rounded-lg max-md:border hidden"
        >
          <span onclick="toggleNavbarItems()">
            <a
              href="/#"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Beranda</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="/#about"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Tentang</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="/#konsentrasi-keahlian"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Konsentrasi Keahlian</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="/#artikel"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Berita</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="/#guru-dan-pengajar"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Pengajar</a
            >
          </span>
        </div>
        <div
          class="max-md:flex hidden cursor-pointer"
          onclick="toggleNavbarItems()"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-8 h-8 bar"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </div>
      </nav>
    </header>

    <!-- SplashScreen -->
    <div
      id="splash-screen"
      class="fixed z-[200] top-0 left-0 w-full min-h-screen bg-white grid place-items-center hidden"
    >
      <span class="loader"></span>
    </div>
    <!-- End of splashscreen -->

    <main class="min-h-[80vh]">
        <section id="karya-siswa" class="md:px-20 px-5 pt-5 pb-20">
            <div>
            <h3 class="text-3xl font-bold">Karya Siswa</h3>
            <span class="block w-14 h-3 bg-indigo-500 -mt-3"></span>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mt-8">
            <!-- Start Card -->
            @foreach ($studentsPortfolio as $item)
                <div class="transition-transform transform _hover:scale-[1.01]">
                    <a href="/karya-siswa/{{ $item->id }}">
                        <img src="{{ asset('storage/images/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full object-contain rounded-md">
                        <h4 class="text-lg font-semibold mt-3">{{ $item->title }}</h4>
                        <p class="text-slate-700 mt-2">{{ Str::limit($item->description, 100) }}</p>
                        <p class="text-indigo-600 mt-2 text-sm">Oleh: {{ $item->student_name }}</p>
                    </a>
                </div>
            @endforeach
            <!-- End Card -->
            </div>

            <div class="flex justify-center mt-4">
                {{ $studentsPortfolio->links('pagination::tailwind') }}
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="py-6 md:flex justify-center items-center bg-[#213555] md:px-[80px] px-5">
      <div class="text-center text-white mb-3 flex gap-x-5 items-center">
        <p>Copyright © {{ date('Y') }}, SMK Negeri 1 Cirebon</p>
        <p>|</p>
        <p>{{ $major->email }}</p>
        <p>|</p>
        <p>{{ $major->telp }}</p>
      </div>
    </footer>

    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script>
      const toggleNavbarItems = () => {
        const navBarItems = document.getElementById("nav-bar-items");
        navBarItems.classList.toggle("hidden");
        navBarItems.classList.toggle("max-md:grid");
        document.getElementById("swiper").classList.toggle("-z-10");
        document.querySelector(".bar").classList.toggle("text-indigo-500");
      };
    </script>
  </body>
</html>
