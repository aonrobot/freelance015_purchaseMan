@extends('layouts.app')

@section('content')

<style type="text/css">
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Products</h1>
            <div class="panel panel-default">
                <div class="panel-heading"><button class="addProduct btn btn-success" data-toggle="modal" data-target="#addProductModal"><i class="fa fa-plus"></i> Add New Product</button></div>

                <div class="panel-body">
                    <table class="table table-bordered" id="product-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
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
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Product</h4>
      </div>
      <form action="product/store" method="POST">
      {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
                <label for="ProductName">* Product Name</label>
                <input type="text" class="form-control" name="ProductName" placeholder="Product Name" maxlength="99" required>
            </div>
            <div class="form-group">
                <label for="ProductDescription">* Product Description</label>
                <textarea type="text" class="form-control" name="ProductDescription" placeholder="Product Description" maxlength="99" cols="40" rows="5" required></textarea>
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
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'datatables/product',
            columns: [
                { data: 'ProductCode', name: 'ProductCode' },
                { data: 'ProductName', name: 'ProductName' },
                { data: 'ProductDescription', name: 'ProductDescription' },
                { data: 'edit_action', name: 'edit_action', orderable: false, searchable: false},
                { data: 'delete_action', name: 'delete_action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
