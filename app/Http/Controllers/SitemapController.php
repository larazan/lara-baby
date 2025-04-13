<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index()
    {
        $sitemap = Sitemap::create()
        ->add(Url::create('/home'))
        ->add(Url::create('/about'))
        ->add(Url::create('/contact'))
        // ->add(Url::create('/categories'))
        ->add(Url::create('/faqs'))
        ->add(Url::create('/terms'))
        ->add(Url::create('/articles'))
        ->add(Url::create('/privacy-policy'));

        $sitemap->writeTofile(public_path('sitemap-initial.xml'));

        return 'Sitemap Created Succesfully';
    }

    public function article()
    {
        $sitemap = Sitemap::create();

        Article::all()->each(function(Article $article) use ($sitemap){
            $sitemap->add(Url::create("/article/{$article->slug}"));
        });

        $sitemap->writeTofile(public_path('sitemap-article.xml'));

        return 'Sitemap article Created Succesfully';
    }

    public function createSitemap()
    {
        // sitemap limit per sitemap
        $sitemapLimit = 50000;

        // items limit per loop
        $itemsLimit = 5000;

        // get total models count from database
        $modelCount = Fact::query()->count();

        // calculate loop count from items limit
        $loopCount = ceil($modelCount / $itemsLimit);

        $processedItemCount = 0;

        // an instance from the sitemap file
        $sitemapIndexNumber = ceil($processedItemCount / $sitemapLimit);
        $sitemapPath = public_path().'/sitemaps-' . $sitemapIndexNumber . '.xml';
        $sitemap = Sitemap::create($sitemapPath);

        // write sitemap starting xml texts
        // $sitemap->startFile();
        $sitemap->writeToFile($sitemapPath);

        // process every loop with using lower memory
        for ($loopIndex=0; $loopIndex < $loopCount; $loopIndex++) { 
            
            $sitemapIndexNumber = ceil($processedItemCount / $sitemapLimit);
            $sitemapPath = public_path(). '/sitemaps-' . $sitemapIndexNumber . '.xml';

            // get models from database with limit
            $facts = Fact::query()
                ->limit($itemsLimit)
                ->offset($loopIndex * $itemsLimit) 
                ->get();

            // process every model to add to sitemap

            foreach ($facts as $fact) {
                $url = Url::create("/fact/" . $fact->uuid . "/" . $fact->slugysh())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setLastModificationDate($fact->created_at)
                    ->setPriority(.9);

                $sitemap->add($url);

                // increase processed item count
                $processedItemCount++;
            }

            // write added items to the file
            // $sitemap->writeAddedItems();
            $sitemap->writeToFile($sitemapPath);

            //  if sitemap reached to the limit, create new sitemap
            if ($processedItemCount >= $sitemapLimit) {
                // write sitemap starting xml text
                $sitemap->finishFile();

                // an instance from the sitemap file
                $sitemapIndexNumber = ceil($processedItemCount / $sitemapLimit);
                $sitemapPath = public_path(). '/sitemaps-' . $sitemapIndexNumber . '.xml';
                $sitemap = Sitemap::create($sitemapPath);

                // write sitemap starting xml texts
                // $sitemap->startFile();
                $sitemap->writeToFile($sitemapPath);
            }
        }

        return 'Sitemap fact Created Succesfully';
    }
}
