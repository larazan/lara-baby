

<div class="pt-16 bg-gray-50 flex flex-col justify-center">

  <div 
    class="overflow-hidden bg-[#e6ff00] pl-64" 
    x-data="newsTickerHandler()" 
    @click="state.moving = !state.moving" 
    x-init="init()"
  >
    <ul 
      :style="`transform:translateX(${position}px);padding-left:${offset}px`" 
      class="flex uppercase2 items-center w-full font-semibold max-w-screen whitespace-no-wrap transition-transform duration-300 ease-linear py-3 text-slate-900 text-sm bg-[#e6ff00] leading-tight"
    >
      <template x-for="(headline, index) in headlines.slice(0, visible)" :key="index">
        <li :id="`news-${index}`" class="flex px-16 whitespace-nowrap tracking-widest" x-text="headline"></li>
      </template>
    </ul>
  </div>

</div>

<!-- Dev tools -->
<div id="alpine-devtools" x-data="devtools()" x-show="alpines.length" x-init="start()"></div>

@push('js')
<script>
function newsTickerHandler() {
	return {
		state: {
			moving: true,
		},
		headlines: [],
		position: 0,
		offset: 0,
		speed: 8,
		visible: 10,
		pauseOnNextHeadline: 0,
		init: async function() {
			this.headlines = [
				'Our website is made possible by displaying online advertisement to our visitors. Please consider supporting to us by disabling your ad blocker.', 
				'We charge advertiser instead of our audience. Please whitelist our site to show your support.', 
				'Advertisement is only way to cover our server expenses and keep it FREE.',
				'Please help us continue to provide you with free, quality Apps by turning off your AdBlocker on our site.'
			]
			this.$nextTick(() => {
				this.start()
			})
		},
		start() {
			this.loop = () => {
				const first = document.getElementById('news-0').getBoundingClientRect()
				if (first.x <= -first.width) {
					// Reorder for continuous loop
					const newHeadlines = this.headlines
					newHeadlines.push(newHeadlines.shift())
					this.headlines = newHeadlines
					this.offset = this.offset + Math.abs(first.width)
					this.$nextTick(() => {
						setTimeout(() => {
							requestAnimationFrame(this.loop)
						}, this.pauseOnNextHeadline)
					})
					return
				}
				this.position = this.state.moving ? this.position - this.speed : this.position
				setTimeout(() => {
					requestAnimationFrame(this.loop)
				}, 300) // This should match your duration-300 class
			}
			requestAnimationFrame(this.loop)
		},
	}
}
</script>
@endpush