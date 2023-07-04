<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use PhpParser\Node\Stmt\TryCatch;

use Illuminate\Support\Facades\DB;
use App\Models\country;

class Register extends Component
{


    use WithFileUploads;
    public $successMessage = '';
    public $countryList= [];

    public $catchError, $updateMode = false, $photos,$show_table = true,$user_id;
    public $agreeCheckboxValue = false;
    public $currentStep = 1,
    $email,$name, $password,$ConfirmPassword,$phone, $postion,
        $orgname, $address, $scope ,$country, $agreement, $termsAgreed;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'email' => 'required|email',
            'password'=> 'required|max:10|min:9',
            // 'name'=>'requierd',
            // 'phone'=> 'required',
            // 'postion'=> 'required',
            // 'orgname'=> 'required',
            // 'address' => 'required',
            // 'scope'=> 'required',
            // 'country'=> 'required'
        ]);
    }




    public function render()
    {
        $this->countryList = Country::all();

        return view('livewire.register')->with('countries', $this->countryList);
    }


    //FirstStepSubmit
    public function firstStepSubmit()
    {

       $validatedata= $this->validate([
            'email' => 'required',
            //'Password' => 'required | min:9',
            // 'name' => 'requierd',
             //'phone' => 'requierd',
            // 'postion' => 'requierd',
            // 'orgname' => 'requierd',
            // 'address' => 'requierd',
            // 'Scope' => 'requierd',
            // 'country' => 'requierd'
        ]);




        $this->currentStep = 2;

    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function checkboxValueChanged($value)
    {
        $this->agreeCheckboxValue = $value;
    }


    //secondStepSubmit
    public function secondStepSubmit()
    {


        $validatedata = $this->validate([
            //'email' => 'required',
            //'Password' => 'required | min:9',
            // 'name' => 'requierd',
            //'phone' => 'requierd',
            // 'postion' => 'requierd',
                'orgname' => 'required',
            // 'address' => 'requierd',
            // 'Scope' => 'requierd',
             'country' => 'required'
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
     

       try{
                 $users = new User();
                 $users->email = $this->email;
                 $users->password =Hash::make($this->password) ;
                 $users->name = $this->name;
                 $users->Phone = $this->phone;
                 $users->postion = $this->postion;
                 $users->orgname = $this->orgname;
                 $users->address = $this->address;
                 $users->scope = $this->scope;
                 $users->country = $this->country;

                 $users->save();
                 $this->resetForm();
                 $this->successMessage = trans('messages.success');
                 $this->clearForm();
                 $this->currentStep = 1;

      } 
       
       catch (\Exception $e) {
                     $this->catchError = $e->getMessage();
        };

    }


    //clearForm
    public function resetForm()
    {
        $this->email = '';
        $this->password = '';
        $this->name = '';
        $this->phone = '';
        $this->postion = '';
        $this->orgname = '';
        $this->address = '';
        $this->scope = '';
        $this->country = '';
        $this->ConfirmPassword = '';


    }

    
}
