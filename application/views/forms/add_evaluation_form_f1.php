<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <div class="title-env">
                <h3 class="title">Brac QC</h3>
                <p class="description"></p>
            </div>
        </div>
        <!--        <div class="col-sm-6">-->
        <!--            <div class="col-sm-3" style="margin-left: 68%">-->
        <!--                <div class="vertical-top">-->
        <!--                    <button class="btn btn-blue btn-icon btn-icon-standalone" onclick="add_set()">-->
        <!--                        <i class="fa-plus"></i>-->
        <!--                        <span>Add Set</span>-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>
<?php $this->load->view($alert_msg); ?>
<!-- Basic Setup -->
<form action="" method="POST" id="evaluation_form" class="validate">
    <div class="page-title">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label" for="form_name">Form Name</label>
                            <input class="form-control" name="form_name" id="form_name" data-validate="required"
                                   placeholder="Enter Form Name"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="margin-left: 5%">
                    <div class="form-group">
                        <label class="control-label" for="form_points">Points</label>
                        <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="fa-sort-numeric-desc"></i>
										</span>
                            <input type="text" class="form-control" data-mask="999" placeholder="Three Numbers"/>
                        </div>
                    </div>
                </div>
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
        new_set += '<div id="set_id'+set_number+'">'+
            '<div class="col-sm-1" style="margin-top: 10%">' +
            '<span class="badge badge-default">' + set_number + '</span>' +
            '</div>' +
            '<div class="col-sm-11">' +
            '<div class="panel panel-color panel-gray">' +
            '<div class="panel-heading">' +
            '<div class="panel-options">' +
            '<button type="button" id="question_add_button' + set_number + '" onclick="add_question(\'question_div'+set_number+'\')"' +
            'class="btn btn-secondary btn-icon btn-icon-standalone btn-sm">' +
            '<i class="fa-plus"></i>' +
            '<span>Add Question</span>' +
            '</button>' +
            '<button type="button" id="question_add_button' + set_number + '" onclick="delete_set(\'set_id'+set_number+'\')"' +
            'class="btn btn-red btn-icon btn-icon-standalone btn-sm">' +
            '<i class="fa-plus"></i>' +
            '<span>Delete</span>' +
            '</button>' +
            '</div>' +
            '<h4>Set ' + set_number + ' </h4>' +
            '</div>' +
            '<div class="panel-body">' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label class="control-label" for="title">Set Title</label>' +
            '<input class="form-control" name="title' + set_number + '" id="title' + set_number + '" data-validate="required" placeholder="Type Set Title"/>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<div class="form-group">' +
            '<label class="control-label" for="set_point' + set_number + '">Set Point</label>' +
            '<div class="input-group input-group-sm input-group-minimal">' +
            '<span class="input-group-addon">' +
            '<i class="fa-sort-numeric-desc"></i>' +
            '</span>' +
            '<input type="text" name="set_point' + set_number + '" id="set_point' + set_number + '" class="form-control" data-mask="999%" placeholder="Three Numbers"/>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div id="question_div'+set_number+'">'+
            '</div>'+
            '</div>' +
            '</div>' +
            '</div>';
        $('#filtered_input').append(new_set);
    }

    function add_question(id) {
        // alert(id);
        row_number++;
        var question_id = id.split('question_add_button');
        var question_input = '<div class="row" id="question_row' + row_number + '">' +
            '<div class="col-md-6">' +
            '<label class="control-label" for="birthdate">Question</label>' +
            '<div class="form-group">' +
            '<input type="text" name="question' + question_id[1] + '[]" id="question' + question_id[1] + '[]" class="form-control" data-validate="required" placeholder="">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-4">' +
            '<div class="form-group">' +
            '<label class="control-label" for="birthdate">Set Point</label>' +
            '<div class="input-group input-group-sm input-group-minimal">' +
            '<span class="input-group-addon">' +
            '<i class="fa-sort-numeric-desc"></i>' +
            '</span>' +
            '<input type="text" class="form-control" name="question_point' + question_id[1] + '[]" data-mask="999%" placeholder="Three Numbers"/>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="form-group">' +
            '<button type="button" style="margin-top: 25%" onclick="delete_question(\'question_row' + row_number + '\')" class="btn btn-icon btn-red">x</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#' + id + '').append(question_input);
    }

    function delete_set(id) {
        //alert(id);
        $('#'+id).remove();
    }

    function delete_question(id) {
        //alert(id);
        $('#' + id).remove();
    }
</script>