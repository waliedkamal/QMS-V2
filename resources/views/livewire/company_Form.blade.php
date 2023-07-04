@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="orgname" class="form-label">Company Name</label>
                    <input type="text" wire:model="orgname" class="form-control" placeholder="Enter company name">
                    @error('orgname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" wire:model="address" class="form-control" placeholder="Enter address">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="scope" class="form-label">Scope of Work</label>
                    <input type="text" wire:model="scope" class="form-control" placeholder="Enter scope of work">
                    @error('scope')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
<div class="form-group">
    <label for="country" class="form-label">Country</label>
    <div class="position-relative">
        <select class="custom-select my-1 mr-sm-2" wire:model="country">
            <option value="">Select a country</option>
            @foreach ($countries as $country)
                <option value="{{ $country->name }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    @error('country')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-danger btn-sm float-left" type="button"
                 wire:click="back(1)">
                    Back
                </button>

                @if($updateMode)
                    <button class="btn btn-success btn-sm float-right" 
                    wire:click="secondStepSubmit_edit" type="button">
                        Update
                    </button>
                @else
                    <button class="btn btn-success btn-sm float-right" 
                    type="button" wire:click="secondStepSubmit">
                        Next
                    </button>
                @endif
            </div>
        </div>

    </div>
</div>
