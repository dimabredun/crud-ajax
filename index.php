<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="styles.css" rel="stylesheet">
	<div class="container mt-5">
        <div class="card-title">
            <h6 class="mr-2"><span>Users</span></h6>
        </div>

                <div class="option">
                        <div class="e-table">
                            <div class="table-responsive table-lg mt-3">
                                <form method="post" id="menu_form" action="index.php">
                                    <div id="outer">
                                        <div class="inner">
                                            <button type="button" class="btn btn-success mt-2" data-toggle="modal" data-target="#userformModal" id="add">Add</button>
                                        </div>
                                        <div class="inner">
                                            <select name="select" id="menu" style="margin: 0px 0px 20px 20px">
                                                <option value="select">Please select</option>
                                                <option value="set-active">Set active</option>
                                                <option value="set-not-active">Set not active</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                        </div>
                                        <div class="inner">
                                            <input type="submit" value="OK" name="submit_btn" style="margin: 0px 0px 20px 20px">
                                        </div>
                                    </div>
                                    <table class="table table-bordered">

                                        <thead>
                                        <tr>
                                            <th class="text-nowrap align-middle"><input type="checkbox" name="select-all" id="select-all" ></th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="users_data">
                                        </tbody>

                                </table>
                                    <div class="inner"><button type="button" class="btn btn-success mt-2" data-toggle="modal" data-target="#userformModal" id="add2">Add</button></div>

                                    <form method="post" id="menu_form2" >
                                        <select name="select2" id="menu2" style="margin: 0px 0px 20px 20px" >
                                            <option value="select">Please select</option>
                                            <option value="set-active">Set active</option>
                                            <option value="set-not-active">Set not active</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                        <input type="submit" value="OK" name="submit_btn" style="margin: 0px 0px 20px 20px">

                                    </form>
                                </form>

                            </div>
                        </div>
                </div>
        </div>

<!--Main modal-->

<div class="modal fade" id="userformModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="" method="POST" id="user_form">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
                    <div class="col">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Last name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                      </div>
                    </div>
                    <div class="col" >
                      <div class="form-group">
                        <label>Status </label>
                        <label class="switch" style="margin-left: 22px">
                        <input type="checkbox" name="status" id="status"/>
                        <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                    <input type="hidden" name="hidden_status" id="hidden_status">
                  <div class="col">
                    <div class="form-group">
                      <label>Role</label>
                      <select name="role" id="role" value="user" style="margin-left: 30px">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                  </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" name="add" >Save</button>
            <input type="hidden" id="hiddendata" name="hiddendata">
        </div>
        </form>
    </div>
  </div>
</div>

<!--Delete Modal-->

<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this record?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete_btn" name="delete_btn"class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        showUsers();

        $("#userformModal").on('hidden.bs.modal', function(){
            $("#userformModal").find("input, select").val("");
            $("#userformModal").find("select[name='role']").val("user");
            $("#userformModal").find("input[type=checkbox]").prop('checked', false);
        });

        $('#add').click (function () {
            $('#userformModal').find('.modal-title').text("Add user");
            $('#userformModal').find('.btn-primary').text("Add");
        });

        $('#add2').click (function () {
            $('#userformModal').find('.modal-title').text("Add user");
            $('#userformModal').find('.btn-primary').text("Add");
        });

        $('#userformModal').click(function () {
            if ($('#add') || $('#add2')) {
                $('.btn-primary').text('Add');
            }
        });

        // above and below menus submission
        $('#menu_form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "process.php",
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        showUsers();
                        $("#menu_form").find("select").val("select")
                    } else {
                        alert(response.message);
                        $("#menu_form").find("select").val("select")
                        showUsers();
                    }
                }
            });
        });

        $('#menu_form2').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "process.php",
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        $("#menu_form").find("select").val("select")
                        showUsers();
                    } else {
                        alert(response.message);
                        $("#menu_form").find("select").val("select")
                        showUsers();
                    }
                }
            });
        });

    });

    // get id of user for edition
    function getUserData(updateid) {
        $('#userformModal').find('.modal-title').text("Edit user");
        $('#userformModal').find('.btn-primary').text("Save");
        $('#hiddendata').val(updateid);
        $.post('process.php', {updateid:updateid}, function (data,status){
            var userid = JSON.parse(data);
            $('#firstname').val(userid.name.split(' ')[0]);
            $('#lastname').val(userid.name.split(' ')[1]);
            $('#role').val(userid.role);
            $('#status').val(userid.status);
            var db_status = userid.status;
            if (db_status == 1) {
                $('#status').prop('checked', true);
            } else {
                $('#status').prop('checked', false);
            }
        })
        $('#userformModal').modal('show');
    }

    function updateUser() {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var role = $('#role').val();
        var status = $('#status');
        if($(this).val() == 1){
            $(this).prop("checked", true);
        };
        var hiddendata = $('#hiddendata').val();
        $.post('process.php', {
            firstname:firstname,
            lastname:lastname,
            role:role,
            status:status,
            hiddendata:hiddendata
        }, function (data, status) {
            $('#userformModal').modal('hide').val('');
            showUsers();
        });
    }

    function deleteUser(deleteid) {
        $('#deleteModal').modal('show');
        $('#delete_btn').on('click', function() {
        // if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: 'process.php',
                type: 'post',
                data: {deleteid: deleteid},
                success: function () {
                    $('#deleteModal').modal('hide');

                    showUsers();
                }
            })
        })
    }

    var tableElement = $('table');
    tableElement.on('change', 'input[type=checkbox]', function(event) {
        var changed = event.target,
            checkboxes = tableElement
                .find('input[type=checkbox]')
                .not('#select-all');
        if (changed.id === 'select-all') {
            checkboxes.prop('checked', changed.checked)
        } else {
            var allChecked = checkboxes.length === checkboxes.filter(':checked').length
            $('#select-all').prop(
                'checked', allChecked
            );
        }
    });

    // initializing checkboxes
    $('#select-all').change(function () {
        if ($(this).is(':checked')) {
            $('input[name="update_many[]"]').prop('checked', true);
        } else {
            $('input[name="update_many[]"]').each(function () {
                $(this).prop('checked', false);
            });
        }
    });

    // modal form submission for insert
    $('#status').change(function () {
        if ($(this).prop('checked')) {
            $('#hidden_status').val(1);
        }
        else {
            $('#hidden_status').val(0);
        }
    });

    $("#user_form").submit(function(e) {
        e.preventDefault();

        $.ajax({
            type : "POST",
            url : "process.php",
            data : $("#user_form").serialize(),
            dataType : 'json',
            success : function(response) {
                if (response.status) {
                    toastr.success('Record created successfully');
                    $("#user_form")[0].reset();
                    $("#userformModal").modal('hide');
                    showUsers();
                }else{
                    toastr.error(response.message);
                }
            }
        });
    });

    function showUsers() {
        var showUsers = 'true';

        $.ajax({
            url: 'process.php',
            type: 'post',
            data: {
                showUsers:showUsers
            },
            success: function (data, status) {
                $('#users_data').html(data);
            }
        });
    }

    showUsers();
</script>
</body>
</html>