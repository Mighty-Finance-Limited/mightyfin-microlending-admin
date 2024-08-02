<div wire:ignore>
    @switch($page)
        @case('loan-product')
            @include('livewire.dashboard.site-settings.__cruds.update-loan-product')
        @break
        @case('loan-disbursements')
            @include('livewire.dashboard.site-settings.__cruds.update-disbursements')
        @break
        @case('loan-repayment-cycle')
            @include('livewire.dashboard.site-settings.__cruds.update-repayment-cycle')
        @break
        @case('loan-penalty-settings')
            @include('livewire.dashboard.site-settings.__cruds.update-penalty-settings')
        @break
        @case('loan-fees')
            @include('livewire.dashboard.site-settings.__cruds.update-loan-fees')
        @break
        @case('loan-statuses')
            @include('livewire.dashboard.site-settings.__cruds.update-loan-statuses')
        @break
        @case('institutes')
            @include('livewire.dashboard.site-settings.__cruds.update-institutions')
        @break
        
        @default

        @break
    @endswitch
</div>