<div class="price-summery-card">
    <div class="price-sm-card-top">
        <div class="price-pay-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="43"
                height="43" viewBox="0 0 43 43" fill="none">
                <path
                    d="M5.31775 21.5268C5.27046 21.5268 5.22152 21.525 5.17248 21.5198C4.45094 21.4409 3.93079 20.7914 4.0096 20.0716C4.64533 14.2625 8.15143 9.25879 13.3879 6.68786C13.7959 6.48821 14.2775 6.51271 14.6611 6.75264C15.0463 6.99257 15.281 7.41478 15.281 7.86838V13.2098C15.281 13.9348 14.6926 14.5233 13.9675 14.5233C13.2425 14.5233 12.6541 13.9348 12.6541 13.2098V10.1608C9.28628 12.504 7.07781 16.1836 6.62247 20.357C6.54891 21.0295 5.97799 21.5268 5.31775 21.5268ZM36.9833 22.2361C36.26 22.1591 35.6138 22.6774 35.535 23.3989C35.0797 27.5723 32.8712 31.2518 29.5034 33.5968V30.5478C29.5034 29.8228 28.915 29.2344 28.1899 29.2344C27.4649 29.2344 26.8765 29.8228 26.8765 30.5478V35.8894C26.8765 36.343 27.1111 36.765 27.4964 37.005C27.7083 37.1363 27.9483 37.2029 28.1899 37.2029C28.3878 37.2029 28.5858 37.1591 28.7697 37.068C34.0079 34.4971 37.514 29.4936 38.148 23.6845C38.225 22.963 37.7031 22.315 36.9833 22.2361ZM18.0131 15.6512V8.64591C18.0131 6.1783 19.4859 4.70544 21.9535 4.70544H32.4614C34.9291 4.70544 36.4019 6.1783 36.4019 8.64591V15.6512C36.4019 18.1188 34.9291 19.5916 32.4614 19.5916H21.9535C19.4859 19.5916 18.0131 18.1188 18.0131 15.6512ZM33.7749 15.6512V11.7107H20.6401V15.6512C20.6401 16.6827 20.922 16.9647 21.9535 16.9647H32.4614C33.493 16.9647 33.7749 16.6827 33.7749 15.6512ZM20.6401 8.64591V9.08374H33.7749V8.64591C33.7749 7.61438 33.493 7.33242 32.4614 7.33242H21.9535C20.922 7.33242 20.6401 7.61438 20.6401 8.64591ZM25.4562 13.462H22.8292C22.1042 13.462 21.5157 14.0505 21.5157 14.7755C21.5157 15.5006 22.1042 16.089 22.8292 16.089H25.4562C26.1812 16.089 26.7697 15.5006 26.7697 14.7755C26.7697 14.0505 26.1812 13.462 25.4562 13.462ZM24.1427 27.9104V34.9157C24.1427 37.3833 22.6698 38.8561 20.2022 38.8561H9.69433C7.22672 38.8561 5.75387 37.3833 5.75387 34.9157V27.9104C5.75387 25.4428 7.22672 23.9699 9.69433 23.9699H20.2022C22.6698 23.9699 24.1427 25.4428 24.1427 27.9104ZM8.38084 27.9104V28.3482H21.5157V27.9104C21.5157 26.8789 21.2338 26.5969 20.2022 26.5969H9.69433C8.6628 26.5969 8.38084 26.8789 8.38084 27.9104ZM21.5157 34.9157V30.9752H8.38084V34.9157C8.38084 35.9472 8.6628 36.2291 9.69433 36.2291H20.2022C21.2338 36.2291 21.5157 35.9472 21.5157 34.9157ZM13.197 32.7265H10.57C9.84494 32.7265 9.2565 33.315 9.2565 34.04C9.2565 34.765 9.84494 35.3535 10.57 35.3535H13.197C13.922 35.3535 14.5104 34.765 14.5104 34.04C14.5104 33.315 13.922 32.7265 13.197 32.7265Z"
                    fill="#AB9A86"></path>
            </svg>
        </div>
        <div class="price-pay-info" style="width: 495px;">{{--remove style--}}
            <h4>{{ __('Audit') }}</h4>
            <p>{{ __('Safe money transfer using your bank account. We support Mastercard, Visa, Maestro and Skrill.') }}
            </p>
        </div>
        <form action="{{ route('booking.audit.post', $slug) }}"
            method="post" class="payment-method-form" id="payment-form">
            @csrf
            <input type="hidden" name="firstname"
                class="firstnameforminput">
            @if($type == "roombookinginvoice")
                <input type="hidden" name="type" value="roombookinginvoice">
            @endif
            <input type="hidden" name="email" class="emailforminput">
            <input type="hidden" name="address" class="addressforminput">
            <input type="hidden" name="country" class="countryforminput">
            <input type="hidden" name="lastname" class="lastnameforminput">
            <input type="hidden" name="phone" class="phoneforminput">
            <input type="hidden" name="city" class="cityforminput">
            <input type="hidden" name="zipcode" class="zipcodeforminput">
            <input type="hidden" name="coupon" class="applied_coupon_code">

            {{-- <div class="form-group px-15">

                <label for="">{{ __('Name on card') }}</label>
                <input type="text" name="name"
                    placeholder="Enter Your Name">
            </div>
            <div class="form-group px-15">
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
            </div> --}}
            <div class="form-group text-right">{{--px-15--}}
                <button type="submit"
                    class="btn">{{ __('Pay Now') }}</button>
            </div>
        </form>
    </div>
</div>


@push('script')
<script src="https://js.audit.com/v3/"></script>
@endpush
{{-- <script type="text/javascript">
    var audit = Audit('{{ !empty(company_setting('audit_key')) ? company_setting('audit_key') : '' }}');
    var elements = audit.elements();

    // Custom styling can be passed to options when creating an Element.
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '14px',
            color: '#32325d',
        },
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        audit.createToken(card).then(function(result) {
            if (result.error) {
                $("#card-errors").html(result.error.message);
                show_toastr('Error', result.error.message, 'error');
            } else {
                // Send the token to your server.
                auditTokenHandler(result.token);
            }
        });
    });

    function auditTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'auditToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script> --}}
