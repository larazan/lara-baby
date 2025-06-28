<main class="main relative w-full lg:max-w-[640px]">
        <section class="section section--headline px-4 md:px-10">

            <style>
                .box-headline ul {
                    --ornament-paper: 1.5rem
                }

                .box-headline ul .item:first-child {
                    margin-right: -1rem;
                    flex-direction: column;
                    padding-top: 0px
                }

                .box-headline ul .item:first-child .item-detail {
                    position: relative;
                    z-index: 10;
                    margin-top: -0.5rem;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    gap: 0.5rem
                }

                .box-headline ul .item:first-child .item-tag {
                    order: 1;
                    font-size: 0.75rem;
                    line-height: 1rem
                }

                .box-headline ul .item:first-child .item-date {
                    order: 2
                }

                .box-headline ul .item:first-child .item-title {
                    order: 3;
                    width: 100%;
                    flex-shrink: 0;
                    font-size: 1.5rem;
                    line-height: 2rem
                }

                .box-headline ul .item:first-child .item-description {
                    order: 4;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 2;
                    width: 100%;
                    flex-shrink: 0
                }

                .box-headline ul .item:first-child .item-img {
                    aspect-ratio: 357 / 219;
                    width: 100%;
                    border-radius: 0px
                }

                .box-headline ul .item:first-child .item-img::before {
                    content: '';
                    height: var(--ornament-paper);
                    position: absolute;
                    bottom: -1px;
                    left: 0px;
                    background-color: RGB(var(--color-white));
                    width: calc(100% - var(--ornament-paper));
                    z-index: 1;
                    right: var(--ornament-paper)
                }

                .box-headline ul .item:first-child .item-img::after {
                    content: '';
                    width: 0px;
                    height: 0px;
                    border-style: solid;
                    border-width: var(--ornament-paper) 0 0 var(--ornament-paper);
                    border-color: transparent transparent transparent RGB(var(--color-light1));
                    transform: rotate(0deg);
                    position: absolute;
                    right: 0;
                    bottom: -1px;
                    z-index: 1
                }

                .dark .box-headline ul .item:first-child .item-img::before {
                    background-color: RGB(24 24 27)
                }

                .section--headline:not(.--index) .datepicker {
                    display: none
                }

                @media (min-width: 1024px) {
                    .box-headline ul .item:first-child {
                        margin-left: -1rem;
                        margin-right: -1rem;
                        width: auto;
                        padding-left: 0px;
                        padding-right: 0px
                    }

                    .box-headline ul .item:first-child .item-detail {
                        padding-left: 1rem;
                        padding-right: 1rem
                    }

                    .section--headline:not(.--index) .box-headline ul .item:nth-child(2),
                    .section--headline:not(.--index) .box-headline ul .item:nth-child(4) {
                        padding-right: .5rem
                    }

                    .section--headline:not(.--index) .box-headline ul .item:nth-child(3),
                    .section--headline:not(.--index) .box-headline ul .item:nth-child(5) {
                        padding-left: .5rem
                    }

                    .section--headline.--index .box-headline ul .item:not(:first-child) {
                        width: 100%
                    }
                }

                .datepicker-btn-detail-input::-webkit-calendar-picker-indicator {
                    position: absolute;
                    inset: 0;
                    width: 100%;
                    height: 100%;
                    cursor: pointer
                }

                .datepicker-btn-detail-date::after {
                    content: '';
                    width: 0px;
                    height: 0px;
                    border-style: solid;
                    border-width: 7px 6px 0 6px;
                    border-color: RGB(var(--color-light1)) transparent transparent transparent;
                    transform: rotate(0deg);
                    position: absolute;
                    right: -1rem;
                    top: 0;
                    bottom: 0;
                    margin: auto
                }

                .datepicker.active .datepicker-btn-detail-date::after {
                    transform: rotate(180deg)
                }

                .dark .datepicker-btn-detail-date::after {
                    border-color: RGB(var(--color-white)) transparent transparent transparent
                }
            </style>
            <div class="box box-headline mb-8 ">
                <ul class="divide-y divide-gray-300 dark:divide-white/10 lg:flex lg:flex-wrap lg:px-4">

                    <!--  -->


                    <!--  -->

                    <li class="item flex items-start gap-x-3 py-4 relative lg:w-1/2" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="headline" data-floc="top" data-fpos="1" data-flnk="/peristiwa/video-kdm-kembali-senyum-usai-ngamuk-ke-suporter-persikas-tak-masalah-jadi-gorengan-politik-419585-mvk.html" data-fcap="VIDEO: KDM Kembali Senyum Usai Ngamuk ke Suporter Persikas \&quot;Tak Masalah Jadi Gorengan Politik\&quot;" data-aid="419585">
                        <a href="/peristiwa/video-kdm-kembali-senyum-usai-ngamuk-ke-suporter-persikas-tak-masalah-jadi-gorengan-politik-419585-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="VIDEO: KDM Kembali Senyum Usai Ngamuk ke Suporter Persikas &quot;Tak Masalah Jadi Gorengan Politik&quot;" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748597285535-46bst.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <h1 class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-kdm-kembali-senyum-usai-ngamuk-ke-suporter-persikas-tak-masalah-jadi-gorengan-politik-419585-mvk.html" data-track="mav_sub_click_track">VIDEO: KDM Kembali Senyum Usai Ngamuk ke Suporter Persikas "Tak Masalah Jadi Gorengan Politik"</a>
                            </h1>
                            <p class="item-description hidden">Demul menduga ada kekuatan politik yang sengaja menggunakan memprovokasi dengan membentangkan bendera salah satu klub sepakbola.</p>
                            <time datetime="2025-05-30 16:29:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:29</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 py-4 relative lg:w-1/2" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="headline" data-floc="top" data-fpos="2" data-flnk="/peristiwa/video-badan-besar-kepala-botak-tampang-bengis-buronan-edy-godol-dalang-pembacokan-jaksa-ditangkap-419581-mvk.html" data-fcap="VIDEO: Badan Besar Kepala Botak, Tampang Bengis Buronan Edy Godol Dalang Pembacokan Jaksa Ditangkap" data-aid="419581">
                        <a href="/peristiwa/video-badan-besar-kepala-botak-tampang-bengis-buronan-edy-godol-dalang-pembacokan-jaksa-ditangkap-419581-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="VIDEO: Badan Besar Kepala Botak, Tampang Bengis Buronan Edy Godol Dalang Pembacokan Jaksa Ditangkap" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748596930685-cwr4o.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-badan-besar-kepala-botak-tampang-bengis-buronan-edy-godol-dalang-pembacokan-jaksa-ditangkap-419581-mvk.html" data-track="mav_sub_click_track">VIDEO: Badan Besar Kepala Botak, Tampang Bengis Buronan Edy Godol Dalang Pembacokan Jaksa Ditangkap</a>
                            </span>
                            <p class="item-description hidden">Pria berusia 54 tahun itu masuk dalam Daftar Pencarian Orang (DPO) Kejari Deli Serdang, Sumatera Utara.</p>
                            <time datetime="2025-05-30 16:24:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:24</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 py-4 relative lg:w-1/2" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="headline" data-floc="top" data-fpos="3" data-flnk="/peristiwa/video-macron-terpesona-indahnya-candi-borobudur-depan-prabowo-ini-poin-poin-kerja-sama-ri-prancis-419578-mvk.html" data-fcap="VIDEO: Macron Terpesona Indahnya Candi Borobudur Depan Prabowo, Ini Poin-Poin Kerja Sama RI-Prancis" data-aid="419578">
                        <a href="/peristiwa/video-macron-terpesona-indahnya-candi-borobudur-depan-prabowo-ini-poin-poin-kerja-sama-ri-prancis-419578-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="VIDEO: Macron Terpesona Indahnya Candi Borobudur Depan Prabowo, Ini Poin-Poin Kerja Sama RI-Prancis" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748596595137-9ftnh.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-macron-terpesona-indahnya-candi-borobudur-depan-prabowo-ini-poin-poin-kerja-sama-ri-prancis-419578-mvk.html" data-track="mav_sub_click_track">VIDEO: Macron Terpesona Indahnya Candi Borobudur Depan Prabowo, Ini Poin-Poin Kerja Sama RI-Prancis</a>
                            </span>
                            <p class="item-description hidden">Presiden Macron menuturkan Indonesia memiliki kekayaan warisan dunia yang sangat besar dan Prancis siap berbagi keahliannya dalam bidang ini.</p>
                            <time datetime="2025-05-30 16:18:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:18</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 py-4 relative lg:w-1/2" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="headline" data-floc="top" data-fpos="4" data-flnk="/peristiwa/video-momen-keakraban-didit-dengan-keluarga-macron-tundukkan-kepala-saat-antar-kepergian-419575-mvk.html" data-fcap="VIDEO: Momen Keakraban Didit Dengan Keluarga Macron, Tundukkan Kepala Saat Antar Kepergian" data-aid="419575">
                        <a href="/peristiwa/video-momen-keakraban-didit-dengan-keluarga-macron-tundukkan-kepala-saat-antar-kepergian-419575-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="VIDEO: Momen Keakraban Didit Dengan Keluarga Macron, Tundukkan Kepala Saat Antar Kepergian" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748596157123-b7szy.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start">
                            <a href="/tag/berita-ringan" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita ringan
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-momen-keakraban-didit-dengan-keluarga-macron-tundukkan-kepala-saat-antar-kepergian-419575-mvk.html" data-track="mav_sub_click_track">VIDEO: Momen Keakraban Didit Dengan Keluarga Macron, Tundukkan Kepala Saat Antar Kepergian</a>
                            </span>
                            <p class="item-description hidden">Prabowo dan putranya, Didit Hediprasetyo tampak melepas kepulangan Presiden Macron dan istrinya menuju Singapura</p>
                            <time datetime="2025-05-30 16:12:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:12</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 py-4 relative lg:w-1/2" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="headline" data-floc="top" data-fpos="5" data-flnk="/sepakbola/persebaya-evaluasi-total-tim-kepelatihan-usai-gagal-juara-siapa-calon-pengganti-paul-munster-419572-mvk.html" data-fcap="Persebaya Evaluasi Total Tim Kepelatihan usai Gagal Juara, Siapa Calon Pengganti Paul Munster?" data-aid="419572">
                        <a href="/sepakbola/persebaya-evaluasi-total-tim-kepelatihan-usai-gagal-juara-siapa-calon-pengganti-paul-munster-419572-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="Persebaya Evaluasi Total Tim Kepelatihan usai Gagal Juara, Siapa Calon Pengganti Paul Munster?" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748595803630-m1cl5.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/sepakbola/persebaya-evaluasi-total-tim-kepelatihan-usai-gagal-juara-siapa-calon-pengganti-paul-munster-419572-mvk.html" data-track="mav_sub_click_track">Persebaya Evaluasi Total Tim Kepelatihan usai Gagal Juara, Siapa Calon Pengganti Paul Munster?</a>
                            </span>
                            <p class="item-description hidden">Karena target BRI Liga 1 2024/2025 tidak tercapai, Persebaya Surabaya melakukan evaluasi terhadap tim pelatih dan para pemainnya.</p>
                            <time datetime="2025-05-30 16:04:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:04</time>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        
        <!--  -->
        <section class="section section--topic px-4 lg:hidden">
            
            <div class="box box-topic ml-8 mb-12 relative" data-tracked="1">
                <span class="absolute top-0 -left-8 text-5xl rotate-180 font-bold text-gray-800 whitespace-nowrap" style="writing-mode: vertical-rl;">Topik Populer</span>
                <div class="bg-green-300/80 rounded-xl p-5 pb-3 overflow-hidden z-10 relative min-h-80 dark:bg-dark-1/80">
                    <h2 class="text-gray-800 mb-1 font-bold">Topik Populer</h2>
                    <ul class="box-topic-list flex flex-col divide-y divide-emerald-500 font-semibold text-sm dark:text-white dark:divide-white/10">

                        <li class="box-topic-list-item" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_topic" data-floc="center" data-fpos="1" data-flnk="/tag/timnas-indonesia" data-fcap="Persiapan Timnas Indonesia vs China" data-aid="0">
                            <a href="/tag/timnas-indonesia" class="flex w-full items-center gap-x-2 py-3" data-track="mav_sub_click_track">
                                <svg class="text-emerald-600 tracking-wide font-semibold uppercase" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.424805" y="0.048584" width="19.8306" height="19.8306" rx="9.91532" fill="currentcolor"></rect>
                                    <path d="M14.3637 7.95215L10.6333 11.7688L9.06979 9.42364L5.94287 12.5506" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                    <path d="M12.7832 7.66455H14.7375V9.61888" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                </svg>
                                <span data-track="mav_sub_click_track">Persiapan Timnas Indonesia vs China</span></a>
                        </li>
                        <li class="box-topic-list-item" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_topic" data-floc="center" data-fpos="2" data-flnk="/tag/stimulus-ekonomi" data-fcap="Paket Stimulus Ekonomi Prabowo" data-aid="0">
                            <a href="/tag/stimulus-ekonomi" class="flex w-full items-center gap-x-2 py-3" data-track="mav_sub_click_track">
                                <svg class="text-emerald-600 tracking-wide font-semibold uppercase" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.424805" y="0.048584" width="19.8306" height="19.8306" rx="9.91532" fill="currentcolor"></rect>
                                    <path d="M14.3637 7.95215L10.6333 11.7688L9.06979 9.42364L5.94287 12.5506" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                    <path d="M12.7832 7.66455H14.7375V9.61888" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                </svg>
                                <span data-track="mav_sub_click_track">Paket Stimulus Ekonomi Prabowo</span></a>
                        </li>
                        <li class="box-topic-list-item" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_topic" data-floc="center" data-fpos="3" data-flnk="/tag/dedi-mulyadi" data-fcap="Aksi Dedi Mulyadi" data-aid="0">
                            <a href="/tag/dedi-mulyadi" class="flex w-full items-center gap-x-2 py-3" data-track="mav_sub_click_track">
                                <svg class="text-emerald-600 tracking-wide font-semibold uppercase" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.424805" y="0.048584" width="19.8306" height="19.8306" rx="9.91532" fill="currentcolor"></rect>
                                    <path d="M14.3637 7.95215L10.6333 11.7688L9.06979 9.42364L5.94287 12.5506" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                    <path d="M12.7832 7.66455H14.7375V9.61888" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                </svg>
                                <span data-track="mav_sub_click_track">Aksi Dedi Mulyadi</span></a>
                        </li>
                        <li class="box-topic-list-item" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_topic" data-floc="center" data-fpos="4" data-flnk="/tag/prabowo" data-fcap="Prabowo Subianto" data-aid="0">
                            <a href="/tag/prabowo" class="flex w-full items-center gap-x-2 py-3" data-track="mav_sub_click_track">
                                <svg class="text-emerald-600 tracking-wide font-semibold uppercase" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.424805" y="0.048584" width="19.8306" height="19.8306" rx="9.91532" fill="currentcolor"></rect>
                                    <path d="M14.3637 7.95215L10.6333 11.7688L9.06979 9.42364L5.94287 12.5506" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                    <path d="M12.7832 7.66455H14.7375V9.61888" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                </svg>
                                <span data-track="mav_sub_click_track">Prabowo Subianto</span></a>
                        </li>
                        <li class="box-topic-list-item" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_topic" data-floc="center" data-fpos="5" data-flnk="/tag/sritex" data-fcap="Bos Sritex Korupsi" data-aid="0">
                            <a href="/tag/sritex" class="flex w-full items-center gap-x-2 py-3" data-track="mav_sub_click_track">
                                <svg class="text-emerald-600 tracking-wide font-semibold uppercase" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.424805" y="0.048584" width="19.8306" height="19.8306" rx="9.91532" fill="currentcolor"></rect>
                                    <path d="M14.3637 7.95215L10.6333 11.7688L9.06979 9.42364L5.94287 12.5506" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                    <path d="M12.7832 7.66455H14.7375V9.61888" stroke="white" stroke-width="1.2933" stroke-linecap="square" stroke-linejoin="round"></path>
                                </svg>
                                <span data-track="mav_sub_click_track">Bos Sritex Korupsi</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--  -->

        <section class="section section--news px-4 md:px-10" >
            <style>
                .box-news:not(.--another) ul {
                    --ornament-paper: 1.5rem
                }

                .box-news:not(.--another) ul .item:first-child {
                    flex-direction: column-reverse;
                    margin-left: -1rem;
                    margin-bottom: 1.5rem;
                    padding-top: 0px;
                    padding-bottom: 0px
                }

                .box-news:not(.--another) ul .item:first-child .item-detail {
                    position: relative;
                    z-index: 10;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    gap: 0.5rem;
                    padding-left: 1rem
                }

                .box-news:not(.--another) ul .item:first-child .item-tag {
                    order: 3;
                    font-size: 0.75rem;
                    line-height: 1rem
                }

                .box-news:not(.--another) ul .item:first-child .item-date {
                    order: 4
                }

                .box-news:not(.--another) ul .item:first-child .item-title {
                    order: 1;
                    width: 100%;
                    flex-shrink: 0;
                    font-size: 1.5rem;
                    line-height: 2rem
                }

                .box-news:not(.--another) ul .item:first-child .item-description {
                    order: 2;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 2;
                    width: 100%;
                    flex-shrink: 0
                }

                .box-news:not(.--another) ul .item:first-child .item-img {
                    aspect-ratio: 357 / 219;
                    width: 100%;
                    border-radius: 0px
                }

                .box-news:not(.--another) ul .item:first-child .item-img::before {
                    content: '';
                    height: var(--ornament-paper);
                    position: absolute;
                    bottom: -1px;
                    left: 0px;
                    background-color: RGB(var(--color-white));
                    width: calc(100% - var(--ornament-paper));
                    z-index: 1;
                    right: var(--ornament-paper)
                }

                .box-news:not(.--another) ul .item:first-child .item-img::after {
                    content: '';
                    width: 0px;
                    height: 0px;
                    border-style: solid;
                    border-width: var(--ornament-paper) 0 0 var(--ornament-paper);
                    border-color: transparent transparent transparent RGB(var(--color-light1));
                    transform: rotate(0deg);
                    position: absolute;
                    right: 0;
                    bottom: -1px;
                    z-index: 1
                }

                .dark .box-news ul .item:first-child .item-img::before {
                    background-color: RGB(24 24 27)
                }

                @media (min-width: 1024px) {
                    .box-news ul .item:first-child {
                        margin-left: -1rem;
                        margin-right: -1rem
                    }

                    .box-news ul .item:first-child .item-detail {
                        padding-right: 1rem
                    }

                    .box.--another ul {
                        --ornament-paper: 1.5rem
                    }

                    .box.--another ul .item:first-child {
                        flex-direction: column-reverse;
                        margin-left: -1rem;
                        margin-right: -1rem;
                        margin-bottom: 1.5rem;
                        padding-top: 0px;
                        padding-bottom: 0px
                    }

                    .box.--another ul .item:first-child .item-detail {
                        position: relative;
                        z-index: 10;
                        margin-top: -0.5rem;
                        flex-direction: row;
                        flex-wrap: wrap;
                        align-items: center;
                        gap: 0.5rem;
                        padding-left: 1rem;
                        padding-right: 1rem
                    }

                    .box.--another ul .item:first-child .item-tag {
                        order: 3;
                        font-size: 0.75rem;
                        line-height: 1rem
                    }

                    .box.--another ul .item:first-child .item-date {
                        order: 4
                    }

                    .box.--another ul .item:first-child .item-title {
                        order: 1;
                        width: 100%;
                        flex-shrink: 0;
                        font-size: 1.5rem;
                        line-height: 2rem
                    }

                    .box.--another ul .item:first-child .item-description {
                        order: 2;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2;
                        width: 100%;
                        flex-shrink: 0
                    }

                    .box.--another ul .item:first-child .item-img {
                        aspect-ratio: 357 / 219;
                        width: 100%;
                        border-radius: 0px
                    }

                    .box.--another ul .item:first-child .item-img::before {
                        content: '';
                        height: var(--ornament-paper);
                        position: absolute;
                        bottom: -1px;
                        left: 0px;
                        background-color: RGB(var(--color-white));
                        width: calc(100% - var(--ornament-paper));
                        z-index: 1;
                        right: var(--ornament-paper)
                    }

                    .box.--another ul .item:first-child .item-img::after {
                        content: '';
                        width: 0px;
                        height: 0px;
                        border-style: solid;
                        border-width: var(--ornament-paper) 0 0 var(--ornament-paper);
                        border-color: transparent transparent transparent RGB(var(--color-light1));
                        transform: rotate(0deg);
                        position: absolute;
                        right: 0;
                        bottom: -1px;
                        z-index: 1
                    }
                }
            </style>
            <div class="box box-news mb-6 " data-tracked="1">
                <div class="box-title relative mb-5 text-lg font-bold text-gray-800">
                    <h2>Berita Pilihan</h2>
                    <span class="absolute -bottom-1 left-0 border-b border-gray-300-[4px] border-b border-gray-300-green-500 w-16"></span>
                </div>
                <ul class="divide-y dark:divide-white/10 lg:px-4">

                    <li class="item flex justify-between items-start gap-x-3 py-4 relative" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="highlight_article" data-floc="center" data-fpos="1" data-flnk="/peristiwa/dedi-mulyadi-minta-siswa-di-jabar-cuma-sekolah-senin-sampai-jumat-masuk-pukul-0600-wib-419544-mvk.html" data-fcap="Dedi Mulyadi Minta Siswa di Jabar Cuma Sekolah Senin sampai Jumat, Masuk Pukul 06.00 WIB" data-aid="419544">
                        <div class="item-detail flex flex-col items-start gap-y-1">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">berita update</a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800 lg:text-base">
                                <a href="/peristiwa/dedi-mulyadi-minta-siswa-di-jabar-cuma-sekolah-senin-sampai-jumat-masuk-pukul-0600-wib-419544-mvk.html" data-track="mav_sub_click_track">Dedi Mulyadi Minta Siswa di Jabar Cuma Sekolah Senin sampai Jumat, Masuk Pukul 06.00 WIB</a>
                            </span>
                            <p class="item-description hidden">KDM pun berharap seluruh Bupati/Wali Kota mengindahkan hal ini guna menciptakan suasana kondusif bagi tumbuh kembang generasi muda.</p>
                            <time datetime="2025-05-30 14:52:00" class="item-date text-xs text-zinc-500">30 Mei 2025 14:52</time>
                        </div>
                        <a href="/peristiwa/dedi-mulyadi-minta-siswa-di-jabar-cuma-sekolah-senin-sampai-jumat-masuk-pukul-0600-wib-419544-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748591491441-7xh9a.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                    </li>
                    <li class="item flex justify-between items-start gap-x-3 py-4 relative" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="highlight_article" data-floc="center" data-fpos="2" data-flnk="/peristiwa/erick-thohir-ancam-bubarkan-tim-scouting-dan-pecat-pelatih-timnas-indonesia-jika-ada-pemain-titipan-419531-mvk.html" data-fcap="Erick Thohir Ancam Bubarkan Tim Scouting dan Pecat Pelatih Timnas Indonesia Jika Ada Pemain Titipan" data-aid="419531">
                        <div class="item-detail flex flex-col items-start gap-y-1">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">berita update</a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800 lg:text-base">
                                <a href="/peristiwa/erick-thohir-ancam-bubarkan-tim-scouting-dan-pecat-pelatih-timnas-indonesia-jika-ada-pemain-titipan-419531-mvk.html" data-track="mav_sub_click_track">Erick Thohir Ancam Bubarkan Tim Scouting dan Pecat Pelatih Timnas Indonesia Jika Ada Pemain Titipan</a>
                            </span>
                            <p class="item-description hidden">Erick juga meminta, para tim scouting juga harus profesional dan jangan sampai mau dibayar-bayar untuk menitipkan pemain titipan.</p>
                            <time datetime="2025-05-30 14:27:00" class="item-date text-xs text-zinc-500">30 Mei 2025 14:27</time>
                        </div>
                        <a href="/peristiwa/erick-thohir-ancam-bubarkan-tim-scouting-dan-pecat-pelatih-timnas-indonesia-jika-ada-pemain-titipan-419531-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748589964534-e8irci.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                    </li>
                    <li class="item flex justify-between items-start gap-x-3 py-4 relative" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="highlight_article" data-floc="center" data-fpos="3" data-flnk="/sepakbola/final-liga-champions-psg-punya-kvaratskhelia-tapi-bisakah-lawan-pertahanan-kokoh-inter-milan-419461-mvk.html" data-fcap="Final Liga Champions: PSG Punya Kvaratskhelia, tapi Bisakah Lawan Pertahanan Kokoh Inter Milan?" data-aid="419461">
                        <div class="item-detail flex flex-col items-start gap-y-1">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">berita update</a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800 lg:text-base">
                                <a href="/sepakbola/final-liga-champions-psg-punya-kvaratskhelia-tapi-bisakah-lawan-pertahanan-kokoh-inter-milan-419461-mvk.html" data-track="mav_sub_click_track">Final Liga Champions: PSG Punya Kvaratskhelia, tapi Bisakah Lawan Pertahanan Kokoh Inter Milan?</a>
                            </span>
                            <p class="item-description hidden">PSG memiliki kesempatan untuk mendapatkan trofi kedua mereka musim ini jika mampu mengalahkan Inter Milan.</p>
                            <time datetime="2025-05-30 12:42:00" class="item-date text-xs text-zinc-500">30 Mei 2025 12:42</time>
                        </div>
                        <a href="/sepakbola/final-liga-champions-psg-punya-kvaratskhelia-tapi-bisakah-lawan-pertahanan-kokoh-inter-milan-419461-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748583678083-g0tlu.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                    </li>
                    <li class="item flex justify-between items-start gap-x-3 py-4 relative" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="highlight_article" data-floc="center" data-fpos="4" data-flnk="/uang/ternyata-ini-penyebab-banyaknya-sarjana-menganggur-di-indonesia-419452-mvk.html" data-fcap="Ternyata, Ini Penyebab Banyaknya Sarjana Menganggur di Indonesia" data-aid="419452">
                        <div class="item-detail flex flex-col items-start gap-y-1">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">berita update</a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800 lg:text-base">
                                <a href="/uang/ternyata-ini-penyebab-banyaknya-sarjana-menganggur-di-indonesia-419452-mvk.html" data-track="mav_sub_click_track">Ternyata, Ini Penyebab Banyaknya Sarjana Menganggur di Indonesia</a>
                            </span>
                            <p class="item-description hidden">Masalah utama terletak pada kurangnya ketersediaan lapangan kerja yang sesuai dengan latar belakang pendidikan tinggi.</p>
                            <time datetime="2025-05-30 12:35:00" class="item-date text-xs text-zinc-500">30 Mei 2025 12:35</time>
                        </div>
                        <a href="/uang/ternyata-ini-penyebab-banyaknya-sarjana-menganggur-di-indonesia-419452-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748583275539-t960h.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                    </li>
                    <li class="item flex justify-between items-start gap-x-3 py-4 relative" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="highlight_article" data-floc="center" data-fpos="5" data-flnk="/peristiwa/visa-haji-furoda-tak-kunjung-diterbitkan-saudi-menag-bukan-hanya-indonesia-negara-lain-juga-419422-mvk.html" data-fcap="Visa Haji Furoda Tak Kunjung Diterbitkan Saudi, Menag: Bukan Hanya Indonesia, Negara Lain Juga" data-aid="419422">
                        <div class="item-detail flex flex-col items-start gap-y-1">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">berita update</a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800 lg:text-base">
                                <a href="/peristiwa/visa-haji-furoda-tak-kunjung-diterbitkan-saudi-menag-bukan-hanya-indonesia-negara-lain-juga-419422-mvk.html" data-track="mav_sub_click_track">Visa Haji Furoda Tak Kunjung Diterbitkan Saudi, Menag: Bukan Hanya Indonesia, Negara Lain Juga</a>
                            </span>
                            <p class="item-description hidden">Nasaruddin mengatakan, pihaknya terus berkomunikasi dengan otoritas Arab Saudi mengenai permasalahan tersebut agar segera menemui titik terang.</p>
                            <time datetime="2025-05-30 11:34:00" class="item-date text-xs text-zinc-500">30 Mei 2025 11:34</time>
                        </div>
                        <a href="/peristiwa/visa-haji-furoda-tak-kunjung-diterbitkan-saudi-menag-bukan-hanya-indonesia-negara-lain-juga-419422-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748579523042-btnf7l.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <!--  -->
        <section class="section flex px-4 lg:hidden">
            
            <div class="box box-popular ml-8 relative mb-6" data-tracked="1">
                <span class="absolute rotate-180 text-5xl text-gray-800 font-black whitespace-nowrap left-4 top-0 origin-top-left translate-y-full -z-10 flex leading-100 tracking-1 dark:text-white" style="writing-mode: vertical-rl;">Berita Populer</span>
                <div class="bg-green-300/80 rounded-xl pt-5 pl-3 py-5 pr-4 overflow-hidden z-10 relative dark:bg-dark-1/80">
                    <h2 class="text-gray-800 mb-3  font-bold">Berita Populer</h2>
                    <ul class="box-popular-list flex flex-col gap-y-4 text-sm">

                        <li class="relative pl-8" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_article" data-floc="center" data-fpos="1" data-flnk="/sepakbola/kata-media-vietnam-soal-undian-kualifikasi-piala-asia-u-23-the-golden-star-warriors-bakal-lolos-dengan-mudah-419579-mvk.html" data-fcap="Kata Media Vietnam soal Undian Kualifikasi Piala Asia U-23, The Golden Star Warriors Bakal Lolos dengan Mudah" data-aid="419579">
                            <a href="/sepakbola/kata-media-vietnam-soal-undian-kualifikasi-piala-asia-u-23-the-golden-star-warriors-bakal-lolos-dengan-mudah-419579-mvk.html" class="block mb-1" data-track="mav_sub_click_track">
                                <h3 class="font-semibold" data-track="mav_sub_click_track">Kata Media Vietnam soal Undian Kualifikasi Piala Asia U-23, The Golden Star Warriors Bakal Lolos dengan Mudah</h3>
                            </a>
                            <div class="flex gap-x-2 text-xs">
                                <a href="/tag/berita-update" class="text-emerald-600 tracking-wide font-semibold uppercase" data-track="mav_sub_click_track">
                                    Berita Update
                                </a>
                            </div>
                        </li>
                        <li class="relative pl-8" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_article" data-floc="center" data-fpos="2" data-flnk="/peristiwa/erick-minta-rakyat-tidak-memojokkan-elkan-baggot-jangan-bully-pemain-kita-sendiri-kasihan-419517-mvk.html" data-fcap="Erick Minta Rakyat Tidak Memojokkan Elkan Baggot: Jangan Bully Pemain Kita Sendiri, Kasihan" data-aid="419517">
                            <a href="/peristiwa/erick-minta-rakyat-tidak-memojokkan-elkan-baggot-jangan-bully-pemain-kita-sendiri-kasihan-419517-mvk.html" class="block mb-1" data-track="mav_sub_click_track">
                                <h3 class="font-semibold" data-track="mav_sub_click_track">Erick Minta Rakyat Tidak Memojokkan Elkan Baggot: Jangan Bully Pemain Kita Sendiri, Kasihan</h3>
                            </a>
                            <div class="flex gap-x-2 text-xs">
                                <a href="/tag/berita-update" class="text-emerald-600 tracking-wide font-semibold uppercase" data-track="mav_sub_click_track">
                                    Berita Update
                                </a>
                                <time datetime="2025-05-30 13:58:00" class="text-gray-700">30 Mei 2025 13:58</time>
                            </div>
                        </li>
                        <li class="relative pl-8" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_article" data-floc="center" data-fpos="3" data-flnk="/artis/patrick-kluivert-telepon-ahmad-albar-minta-god-bless-tampil-di-gbk-jelang-laga-timnas-indonesia-vs-china-kami-butuh-energi-kalian-419369-mvk.html" data-fcap="Patrick Kluivert Telepon Ahmad Albar Minta God Bless Tampil di GBK Jelang Laga Timnas Indonesia Vs China: Kami Butuh Energi Kalian!" data-aid="419369">
                            <a href="/artis/patrick-kluivert-telepon-ahmad-albar-minta-god-bless-tampil-di-gbk-jelang-laga-timnas-indonesia-vs-china-kami-butuh-energi-kalian-419369-mvk.html" class="block mb-1" data-track="mav_sub_click_track">
                                <h3 class="font-semibold" data-track="mav_sub_click_track">Patrick Kluivert Telepon Ahmad Albar Minta God Bless Tampil di GBK Jelang Laga Timnas Indonesia Vs China: Kami Butuh Energi Kalian!</h3>
                            </a>
                            <div class="flex gap-x-2 text-xs">
                                <a href="/tag/berita-update" class="text-emerald-600 tracking-wide font-semibold uppercase" data-track="mav_sub_click_track">
                                    Berita Update
                                </a>
                                <time datetime="2025-05-30 10:22:00" class="text-gray-700">30 Mei 2025 10:22</time>
                            </div>
                        </li>
                        <li class="relative pl-8" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_article" data-floc="center" data-fpos="4" data-flnk="/sepakbola/tak-gentar-begini-kata-gerald-vanenburg-usai-timnas-u-23-masuk-grup-maut-dengan-korsel-419356-mvk.html" data-fcap="Tak Gentar! Begini Kata Gerald Vanenburg usai Timnas U-23 Masuk Grup Maut dengan Korsel" data-aid="419356">
                            <a href="/sepakbola/tak-gentar-begini-kata-gerald-vanenburg-usai-timnas-u-23-masuk-grup-maut-dengan-korsel-419356-mvk.html" class="block mb-1" data-track="mav_sub_click_track">
                                <h3 class="font-semibold" data-track="mav_sub_click_track">Tak Gentar! Begini Kata Gerald Vanenburg usai Timnas U-23 Masuk Grup Maut dengan Korsel</h3>
                            </a>
                            <div class="flex gap-x-2 text-xs">
                                <a href="/tag/berita-update" class="text-emerald-600 tracking-wide font-semibold uppercase" data-track="mav_sub_click_track">
                                    Berita Update
                                </a>
                                <time datetime="2025-05-30 09:37:00" class="text-gray-700">30 Mei 2025 09:37</time>
                            </div>
                        </li>
                        <li class="relative pl-8" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="popular_article" data-floc="center" data-fpos="5" data-flnk="/sepakbola/kata-pengamat-soal-beckham-putra-yang-dipanggil-timnas-indonesia-ini-saatnya-bayar-kepercayaan-kluivert-419310-mvk.html" data-fcap="Kata Pengamat soal Beckham Putra yang Dipanggil Timnas Indonesia: Ini saatnya Bayar Kepercayaan Kluivert" data-aid="419310">
                            <a href="/sepakbola/kata-pengamat-soal-beckham-putra-yang-dipanggil-timnas-indonesia-ini-saatnya-bayar-kepercayaan-kluivert-419310-mvk.html" class="block mb-1" data-track="mav_sub_click_track">
                                <h3 class="font-semibold" data-track="mav_sub_click_track">Kata Pengamat soal Beckham Putra yang Dipanggil Timnas Indonesia: Ini saatnya Bayar Kepercayaan Kluivert</h3>
                            </a>
                            <div class="flex gap-x-2 text-xs">
                                <a href="/tag/beckham-putra" class="text-emerald-600 tracking-wide font-semibold uppercase" data-track="mav_sub_click_track">
                                    Beckham Putra
                                </a>
                                <time datetime="2025-05-30 08:12:00" class="text-gray-700">30 Mei 2025 08:12</time>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
        </section>
        <!--  -->

        <!--  -->
        <section class="section flex px-4">
        @include('frontend.components._swiper')
        </section>
        <!--  -->

        <!--  -->
        <section class="section section--category px-4 md:px-10 my-10">
            <style>
                .box-category ul .item:first-child {
                    position: relative;
                    overflow: hidden;
                    border-radius: 0.75rem;
                    border-b border-gray-300ottom-width: 0px;
                    padding-top: 0px;
                    padding-bottom: 0px
                }

                .box-category ul .item:first-child .item-detail {
                    position: absolute;
                    inset: 0px;
                    justify-content: flex-end;
                    background-image: linear-gradient(to top, var(--tw-gradient-stops));
                    --tw-gradient-from: RGB(0 0 0/0.8) var(--tw-gradient-from-position);
                    --tw-gradient-to: RGB(0 0 0/0) var(--tw-gradient-to-position);
                    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
                    --tw-gradient-to: transparent var(--tw-gradient-to-position);
                    padding: 1rem;
                    color: RGB(var(--color-white))
                }

                .box-category ul .item:first-child .item-tag,
                .box-category ul .item:first-child .item-date {
                    color: RGB(var(--color-white))
                }

                .box-category ul .item:first-child .item-img {
                    aspect-ratio: 357 / 219;
                    width: 100%
                }

                @media (min-width: 1024px) {
                    .box-category ul .item:first-child {
                        margin-bottom: 2rem
                    }

                    .box-category ul .item:first-child .item-img {
                        height: 233px
                    }
                }
            </style>
            <div class="box box-category mb-6 bg-[#cde9f7] p-6 rounded">
                <div class="box-title relative mb-4 text-lg font-bold text-gray-800 tracking-wide flex flex-col justify-center items-center">
                    <span>PERISTIWA</span>
                </div>
                <ul class="lg:columns-2">

                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="1:peristiwa:1" data-flnk="/peristiwa/video-kdm-kembali-senyum-usai-ngamuk-ke-suporter-persikas-tak-masalah-jadi-gorengan-politik-419585-mvk.html" data-fcap="VIDEO: KDM Kembali Senyum Usai Ngamuk ke Suporter Persikas \&quot;Tak Masalah Jadi Gorengan Politik\&quot;" data-aid="419585">
                        <a href="/peristiwa/video-kdm-kembali-senyum-usai-ngamuk-ke-suporter-persikas-tak-masalah-jadi-gorengan-politik-419585-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748597285535-46bst.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-kdm-kembali-senyum-usai-ngamuk-ke-suporter-persikas-tak-masalah-jadi-gorengan-politik-419585-mvk.html" data-track="mav_sub_click_track">VIDEO: KDM Kembali Senyum Usai Ngamuk ke Suporter Persikas "Tak Masalah Jadi Gorengan Politik"</a>
                            </span>
                            <p class="item-description hidden">Demul menduga ada kekuatan politik yang sengaja menggunakan memprovokasi dengan membentangkan bendera salah satu klub sepakbola.</p>
                            <time datetime="2025-05-30 16:29:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:29</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="1:peristiwa:2" data-flnk="/peristiwa/tak-bisa-andalkan-apbd-pemerintah-siapkan-skema-kemitraan-untuk-gratiskan-sd-smp-swasta-419583-mvk.html" data-fcap="Tak Bisa Andalkan APBD, Pemerintah Siapkan Skema Kemitraan untuk Gratiskan SD-SMP Swasta" data-aid="419583">
                        <a href="/peristiwa/tak-bisa-andalkan-apbd-pemerintah-siapkan-skema-kemitraan-untuk-gratiskan-sd-smp-swasta-419583-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748597139603-20h9k.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/tak-bisa-andalkan-apbd-pemerintah-siapkan-skema-kemitraan-untuk-gratiskan-sd-smp-swasta-419583-mvk.html" data-track="mav_sub_click_track">Tak Bisa Andalkan APBD, Pemerintah Siapkan Skema Kemitraan untuk Gratiskan SD-SMP Swasta</a>
                            </span>
                            <p class="item-description hidden">Menurutnya, pemerintah bisa mencari skema dana dengan bermitra dengan sejumlah pihak untuk merealisasikan putusan Mahkamah Konstitusi (MK).</p>
                            <time datetime="2025-05-30 16:27:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:27</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="1:peristiwa:3" data-flnk="/peristiwa/video-badan-besar-kepala-botak-tampang-bengis-buronan-edy-godol-dalang-pembacokan-jaksa-ditangkap-419581-mvk.html" data-fcap="VIDEO: Badan Besar Kepala Botak, Tampang Bengis Buronan Edy Godol Dalang Pembacokan Jaksa Ditangkap" data-aid="419581">
                        <a href="/peristiwa/video-badan-besar-kepala-botak-tampang-bengis-buronan-edy-godol-dalang-pembacokan-jaksa-ditangkap-419581-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748596930685-cwr4o.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-badan-besar-kepala-botak-tampang-bengis-buronan-edy-godol-dalang-pembacokan-jaksa-ditangkap-419581-mvk.html" data-track="mav_sub_click_track">VIDEO: Badan Besar Kepala Botak, Tampang Bengis Buronan Edy Godol Dalang Pembacokan Jaksa Ditangkap</a>
                            </span>
                            <p class="item-description hidden">Pria berusia 54 tahun itu masuk dalam Daftar Pencarian Orang (DPO) Kejari Deli Serdang, Sumatera Utara.</p>
                            <time datetime="2025-05-30 16:24:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:24</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="1:peristiwa:4" data-flnk="/peristiwa/325-ribu-kendaraan-tinggalkan-jabotabek-saat-libur-kenaikan-isa-almasih-419577-mvk.html" data-fcap="325 Ribu Kendaraan Tinggalkan Jabotabek saat Libur Kenaikan Isa Almasih" data-aid="419577">
                        <a href="/peristiwa/325-ribu-kendaraan-tinggalkan-jabotabek-saat-libur-kenaikan-isa-almasih-419577-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748596578890-cmzwx.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/325-ribu-kendaraan-tinggalkan-jabotabek-saat-libur-kenaikan-isa-almasih-419577-mvk.html" data-track="mav_sub_click_track">325 Ribu Kendaraan Tinggalkan Jabotabek saat Libur Kenaikan Isa Almasih</a>
                            </span>
                            <p class="item-description hidden">Data tersebut berdasarkan pantauan lalu lintas di empat gerbang tol utama, yakni GT Cikupa, GT Ciawi, GT Cikampek Utama, dan GT Kalihurip Utama.</p>
                            <time datetime="2025-05-30 16:18:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:18</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="1:peristiwa:5" data-flnk="/peristiwa/video-macron-terpesona-indahnya-candi-borobudur-depan-prabowo-ini-poin-poin-kerja-sama-ri-prancis-419578-mvk.html" data-fcap="VIDEO: Macron Terpesona Indahnya Candi Borobudur Depan Prabowo, Ini Poin-Poin Kerja Sama RI-Prancis" data-aid="419578">
                        <a href="/peristiwa/video-macron-terpesona-indahnya-candi-borobudur-depan-prabowo-ini-poin-poin-kerja-sama-ri-prancis-419578-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748596595137-9ftnh.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/peristiwa/video-macron-terpesona-indahnya-candi-borobudur-depan-prabowo-ini-poin-poin-kerja-sama-ri-prancis-419578-mvk.html" data-track="mav_sub_click_track">VIDEO: Macron Terpesona Indahnya Candi Borobudur Depan Prabowo, Ini Poin-Poin Kerja Sama RI-Prancis</a>
                            </span>
                            <p class="item-description hidden">Presiden Macron menuturkan Indonesia memiliki kekayaan warisan dunia yang sangat besar dan Prancis siap berbagi keahliannya dalam bidang ini.</p>
                            <time datetime="2025-05-30 16:18:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:18</time>
                        </div>
                    </li>
                </ul>
                <a href="/peristiwa/" class="box-category-btn uppercase text-emerald-600 tracking-wide font-semibold uppercase mt-2 font-semibold text-sm flex items-center gap-2 justify-center lg:hidden" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="1:others" data-flnk="/peristiwa/" data-fcap="Selengkapnya" data-aid="0">
                    <span data-track="mav_sub_click_track">Selengkapnya</span>
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12.0266L5 12.0266M19 12.0266L13 18.0266M19 12.0266L13 6.02661" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
        </section>
        <!--  -->

        <!--  -->
        <section class="section section--category px-4 md:px-10">
            <style>
                .box-category ul .item:first-child {
                    position: relative;
                    overflow: hidden;
                    border-radius: 0.75rem;
                    border-b border-gray-300ottom-width: 0px;
                    padding-top: 0px;
                    padding-bottom: 0px
                }

                .box-category ul .item:first-child .item-detail {
                    position: absolute;
                    inset: 0px;
                    justify-content: flex-end;
                    background-image: linear-gradient(to top, var(--tw-gradient-stops));
                    --tw-gradient-from: RGB(0 0 0/0.8) var(--tw-gradient-from-position);
                    --tw-gradient-to: RGB(0 0 0/0) var(--tw-gradient-to-position);
                    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
                    --tw-gradient-to: transparent var(--tw-gradient-to-position);
                    padding: 1rem;
                    color: RGB(var(--color-white))
                }

                .box-category ul .item:first-child .item-tag,
                .box-category ul .item:first-child .item-date {
                    color: RGB(var(--color-white))
                }

                .box-category ul .item:first-child .item-img {
                    aspect-ratio: 357 / 219;
                    width: 100%
                }

                @media (min-width: 1024px) {
                    .box-category ul .item:first-child {
                        margin-bottom: 2rem
                    }

                    .box-category ul .item:first-child .item-img {
                        height: 233px
                    }
                }
            </style>
            <div class="box box-category mb-6 bg-[#fefeee] p-6 rounded border">
                <div class="box-title relative mb-4 text-lg font-bold text-gray-800 tracking-wide flex flex-col justify-center items-center">
                    <span>PERISTIWA</span>
                </div>
                <ul class="lg:columns-2">

                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:politik:1" data-flnk="/politik/dudung-ogah-maju-jadi-ketum-ppp-saya-belum-berminat-berpolitik-419121-mvk.html" data-fcap="Dudung Ogah Maju Jadi Ketum PPP: Saya Belum Berminat Berpolitik" data-aid="419121">
                        <a href="/politik/dudung-ogah-maju-jadi-ketum-ppp-saya-belum-berminat-berpolitik-419121-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/29/1748505977162-yeh8xi.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/politik/dudung-ogah-maju-jadi-ketum-ppp-saya-belum-berminat-berpolitik-419121-mvk.html" data-track="mav_sub_click_track">Dudung Ogah Maju Jadi Ketum PPP: Saya Belum Berminat Berpolitik</a>
                            </span>
                            <p class="item-description hidden">Dudung menyampaikan, belum ada komunikasi apapun dari pihak manapun untuk melobi dirinya menjadi calon ketua umum.</p>
                            <time datetime="2025-05-29 15:06:00" class="item-date text-xs text-zinc-500">29 Mei 2025 15:06</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:politik:2" data-flnk="/politik/kader-ppp-minta-rommy-taubat-dan-tidak-perdagangkan-partai-419097-mvk.html" data-fcap="Kader PPP Minta Rommy Taubat dan Tidak Perdagangkan Partai" data-aid="419097">
                        <a href="/politik/kader-ppp-minta-rommy-taubat-dan-tidak-perdagangkan-partai-419097-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/29/1748502398881-cpo4a.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/politik/kader-ppp-minta-rommy-taubat-dan-tidak-perdagangkan-partai-419097-mvk.html" data-track="mav_sub_click_track">Kader PPP Minta Rommy Taubat dan Tidak Perdagangkan Partai</a>
                            </span>
                            <p class="item-description hidden">Kekecewaannya bermula ketika Rommy yang saat itu menjabat sebagai Ketua Umum PPP dan tertangkap KPK.</p>
                            <time datetime="2025-05-29 14:09:00" class="item-date text-xs text-zinc-500">29 Mei 2025 14:09</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:politik:3" data-flnk="/politik/politikus-pdip-dukung-rencana-prabowo-buka-hubungan-diplomatik-dengan-israel-419086-mvk.html" data-fcap="Politikus PDIP Dukung Rencana Prabowo Buka Hubungan Diplomatik dengan Israel" data-aid="419086">
                        <a href="/politik/politikus-pdip-dukung-rencana-prabowo-buka-hubungan-diplomatik-dengan-israel-419086-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/29/1748500790498-2enui.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/politik/politikus-pdip-dukung-rencana-prabowo-buka-hubungan-diplomatik-dengan-israel-419086-mvk.html" data-track="mav_sub_click_track">Politikus PDIP Dukung Rencana Prabowo Buka Hubungan Diplomatik dengan Israel</a>
                            </span>
                            <p class="item-description hidden">Prabowo membuka kemungkinan pengakuan Indonesia terhadap Israel, dengan syarat Israel terlebih dahulu mengakui Palestina.</p>
                            <time datetime="2025-05-29 13:41:00" class="item-date text-xs text-zinc-500">29 Mei 2025 13:41</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:politik:4" data-flnk="/politik/larang-study-tour-hingga-kirim-anak-nakal-ke-barak-militer-jadi-kunci-dedi-mulyadi-raih-95-kepuasan-publik-419045-mvk.html" data-fcap="Larang Study Tour hingga Kirim Anak Nakal ke Barak Militer Jadi Kunci Dedi Mulyadi Raih 95% Kepuasan Publik" data-aid="419045">
                        <a href="/politik/larang-study-tour-hingga-kirim-anak-nakal-ke-barak-militer-jadi-kunci-dedi-mulyadi-raih-95-kepuasan-publik-419045-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/29/1748496474003-61fel.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                berita update
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/politik/larang-study-tour-hingga-kirim-anak-nakal-ke-barak-militer-jadi-kunci-dedi-mulyadi-raih-95-kepuasan-publik-419045-mvk.html" data-track="mav_sub_click_track">Larang Study Tour hingga Kirim Anak Nakal ke Barak Militer Jadi Kunci Dedi Mulyadi Raih 95% Kepuasan Publik</a>
                            </span>
                            <p class="item-description hidden">Tingkat kepuasan publik terhadap Demul unggul jauh dari gubernur lainnya di Pulau Jawa.</p>
                            <time datetime="2025-05-29 12:30:00" class="item-date text-xs text-zinc-500">29 Mei 2025 12:30</time>
                        </div>
                    </li>
                    <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 dark:border-white/10" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:politik:5" data-flnk="/politik/100-hari-kinerja-khofifah-emil-dardak-janji-janji-kampanye-sudah-terealisasi-419010-mvk.html" data-fcap="100 Hari Kinerja Khofifah-Emil Dardak, Janji-Janji Kampanye Sudah Terealisasi?" data-aid="419010">
                        <a href="/politik/100-hari-kinerja-khofifah-emil-dardak-janji-janji-kampanye-sudah-terealisasi-419010-mvk.html" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" data-track="mav_sub_click_track">
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/29/1748492248618-yzw8x.jpeg" class="w-full h-full object-cover" width="100" height="100" data-track="mav_sub_click_track">
                        </a>
                        <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                            <a href="/tag/100-hari-kerja" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                                100 hari kerja
                            </a>
                            <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                                <a href="/politik/100-hari-kinerja-khofifah-emil-dardak-janji-janji-kampanye-sudah-terealisasi-419010-mvk.html" data-track="mav_sub_click_track">100 Hari Kinerja Khofifah-Emil Dardak, Janji-Janji Kampanye Sudah Terealisasi?</a>
                            </span>
                            <p class="item-description hidden">Mengacu survei Indikator Politik, tingkat kepuasan publik terhadap Gubernur Jatim Khofifah Indarparawansa sekitar 76 persen</p>
                            <time datetime="2025-05-29 11:20:00" class="item-date text-xs text-zinc-500">29 Mei 2025 11:20</time>
                        </div>
                    </li>
                </ul>
                <a href="/politik/" class="box-category-btn uppercase text-emerald-600 tracking-wide font-semibold uppercase mt-2 font-semibold text-sm flex items-center gap-2 justify-center lg:hidden" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:others" data-flnk="/politik/" data-fcap="Selengkapnya" data-aid="0">
                    <span data-track="mav_sub_click_track">Selengkapnya</span>
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12.0266L5 12.0266M19 12.0266L13 18.0266M19 12.0266L13 6.02661" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
        </section>
        
        
    </main>