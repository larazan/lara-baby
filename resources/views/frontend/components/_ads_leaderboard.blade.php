@php
$adv = \App\Models\Advertising::select(['id', 'segment_id', 'title', 'start', 'end', 'url', 'original', 'status'])->where('segment_id', '=', 1)->Active()->whereDate('end', '>', \Carbon\Carbon::today())->first();
@endphp

@if($adv->count() > 0)
<div x-data="{ showAd: true }">
<div class="relative flex mb-10 pt-0" x-show="showAd">
    <button class="absolute flex top-0 right-0 rounded2 bg-gray-100 px-1 py-1 hover:bg-gray-200 cursor-pointer" 
        @click="showAd = !showAd"
    >
        <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width=3
        stroke="currentColor"
        class="w-4 h-4 text-[#1d494e]"
        >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12"
        />
        </svg>
    </button>
    <div class="w-full">
        <a href="{{ url($adv->url) }}"
            target="_blank"
            data-ad-id="{{ $adv->id }}"
            class="ad-link"
        >
            <img alt="adv"
                src="{{ asset('storage/'. $adv->original) }}"
                class="w-full h-[90px] object-cover md:h-full" 
            />
        </a>
    </div>
</div>
</div>
@else
<div class="h-28 banner text-gray-600 text-[10px] bg-gray-50 mb-10 dark:bg-black dark:text-white -mx-4 lg:mx-0">
    <span class="text-center upperase block py-1">ADVERTISEMENT</span>
    <div class="banner-inner flex justify-center items-center min-h-[600px] exposer" id="gpt-ad-div-exposer-placeholder"></div>
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
            const adLink = img.closest('.ad-link');
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