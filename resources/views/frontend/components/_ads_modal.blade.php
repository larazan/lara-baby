@php
$adv = \App\Models\Advertising::select(['id', 'segment_id', 'title', 'start', 'end', 'url', 'original', 'status'])->where('segment_id', '=', 4)->Active()->whereDate('end', '>', \Carbon\Carbon::today())->first();
@endphp


@if($adv->count() > 0)
<div x-data="{ showModal: true }"  @keydown.escape="showModal = false">
   
    <div class="fixed inset-0 z-50 overflow-hidden  flex items-start top-[10%] md:top-[20%] mb-4 justify-center transform px-4 sm:px-6" x-show="showModal">
         <div
          class="relative bg-white overflow-auto custom-scrollbar max-w-4xl md:w-full w-full md:h-96 max-h-84 rounded shadow-lg"
          @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"       
          >
          
          <section class="ad-container overflow-hidden2 h-full shadow-2xl md:grid md:grid-cols-3">
            
            <div class="ad-img" data-ad-id="{{ $adv->id }}" >
              <img
                alt="adv"
                src="{{ asset('storage/'. $adv->original) }}"
                class="h-52 w-full object-cover md:h-full"
              />
            </div>
            
            <button class="absolute flex top-1 right-1 rounded-full bg-gray-100 px-1 py-1 hover:bg-gray-200 cursor-pointer" @click="showModal = !showModal">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width=3
                stroke="currentColor"
                class="w-5 h-5 text-[#1d494e]"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
            
            <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
              <p class="md:text-2xl font-semibold uppercase md:tracking-widest2 text-black pally-bold">
                This is sample
              </p>

              <h2 class="mt-6 font-black capitalize">
                <span class="text-lg text-black md:text-3xl lg:text-6xl">
                  Take 20% off Your Order
                </span>

                <span class="mt-2 block text-sm text-black">
                  On your next order over $50
                </span>
              </h2>

              <a
                class="ad-link mt-8 inline-block w-full rounded-full bg-black py-4 text-sm font-bold capitalize tracking-widest text-white"
                href="{{ url($adv->url) }}"
                target="_blank"
                data-ad-id="{{ $adv->id }}" 
              >
                Advertise with us
              </a>

              <p class="mt-8 text-xs font-medium uppercase text-gray-600">
                Offer valid until 24th March, 2021 *
              </p>
            </div>
          </section>
        </div>
        </div>
        <div class="opacity-50 fixed inset-0 z-40 bg-black" x-show="showModal"></div>
</div>
@endif

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to track ad views
        function trackAdView(adId) {
            fetch('/api/ads/' + adId + '/view', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(response => response.json())
              .then(data => console.log('Ad view tracked:', data))
              .catch(error => console.error('Error tracking ad view:', error));
        }

        // Function to track ad clicks
        function trackAdClick(adId) {
            fetch('/api/ads/' + adId + '/click', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(response => response.json())
              .then(data => console.log('Ad click tracked:', data))
              .catch(error => console.error('Error tracking ad click:', error));
        }

        // Attach view tracking when ad is in viewport (more advanced, omitted for brevity)
        // For simplicity, we'll track on DOMContentLoaded for now, assuming it's visible.
        // A more robust solution would use Intersection Observer API.
        document.querySelectorAll('.ad-container img').forEach(img => {
            const adLink = img.closest('.ad-img');
            if (adLink) {
                const adId = adLink.dataset.adId;
                trackAdView(adId); // Track view when the ad image loads
            }
        });

        // Attach click tracking
        document.querySelectorAll('.ad-link').forEach(link => {
            link.addEventListener('click', function(event) {
                const adId = this.dataset.adId;
                trackAdClick(adId);
                // Optionally, you might want to prevent default and redirect manually
                // to ensure the fetch request completes before navigation.
                // event.preventDefault();
                // setTimeout(() => window.open(this.href, '_blank'), 100);
            });
        });
    });
</script>
@endpush