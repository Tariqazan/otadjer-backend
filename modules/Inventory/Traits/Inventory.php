<?php

namespace Modules\Inventory\Traits;

use File;
use Image;
use App\Models\Common\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Inventory\Models\Adjustment;
use Modules\Inventory\Models\TransferOrder;

trait Inventory
{
    /**
     * Generate next transfer order number
     *
     * @return string
     */
    public function getNextTransferOrderNumber()
    {
        $prefix = setting('inventory.transfer_order_prefix', 'TO-');
        $next = setting('inventory.transfer_order_next', '1');
        $digit = setting('inventory.transfer_order_digit', '5');

        $number = $prefix . str_pad($next, $digit, '0', STR_PAD_LEFT);

        return $number;
    }

    /**
     * Increase the next transfer order number
     */
    public function increaseNextTransferOrderNumber()
    {
        // Update next transfer order number
        $next = setting('inventory.transfer_order_next', 1) + 1;

        setting(['inventory.transfer_order_next' => $next]);
        setting()->save();
    }


        /**
     * Generate next Adjustment number
     *
     * @return string
     */
    public function getNextAdjustmentNumber()
    {
        $prefix = setting('inventory.adjustment_prefix', 'ADJ-');
        $next = setting('inventory.adjustment_next', '1');
        $digit = setting('inventory.adjustment_digit', '5');

        $number = $prefix . str_pad($next, $digit, '0', STR_PAD_LEFT);

        return $number;
    }

    /**
     * Increase the next Adjustment number
     */
    public function increaseNextAdjustmentNumber()
    {
        // Update next Adjustment number
        $next = setting('inventory.adjustment_next', 1) + 1;

        setting(['inventory.adjustment_next' => $next]);
        setting()->save();
    }

    protected function getLogo($logo)
    {
        if (!empty($logo)) {
            return $logo;
        }

        $media = Media::find(setting('company.logo'));

        if (!empty($media)) {
            $path = $media->getDiskPath();

            if (Storage::missing($path)) {
                return $logo;
            }
        } else {
            $path = base_path('public/img/company.png');
        }

        try {
            $image = Image::cache(function($image) use ($media, $path) {
                $width = setting('invoice.logo_size_width');
                $height = setting('invoice.logo_size_height');

                if ($media) {
                    $image->make(Storage::get($path))->resize($width, $height)->encode();
                } else {
                    $image->make($path)->resize($width, $height)->encode();
                }
            });
        } catch (NotReadableException | \Exception $e) {
            Log::info('Company ID: ' . company_id() . ' components/documentshow.php exception.');
            Log::info($e->getMessage());

            $path = base_path('public/img/company.png');

            $image = Image::cache(function($image) use ($path) {
                $width = setting('invoice.logo_size_width');
                $height = setting('invoice.logo_size_height');

                $image->make($path)->resize($width, $height)->encode();
            });
        }

        if (empty($image)) {
            return $logo;
        }

        $extension = File::extension($path);

        return 'data:image/' . $extension . ';base64,' . base64_encode($image);
    }

    public function getTransferOrderFileName(TransferOrder $transfer_order, string $separator = '-', string $extension = 'pdf'): string
    {
        return $this->getSafeTransferOrderNumber($transfer_order, $separator) . $separator . time() . '.' . $extension;
    }

    public function getSafeTransferOrderNumber(TransferOrder $transfer_order, string $separator = '-'): string
    {
        return Str::slug($transfer_order->transfer_order_number, $separator, language()->getShortCode());
    }

    public function getAdjustmentFileName(Adjustment $adjustment, string $separator = '-', string $extension = 'pdf'): string
    {
        return $this->getSafeAdjustmentNumber($adjustment, $separator) . $separator . time() . '.' . $extension;
    }

    public function getSafeAdjustmentNumber(Adjustment $adjustment, string $separator = '-'): string
    {
        return Str::slug($adjustment->adjustment_number, $separator, language()->getShortCode());
    }

}
