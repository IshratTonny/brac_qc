
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

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#product_tbl").dataTable({
                        aLengthMenu: [
                            [5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "All"]
                        ]
                    });
                });
            </script>

            <table id="product_tbl" class="table table-striped table-bordered" cellspacing="0" >
                <thead>
                <tr>
                    <th  style ="text-align:center;">PRODUCT GROUP</th>


                </tr>
                </thead>



                <tbody>

                <?php foreach($all_product as $product): ?>
                    <tr>

                        <td class="product_list" ><?php echo $product->product_name; ?></td>
                        <input type="hidden" class="product_id" value=<?php echo $product->product_id; ?> >


                    </tr>
                <?php endforeach; ?>
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

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#category_tbl").dataTable({
                        aLengthMenu: [
                            [5, 10,15, 25,50, 100, -1], [5, 10,15,25, 50, 100, "All"]
                        ]
                    });
                });
            </script>

            <table id="category_tbl" class="table table-striped table-bordered" cellspacing="0" >
                <thead>
                <tr>

                    <th style ="text-align:center;">CATEGORY</th>

                </tr>
                </thead>
                <tbody class="member">

                <?php foreach($all_category as $category): ?>

                <tr >
                    <td class="category_row" id="category_row"><?php echo $category->category_name; ?>
                        <input type="hidden" class="catagoery_id" value=<?php echo $category->category_id; ?> >
                    </td>
                </thead>

                <?php endforeach; ?>

                </tbody>
            </table>



            </table>
        </div>
    </div>
    <script>


        $(".category_row").click(function()
        {
            //row click retrive primary key
            var $row = $(this).closest("tr");
            var btn = $(this),
                row = btn.parents('td').first();
            $category_id = $row.find('.catagoery_id').val(),

                $.ajax
                ({
                    url: 'ajax_call_for_product',
                    data:  {category_id: $category_id},
                    type: 'post',
                    success: function(response)
                    {
                        var obj = $.parseJSON(response);
                        var trHTML = '';
                        var thHtml='';
                        $(obj).each(function(i)
                        {
                            thHtml = '<tr>' +
                                '<th style ="text-align:center;">' + "product list" +
                                '</th>' +
                                '</tr>';
                            trHTML += '<tr>' +
                                '<td id="product_row" class="product_row">' + this.product_name +
                                '<input type="hidden" class="product_id" value= "' + this.product_id + '"  >'+

                            '</td>' +
                                '</tr>';
                        });
                        trHTML =thHtml+trHTML;
                            $('#product_tbl').html(trHTML);

                        $(".product_row").click(function()
                        {
                           //retrive product id primary key
                            var $row_2 = $(this).closest("tr");
                            var btn_2 = $(this),
                                row_2 = btn_2.parents('td').first();
                            $product_id = $row_2.find('.product_id').val(),
                                //alert($product_id);
                                $.ajax
                                ({
                                    url: 'ajax_call_for_item',
                                    data:  {product_id:  $product_id},
                                    type: 'post',
                                    dataType: "json",
                                    success: function (data, status)
                                    {

                                        var table = $('#item_tbl').DataTable();
                                         table.clear();
                                         var array = $.map(data, function (key)
                                         {
                                            return key;
                                         });
                                        $.each(array, function( index, value ) {
                                            //alert(index);
                                             row = table.row.add([

                                                 array[index]['item_name'],
                                                 array[index]['item_status'],
                                                 array[index]['item_id']

                                            ]);
                                            row.draw();
                                        });
                                    },
                                });


                        });


                    }
                });
        });

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
                    $("#example-2").dataTable({

                    });

                    // Replace checkboxes when they appear
                    var $state = $("#example-2 thead input[type='checkbox']");

                    $("#example-2").on('draw.dt', function()
                    {
                        cbr_replace();

                        $state.trigger('change');
                    });

                    // Script to select all checkboxes
                    $state.on('change', function(ev)
                    {
                        var $chcks = $("#example-2 tbody input[type='checkbox']");

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

                <?php foreach($all_item as $item): ?>

                    <tr>
                        <td>
                            <!--    <input type="checkbox" class="cbr">-->
                            <input type="checkbox" name="foo" value="bar1"> <br/>
                        </td>
                        <td><?php echo $item->item_name; ?></td>
                        <td><?php echo $item->item_status; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                VIEW
                            </a>
                            <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                Delete
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>






