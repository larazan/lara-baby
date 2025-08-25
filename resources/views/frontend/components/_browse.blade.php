@php
$categories = \App\Models\Category::select(['name', 'slug'])->where('parent_id', null)->get();

@endphp

<div class="hidden relative md:inline-flex">

  <button class="hidden sm:inline-block group relative items-center text-gray-900" aria-haspopup="true" @click.outside="categoryOpen = false" @click.prevent="categoryOpen = !categoryOpen" :aria-expanded="categoryOpen">
    <span class=" cursor-pointer flex flex-row items-end gap-1 figtree-medium">Menu
      <svg :class="categoryOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20" height="20">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
      </svg>
    </span>

  </button>

</div>

<div
  class="flex origin-top-right z-30 p-6 fixed top-[58px] mt-0 inset-x-0  w-screen bg-white border border-slate-300 shadow-lg overflow-hidden "
  enter="transition ease-out duration-200 transform"
  enterStart="opacity-0 -translate-y-2"
  enterEnd="opacity-100 translate-y-0"
  leave="transition ease-out duration-200"
  leaveStart="opacity-100"
  leaveEnd="opacity-0"
  @keydown.escape.window="categoryOpen = false"
  x-show="categoryOpen"
  :class="categoryOpen ? 'opacity-100' : 'top-full'"
  x-transition:enter="transition ease-out duration-200 transform"
  x-transition:enter-start="opacity-0 -translate-y-2"
  x-transition:enter-end="opacity-100 translate-y-0"
  x-transition:leave="transition ease-out duration-200"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  x-cloak>
  <div class="flex flex-col w-full">

    <div class="">
      <div class="flex flex-col gap-3">
        <div class="grid grid-cols-4 gap-3">
          <!-- pregnancy -->
          <div class="">
            <div class="flex space-x-1 items-center">
              <span class="w-6 h-6">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 507.5 507.5" xml:space="preserve" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <circle style="fill:#22B2B2;" cx="253.75" cy="249.828" r="238.4"></circle>
                    <path style="fill:#FCCCB9;" d="M96.95,503.428c0,10.4,35.2-2.4,55.2-2.4c19.2,0,18.4-8.8,18.4-19.2c0-10.4,1.6-18.4-18.4-19.2 C125.75,461.828,96.95,493.028,96.95,503.428z"></path>
                    <path style="fill:#EAA78C;" d="M169.75,482.628c0-10.4,1.6-18.4-18.4-19.2c-25.6-1.6-55.2,29.6-55.2,40"></path>
                    <g>
                      <polygon style="fill:#FCCCB9;" points="177.75,304.228 148.15,302.628 148.15,204.228 180.15,204.228 "></polygon>
                      <polygon style="fill:#FCCCB9;" points="116.95,397.028 84.95,409.028 148.95,299.428 191.35,299.428 "></polygon>
                    </g>
                    <g>
                      <polyline style="fill:#EAA78C;" points="191.35,299.428 116.95,397.028 84.95,409.028 "></polyline>
                      <polygon style="fill:#EAA78C;" points="328.15,304.228 356.95,302.628 356.95,204.228 325.75,204.228 "></polygon>
                      <polygon style="fill:#EAA78C;" points="388.95,397.028 420.15,409.028 356.15,299.428 314.55,299.428 "></polygon>
                    </g>
                    <path style="fill:#093751;" d="M460.15,452.228c0,44-92,52.8-206.4,52.8s-206.4-8.8-206.4-52.8s92-80,206.4-80 S460.15,407.428,460.15,452.228z"></path>
                    <path style="fill:#0D4972;" d="M460.15,452.228c0,44-92,37.6-206.4,37.6s-206.4,6.4-206.4-37.6s92-80,206.4-80 S460.15,407.428,460.15,452.228z"></path>
                    <polygon style="fill:#F9BDA0;" points="295.35,219.428 212.15,219.428 228.95,143.428 278.55,143.428 "></polygon>
                    <g>
                      <path style="fill:#00233F;" d="M202.55,66.628c0,0,5.6,56.8,0.8,68.8c0,0,12-3.2,27.2-4l15.2-17.6l-2.4-56L202.55,66.628z"></path>
                      <path style="fill:#00233F;" d="M304.95,66.628c0,0-5.6,56.8-0.8,68.8c0,0-12-3.2-27.2-4l-15.2-17.6l2.4-56L304.95,66.628z"></path>
                      <path style="fill:#00233F;" d="M303.35,40.228c0,32,13.6,40-40,40h-19.2c-21.6,0-40-17.6-40-40l0,0c0-21.6,17.6-40,40-40h19.2 C285.75,0.228,303.35,18.628,303.35,40.228L303.35,40.228z"></path>
                    </g>
                    <rect x="228.15" y="98.628" style="fill:#F9BDA0;" width="50.4" height="54.4"></rect>
                    <polygon style="fill:#EAA78C;" points="280.15,156.228 253.75,171.428 228.15,98.628 279.35,98.628 "></polygon>
                    <path style="fill:#FCCCB9;" d="M293.75,54.628c0,38.4-20,73.6-40,73.6c-20.8,0-40-35.2-40-73.6s20-45.6,40-45.6 C274.55,9.028,293.75,15.428,293.75,54.628z"></path>
                    <g>
                      <path style="fill:#F9BDA0;" d="M253.75,9.028c20.8,0,40,6.4,40,45.6s-20,73.6-40,73.6"></path>
                      <polygon style="fill:#F9BDA0;" points="225.75,157.828 146.55,183.428 150.55,255.428 252.15,229.828 "></polygon>
                    </g>
                    <polyline style="fill:#FCCCB9;" points="146.55,183.428 150.55,255.428 252.15,229.828 "></polyline>
                    <polygon style="fill:#F9BDA0;" points="281.75,157.828 360.95,183.428 356.95,255.428 255.35,229.828 "></polygon>
                    <polyline style="fill:#EAA78C;" points="360.95,183.428 356.95,255.428 255.35,229.828 "></polyline>
                    <g>
                      <path style="fill:#00233F;" d="M272.95,1.828c0,0,52,70.4-72.8,71.2c0,0-6.4-40.8,10.4-58.4s46.4-14.4,46.4-14.4L272.95,1.828z"></path>
                      <path style="fill:#00233F;" d="M244.95,1.828c0,0,11.2,60.8,62.4,67.2c0,0,8-36-6.4-52.8s-40.8-15.2-40.8-15.2L244.95,1.828z"></path>
                    </g>
                    <path style="fill:#093751;" d="M351.35,349.828c0,66.4-44,109.6-97.6,109.6s-97.6-43.2-97.6-109.6s43.2-120,97.6-120 S351.35,284.228,351.35,349.828z"></path>
                    <path style="fill:#C91911;" d="M351.35,349.828c0,66.4-44,81.6-97.6,81.6s-97.6-15.2-97.6-81.6s43.2-120,97.6-120 S351.35,284.228,351.35,349.828z"></path>
                    <path style="fill:#D8462A;" d="M351.35,349.828c0,66.4-44,48-97.6,48s-97.6,18.4-97.6-48s43.2-120,97.6-120 S351.35,284.228,351.35,349.828z"></path>
                    <g>
                      <path style="fill:#C91911;" d="M253.75,229.828c54.4,0,97.6,53.6,97.6,120s-43.2,81.6-97.6,81.6"></path>
                      <path style="fill:#C91911;" d="M177.75,245.028c0-29.6,33.6-36.8,76-36.8c41.6,0,76,6.4,76,36.8s-33.6,54.4-76,54.4 C212.15,299.428,177.75,274.628,177.75,245.028z"></path>
                    </g>
                    <path style="fill:#D8462A;" d="M177.75,245.028c0-29.6,33.6-36.8,76-36.8c41.6,0,76,6.4,76,36.8s-33.6,28-76,28 C212.15,273.028,177.75,274.628,177.75,245.028z"></path>
                    <path style="fill:#C91911;" d="M253.75,208.228c41.6,0,76,6.4,76,36.8s-33.6,54.4-76,54.4"></path>
                    <path style="fill:#D8462A;" d="M208.95,237.828c0.8,1.6-0.8,3.2-2.4,3.2l0,0c-1.6,0.8-3.2,0-4-1.6l-20.8-69.6 c-0.8-1.6,0.8-3.2,2.4-3.2l0,0c1.6-0.8,3.2,0,4,1.6L208.95,237.828z"></path>
                    <path style="fill:#C91911;" d="M298.55,237.828c-0.8,1.6,0.8,3.2,2.4,3.2l0,0c1.6,0.8,3.2,0,4-1.6l20.8-68.8 c0.8-1.6-0.8-3.2-2.4-3.2l0,0c-1.6-0.8-3.2,0-4,1.6L298.55,237.828z"></path>
                    <g>
                      <path style="fill:#F46856;" d="M289.75,219.428c0,3.2-16,0-36,0s-36,3.2-36,0s16-6.4,36-6.4S289.75,215.428,289.75,219.428z"></path>
                      <ellipse transform="matrix(0.3444 -0.9388 0.9388 0.3444 -158.054 362.9387)" style="fill:#F46856;" cx="180.84" cy="294.637" rx="20" ry="7.2"></ellipse>
                      <circle style="fill:#F46856;" cx="168.95" cy="325.828" r="4"></circle>
                      <circle style="fill:#F46856;" cx="166.55" cy="336.228" r="2.4"></circle>
                      <ellipse transform="matrix(-0.4187 -0.9081 0.9081 -0.4187 77.8076 501.5658)" style="fill:#F46856;" cx="199.431" cy="225.88" rx="3.2" ry="12.8"></ellipse>
                    </g>
                    <path style="fill:#FCCCB9;" d="M136.15,403.428c-0.8,28.8-15.2,5.6-33.6,6.4c-29.6,1.6-24-8-23.2-16c0-8.8,12.8-24,32-23.2 C128.95,371.428,136.15,395.428,136.15,403.428z"></path>
                    <path style="fill:#EAA78C;" d="M110.55,370.628c18.4,0.8,25.6,24,25.6,32.8c-0.8,28.8-15.2,5.6-33.6,6.4c-29.6,1.6-24-8-23.2-16"></path>
                    <g>
                      <path style="fill:#FCCCB9;" d="M371.35,403.428c0.8,28.8,15.2,5.6,33.6,6.4c29.6,1.6,24-8,23.2-16c0-8.8-12.8-24-32-23.2 C378.55,371.428,371.35,395.428,371.35,403.428z"></path>
                      <path style="fill:#FCCCB9;" d="M432.15,503.428c0,10.4-35.2-2.4-55.2-2.4s-18.4-8.8-18.4-19.2c0-10.4-1.6-18.4,18.4-19.2 C403.35,461.828,432.15,493.028,432.15,503.428z"></path>
                    </g>
                    <path style="fill:#EAA78C;" d="M359.35,482.628c0-10.4-1.6-18.4,18.4-19.2c25.6-1.6,55.2,29.6,55.2,40"></path>
                    <path style="fill:#093751;" d="M233.75,457.028c0,0,87.2,20,117.6,15.2c0,0-26.4,4-24.8-7.2s44.8,1.6,40-18.4s-39.2-12.8-35.2-26.4 s-28.8,16-28.8,16l-35.2,12.8L233.75,457.028z"></path>
                  </g>
                </svg>
              </span>
              <h1 class="text-purple-500 text-lg figtree-bold">Pregnancy</h1>
            </div>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="{{ url('/pregnancy') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Pregnancy Tracker</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/pregnancy/tracker/first-trimester') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>1st Trimester</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/pregnancy/tracker/second-trimester') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>2nd Trimester</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/pregnancy/tracker/third-trimester') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>3rd Trimester</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/balai-upt" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Preparing for Baby</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/balai-upt" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Postpartum</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <!-- parenting -->
          <div class="">
            <div class="flex space-x-1 items-center">
              <span class="w-6 h-6">
                <svg viewBox="0 0 72 72" id="emoji" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <g id="color">
                      <path fill="#92D3F5" d="M11.0003,61V44.9552c0-3.2895,3.2918-5.9566,6.5836-5.9566c3.9146,3.2895,7.8292,3.2895,11.8327,0h13.1673 c3.9146,3.2895,7.8292,3.2895,11.8327,0c3.2918,0,6.5836,2.6671,6.5836,5.9566V61"></path>
                      <path fill="#B1CC33" d="M26.5,61v-2.5333C26.5,56,29.0018,54,31.5036,54c2.9751,2.4667,5.9502,2.4667,8.9929,0 c2.5017,0,5.0035,2,5.0035,4.4667V61"></path>
                    </g>
                    <g id="hair">
                      <path fill="#A57939" d="M37.1268,38.9986h5.4571c3.9146,3.2895,7.8292,3.2895,11.8327,0c1.2701,0,2.538,0.4002,3.619,1.0768 l0.3439-0.1638l1.7012-2.0374c1.956-2.2226,1.5774-5.9042,0.4216-8.6602c-1.6003-3.734-2.0448-3.734-2.3115-8.5349 c-0.0889-2.7561-2.2226-5.0676-4.9787-5.3343c0,0-1.6892-2.0448-5.3343-2.0448c-4.2675,0-8.1792,2.3115-9.1572,5.9566 c-1.0668,3.734,0.1779,5.2453-0.889,8.0903c-0.9335,2.4005-2.9313,3.7391-2.9105,6.6245c0.0068,0.9417,0.7955,3.0455,1.4623,4.0457 L37.1268,38.9986z"></path>
                      <path fill="#A57939" d="M13.9286,21.3903c0.5334-7.7347,6.4011-7.8236,9.335-7.3791c0.2667,0.0889,1.0669,0,1.3336,0 c5.3343-0.7112,8.0014,5.3343,8.0014,8.0014c0,0.978,0.2255,3.3655-1.1081,4.6991c0,0-3.2483-3.7211-3.4261-5.8549 c0,0-10.1352,3.8229-10.8464,0.5334c0,0-0.7112,2.6671-1.3336,3.3784c0,0-0.3288,2.0448-0.3288,2.6671 C15.5558,27.4359,13.6619,24.7687,13.9286,21.3903z"></path>
                      <path fill="#A57939" d="M33.6355,42.2716c0.4694,3.3631,4.487-0.8706,4.487-0.8706c0.5491,1.5737,4.4254,3.8674,4.4254,3.8674 c1.0324-0.9557,0.5259-2.8525,0.3721-3.5136c-0.5106-2.7127-3.0794-4.5325-5.8079-4.1144c-0.3436,0.0276-0.6888,0.0276-1.0324,0 c-2.2709-0.3369-6.03-0.1483-7.12,4.6433c-0.5317,2.3382,0.624,2.9844,0.624,2.9844S33.3477,40.2093,33.6355,42.2716z"></path>
                    </g>
                    <g id="skin">
                      <path fill="#FCEA2B" d="M41.1209,26.8135c0,5.3343,3.3784,9.335,7.3791,9.335s7.3791-4.0007,7.3791-9.335 c0-3.3784-1.3336-5.3343-4.0007-8.0014c-2.6671,2.6671-10.6686,6.0455-10.6686,7.3791L41.1209,26.8135L41.1209,26.8135z"></path>
                      <path fill="#FCEA2B" d="M28.0454,20.8569c0,0-10.1351,3.8229-10.8464,0.5334c0,0-0.7112,2.6672-1.3336,3.3784 c0,0-0.3185,1.9835-0.3273,2.635c0.4585,5.148,3.8411,9.1996,7.9427,9.1996c4.2864,0,7.782-4.426,7.9809-9.9028 C31.3572,26.5801,28.2203,22.9551,28.0454,20.8569z"></path>
                      <path fill="#FCEA2B" d="M38.1228,41.401c0,0-4.0176,4.2337-4.487,0.8706c-0.2576-1.8462-3.2933,2.0046-3.9283,2.834 c-0.0739,0.3356-0.1232,0.5668-0.1232,0.5888c-0.1437,3.7311,2.7579,6.8753,6.4885,7.031c3.7306-0.1557,6.6323-3.2999,6.4886-7.031 c0-0.0303-0.0594-0.2263-0.15-0.5089C41.7327,44.7706,38.6118,42.8025,38.1228,41.401z"></path>
                    </g>
                    <g id="line">
                      <path fill="none" stroke="#000000" stroke-miterlimit="10" stroke-width="2" d="M31.5,25.5689c0,0.1839,0,0.3678,0,0.6437 c0,5.7012-3.5862,10.3908-8,10.3908s-8-4.6897-8-10.3908c0-0.1839,0-0.3678,0-0.6437"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.9286,21.3903 c0.5334-7.7347,6.4011-7.8236,9.335-7.3791c0.2667,0.0889,1.0669,0,1.3336,0c5.3343-0.7112,8.0014,5.3343,8.0014,8.0014 c0,0.978,0.2255,3.3655-1.1081,4.6991c0,0-3.2483-3.7211-3.4261-5.8549c0,0-10.1352,3.8229-10.8464,0.5334 c0,0-0.7112,2.6671-1.3336,3.3784c0,0-0.3288,2.0448-0.3288,2.6671C15.5558,27.4359,13.6619,24.7687,13.9286,21.3903z"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M35.8408,33.634 c-0.0323-2.2288,1.1717-4.1809,1.9908-6.287c1.0669-2.845-0.1778-4.3563,0.889-8.0903c0.978-3.6451,4.8898-5.9566,9.1572-5.9566 c3.6451,0,5.3343,2.0448,5.3343,2.0448c2.7561,0.2667,4.8898,2.5782,4.9787,5.3343c0.2667,4.8009,0.7112,4.8009,2.3115,8.5349 c1.0621,2.5328,0.7728,5.3659-0.7991,7.5333"></path>
                      <path fill="none" stroke="#000000" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="M41.1209,26.8135 c0,5.3343,3.3784,9.335,7.3791,9.335s7.3791-4.0007,7.3791-9.335c0-3.3784-1.3336-5.3343-4.0007-8.0014 c-2.6671,2.6671-10.6686,6.0455-10.6686,7.3791L41.1209,26.8135L41.1209,26.8135z"></path>
                      <path d="M47.25,26.5c0,0.7143-0.5357,1.25-1.25,1.25s-1.25-0.5357-1.25-1.25s0.5357-1.25,1.25-1.25S47.25,25.7857,47.25,26.5"></path>
                      <path d="M52.25,26.5c0,0.7143-0.5357,1.25-1.25,1.25s-1.25-0.5357-1.25-1.25s0.5357-1.25,1.25-1.25S52.25,25.7857,52.25,26.5"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M46.633,31.5332 c1.1558,0.6223,2.5782,0.6223,3.734,0"></path>
                      <path d="M22.25,26.5c0,0.7143-0.5357,1.25-1.25,1.25s-1.25-0.5357-1.25-1.25s0.5357-1.25,1.25-1.25S22.25,25.7857,22.25,26.5"></path>
                      <path d="M27.25,26.5c0,0.7143-0.5357,1.25-1.25,1.25s-1.25-0.5357-1.25-1.25s0.5357-1.25,1.25-1.25S27.25,25.7857,27.25,26.5"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.633,31.5332 c1.1558,0.6223,2.5782,0.6223,3.734,0"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M26.5003,60.2v-1.7333 C26.5003,56,29.0021,54,31.5039,54c2.9751,2.4667,5.9502,2.4667,8.9929,0c2.5017,0,5.0035,2,5.0035,4.4667V60.2"></path>
                      <path d="M38.7983,45.7015c0.0333,0.4958-0.3417,0.9247-0.8377,0.958c-0.4959,0.0333-0.9249-0.3417-0.9582-0.8375 s0.3417-0.9247,0.8377-0.958c0.0201-0.0014,0.0402-0.002,0.0604-0.002C38.3801,44.8465,38.7818,45.2221,38.7983,45.7015z"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M34.6642,49.1857 c0.7749,0.6425,1.8974,0.6425,2.6723,0"></path>
                      <path d="M34.1001,44.862c0.0201,0,0.0403,0.0007,0.0604,0.002c0.4959,0.0333,0.871,0.4622,0.8377,0.958 s-0.4623,0.8707-0.9582,0.8375c-0.4959-0.0333-0.871-0.4622-0.8377-0.958C33.2188,45.2221,33.6205,44.8465,34.1001,44.862z"></path>
                      <path fill="none" stroke="#000000" stroke-miterlimit="10" stroke-width="1.6" d="M42.5496,45.2683 c0.0078,0.141,0.0117,0.283,0.0118,0.4261c0.1437,3.7311-2.758,6.8753-6.4886,7.031c-3.7306-0.1557-6.6322-3.2999-6.4885-7.031 c0-0.0952,0.0017-0.1899,0.0052-0.2841"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M33.6358,42.2716 c0.4694,3.3631,4.487-0.8706,4.487-0.8706c0.5491,1.5737,4.4254,3.8674,4.4254,3.8674c1.0324-0.9557,0.5259-2.8525,0.3721-3.5136 c-0.5106-2.7127-3.0794-4.5325-5.8079-4.1144c-0.3436,0.0276-0.6888,0.0276-1.0324,0c-2.2709-0.3369-6.03-0.1483-7.12,4.6433 c-0.5317,2.3382,0.624,2.9844,0.624,2.9844S33.348,40.2093,33.6358,42.2716z"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="M46.2565,41.1188c2.6973,0.8481,5.4076,0.1413,8.1601-2.1202c3.2918,0,6.5836,2.6671,6.5836,5.9566V60"></path>
                      <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="M11.0003,60V44.9552c0-3.2895,3.2918-5.9566,6.5836-5.9566c2.6822,2.2539,5.3643,2.9634,8.0751,2.1288"></path>
                    </g>
                  </g>
                </svg>
              </span>
              <h1 class="text-orange-500 text-lg figtree-bold">Parenting</h1>
            </div>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="/profil" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Babies</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/organisasi" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Toddlers</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/pejabat" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Kids</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/pejabat" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Teens</p>
                  </a>
                </li>

              </ul>
            </div>

          </div>

          <!-- activities -->
          <div class="">
            <div class="flex space-x-1 items-center">
              <span class="w-6 h-6">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 504 504" xml:space="preserve" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <circle style="fill:#324A5E;" cx="252" cy="252" r="252"></circle>
                    <polygon style="fill:#2B3B4E;" points="361.3,409.5 373.3,386.6 349.2,386.6 "></polygon>
                    <polygon style="fill:#E6E9EE;" points="332.2,354.4 349.2,386.6 373.3,386.6 390.3,354.4 "></polygon>
                    <rect x="332.2" y="156.8" style="fill:#54C0EB;" width="58.1" height="197.5"></rect>
                    <path style="fill:#FFFFFF;" d="M370.9,94.5h-19.4l0,0c-10.7,0-19.4,8.7-19.4,19.4v19.7h19.4h19.4h19.4v-19.7 C390.3,103.2,381.6,94.5,370.9,94.5L370.9,94.5z"></path>
                    <g>
                      <rect x="332.2" y="133.5" style="fill:#F1543F;" width="58.1" height="23.3"></rect>
                      <rect x="174" y="94.5" style="fill:#F1543F;" width="11.2" height="53.1"></rect>
                    </g>
                    <g>
                      <rect x="185.2" y="94.5" style="fill:#FF7058;" width="11.2" height="53.1"></rect>
                      <path style="fill:#FF7058;" d="M164.6,96.1v51.4h9.4v-53h-7.8C165.3,94.5,164.6,95.2,164.6,96.1z"></path>
                    </g>
                    <rect x="196.4" y="94.5" style="fill:#F1543F;" width="11.2" height="53.1"></rect>
                    <path style="fill:#FF7058;" d="M215.4,94.5h-7.8v53.1h9.4V96.2C217,95.2,216.3,94.5,215.4,94.5z"></path>
                    <g>
                      <path style="fill:#FFD05B;" d="M243.7,171.7c-1.2-13.6-12.6-24.1-26.2-24.1h-53.2c-13.7,0-25.1,10.5-26.2,24.1l-6.7,59.4h119.1 L243.7,171.7z"></path>
                      <path style="fill:#FFD05B;" d="M113.8,385.6c-1.1,12.8,9,23.9,21.9,23.9h110.2c12.9,0,23-11,21.9-23.9l-6.7-59.6H120.5L113.8,385.6 z"></path>
                    </g>
                    <polygon style="fill:#4CDBC4;" points="131.2,231.1 120.5,326 261.1,326 250.4,231.1 "></polygon>
                    <circle style="fill:#2C9984;" cx="190.8" cy="278.5" r="30.8"></circle>
                    <path style="fill:#84DBFF;" d="M355.8,339h-9.5c-0.9,0-1.6-0.7-1.6-1.6V173.9c0-0.9,0.7-1.6,1.6-1.6h9.5c0.9,0,1.6,0.7,1.6,1.6 v163.5C357.4,338.2,356.7,339,355.8,339z"></path>
                  </g>
                </svg>
              </span>
              <h1 class="text-green-500 text-lg figtree-bold">Activities</h1>
            </div>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="{{ url('activities/') }}" class="figtree-reguler flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Activities</p>
                  </a>
                </li>
                @foreach($categories as $c)
                @if($c->slug != 'activities')
                <li>
                  <a href="{{ url('activities/'.$c->slug) }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>{{ $c->name }}</p>
                  </a>
                </li>
                @endif
                @endforeach

              </ul>
            </div>

          </div>

          <!-- babynames -->
          <div class="">
            <div class="flex space-x-1 items-center">
              <span class="w-6 h-6">
                <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path d="M101.35 68.63h-74.7c-8.05 0-14.64 6.34-14.64 14.1c0 7.75 6.59 14.1 14.64 14.1h74.7c8.05 0 14.64-6.34 14.64-14.1c.01-7.76-6.58-14.1-14.64-14.1z" fill="#e59600"> </path>
                    <path d="M103.76 32.78c-9.61-14.62-22-19.62-40-19.62s-30.39 4.99-40 19.62c-7.04 10.72-8.74 27.57-6.57 44.93c2.09 16.69 3.82 25.85 14.18 35.2c9 8.12 21.22 9.87 31.7 9.87H64.45c10.48 0 22.71-1.75 31.7-9.87c10.36-9.35 12.09-18.51 14.18-35.2c2.17-17.36.47-34.22-6.57-44.93z" fill="#ffca28"> </path>
                    <path d="M78.65 34.38c.14-.15.28-.29.42-.44c.1-.11.2-.23.3-.34c.23-.27.45-.54.66-.82l.09-.12c.2-.27.38-.55.56-.84c.05-.08.1-.17.15-.25c.17-.29.34-.58.5-.89c.03-.05.05-.09.07-.14c.38-.75.71-1.56.98-2.41l.03-.09c.55-1.77.87-3.74.87-5.96c0-4.44-1.6-7.95-4.04-10.6c-.03-.03-.05-.05-.07-.08c-.19-.2-.39-.4-.59-.6l-.12-.12a14.326 14.326 0 0 0-.72-.64c-.2-.17-.4-.33-.6-.49c-.05-.04-.1-.07-.14-.11l-.66-.48c-.04-.02-.07-.05-.11-.07c-.8-.54-1.63-1.02-2.49-1.43c-.03-.02-.07-.03-.1-.05c-.25-.12-.5-.23-.75-.34l-.23-.1c-.22-.09-.44-.18-.66-.26c-.08-.03-.17-.06-.25-.09c-.21-.08-.42-.15-.62-.22l-.27-.09c-.21-.07-.41-.13-.62-.19c-.09-.03-.18-.05-.28-.08c-.21-.06-.42-.11-.63-.16l-.26-.06c-.23-.05-.46-.1-.68-.15c-.07-.01-.14-.03-.21-.04c-.59-.13-1.18-.22-1.77-.29c-.08-.01-.16-.01-.24-.02c-.21-.02-.41-.04-.62-.05c-.12-.01-.23-.01-.35-.02c-.17-.01-.33-.02-.49-.02c-.13 0-.26-.01-.4-.01c-.09 0-.18-.01-.26-.01h-.1c-.43 0-.86.02-1.28.05c-.08.01-.16.01-.24.02c-.43.04-.85.08-1.25.15c-4.91.8-8.88 3.38-11.36 5.9c-1.49 1.51-2.44 3-2.73 4.07h.01c3.18-.81 7.29-1.52 11.87-1.76c6.2-.43 11.38 3.1 11.13 8.52c-.03.65-.11 1.26-.22 1.83l-.03.17c-.05.22-.11.44-.17.65c-.03.1-.06.2-.08.29c-.06.18-.12.36-.19.54c-.04.11-.09.22-.14.33c-.07.16-.14.31-.21.45c-.06.12-.12.23-.19.34c-.07.13-.15.26-.23.38c-.08.12-.17.24-.25.36c-.07.1-.14.2-.22.3c-.13.16-.27.31-.41.45c-.04.04-.08.09-.12.13c-.19.19-.39.36-.6.53c-.04.03-.09.06-.13.09a6.3 6.3 0 0 1-.53.37c-.06.03-.11.07-.17.1c-.18.11-.36.21-.54.3c-.06.03-.11.06-.17.08c-.19.09-.39.18-.6.26c-.04.02-.09.04-.14.05c-.23.09-.46.17-.7.24c-.02.01-.04.01-.06.02c-1.08.32-2.24.46-3.42.46c-3.56 0-7.25-1.32-9.37-3.21a.96.96 0 0 0-.64-.25c-.05 0-.1.02-.14.03c-.04.01-.09.01-.13.03c-.06.02-.12.04-.18.07c-.1.05-.18.11-.26.18c-.02.02-.03.04-.05.06c-.07.08-.13.18-.18.28c-.01.02-.01.03-.02.05c-.05.13-.08.28-.06.44c.3 3.02 2.2 6.8 6.72 9.64c4.3 2.71 13.35 2.74 19.79-1.67l.18-.12c.19-.14.39-.28.58-.42c.08-.06.17-.13.25-.2c.28-.22.55-.45.81-.69l.39-.36c.14-.11.26-.24.38-.36z" fill="#543930"> </path>
                    <radialGradient id="IconifyId17ecdb2904d178eab5731" cx="63.428" cy="87.903" r="35.535" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse">
                      <stop offset=".699" stop-color="#6d4c41" stop-opacity="0"> </stop>
                      <stop offset="1" stop-color="#6d4c41"> </stop>
                    </radialGradient>
                    <path d="M78.65 34.38c.14-.15.28-.29.42-.44c.1-.11.2-.23.3-.34c.23-.27.45-.54.66-.82l.09-.12c.2-.27.38-.55.56-.84c.05-.08.1-.17.15-.25c.17-.29.34-.58.5-.89c.03-.05.05-.09.07-.14c.38-.75.71-1.56.98-2.41l.03-.09c.55-1.77.87-3.74.87-5.96c0-4.44-1.6-7.95-4.04-10.6c-.03-.03-.05-.05-.07-.08c-.19-.2-.39-.4-.59-.6l-.12-.12a14.326 14.326 0 0 0-.72-.64c-.2-.17-.4-.33-.6-.49c-.05-.04-.1-.07-.14-.11l-.66-.48c-.04-.02-.07-.05-.11-.07c-.8-.54-1.63-1.02-2.49-1.43c-.03-.02-.07-.03-.1-.05c-.25-.12-.5-.23-.75-.34l-.23-.1c-.22-.09-.44-.18-.66-.26c-.08-.03-.17-.06-.25-.09c-.21-.08-.42-.15-.62-.22l-.27-.09c-.21-.07-.41-.13-.62-.19c-.09-.03-.18-.05-.28-.08c-.21-.06-.42-.11-.63-.16l-.26-.06c-.23-.05-.46-.1-.68-.15c-.07-.01-.14-.03-.21-.04c-.59-.13-1.18-.22-1.77-.29c-.08-.01-.16-.01-.24-.02c-.21-.02-.41-.04-.62-.05c-.12-.01-.23-.01-.35-.02c-.17-.01-.33-.02-.49-.02c-.13 0-.26-.01-.4-.01c-.09 0-.18-.01-.26-.01h-.1c-.43 0-.86.02-1.28.05c-.08.01-.16.01-.24.02c-.43.04-.85.08-1.25.15c-4.91.8-8.88 3.38-11.36 5.9c-1.49 1.51-2.44 3-2.73 4.07h.01c3.18-.81 7.29-1.52 11.87-1.76c6.2-.43 11.38 3.1 11.13 8.52c-.03.65-.11 1.26-.22 1.83l-.03.17c-.05.22-.11.44-.17.65c-.03.1-.06.2-.08.29c-.06.18-.12.36-.19.54c-.04.11-.09.22-.14.33c-.07.16-.14.31-.21.45c-.06.12-.12.23-.19.34c-.07.13-.15.26-.23.38c-.08.12-.17.24-.25.36c-.07.1-.14.2-.22.3c-.13.16-.27.31-.41.45c-.04.04-.08.09-.12.13c-.19.19-.39.36-.6.53c-.04.03-.09.06-.13.09a6.3 6.3 0 0 1-.53.37c-.06.03-.11.07-.17.1c-.18.11-.36.21-.54.3c-.06.03-.11.06-.17.08c-.19.09-.39.18-.6.26c-.04.02-.09.04-.14.05c-.23.09-.46.17-.7.24c-.02.01-.04.01-.06.02c-1.08.32-2.24.46-3.42.46c-3.56 0-7.25-1.32-9.37-3.21a.96.96 0 0 0-.64-.25c-.05 0-.1.02-.14.03c-.04.01-.09.01-.13.03c-.06.02-.12.04-.18.07c-.1.05-.18.11-.26.18c-.02.02-.03.04-.05.06c-.07.08-.13.18-.18.28c-.01.02-.01.03-.02.05c-.05.13-.08.28-.06.44c.3 3.02 2.2 6.8 6.72 9.64c4.3 2.71 13.35 2.74 19.79-1.67l.18-.12c.19-.14.39-.28.58-.42c.08-.06.17-.13.25-.2c.28-.22.55-.45.81-.69l.39-.36c.14-.11.26-.24.38-.36z" fill="url(#IconifyId17ecdb2904d178eab5731)"> </path>
                    <path d="M69.21 82.71a1.63 1.63 0 0 0-.42-.11h-9.3c-.14.02-.28.05-.42.11c-.84.34-1.31 1.22-.91 2.14c.4.93 2.25 3.54 5.98 3.54s5.58-2.61 5.98-3.54c.39-.93-.07-1.8-.91-2.14z" fill="#e59600"> </path>
                    <g fill="#404040">
                      <ellipse cx="42.27" cy="76.92" rx="6.48" ry="6.71"> </ellipse>
                      <ellipse cx="85.99" cy="76.92" rx="6.48" ry="6.71"> </ellipse>
                    </g>
                    <path d="M73.46 96.64c-3.6 2.14-15.4 2.14-18.99 0c-2.07-1.23-4.18.65-3.32 2.53c.84 1.85 7.28 6.13 12.85 6.13c5.56 0 11.92-4.28 12.76-6.13c.85-1.88-1.24-3.76-3.3-2.53z" fill="#795548"> </path>
                  </g>
                </svg>
              </span>
              <h1 class="text-sky-500 text-lg figtree-bold">Baby names</h1>
            </div>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="/baby-name" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Browse All Baby Names</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/baby-name?religion=&origin=&country=&gender=2') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Top Girl Names</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/baby-name?religion=&origin=&country=&gender=1') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Top Boy Names</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/balai-upt" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Trending Names</p>
                  </a>
                </li>
              </ul>
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>