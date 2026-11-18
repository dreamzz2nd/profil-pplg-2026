<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('components.seo', [
        'title' => $title ?? ($seoTitle ?? null),
        'description' => $description ?? ($seoDescription ?? null),
        'keywords' => $keywords ?? ($seoKeywords ?? null),
        'image' => $image ?? ($seoImage ?? null),
        'author' => $author ?? ($seoAuthor ?? null),
        'type' => $type ?? ($seoType ?? 'website'),
        'publishedTime' => $publishedTime ?? ($seoPublishedTime ?? null),
        'url' => $url ?? ($seoUrl ?? null),
    ])

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <link rel="shortcut icon" href="{{ url('logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('style.css')}}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/tailwindcss">
        @layer utilities {
            .text-shadow {
                text-shadow: 2px 2px #32343b;
            }

            .button-link {
                background-color: #3e54ac;
                padding: 1rem 2.5rem;
                color: white;
                transition: all 0.5s ease;
            }

            .button-link:hover {
                background-color: transparent;
                border: 1px solid #3e54ac;
                color: #3e54ac;
            }

            .border-image {
                border: 2px solid #3e54ac;
            }

            .border-top-left {
                /* border-top: 2px solid rgb(20 184 166);
                border-left: 2px solid rgb(20 184 166); */
                border-top: 2px solid #3e54ac;
                border-left: 2px solid #3e54ac;
            }

            .bg-donker {
                background-color: rgba(62, 84, 172, 0.7);
                backdrop-filter: blur(20px);
            }

            .bg-dark-blue {
                /* background-color: #2843ad; */
                background-color: #8c78fc;
            }

            .bg-soft-blue {
                background: rgba(178, 164, 255, 0.5);
            }

            .text-soft-blue {
                color: rgba(178, 164, 255, 0.5);
            }

            .bg-smoke {
                background: #f5f5f5;
            }
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Source+Serif+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap");
        
        html {
            scroll-behavior: smooth;
        }
        
        .jumbotron-swipper {
            min-height: 80vh;
            background: #3e54ac;
        }
        
        .jumbotron {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .swiper-button {
            transform: scale(0.8);
            color: rgba(255, 255, 255, 0.6);
            transition: all .4 ease;
        }
        
        .swiper-button:hover {
            color: rgba(255, 255, 255, 1);
        }
        
        #telp,
        #email {
            animation: fadeRight 0.5s ease;
            z-index: 50;
        }
        
        #card-content {
            box-shadow: 10px 10px 0 0 #3e54ac;
            border-top: 1px solid #3e54ac;
            border-left: 1px solid #3e54ac;
        }
        
        #nav {
            transition: height, background 0.4s ease;
        }
        
        iframe {
            width: 560;
            height: 315;
        }
        
        #title {
            /* font-family: "Source Serif Pro", serif; */
            /* font-family: "Open Sans", sans-serif; */
        }
        
        .nav-link {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
        }
        
        .nav-link:hover {
            font-weight: 500;
        }
        
        @keyframes fadeRight {
            0% {
                opacity: 0;
                transform: translateX(40px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .items {
            cursor: grab;
        }
        
        .active {
            cursor: grabbing;
        }
        
        @media screen and (max-width: 576px) {
            iframe {
                width: 410;
                height: 165;
            }
        }
        
        #gallery {
            /* Prevent vertical gaps */
            line-height: 0;
        
            -webkit-column-count: 3;
            -webkit-column-gap: 0px;
            -moz-column-count: 3;
            -moz-column-gap: 0px;
            column-count: 3;
            column-gap: 5px;
        }
        
        #gallery img {
            /* Just in case there are inline attributes */
            width: 100% !important;
            height: auto !important;
            margin-bottom: 5px;
        }
        #gallery img:hover {
            opacity: 0.7;
        }
        @media (max-width: 1200px) {
            #photos {
                -moz-column-count: 4;
                -webkit-column-count: 4;
                column-count: 4;
            }
        }
        @media (max-width: 800px) {
            #photos {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }
        @media (max-width: 400px) {
            #photos {
                -moz-column-count: 1;
                -webkit-column-count: 1;
                column-count: 1;
            }
        }

    </style>
</head>
