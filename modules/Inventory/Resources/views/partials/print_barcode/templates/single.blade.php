@for ($i = 0; $i <= 10; $i++)
    <div class="col-100 mt-5">
        <div class="text-center">
            <img src="{{ $barcode ? Storage::url($barcode->id) : asset('modules/Inventory/Resources/assets/img/barcode/code_128.png') }}" class="image-style">
        </div>
        <div class="text-monospace text-center">
            {{ $item->inventory()->value('barcode') ?? 'brcd123456789' }}
        </div>
    </div>
@endfor
