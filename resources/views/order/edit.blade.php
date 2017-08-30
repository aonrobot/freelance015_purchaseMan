@extends('layouts.app')

@push('css')

<link rel="stylesheet" href="{{asset('public/css/bootstrap-select.min.css')}}">

@endpush

@section('content')

<style type="text/css">
    small{
        color: #bdbdbd!important;
    }
    h3#name{
        font-weight: 300;
    }
    h2#box-name{
        margin-top: 0px;
    }
    h3#box-description{
        margin-top: -10px;
    }
    #addProductBtn{
        float:right;
        margin-top: 12px;
        margin-bottom: 12px;
    }
    #addProductLabel{
        margin-top: 22px;
    }
    .productList.modal-footer{
        padding: 0px;
        margin-top: 55px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-6"><h2>{{$orderInfo['OrderCode']}}</h2></div>
                <div class="col-md-6 text-right">
                    <h3 id="name">
                        {{$orderInfo->masCustomer->FirstName}} {{$orderInfo->masCustomer->LastName}}
                    </h3>
                    
                    <h3 id="box-description">
                        <small>หมายเลขบัตรประจำตัวประชาชน : {{$orderInfo->masCustomer->IDCard}}</small>
                        <small>เบอร์โทรศัพท์ : {{$orderInfo->masCustomer->Tel}}</small>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Update Customer Detail</div>
                        <div class="panel-body">
                            <form action="{{asset('order/update/' . $orderInfo['OrderCode'])}}" method="POST" id="orderForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="IsActive">* Status</label>
                                    <select name="IsActive" class="form-control">
                                        <option value="1" @if($orderInfo['IsActive'] == '1'){{'selected'}}@endif>Active</option>
                                        <option value="0" @if($orderInfo['IsActive'] == '0'){{'selected'}}@endif>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ProductName">* Customer Name</label>
                                    <select name="CustomerCode" class="selectpicker form-control" data-style="btn-primary" data-live-search="true">
                                        @foreach($customerList as $cl)
                                        <option value="{{$cl['CustomerCode']}}" @if($orderInfo['CustomerCode'] == $cl['CustomerCode']) {{'selected'}} @endif>
                                            {{$cl['FirstName']}} {{$cl['LastName']}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <div class="productList modal-footer">
                                <a href="{{ URL::previous() }}" type="button" class="btn btn-default">Back</a>
                                <button id="orderSave" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">Product</div>
                        <div class="panel-body">
                            <button id="addProductBtn" class="btn btn-success" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                            <label id="addProductLabel" for="ProductName">* Product List</label>
                            <table class="table table-bordered" id="product-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>QTY</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Product</h4>
      </div>
      <form action="{{asset('orderdetail/store')}}" method="POST">
      {{ csrf_field() }}
          <input type="hidden" name="OrderCode" value="{{$orderInfo['OrderCode']}}">
          <div class="modal-body">
            <div class="form-group">
                <label for="ProductCode">* Product Name</label>
                <select name="ProductCode" id="ProductSelect" class="selectpicker form-control" data-style="btn-primary" data-live-search="true">
                    @foreach($productList as $pl)
                    <option value="{{$pl['ProductCode']}}">({{$pl['ProductCode']}}) {{$pl['ProductName']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="QTY">* QTY</label>
                <input type="text" class="form-control" name="QTY" placeholder="จำนวน" maxlength="99" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
      </form>
    </div>
  </div>
</div>


@endsection

@push('scripts')

<script src="{{asset('public/js/bootstrap-select.min.js')}}"></script>

<script>
    $(function() {
        $('.selectpicker').selectpicker();
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{asset('datatables/orderdetail/' . $orderInfo['OrderCode'])}}",
            columns: [
                { data: 'ProductCode', name: 'ProductCode' },
                { data: 'mas_products.ProductName', name: 'ProductName' },
                { data: 'mas_products.ProductDescription', name: 'ProductDescription' },
                { data: 'QTY', name: 'QTY' },
                { data: 'delete_action', name: 'delete_action', orderable: false, searchable: false}
            ]
        });

        $('#orderSave').click(function(){
            $('#orderForm').submit();
        })
    });
</script>

@endpush

