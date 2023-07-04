<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>Personal Data</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>Company Data</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" disabled="disabled">3</a>
                <p>Others</p>
            </div>
        </div>
    </div>

    @include('livewire.register-user')

    @include('livewire.company_form')

    <div class="row setup-content" id="step-3" {{ $currentStep != 3 ? 'style=display:none' : '' }}>
        <div class="col-xs-12">
            <div class="col-md-12"><br>
                <div class="form-group">
                    <div style="overflow-y: scroll; max-height: 200px;" id="agreement-scrollbox">
                        <h4>User Agreement</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend auctor lectus a fermentum. Donec nec massa ac libero maximus cursus. Aenean vitae libero malesuada, fringilla velit id, malesuada dui.</p>
                        <!-- Add your own user agreement text here -->
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend auctor lectus a fermentum. Donec nec massa ac libero maximus cursus. Aenean vitae libero malesuada, fringilla velit id, malesuada dui.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend auctor lectus a fermentum. Donec nec massa ac libero maximus cursus. Aenean vitae libero malesuada, fringilla velit id, malesuada dui.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend auctor lectus a fermentum. Donec nec massa ac libero maximus cursus. Aenean vitae libero malesuada, fringilla velit id, malesuada dui.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend auctor lectus a fermentum. Donec nec massa ac libero maximus cursus. Aenean vitae libero malesuada, fringilla velit id, malesuada dui.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eleifend auctor lectus a fermentum. Donec nec massa ac libero maximus cursus. Aenean vitae libero malesuada, fringilla velit id, malesuada dui.</p>
                    </div>
                </div>
<div class="form-group">
  <input type="checkbox" id="agreeCheckbox"  onclick="enableFinishButton()">
  <label for="agreeCheckbox">By pressing the Finish button, you agree to the terms and conditions</label>
</div>

<div class="d-flex justify-content-between">
  <button class="btn btn-danger btn-sm nextBtn btn-lg" type="button" wire:click="back(2)">Back</button>
  <button id="finishButton" class="btn btn-success btn-sm btn-lg" wire:click="submitForm" disabled="!agreeCheckboxValue">Finish</button>

</div>

<script>
    function enableFinishButton() {
        const agreeCheckbox = document.getElementById('agreeCheckbox');
        const finishButton = document.getElementById('finishButton');

        finishButton.disabled = !agreeCheckbox.checked;
    }
</script>
