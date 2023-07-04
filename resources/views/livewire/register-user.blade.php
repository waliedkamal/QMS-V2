@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" wire:model="ConfirmPassword" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    @error('ConfirmPassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" wire:model="phone" class="form-control">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                 <label for="title">postion</label>
                        <input type="text" wire:model="postion" class="form-control">
                        @error('postion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
            </div>
        </div>

        @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg float-right" 
            wire:click="firstStepSubmit_edit" type="button">Next</button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg float-right"
             wire:click="firstStepSubmit" type="button">Next</button>
        @endif

    </div>
</div>
</div>
