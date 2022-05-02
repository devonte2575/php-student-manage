<?php include(app_path() . '/common/panel/header.php'); ?>

 <div class="app-inner-layout app-inner-layout-page">
	<div class="app-inner-layout__wrapper">

		<div class="app-inner-layout__content pt-0">
			<div class="tab-content">
				<div class="container-fluid">
					<div class="card mb-3">
						<div class="card-header-tab card-header">
							<div
								class="card-header-title font-size-lg text-capitalize font-weight-normal">
							</div>

							<div class="btn-actions-pane-right actions-icon-btn">
								<button type="button"
									class="btn-shadow btn btn-wide btn-success"
									onclick="$('#form-box').slideToggle()">
									<span class="btn-icon-wrapper pr-1 opacity-7"> <i
										class="fa fa-plus"></i>
									</span> Add New
								</button>
							</div>

						</div>

						<div id="form-box" style="display: none;">
							<div class="main-card mb-2 card">
								<div class="card-body">
									<h5 class="card-title">Add New Offer</h5>
									<form action="" method="post">
                                        <?php echo csrf_field(); ?>
                                                                                  <div
											class="form-row">
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="studentname" class=""><?php echo trans('forms.select_student'); ?><font
														style="color: red;">*</font></label> <select
														class="form-control" name="studentname" id="studentname" onchange="getdiv();"
														style="width: 100%;">
                                      <?php  foreach ($students as $w) { ?>
                                        <option
															value=" <?php echo  $w->id ?>"><?php echo $w->name ?></option>


                                      <?php } ?>



                                    </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="studentname" class=""><?php echo trans('forms.select_expert_advisor'); ?><font
														style="color: red;">*</font></label> <select
														class="form-control" name="expertadv" style="width: 100%;">
                                      <?php  foreach ($expertadv as $w) { ?>
                                        <option
															value=" <?php echo  $w->id ?>"><?php echo $w->name ?></option>


                                      <?php } ?>



                                    </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="offtype" class=""><?php echo trans('forms.select_type'); ?> <font
														style="color: red;">*</font></label> <select
														name="offtype" id="offtype" class="form-control"
														onchange="getdiv();" required="required">
														<option value="">Bitte auswählen</option>
														<option value="1">Umschulung</option>
														<option value="2">Coaching</option>
														
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="examplePassword11" class=""><?php echo trans('forms.consultation_date'); ?><font
														style="color: red;">*</font></label> <input
														name="due_date" type="text" class="form-control calendar">
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="consultmode" class=""><?php echo trans('forms.consultation_mode'); ?> <font
														style="color: red;">*</font></label> <select
														name="consultmode" id="consultmode" class="form-control">
														<option value="Persönliches">Persönliches</option>
														<option value="Digitales">Digitales</option>
														<option value="Telefonisches">Telefonisches</option>


													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="examplePassword11" class=""><?php echo trans('forms.begin_date'); ?>  <font
														style="color: red;">*</font></label> <input
														name="begin_date" type="text"
														class="form-control calendar">
												</div>
											</div>
										</div>

										<div id="regular_id" class="row" style="display: none;">
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="studentname" class=""><b><?php echo trans('forms.regular_qualifications'); ?></b>
														<font style="color: red;">*</font></label><br>
                                                   <?php  foreach ($regular_qualifications as $w) { ?>
                                                   <input type="radio"
														name="regularquali" value=" <?php echo $w->id ?>"
														onchange="getblock();" id="qualimainid"> <?php

echo $w->qualification . '<br>';
                                                }
                                                echo '<br/><br>';
                                                ?>
                                                    <label
														for="regular_addon" class=""><b><?php echo trans('forms.regular_addon'); ?></b>
														<font style="color: red;">*</font></label><br>
                                                    <?php  foreach ($regular_addon as $y) { ?>
                                                     <input type="radio"
														name="regularaddon[]" value="<?php echo $y->id ?>"
														onchange="getblock();" id="qualimainid"> <?php

echo $y->addon_text . '<br>';
                                                    }
                                                    echo '<br/><br>';
                                                    ?>


<br>




													<div id="divblk1" style="display: none;">


	 <?php  foreach ($qual_blk1 as $w) { ?>
                                                   <input
															type="checkbox" name="divblkget1[]"
															value=" <?php echo $w->id ?>" change=> <?php

echo $w->text_blk . '<br><br>';
}
?>
                                                </div>
													<div id="divblk2" style="display: none;">


	 <?php  foreach ($qual_blk2 as $w) { ?>
                                                   <input
															type="checkbox" name="divblkget2[]"
															value=" <?php echo $w->id ?>" change=> <?php

echo $w->text_blk . '<br><br>';
}
?>
                                            </div>

													<div id="divblk3" style="display: none;">


	 <?php  foreach ($qual_blk3 as $w) { ?>
                                                   <input
															type="checkbox" name="divblkget3[]"
															value=" <?php echo $w->id ?>" change=> <?php

echo $w->text_blk . '<br><br>';
}
?>
</div>










												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="studentname" class=""><b><?php echo trans('forms.regular_extra_qualifications'); ?></b>
														<font style="color: red;">*</font></label><br>
                                                   <?php  foreach ($regular_textblocks as $w) { ?>
                                                   <input
														type="checkbox" name="regulartexts[]"
														value=" <?php echo $w->id ?>"> <?php

echo $w->textblock . '<br>';
                                                    $getaddon = \DB::table('regular_extraqualifications')->select('id', 'extra_text', 'corporation_partner', 'text_main_id')
                                                        ->where('text_main_id', $w->id)
                                                        ->get();
                                                    if ($getaddon != '') {
                                                        foreach ($getaddon as $extra) {
                                                            if ($extra->corporation_partner == 0) {
                                                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="regularextra[]" value="' . $extra->id . '">&nbsp;&nbsp;<font size="2">' . $extra->extra_text . '</font><br>';
                                                            }
                                                            if ($extra->corporation_partner == 1) {
                                                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="regularextra[]" value="' . $extra->id . '">&nbsp;&nbsp;<font size="2">' . $extra->extra_text . '</font><br>';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>

                                                </div>
											</div>

										</div>

										<div class="col-md-12" id="coachdiv" style="display: none;">
                                                <label for="exampleEmail11" class=""><?php echo trans('forms.select_products_modules'); ?></label>
                                                <div id="treeview_container" class="hummingbird-treeview well h-scroll-large">
                                                    <input type="hidden" name="products_selected" id="selected_products">
                                                    <ul id="treeview-products-1" class="hummingbird-base">

                                                    </ul>
                                                </div>
                                            </div>
										
										<div id="staticblk" style="display: none;">
											<input type="checkbox" name="staticblk[]" value="1"> Wir haben gemeinsam evaluiert, dass die berufliche Zukunft derzeit noch sehr unklar ist und der Kunde gern mit einem Coach daran arbeiten möchte.<br><br>
											<input type="checkbox" name="staticblk[]" value="2"> So sollen Unsicherheiten bzgl. der persönlichen Zukunft abgebaut werden und gleichzeitig eine realistische Vorstellung der beruflichen Zukunft entwickelt werden, die bis hin zum Jobeinstieg durch uns unterstützt wird. 

Der Kunde wünscht sich Unterstützung im Bereich der Erstellung von Bewerbungsunterlagen, der Selbst- & Fremdwahrnehmung inkl. Ressourcenanalyse, Blockaden aufdecken und Selbstsicherheit in Bewerbungsverfahren sowie Unterstützung bei der Weg-Ziel-Planung und das ausloten von neuen Möglichkeiten
<br><br>

										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="studentname" class=""><?php echo trans('forms.signature_user'); ?><font
														style="color: red;">*</font></label> <select
														class="form-control" name="signature" style="width: 100%;">
                                      <?php  foreach ($signature as $w) { ?>
                                        <option
															value=" <?php echo  $w->id ?>"><?php echo $w->username ?></option>


                                      <?php } ?>



                                    </select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="position-relative form-group">
													<label for="studentname" class=""><?php echo trans('forms.description'); ?><font
														style="color: red;">*</font></label>
													<textarea name="description" class="form-control"></textarea>
												</div>
											</div>
										</div>
										<p class="alert alert-danger contact_error"
											style="display: none;"></p>
										<button type="submit" class="btn btn-primary pull-right"
											style="margin-right: 10px;" id="submit_btn"><?php echo trans('dashboard.generate_pdf'); ?></button>
									</form>
								</div>
							</div>
						</div>
						<br>
						<div class="card-body">
                                            	 <?php if(Session::has('success')) { ?>
                                            <p
								class="alert alert-success"><?php echo Session::get('success'); ?></p>
                                            <?php } ?>
                                                <table
								style="width: 100%;" id="example3"
								class="table table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th><?php echo trans('dashboard.student_name'); ?></th>
										<th><?php echo trans('dashboard.expert_advisor'); ?></th>
										<th><?php echo trans('dashboard.offer_type'); ?></th>
										<th><?php echo trans('dashboard.pdf'); ?></th>
										<th style="max-width: 150px;"><?php echo trans('dashboard.added_on'); ?></th>
										<th><?php echo trans('dashboard.actions'); ?></th>
									</tr>
								</thead>
								<tbody>
                                                        <?php
                                                        if (! empty($offers)) {
                                                            foreach ($offers as $off) {
                                                                ?>
                                                    <tr>
										<td>
                                                           <?php echo $off->name; ?>
                                                        </td>
										<td>
                                                              <?php

$expert = \DB::table('contacts')->select('*')
                                                                    ->where('id', $off->expertadvisor)
                                                                    ->get();
if(isset($expert[0]))
                                                                echo $expert[0]->name;
                                                                ?>
                                                        </td>
                                                        <td style="max-width: 150px;">
                                                           <?php echo ($off->type == 1)?'Unschulung':'Coaching'; ?>  
                                                        </td>
										<td style="max-width: 150px;">
                                                           <?php echo '<a href="'.url('company_files/offers/'.$off->pdf_name).'" target="_blank">PDF ansehen</a>'; ?>  
                                                        </td>
										<td>
                                                           <?php echo date_format(new DateTime($off->created_at),'d.m.Y h:i:s'); ?>
                                                            
                                                        </td>
										<td>
											<form action="" method="post" style="display: inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <input
													type="hidden" name="mail_pdf"
													value="<?php echo $off->id; ?>">
												<button
													class="border-0 btn-transition btn btn-outline-danger"
													>
													<i class="fa fa-envelope"></i>
												</button>
											</form>
											<form action="" method="post" style="display: inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <input
													type="hidden" name="delete"
													value="<?php echo $off->offid; ?>">
												<button
													class="border-0 btn-transition btn btn-outline-danger"
													onclick="return confirm('Do you really want to delete this contract?');">
													<i class="fa fa-trash"></i>
												</button>
											</form>
											<button
												class="border-0 btn-transition btn btn-success"
												data-toggle="modal" data-target="#contract"
												onclick="fetch_contracts(<?php echo $off->offid; ?>);">
                                                            <?php echo trans('forms.add_contract'); ?>
                                                           </button>

											
										</td>
									</tr>
                                                    <?php } } ?>
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

<?php include(app_path() . '/common/panel/footer.php'); ?>


<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<script type="text/javascript"
	src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript"
	src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        themes: "modern",   
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste moxiemanager"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"   
    });
    </script>
<script>
function add_contract()
{

	$("#myModal").modal();

}

    
    
     $('.calendar').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate: new Date(),
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
    
    	function getblock()
	{

var qualid=$('input[id="qualimainid"]:checked').val();
$("#divblk1").hide();
$("#divblk2").hide();
$("#divblk3").hide();

if(qualid==1)
{
$("#divblk1").show();
$("#divblk2").hide();
$("#divblk3").hide();
         
}
if(qualid==2)
{
$("#divblk1").hide();
$("#divblk2").show();
$("#divblk3").hide();
}
if(qualid==3)
{
$("#divblk1").hide();
$("#divblk2").hide();
$("#divblk3").show();
}
}
function add_contract()
{
	$("#create_contracts").show();
}

    function getdiv()
    {

          $("#regular_id").hide();
            $("#coachdiv").hide();
              $("#staticblk").hide();
       var offertype= $('#offtype').val();
       //  $.LoadingOverlay("show");
     
       if(offertype==1)
       {
          // $("#regular_id").addClass("row");

         $("#regular_id").show();
       }
       
       
       //let id = $(this).val();
      
        //TODO: Retrieve the available recommendations for the selected contact & display in dropdown
        
        if(offertype==2)
       {
          // $("#regular_id").addClass("row");
         $("#coachdiv").show();
         
         

    
       // $("#treeview-products-1").hummingbird();
       
       var studname = document.getElementById('studentname');
       //alert(studname.value);
       
        //Retrieve all the PMI 
        $.ajax({
            
            url: "<?php echo url('admin/get-all-pmi') ?>",
            headers: {
                    'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
                },
             data: {
                contact_id: studname.value
            },
            dataType: "json",
            type: 'GET',
            success: function(data) {
           // alert("getdiv() ajax success called");
            //console.log(data.treeview);
            $('.hummingbird-base').html(data.treeview);
              $("#staticblk").show();
                $.LoadingOverlay("hide");
                if (data.success) {
                    $(".hummingbird-base").html(data.treeview);                   
                }
            },
            error: function()  {
                console.log("error happend");
                } 
        });
    }
    
      
    }
       
    
</script>


<?php include(app_path().'/common/panel/prospect_form_header.php'); ?>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css"
	rel="stylesheet" type="text/css">
<link href="<?php echo url('hummingbird/hummingbird-treeview.css'); ?>"
	rel="stylesheet" type="text/css">
<style>
.hummingbird-treeview * {
	font-size: 18px;
}
.section-title {
	border-top: 1px solid #c0c0c0;
	padding-top: 1rem;
}
</style>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript"
	src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript"
	src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?php echo url('hummingbird/hummingbird-treeview.js'); ?>"></script>
<script>
$("#treeview").hummingbird();
$( "#checkAll" ).click(function() {
$("#treeview").hummingbird("checkAll");
});
$( "#uncheckAll" ).click(function() {
  $("#treeview").hummingbird("uncheckAll");
});
$( "#collapseAll" ).click(function() {
  $("#treeview").hummingbird("collapseAll");
});
$( "#checkNode" ).click(function() {
  $("#treeview").hummingbird("checkNode",{attr:"id",name: "node-0-2-2",expandParents:false});
});
    
 $("#treeview2").hummingbird();
 function fetch_contracts(offer_id)
    {
    	$("#treeview").hummingbird();
$( "#checkAll" ).click(function() {
$("#treeview").hummingbird("checkAll");
});
$( "#uncheckAll" ).click(function() {
  $("#treeview").hummingbird("uncheckAll");
});
$( "#collapseAll" ).click(function() {
  $("#treeview").hummingbird("collapseAll");
});
$( "#checkNode" ).click(function() {
  $("#treeview").hummingbird("checkNode",{attr:"id",name: "node-0-2-2",expandParents:false});
});
    
 $("#treeview2").hummingbird();
    	var offer_id = offer_id;
    	var type='Coach';  
        var formData=new FormData();
        var token='<?php echo csrf_token(); ?>';
        formData.append('_token', token);
        formData.append('c_id', c_id); 
        formData.append('offer_id', offer_id)  
        //Retrieve all the PMI 
            $(".hummingbird-base").html("");                   
   
        $.ajax({
            
            url: "<?php echo url('admin/get-all-pmi2') ?>",
            headers: {
                    'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
                },
             data: {
                offer_id: offer_id
            },
            dataType: "json",
            type: 'GET',
            success: function(data) {
           // alert("getdiv() ajax success called");     	 
                    $(".hummingbird-base").html(data.treeview);                   
   
            },
            error: function()  {
                console.log("error happend");
                } 
        });
        
       
    }

function item_selected(p_id)
    {
        var old_files=$("#selected_products").val();
        if(old_files!='')
        var files=old_files.split(',');
        else var files=[];
        files.push(p_id);
        var new_files=files.join(',');
        $("#selected_products").val(new_files);
    }
    
    function item_selected2(p_id, m_id)
    {
        var old_files=$("#selected_modules_"+p_id).val();
        if(old_files!='')
        var files=old_files.split(',');
        else var files=[];
        files.push(m_id);
        var new_files=files.join(',');
        $("#selected_modules_"+p_id).val(new_files);
    }
    
    function item_selected12(p_id)
    {
        var old_files=$("#selected_products2").val();
        if(old_files!='')
        var files=old_files.split(',');
        else var files=[];
        files.push(p_id);
        var new_files=files.join(',');
        $("#selected_products2").val(new_files);
    }
    
    function item_selected22(p_id, m_id)
    {
        var old_files=$("#selected_modules2_"+p_id).val();
        if(old_files!='')
        var files=old_files.split(',');
        else var files=[];
        files.push(m_id);
        var new_files=files.join(',');
        $("#selected_modules2_"+p_id).val(new_files);
    }
    
    function select_items(th, checkboxes)
    {
        if($(th).is(':checked')) $(checkboxes).prop('checked', true);
        else $(checkboxes).prop('checked', false);
    }
function contract_type2(th)
    {     	
        $("#lehrgang").hide();
        $("#qualifications").hide();
        $("#e_qualifications").hide();
        $("#installments").hide();
        $("#consultation").hide();
        $("#internship_fields").hide();
        $("#pmmitemplate").hide();
        $("#pmmiselectblock").hide();
        $("#product_fields").show();
        
        var contract=$(th).val();
        if(contract=='Education Contract for Student' || contract=='Retraining Contract for Coachee / Student') {
            $("#qualifications").show();
            $("#e_qualifications").show();
            $("#installments").show();
            $("#consultation").show();
            $("#assign_course").attr('required', true);
            $("#pmmitemplate").show();
        }
        else if(contract=='Coaching Contract for Coachee') {
        	$("#assign_course").attr('required', true);
        	$("#pmmiselectblock").show();
        }
        else if(contract=='Contract for Student / Coachee Internship') {
            $("#assign_course").attr('required', false);
            $("#internship_fields").show();
            $("#pmmitemplate").show();
        }
        else if(contract=='Extended Education Contract for Student') {
            $("#lehrgang").show();
            $("#e_qualifications").show();
            $("#pmmitemplate").show();
        }
        else if(contract=='Standard contract for Coach / Trainer') {
        	$("#pmmiselectblock").hide();
        	$("#pmmitemplate").hide();
        	$("#product_fields").hide();
        }
        else {
            $("#assign_course").attr('required', false);
        }
    }
    
   

</script>
<div class="modal fade" id="contract" tabindex="-1" role="dialog"
	aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title2">
					<span id="details_user"></span>
					<!--<small> - <?php echo trans('forms.contact_details'); ?></small>-->
				</h5>
			</div>
			<div class="modal-body">
				<p class="alert alert-success" id="ass-success"
					style="display: none;"></p>

				<ul class='nav nav-tabs mb-3' id='profile-form-tab' role='tablist'>	
					<li class='nav-item hide-tab'><a aria-controls='create-contracts'
						aria-selected='false' class="nav-link" data-toggle='tab'
						href='#create-contracts' id='create-tab' role='tab'><?php echo trans('forms.create_contract'); ?></a>
					</li>
				</ul>
				<div class='tab-content' id='profile-form-content'>
					<div aria-labelledby='products-tab'
						class="tab-pane fade show active" id='products' role='tabpanel'
						style="overflow-x: auto;"></div>

					<div aria-labelledby='contracts-tab' class="tab-pane fade"
						id='contracts' role='tabpanel' style="overflow-x: auto;">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th><?php echo trans('forms.course'); ?></th>
									<th><?php echo trans('forms.products'); ?></th>
									<th><?php echo trans('forms.contract_type'); ?></th>
									<th><?php echo trans('forms.contract_pdf'); ?></th>
									<th><?php echo trans('forms.created_on'); ?></th>
								</tr>
							</thead>
							<tbody id="user-contracts">

							</tbody>
						</table>
					</div>

					<div aria-labelledby='documents-tab' class="tab-pane fade"
						id='documents' role='tabpanel'>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th><?php echo trans('forms.document_type'); ?></th>
									<th><?php echo trans('forms.document_file'); ?></th>
									<th><?php echo trans('forms.added_on'); ?></th>
								</tr>
							</thead>
							<tbody id="user-documents">

							</tbody>
						</table>
					</div>
					<div aria-labelledby='certificate-tab' class="tab-pane fade"
						id='create-certificate' role='tabpanel'>
						<form action="<?php echo url('create_certificate'); ?>"
							method="post" novalidate>
							<input type="hidden" name="c_id_certificate" value="0"
								id="c_id_certificate">
                    <?php echo csrf_field(); ?>
            <div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1"><?php echo trans('forms.select_template'); ?><font
											style="color: red;">*</font></label> <select name="template"
											id="certificate_type" class="form-control" required>
											<option value="" disabled selected><?php echo trans('forms.please_select'); ?></option>
											<option value="1"><?php echo trans('forms.retraining_certificates_of_completion');?></option>
											<option value="6"><?php echo trans('forms.coaching_certificates_of_completion');?></option>

											<option value="2"><?php echo trans('forms.retraining_certificates_for_participation');?></option>
											<option value="7"><?php echo trans('forms.coaching_certificates_for_participation');?></option>

											<option value="3"><?php echo trans('forms.retraining_certificates_for_participation_extra');?></option>
											<option value="8"><?php echo trans('forms.coaching_certificates_for_participation_extra');?></option>

											<option value="4"><?php echo trans('forms.retraining_additional_qualification_certificate');?></option>
											<option value="5"><?php echo trans('forms.coaching_additional_qualification_certificate');?></option>
										</select>
									</div>
								</div>
                      <?php echo csrf_field(); ?>
                      
                      <div class="col-md-6">
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.beginning_end');?> <font
											style="color: red;">*</font></label> <input type="text"
											class="form-control date_range required" name="date_from_to"
											required id="date_from_to">
									</div>
								</div>
								<div class="col-md-6 " id="qualifi">
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.qualification');?><font
											style="color: red;">*</font></label> <input type="text"
											class="form-control  " name="qualification" required
											id="qualification">
									</div>
								</div>
								<div class="col-md-6" id='sub_q'>
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.sub_qualification');?><font
											style="color: red;">*</font></label> <input type="text"
											class="form-control " name="sub_qualification" required
											id="sub_qualification">
									</div>
								</div>
								<div class="col-md-6" id="an_der_div">
									<div class="position-relative form-group">
										<label for="an_der" class=""><?php echo trans('forms.qualification_for');?><font
											style="color: red;">*</font></label> <input type="text"
											class="form-control" name="an_der" required id="an_der">
									</div>
								</div>
								<div class="col-md-6" id="module_name_div">
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.module_name');?><font
											style="color: red;">*</font></label> <input type="text"
											class="form-control " name="module_name" required
											id="module_name">
									</div>
								</div>
								<div class="col-md-6" id="module_Item">
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.module_items');?><font
											style="color: red;">*</font></label>
										<textarea class="form-control" rows="1" name="module_item"
											required></textarea>
									</div>
								</div>
								<div class="" id="module_items_box"
									style="width: 100%; display: none;">
									<div class="form-row"
										style="margin-left: 15px; margin-right: 15px;">
										<div class="col-md-6" id="module_title">
											<div class="position-relative form-group">
												<label for="examplePassword11" class=""><?php echo trans('forms.module_title');?><font
													style="color: red;">*</font></label>
												<!-- <input type="text" class="form-control required" name="module_item" required id="module_item"> -->
												<input type="text" name="module_title[]"
													class="form-control" value="">
											</div>
										</div>
										<div class="col-md-6" id="module_I">
											<div class="position-relative form-group">
												<label for="examplePassword11" class=""><?php echo trans('forms.module_items');?><font
													style="color: red;">*</font></label>

												<textarea class="form-control" rows="1"
													name="module_items[]" required></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" id="add_more_module"
									style="display: none;">
									<a href="javascript:void(0)" onclick="add_module_items(this)"><i
										class="fa fa-plus-circle"></i> <?php echo trans('forms.add_more'); ?> </a>
								</div>


							</div>
							<button type="submit" class="btn btn-primary pull-right"
								style="margin-right: 10px;" id="submit_btn"><?php echo trans('forms.submit'); ?></button>
						</form>
					</div>

					<div aria-labelledby='create-tab' 
						id='create-contracts' role='tabpanel' >
						<form action="<?php echo url('admin/create-contract'); ?>"
							method="post" onsubmit="return check_data2();">
							<input type="hidden" name="c_id" value="0" id="c_id">
                    <?php echo csrf_field(); ?>
        <div class="row" >
								<div class="col-12 col-lg-6">
									<div class="form-group">

										<label for="exampleInputEmail1"><?php echo trans('forms.contract'); ?> <font
											style="color: red;">*</font></label> <select
											name="contract_type" id="contract_type" class="form-control"
											required onchange="contract_type2(this)">
											<option value=""><?php echo trans('forms.please_select'); ?></option>
											<option value="Coaching Contract for Coachee"><?php echo trans('forms.coaching_contract_for_coachee'); ?></option>
											<option value="Education Contract for Student"><?php echo trans('forms.education_contract_for_student'); ?></option>
											<option value="Extended Education Contract for Student"><?php echo trans('forms.extended_education_contract_for_student'); ?></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.beginning_end'); ?> <font
											style="color: red;">*</font></label> <input type="text"
											class="form-control date_range required" name="period"
											required id="period_field2">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-lg-12" id="product_fields">
									<div class="position-relative form-group">
										<label for="examplePassword11" class=""><?php echo trans('forms.courses'); ?></label>
										<div class="row">
											<div class="col-md-12">
												<select name="course" class="form-control"
													id="assign_course" style="width: 100%; height: 100%;">
													<option value="" disabled selected><?php echo trans('forms.select_course'); ?></option>
													<optgroup value="KG" label="KG">
                                                    <?php
                                                    if (! empty($courses_kg)) {
                                                        foreach ($courses_kg as $course) {
                                                            ?>
                                                    <option
															value="<?php echo $course->id; ?>"><?php echo $course->title; ?></option>
                                                    <?php } } ?>
                                                    </optgroup>

													<optgroup value="Coaching" label="Coaching">
                                                    <?php
                                                    if (! empty($courses_coaching)) {
                                                        foreach ($courses_coaching as $course) {
                                                            ?>
                                                    <option
															value="<?php echo $course->id; ?>"><?php echo $course->title; ?></option>
                                                    <?php } } ?>
                                                    </optgroup>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-lg-6 mb-4" id="lehrgang"
									style="display: none;">
									<label for="exampleInputEmail1">Lehrgang</label><br> <input
										type="text" class="form-control" name="lehrgang">
								</div>

								<div class="col-12 col-lg-6" id="qualifications"
									style="display: none;">
									<label for="exampleInputEmail1"><?php echo trans('forms.professional_qualification_for'); ?></label><br>
									<input type="checkbox" name="p_qualifications[]"
										value="Drogist/in"> Drogist/in<br> <input type="checkbox"
										name="p_qualifications[]"
										value="Kaufmann/frau im Einzelhandel"> Kaufmann/frau im
									Einzelhandel<br> <input type="checkbox"
										name="p_qualifications[]" value="Verkäufer/in"> Verkäufer/in<br>
									<br>
								</div>

								<div class="col-12 col-lg-6" id="e_qualifications"
									style="display: none;">
									<label for="exampleInputEmail1"><?php echo trans('forms.elective_qualification'); ?></label><br>
									<input type="checkbox" name="e_qualifications[]"
										value="Beauty &amp; Cosmetic (inkl. Visagistik, Parfüm- &amp; Dufttraining, Dermatologie)">
									Beauty &amp; Cosmetic (inkl. Visagistik, Parfüm- &amp;
									Dufttraining, Dermatologie)<br> <input type="checkbox"
										name="e_qualifications[]"
										value="Fashion &amp; Design (inkl. Stoff- &amp; Schnittkunde, Nähkurs, Workshops)">
									Fashion &amp; Design (inkl. Stoff- &amp; Schnittkunde, Nähkurs,
									Workshops)<br> <input type="checkbox" name="e_qualifications[]"
										value="Drogerie &amp; Gesundheit (inkl. Skin Cosmetics, Freiverkäufliche Arzneimittel)"> Drogerie &amp; Gesundheit (inkl. Skin Cosmetics, Freiverkäufliche Arzneimittel)<br><input type="checkbox" name="e_qualifications[]"
										value="E-Commerce (inkl. Konzeption &amp; Einrichtung Online Shop, Planung &amp; Umsetzung Online Shop, Workshops)"> E-Commerce (inkl. Konzeption &amp; Einrichtung Online Shop, Planung &amp; Umsetzung Online Shop, Workshops)<br>
										<input type="checkbox" name="e_qualifications[]"
										value="Kassensystemdaten und Kundenservice"> Kassensystemdaten
									und Kundenservice<br>
									<br>
								</div>

								<div class="col-12 col-lg-6 mb-4" id="installments"
									style="display: none;">
									<label for="exampleInputEmail1"><?php echo trans('forms.installment_count'); ?></label><br>
									<input type="number" class="form-control" value="1" min="1"
										name="installments">
								</div>

								<div class="col-12 col-lg-6 mb-4" id="consultation"
									style="display: none;">
									<label for="exampleInputEmail1"><?php echo trans('forms.consultation_date'); ?></label><br>
									<input type="text" class="form-control today_calendar" value=""
										name="consultation_date">
								</div>
							</div>

							<div class="row" id="internship_fields" style="display: none;">
								<div class="col-12 col-lg-6 mb-4">
									<label for="exampleInputEmail1"><?php echo trans('forms.job_title'); ?></label><br>
									<input type="text" class="form-control" value=""
										name="job_title" id="job_title_field">
								</div>

								<div class="col-12 col-lg-6 mb-4">
									<label for="exampleInputEmail1"><?php echo trans('forms.student'); ?></label><br>
									<select class="form-control" value="" name="student"
										id="student_field">
										<option value=""><?php echo trans('forms.please_select') ?></option>
                                <?php
                                if (! empty($students)) {
                                    foreach ($students as $student) {
                                        ?>
                                <option
											value="<?php echo $student->id; ?>"><?php echo $student->name; ?></option>
                                <?php } } ?>
                            </select>
								</div>

								<div class="col-12 col-lg-6 mb-4">
									<label for="exampleInputEmail1"><?php echo trans('forms.internship_phase1'); ?></label><br>
									<input type="text" class="form-control date_range"
										name="phase1" id="phase1_field">
								</div>

								<div class="col-12 col-lg-6 mb-4">
									<label for="exampleInputEmail1"><?php echo trans('forms.internship_phase2'); ?></label><br>
									<input type="text" class="form-control date_range"
										name="phase2" id="phase2_field">
								</div>

								<div class="col-12 col-lg-6 mb-4">
									<label for="exampleInputEmail1"><?php echo trans('forms.written_test1'); ?></label><br>
									<input type="text" class="form-control date_range" name="test1"
										id="phase1_field">
								</div>

								<div class="col-12 col-lg-6 mb-4">
									<label for="exampleInputEmail1"><?php echo trans('forms.written_test2'); ?></label><br>
									<input type="text" class="form-control date_range" name="test2"
										id="phase2_field">
								</div>
							</div>

							<div class="row" id="pmmitemplate">
								<div class="col-12 col-lg-12">
									<div class="form-group">
										<label>P/M/MI Template</label> <select class="form-control"
											name="template">
											<option>Please select</option>
                              <?php
                            if (! empty($p_m_mi_templates)) {
                                foreach ($p_m_mi_templates as $template) {
                                    ?>
                              <option
												value="<?php echo $template->id; ?>"><?php echo $template->title; ?></option>
                              <?php } } ?>
                          </select>
									</div>
								</div>
							</div>

							<div class="row" id="pmmiselectblock">
								<div class="col-12 col-lg-12">
									<div id="accordion12" class="accordion-wrapper mb-3">
										<div class="">
											<div id="headingOne12" class="card-header"
												style="background: #E2E2E0;">
												<button type="button" data-toggle="collapse"
													data-target="#collapseOne112" aria-expanded="false"
													aria-controls="collapseOne"
													class="text-left m-0 p-0 btn btn-link btn-block collapsed">
													<h5 class="m-0 p-0" style="font-size: 18px;"><?php echo trans('forms.select_products_modules'); ?></h5>
												</button>
											</div>
											<div data-parent="#accordion12" id="collapseOne112"
												aria-labelledby="headingOne12" class="collapse" style="">
												<div class="card-body" id="product-modules-container"
													style="overflow-x: auto;">
													<input type="hidden" name="products_selected"
														id="selected_products">

													<div id="treeview_container"
														class="hummingbird-treeview well h-scroll-large">
														 <ul id="treeview-products-1" class="hummingbird-base">

                                                    </ul>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<button type="submit" class="btn btn-primary pull-right"
								style="margin-right: 10px;" id="submit_btn"><?php echo trans('forms.submit'); ?></button>
						</form>
					</div>

				</div>






				<p class="alert alert-danger" id="error2" style="display: none;"></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-right"
					data-dismiss="modal" id="add-appointment-close"><?php echo trans('forms.close'); ?></button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
<script type="text/javascript">
	 
	$('.date_range').daterangepicker({
        startDate: new Date(),
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
    
    $('.calendar').daterangepicker({
        singleDatePicker: true,
        startDate: '01-01-1990',
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
    
</script>

