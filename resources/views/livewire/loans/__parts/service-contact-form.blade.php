<form id="apply-form" wire:submit.prevent="sendRequest()" name="apply_form" class="default-form2">

    <div class="row">
        <div class="col-xl-6">
            <div class="form-group">
                <div class="input-box">
                    <input type="text" wire:model.defer="name" id="formName"
                        placeholder="First & Last Name" required="">
                        @error('name') <span style="color:red" class="error">{{ $message }}</span> @enderror
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <div class="input-box">
                    <input type="email"  wire:model.defer="email" id="formEmail"
                        placeholder="Email" required="">
                        @error('email') <span style="color:red" class="error">{{ $message }}</span> @enderror
                    <div class="icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="form-group">
                <div class="input-box">
                    <input type="text" wire:model.defer="phone" value="" id="formPhone"
                        placeholder="Phone">
                        @error('phone') <span style="color:red" class="error">{{ $message }}</span> @enderror
                    <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <div class="select-box clearfix">
                    <select class="wide" wire:model.defer="state">
                        <option value="" data-display="State">
                            State
                        </option>
                        <option value="Lusaka">Lusaka</option>
                        <option value="Cooperbelt">Cooperbelt</option>
                        <option value="Central">Central</option>
                        <option value="Northern">Northern</option>
                        <option value="Western">Western</option>
                        <option value="Luapula">Luapula</option>
                        <option value="Southern">Southern</option>
                        <option value="Eastern">Eastern</option>
                    </select>
                    @error('state') <span style="color:red" class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="button-box">
                <button class="btn-one" type="submit">
                    <span class="txt">
                        Send Request
                    </span>
                </button>
            </div>
        </div>
    </div>

</form>