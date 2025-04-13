

<div class="vs jj ttm vl ou uf na">

    <!-- Loading -->
    <x-loading-indicator />

    <!-- Welcome banner -->
    <div class="y pr dw jk rounded-sm la rc">

        <!-- Background illustration -->
        <div class="g q k ip id pointer-events-none hidden tnh" aria-hidden="true">
            <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <path id="welcome-a" d="M64 0l64 128-64-20-64 20z"></path>
                    <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z"></path>
                    <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z"></path>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                        <stop stop-color="#A5B4FC" offset="0%"></stop>
                        <stop stop-color="#818CF8" offset="100%"></stop>
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                        <stop stop-color="#4338CA" offset="0%"></stop>
                        <stop stop-color="#6366F1" stop-opacity="0" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g transform="rotate(64 36.592 105.604)">
                        <mask id="welcome-d" fill="#fff">
                            <use xlink:href="#welcome-a"></use>
                        </mask>
                        <use fill="url(#welcome-b)" xlink:href="#welcome-a"></use>
                        <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z"></path>
                    </g>
                    <g transform="rotate(-51 91.324 -105.372)">
                        <mask id="welcome-f" fill="#fff">
                            <use xlink:href="#welcome-e"></use>
                        </mask>
                        <use fill="url(#welcome-b)" xlink:href="#welcome-e"></use>
                        <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z"></path>
                    </g>
                    <g transform="rotate(44 61.546 392.623)">
                        <mask id="welcome-h" fill="#fff">
                            <use xlink:href="#welcome-g"></use>
                        </mask>
                        <use fill="url(#welcome-b)" xlink:href="#welcome-g"></use>
                        <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z"></path>
                    </g>
                </g>
            </svg>
        </div>

        <!-- Content -->
        <div class="y">
            <h1 class="gu teu text-slate-800 font-bold rt">Good morning, Acme Inc. 👋</h1>
            <p>Here is what’s happening with your projects today:</p>
        </div>

    </div>

    <!-- Cards -->
    <div class="sn ag fn">

        <!-- total order -->
        <div class="flex ak tz _c tns bg-white hf bd rounded-md border2 border-slate-200">
            <div class="vc flex flex-col py-8 justify-center items-center mb2 space-y-2">
                <div class="flex items-center justify-center rounded-full p-2 w-12 h-12 bg-white py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
</svg>

                </div>
                <div class="go gh gq gv rt">Total fact</div>
                <div class="flex aj">
                    <div class="text-xl font-bold text-slate-800">{{ $factCount }}</div>
                </div>
            </div>
        </div>

        <!-- total amount -->
        <div class="flex ak tz _c tns bg-white hl bd rounded-md border2 border-slate-200">
        <div class="vc flex flex-col py-8 justify-center items-center mb2 space-y-2">
                <div class="flex items-center justify-center rounded-full p-2 w-12 h-12 bg-white py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
</svg>

                </div>
                <div class="go gh gq gv rt">Total article</div>
                <div class="flex aj">
                    <div class="text-xl font-bold text-slate-800">{{ $articleCount }}</div>
                </div>
            </div>
        </div>

        <!-- total point -->
        <div class="flex ak tz _c tns bg-white hc bd rounded-md border2 border-slate-200">
            <div class="vc flex flex-col py-8 justify-center items-center mb2 space-y-2">
                <div class="flex items-center justify-center rounded-full p-2 w-12 h-12 bg-white text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
</svg>

                </div>
                <div class="go gh gq gv rt">Total subscriber</div>
                <div class="flex aj">
                    <div class="text-xl font-bold text-slate-800">{{ $subscribeCount }}</div>
                </div>
            </div>
        </div>

    </div>

    


    

    

    <!-- Cards -->
    <div class="sn ag fn" style="margin-top: 40px;">


        <!-- Line chart (Real Time Value) -->
        <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch flex items-center">
                <h2 class="gh text-slate-800">Real Time Value</h2>
                <div class="y nq" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" @click.prevent="" aria-expanded="false">
                        <svg class="oo sl du gq" viewBox="0 0 16 16">
                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                        </svg>
                    </button>
                    <div class="tk g ti ts uz">
                        <div class="bg-white border border-slate-200 dk rounded bd la ru" x-show="open" x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 an" x-transition:enter-end="ba uj" x-transition:leave="wt wa wr" x-transition:leave-start="ba" x-transition:leave-end="opacity-0" style="display: none;">
                            <div class="go gn lm">Built with <a class="br" @focus="open = true" @focusout="open = false" href="https://www.chartjs.org/" target="_blank">Chart.js</a></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Chart built with Chart.js 3 -->
            <!-- Check out src/js/components/dashboard-card-05.js for config -->
            <div class="vc vo">
                <div class="flex aj">
                    <div class="text-3xl font-bold text-slate-800 mr-2 gy">$<span id="dashboard-card-05-value">61.31</span></div>
                    <div id="dashboard-card-05-deviation" class="text-sm gh ye vk rounded-full" style="background-color: rgb(16, 185, 129);">+1.88%</div>
                </div>
            </div>
            <div class="uw">
                <!-- Change the height attribute to adjust the chart height -->
                <canvas id="dashboard-card-05" width="402" height="255" style="display: block; box-sizing: border-box; height: 255px; width: 402px;"></canvas>
            </div>
        </div>

        <!-- Doughnut chart (Top Countries) -->
        <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch">
                <h2 class="gh text-slate-800">Top Countries</h2>
            </header>
            <!-- Chart built with Chart.js 3 -->
            <!-- Check out src/js/components/dashboard-card-06.js for config -->
            <div class="uw flex ak justify-center">
                <div>
                    <!-- Change the height attribute to adjust the chart height -->
                    <canvas id="dashboard-card-06" width="402" height="260" style="display: block; box-sizing: border-box; height: 260px; width: 402px;"></canvas>
                </div>
                <div id="dashboard-card-06-legend" class="vc mh mp">
                    <ul class="flex flex-wrap justify-center -m-1">
                        <li style="margin: 4px;"><button class="btn-xs" style="background-color: rgb(255, 255, 255); border-width: 1px; border-color: rgb(226, 232, 240); color: rgb(100, 116, 139); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 6px -1px, rgba(0, 0, 0, 0.02) 0px 2px 4px -1px;"><span style="display: block; width: 8px; height: 8px; background-color: rgb(99, 102, 241); border-radius: 2px; margin-right: 4px; pointer-events: none;"></span><span style="display: flex; align-items: center;">United States</span></button></li>
                        <li style="margin: 4px;"><button class="btn-xs" style="background-color: rgb(255, 255, 255); border-width: 1px; border-color: rgb(226, 232, 240); color: rgb(100, 116, 139); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 6px -1px, rgba(0, 0, 0, 0.02) 0px 2px 4px -1px;"><span style="display: block; width: 8px; height: 8px; background-color: rgb(96, 165, 250); border-radius: 2px; margin-right: 4px; pointer-events: none;"></span><span style="display: flex; align-items: center;">Italy</span></button></li>
                        <li style="margin: 4px;"><button class="btn-xs" style="background-color: rgb(255, 255, 255); border-width: 1px; border-color: rgb(226, 232, 240); color: rgb(100, 116, 139); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 6px -1px, rgba(0, 0, 0, 0.02) 0px 2px 4px -1px;"><span style="display: block; width: 8px; height: 8px; background-color: rgb(55, 48, 163); border-radius: 2px; margin-right: 4px; pointer-events: none;"></span><span style="display: flex; align-items: center;">Other</span></button></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Table (Top Channels) -->
        <div class="tz tni bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch">
                <h2 class="gh text-slate-800">Top Channels</h2>
            </header>
            <div class="dk">

                <!-- Table -->
                <div class="lf">
                    <table class="ux ou">
                        <!-- Table header -->
                        <thead class="go gv gq hp rounded-sm">
                            <tr>
                                <th class="dx">
                                    <div class="gh gt">Source</div>
                                </th>
                                <th class="dx">
                                    <div class="gh gn">Visitors</div>
                                </th>
                                <th class="dx">
                                    <div class="gh gn">Revenues</div>
                                </th>
                                <th class="dx">
                                    <div class="gh gn">Sales</div>
                                </th>
                                <th class="dx">
                                    <div class="gh gn">Conversion</div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm gp le ln">
                            <!-- Row -->
                            <tr>
                                <td class="dx">
                                    <div class="flex items-center">
                                        <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                            <circle fill="#24292E" cx="18" cy="18" r="18"></circle>
                                            <path d="M18 10.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V24c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z" fill="#FFF"></path>
                                        </svg>
                                        <div class="text-slate-800">Github.com</div>
                                    </div>
                                </td>
                                <td class="dx">
                                    <div class="gn">2.4K</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yt">$3,877</div>
                                </td>
                                <td class="dx">
                                    <div class="gn">267</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yv">4.7%</div>
                                </td>
                            </tr>
                            <!-- Row -->
                            <tr>
                                <td class="dx">
                                    <div class="flex items-center">
                                        <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                            <circle fill="#1DA1F2" cx="18" cy="18" r="18"></circle>
                                            <path d="M26 13.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H10c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z" fill="#FFF" fill-rule="nonzero"></path>
                                        </svg>
                                        <div class="text-slate-800">Twitter</div>
                                    </div>
                                </td>
                                <td class="dx">
                                    <div class="gn">2.2K</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yt">$3,426</div>
                                </td>
                                <td class="dx">
                                    <div class="gn">249</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yv">4.4%</div>
                                </td>
                            </tr>
                            <!-- Row -->
                            <tr>
                                <td class="dx">
                                    <div class="flex items-center">
                                        <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                            <circle fill="#EA4335" cx="18" cy="18" r="18"></circle>
                                            <path d="M18 17v2.4h4.1c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C21.6 11.7 20 11 18.1 11c-3.9 0-7 3.1-7 7s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H18z" fill="#FFF" fill-rule="nonzero"></path>
                                        </svg>
                                        <div class="text-slate-800">Google (organic)</div>
                                    </div>
                                </td>
                                <td class="dx">
                                    <div class="gn">2.0K</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yt">$2,444</div>
                                </td>
                                <td class="dx">
                                    <div class="gn">224</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yv">4.2%</div>
                                </td>
                            </tr>
                            <!-- Row -->
                            <tr>
                                <td class="dx">
                                    <div class="flex items-center">
                                        <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                            <circle fill="#4BC9FF" cx="18" cy="18" r="18"></circle>
                                            <path d="M26 14.3c-.1 1.6-1.2 3.7-3.3 6.4-2.2 2.8-4 4.2-5.5 4.2-.9 0-1.7-.9-2.4-2.6C14 19.9 13.4 15 12 15c-.1 0-.5.3-1.2.8l-.8-1c.8-.7 3.5-3.4 4.7-3.5 1.2-.1 2 .7 2.3 2.5.3 2 .8 6.1 1.8 6.1.9 0 2.5-3.4 2.6-4 .1-.9-.3-1.9-2.3-1.1.8-2.6 2.3-3.8 4.5-3.8 1.7.1 2.5 1.2 2.4 3.3z" fill="#FFF" fill-rule="nonzero"></path>
                                        </svg>
                                        <div class="text-slate-800">Vimeo.com</div>
                                    </div>
                                </td>
                                <td class="dx">
                                    <div class="gn">1.9K</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yt">$2,236</div>
                                </td>
                                <td class="dx">
                                    <div class="gn">220</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yv">4.2%</div>
                                </td>
                            </tr>
                            <!-- Row -->
                            <tr>
                                <td class="dx">
                                    <div class="flex items-center">
                                        <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                            <circle fill="#0E2439" cx="18" cy="18" r="18"></circle>
                                            <path d="M14.232 12.818V23H11.77V12.818h2.46zM15.772 23V12.818h2.462v4.087h4.012v-4.087h2.456V23h-2.456v-4.092h-4.012V23h-2.461z" fill="#E6ECF4"></path>
                                        </svg>
                                        <div class="text-slate-800">Indiehackers.com</div>
                                    </div>
                                </td>
                                <td class="dx">
                                    <div class="gn">1.7K</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yt">$2,034</div>
                                </td>
                                <td class="dx">
                                    <div class="gn">204</div>
                                </td>
                                <td class="dx">
                                    <div class="gn yv">3.9%</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Line chart (Sales Over Time) -->
        <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch flex items-center">
                <h2 class="gh text-slate-800">Sales Over Time (all stores)</h2>
            </header>
            <div class="vc vo">
                <div class="flex flex-wrap fe aq">
                    <div class="flex aj">
                        <div class="text-3xl font-bold text-slate-800 mr-2">$1,482</div>
                        <div class="text-sm gh ye vk hy rounded-full">-22%</div>
                    </div>
                    <div id="dashboard-card-08-legend" class="uw nq rt">
                        <ul class="flex flex-wrap justify-end">
                            <li style="margin-left: 12px;"><button style="display: inline-flex; align-items: center;"><span style="display: block; width: 12px; height: 12px; border-radius: 9999px; margin-right: 8px; border-width: 3px; border-color: rgb(99, 102, 241); pointer-events: none;"></span><span style="color: rgb(100, 116, 139); font-size: 0.875rem; line-height: 1.5715;">Current</span></button></li>
                            <li style="margin-left: 12px;"><button style="display: inline-flex; align-items: center;"><span style="display: block; width: 12px; height: 12px; border-radius: 9999px; margin-right: 8px; border-width: 3px; border-color: rgb(96, 165, 250); pointer-events: none;"></span><span style="color: rgb(100, 116, 139); font-size: 0.875rem; line-height: 1.5715;">Previous</span></button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Chart built with Chart.js 3 -->
            <!-- Check out src/js/components/dashboard-card-08.js for config -->
            <div class="uw">
                <!-- Change the height attribute to adjust the chart height -->
                <canvas id="dashboard-card-08" width="402" height="248" style="display: block; box-sizing: border-box; height: 248px; width: 402px;"></canvas>
            </div>
        </div>

        <!-- Stacked bar chart (Sales VS Refunds) -->
        <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch flex items-center">
                <h2 class="gh text-slate-800">Sales VS Refunds</h2>
                <div class="y nq" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="block" href="#0" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" @click.prevent="" aria-expanded="false">
                        <svg class="oo sl du gq" viewBox="0 0 16 16">
                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                        </svg>
                    </button>
                    <div class="tk g ti ts uz">
                        <div class="uo bg-white border border-slate-200 dk rounded bd la ru" x-show="open" x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 an" x-transition:enter-end="ba uj" x-transition:leave="wt wa wr" x-transition:leave-start="ba" x-transition:leave-end="opacity-0" style="display: none;">
                            <div class="text-sm">Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="vc vo">
                <div class="flex aj">
                    <div class="text-3xl font-bold text-slate-800 mr-2">+$6,796</div>
                    <div class="text-sm gh ye vk hy rounded-full">-34%</div>
                </div>
            </div>
            <!-- Chart built with Chart.js 3 -->
            <!-- Check out src/js/components/dashboard-card-09.js for config -->
            <div class="uw">
                <!-- Change the height attribute to adjust the chart height -->
                <canvas id="dashboard-card-09" width="402" height="248" style="display: block; box-sizing: border-box; height: 248px; width: 402px;"></canvas>
            </div>
        </div>

        <!-- Card (Recent Activity) -->
        <div class="tz tno bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch">
                <h2 class="gh text-slate-800">Recent Contact</h2>
            </header>
            <div class="dk">

                <!-- Card content -->
                <!-- "Today" group -->
                <div>
                    <ul class="nm">
                        <!-- Item -->
                         @foreach($contacts as $contact)
                        <li class="flex vi">
                            <div class="op sv rounded-full ub ho ng ra">
                                <svg class="op sv du text-indigo-50" viewBox="0 0 36 36">
                                    <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                                </svg>
                            </div>
                            <div class="uw flex items-center cs ch text-sm vr">
                                <div class="uw flex fe">
                                    <div class="lo"><a class="gp text-slate-800 xd" href="#0">{{ $contact->name }}:</a> {{ $contact->message }}</div>
                                    <div class="ub ls nq">
                                        <a class="gp text-indigo-500 xh" href="{{ url('/admin/contacts') }}">View<span class="hidden _z"> -&gt;</span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                
            </div>
        </div>

        <!-- Card (Income/Expenses) -->
        <div class="tz tno bg-white bd rounded-sm border border-slate-200">
            <header class="vc vu cs ch">
                <h2 class="gh text-slate-800">Subscribers</h2>
            </header>
            <div class="dk">

                <!-- Card content -->
                <!-- "Today" group -->
                <div>
                    <ul class="nm">
                        <!-- Item -->
                         @foreach($subscribers as $n)
                        <li class="flex vi">
                            <div class="op sv rounded-full ub hv ng ra">
                                <svg class="op sv du yu" viewBox="0 0 36 36">
                                    <path d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path>
                                </svg>
                            </div>
                            <div class="uw flex items-center cs ch text-sm vr">
                                <div class="uw flex fe">
                                    <div class="lo"><a class="gp text-slate-800 xd" href="#0">{{ $n->email }}</a></div>
                                    <div class="ub li nq">
                                        <span class="gp text-slate-800">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $n->created_at)->format('M. d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>

            </div>
        </div>

    </div>




    


</div>