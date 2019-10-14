<div class="page-title">
    <div class="title-env">
        <h1 class="title">Office List</h1>
        <p class="description"></p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="dashboard-1.html"><i class="fa-cog"></i>App Console</a>
            </li>
            <li class="active">
                <a href="extra-gallery.html">Office</a>
            </li>
        </ol>
    </div>
</div>

<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">

        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
            <a href="#" data-toggle="remove">
                &times;
            </a>
        </div>
        <div class="action_panel">
            <a href="<?php echo base_url('app_console/add_office'); ?>" class="btn btn-primary btn-icon icon-left" ><i class="fa fa-plus-circle"></i> Add New Office</a>
        </div>
        <?php $this->load->view($alert_msg); ?>
    </div>
    <div class="panel-body">
        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Office ID</th>
                <th>Office Name</th>
                <th>Organization</th>
                <th>Upozilla</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>125478</td>
                    <td>Offc 1</td>
                    <td>Org 1</td>
                    <td>Up 1</td>
                    <td> <span class="label label-success">Active</span> </td>
                    <td><a href="<?php echo base_url('app_console/edit_office/'.'9'); ?>" class="btn btn-secondary btn-sm btn-icon icon-left">Edit</a> <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a> </td>
                </tr>
                <tr>
                    <td>125479</td>
                    <td>Offc 2</td>
                    <td>Org 2</td>
                    <td>Up 2</td>
                    <td> <span class="label label-warning">Inactive</span> </td>
                    <td><a href="<?php echo base_url('app_console/edit_office/'.'10'); ?>" class="btn btn-secondary btn-sm btn-icon icon-left">Edit</a> <a href="" class="btn btn-danger btn-sm btn-icon icon-left" onclick="return office_delete();">Delete</a> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function($) {
        $("#example-1").dataTable({
            aLengthMenu: [
                [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
            ]
        });
    });


    function office_delete() {
        var check = confirm('Are You Sure To Delete Office!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
</script>