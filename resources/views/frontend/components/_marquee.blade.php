<div class="flex items-center h-10 bg-gray-100 w-full pl-4 lg:px-4 lg:w-auto dark:text-white dark:bg-black">
    <span class="navbar-breaking-title bg-purple-500 dark:bg-dark-1 font-bold text-[8px] text-white p-2 rounded leading-none relative z-10">
        HEADLINE HARI INI
    </span>
    <div class="relative flex-1 w-0 overflow-x-auto overflow-y-hidden flex gap-x-4 px-4 whitespace-nowrap text-sm font-semibold">
    <!--  required classes: marquee inline-flex max-w-full  -->
    <ul class="marquee py-3 inline-flex space-x-4 whitespace-nowrap max-w-full" x-data="Marquee({speed: 0.5, spaceX: 4})">
        <li>
            <a href="" target="none">Update Kasus Diplomat Kemlu Tewas</a>
        </li>
        <li>
            <a href="" target="none">Saudagar Minyak Riza Chalid Tersangka Korupsi</a>
        </li>
        <li>
            <a href="" target="none">Trump Pangkas Tarif Impor RI</a>
        </li>
    </ul>
    </div>
</div>

@push('style')
<style>
    .marquee {
        animation: scrolling var(--marquee-time) linear infinite;
    }

    .marquee:hover {
        animation-play-state: paused;
    }

    @keyframes scrolling {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-1 * var(--marquee-width)));
        }
    }
</style>
@endpush

@push('js')
<script>
    /**
     * See https://stackoverflow.com/a/24004942/11784757
     */
    const debounce = (func, wait, immediate = true) => {
        let timeout
        return () => {
            const context = this
            const args = arguments
            const callNow = immediate && !timeout
            clearTimeout(timeout)
            timeout = setTimeout(function() {
                timeout = null
                if (!immediate) {
                    func.apply(context, args)
                }
            }, wait)
            if (callNow) func.apply(context, args)
        }
    }

    /**
     * Append the child element and wait for the parent's
     * dimensions to be recalculated
     * See https://stackoverflow.com/a/66172042/11784757
     */
    const appendChildAwaitLayout = (parent, element) => {
        return new Promise((resolve, _) => {
            const resizeObserver = new ResizeObserver((entries, observer) => {
                observer.disconnect()
                resolve(entries)
            })
            resizeObserver.observe(element)
            parent.appendChild(element)
        })
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data(
            'Marquee',
            ({
                speed = 1,
                spaceX = 0,
                dynamicWidthElements = false
            }) => ({
                dynamicWidthElements,
                async init() {
                    if (this.dynamicWidthElements) {
                        const images = this.$el.querySelectorAll('img')
                        // If there are any images, make sure they are loaded before
                        // we start cloning them, since their width might be dynamically
                        // calculated
                        if (images) {
                            await Promise.all(
                                Array.from(images).map(image => {
                                    return new Promise((resolve, _) => {
                                        if (image.complete) {
                                            resolve()
                                        } else {
                                            image.addEventListener('load', () => {
                                                resolve()
                                            })
                                        }
                                    })
                                })
                            )
                        }
                    }

                    // Store the original element so we can restore it on screen resize later
                    this.originalElement = this.$el.cloneNode(true)
                    const originalWidth = this.$el.scrollWidth + spaceX * 4
                    // Required for the marquee scroll animation 
                    // to loop smoothly without jumping 
                    this.$el.style.setProperty('--marquee-width', originalWidth + 'px')
                    this.$el.style.setProperty(
                        '--marquee-time',
                        ((1 / speed) * originalWidth) / 100 + 's'
                    )
                    this.resize()
                    // Make sure the resize function can only be called once every 100ms
                    // Not strictly necessary but stops lag when resizing window a bit
                    window.addEventListener('resize', debounce(this.resize.bind(this), 100))
                },
                async resize() {
                    // Reset to original number of elements
                    this.$el.innerHTML = this.originalElement.innerHTML

                    // Keep cloning elements until marquee starts to overflow
                    let i = 0
                    while (this.$el.scrollWidth <= this.$el.clientWidth) {
                        if (this.dynamicWidthElements) {
                            // If we don't give this.$el time to recalculate its dimensions
                            // when adding child nodes, the scrollWidth and clientWidth won't
                            // change, thus resulting in this while loop looping forever
                            await appendChildAwaitLayout(
                                this.$el,
                                this.originalElement.children[i].cloneNode(true)
                            )
                        } else {
                            this.$el.appendChild(
                                this.originalElement.children[i].cloneNode(true)
                            )
                        }
                        i += 1
                        i = i % this.originalElement.childElementCount
                    }

                    // Add another (original element count) of clones so the animation
                    // has enough elements off-screen to scroll into view
                    let j = 0
                    while (j < this.originalElement.childElementCount) {
                        this.$el.appendChild(this.originalElement.children[i].cloneNode(true))
                        j += 1
                        i += 1
                        i = i % this.originalElement.childElementCount
                    }
                },
            })
        )
    })

    Alpine.start()
</script>
@endpush