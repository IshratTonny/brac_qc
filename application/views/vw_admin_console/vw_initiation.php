
<div>
    <!-- left side table 2nd -->
    <div class="panel panel-default" style ="width: 50%; text-align:center; float: right;">
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
                    <th  style ="text-align:center;">PRODUCT GROUP</th>


                </tr>
                </thead>



                <tbody>

                <tbody>
            </table>
        </div>
    </div>
    <!-- lift side 1st table -->
    <div class="panel panel-default" style ="width: 50%; text-align:center; float: left;">
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

                    <th style ="text-align:center;">CATEGORY</th>

                </tr>
                </thead>
                <tbody class="member">

                </tbody>
            </table>



            </table>
        </div>
    </div>



    <script>


        $(document).ready(function ()
        {
          

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

                'autoWidth': false,
                'lengthChange': false,
                'ordering': false,
                "bDestroy": true,

            });

        }

    </script>
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
            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#item_tbl").dataTable({

                    });

                    // Replace checkboxes when they appear
                    var $state = $("#item_tbl thead input[type='checkbox']");

                    $("#item_tbl").on('draw.dt', function()
                    {
                        cbr_replace();

                        $state.trigger('change');
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


            <table class="table table-bordered table-striped" id="item_tbl" >
                <thead>
                <tr>
                    <th class="no-sorting" style ="text-align:center;">
                        <input type="checkbox" class="cbr">
                    </th>
                    <th style ="text-align:center;">ITEMS</th>
                    <th style ="text-align:center;">STATUS</th>
                    <th style ="text-align:center;">Actions</th>
                </tr>
                </thead>

                <tbody class="middle-align">


                </tbody>
            </table>

        </div>
    </div>

</div>






