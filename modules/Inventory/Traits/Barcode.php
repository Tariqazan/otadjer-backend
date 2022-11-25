<?php

namespace Modules\Inventory\Traits;

use App\Models\Common\Media;
use App\Traits\Uploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;

trait Barcode
{
    use Uploads;

    public function setBarcode($item, $barcode)
    {
        if ($barcode == false) {
            return;
        }

        $color = [0, 0, 0]; //black

        $generator = new BarcodeGeneratorPNG();

        switch (setting('inventory.barcode_type')) {
            case 0:
                $content = $generator->getBarcode($barcode, $generator::TYPE_CODE_128, 1.8, 30, $color);
                break;
            case 1:
                $content = $generator->getBarcode($barcode, $generator::TYPE_CODE_39, 1.8, 30, $color);
                break;
            case 2:
                $content = $generator->getBarcode($barcode, $generator::TYPE_EAN_13, 1.8, 30, $color);
                break;
        }

        $filename = $item->name . '.png';

        $media = Media::where('directory', $this->getMediaFolder('items'))
                      ->where('filename', 'like', $item->name . '%')
                      ->get()
                      ->last();

        if ($media) {
            if (str_ends_with($media->filename, $item->name)) {
                $filename = $media->filename . '_1.png';
            } else {
                $update_count = str_replace($item->name . '_', '', $media->filename);
                $update_count++;

                $filename = $item->name . '_' . $update_count . '.png';
            }
        }

        $path = $this->getMediaFolder('items') . '/' . $filename;

        Storage::disk(config('mediable.default_disk'))->put($path, $content);

        $import_media = $this->importMedia($filename, 'items');

        $item->attachMedia($import_media, Str::snake('inventory.barcode'));

        return $filename;
    }

    protected function getBarcode($item)
    {
        if (! $item->hasMedia('inventory.barcode')) {
            return false;
        }

        return $item->getMedia('inventory.barcode')->last();
    }
}
