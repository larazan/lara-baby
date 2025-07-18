<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PregnancyController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SearchNameController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\BabynameController;
use App\Http\Controllers\Frontend\ActivityController;
use App\Http\Controllers\Frontend\GenerateArticleController;
use App\Http\Controllers\Frontend\ToolController;

use App\Http\Controllers\SitemapController;

// Livewire
use App\Livewire\Admin\AdvertisingIndex;
use App\Livewire\Admin\AdvSegmentIndex;
use App\Livewire\Admin\BabynameIndex;
use App\Livewire\Admin\CategoryArticleIndex;
use App\Livewire\Admin\CategoryIndex;
use App\Livewire\Admin\ContactIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\FaqIndex;
use App\Livewire\Admin\ImportName;
use App\Livewire\Admin\ImportFullname;
use App\Livewire\Admin\LocaleIndex;
use App\Livewire\Admin\NamelistIndex;
use App\Livewire\Admin\OriginIndex;
use App\Livewire\Admin\PermissionIndex;
use App\Livewire\Admin\RoleIndex;
use App\Livewire\Admin\ReligionIndex;
use App\Livewire\Admin\SettingIndex;
use App\Livewire\Admin\UserIndex;
use App\Livewire\Admin\NewsletterIndex;
use App\Models\Religion;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function () {
    // home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // babyname
    Route::get('/baby-name', [BabynameController::class, 'index'])->name('baby-name');
    Route::get('/baby-name/letter/{letter}', [BabynameController::class, 'letter']);
    // article
    Route::get('/articles/{category?}', [ArticleController::class, 'index'])->name('articles');
    // activity
    Route::get('/activities/{slug?}', [ActivityController::class, 'index'])->name('activities');

    // test
    Route::get('/welcome', function() {
        return view('welcome');
    })->name('welcome');
});


// Route::get('/', function () {
//     return view('welcome');
// });

// SITEMAP
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/sitemap-initial', [SitemapController::class, 'index']);
    Route::get('/sitemap-article', [SitemapController::class, 'article']);
    Route::get('/sitemap-generate', [SitemapController::class, 'createSitemap']);
});

// activity

Route::get('/activity/{slug}', [ActivityController::class, 'show']);
// Route::post('/activities', [ActivityController::class, 'index'])->name('activity.submit');

// pregnancy
Route::get('/pregnancy', [PregnancyController::class, 'index']);
Route::get('/pregnancy/tracker/{trimester}', [PregnancyController::class, 'tracker']);
Route::get('/pregnancy/tracker/{trimester}/{slug}', [PregnancyController::class, 'show']);

// babyname
Route::get('/baby-name/{slug}', [BabynameController::class, 'show']);

// Route::get('/baby-name/origin/{origin}', [BabynameController::class, 'origin']);
// Route::get('/baby-name/religion/{religion}', [BabynameController::class, 'religion']);
// Route::get('/baby-name/gender/{gender}', [BabynameController::class, 'gender']);

// Generate
Route::get('generate-article', [GenerateArticleController::class, 'index']);

Route::get('search', SearchController::class)->name('search');
Route::get('search-name', SearchNameController::class)->name('search-name');
Route::post('/babyname/search', [SearchController::class, 'index'])->name('babyname.search');
Route::get('/api/search', [SearchController::class, 'searchTwo'])->name('api.search');
// Route::get('/search-dropdown', function () {
//     return view('search-dropdown');
// });

// article
Route::get('/article/{slug}', [ArticleController::class, 'show']);
Route::get('articles/tag/{tag}', [ArticleController::class, 'showByTag']);

// Route::get('/categories/detail', [CategoryController::class, 'detail']);
// Route::get('/categories/series', [CategoryController::class, 'series']);

Route::get('unsubscribe', [NewsletterController::class, 'unsubscribe']);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/advertise', [PageController::class, 'advertising'])->name('advertise');
Route::get('/policy', [PageController::class, 'policy'])->name('privacy-policy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// tools
Route::get('/baby-height-calc', [ToolController::class, 'babyHeightCalc'])->name('baby-height-calc');
Route::get('/conception-date', [ToolController::class, 'conceptionDate'])->name('conception-date');
Route::get('/ovulation-calc', [ToolController::class, 'ovulationCalc'])->name('ovulation-calc');
Route::get('/pregnancy-weight-calc', [ToolController::class, 'pregnancyWeightCalc'])->name('pregnancy-calc');


// Admin
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');

    Route::prefix('article')->name('articles.')->group(function () {
        Route::get('create', \App\Livewire\Admin\Article\Create::class)->name('create');
        Route::get('all', \App\Livewire\Admin\Article\Index::class)->name('all');
        Route::get('{articleId}/update', \App\Livewire\Admin\Article\Edit::class)->name('edit');
    });

    Route::prefix('activity')->name('activities.')->group(function () {
        Route::get('create', \App\Livewire\Admin\Activity\Create::class)->name('create');
        Route::get('all', \App\Livewire\Admin\Activity\Index::class)->name('all');
        Route::get('{activityId}/update', \App\Livewire\Admin\Activity\Edit::class)->name('edit');
    });

    Route::get('adv-segments', AdvSegmentIndex::class)->name('adv-segments.index');
    Route::get('advertisings', AdvertisingIndex::class)->name('advertisings.index');

    Route::get('babynames', BabynameIndex::class)->name('babynames.index');
    Route::get('import', ImportName::class)->name('import');
    Route::get('import-full', ImportFullname::class)->name('import-full');
    Route::get('locales', LocaleIndex::class)->name('locales.index');
    Route::get('namelist', NamelistIndex::class)->name('namelist.index');
    Route::get('category-article', CategoryArticleIndex::class)->name('category-article.index');
    Route::get('contacts', ContactIndex::class)->name('contacts.index');
    Route::get('categories', CategoryIndex::class)->name('categories.index');
    Route::get('faqs', FaqIndex::class)->name('faqs.index');
    Route::get('religions', ReligionIndex::class)->name('religions.index');
    Route::get('settings', SettingIndex::class)->name('settings.index');
    Route::get('newsletters', NewsletterIndex::class)->name('newsletters.index');
    Route::get('origins', OriginIndex::class)->name('origins.index');
    Route::get('users', UserIndex::class)->name('users.index');

    Route::get('permissions', PermissionIndex::class)->name('permissions.index');
    Route::get('roles', RoleIndex::class)->name('roles.index');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// unsubscribe
Route::get('unsubscribe/{email?}/{hash?}', [NewsletterController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('newsletter/submit', [NewsletterController::class, 'blogPostNewsletter'])->name('newsletter.submit');

// view email
// Route::get('/mailable', function () {
//     $news = App\Models\Newsletter::get();
 
//     return new App\Mail\Newsletter($news);
// });

