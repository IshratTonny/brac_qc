<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <div class="title-env">
                <h3 class="title">Add Evaluation Form</h3>
                <p class="description"></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-3" style="margin-left: 68%">
                <div class="vertical-top">
                    <button class="btn btn-blue btn-icon btn-icon-standalone" onclick="add_set()">
                        <i class="fa-plus"></i>
                        <span>Add Set</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view($alert_msg); ?>
<!-- Basic Setup -->
<form action="" method="POST" id="evaluation_form" class="validate">
    <div id="filtered_input">

    </div>
    <div class="col-md-offset-5">
        <button type="submit" id="submit_button" class="btn btn-primary">Submit</button>
    </div>
</form>

<script type="text/javascript">
    var row_number = 0;
    var set_number = 0;
    $(document).ready(function () {
        add_set();
    });
    $('#sboxit-2').on('change', function () {
        var forms = this.value;
        //add_set(forms);
    });

    function add_set() {
        set_number++;
        var new_set = "";
        new_set += '<div class="panel panel-default">' +
            '<div class="panel-heading">' +
            '<div class="panel-options">' +
            '<a href="#" data-toggle="panel">' +
            '<span class="collapse-icon">&ndash;</span>' +
            '<span class="expand-icon">+</span>' +
            '</a>' +
            '<a href="#" data-toggle="remove">\n' +
            '&times;\n' +
            '</a>' +
            '</div>' +
            '<h4>Set ' + set_number + ' </h4>' +
            '</div>' +
            '<div class="panel-body">' +
            '<div class="col-sm-11">' +
            '<div class="form-group">' +
            '<input type="text" name="question_title' + set_number + '[]" id="question_title[]" class="form-control"' +
            'data-validate="required" placeholder="Set Title">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-11">' +
            '<div class="form-group">' +
            '<input type="text" name="question' + set_number + '[]" id="question[]" class="form-control" data-validate="required"' +
            'placeholder="Type Question">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-11">' +
            '<button type="button" id="question_add_button' + set_number + '" onclick="add_question(this.id)" class="btn btn-secondary btn-icon btn-icon-standalone btn-sm">' +
            '<i class="fa-plus"></i>' +
            '<span>Add Question</span>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#filtered_input').append(new_set);
    }

    function add_question(id) {
        row_number++;
        var question_id = id.split('question_add_button');
        var question_input = '<div class="row" id="question_row' + row_number + '">' +
            '<div class="col-sm-11">' +
            '<div class="form-group">' +
            '<input type="text" name="question' + question_id[1] + '[]" id="question[]" data-validate="required" class="form-control" placeholder="Type Question">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-1">' +
            '<button type="button" onclick="delete_question(\'question_row' + row_number + '\')" class="btn btn-icon btn-red">x</button>' +
            '</div>' +
            '</div>';
        $('#' + id + '').before(question_input);
    }

    function delete_question(id) {
        //alert(id);
        $('#' + id).remove();
    }
</script>