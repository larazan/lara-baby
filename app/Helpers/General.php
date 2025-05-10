<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class General
{
    public static function toLowerString(string $string)
    {
        $data = Str::lower($string);
        return $data;
    }
    
    public static function active(mixed $routes, bool $condition = true): string
    {
        return call_user_func_array([app('router'), 'is'], (array) $routes) && $condition ? 'active' : '';
    }

    public static function is_active(mixed $routes): bool
    {
        return (bool) call_user_func_array([app('router'), 'is'], (array) $routes);
    }

    public static function md_to_html(string $markdown): string
    {
        return app(App\Markdown\Converter::class)->toHtml($markdown);
    }

    public static function replace_links(string $markdown): string
    {
        return (new LinkFinder([
            'attrs' => ['target' => '_blank', 'rel' => 'nofollow'],
        ]))->processHtml($markdown);
    }
    
    public static function canonical(string $route, array $params = []): string
    {
        $page = app('request')->get('page');
        $params = array_merge($params, ['page' => $page != 1 ? $page : null]);

        ksort($params);

        return route($route, $params);
    }

    public static function smart_wordwrap($string, $width = 75, $break = "\n") {
        // split on problem words over the line length
        $pattern = sprintf('/([^ ]{%d,})/', $width);
        $output = '';
        $words = preg_split($pattern, $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    
        foreach ($words as $word) {
            if (false !== strpos($word, ' ')) {
                // normal behaviour, rebuild the string
                $output .= $word;
            } else {
                // work out how many characters would be on the current line
                $wrapped = explode($break, wordwrap($output, $width, $break));
                $count = $width - (strlen(end($wrapped)) % $width);
    
                // fill the current line and add a break
                $output .= substr($word, 0, $count) . $break;
    
                // wrap any remaining characters from the problem word
                $output .= wordwrap(substr($word, $count), $width, $break, true);
            }
        }
    
        // wrap the final output
        return wordwrap($output, $width, $break);
    }
    
}