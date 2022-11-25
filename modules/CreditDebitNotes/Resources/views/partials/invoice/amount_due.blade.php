<div class="{{ $classHeaderAmount }}">
    {{ trans($textHeaderAmount) }}
    <br>

    <strong>
        <span class="float-left">
            @money($amount_due, $document->currency_code, true)
        </span>
    </strong>
    <br><br>
</div>
