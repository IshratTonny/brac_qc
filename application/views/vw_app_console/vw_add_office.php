<div class="page-title">
    <div class="title-env">
        <h1 class="title">Add New Office</h1>
        <p class="description"></p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="dashboard-1.html"><i class="fa-cog"></i>App Console</a>
            </li>
            <li class="">
                <a href="extra-gallery.html">Office</a>
            </li>
            <li class="active">
                <a href="extra-gallery.html">Add Office</a>
            </li>
        </ol>
    </div>
</div>
<?php $this->load->view($alert_msg); ?>
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
        <h4>Add New Office</h4>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Office ID</label>
                <input type="text" name="office_id" id="office_id" class="form-control" placeholder="Ex: 2014521">
            </div>
            <div class="form-group">
                <label for="">Office Name</label>
                <input type="text" name="office_name" id="office_name" class="form-control" placeholder="Ex: Abc Office">
            </div>
            <div class="form-group">
                <label for="">Division</label>
                <select name="org" id="org" class="form-control">
                    <option value="-1">Select Division</option>
                    <option value="-1">Dhaka</option>
                    <option value="-1">Chittagong</option>
                    <option value="-1">Rahshahi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">District</label>
                <select name="org" id="org" class="form-control">
                    <option value="-1">Select Division</option>
                    <option value="-1">Dhaka</option>
                    <option value="-1">Chittagong</option>
                    <option value="-1">Rahshahi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Upozilla</label>
                <select name="upozilla" id="upozilla" class="form-control">
                    <option value="-1">Select Upozilla</option>
                    <option value="-1">Upozilla 1</option>
                    <option value="-1">Upozilla 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Organization</label>
                <select name="org" id="org" class="form-control">
                    <option value="-1">Select Organization</option>
                    <option value="-1">Org 1</option>
                    <option value="-1">Org 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Office Phone Number</label>
                <input type="text" name="office_phone_number" id="office_phone_number" class="form-control" placeholder="015 248 554 758">
            </div>
            <div class="form-group">
                <label for="">Office Address</label>
                <textarea name="office_address" id="office_address" cols="" rows="4" placeholder="Ex: Road 21, Block- B, Banani, Dhaka-1213" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="upozilla" id="upozilla" class="form-control">
                    <option value="-1">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Office Latitude</label>
                <input type="text" name="office_lat" id="office_lat" class="form-control" placeholder="97.0125542">
            </div>
            <div class="form-group">
                <label for="">Office Longitude</label>
                <input type="text" name="office_lon" id="office_lon" class="form-control" placeholder="43.5214557">
            </div>

            <input type="submit" name="save_office" id="save_office" value="Save Office Info" class="btn btn-primary">

        </form>
    </div>
</div>

<script type="text/javascript">

</script>