<?php

// Simple script to export a static snapshot of the welcome view into /static
// Bootstraps the framework and renders the view.

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Helper: recursive copy
function rcopy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                rcopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

$staticPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'static';
if (is_dir($staticPath)) {
    // remove recursively
    $it = new RecursiveDirectoryIterator($staticPath, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        if ($file->isDir()) rmdir($file->getRealPath());
        else unlink($file->getRealPath());
    }
    rmdir($staticPath);
}
mkdir($staticPath, 0755, true);

$publicPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public';
if (is_dir($publicPath)) {
    rcopy($publicPath, $staticPath);
}

// Make asset() generate relative URLs
Illuminate\Support\Facades\Config::set('app.url', '');
Illuminate\Support\Facades\URL::forceRootUrl('');

$pages = [
    '' => 'welcome',
    'shop' => 'shop.index',
    'contacts' => 'contacts.index',
    'help' => 'help.index',
    'shirt-collections' => 'shirt_collections.index',
];

foreach ($pages as $path => $view) {
    if (!view()->exists($view)) {
        echo "Skipping missing view: $view" . PHP_EOL;
        continue;
    }

    try {
        $html = view($view)->render();
    } catch (Exception $e) {
        echo "Error rendering view $view: " . $e->getMessage() . PHP_EOL;
        continue;
    }

    // Determine output directory
    $outDir = $staticPath;
    if ($path !== '') {
        $outDir = $staticPath . DIRECTORY_SEPARATOR . $path;
        if (!is_dir($outDir)) mkdir($outDir, 0755, true);
    }

    // Compute base href for this page so relative paths resolve on GitHub Pages
    $depth = 0;
    if ($path !== '') {
        $depth = count(explode('/', trim($path, '/')));
    }
    $baseHref = ($depth === 0) ? './' : str_repeat('../', $depth);

// Insert a base tag to ensure relative paths resolve when served under a repo subpath
$html = preg_replace('/<head(.*?)>/i', '<head$1>\n    <base href="./">', $html, 1);

// Convert absolute root-relative URLs ("/path") to relative ("./path") so GitHub Pages project sites work
$html = preg_replace('#(src|href)=("|\')/#i', '$1=$2./', $html);

file_put_contents($staticPath . DIRECTORY_SEPARATOR . 'index.html', $html);

echo "Static export complete. Files written to: $staticPath" . PHP_EOL;
