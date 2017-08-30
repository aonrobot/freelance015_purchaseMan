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
            <h2>{{$productInfo['ProductName']}} <small> {{$productInfo['ProductCode']}}</small></h2>
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    <form action="{{asset('product/update')}}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="ProductCode" value="{{$productInfo['ProductCode']}}"></input>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="ProductName">* Product Name</label>
                            <input type="text" class="form-control" name="ProductName" placeholder="Product Name" maxlength="99" required value="{{$productInfo['ProductName']}}">
                        </div>
                        <div class="form-group">
                            <label for="ProductDescription">* Product Description</label>
                            <textarea type="text" class="form-control" name="ProductDescription" placeholder="Product Description" maxlength="99" cols="40" rows="5" required>{{$productInfo['ProductDescription']}}</textarea>
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

