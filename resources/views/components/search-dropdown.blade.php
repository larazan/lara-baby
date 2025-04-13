
    <div class="relative w-7/12 md:w-6/12 max-w-lg ">
        <form action="" method="POST">
            <div class="relative flex w-full items-center">
                <input name="search" type="text" id="search"
                    class="block w-full  pr-3 py-2 border rounded-md leading-5 sm:text-sm
                    border-gray-300 bg-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500"
                    placeholder="Search fact or fun" />
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
            $.post('{{ route("fact.search") }}', {
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
                    <a href="` + url + `/fact/` + res.data[i].uuid + `">
                    <p class="text-sm font-medium text-gray-600 leading-tight">` + res.data[i].title + `</p>
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