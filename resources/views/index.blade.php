<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    @include('components.seo', [
        'title' => 'Pengembangan Perangkat Lunak dan Gim - SMKN 1 Cirebon',
        'description' => 'Website Resmi Kompetensi Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) SMKN 1 Cirebon. Informasi jurusan, kurikulum, pengajar, karya siswa, dan berita terkini.',
        'keywords' => 'PPLG, Pengembangan Perangkat Lunak dan Gim, RPL SMKN 1 Cirebon, Profil PPLG, Coding, Game Development, Web Development',
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
              href="#"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Beranda</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="#about"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Tentang</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="#konsentrasi-keahlian"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Konsentrasi Keahlian</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="#artikel"
              class="hover:text-indigo-500 transition-all ease duration-300"
              >Berita</a
            >
          </span>
          <span onclick="toggleNavbarItems()">
            <a
              href="#guru-dan-pengajar"
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

    <main>
        <!-- Jumbotron -->
        <section class="flex pb-10">
            <div
            class="w-1/12 kedap-kedip max-md:hidden flex justify-between items-center flex-col pt-10 gap-8"
            >
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/html-ddd45f7d.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/css-3-d2e9f9dd.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/js-30558d7e.png"
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEY0lEQVR4nO2d32sUVxTHlxb7x/jap5kUFGsexAetcRWt2BedG1EU2kK1PiwS0ZhYsYhvBUFjlGixpWSuNdXYpLL+BKOJRo3RJprUbMyvzWY1ye6RsxJbsOve2cydO9l8P3BeB8753N87OzcSAQAAAAAAAAAAAADAA9GFDZ84duNax3brHcvtFJY7LmxJJRWWO865cY6iTK7hnEPRSCrt8xWOJR8bL5AdtBDZ5ZTJVcYKH402fCxs96DxQthmw7FlbSwS+yhwASi+/FeC5R4IfNgx3fJEyMKxGlcGUnyefHj8M52wCFtYbncgEzOvdowna4czHEtGAxAgT5lOVIQ0HEvWBSDAfWg6URHS4H2CfgGWmzSdqAhpcG20CzCdpAh5QIANAUotxU/S41P0sn+Ceh6OUufNQfrzXA8d33eXvq+4jB4QhIAP0d0+TD/FbtPWRb9jCDIhYIaRwVd0rOoO5gBTAma4d32QdmscmubMJGyS8dFJOrTtGgSY5HV6mmoqr6IHmGQ48Yq+XvYHhiCTNJ/9GwJUKDSnbPnsPO1c2Ux1Ne2U6JsgVaYmM/TNsouYhAvhZYLfsbSJOq4lSJWTNe0QUAivqyyWwLtjFW5d6oeAQhSz1OWWrUL/kyQE6BCw64tmUmEiOQUBOgTw+Y8KmeksBGjpAasukwrpFHqAFgH1tR2FH0yUW7b6dcRSsmdBwusqqLyJXv6TVnp2W+sLCCiE1+LzqacqDT/eh4BCqOyEedXDw45qy2emp7L03YpmCDBFyy89vhW/pOcAHQz2Tfh6DgQBHkiNTdKeDa2+Fh8CFBnoTVFsvf/FhwAFBp6laM+XeooPAR5ojyeoauNfEGASXoKePnQPPcA0Z49gI2aUbCZLtVv8eUOiZPcBQvG525dcoOpNcbrY8DT3e68qvY/GqLIMAvJSjGSeZIdeqB9L/LB19i9rzfseIP5HgmpP8OMVFQiw3y/KpTNPlQQ86RiBgHzMplVWb46TCmNDryFAhwB+RUUFHqowBOkQUK4mIJWchACTQxAf0qEH5GE2heHVjQpdd4YhIB/FFn/vV1eUl6Fx9xkE5KPY4g8PqG/ETuy/CwH5UC369s8v0AEnnht2vBxF8Ntx3y6f/c+TJbsR082Npj5f8oKAIuCeElvXAgGm+Plopy/FRw8ogtZfe3w5hoYAj2QyWWo81uVr8dEDFOFTT14p+Vl4CFD4ospV+ZwO77jue6uHgP/8+503Xs+7k9TVNkRXfuul+oMdubOgbYvxtZR5EZG5shEr1YjoBh/tk3mL79hyVLsAYckHpluZCG2497ULyH0/33iiMpxhyRPaBfDlBcYTtUMalrtauwDn05sLHNt9ZDxZO1zBl1gEdqsG3xxhOmERvlgRSPHfSbBlbQiSppBEdSRo+NoOYbk1IUieTN+eYeQKkxn45oj5OCc4b3MOdtj54MRsySh/P5/XwqW4WXNyOXFuso5XO5yz6boDAAAAAAAAAAAAgMic4g1CTFkyCR2uawAAAABJRU5ErkJggg=="
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,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"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/react-b828736d.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/php-80069a19.png"
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,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"
                class="w-8"
                alt=""
            /><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACp0lEQVR4nO2Xz2sTQRTHt2D1Iijaf8FLLUmazc4ktiH9kZ3ZJN15AclBLwpCbnqsJxNoERuVHCzqQaGQVElprQh68yD0UBE8F+zFm4p67sGQkUm7yWa7m2SLUgLzgWGZfW/fe1/m5yqKRCKRSCQSieRYQRR2kMFyiqIMKYMIpsCbjbD3ykALoMCVQQRLAccMliNwQDABZzFhJUzZL/EUfaULiReJkWSFbhm1TENbim6pD9URvznUZO5MtxHoqyZVzQ9jks0jyn7YgyHKfmMCtw3DONVReDFxIrlCy+l188/c6ywXbeq5zgMFtR5a1Kq5Yu6kaw7KbmECP+05sKPvuyZETUAUvnQEdbR9O2PCf6ZC5401c88qvNU2s1wrxXjgTpgHC+re+CKat4rpJwe2CfBVEyKs7jB81HTzmnh2vCesLoIba2bjUPEHjbxM80AhvC+iqDZaAhw5MIFtkQMT2HYV4FITpnDdtaZOx+wV23E+JPrO4PGn067FW23iUaIpQIyGJcBvDtzFXyNwtcO/1xbmtEfLk5yspj0FZDaAR+5FufDzitErB3aOSDk+g8uTX8XTbkeEvTuSgEgp1izUS0SyYvxXAYjCLiZw+UjB0f1LzXkef9x9KsWfTLsKEFPAzxTSOv17F9jLHipGrEXKaW3OU4BRM1vx3BYlMuCG10bhsug/YQpTXQUgAm/c7OK9XUD4rrYcLITrQgR+MOFafGrdrOtVY7mdgzE/WzX28ifwVqPmxcM/E9QEzyFq78s7Vn+0OHp6fAFtBgrhxuwKbS/gV8D1auoDeUbOOWO0Dyb43s9hqar54SiBm86DTnyvzWbPK/+C0AK+gJZinzMbjOurqV29oo/1+qZ5dRBXAwLfrKtEX/59Xm8kEolEIpFIJBKJRBkU/gIP08f/AcFN4wAAAABJRU5ErkJggg=="
                class="w-8"
                alt=""
            />
            </div>
            <div
            id="swiper"
            class="mt-3 pt-5 md:z-10 swiper md:w-10/12 w-full mx-auto"
            >
            <div class="swiper-wrapper">
                @foreach($jumbotrons as $jumbotron)
                <div class="overflow-hidden rounded-lg swiper-slide">
                <img
                    src="{{ asset('storage/images/' . $jumbotron->images) }}"
                    alt="Jumbotron Image PPLG Neper"
                    class="w-full object-contain rounded-lg"
                />
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div
                class="swiper-button-prev text-slate-100 md:scale-75 scale-50"
            ></div>
            <div
                class="swiper-button-next text-slate-100 md:scale-75 scale-50"
            ></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
            </div>
            <div
            class="w-1/12 kedap-kedip max-md:hidden flex justify-between items-center flex-col-reverse pt-10 gap-8"
            >
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/html-ddd45f7d.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/css-3-d2e9f9dd.png"
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEY0lEQVR4nO2d32sUVxTHlxb7x/jap5kUFGsexAetcRWt2BedG1EU2kK1PiwS0ZhYsYhvBUFjlGixpWSuNdXYpLL+BKOJRo3RJprUbMyvzWY1ye6RsxJbsOve2cydO9l8P3BeB8753N87OzcSAQAAAAAAAAAAAADAA9GFDZ84duNax3brHcvtFJY7LmxJJRWWO865cY6iTK7hnEPRSCrt8xWOJR8bL5AdtBDZ5ZTJVcYKH402fCxs96DxQthmw7FlbSwS+yhwASi+/FeC5R4IfNgx3fJEyMKxGlcGUnyefHj8M52wCFtYbncgEzOvdowna4czHEtGAxAgT5lOVIQ0HEvWBSDAfWg6URHS4H2CfgGWmzSdqAhpcG20CzCdpAh5QIANAUotxU/S41P0sn+Ceh6OUufNQfrzXA8d33eXvq+4jB4QhIAP0d0+TD/FbtPWRb9jCDIhYIaRwVd0rOoO5gBTAma4d32QdmscmubMJGyS8dFJOrTtGgSY5HV6mmoqr6IHmGQ48Yq+XvYHhiCTNJ/9GwJUKDSnbPnsPO1c2Ux1Ne2U6JsgVaYmM/TNsouYhAvhZYLfsbSJOq4lSJWTNe0QUAivqyyWwLtjFW5d6oeAQhSz1OWWrUL/kyQE6BCw64tmUmEiOQUBOgTw+Y8KmeksBGjpAasukwrpFHqAFgH1tR2FH0yUW7b6dcRSsmdBwusqqLyJXv6TVnp2W+sLCCiE1+LzqacqDT/eh4BCqOyEedXDw45qy2emp7L03YpmCDBFyy89vhW/pOcAHQz2Tfh6DgQBHkiNTdKeDa2+Fh8CFBnoTVFsvf/FhwAFBp6laM+XeooPAR5ojyeoauNfEGASXoKePnQPPcA0Z49gI2aUbCZLtVv8eUOiZPcBQvG525dcoOpNcbrY8DT3e68qvY/GqLIMAvJSjGSeZIdeqB9L/LB19i9rzfseIP5HgmpP8OMVFQiw3y/KpTNPlQQ86RiBgHzMplVWb46TCmNDryFAhwB+RUUFHqowBOkQUK4mIJWchACTQxAf0qEH5GE2heHVjQpdd4YhIB/FFn/vV1eUl6Fx9xkE5KPY4g8PqG/ETuy/CwH5UC369s8v0AEnnht2vBxF8Ntx3y6f/c+TJbsR082Npj5f8oKAIuCeElvXAgGm+Plopy/FRw8ogtZfe3w5hoYAj2QyWWo81uVr8dEDFOFTT14p+Vl4CFD4ospV+ZwO77jue6uHgP/8+503Xs+7k9TVNkRXfuul+oMdubOgbYvxtZR5EZG5shEr1YjoBh/tk3mL79hyVLsAYckHpluZCG2497ULyH0/33iiMpxhyRPaBfDlBcYTtUMalrtauwDn05sLHNt9ZDxZO1zBl1gEdqsG3xxhOmERvlgRSPHfSbBlbQiSppBEdSRo+NoOYbk1IUieTN+eYeQKkxn45oj5OCc4b3MOdtj54MRsySh/P5/XwqW4WXNyOXFuso5XO5yz6boDAAAAAAAAAAAAgMic4g1CTFkyCR2uawAAAABJRU5ErkJggg=="
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,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"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/react-b828736d.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/php-80069a19.png"
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,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"
                class="w-8"
                alt=""
            /><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACp0lEQVR4nO2Xz2sTQRTHt2D1Iijaf8FLLUmazc4ktiH9kZ3ZJN15AclBLwpCbnqsJxNoERuVHCzqQaGQVElprQh68yD0UBE8F+zFm4p67sGQkUm7yWa7m2SLUgLzgWGZfW/fe1/m5yqKRCKRSCQSieRYQRR2kMFyiqIMKYMIpsCbjbD3ykALoMCVQQRLAccMliNwQDABZzFhJUzZL/EUfaULiReJkWSFbhm1TENbim6pD9URvznUZO5MtxHoqyZVzQ9jks0jyn7YgyHKfmMCtw3DONVReDFxIrlCy+l188/c6ywXbeq5zgMFtR5a1Kq5Yu6kaw7KbmECP+05sKPvuyZETUAUvnQEdbR9O2PCf6ZC5401c88qvNU2s1wrxXjgTpgHC+re+CKat4rpJwe2CfBVEyKs7jB81HTzmnh2vCesLoIba2bjUPEHjbxM80AhvC+iqDZaAhw5MIFtkQMT2HYV4FITpnDdtaZOx+wV23E+JPrO4PGn067FW23iUaIpQIyGJcBvDtzFXyNwtcO/1xbmtEfLk5yspj0FZDaAR+5FufDzitErB3aOSDk+g8uTX8XTbkeEvTuSgEgp1izUS0SyYvxXAYjCLiZw+UjB0f1LzXkef9x9KsWfTLsKEFPAzxTSOv17F9jLHipGrEXKaW3OU4BRM1vx3BYlMuCG10bhsug/YQpTXQUgAm/c7OK9XUD4rrYcLITrQgR+MOFafGrdrOtVY7mdgzE/WzX28ifwVqPmxcM/E9QEzyFq78s7Vn+0OHp6fAFtBgrhxuwKbS/gV8D1auoDeUbOOWO0Dyb43s9hqar54SiBm86DTnyvzWbPK/+C0AK+gJZinzMbjOurqV29oo/1+qZ5dRBXAwLfrKtEX/59Xm8kEolEIpFIJBKJRBkU/gIP08f/AcFN4wAAAABJRU5ErkJggg=="
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/js-30558d7e.png"
                class="w-8"
                alt=""
            />
            </div>
        </section>

        <!-- Animation Image -->
        <section class="md:hidden grid place-items-center grid-cols-5 gap-4">
            <img
            src="https://my-portfolio-one-brown-27.vercel.app/assets/html-ddd45f7d.png"
            class="w-8"
            alt=""
            />
            <img
            src="https://my-portfolio-one-brown-27.vercel.app/assets/css-3-d2e9f9dd.png"
            class="w-8"
            alt=""
            />
            <img
            src="https://my-portfolio-one-brown-27.vercel.app/assets/js-30558d7e.png"
            class="w-8"
            alt=""
            />
            <img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEY0lEQVR4nO2d32sUVxTHlxb7x/jap5kUFGsexAetcRWt2BedG1EU2kK1PiwS0ZhYsYhvBUFjlGixpWSuNdXYpLL+BKOJRo3RJprUbMyvzWY1ye6RsxJbsOve2cydO9l8P3BeB8753N87OzcSAQAAAAAAAAAAAADAA9GFDZ84duNax3brHcvtFJY7LmxJJRWWO865cY6iTK7hnEPRSCrt8xWOJR8bL5AdtBDZ5ZTJVcYKH402fCxs96DxQthmw7FlbSwS+yhwASi+/FeC5R4IfNgx3fJEyMKxGlcGUnyefHj8M52wCFtYbncgEzOvdowna4czHEtGAxAgT5lOVIQ0HEvWBSDAfWg6URHS4H2CfgGWmzSdqAhpcG20CzCdpAh5QIANAUotxU/S41P0sn+Ceh6OUufNQfrzXA8d33eXvq+4jB4QhIAP0d0+TD/FbtPWRb9jCDIhYIaRwVd0rOoO5gBTAma4d32QdmscmubMJGyS8dFJOrTtGgSY5HV6mmoqr6IHmGQ48Yq+XvYHhiCTNJ/9GwJUKDSnbPnsPO1c2Ux1Ne2U6JsgVaYmM/TNsouYhAvhZYLfsbSJOq4lSJWTNe0QUAivqyyWwLtjFW5d6oeAQhSz1OWWrUL/kyQE6BCw64tmUmEiOQUBOgTw+Y8KmeksBGjpAasukwrpFHqAFgH1tR2FH0yUW7b6dcRSsmdBwusqqLyJXv6TVnp2W+sLCCiE1+LzqacqDT/eh4BCqOyEedXDw45qy2emp7L03YpmCDBFyy89vhW/pOcAHQz2Tfh6DgQBHkiNTdKeDa2+Fh8CFBnoTVFsvf/FhwAFBp6laM+XeooPAR5ojyeoauNfEGASXoKePnQPPcA0Z49gI2aUbCZLtVv8eUOiZPcBQvG525dcoOpNcbrY8DT3e68qvY/GqLIMAvJSjGSeZIdeqB9L/LB19i9rzfseIP5HgmpP8OMVFQiw3y/KpTNPlQQ86RiBgHzMplVWb46TCmNDryFAhwB+RUUFHqowBOkQUK4mIJWchACTQxAf0qEH5GE2heHVjQpdd4YhIB/FFn/vV1eUl6Fx9xkE5KPY4g8PqG/ETuy/CwH5UC369s8v0AEnnht2vBxF8Ntx3y6f/c+TJbsR082Npj5f8oKAIuCeElvXAgGm+Plopy/FRw8ogtZfe3w5hoYAj2QyWWo81uVr8dEDFOFTT14p+Vl4CFD4ospV+ZwO77jue6uHgP/8+503Xs+7k9TVNkRXfuul+oMdubOgbYvxtZR5EZG5shEr1YjoBh/tk3mL79hyVLsAYckHpluZCG2497ULyH0/33iiMpxhyRPaBfDlBcYTtUMalrtauwDn05sLHNt9ZDxZO1zBl1gEdqsG3xxhOmERvlgRSPHfSbBlbQiSppBEdSRo+NoOYbk1IUieTN+eYeQKkxn45oj5OCc4b3MOdtj54MRsySh/P5/XwqW4WXNyOXFuso5XO5yz6boDAAAAAAAAAAAAgMic4g1CTFkyCR2uawAAAABJRU5ErkJggg=="
            class="w-8"
            alt=""
            />
            <img
            src="data:image/png;base64,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"
            class="w-8"
            alt=""
            />
        </section>
        <section class="md:hidden grid place-items-center grid-cols-5 gap-4 mt-4">
            <img
            src="https://my-portfolio-one-brown-27.vercel.app/assets/react-b828736d.png"
            class="w-8"
            alt=""
            />
            <img
            src="https://my-portfolio-one-brown-27.vercel.app/assets/php-80069a19.png"
            class="w-8"
            alt=""
            />
            <img
            src="data:image/png;base64,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"
            class="w-8"
            alt=""
            />
            <img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACp0lEQVR4nO2Xz2sTQRTHt2D1Iijaf8FLLUmazc4ktiH9kZ3ZJN15AclBLwpCbnqsJxNoERuVHCzqQaGQVElprQh68yD0UBE8F+zFm4p67sGQkUm7yWa7m2SLUgLzgWGZfW/fe1/m5yqKRCKRSCQSieRYQRR2kMFyiqIMKYMIpsCbjbD3ykALoMCVQQRLAccMliNwQDABZzFhJUzZL/EUfaULiReJkWSFbhm1TENbim6pD9URvznUZO5MtxHoqyZVzQ9jks0jyn7YgyHKfmMCtw3DONVReDFxIrlCy+l188/c6ywXbeq5zgMFtR5a1Kq5Yu6kaw7KbmECP+05sKPvuyZETUAUvnQEdbR9O2PCf6ZC5401c88qvNU2s1wrxXjgTpgHC+re+CKat4rpJwe2CfBVEyKs7jB81HTzmnh2vCesLoIba2bjUPEHjbxM80AhvC+iqDZaAhw5MIFtkQMT2HYV4FITpnDdtaZOx+wV23E+JPrO4PGn067FW23iUaIpQIyGJcBvDtzFXyNwtcO/1xbmtEfLk5yspj0FZDaAR+5FufDzitErB3aOSDk+g8uTX8XTbkeEvTuSgEgp1izUS0SyYvxXAYjCLiZw+UjB0f1LzXkef9x9KsWfTLsKEFPAzxTSOv17F9jLHipGrEXKaW3OU4BRM1vx3BYlMuCG10bhsug/YQpTXQUgAm/c7OK9XUD4rrYcLITrQgR+MOFafGrdrOtVY7mdgzE/WzX28ifwVqPmxcM/E9QEzyFq78s7Vn+0OHp6fAFtBgrhxuwKbS/gV8D1auoDeUbOOWO0Dyb43s9hqar54SiBm86DTnyvzWbPK/+C0AK+gJZinzMbjOurqV29oo/1+qZ5dRBXAwLfrKtEX/59Xm8kEolEIpFIJBKJRBkU/gIP08f/AcFN4wAAAABJRU5ErkJggg=="
            class="w-8"
            alt=""
            />
            <img
            src="data:image/png;base64,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"
            class="w-8"
            alt=""
            />
        </section>
        <!-- TIDAK DIGUNAKAN YA YANG INI -->
        <section class="hidden overflow-hidden">
            <div
            class="animation-container overflow-hidden md:hidden grid grid-cols-9 justify-between items-center py-4 gap-2"
            >
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/html-ddd45f7d.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/css-3-d2e9f9dd.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/js-30558d7e.png"
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEY0lEQVR4nO2d32sUVxTHlxb7x/jap5kUFGsexAetcRWt2BedG1EU2kK1PiwS0ZhYsYhvBUFjlGixpWSuNdXYpLL+BKOJRo3RJprUbMyvzWY1ye6RsxJbsOve2cydO9l8P3BeB8753N87OzcSAQAAAAAAAAAAAADAA9GFDZ84duNax3brHcvtFJY7LmxJJRWWO865cY6iTK7hnEPRSCrt8xWOJR8bL5AdtBDZ5ZTJVcYKH402fCxs96DxQthmw7FlbSwS+yhwASi+/FeC5R4IfNgx3fJEyMKxGlcGUnyefHj8M52wCFtYbncgEzOvdowna4czHEtGAxAgT5lOVIQ0HEvWBSDAfWg6URHS4H2CfgGWmzSdqAhpcG20CzCdpAh5QIANAUotxU/S41P0sn+Ceh6OUufNQfrzXA8d33eXvq+4jB4QhIAP0d0+TD/FbtPWRb9jCDIhYIaRwVd0rOoO5gBTAma4d32QdmscmubMJGyS8dFJOrTtGgSY5HV6mmoqr6IHmGQ48Yq+XvYHhiCTNJ/9GwJUKDSnbPnsPO1c2Ux1Ne2U6JsgVaYmM/TNsouYhAvhZYLfsbSJOq4lSJWTNe0QUAivqyyWwLtjFW5d6oeAQhSz1OWWrUL/kyQE6BCw64tmUmEiOQUBOgTw+Y8KmeksBGjpAasukwrpFHqAFgH1tR2FH0yUW7b6dcRSsmdBwusqqLyJXv6TVnp2W+sLCCiE1+LzqacqDT/eh4BCqOyEedXDw45qy2emp7L03YpmCDBFyy89vhW/pOcAHQz2Tfh6DgQBHkiNTdKeDa2+Fh8CFBnoTVFsvf/FhwAFBp6laM+XeooPAR5ojyeoauNfEGASXoKePnQPPcA0Z49gI2aUbCZLtVv8eUOiZPcBQvG525dcoOpNcbrY8DT3e68qvY/GqLIMAvJSjGSeZIdeqB9L/LB19i9rzfseIP5HgmpP8OMVFQiw3y/KpTNPlQQ86RiBgHzMplVWb46TCmNDryFAhwB+RUUFHqowBOkQUK4mIJWchACTQxAf0qEH5GE2heHVjQpdd4YhIB/FFn/vV1eUl6Fx9xkE5KPY4g8PqG/ETuy/CwH5UC369s8v0AEnnht2vBxF8Ntx3y6f/c+TJbsR082Npj5f8oKAIuCeElvXAgGm+Plopy/FRw8ogtZfe3w5hoYAj2QyWWo81uVr8dEDFOFTT14p+Vl4CFD4ospV+ZwO77jue6uHgP/8+503Xs+7k9TVNkRXfuul+oMdubOgbYvxtZR5EZG5shEr1YjoBh/tk3mL79hyVLsAYckHpluZCG2497ULyH0/33iiMpxhyRPaBfDlBcYTtUMalrtauwDn05sLHNt9ZDxZO1zBl1gEdqsG3xxhOmERvlgRSPHfSbBlbQiSppBEdSRo+NoOYbk1IUieTN+eYeQKkxn45oj5OCc4b3MOdtj54MRsySh/P5/XwqW4WXNyOXFuso5XO5yz6boDAAAAAAAAAAAAgMic4g1CTFkyCR2uawAAAABJRU5ErkJggg=="
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,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"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/react-b828736d.png"
                class="w-8"
                alt=""
            />
            <img
                src="https://my-portfolio-one-brown-27.vercel.app/assets/php-80069a19.png"
                class="w-8"
                alt=""
            />
            <img
                src="data:image/png;base64,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"
                class="w-8"
                alt=""
            /><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACp0lEQVR4nO2Xz2sTQRTHt2D1Iijaf8FLLUmazc4ktiH9kZ3ZJN15AclBLwpCbnqsJxNoERuVHCzqQaGQVElprQh68yD0UBE8F+zFm4p67sGQkUm7yWa7m2SLUgLzgWGZfW/fe1/m5yqKRCKRSCQSieRYQRR2kMFyiqIMKYMIpsCbjbD3ykALoMCVQQRLAccMliNwQDABZzFhJUzZL/EUfaULiReJkWSFbhm1TENbim6pD9URvznUZO5MtxHoqyZVzQ9jks0jyn7YgyHKfmMCtw3DONVReDFxIrlCy+l188/c6ywXbeq5zgMFtR5a1Kq5Yu6kaw7KbmECP+05sKPvuyZETUAUvnQEdbR9O2PCf6ZC5401c88qvNU2s1wrxXjgTpgHC+re+CKat4rpJwe2CfBVEyKs7jB81HTzmnh2vCesLoIba2bjUPEHjbxM80AhvC+iqDZaAhw5MIFtkQMT2HYV4FITpnDdtaZOx+wV23E+JPrO4PGn067FW23iUaIpQIyGJcBvDtzFXyNwtcO/1xbmtEfLk5yspj0FZDaAR+5FufDzitErB3aOSDk+g8uTX8XTbkeEvTuSgEgp1izUS0SyYvxXAYjCLiZw+UjB0f1LzXkef9x9KsWfTLsKEFPAzxTSOv17F9jLHipGrEXKaW3OU4BRM1vx3BYlMuCG10bhsug/YQpTXQUgAm/c7OK9XUD4rrYcLITrQgR+MOFafGrdrOtVY7mdgzE/WzX28ifwVqPmxcM/E9QEzyFq78s7Vn+0OHp6fAFtBgrhxuwKbS/gV8D1auoDeUbOOWO0Dyb43s9hqar54SiBm86DTnyvzWbPK/+C0AK+gJZinzMbjOurqV29oo/1+qZ5dRBXAwLfrKtEX/59Xm8kEolEIpFIJBKJRBkU/gIP08f/AcFN4wAAAABJRU5ErkJggg=="
                class="w-8"
                alt=""
            />
            </div>
        </section>
        <!-- END Animation Image -->

        <!-- ABOUT Section -->
        <section id="about" class="md:px-20 px-5 mt-8 pb-10">
            <div class="text-center">
            <h2 class="font-semibold text-xl mb-4 max-md:px-10">
                {{ $about->title }}
            </h2>
            <p
                class="text-base text-slate-800 text-justify indent-8 relative z-10"
            >
                {{ $about->description }}
            </p>
            </div>
            <div class="mt-20 relative">
            <div class="relative flex justify-between max-md:flex-wrap">
                <img src="{{ asset('data.png') }}" alt="Data" class="md:w-1/2 w-full max-md:hidden" />
                <img
                src="{{ asset('storage/images/' . $about->images) }}"
                class="md:hidden rounded-lg w-1/4 md:absolute right-44 -top-20 -z-0 shadow max-md:block max-md:w-full"
                alt="Kunjungan Industri Jurusan PPLG"
                />
                <img
                src="{{ asset('presentation.png') }}"
                alt="Presentation"
                class="md:w-1/2 w-full max-md:hidden"
                />
            </div>
            <img
                src="{{ asset('storage/images/' . $about->images) }}"
                class="max-md:hidden rounded-lg w-1/4 md:absolute right-72 -top-10 -z-0 image-showing-animation image-animation shadow max-md:w-full"
                alt="Kunjungan Industri Jurusan PPLG"
            />
            </div>
        </section>

        <!-- Konsentrasi Keahlian -->
        <section id="konsentrasi-keahlian" class="md:px-20 px-5 mt-8 pb-10">
            <div>
            <h1 class="text-2xl font-semibold">Konsentrasi Keahlian</h1>
            <span class="block w-14 h-3 bg-indigo-500 -mt-3"></span>
            </div>
            <div class="grid md:grid-cols-3 mt-8 gap-10">
            <!-- Start Card -->
            @foreach($skills as $skill)
            <div
                class="md:min-h-[28rem] min-h-[26rem] border rounded-xl p-8 relative overflow-hidden group transition-all ease duration-700"
            >
                <h4 class="group-hover:text-white text-lg font-semibold">
                {{ $skill->title }}
                </h4>
                <p class="group-hover:text-white text-slate-800 mt-6">
                {{ $skill->description }}
                </p>
                <div
                class="w-44 group-hover:w-full group-hover:scale-[2] group-hover:rounded-none rounded-full aspect-square bg-indigo-500 absolute -bottom-14 -left-10 transition-all ease duration-500 -z-10"
                ></div>
                <div class="absolute bottom-8 left-8">
                <i class="{{ $skill->icon }} text-4xl text-white"></i>
                </div>
            </div>
            @endforeach
            </div>
        </section>

        <!-- Video Player -->
        <section class="md:px-20 px-5 mt-8 py-10 bg-gray-100">
            <div
            class="w-full min-h-[25rem] bg-gradient-to-br from-indigo-500 to-cyan-500 drop-shadow-2xl shadow-xl md:rounded-full rounded-2xl md:grid grid-cols-5 py-8 border-white gamepad max-md:p-5 max-md:pb-14"
            >
            <div class="max-md:hidden grid place-items-center">
                <i class="fa-solid fa-plus text-white text-6xl"></i>
            </div>
            <div
                class="col-span-3 border border-slate-600 rounded-lg overflow-hidden"
            >
                <iframe
                id="md"
                width="100%"
                height="100%"
                class="max-md:min-h-[15rem] rounded-lg"
                src="{{ $major->link_youtube }}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
                ></iframe>
            </div>
            <div class="max-md:hidden grid place-items-center">
                <div>
                <i
                    class="playBtn-md fa-solid fa-play text-white text-6xl cursor-pointer hover:scale-110 transition-all ease duration-150"
                    onclick="playVideo(1, 'md')"
                ></i>
                <i
                    class="pauseBtn-md hidden fa-solid fa-pause text-white text-6xl cursor-pointer"
                    onclick="playVideo(0, 'md')"
                ></i>
                </div>
                <div>
                <i class="fa-solid fa-circle text-white text-6xl"></i>
                </div>
            </div>

            <div class="md:hidden pt-14 flex justify-around">
                <div class="grid place-items-center">
                <i class="fa-solid fa-plus text-white text-6xl"></i>
                </div>
                <div>
                <i
                    class="playBtn-sm fa-solid fa-play text-white text-6xl cursor-pointer hover:scale-110 transition-all ease duration-150"
                    onclick="playVideo(1, 'md')"
                ></i>
                <i
                    class="pauseBtn-sm hidden fa-solid fa-pause text-white text-6xl cursor-pointer"
                    onclick="playVideo(0, 'md')"
                ></i>
                </div>
            </div>
            </div>
        </section>

        <!-- Mitra Industri -->
        <section id="mitra-industri" class="md:px-20 px-5 mt-8 py-10 pb-14">
            <div class="text-center grid place-items-center">
            <h3 class="text-3xl font-bold">Mitra Industri Kami</h3>
            <p class="md:px-10 mt-5 text-slate-800">
                Dunia Industri Pengembangan Perangkat Lunak dan Gim adalah sektor
                ekonomi yang berkaitan dengan menciptakan, merancang, mengembangkan,
                dan menghasilkan perangkat lunak (software) dan gim (games) yang
                digunakan di berbagai perangkat elektronik seperti komputer, ponsel
                pintar, konsol game, dan perangkat lainnya.
            </p>
            <div
                class="flex flex-wrap mt-6 justify-center items-center gap-6 mx-auto"
            >
                @foreach($softwares as $software)
                <div class="w-28 md:w-[13%]">
                <img
                    src="{{ asset('storage/images/' . $software->images) }}"
                    class="w-full object-contain"
                    alt="{{ $software->alt }}"
                    title="{{ $software->alt }}"
                />
                </div>
                @endforeach
            </div>
            </div>
        </section>

        <!-- Mata Pelajaran -->
        <section id="mata-pelajaran" class="md:px-20 px-5 mt-8 py-10 bg-gray-50">
            <div>
            <h3 class="text-3xl font-bold max-md:text-left">Mata Pelajaran</h3>
            <span class="block w-14 h-3 bg-indigo-500 -mt-3"></span>
            </div>
            <div class="mt-14 grid md:grid-cols-2 items-start gap-10">
            <div>
                <ul>
                <!-- Start Looping -->
                @foreach($mapels as $mapel)
                <li>
                    <h5 class="text-lg">{{ $mapel->name }}</h5>
                </li>
                @endforeach
                </ul>
            </div>
            <div class="text-end max-md:hidden">
                <img
                src="{{ asset('presentation.png') }}"
                alt="Presentation"
                class="md:w-2/3 w-full mx-auto"
                />
            </div>
            </div>
        </section>

        <!-- Artikel dan Berita -->
        <section id="artikel" class="md:px-20 px-5 mt-8 py-10 pb-14">
            <div class="mb-10">
            <h3 class="text-3xl font-bold max-md:text-left">
                Artikel dan Berita
            </h3>
            <span class="block w-14 h-3 bg-indigo-500 -mt-3"></span>
            </div>
            <div class="flex gap-7 max-md:flex-wrap">
            <a href="{{'/artikel/'.$big_article->id}}" class="md:w-1/2 w-full">
                <div class="mx-auto">
                <img
                    src="{{ asset('storage/images/' . $big_article->images) }}"
                    class="object-cover w-full h-full rounded-lg"
                    alt=""
                />
                </div>
                <div class="mt-3">
                <p class="text-gray-400 text-sm">{{ $big_article->author }} - {{ $big_article->date }}</p>
                <p class="text-lg font-semibold my-1">{{ $big_article->title }}</p>
                <p class="text-gray-500">
                    {{ substr($big_article->description, 0, 80) }}...
                </p>
                <div class="flex gap-x-4 mt-3">
                    <div
                    class="badge border border-gray-600 text-sm text-gray-600 px-2"
                    >
                    <span>{{ $big_article->category_name }}</span>
                    </div>
                </div>
                </div>
            </a>
            <div class="md:w-1/2 w-full flex flex-col gap-4 gap-y-6">
                @foreach($articles as $article)
                <a href="{{ '/artikel/'.$article->id }}" class="flex max-md:flex-col gap-5">
                <div class="h-auto max-md:h-[170px] max-md:h-auto md:w-1/2 max-md:border">
                    <img
                    src="{{ asset('storage/images/' . $article->images) }}"
                    class="object-contain max-md:object-contain max-md:h-full w-full rounded-lg"
                    alt=""
                    />
                </div>
                <div class="md:pt-[5px] md:w-1/2">
                    <p class="text-gray-400 text-sm">
                    {{ $article->author }} - {{ $article->date }}
                    </p>
                    <p class="text-lg font-semibold">{{ $article->title }}</p>
                    <p class="text-gray-500">
                    {{ substr($article->description, 0, 80) }}...
                    </p>
                    <div class="flex gap-x-4 mt-3">
                    <div
                        class="badge border border-gray-600 text-sm text-gray-600 px-2"
                    >
                        {{$article->category_name}}
                    </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
            </div>
            <div class="my-5 text-end">
            <a
                href="/artikel"
                class="bg-black py-3 px-5 text-white hover:bg-gray-800"
                id="title"
                >Semua Artikel</a
            >
            </div>
        </section>

        <!-- Guru dan Pengajar -->
        <section id="guru-dan-pengajar" class="md:px-20 px-5 pb-14">
            <div>
            <h3 class="text-3xl font-bold">Guru dan Pengajar</h3>
            <span class="block w-14 h-3 bg-indigo-500 -mt-3"></span>
            </div>

            <div class="mt-3 py-5 swiper-guru overflow-hidden">
            <div class="swiper-wrapper pb-4">
                <!-- Start Looping -->
                @foreach($teachers as $teacher)
                <div
                class="overflow-hidden rounded-lg swiper-slide bg-white shadow"
                >
                <div class="banner">
                    <img
                    src="{{ asset('storage/images/' . $teacher->banner) }}"
                    alt=""
                    class="w-full aspect-video object-cover"
                    />
                </div>
                <img
                    src="{{ asset('storage/images/' . $teacher->images) }}"
                    alt=""
                    class="profil-guru w-32 aspect-square object-cover rounded-full mx-4 -mt-20 outline-1"
                />
                <div class="px-6 pt-5 pb-10 min-h-[12.5rem]">
                    <p class="text-lg font-semibold">{{ $teacher->name }}</p>
                    <p class="text-sm text-slate-500">
                    {{ $teacher->email }}
                    </p>
                    <p class="mt-4 text-slate-800">
                    {{ $teacher->description }}
                    </p>
                </div>
                </div>
                @endforeach
                <!-- End Looping -->
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination-2 text-center"></div>

            <!-- If we need navigation buttons -->
            <div
                class="swiper-button-prev-2 text-slate-100 md:scale-75 scale-50"
            ></div>
            <div
                class="swiper-button-next-2 text-slate-100 md:scale-75 scale-50"
            ></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
            </div>
        </section>

        <section id="karya-siswa" class="md:px-20 px-5 pt-5 pb-14">
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

            {{-- <div class="flex justify-center mt-4">
                {{ $studentsPortfolio->links('pagination::tailwind') }}
            </div> --}}
            <div class="mt-10 flex w-full justify-center">
                <a href="/karya-siswa" class="p-4 inline-block mx-auto bg-[#6366F1] text-slate-100 transition duration-300 ease-in-out transform hover:bg-[#4f46e1] hover:scale-105 shadow-lg">
                    Lihat lebih banyak
                </a>
            </div>
        </section>

        <!-- Alumni -->
        <section id="alumni-kami" class="md:px-20 px-5 pb-14">
            <div>
            <h3 class="text-3xl font-bold">Alumni Kami</h3>
            <span class="block w-14 h-3 bg-indigo-500 -mt-3"></span>
            </div>

            <div class="mt-3 py-5 swiper-alumni overflow-hidden">
            <div class="swiper-wrapper">
                <!-- Start Looping -->
                @foreach($alumnis as $alumni)
                <div class="swiper-slide p-5 text-center">
                <img
                    src="{{ asset('storage/images/' . $alumni->images) }}"
                    alt="Alumni PPLG NEPER"
                    class="w-48 aspect-square object-cover rounded-full mx-auto"
                />
                <p class="text-lg font-semibold mt-2">{{ $alumni->name }}</p>
                <p class="text-slate-700">
                    {{ $alumni->profesi }}
                </p>
                <p class="mt-4 text-slate-800">
                    {{$alumni->words}}
                </p>
                </div>
                @endforeach
                <!-- End Looping -->
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination-3 text-center"></div>

            <!-- If we need navigation buttons -->
            <div
                class="swiper-button-prev-3 text-slate-100 md:scale-75 scale-50"
            ></div>
            <div
                class="swiper-button-next-3 text-slate-100 md:scale-75 scale-50"
            ></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
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

      const playVideo = (autoplay, id) => {
        document.querySelector(`.playBtn-sm`).classList.toggle("hidden");
        document.querySelector(`.playBtn-md`).classList.toggle("hidden");
        document.querySelector(`.pauseBtn-sm`).classList.toggle("hidden");
        document.querySelector(`.pauseBtn-md`).classList.toggle("hidden");
        const iframe = document.querySelector(`#${id}`);
        iframe.src += `&autoplay=${autoplay}`;
        if (autoplay === 0) {
          iframe.src = `https://www.youtube.com/embed/f2kAcmYxE_A?si=v71IKc5IkuaJzKkr`;
        }
      };

      const objSlideGuru = {
        slidesPerView: 1,
        breakpoints: {
          640: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
      };

      const objSlideAlumni = {
        slidesPerView: 1,
        breakpoints: {
          640: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 2,
          },
        },
      };

      const guruPagination = {
        el: ".swiper-pagination-2",
        clickable: true,
      };
      const alumniPagination = {
        el: ".swiper-pagination-3",
        clickable: true,
      };
      const guruButtons = {
        nextEl: ".swiper-button-next-2",
        prevEl: ".swiper-button-prev-2",
      };
      const alumniButtons = {
        nextEl: ".swiper-button-next-3",
        prevEl: ".swiper-button-prev-3",
      };

      const renderSwipper = (
        className,
        objSlide = {},
        spaceBetween = 5,
        pagination,
        swiperButtons,
      ) => {
        const swiper = new Swiper(`.${className}`, {
          // Optional parameters
          direction: "horizontal",
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          cursor: "grab",
          spaceBetween,
          grabCursor: true,

          slidesPerView: objSlide.slidesPerView ?? 1,
          breakpoints: objSlide.breakpoints ?? null,
          // If we need pagination
          pagination: pagination ?? {
            el: ".swiper-pagination",
            clickable: true,
          },

          // Navigation arrows
          navigation: swiperButtons ?? {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },

          // And if we need scrollbar
          // scrollbar: {
          //   el: '.swiper-scrollbar',
          // },
        });
      };
      renderSwipper("swiper");
      renderSwipper("swiper-guru", objSlideGuru, 30, guruPagination, guruButtons);
      renderSwipper("swiper-alumni", objSlideAlumni, 30, alumniPagination, alumniButtons);

      const animationContainer = document.querySelector(".animation-container");
      const imageAnimation = document.querySelector(".image-animation");

      // Atur handler untuk menghentikan animasi saat kursor diarahkan ke atasnya
      animationContainer.addEventListener("mouseenter", () => {
        animationContainer.style.animationPlayState = "paused";
      });

      // Atur handler untuk melanjutkan animasi saat kursor tidak diarahkan ke atasnya
      animationContainer.addEventListener("mouseleave", () => {
        animationContainer.style.animationPlayState = "running";
      });

      // Atur handler untuk menghentikan animasi saat kursor diarahkan ke atasnya
      imageAnimation.addEventListener("mouseenter", () => {
        imageAnimation.classList.remove("image-showing-animation");
      });

      // Atur handler untuk melanjutkan animasi saat kursor tidak diarahkan ke atasnya
      imageAnimation.addEventListener("mouseleave", () => {
        imageAnimation.classList.add("image-showing-animation");
      });

      document.body.style.overflow = "hidden";
      setTimeout(() => {
        document.body.style.overflow = "auto";
        document.getElementById("splash-screen").classList.add("hidden");
      }, 400);
    </script>
  </body>
</html>
