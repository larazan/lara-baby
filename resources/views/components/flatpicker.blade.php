<div wire:ignore x-data="datepicker(@entangle($attributes->wire('model')))">
    <div class="flex flex-col">
        <div class="flex items-center gap-2">
            <input type="text" x-ref="myDatepicker" x-model="selectedDate" />
        </div>
    </div>
</div>

@push('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endpush


@push('js') 

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('datepicker', (model) => ({
            selectedDate: model,
            init(){
                flatpickr(this.$refs.myDatepicker, {})
            },
            // reset(){
            //     this.selectedDate = null;
            // }
        }))
    })
</script>

@endpush