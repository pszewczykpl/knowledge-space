<div class="row mb-6">
    <label class="col-lg-4 col-form-label @if($required) required @endif fw-bold fs-6">{{ $label }}:</label>
    <div class="col-lg-8 fv-row fv-plugins-icon-container">
        {{ $slot }}
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
</div>