<?php include(app_path() . '/common/panel/header.php'); ?>
<div id="create_report_backdrop" style="display:none">
    <div style="display:flex; align-items: center; justify-content: center; -webkit-tap-highlight-color: transparent; position: fixed; width: 100%; height: 100%; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1500">
        <img src="../images/loader2.gif" style="width: 100px; height: 100px"/>
    </div>
</div>
<div class="app-inner-layout app-inner-layout-page">
    <div class="app-inner-layout__wrapper">
        <div class="app-inner-layout__sidebar">
            <div class="app-layout__sidebar-inner dropdown-menu-rounded">
                <div class="nav flex-column">
                    <div class="nav-item-header text-primary nav-item">
                        Dashboards Examples
                    </div>
                    <a class="dropdown-item active" href="analytics-dashboard.html">Analytics</a>
                    <a class="dropdown-item" href="management-dashboard.html">Management</a>
                    <a class="dropdown-item" href="advertisement-dashboard.html">Advertisement</a>
                    <a class="dropdown-item" href="index.html">Helpdesk</a>
                    <a class="dropdown-item" href="monitoring-dashboard.html">Monitoring</a>
                    <a class="dropdown-item" href="crypto-dashboard.html">Cryptocurrency</a>
                    <a class="dropdown-item" href="pm-dashboard.html">Project Management</a>
                    <a class="dropdown-item" href="product-dashboard.html">Product</a>
                    <a class="dropdown-item" href="statistics-dashboard.html">Statistics</a>
                </div>
            </div>
        </div>
        <div class="app-inner-layout__content pt-0">
            <div class="tab-content">
                <div class="container-fluid">
                    <div class="card mb-3">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            </div>

                            <div class="btn-actions-pane-right actions-icon-btn">
                                <button type="button" class="btn-shadow btn btn-wide btn-success" onclick="$('#form-box').slideToggle()">
                                    <span class="btn-icon-wrapper pr-1 opacity-7">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <?php echo trans('forms.add_new'); ?>
                                </button>
                            </div>

                        </div>
                        <?php if (Session::has('error')) { ?>
                            <p class="alert alert-danger"><?php echo Session::get('error'); ?></p>
                        <?php } ?>
                        <?php if (Session::has('success')) { ?>
                            <p class="alert alert-success"><?php echo Session::get('success'); ?></p>
                        <?php } ?>

                        <div id="form-box" style="display:none;">
                            <div class="main-card mb-2 card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo trans('forms.add_new_course'); ?></h5>
                                    <form class="" action="" method="post" onsubmit="return check_data();">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="type" value="Coaching">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail11" class=""><?php echo trans('forms.title'); ?> <font style="color:red;">*</font></label>
                                                    <input name="title" id="exampleEmail11" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword11" class=""><?php echo trans('forms.begin'); ?> <font style="color:red;">*</font></label>
                                                    <input type="text" class="form-control today_calendar required" name="period" required id="period_field2">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail11" class=""><?php echo trans('forms.coach'); ?> <font style="color:red;">*</font></label>
                                                    <select name="coaches[]" class="form-control select-multiple" required multiple="multiple" style="width:100%;" style="width:100%;">
                                                        <option value=""><?php echo trans('forms.please_select'); ?></option>
                                                        <?php
                                                        if (!empty($coaches)) {
                                                            foreach ($coaches as $coach) {
                                                        ?>
                                                                <option value="<?php echo $coach['coach']->id; ?>"><?php echo $coach['coach']->name; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class=""><?php echo trans('forms.students'); ?> <font style="color:red;">*</font></label>
                                                        <select name="students[]" id="exampleEmail11" class="form-control select-multiple" required multiple="multiple" style="width:100%;">
                                                            <option value=""><?php echo trans('forms.please_select'); ?></option>
                                                            <?php
                                                            if (!empty($students)) {
                                                                foreach ($students as $student) {
                                                            ?>
                                                            <option value="<?php echo $student['student']->id; ?>"><?php echo $student['student']->name; ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>-->


                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword11" class=""><?php echo trans('forms.description'); ?></label>
                                                    <textarea class="form-control" name="description" id="editor"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="accordion" class="accordion-wrapper mb-3 d-none">
                                            <div class="">
                                                <div id="headingOne" class="card-header" style="background:#E2E2E0;">
                                                    <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
                                                        <h5 class="m-0 p-0" style="font-size:18px;"><?php echo trans('forms.select_products_modules'); ?></h5>
                                                    </button>
                                                </div>
                                                <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse" style="">
                                                    <div class="card-body">
                                                        <ul>
                                                            <?php
                                                            if (!empty($products)) {
                                                                foreach ($products as $p) {
                                                                    $p_id = $p['product']->id;
                                                            ?>
                                                                    <li><input type="checkbox" name="products[]" value="<?php echo $p['product']->id; ?>"> <?php echo $p['product']->title . ' (' . trans('forms.lessons') . ': ' . $p['total_lessons'] . ' ' . trans('forms.total_cost') . ': €' . $p['total_cost'] . ')'; ?></li>

                                                                    <ul>
                                                                        <?php
                                                                        if (!empty($p['modules'])) {
                                                                            foreach ($p['modules'] as $m) {
                                                                        ?>
                                                                                <li><input type="checkbox" name="modules<?php echo $p_id; ?>[]" value="<?php echo $m['module']->id; ?>"> <?php echo $m['module']->title . ' (' . trans('forms.lessons') . ': ' . $m['total_lessons'] . ' ' . trans('forms.total_cost') . ': €' . $m['total_cost'] . ')'; ?></li>

                                                                                <ul>
                                                                                    <?php
                                                                                    if (!empty($m['items'])) {
                                                                                        foreach ($m['items'] as $item) {
                                                                                    ?>
                                                                                            <li><input type="checkbox" name="items<?php echo $p_id; ?>[]" value="<?php echo $item['item']->id; ?>"> <?php echo $item['item']->title . ' (' . trans('forms.lessons') . ': <input type="number" name="lessons' . $item['item']->id . '" value="' . $item['item']->lessons . '" style="max-width:60px; padding-top:0px; padding-bottom:0px;" min="0" max="' . $item['item']->lessons . '" required> ' . trans('forms.total_cost') . ': €' . $item['item']->lessons * $item['item']->price_lessons . ')'; ?></li>
                                                                                    <?php }
                                                                                    } ?>
                                                                                </ul>
                                                                        <?php }
                                                                        } ?>

                                                                    </ul>
                                                                    <li style="list-style-type:none; padding-bottom:15px;"></li>
                                                            <?php }
                                                            } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="accordion" class="accordion-wrapper mb-3 d-none">
                                            <div class="">
                                                <div id="headingOne" class="card-header" style="background:#E2E2E0;">
                                                    <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
                                                        <h5 class="m-0 p-0" style="font-size:18px;"><?php echo trans('forms.timetable'); ?></h5>
                                                    </button>
                                                </div>
                                                <div data-parent="#accordion" id="collapseOne2" aria-labelledby="headingOne" class="collapse" style="">
                                                    <div class="card-body">
                                                        <h5><?php echo trans('forms.new_class'); ?></h5>
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class=""><?php echo trans('forms.title'); ?></label>
                                                                    <input type="text" class="form-control" name="class_title" id="class_title" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class=""><?php echo trans('forms.day'); ?></label>
                                                                    <select type="text" class="form-control" name="class_day" id="class_day">
                                                                        <option value=""></option>
                                                                        <option value="Monday">Monday</option>
                                                                        <option value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option value="Saturday">Saturday</option>
                                                                        <option value="Sunday">Sunday</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class=""><?php echo trans('forms.from'); ?></label>
                                                                    <select class="form-control" name="class_from" id="class_from">
                                                                        <option value=""></option>
                                                                        <?php for ($i = 0; $i <= 23; $i++) {
                                                                            if ($i < 10) $num = '0' . $i;
                                                                            else $num = $i;
                                                                        ?>
                                                                            <option value="<?php echo $num . ':00'; ?>"><?php echo $num . ':00'; ?></option>
                                                                            <option value="<?php echo $num . ':30'; ?>"><?php echo $num . ':30'; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class=""><?php echo trans('forms.to'); ?></label>
                                                                    <select class="form-control" name="class_to" id="class_to">
                                                                        <option value=""></option>
                                                                        <?php for ($i = 0; $i <= 23; $i++) {
                                                                            if ($i < 10) $num = '0' . $i;
                                                                            else $num = $i;
                                                                        ?>
                                                                            <option value="<?php echo $num . ':00'; ?>"><?php echo $num . ':00'; ?></option>
                                                                            <option value="<?php echo $num . ':30'; ?>"><?php echo $num . ':30'; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class=""><?php echo trans('forms.notes'); ?></label>
                                                                    <textarea class="form-control" name="class_notes" id="class_notes"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class=""><?php echo trans('forms.room'); ?></label>
                                                                    <select class="form-control" name="class_room" id="class_room">
                                                                        <option value=""></option>
                                                                        <?php
                                                                        if (!empty($rooms)) {
                                                                            foreach ($rooms as $room) {
                                                                        ?>
                                                                                <option value="<?php echo $room['room']->id; ?>" data-name="<?php echo $room['room']->name . ' (' . $room['location'] . ')'; ?>"><?php echo $room['room']->name . ' (' . $room['location'] . ')'; ?></option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="position-relative form-group">
                                                                    <label for="examplePassword11" class="">&nbsp </label>
                                                                    <button type="button" class="btn-shadow btn btn-wide btn-success" style="display:block;" onclick="add_class()">
                                                                        <?php echo trans('forms.add_class'); ?>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <p class="alert alert-danger" id="f_error" style="display:none;"></p>
                                                                <div class="table-responsive">
                                                                    <table class="mb-0 table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo trans('forms.class'); ?></th>
                                                                                <th><?php echo trans('forms.day_time'); ?></th>
                                                                                <th><?php echo trans('forms.notes'); ?></th>
                                                                                <th><?php echo trans('forms.room'); ?></th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="classes-data">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="alert alert-danger" id="course-error" style="display:none;"></p>
                                        <button class="mt-2 btn btn-primary"><?php echo trans('forms.submit'); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table style="width: 100%;" id="example3" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?php echo trans('dashboard.course_name') . ' <br/>& ' . trans('dashboard.description'); ?></th>

                                        <th><?php echo trans('dashboard.total_hours'); ?></th>
                                        <th><?php echo trans('dashboard.total_cost'); ?></th>
                                        <th><?php echo trans('forms.begin'); ?></th>
                                        <!--   <th><?php echo trans('dashboard.added_on'); ?></th>-->
                                        <th><?php echo trans('dashboard.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($courses)) {
                                        foreach ($courses as $course) {
                                    ?>
                                            <tr>
                                                <?php if (isset($course['course']->description)) { ?>
                                                    <td><?php echo $course['course']->title . '<br/>' . $course['course']->description; ?></td>
                                                <?php } else { ?> <td><?php echo $course['course']->title; ?></td><?php  } ?>
                                                <td><?php echo $course['total_lessons']; ?></td>
                                                <td>$<?php echo $course['total_cost']; ?></td>
                                                <td><?php echo date_format(new DateTime($course['course']->beginning), 'd-m-Y'); ?>
                                                </td>
                                                <!-- <td><?php echo date_format(new DateTime($course['course']->added_on), 'd-m-Y'); ?>
                                                            <p style="color:#777;"><?php echo date_format(new DateTime($course['course']->added_on), 'H:i'); ?></p>
                                                        </td>-->
                                                <td>

                                                    <button class="border-0 btn-transition btn btn-outline-success" style="padding-top:1px; padding-bottom:0px;" data-toggle="modal" data-target="#course-<?php echo $course['course']->id; ?>"><i class="fa fa-search"></i></button>


                                                    <a href="<?php echo url('admin/course-appointments/' . $course['course']->id); ?>">
                                                        <button class="border-0 btn-transition btn btn-outline-success" style="padding-top:1px; padding-bottom:0px;"><i class="fa fa-calendar"></i></button>
                                                    </a>

                                                    <a href="<?php echo url('admin/edit-course/' . $course['course']->id); ?>"><button class="border-0 btn-transition btn btn-outline-success">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>

                                                    <?php if ($course['is_created'] == 'true') { ?>
                                                    <a target = '_blank' href="<?php echo $course['report_path'] ?>">
                                                        <button class="border-0 btn-transition btn btn-outline-success" style="padding-top:1px; padding-bottom:0px;"><i class="fa fa-handshake"></i></button>
                                                    </a>                                               
                                                    <?php } else { ?>
                                                    <button class="border-0 btn-transition btn btn-outline-success" style="padding-top:1px; padding-bottom:0px;" data-toggle="modal" data-target="#course-modal-<?php echo $course['course']->id;?>"><i class="fa fa-handshake"></i></button>
                                                    <?php }?>
                                                    
                                                    <?php if($course['is_created'] == 'true'){ ?>
                                                       
                                                       <button class="btn btn-success" onclick="deleteReport(<?php echo $course['course']->id; ?>)">Delete</button>                                                     
                                                       <button class="btn btn-success" onclick="sendReport(<?php echo $course['course']->id; ?>)">Send</button>                                                     
                                                          
                                                    <?php }?> 

                                                    <form action="" method="post" style="display:inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="delete" value="<?php echo $course['course']->id; ?>">
                                                        <input type="hidden" name="type" value="Coaching">
                                                        <button class="border-0 btn-transition btn btn-outline-danger" onclick="return confirm('Do you really want to delete this course?');">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>                                                    

                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include(app_path() . '/common/panel/footer.php'); ?>
<?php
if (!empty($courses)) {
    foreach ($courses as $course) {
?>
    <div class="modal fade" id="course-modal-<?php echo $course['course']->id; ?>" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post" id="course_form_<?php echo $course['course']->id?>" name="course_form_<?php echo $course['course']->id?>" enctype="multipart/form-data">
                    <input type="hidden" name="t_id" value="0" id="task_id">
                    <input type="hidden" name="c_id" value="<?php echo $course['course']->id;?>" id="course_id">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-task"><?php echo trans('dashboard.endreport_documentation_title'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="" style="font-weight:bold">Ziele aus dem AVGS</label>
                                    <textarea class="form-control" name="measure_avgs" id="measure_avgs" placeholder="<?php echo trans(
                                        'forms.write_here'
                                    ); ?>"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="" style="font-weight:bold">Ziele des Kunden</label>
                                    <textarea class="form-control" name="measure_coachee" id="measure_coachee" placeholder="<?php echo trans(
                                        'forms.write_here'
                                    ); ?>"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="Maßnahme" class="" style="font-weight:bold">Konkretes Ergebnis/erbrachte Leistungen<font style="color:red;">*</font></label>
                                <div>
                                    <div style="float: left">Vermittlung?</div>
                                    <div style="float: left; margin-left: 30px">
                                        <div class="position-relative form-group">
                                            <input type="radio" id="yes_radio_<?php echo $course['course']->id ?>" class="" name="vermitting" value="1" checked onchange="handleOnRaidoButtons(<?php echo $course['course']->id ?>)"> Yes
                                        </div>
                                        <div class="position-relative form-group">
                                            <input type="radio" id="no_radio_<?php echo $course['course']->id ?>" class="" name="vermitting" value="0" onchange="handleOnRaidoButtons(<?php echo $course['course']->id ?>)"> No
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" id="textarea_depending_radio_<?php echo $course['course']->id ?>">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <textarea class="form-control" name="vermit_content" id="vermit_content" placeholder="<?php echo trans(
                                        'forms.write_vermittlung_note'
                                    ); ?>"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" id="calendar_depending_radio_<?php echo $course['course']->id ?>">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="examplePassword11" class=""> Wann beginn <font style="color:red;">*</font></label>
                                    <input name="vermit_begin" id="vermit_begin" type="text" class="form-control calendar">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="Maßnahme" class="" style="align:left;  font-weight:bold; margin-top: 20px">Weiterführende Empfehlungen<font style="color:red;">*</font></label>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="" style="font-weight:bold">1. Werden weitere Coachingstunden benötigt, wenn ja, zu welchem Thema?</label>
                                    <textarea class="form-control" name="recommendations_1" id="recommendations_1" placeholder="<?php echo trans(
                                        'forms.write_here'
                                    ); ?>"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="" style="font-weight:bold">2. Was wird dem Coachee empfohlen?</label>
                                    <textarea class="form-control" name="recommendations_2" id="recommendations_2" placeholder="<?php echo trans(
                                        'forms.write_here'
                                    ); ?>"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" id="add-task-close"><?php echo trans('forms.cancel'); ?></button>
                        <button type="button" class="btn btn-primary pull-right" style="margin-right:10px;" id="submit_btn_task" onclick="handleSubmit(<?php echo $course['course']->id;?>, <?php echo $course['is_created'];?>)"><?php echo trans('forms.submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
 <div class="modal fade" id="course-<?php echo $course['course']->id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Course</h4>
                    </div>
                    <div class="modal-body">
                        <ul class='nav nav-tabs mb-3' id='profile-form-tab' role='tablist'>
                            <li class='nav-item'>
                                <a aria-controls='products-<?php echo $course['course']->id; ?>' aria-selected='true' class="nav-link active" data-toggle='tab' href='#products-<?php echo $course['course']->id; ?>' id='products-tab-<?php echo $course['course']->id; ?>' role='tab'>Products</a>
                            </li>
                            <li class='nav-item'>
                                <a aria-controls='timetable-<?php echo $course['course']->id; ?>' aria-selected='false' class="nav-link" data-toggle='tab' href='#timetable-<?php echo $course['course']->id; ?>' id='timetable-tab-<?php echo $course['course']->id; ?>' role='tab'>Timetable</a>
                            </li>
                            <li class='nav-item'>
                                <a aria-controls='dozents-<?php echo $course['course']->id; ?>' aria-selected='false' class="nav-link" data-toggle='tab' href='#dozents-<?php echo $course['course']->id; ?>' id='dozents-tab-<?php echo $course['course']->id; ?>' role='tab'>Coaches</a>
                            </li>
                            <li class='nav-item'>
                                <a aria-controls='students-<?php echo $course['course']->id; ?>' aria-selected='false' class="nav-link" data-toggle='tab' href='#students-<?php echo $course['course']->id; ?>' id='students-tab-<?php echo $course['course']->id; ?>' role='tab'>Coachees</a>
                            </li>
                            <!--<li class='nav-item'>
<a aria-controls='appointments-<?php echo $course['course']->id; ?>' aria-selected='false' class="nav-link" data-toggle='tab' href='#appointments-<?php echo $course['course']->id; ?>' id='appointments-tab-<?php echo $course['course']->id; ?>' role='tab'>Appointments</a>
</li>-->
                        </ul>
                        <div class='tab-content' id='profile-form-content'>
                            <p class="alert alert-success" id="course_success-<?php echo $course['course']->id; ?>" style="display:none;"></p>
                            <p class="alert alert-danger" id="course_error-<?php echo $course['course']->id; ?>" style="display:none;"></p>

                            <div aria-labelledby='products-tab-<?php echo $course['course']->id; ?>' class="tab-pane fade show active" id='products-<?php echo $course['course']->id; ?>' role='tabpanel'>
                                <ul>
                                    <?php
                                    if (!empty($course['products'])) {
                                        foreach ($course['products'] as $p) {
                                            $p_id = $p['product']->id;
                                    ?>
                                            <li><?php echo $p['product']->title . ' (' . trans('forms.lessons') . ': ' . $p['total_lessons'] . ' ' . trans('forms.total_cost') . ': €' . $p['total_cost'] . ')'; ?></li>

                                            <ul>
                                                <?php
                                                if (!empty($p['modules'])) {
                                                    foreach ($p['modules'] as $m) {
                                                ?>
                                                        <li><?php echo $m['module']->title . ' (' . trans('forms.lessons') . ': ' . $m['total_lessons'] . ' ' . trans('forms.total_cost') . ': €' . $m['total_cost'] . ')'; ?></li>

                                                        <ul>
                                                            <?php
                                                            if (!empty($m['items'])) {
                                                                foreach ($m['items'] as $item) {
                                                            ?>
                                                                    <li><?php echo $item['item']->title . ' (' . trans('forms.lessons') . ': ' . $item['item']->lessons . ' ' . trans('forms.total_cost') . ': €' . $item['item']->lessons * $item['item']->price_lessons . ')'; ?></li>
                                                            <?php }
                                                            } ?>
                                                        </ul>
                                                <?php }
                                                } ?>

                                            </ul>
                                            <li style="list-style-type:none; padding-bottom:15px;"></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>

                            <div aria-labelledby='timetable-tab-<?php echo $course['course']->id; ?>' class="tab-pane fade" id='timetable-<?php echo $course['course']->id; ?>' role='tabpanel'>
                                <table class="mb-0 table">
                                    <thead>
                                        <tr>
                                            <th>Days</th>
                                            <th>Time</th>
                                            <th>Notes</th>
                                            <th>Room</th>
                                        </tr>
                                    </thead>
                                    <tbody id="classes-data">
                                        <?php
                                        if (!empty($course['classes'])) {
                                            foreach ($course['classes'] as $c) {
                                                $p_id = $c['class']->id;
                                        ?>
                                                <tr>
                                                    <td><?php echo $c['class']->day; ?></td>
                                                    <td><?php echo date_format(new DateTime($c['class']->fromm), 'H:i') . ' to ' . date_format(new DateTime($c['class']->too), 'H:i'); ?></td>
                                                    <td><?php echo $c['class']->notes; ?></td>
                                                    <td><?php echo $c['room']; ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div aria-labelledby='dozents-tab-<?php echo $course['course']->id; ?>' class="tab-pane fade" id='dozents-<?php echo $course['course']->id; ?>' role='tabpanel'>
                                <table style="width: 100%;" id="example3" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('dashboard.name'); ?></th>
                                            <th><?php echo trans('forms.email'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($course['dozents'])) {
                                            foreach ($course['dozents'] as $dozent) {
                                        ?>
                                                <tr>
                                                    <td><?php if ($dozent['contact'] == 'NA') echo 'Contact deleted.';
                                                        else echo $dozent['contact']->name; ?>
                                                    </td>
                                                    <td><?php if ($dozent['contact'] == 'NA') echo 'Contact deleted.';
                                                        else echo $dozent['contact']->email; ?>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>

                            <div aria-labelledby='students-tab-<?php echo $course['course']->id; ?>' class="tab-pane fade" id='students-<?php echo $course['course']->id; ?>' role='tabpanel'>
                                <table style="width: 100%;" id="example3" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!--  <th><?php echo trans('forms.job_title'); ?></th>
                                                        <th><?php echo trans('forms.elective_qualification'); ?></th>-->
                                            <th><?php echo trans('dashboard.contract'); ?></th>
                                            <th><?php echo trans('dashboard.contact'); ?></th>
                                            <th><?php echo trans('dashboard.added_on'); ?></th>
                                            <th><?php echo trans('dashboard.actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($course['students'])) {
                                            foreach ($course['students'] as $contract) {
                                                if ($contract['contract']->signature == '') {
                                                    $signed = '<br>' . trans('dashboard.no_signature');
                                                    $color = '#da624a';
                                                } else {
                                                    $signed = '<br>' . trans('dashboard.signed');
                                                    $color = 'green';
                                                }

                                                if ($contract['contract']->document == '1') $signed = '';

                                                $created_on = date_format(new DateTime($contract['contract']->on_date), 'd-m-Y H:i');

                                                if ($contract['contract']->document == '0')
                                                    $url = url('company_files/contracts/' . $contract['contract']->contract);
                                                else
                                                    $url = url('company_files/documents/' . $contract['contract']->contract);

                                                $type = $contract['contract']->type;
                                                if ($type == 'Standard contract for Coach / Trainer') $type = trans('forms.standard_contract_for_coach_trainer');
                                                else if ($type == 'Coaching Contract for Coachee') $type = trans('forms.coaching_contract_for_coachee');
                                                else if ($type == 'Education Contract for Student') $type = trans('forms.education_contract_for_student');
                                                else if ($type == 'Extended Education Contract for Student') $type = trans('forms.extended_education_contract_for_student');
                                                else if ($type == 'Retraining Contract for Coachee / Student') $type = trans('forms.retraining_contract_for_coachee_student');
                                                else if ($type == 'Amendments to Retraining Contract') $type = trans('forms.amendments_to_retraining_contract');
                                                else if ($type == 'Contract for Student / Coachee Internship') $type = trans('forms.contract_for_student_coachee_internship');
                                                else if ($type == 'Private Jobsearch contract for Student / Coachee') $type = trans('forms.private_jobsearch_contract_for_student_coachee');
                                        ?>
                                                <tr>

                                                    <!--  <td><?php echo $contract['contract']->job_title; ?></td>
                                                        <td><?php echo $contract['contract']->elective_qualifications; ?></td> -->
                                                    <td><a href=" <?php echo $url; ?>" target="_blank" style="color: <?php echo $color; ?>;"><i class="fa fa-file-pdf"></i> <?php
                                                                                                                                                                            echo $contract['contract']->contract; ?></a>
                                                        <?php echo $signed; ?>

                                                    </td>
                                                    <td><?php if ($contract['contact'] == 'NA') echo 'Contact deleted.';
                                                        else echo $contract['contact']->name . '<br>' . $contract['contact']->email; ?>
                                                    </td>
                                                    <td><?php echo date_format(new DateTime($contract['contract']->on_date), 'd-m-Y'); ?>
                                                        <p style="color:#777;"><?php echo date_format(new DateTime($contract['contract']->on_date), 'H:i'); ?></p>
                                                    </td>
                                                    <td>

                                                        <form action="" method="post" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="delete" value="<?php echo $contract['contract']->id; ?>">
                                                            <button class="border-0 btn-transition btn btn-outline-danger" onclick="return confirm('Do you really want to delete this contract?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>

                            <div aria-labelledby='appointments-tab-<?php echo $course['course']->id; ?>' class="tab-pane fade" id='appointments-<?php echo $course['course']->id; ?>' role='tabpanel'>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

<?php }
} ?>

<script>
    function generate_appointments(th, contract_id, course_id) {
        var sub_btn = $(th).children('#submit_btn');
        $(sub_btn).attr('disabled', true);

        var formData = new FormData();
        var token = '<?php echo csrf_token(); ?>';
        formData.append('_token', token);
        formData.append('contract_id', contract_id);

        $.ajax({
            url: "<?php echo url('admin/generate-appointments') ?>",
            type: "POST",
            data: formData,
            beforeSend: function() { //alert('sending');
                $("#course_error-" + course_id).hide();
            },
            contentType: false,
            processData: false,
            success: function(data) { //alert(data);
                //success
                // here we will handle errors and validation messages
                if (!data.success) {
                    $(sub_btn).attr('disabled', false);
                    $("#course_error-" + course_id).html(data.error);
                    $("#course_error-" + course_id).show();
                } else {
                    // ALL GOOD! just show the success message!
                    $(sub_btn).hide();
                    $("#course_success-" + course_id).text('Appointments generated successfully.');
                    $("#course_success-" + course_id).show();
                    window.location = '';
                }
            },
            error: function() {
                //error
            }
        });

        return false;
    }

    function add_class() {
        $("#f_error").hide();
        var title = $("#class_title").val();
        var day = $("#class_day").val();
        var from = $("#class_from").val();
        var to = $("#class_to").val();
        var notes = $("#class_notes").val();
        var room = $("#class_room").val();
        var room_name = $('option:selected', $("#class_room")).attr('data-name');
        var day_time = day + ' at ' + from + ' to ' + to;

        if (title != '' && from != '' && to != '') {
            $("#classes-data").append('<tr>\
                                                                    <th scope="row"><input type="hidden" name="classes_id[]" value="0"><input type="hidden" name="classes[]" value="' + title + '">' + title + '</th>\
                                                                    <td><input type="hidden" name="days[]" value="' + day + '"><input type="hidden" name="froms[]" value="' + from + '"><input type="hidden" name="tos[]" value="' + to + '">' + day_time + '</td>\
                                                                    <td><input type="hidden" name="notes[]" value="' + notes + '">' + notes + '</td>\
                                                                    <td><input type="hidden" name="rooms[]" value="' + room + '">' + room_name + '</td>\
                                                                    <td><a href="javascript:void(0)" style="color:red;" onclick="$(this).parent().parent().remove();"><i class="fa fa-minus-circle"></i></a></td>\
                                                                </tr>');
            $("#class_title").val('');
            $("#class_day").val('');
            $("#class_from").val('');
            $("#class_to").val('');
            $("#class_notes").val('');
            $("#class_room").val('');
        } else {
            $("#f_error").text('All fields are required.');
            $("#f_error").show();
        }
    }

    window.lessons = 0;

    function add_module() {
        $("#f_error").hide();
        var max = $("#max_lessons").val();
        var id = $("#mod").val();
        var title = $('option:selected', $("#mod")).attr('data-title');
        var lessons = $('option:selected', $("#mod")).attr('data-lessons');
        var total_cost = $('option:selected', $("#mod")).attr('data-total-cost');

        if (id != '') {
            if ((parseInt(window.lessons) + parseInt(lessons)) < parseInt(max)) {
                window.lessons = parseInt(window.lessons) + parseInt(lessons);
                $("#modules-data").append('<tr>\
                                                                    <th scope="row"><input type="hidden" name="modules[]" value="' + id + '">' + title + '</th>\
                                                                    <td>' + lessons + '</td>\
                                                                    <td>$' + total_cost + '</td>\
                                                                    <td><a href="javascript:void(0)" style="color:red;" onclick="$(this).parent().parent().remove();"><i class="fa fa-minus-circle"></i></a></td>\
                                                                </tr>');
            } else {
                $("#f_error").text("Total lessons cannot be greater than: " + max);
                $("#f_error").show();
            }
        }

        var id = $("#mod").val('');
    }
    // check if the appointment has not been completed yet
    function checkIncompleteAppointmentExist(course_id)
    {
        $.ajax({            
            url: "<?php echo url('admin/has-incomplete-appointments') ?>" + "/" + course_id,
            headers: {
                    'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
            },
            dataType: "json",
            type: 'GET',
            success: function(data) {  	 
                console.log(JSON.stringify(data));
                if (data.success === 1) {
                    if (confirm('There are incomplete appointments. Are you sure you want to generate Abschlussbericht Report?')) {
                        submitForm(course_id);
                    }
                } else if (data.success === 2) {
                    submitForm(course_id);
                }
            },
            error: function()  {
                console.log("error happend");
            } 
        });
       
    }

    function handleOnRaidoButtons(course_id) {
        var radio_id = '#yes_radio_' + course_id;
        var textarea_depending_radio_id = '#textarea_depending_radio_' + course_id;
        var calendar_depending_radio_id = '#calendar_depending_radio_' + course_id;
        console.log(radio_id)
        if ($(radio_id).is(':checked')) {
            $(textarea_depending_radio_id).show();
            $(calendar_depending_radio_id).show();
        } else {
            $(textarea_depending_radio_id).hide();
            $(calendar_depending_radio_id).hide();

        }
    }  
    function handleSubmit(course_id, is_created) {         
        var modal_id = '#course-modal-' + course_id;
        $(modal_id).toggle(); 
        $('.modal-backdrop').hide();
        
        if (is_created == true){
            alert('Already report created.');       
       
        }  
        else{
            checkIncompleteAppointmentExist(course_id);
        }
    }
    
    function isCreatedReport(course_id, is_created) {    
        if (is_created == true){
            alert('Already report created.');
            var modal_id = '#course-modal-' + course_id;
            console.log(modal_id);                  
            return;
        }
    }

    function submitForm(course_id) {

        $("#create_report_backdrop").show();
        // $.LoadingOverlay("show");
        var formName = 'course_form_' + course_id;
        var form = $('form[name="' + formName + '"]');
        var values = form.serializeArray() 
        var formData = new FormData();
        var token = '<?php echo csrf_token(); ?>';
        var newValues = values.reduce((acc, cur) => ({ ...acc, [cur.name]: cur.value }), {});
        console.log(newValues);
        var ziele_avgs = newValues.measure_avgs;
        var ziele_coachee = newValues.measure_coachee;
        var vermit_begin = newValues.vermit_begin;
        var vermit_content = newValues.vermit_content;
        var vermitting = newValues.vermitting;                
        var recommendations_1 = newValues.recommendations_1;
        var recommendations_2 = newValues.recommendations_2;
        var c_id = course_id;
        formData.append('_token', token);
        formData.append('ziele_avgs', ziele_avgs);
        formData.append('ziele_coachee', ziele_coachee);
        formData.append('recommendations_1', recommendations_1);
        formData.append('recommendations_2', recommendations_2);
        formData.append('vermit_content', vermit_content);    
        formData.append('vermitting', vermitting);
        formData.append('vermit_begin', vermit_begin);
        formData.append('course_id', c_id);    
        toastr.options = {
                        timeOut: 5000,
                        extendedTimeOut: 0,
                        fadeOut: 200,      
        };
        $.ajax({
            url: "<?php echo url('/admin/coaching-end-report/'); ?>",
            type: "POST",
            data: formData,
            beforeSend: function(){ 
                $("#submit_btn_create").attr('disabled', true);
            },
            contentType: false,
            processData: false,
            success: function(data) {
                $("#create_report_backdrop").hide();    
                // $.LoadingOverlay("hide");   
                if(data.success){                                
                    toastr.info('Report has been created successfully');

                    var url = window.location.href;            
                    window.open(data.path);                
                    window.location = url;                      
                }  
                else{         
                    
                    toastr.info(data.message);
                }            
                
            },
            error: function(error) {
                $("#create_report_backdrop").hide();          
            }
        });        
    }

    function deleteReport(course_id) {

        var formData = new FormData();
        var token = '<?php echo csrf_token(); ?>';
        var c_id = course_id;
        formData.append('_token', token);
        formData.append('course_id', c_id);      
        $.ajax({
            url: "<?php echo url('/admin/delete-report/'); ?>",
            type: "POST",
            data: formData,
            beforeSend: function(){  
            },
            contentType: false,
            processData: false,
            success: function(data) {   
                if(data.success){
                    location.reload();         
                }
            },
            error: function(error) {      
            }
        });
    }

    function sendReport(course_id) {

        $("#create_report_backdrop").show();
        // $.LoadingOverlay("show");
        var formData = new FormData();
        var token = '<?php echo csrf_token(); ?>';
        var c_id = course_id;
        formData.append('_token', token);
        formData.append('course_id', c_id);    

        toastr.options = {
                    timeOut: 5000,
                    extendedTimeOut: 0,
                    fadeOut: 200,      
        };
        $.ajax({
            url: "<?php echo url('/admin/send-report/'); ?>",
            type: "POST",
            data: formData,
            beforeSend: function(){  
            },
            contentType: false,
            processData: false,
            success: function(data) {
                // $.LoadingOverlay("hide");
                $("#create_report_backdrop").hide();                
                toastr.info("Report has been sent to "+data.email+" successfully.");    
            },
            error: function(error) {
                $("#create_report_backdrop").hide();   
                toastr.info("It is failed to send report.");                           
            }
        });

    }

</script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
    var editor = null;
    ClassicEditor.create(document.querySelector("#editor"), {
            toolbar: [
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "blockQuote",
                "undo",
                "redo"
            ]
        })
        .then(editor => {
            //debugger;
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    function check_data() {
        $("#course-error").hide();

        var period = $("#period_field2").val();
        var dates = period.split(' - ');
        if (dates[0] == dates[1]) {
            $("#course-error").text('<?php echo trans('forms.beginning_end_same'); ?>');
            $("#course-error").show();
            return false;
        }

        return true;
    }

    $('.date_range').daterangepicker({
        startDate: new Date(),
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
    $('.calendar').daterangepicker({
        singleDatePicker: true,
        startDate: new Date(),
        minDate: new Date(),
        locale: {
            format: 'DD-MM-YYYY'
        }
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>