@extends('layouts.main')
@push('scripts')
@if(isset($audit_session))
    <script src="https://js.audit.com/v3/"></script>
    <script>
    var audit = Audit('{{ admin_setting('audit_key') }}');
    audit.redirectToCheckout({
        sessionId: '{{ $audit_session->id }}',
    }).then((result) => {
    });
    </script>
@endif
@endpush
