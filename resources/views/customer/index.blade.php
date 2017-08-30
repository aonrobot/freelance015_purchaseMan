@extends('layouts.app')

@section('content')

<style type="text/css">
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Customer</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><button class="addCustomer btn btn-success" data-toggle="modal" data-target="#addCustomerModal"><i class="fa fa-plus"></i> Add New Customer</button></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="customer-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>CustomerCode</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>ID Card</th>
                                <th>Phone</th>
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
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Customer</h4>
      </div>
      <form action="customer/store" method="POST">
      {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
                <label for="FisrtName">* First Name</label>
                <input type="text" class="form-control" name="FirstName" placeholder="Fisrt Name" maxlength="99" required>
            </div>
            <div class="form-group">
                <label for="LastName">* Last Name</label>
                <input type="text" class="form-control" name="LastName" placeholder="Last Name"maxlength="99" required>
            </div>
            <div class="form-group">
                <label for="IDCard">* ID Card (13 digit number only)</label>
                <input type="text" class="form-control" name="IDCard" placeholder="ID Card Number" pattern="\d*" minlength="13" maxlength="13" required>
            </div>
            <div class="form-group">
                <label for="Tel">* Phone (10 digit number only)</label>
                <input type="text" class="form-control" name="Tel" placeholder="Phone Number" pattern="\d*" minlength="10" maxlength="10" required>
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
<script>
    $(function() {
        $('#customer-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'datatables/customer',
            columns: [
                { data: 'CustomerCode', name: 'CustomerCode' },
                { data: 'FirstName', name: 'FirstName' },
                { data: 'LastName', name: 'LastName' },
                { data: 'IDCard', name: 'IDCard' },
                { data: 'Tel', name: 'Tel' },
                { data: 'edit_action', name: 'edit_action', orderable: false, searchable: false},
                { data: 'delete_action', name: 'delete_action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
