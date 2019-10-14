<!-- static part -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <div class="title-env">
                <h3 class="title">Brac QC</h3>
<!--                <button type="button" onclick="show_array()">bb</button>-->
                <p class="description"></p>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view($alert_msg); ?>
<!-- Basic Setup -->
<form action="from_manage" method="POST" id="evaluation_form" class="validate">
    <div class="page-title">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-offset-1">
                        <!-- static part here -->

                        <div class="form-group">
                            <label class="control-label" for="form_name">Form Name</label>
                            <input class="form-control" name="form_name" id="form_name" data-validate="required"
                                   placeholder="Enter Form Name"/>
                        </div>

                    </div>
                </div>
                <div class="col-md-2" style="margin-left: 5%">
                    <div class="form-group">
                        <label class="control-label">Points</label>

                        <select class="form-control" id="total_points" onchange="check_point(this.id)" name="total_points">
                            <option>Select Points</option>
                           <!-- point value come from database -->
                            <?php foreach ($point_value as $row) { ?>
                                <option value="<?= $row ?>"><?= $row ?></option>
                            <?php } ?>
                        </select>

                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#total_points").selectBoxIt({
                                    showFirstOption: false
                                }).on('open', function () {
                                    // Adding Custom Scrollbar
                                    $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                });
                            });
                        </script>
                    </div>
                </div>
                <input type="hidden" name="set_value" id="set_value">
                <div class="col-md-3">
                    <div class="vertical-top" style="margin-top: 8%; margin-left: 45%">
                        <button type="button" class="btn btn-blue btn-icon btn-icon-standalone" onclick="add_set()">
                            <i class="fa-plus"></i>
                            <span>Add Set</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="filtered_input">

    </div>
    <div class="col-md-offset-5">
        <button type="submit" id="submit_button" class="btn btn-primary">Submit</button>
    </div>
</form>

<script type="text/javascript">
    //variable declar in javascript
    var row_number = 0;
    var set_number = 0;
    //array declar system in javascript
    var set = [];
    var edited_questions_list = [];
    var editable_points_list = [];
    //without calling add_set here my code correctly work
    //so why need this part
    $(document).ready(function () {
        add_set();
        //goto add_set function
    });
   //problem this part
    $('#sboxit-2').on('change', function () {
        var forms = this.value;
        //add_set(forms);
    });
    //end
    function check_point(id) {
        var temp_set_id = id.split('total_points');
        distribute_points('set_'+temp_set_id[1]+'');
    }
    function set_value(id) {

        var set_id = id.split('total_points');

        var old_value = parseInt($('#set_questions'+set_id[1]).val());

        if(old_value == 0)
        {
            $('#set_questions'+set_id[1]).val(1);
        }
        else{
            $('#set_questions'+set_id[1]).val(old_value+1);
        }
    }
   //done this part
    function add_set() {
        var option_list = [];
        //set all value put in this function

        for (var m = 1; m <= 100; m++)
        {
            option_list.push(m);
        }
        //alert(option_list[0]);
        set_number++;
        var new_set = "";
        new_set +=
            '<div id="set_id' + set_number + '">' +
            '<div class="col-sm-1" style="margin-top: 10%">' +
            '<span class="badge badge-default">' + set_number + '</span>' +
            '</div>' +
            '<div class="col-sm-11">' +
            '<div class="panel panel-color panel-gray">' +
            '<div class="panel-heading">' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<input class="form-control" name="title' + set_number + '" id="title' + set_number + '" data-validate="required" placeholder="Type Set Title"/>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="input-group input-group-sm input-group-minimal">' +
            '<select class="form-control" id="total_points' + set_number + '" name="total_points' + set_number + '" onchange="check_point(this.id)">';

          // console.log(new_set);

        for (var i = 0; i < option_list.length; i++)
        {
            new_set += '<option value="' + option_list[i] + '">' + option_list[i] + '</option>';
        }
      //  console.log(new_set)
        new_set += '</select>' +
            '<input type="hidden" name="set_questions'+set_number+'" id="set_questions'+set_number+'" value="0">'+
            '<input type="hidden" name="delete_id'+set_number+'" id="delete_id'+set_number+'" value="0">'+
            '<input type="hidden" name="set_id_'+set_number+'_edited" id="set_id_'+set_number+'_edited" value="0">'+
            '<input type="hidden" name="set_id_'+set_number+'_edited_points" id="set_id_'+set_number+'_edited_points" value="0">'+
            '</div>' +
            '</div>' +
            '<div class="panel-options">' +
            '<button type="button" id="question_add_button' + set_number + '" onclick="add_question(\'question_div' + set_number + '\')"' +
            'class="btn btn-secondary btn-icon btn-icon-standalone btn-sm">' +
            '<i class="fa-plus"></i>' +
            '<span>Add Question</span>' +
            '</button>' +
            '<button type="button" id="question_add_button' + set_number + '" onclick="delete_set(\'set_id' + set_number + '\')"' +
            'class="btn btn-red btn-icon btn-icon-standalone btn-sm">' +
            '<i class="fa-plus"></i>' +
            '<span>Delete</span>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '<div class="panel-body">' +
            '<div id="question_div' + set_number + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        //console.log(new_set);

        $('#filtered_input').append(new_set);
    }
    function make_editable(id) {
        if(edited_questions_list.length > 0)
        {
            for(var eq = 0; eq < edited_questions_list.length; eq++)
            {
                if(id == edited_questions_list[eq])
                {
                    alert('This question point is already edited!');
                }
                else{
                    $('#'+id+'').prop("readonly", false);
                }
            }
        }
        else{
            $('#'+id+'').prop("readonly", false);
        }
    }

    function make_readonly(id) {
        var s_id = id.split('set_');
        s_id = s_id[1].split('_point_');
       // alert(s_id[0]);
        var p_edited = parseInt($('#'+id).val());
        //alert(p_edited);
        var old_edited_value = parseInt($('#set_id_'+s_id[0]+'_edited').val());
        $('#set_id_'+s_id[0]+'_edited').val(old_edited_value+1);
        var old_total_edited_points = parseInt($('#set_id_'+s_id[0]+'_edited_points').val());
        $('#set_id_'+s_id[0]+'_edited_points').val(old_total_edited_points + p_edited);
        //alert($('#set_id_'+s_id[0]+'_edited_points').val());
        var get_index = editable_points_list.indexOf(id);
        editable_points_list.splice(get_index, 1);
        edited_questions_list.push(id);
        $('#'+id+'').prop("readonly", true);
        distribute_points_after_edit(s_id[0], s_id[1]);
    }
    function add_question(id)
    {

        var question_id = id.split('question_div');
        var set_old_value = parseInt($('#set_questions'+question_id[1]).val());

        if(set_old_value == 0)
        {
            row_number = 1;
        }
        else
            {
            row_number++;
            }

        set_value('total_points'+question_id[1], set);

        var question_input = '<div class="row" id="set_row_'+question_id[1]+'_question_row_' + row_number + '">' +
            '<div class="col-md-6">' +
            '<label class="control-label" for="birthdate">Question</label>' +
            '<div class="form-group">' +
            '<input type="text" name="set_' + question_id[1] + '_question_'+row_number+'" id="set_' + question_id[1] + '_question_'+row_number+'" class="form-control" data-validate="required" placeholder="Type Question">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '<div class="form-group">' +
            '<label class="control-label" for="birthdate">Set Point</label>' +
            '<div class="input-group input-group-sm input-group-minimal">' +
            '<span class="input-group-addon">' +
            '<i class="fa-sort-numeric-desc"></i>' +
            '</span>' +
            '<input type="text" class="form-control" ondblclick="make_editable(this.id, this.value)" readonly id="set_' + question_id[1] + '_point_'+row_number+'" name="set_' + question_id[1] + '_point_'+row_number+'" data-mask="999" placeholder="Three Numbers"/>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2" style="margin-top: 3%">' +
            '<div class="col-md-1">' +
            '<div class="form-group">' +
            '<button type="button" onclick="make_readonly(\'set_'+question_id[1]+'_point_'+row_number+'\')" style="" class="btn btn-icon btn-purple btn-xs"><i class="fa-check"></i></button>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-1">' +
            '<input type="checkbox" style="margin-top: 25%" checked class="iswitch iswitch-secondary">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="form-group">' +
            '<button type="button" style="margin-top: 25%" onclick="delete_question(\'set_row_'+question_id[1]+'_question_row_' + row_number + '\', '+question_id[1]+', \'set_'+question_id[1]+'_question_'+row_number+'\')" class="btn btn-icon btn-red">x</button>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-12">' +
            '<label class="control-label" for="birthdate">Preferable Answer</label>' +
            '<div class="form-group">' +
            '<div class="col-md-10">' +
            '<label class="radio-inline">' +
            '<input type="radio" name="question_option' + row_number + '" checked id="question_option' + row_number + '">' +
            'Yes' +
            '</label>' +
            '<label class="radio-inline">' +
            '<input type="radio" name="question_option' + row_number + '" id="question_option'+row_number+'">' +
            'No' +
            '</label>' +
            // '<label class="radio-inline" id="option_add_button'+row_number+'" onclick="add_option(\'question_option' + row_number + '\', this.id)" >' +
            // '<button type="button" style="margin-top: 25%" class="btn btn-icon btn-purple">' +
            // '<i class="fa-plus"></i>' +
            // '</label>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#' + id + '').append(question_input);
        editable_points_list.push('set_'+question_id[1]+'_point_'+row_number);
        distribute_points('set_' + question_id[1] + '_question_'+row_number);
    }

    function delete_set(id)
    {
        $('#' + id).remove();
    }

    function delete_question(id, set_value, distribute_mark_id) {

        var previous_value = parseInt($('#set_questions'+set_value+'').val());
        $('#set_questions'+set_value+'').val(previous_value-1);
        $('#delete_id'+set_value+'').val(id);
        $('#' + id).remove();
        alert(distribute_mark_id);
        distribute_points(distribute_mark_id);
    }

    function check_number(id) {
        //alert(id);
        var tmp_num = $('#' + id).val();
        tmp_num = tmp_num.replace(/\s+/g, '');

        $('#' + id).val(tmp_num);
        var tmp_num = $('#' + id).val();
        if (tmp_num == null || isNaN(tmp_num)) {
            var x = document.getElementById(id);
            x.value = x.value.replace(/[^0-9]/, '');
        }
    }

    function add_option(id, button_id) {
       // alert(button_id);
        var new_option = '<label class="radio-inline">' +
            '<input type="radio" name="' + id + '" checked id="=' + id + '">' +
            'Option' +
            '</label>';
        $('#'+button_id+'').before(new_option);
    }

    function distribute_points(id) {
        var temp = id.split('set_');
        var set_id = temp[1].split('_');
        var s_point = $('#total_points'+set_id).val();
        var total_questions = $('#set_questions'+set_id).val();
        var get_point = s_point/total_questions;
        // var t_question = id.split('set_'+set_id[0]+'_question_');
        var temp_del_id = $('#delete_id'+set_id+'').val();
        var temp_id = temp_del_id.split('set_row_'+set_id[0]+'_question_row_');
        if(total_questions > 0)
        {
            for(var tt = 1; tt <= total_questions+1; tt++)
            {
                if(tt == temp_id[1])
                {
                    temp_id[1];
                }
                else{
                    $('#set_'+set_id[0]+'_point_'+tt+'').val(get_point);
                }
            }
        }
    }
    function distribute_points_after_edit(set_id, point_id) {
        var s_point = parseInt($('#total_points'+set_id).val());
        var total_questions = parseInt($('#set_questions'+set_id).val());
        var edited_point_value = parseInt($('#set_id_'+set_id+'_edited_points').val());
        var edited_questions = parseInt($('#set_id_'+set_id+'_edited').val());
        var temp_point = s_point- edited_point_value;
        var get_point = temp_point/(total_questions-edited_questions);
        var is_edited = 0;
        //alert(get_point);
        var temp_id = point_id;
        alert(edited_questions_list.length);
        if(total_questions > 0)
        {
            for(var tt = 1; tt <= total_questions+1; tt++)
            {
                var is_edited = 0;
                var temp = 'set_'+set_id+'_point_'+tt;
                var pp = 0;
                for(var pp = 0; pp < edited_questions_list.length; pp++)
                {
                    //alert(edited_questions_list[pp]);
                    if(temp == edited_questions_list[pp])
                    {
                        is_edited = 1;
                    }
                }
                if(is_edited == 0)
                {
                    $('#set_'+set_id+'_point_'+tt+'').val(get_point);
                }
            }
        }
    }

    function show_array() {
        alert(edited_questions_list);
    }
</script>