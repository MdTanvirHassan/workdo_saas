
<div class="payment-method">
    <div class="payment-title d-flex align-items-center justify-content-between">
        <h4>{{ __('Audit') }}</h4>
        <div class="payment-image d-flex align-items-center">
            <img src="{{ get_module_img('Audit') }}" alt="">
        </div>
    </div>
    <p>{{ __('Safe money transfer using your bank account. We support Mastercard, Visa, Maestro and Skrill.') }}</p>
    <form action="{{ route('course.pay.with.audit', $store->slug) }}" role="form" method="post"
        class="payment-method-form" id="payment-form">
        @csrf
        <div class="form-group text-right">
            <button type="submit" class="btn">{{ __('Pay Now') }}</button>
        </div>
    </form>
</div>
