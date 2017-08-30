@extends('layouts.app')

@push('css')

<link rel="stylesheet" href="{{asset('public/css/bootstrap-select.min.css')}}">

@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Order</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><button class="addOrder btn btn-success" data-toggle="modal" data-target="#addOrderModal"><i class="fa fa-plus"></i> Create New Order</button></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="order-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>Customer Last Name</th>
                                <th>Order Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Create New Order</h4>
      </div>
      <form action="order/store" method="POST">
      {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
                <label for="ProductName">* Customer Name</label>
                <select name="CustomerCode" class="selectpicker form-control" data-style="btn-primary" data-live-search="true">
                    @foreach($customerList as $cl)
                    <option value="{{$cl['CustomerCode']}}">{{$cl['FirstName']}} {{$cl['LastName']}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
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

        $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'datatables/order',
            columns: [
                { data: 'OrderCode', name: 'OrderCode' },
                { data: 'CustomerCode', name: 'CustomerCode' },
                { data: 'mas_customer.FirstName', name: 'mas_customer.FirstName' },
                { data: 'mas_customer.LastName', name: 'mas_customer.LastName' },
                { data: 'OrderDate', name: 'OrderDate' },
                { data: 'edit_action', name: 'edit_action', orderable: false, searchable: false},
                { data: 'delete_action', name: 'delete_action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
