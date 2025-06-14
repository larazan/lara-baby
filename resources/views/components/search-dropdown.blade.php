
    <div class="relative z-20">
        <form action="" method="POST">
            <div class="relative flex w-full items-center">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="h-6 w-6 text-gray-400">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input name="search" type="text" id="search"
                    class="block w-full rounded-lg border border-[#CBD5E1] py-3 md:py-4 pl-14 pr-12 truncate text-gray-primary text-base leading-[25px] focus:ring-0 focus:border-[#CBD5E1] shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)] focus:outline-none focus:border-blue-500 focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500"
                    placeholder="Search name..." />
                <div id="resetSearch" class="absolute right-1 cursor-pointer inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-transparent text-gray-400 h-10 px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </form>

        <div id="content">

        </div>

    </div>


<script>
    $('#search').on('keyup', function() {
        search();
    });

    search();

    $('#resetSearch').on('click', function() {
        $('#search').val('');
        $('#content').empty();
        $('#resetSearch').hide();
    })

    function search() {
        var keyword = $('#search').val();
        $('#resetSearch').hide();
        if (keyword.length >= 3) {
            $.post('{{ route("babyname.search") }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function(data) {
                    table_fact_row(data, keyword);
                    console.log(data);
                    $('#resetSearch').show()
                });
        }
    }

    function table_fact_row(res, keyword) {
        let url = "{{ env('APP_URL') }}";
        let htmlView = '<div class="absolute mt-1 md:mt-2 w-full overflow-hidden rounded-md bg-white border-2 border-slate-700">';
        if (res.data.length <= 0) {
            htmlView += `
            <div class="cursor-pointer py-3 px-3 bg-white hover:bg-slate-100 border">
                <p class="text-sm font-medium text-gray-600">No results for ` + res.data.keyword + `</p>
            </div>`;
        }

        for (let i = 0; i < res.data.length; i++) {
            if (i === 8) {
                break;
            }
            htmlView += `
                <div class="cursor-pointer py-2 md:py-3 px-2 md:px-3 bg-white hover:bg-slate-100 border">
                    <a href="` + url + `/baby-name/` + res.data[i].slug + `">
                    <p class="text-sm font-medium text-gray-600 leading-tight">` + res.data[i].name + `</p>
                    </a>
                </div>`;

        }

        if (res.data.length > 8) {
            htmlView += `
                    <div class="py-2 md:py-3 px-2 md:px-3 bg-white text-center hover:bg-slate-100 border">
                        <a href="` + url + `/categories?search=` + keyword + `">
                        <p class="text-sm font-medium text-gray-600 hover:text-[#20bd70] pally-bold">See all results (` + res.data.length + `)</p>
                        </a>
                    </div>`;
        }

        htmlView += `</div>`;

        $('#content').html(htmlView);
    }
</script>