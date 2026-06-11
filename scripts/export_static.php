<?php

// Simple script to export a static snapshot of the welcome view into /static
// Bootstraps the framework and renders the view.

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Helper: recursive copy
function rcopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while(false !== ($file = readdir($dir))) {
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
    foreach($files as $file) {
        if ($file->isDir()) rmdir($file->getRealPath()); else unlink($file->getRealPath());
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

try {
    $html = view('welcome')->render();
} catch (Exception $e) {
    echo "Error rendering view: " . $e->getMessage() . PHP_EOL;
    exit(1);
}

file_put_contents($staticPath . DIRECTORY_SEPARATOR . 'index.html', $html);

echo "Static export complete. Files written to: $staticPath" . PHP_EOL;
