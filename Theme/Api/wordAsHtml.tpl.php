<?php declare(strict_types=1);

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Writer\HTML;
use phpOMS\Autoloader;

Autoloader::addPath(__DIR__ . '/../../../../Resources/');

$media = $this->getData('media');

$reader = IOFactory::createReader('Word2007');
$doc    = $reader->load(($media->isAbsolute ? '' : __DIR__ . '/../../../../') . $media->getPath());

$writer = new HTML($doc);

$writer->save('php://output');
