<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">All Items</h3>

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

        <!-- add something here for item table -->



        <div>

            <div class="table_2-wrapper-scroll-y my-custom-scrollbar" >

                <table class="table table-bordered table-striped mb-0"  id="reqtablenew">

                    <tr>
                        <th  bgcolor="black">CATEGORY</th>
                    </tr>

                    <tbody class="member">

                    <?php foreach($all_category as $category): ?>

                        <tr >
                        <td class="texting" ><?php echo $category->category_name; ?></td>
                        </tr>
                    </thead>
                    <?php endforeach; ?>

                    </tbody>
                </table>

                <script>

                    $(".texting").click(function()
                    {

                        var $row = $(this).closest("tr");
                        var $category = $row.find(".texting").text();


                        $(document).ready(function () {
                            $('#reqtablenew tr').click(function () {
                                $('#reqtablenew tr').removeClass("active");
                                $(this).addClass("active");
                            });
                        });

                        $.ajax
                        ({
                            url: 'ajax_call_for_product',
                            data:  {category_name: $category},
                            type: 'post',
                            success: function(response)
                            {
                                var obj = $.parseJSON(response);
                                var trHTML = '';
                                var thHtml='';
                                $(obj).each(function(i)
                                {
                                    thHtml = '<tr>' +
                                        '<th bgcolor="black">' + "product list" +
                                        '</th>' +
                                        '</tr>';
                                    trHTML += '<tr>' +
                                        '<td class="product_list">' + this.product_name +
                                        '</td>' +
                                        '</tr>';
                                });
                                trHTML =thHtml+  trHTML;
                                $('#records_table').html( trHTML);

                                $(".product_list").click(function()
                                {
                                    var $row_2 = $(this).closest("tr");
                                    var $text_2 = $row_2.find(".product_list").text();

                                    $(document).ready(function () {
                                        $('#records_table tr').click(function () {
                                            $('#records_table tr').removeClass("active_2");
                                            $(this).addClass("active_2");
                                        });
                                    });

                                    $.ajax
                                    ({
                                        url: 'ajax_call_for_item',
                                        data:  {product_name: $text_2},
                                        type: 'post',
                                        success: function(response_2)

                                        {
                                            //alert(response_2);
                                            //var obj = $.parseJSON(response);

                                            var obj_2 = $.parseJSON(response_2);
                                            var trHTML_2 = '';
                                            var thHtml_2='';
                                            document.getElementById("demo").innerHTML = "";
                                            if (obj_2.length == 0 )
                                            {
                                                document.getElementById("demo").innerHTML = "NO DATA FOUND";
                                            }
                                            $(obj_2).each(function(j)
                                            {

                                                thHtml_2 =


                                                    '<tr>' +
                                                    '<th class="no-sorting">' +
                                                    "<input type=\"checkbox\" onClick=\"toggle(this)\" /> <br/>" +
                                                    '</th>' +
                                                    '<th bgcolor="black">' + "ITEM" +
                                                    '</th>' +
                                                    '<th bgcolor="black">' + "STATUS" +
                                                    '</th>' +
                                                    '<th bgcolor="black">' + "ACTION" +
                                                    '</th>' +
                                                    '</tr>';

                                                trHTML_2 += '<tr>' +
                                                     '<td class="no-sorting">' +   '<input type="checkbox" name="foo" value="bar1"> <br/>' +
                                                    '</td><td class="product_list">'+ this.item_name +
                                                     '</td><td class="product_list">'+ this.item_status +
                                                     '</td><td class="product_list">'+   '<a href="#" class="btn btn-info btn-sm btn-icon icon-left">'
                                               + "VIEW"+
                                                '</a>' +
                                                     '</td>'+
                                                      '</tr>';
                                            });
                                            trHTML_2 =thHtml_2 +  trHTML_2;
                                            $('#records_table_2').html( trHTML_2);

                                            //add something here for item table
                                            $('input[name="foo"]').on('change', function()
                                            {
                                                $(this).closest('#records_table_2 tr').toggleClass('yellow', $(this).is(':checked'));
                                            });



                                        }
                                    });

                                });
                            }
                        });
                    });


                    function toggle(source)
                    {
                        checkboxes = document.getElementsByName('foo');

                        for(var i=0, n=checkboxes.length;i<n;i++)
                        {
                            checkboxes[i].checked = source.checked;


                        }

                    }




                </script>



            </div>
            <!-- left side tablem -->

            <div class="table-wrapper-scroll-y my-custom-scrollbar" >

                <table class="table table-bordered table-striped mb-0"  id='records_table'  >

                    <tr>
                        <th  bgcolor="black">Product Group</th>

                    </tr>
                    <tbody>



                    <?php foreach($get_all_product as $product): ?>
                        <tr>
                            <td class="product_list" ><?php echo $product->product_name; ?></td>

                        </tr>
                    <?php endforeach; ?>
                    <tbody>

                </table>



            </div>

        </div>

        <div >
            <div >
                  <h1><br><br><br><br><br><br></h1>
            </div>

            <!-- third table here -->



            <div  class="table_2-wrapper-scroll-y my-custom_2-scrollbar" >
                <table class="table table-bordered table-striped mb-0"  id='records_table_2'  >

                    <h2 id="demo"></h2>
                    <tr>
                        <th class="no-sorting">
                          <!--  <input type="checkbox" class="cbr"> -->
                            <input type="checkbox" onClick="toggle(this)" /> <br/>
                        </th>
                        <th  bgcolor="black">ITEMS</th>
                        <th bgcolor="black" >STATUS</th>
                        <th bgcolor="black">ACTION</th>
                    </tr>
                    </tbody>
                    <?php foreach($get_all_item as $item): ?>

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
                            </td>

                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>


        </div>


        </div>




        </tbody>
        </table>

    </div>
    <div >
        <h1></h1>
    </div>
    <button class="delet_button_position" type="button">DELETE ITEMS</button>
</div>
<style>
.my-custom-scrollbar
{

height: 180px;
overflow: auto;
width: 50%;

}
.my-custom_2-scrollbar {

height: 180px;
overflow: auto;
width: 100%;

}
.table-wrapper-scroll-y {

float: right;

}
.table_2-wrapper-scroll-y {

float: left;

}
.delet_button_position {

background-color: black;
float: right;
height:30px;
width:120px;


left: 50px;
right: 50px;
bottom: -191px;

}

tr:hover td {background:#808080}

tr.active td { background-color: #8fc3f7;}
tr.active_2 td { background-color: #8fc3f7;}
tr.yellow td { background-color: #8fc3f7;}
</style>
