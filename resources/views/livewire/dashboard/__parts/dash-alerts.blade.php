<div>
    @if (session()->has('error'))
    <div wire:ignore.self class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (session()->has('success'))
    <div wire:ignore.self class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session()->has('info'))
    <div wire:ignore.self class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif
    @if (session()->has('warning'))
    <div wire:ignore.self class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif
</div>