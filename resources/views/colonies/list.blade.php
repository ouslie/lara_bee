@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Meruches</h4>
                            <div class="toolbar">
                                <a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-user">Add New</a>
                                <br><br>
                            </div>

                            <div class="material-datatables">

                                <table id="laravel_datatable" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>S. No</th>
                                            <th>Name</th>
                                            <th>Adresse</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>


                        <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="userCrudModal"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="userForm" name="userForm" class="form-horizontal">
                                            <input type="hidden" name="hives_id" id="hives_id">
                                            <div class="form-group">
                                                <label for="id_type" class="col-sm-2 control-label">Type</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="id_type" name="id_type"
                                                        placeholder="Enter type" value="" maxlength="50" required="">
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="birthdate" name="birthdate"
                                                        placeholder="Enter type" value="" maxlength="50" required="">
                                                </div>
                                            </div>                          
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary" id="btn-save"
                                                    value="create">Save changes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
    var SITEURL = '{{URL::to('')}}';
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: SITEURL + "/app/colonies",
                type: 'GET',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'id_type',
                    id_type: 'id_type'
                },     
                {
                    data: 'birthyear',
                    birthyear: 'birthyear'
                },     
                {
                    data: 'action',
                    name: 'action',
                    class: 'disabled-sorting text-right',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        /*  When user click add user button */
        $('#create-new-user').click(function () {
            $('#btn-save').val("create-user");
            $('#user_id').val('');
            $('#userForm').trigger("reset");
            $('#userCrudModal').html("Add New User");
            $('#ajax-crud-modal').modal('show');
        });

        /* When click edit user */
        $('body').on('click', '.edit-hives', function () {
            var hives_id = $(this).data('id');

            $.get('/app/colonies/' + hives_id + '/edit', function (data) {
                $('#name-error').hide();
                $('#email-error').hide();
                $('#userCrudModal').html("Edit User");
                $('#btn-save').val("edit-user");
                $('#ajax-crud-modal').modal('show');
                $('#user_id').val(data.id);
                $('#id_type').val(data.id_type);
                $('#birthdate').val(data.birthdate);

            })
        });
        $('body').on('click', '#delete-user', function () {

            var user_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "get",
                url: SITEURL + "/app/colonies/delete/" + hives_id,
                success: function (data) {
                    var oTable = $('#laravel_datatable').dataTable();
                    oTable.fnDraw(false);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

    if ($("#userForm").length > 0) {
        $("#userForm").validate({

            submitHandler: function (form) {

                var actionType = $('#btn-save').val();
                $('#btn-save').html('Sending..');

                $.ajax({
                    data: $('#userForm').serialize(),
                    url: SITEURL + "/app/colonies/store",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#userForm').trigger("reset");
                        $('#ajax-crud-modal').modal('hide');
                        $('#btn-save').html('Save Changes');
                        var oTable = $('#laravel_datatable').dataTable();
                        oTable.fnDraw(false);

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#btn-save').html('Save Changes');
                    }
                });
            }
        })
    }

</script>

@endsection
