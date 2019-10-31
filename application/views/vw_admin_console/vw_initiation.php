
<div>
<div>


    <!-- lift side 1st table -->
    <div class="panel panel-default" style ="width: 49.6%; text-align:center; float: left;">
        <div class="panel-heading">
            <h4 class="panel-title">All Items</h4>


            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>

        <div class="panel-body">



            <table id="category_tbl" class="table table-striped table-bordered" cellspacing="0" >
                <thead>
                <tr>

                    <th id="category_id" style ="text-align:center;">CATEGORY</th>

                </tr>
                </thead>
                <tbody class="member">

                </tbody>
            </table>



            </table>
        </div>
    </div>
</div>
    <!-- left side table 2nd -->
    <div>
    <div class="panel panel-default" style ="width: 47%; text-align:center; float: right ; ">
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
        </div>

        <div class="panel-body">




            <table id="product_tbl" class="table table-striped table-bordered" cellspacing="0" >
                <thead>
                <tr>
                    <th  style ="text-align:center; background-color: black ; color: white">PRODUCT GROUP</th>


                </tr>
                </thead>



                <tbody>

                <tbody>
            </table>
        </div>
    </div>
    </div>
    <!-- last table -->
    <div class="panel panel-default" style ="width: 100%; text-align:center; float: right;">
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
        </div>
        <div class="panel-body">



            <table class="table table-bordered table-striped" id="item_tbl" >
                <thead>
                <tr>
                    <th class="no-sorting" style ="text-align:center; background-color: black ; color: white">
                        <input type="checkbox" class="cbr">
                    </th>
                    <th style ="text-align:center;  background-color: black ; color: white">ITEMS</th>
                    <th style ="text-align:center;  background-color: black ; color: white">STATUS</th>
                    <th style ="text-align:center;  background-color: black ; color: white">Actions</th>
                </tr>
                </thead>

                <tbody class="middle-align">


                </tbody>
            </table>

        </div>
        <div>

             <!--   <form method="post" action="<?= site_url('edit_items')?>"> -->
            <form method="post" action="">

                <button type="submit" class="btn" name="update_button"  id="update_button"  >Update Items</button>
            </form>
        </div>
    </div>

    <!-- edit button create -->


</div>




<!-- for check box selector -->
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $("#item_tbl").dataTable
        ({
            dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
            aoColumns: [
                {bSortable: false},
                null,
                null,
                null,

            ],
        });

        // Replace checkboxes when they appear
        var $state = $("#item_tbl thead input[type='checkbox']");

        $("#item_tbl").on('draw.dt', function()
        {
            cbr_replace();

            $state.trigger('change');
        });

        //catch multipole check box value

        $().ready(function () {
            $('body').on('click', '#update_button', function () {

                $("#item_tbl tr").each(function () {
                    var rowSelector = $(this);
                    if (rowSelector.find("input[type='checkbox']").prop('checked'))
                    {
                        //THE MARKUP SHOWING THE ID IS NOT AVAILABLE
                        //POST A TABLE ENTRY TO CLEAR UP
                        var id = rowSelector.find('td').first().next().html();
                        var sendObj = {Id : id};
                        alert(id);
                        //USE JSON OBJECT
                        $.ajax({
                            url : '<?= site_url('ajax_call_for_update_item') ?>',
                            dataType: "json",
                            data: sendObj,
                            type: "POST",
                            success: function (response) {
                                alert(response);
                            }
                        });

                    }
                });

            });
        });

        // Script to select all checkboxes
        $state.on('change', function(ev)
        {
            var $chcks = $("#item_tbl tbody input[type='checkbox']");

            if($state.is(':checked'))
            {
                $chcks.prop('checked', true).trigger('change');
            }
            else
            {
                $chcks.prop('checked', false).trigger('change');
            }
        });
    });
</script>
<script>


    $(document).ready(function ()
    {


        document.getElementById('category_id').style.backgroundColor="black";
        document.getElementById('category_id').style.color="white";
        $('#category_tbl').mousedown(function(){
            $(this).css('cursor','pointer');
            return false;
        });
        $('#product_tbl').mousedown(function(){
            $(this).css('cursor','pointer');
            return false;
        });


        $("#category_tbl").DataTable({

            'ajax': {
                'url': '<?= base_url('ajax_call_for_category') ?>',


            },
            "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            'autoWidth': false,
            'lengthChange': false,
            'ordering': false,
            "bDestroy": true,

        });


    });

    function find_product($category_id)
    {




        $("#product_tbl").DataTable({

            'ajax': {
                'url': '<?= base_url('ajax_call_for_product') ?>',
                'type': "POST",
                'data': { 'category_id': $category_id},

            },
            "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            'autoWidth': false,
            'lengthChange': false,
            'ordering': false,
            "bDestroy": true,

        });
    }
    function find_item($product_id)
    {

        $("#item_tbl").DataTable({
            'ajax': {
                'url': '<?= base_url('ajax_call_for_item') ?>',
                'type': "POST",
                'data': { 'product_id': $product_id},

            },
            "aLengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            'autoWidth': false,
            'lengthChange': false,
            'ordering': false,
            "bDestroy": true,

        });

    }
    function delete_item($item_id, $product_select_id)
    {


        $("#item_tbl").DataTable({
            'ajax': {
                'url': '<?= base_url('ajax_call_for_item_delete') ?>',
                'type': "POST",

                'data': { 'item_id': $item_id, 'product_id':  $product_select_id},

            },

            'autoWidth': false,
            'lengthChange': false,
            'ordering': false,
            "bDestroy": true,

        });

    }

</script>