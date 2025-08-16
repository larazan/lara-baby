<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Babyname;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Image;
use Intervention\Image\Typography\FontFactory;
use Intervention\Image\Colors\Rgb\Color;
use Intervention\Image\Exceptions\NotFoundException;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ImageDownloadController extends Controller
{
    //
    const CHARACTERS_PER_LINE = 50;
    //
    public function generateAndDownload($slug)
    {
        $babyname = Babyname::select([
            'babynames.id',
            'babynames.slug',
            'babynames.name',
            'babynames.meaning',
            'babynames.gender_id',
            'babynames.country_id',
            'babynames.religion_id',
            'babynames.origin_id',
            'babynames.locale',
            'babynames.status',
            'religions.name as religionName',
            'origins.name as originName',
        ])
        ->leftJoin('religions', 'babynames.religion_id', '=', 'religions.id')
        ->leftJoin('origins', 'babynames.origin_id', '=', 'origins.id')
        ->where('babynames.slug', '=', $slug)
        ->where('babynames.status', 'active')
        ->first();
        
        switch ($babyname->gender_id) {
            case 1:
                $gender = 'Male';
                $kelamin = 'Laki laki';
                break;
            case 2:
                $gender = 'Female';
                $kelamin = 'Perempuan';
                break;
            default:
                $gender = 'Unisex';
                $kelamin = 'Unisex';
                break;
        }

        if ($babyname->origin_id) {
            $origin = 'of ' . $babyname->origin->name . ' origin';
            $originID = ' yang berasal dari ' . $babyname->origin->name;
        } else {
            $origin = null;
            $originID = null;
        }

        // Get the text from the request (or use a default)
        if ($babyname->locale == 'en') {
            $title = 'The name '. strtoupper($babyname->name) . ' is primarily a ' . $gender . ' name ' . $origin . ' and have ' . $babyname->count() . ' letters that means ' . $babyname->meaning .'.';
        } 

        if($babyname->locale == 'id') {
            $title = 'Nama '. strtoupper($babyname->name) . ' cocok untuk bayi berjenis kelamin ' . $kelamin . $originID . ' dan memiliki jumlah huruf sebanyak ' . $babyname->count() . ' huruf yang mempunyai arti ' . $babyname->meaning .'.';
        }
        
        $text = wordwrap($title, self::CHARACTERS_PER_LINE);
        // $oriPath = 'template/social-share-template.png';
        $oriPath = 'template/name-template.png';

        // if (storage_path($oriPath)) {
        //     return "file existed";
        // } else {
        //     return "file not exist";
        // }
        // dd($oriPath);

        // create image manager with desired driver
        $manager = new ImageManager(Driver::class);

        // read image from file system
        // $img = $manager->read(public_path('images/social-share-template.png'));
        // if (storage_path($oriPath)) {
        $img = $manager->read(public_path($oriPath));
        // }
        // Generate the image
        $img->text($text, 340, 180, function (FontFactory $font) {
            $font->filename(public_path('fonts/Roboto-Medium.ttf'));
            $font->size(16);
            $font->color('#161e2e');
            // $font->stroke('222', 1);
            $font->align('center');
            $font->valign('middle');
            $font->lineHeight(1.7);
            $font->wrap(750);
        });

        // $path = 'temp/';
        // if (!File::isDirectory($path)) {
        //     File::makeDirectory($path, 0777, true, true);
        // }
        // // Generate a unique filename
        // $filename = 'temp_image_' . time() . '.png';
        // $tempPath = $path . $filename;

        // Save the image to the local storage (temporary)
        // $img->save($tempPath);

        // Download the image
        // $filePath = public_path($tempPath);

        // return response()->download($filePath)->deleteFileAfterSend(true);

        // return 'file downloaded!';

        // Generate and save the final image
        $filename = 'temp_image_' . time() . '.png';
        $tempPath = 'temp/' . $filename;
        Storage::disk('local')->put($tempPath, $img->encodeByMediaType('image/png'));

        return Storage::disk('local')->download($tempPath, $filename, [], 'inline');

    }

    public function generateAndDownloadOnce($factId)
    {
        // Define image properties
        $imageWidth = 1000;
        $imageHeight = 1500;
        $padding = 30; // Left padding for the text
        $lineHeight = 1.6; // Line height multiplier
        $fontSize = 30;
        $textWidthLimit = 750; // Text wrapping width limit

        // --- NEW: Define a background color for the text ---
        $textBackgroundColor = '#ffffff80'; // A semi-transparent white

        $uuid = $factId;
        $fact = DB::table('facts')->select(['id', 'uuid', 'title', 'original', 'status', DB::raw('CHAR_LENGTH(title) as beta')])->where('uuid', $uuid)->where('status', 'active')->first();

        $title = $fact->title;
        // Split the text into lines based on the wordwrap function's output
        $lines = explode("\n", wordwrap($title, self::CHARACTERS_PER_LINE));
        $oriPath = $fact->original;

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // read image from file system
        $img = $manager->read(public_path('storage/' . $oriPath));

        // Calculate total text height to center it vertically
        $totalTextHeight = count($lines) * ($fontSize * $lineHeight);
        $startY = ($imageHeight / 2) - ($totalTextHeight / 2);

        // --- Loop through each line to add background and text ---
        foreach ($lines as $index => $line) {
            $currentY = $startY + ($index * $fontSize * $lineHeight);

            // Get the dimensions of the current line of text
            $textBlock = $img->text($line, $padding, $currentY, function (FontFactory $font) use ($fontSize, $textWidthLimit) {
                $font->filename(public_path('fonts/Roboto-Bold.ttf'));
                $font->size($fontSize);
                $font->wrap($textWidthLimit);
            });

            // --- Draw the background rectangle before the text ---
            $img->drawRectangle(
                $padding, // x1
                $currentY - ($fontSize * $lineHeight / 2), // y1
                $padding + $textBlock->width(), // x2 (width of the current line)
                $currentY + ($fontSize * $lineHeight / 2), // y2
                Color::create($textBackgroundColor)
            );

            // Draw the text on top of the rectangle
            $img->text($line, $padding, $currentY, function (FontFactory $font) use ($fontSize) {
                $font->filename(public_path('fonts/Roboto-Bold.ttf'));
                $font->size($fontSize);
                $font->color('#20bd70');
                $font->stroke('#222', 1);
                $font->align('left');
                $font->valign('middle');
                $font->lineHeight(1.6);
            });
        }

        $path = 'temp/';
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        // Generate a unique filename
        $filename = 'temp_image_' . time() . '.png';
        $tempPath = $path . $filename;

        // Save the image
        $img->save($tempPath);

        // Download the image
        $filePath = public_path($tempPath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
