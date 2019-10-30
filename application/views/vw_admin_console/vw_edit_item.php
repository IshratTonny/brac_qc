
<!-- tags input -->

<div class="row">

    <div class="panel-body">

        <form role="form">

            <div class="form-group">
                <label class="control-label" for="tagsinput-1">Items</label>
                <input type="text" class="form-control" id="tagsinput-1" data-role="tagsinput" value="Sample tag, Another great tag, Awesome!"  />
            </div>
        </form>
    </div>

</div>

<!-- add hor horizontal navigation bar -->
<form method="post" action="">
<div class="col-md-6"  style ="width: 100%;">

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#home" data-toggle="tab">
                <span class="visible-xs"><i class="fa-home"></i></span>
                <span class="hidden-xs">Design Status</span>
            </a>
        </li>
        <li>

        </li>
        <li>
            <a href="#profile" data-toggle="tab">
                <span class="visible-xs"><i class="fa-user"></i></span>
                <span class="hidden-xs">Sourcing Status</span>
            </a>
        </li>
        <li>
            <a href="#quotation" data-toggle="tab">
                <span class="visible-xs"><i class="fa-user"></i></span>
                <span class="hidden-xs">Quotation Comparison</span>
            </a>
        </li>
        <li>
            <a href="#messages" data-toggle="tab">
                <span class="visible-xs"><i class="fa-envelope-o"></i></span>
                <span class="hidden-xs">Budgeting</span>
            </a>
        </li>
        <li>
            <a href="#settings" data-toggle="tab">
                <span class="visible-xs"><i class="fa-cog"></i></span>
                <span class="hidden-xs">Quotation Approval</span>
            </a>
        </li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="home">

            <div>
                  <!-- design -->


                <div class="panel-body">

                    <div class="form-group">
                        <table style="width:100%">

                            <tr>
                                <td><label class="control-label">Design</label></td>
                                <td><label><input type="checkbox"> </label></td>
                                <td> <label class="control-label">OR</label></td>
                                <td><textarea   id="text_area" style="width:95%;  height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                               <td> <label class="control-label">Date</td>
                                <td>	<div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                                        <input type="text" class="form-control"  data-mask="date" />
                                    </div></td>
                            </tr>
                            <tr>
                                <td><label class="control-label">BOQ</label></td>
                                <td><label><input type="checkbox"> </label></td>
                                <td> <label class="control-label">OR</label></td>
                                <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                                <td> <label class="control-label">Date</td>
                                <td>
                                    <div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                                        <input type="text" class="form-control"  data-mask="date" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">Specification</label></td>
                                <td><label><input type="checkbox"> </label></td>
                                <td> <label class="control-label">OR</label></td>
                                <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                                <td> <label class="control-label">Date</td>
                                <td>	<div class="input-group input-group-sm input-group-minimal" style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                                        <input type="text" class="form-control"  data-mask="date" />
                                    </div></td>
                            </tr>
                        </table>
                       <!-- &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                       &nbsp;&nbsp; &nbsp;
                        <label class="control-label">Design</label> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        <label><input type="checkbox"> </label>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        <label class="control-label">OR</label>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        <textarea cols="3"  placeholder="Remark (Type Text)" style="width: 20%"></textarea>
                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        <label class="control-label">Date</label>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        <input type="date" name="bday">
-->
                        <br />



                    </div>



                </div>
            </div>

        </div>
        <div class="tab-pane" id="profile">
          <!-- coparison -->
            <table style="width:100%">

                <tr>
                    <td><label class="control-label">Inquiry Sent</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95%;  height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>	<div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div></td>
                </tr>
                <tr>
                    <td><label class="control-label">Quotation Received</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>
                        <div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label class="control-label">Quoation Checking</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>	<div class="input-group input-group-sm input-group-minimal" style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div></td>
                </tr>
            </table>
        </div>
        <div class="tab-pane" id="quotation">
            <!-- budgeting -->
            <table style="width:100%">

                <tr>
                    <td><label class="control-label">Price</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95%;  height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>	<div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div></td>
                </tr>
                <tr>
                    <td><label class="control-label">Specification</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>
                        <div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div>
                    </td>
                </tr>

            </table>
        </div>

        <div class="tab-pane" id="messages">
          <!-- budgeting -->
            <table style="width:100%">

                <tr>
                    <td><label class="control-label">Prepare Quotation </label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95%;  height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>	<div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div></td>
                </tr>
                <tr>
                    <td><label class="control-label">Submission</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>
                        <div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div>
                    </td>
                </tr>

            </table>

        </div>

        <div class="tab-pane" id="settings">
            <!-- luckily -->
            <table style="width:100%">

                <tr>
                    <td><label class="control-label">Negotitation Status</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95%;  height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>	<div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div></td>
                </tr>
                <tr>
                    <td><label class="control-label">Work Order Status</label></td>
                    <td><label><input type="checkbox"> </label></td>
                    <td> <label class="control-label">OR</label></td>
                    <td><textarea   id="text_area" style="width:95% ; height: 2em;"  placeholder="Remark (Type Text)"></textarea></td>
                    <td> <label class="control-label">Date</td>
                    <td>
                        <div class="input-group input-group-sm input-group-minimal"  style="width:50%;">
										<span class="input-group-addon">
											<i class="fa-calendar"></i>
										</span>
                            <input type="text" class="form-control"  data-mask="date" />
                        </div>
                    </td>
                </tr>

            </table>

        </div>
        <button class="btn btn-info" style="   top: 70%; right: 23%">SUBMIT</button>
    </div>


</div>

</form>
