@extends('layouts.app')

@section('content')

<style type="text/css">
    small{
        color: #bdbdbd!important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>{{$customerInfo['FirstName'] . ' ' .  $customerInfo['LastName']}} <small> {{$customerInfo['CustomerCode']}}</small></h2>
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    <form action="{{asset('customer/update')}}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="CustomerCode" value="{{$customerInfo['CustomerCode']}}"></input>
                          <div class="modal-body">
                            <div class="form-group">
                                <label for="FisrtName">* First Name</label>
                                <input type="text" class="form-control" name="FirstName" placeholder="Fisrt Name" maxlength="99" required value="{{$customerInfo['FirstName']}}">
                            </div>
                            <div class="form-group">
                                <label for="LastName">* Last Name</label>
                                <input type="text" class="form-control" name="LastName" placeholder="Last Name"maxlength="99" required value="{{$customerInfo['LastName']}}">
                            </div>
                            <div class="form-group">
                                <label for="IDCard">* ID Card (13 digit number only)</label>
                                <input type="text" class="form-control" name="IDCard" placeholder="ID Card Number" pattern="\d*" minlength="13" maxlength="13" required value="{{$customerInfo['IDCard']}}">
                            </div>
                            <div class="form-group">
                                <label for="Tel">* Phone (10 digit number only)</label>
                                <input type="text" class="form-control" name="Tel" placeholder="Phone Number" pattern="\d*" minlength="10" maxlength="10" required value="{{$customerInfo['Tel']}}">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="{{ URL::previous() }}" type="button" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-success">Save</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush

