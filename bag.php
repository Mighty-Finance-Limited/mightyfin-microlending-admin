@forelse ($institutions as $option)
<label for="{{ $option->name }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
    <input id="{{ $option->name }}" class="form-check-input" wire:model.lazy="loan_institution" type="checkbox" value="{{ $option->id }}" />
    <span class="fw-semibold ps-2 fs-6">{{ $option->name }} </span>
</label>
<br>
@empty
    <p>No Charges</p>
@endforelse