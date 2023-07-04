@extends('layouts.master1')
@livewireStyles
@section('content')
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <livewire:counter/>



            </div>
        </div>
    </div>
</div>
@endsection
@livewireScripts