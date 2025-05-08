@props(['field'])
@error($field)
        <div class="invalid-feedback d-flex align-items-center gap-2">
            <i class="bi bi-exclamation-circle-fill text-danger"></i>
            <span>{{ $message }}</span>
        </div>
@enderror