<div class="vs jj ttm vl ou uf na">

<!-- Loading -->
<x-loading-indicator />

    <!-- Page header -->
    <div class="je jd jc ii">

        <!-- Left: Title -->
        <div class="ri _y">
            <h1 class="gu teu text-slate-800 font-bold">Comments</h1>
        </div>

        <!-- Right: Actions -->
        <div class="sn am jo az jp ft">

            <!-- Search form -->
            <form class="y">
                <label for="action-search" class="d">Search</label>
                <input wire:model="search" id="action-search" class="s me xq" type="search" placeholder="Search by name">
                <button class="g w j kk" type="submit" aria-label="Search">
                    <svg class="oo sl ub du gq kj ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                        <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                    </svg>
                </button>
            </form>

        </div>

    </div>

    <!-- More actions -->
    <div class="je jd jc ii">

        <!-- Left side -->
        <div class="ri _y">
        
        </div>

        <!-- Right side -->
        <div class="sn am jo az jp ft">

            <!-- Filter button -->
            <select wire:model.live="sort" id="sort" class="a">
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>

            <select wire:model.live="perPage" id="filter" class="a">
                <option value="5">5 Per Page</option>
                <option value="10">10 Per Page</option>
                <option value="15">15 Per Page</option>
            </select>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white bd rounded-sm border border-slate-200 rc">
        <header class="vc vu">
            <h2 class="gh text-slate-800">Comment List<span class="gq gp"></span></h2>
        </header>
        <div x-data="">

            <!-- Table -->
            <div class="lf">
                <table class="ux ou">
                    <!-- Table header -->
                    <thead class="go gh gv text-slate-500 hp co cs border-slate-200">
                        <tr>                    
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">User</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Comment Item</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Type</div>
                            </th>
                            <th class="vi wy w_ vo lm">
                                <div class="gh gt">Date</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm le lr">
                        <!-- Row -->

                        @if ($comments->count() > 0)
                        @foreach ($comments as $comment)
                        <tr>
                            <td class="vi wy w_ vo lm">
                                <div class="gp text-slate-800">{{ $comment->user->name }}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp text-slate-800">{{ $comment->commentable->title ?? $comment->commentable->name ?? 'N/A' }}</div>
                            </td>
                            <td class="vi wy w_ vo lm">
                                <div class="gp ">{{ class_basename($comment->commentable_type) }}</div>
                            </td>

                            <td class="vi wy w_ vo lm">
                                <div>{{ $comment->created_at ?? $comment->created_at->format('d-m-Y') : '' }}</div>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="vi wy w_ vo lm" colspan="8">No records found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    
    {{ $comments->links() }}


</div>
