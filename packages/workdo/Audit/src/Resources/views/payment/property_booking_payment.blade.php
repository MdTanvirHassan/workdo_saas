

<div class="single-option">
    <div class="radio-group">
        <input class="form-check-input payment_method" id="payment-1" name="payment"
                type="radio" data-payment-action="{{ route('property.booking.pay.with.audit',[$slug]) }}">
        <label for="payment-1">
            <div class="option-image">
                <img src="{{ get_module_img('Audit') }}" alt="Payment Logo" class="img-user">
            </div>
            <p class="mb-0 text-capitalize pointer">{{ Module_Alias_Name('Audit') }}</p>
        </label>
    </div>
</div>





