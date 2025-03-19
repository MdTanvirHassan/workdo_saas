<div class="card" id="audit-sidenav">
    {{ Form::open(['route' => 'audit.setting.store', 'enctype' => 'multipart/form-data']) }}

    <div class="card-header p-3">
        <div class="row align-items-center">
            <div class="col-sm-10 col-9">
                <h5 class="">{{ __('Audit') }}</h5>
                    <small>{{ __('These details will be used to collect invoice payments. Each invoice will have a payment button based on the below configuration.') }}</small>
            </div>
            <div class="col-sm-2 col-3  text-end">
                <div class="form-check form-switch custom-switch-v1 float-end">
                    <input type="checkbox" name="audit_is_on" class="form-check-input input-primary" id="audit_is_on"
                        {{ (isset($settings['audit_is_on']) ? $settings['audit_is_on'] : 'off') == 'on' ? ' checked ' : '' }}>
                    <label class="form-check-label" for="audit_is_on"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-3 pb-0">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="audit_key" class="form-label">{{ __('Audit Key') }}</label>
                    <input class="form-control audit_webhook" placeholder="{{ __('Audit Key') }}" name="audit_key"
                        type="text" value="{{ isset($settings['audit_key']) ? $settings['audit_key'] : '' }}"
                        {{ (isset($settings['audit_is_on']) ? $settings['audit_is_on'] : 'off')  == 'on' ? '' : ' disabled' }} id="audit_key">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="audit_secret" class="form-label">{{ __('Audit Secret Key') }}</label>
                    <input class="form-control audit_webhook" placeholder="{{ __('Audit Secret Key') }}"
                        name="audit_secret" type="text" value="{{ isset($settings['audit_secret']) ? $settings['audit_secret'] : '' }}"
                        {{ (isset($settings['audit_is_on']) ? $settings['audit_is_on'] : 'off')  == 'on' ? '' : ' disabled' }} id="audit_secret">
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer text-end p-3">
        <input class="btn btn-print-invoice  btn-primary" type="submit" value="{{ __('Save Changes') }}">
    </div>
    {{ Form::close() }}
</div>
<script>
    $(document).on('click', '#audit_is_on', function() {
        if ($('#audit_is_on').prop('checked')) {
            $(".audit_webhook").removeAttr("disabled");
        } else {
            $('.audit_webhook').attr("disabled", "disabled");
        }
    });
</script>
