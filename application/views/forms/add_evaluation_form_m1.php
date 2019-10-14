<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <div class="title-env">
                <h3 class="title">Add Evaluation Form</h3>
                <p class="description"></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-3" style="margin-left: 72%">
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        $("#sboxit-2").selectBoxIt({
                            showFirstOption: false
                        }).on('open', function () {
                            // Adding Custom Scrollbar
                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                        });
                    });
                </script>
                <select class="form-control" id="sboxit-2" name="form_no">
                    <option value="">Forms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                </select>
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
    $(document).ready(function () {
        add_set(1);
    });
    $('#sboxit-2').on('change', function () {
        var forms = this.value;
        // alert(forms);
        add_set(forms);
    });
    function add_set(forms) {
        var new_set = "";
        for (var i = 0; i < forms; i++) {
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
                '<h4>Set '+(i+1)+' </h4>' +
                '</div>' +
                '<div class="panel-body">' +
                '<div class="form-group">' +
                '<input type="text" name="question_title'+(i+1)+'[]" id="question_title[]" class="form-control"' +
                'data-validate="required" placeholder="Set Title">' +
                '</div>' +
                '<div class="form-group">' +
                '<input type="text" name="question'+(i+1)+'[]" id="question[]" class="form-control" data-validate="required"' +
                'placeholder="Type Question">' +
                '</div>' +
                '<a href="javascript:void(0)" id="question_add_button'+(i+1)+'" class="btn btn-blue"' +
                'onclick="add_question(this.id)"><span>Add Question</span></a>' +
                '<hr>' +
                '</div>' +
                '</div>';
        }
        $('#filtered_input').html(new_set);
    }
    function add_question(id) {
        var question_id = id.split('question_add_button');
        var question_input = '<div class="form-group">' +
            '<input type="text" name="question'+question_id[1]+'[]" id="question[]" data-validate="required" class="form-control" placeholder="Type Question">' +
            '</div>';
        $('#' + id + '').before(question_input);
    }
</script>