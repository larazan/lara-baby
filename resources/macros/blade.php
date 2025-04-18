<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('md', function ($expression) {
    return "<?php echo md_to_html($expression); ?>";
});


Blade::directive('formGroup', function ($expression) {
    return "<div class=\"form-group<?php echo \$errors->has($expression) ? ' has-error' : '' ?>\">";
});

Blade::directive('endFormGroup', function ($expression) {
    return '</div>';
});

Blade::directive('title', function ($expression) {
    return "<?php \$title = $expression ?>";
});

Blade::directive('shareImage', function ($expression) {
    return "<?php \$shareImage = $expression ?>";
});

Blade::directive('canonical', function ($expression) {
    return "<?php \$canonical = $expression ?>";
});