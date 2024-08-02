
<div class="card mb-5 mb-xl-8">
    <div class="container m-12 d-flex justify-content-center align-items-center">
        <div class="col-12">
            <div class="container">
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Borrower</label>
                <select type="text" wire:model.lazy="crb" class="form-control form-control-lg form-control-solid" placeholder="" required>
                    <option value="0">Default</option>
                    @forelse ($borrowers as $b)
                    <option value="{{ $b->id }}">{{ $b->fname.' '.$b->lname.' | '.$b->phone }}</option>
                    @empty
                    @endforelse
                </select>
                <br>
                <button class="btn btn-primary" wire:click="CheckCRB()">Get Product 04</button>
            </div>
        </div>
    </div>
</div>