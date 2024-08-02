<div wire:ignore>
    @switch($page)
        @case('loan-product')
            @include('livewire.dashboard.site-settings.__cruds.create-loan-product')
        @break
        @case('loan-disbursements')
            @include('livewire.dashboard.site-settings.__cruds.create-disbursement')
        @break
        @case('loan-penalty-settings')
            @include('livewire.dashboard.site-settings.__cruds.create-penalty-settings')
        @break
        @case('loan-repayment-cycle')
            @include('livewire.dashboard.site-settings.__cruds.create-repayment-cycle')
        @break
        @case('loan-fees')
            @include('livewire.dashboard.site-settings.__cruds.create-loan-fees')
        @break
        @case('loan-institution')
            @include('livewire.dashboard.site-settings.__cruds.create-loan-institution')
        @break
        
        @default

        @break
    @endswitch
</div>
