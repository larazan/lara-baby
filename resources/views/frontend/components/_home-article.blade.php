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