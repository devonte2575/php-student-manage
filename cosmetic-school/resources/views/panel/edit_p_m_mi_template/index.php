<?php include(app_path().'/common/panel/header.php'); ?>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="<?php echo url('hummingbird/hummingbird-treeview.css'); ?>" rel="stylesheet" type="text/css">
<style>
    .hummingbird-treeview * {
    font-size: 18px;
    }
</style>

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
                                    </div>                            </div>
                            </div>
                            <div class="app-inner-layout__content pt-0">
                                <div class="tab-content">
                                    <div class="container-fluid">
                                        <div class="card mb-3">
                                            <?php if(Session::has('error')) { ?>
                                            <p class="alert alert-danger"><?php echo Session::get('error'); ?></p>
                                            <?php } ?>
                                            <?php if(Session::has('success')) { ?>
                                            <p class="alert alert-success"><?php echo Session::get('success'); ?></p>
                                            <?php } ?>
                                            
                                                <div id="form-box">
                                                    <div class="main-card mb-2 card" style="border:0px;">
                                    <div class="card-body"><h5 class="card-title">Edit Template</h5>
                                        <form class="" action="" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class=""><?php echo trans('forms.title'); ?> <font style="color:red;">*</font></label>
                                                        <input name="title" id="exampleEmail11" type="text" class="form-control" required value="<?php echo $data[0]['template']->title; ?> ">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class=""><?php echo trans('forms.authorised_no'); ?> <font style="color:red;">*</font></label>
                                                        <input name="auth_no" id="exampleEmail11" type="text" class="form-control" required value="<?php echo $data[0]['template']->auth_no; ?> ">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="hidden" name="products_selected" id="selected_products" value=" <?php if(!empty($data[0]['p_m_mi']['pids'])) echo implode(',', $data[0]['p_m_mi']['pids']); ?> ">
                                                    <div id="treeview_container" class="hummingbird-treeview well h-scroll-large">
                                                                <ul id="treeview2" class="hummingbird-base">
                                                                    <?php $node='';
                                                                    if(!empty($products)) { $in=0;
                                                                        foreach($products as $p) {
                                                                            $p_id=$p['product']->id;
                                                                            
                                                                            if($in++!=0) $node.=',';
                                                                            $node.='{ "id": "p-'.$p_id.'", "text": "'.$p['product']->title.'", "children": [';
                                                                            
                                                                            $total_cost=$p['total_cost'];
                                                                            if(isset($data[0]['p_m_mi']['total_costP'.$p_id])) $total_cost=$data[0]['p_m_mi']['total_costP'.$p_id];
                                                                            
                                                                            $total_lessons=$p['total_lessons'];
                                                                            if(isset($data[0]['p_m_mi']['total_lessonsP'.$p_id])) $total_lessons=$data[0]['p_m_mi']['total_lessonsP'.$p_id];
                                                                    ?>
                                                                    <input type="hidden" name="modules_selected_<?php echo $p_id; ?>" id="selected_modules_<?php echo $p_id; ?>" value="<?php if(isset($data[0]['p_m_mi']['mids'.$p_id]) AND !empty($data[0]['p_m_mi']['mids'.$p_id])) echo implode(',', $data[0]['p_m_mi']['mids'.$p_id]); ?>" >
                                                                    
                                                                    <li> <i class="fa fa-plus"></i>
                                                                        
                                                                        <label>
                                                                        <input type="checkbox" class="mp-<?php echo $p['product']->id; ?>" name="products[]" value="<?php echo $p['product']->id; ?>" onchange="select_items(this, '.p-<?php echo $p['product']->id; ?>')" id="p-<?php echo $p_id; ?>" data-id="cp2-<?php echo $p_id; ?>" onclick="item_selected('<?php echo $p_id; ?>')" <?php if(isset($p_id, $data[0]['p_m_mi']['pids']) AND in_array($p_id, $data[0]['p_m_mi']['pids'])) echo 'checked'; ?> >
                                                                        
                                                                        <?php echo $p['product']->title.' ('.trans('forms.lessons').': '.$total_lessons.' '.trans('forms.total_cost').': €'.$total_cost.')'; ?>
                                                                        </label>
                                                                    
                                                                    <ul>
                                                                        <?php 
                                                                    if(!empty($p['modules'])) { $in2=0;
                                                                        foreach($p['modules'] as $m) {
                                                                            $m_id=$m['module']->id;
                                                                            
                                                                            if($in2++!=0) $node.=',';
                                                                            $node.='{ "id": "m-'.$m_id.'", "text": "'.$m['module']->title.'", "children": [';
                                                                            
                                                                            $total_cost=$m['total_cost'];
                                                                            if(isset($data[0]['p_m_mi']['total_cost'.$m_id])) $total_cost=$data[0]['p_m_mi']['total_cost'.$m_id];
                                                                            
                                                                            $total_lessons=$m['total_lessons'];
                                                                            if(isset($data[0]['p_m_mi']['total_lessons'.$m_id])) $total_lessons=$data[0]['p_m_mi']['total_lessons'.$m_id];
                                                                    ?>
                                                                    <li> <i class="fa fa-plus"></i>
                                                                        
                                                                        <label>
                                                                        <input type="checkbox" class="p-<?php echo $p['product']->id; ?>" name="modules<?php echo $p_id; ?>[]" value="<?php echo $m['module']->id; ?>" onchange="select_items(this, '.m-<?php echo $m['module']->id; ?>')" id="m-<?php echo $m_id; ?>" data-id="cm2-<?php echo $m_id; ?>" onclick="item_selected('<?php echo $p_id; ?>'); item_selected2('<?php echo $p_id; ?>', '<?php echo $m_id; ?>')" <?php if(isset($m_id, $data[0]['p_m_mi']['mids'.$p_id]) AND in_array($m_id, $data[0]['p_m_mi']['mids'.$p_id])) echo 'checked'; ?> > 
                                                                        </label>
                                                                        
                                                                        <?php echo $m['module']->title.' ('.trans('forms.lessons').': '.$total_lessons.' '.trans('forms.total_cost').': €'.$total_cost.')'; ?>
                                                                        
                                                                        <ul>
                                                                            <?php 
                                                                    if(!empty($m['items'])) { $in3=0;
                                                                        foreach($m['items'] as $item) {
                                                                            $mi_id=$item['item']->id;
                                                                            
                                                                            if($in3++!=0) $node.=',';
                                                                            $node.='{ "id": "mi-'.$mi_id.'", "text": "'.$item['item']->title.'" }';
                                                                            
                                                                            $price=$item['item']->price_lessons;
                                                                            if(isset($data[0]['p_m_mi']['iid_prices'.$m_id]['price'.$mi_id])) $price=$data[0]['p_m_mi']['iid_prices'.$m_id]['price'.$mi_id];
                                                                            
                                                                            $lessons=$item['item']->lessons;
                                                                            if(isset($data[0]['p_m_mi']['iid_prices'.$m_id]['lessons'.$mi_id])) $lessons=$data[0]['p_m_mi']['iid_prices'.$m_id]['lessons'.$mi_id];
                                                                    ?>
                                                                    <li>
                                                                        
                                                                        <label>
                                                                        <input type="checkbox" class="p-<?php echo $p['product']->id; ?> m-<?php echo $m['module']->id; ?>" name="items<?php echo $m['module']->id; ?>[]" value="<?php echo $item['item']->id; ?>" id="mi-<?php echo $mi_id; ?>" data-id="cmi2-<?php echo $mi_id; ?>" onclick="item_selected('<?php echo $p_id; ?>'); item_selected2('<?php echo $p_id; ?>', '<?php echo $m_id; ?>')" <?php if(isset($data[0]['p_m_mi']['iids'.$m_id]) AND in_array($mi_id, $data[0]['p_m_mi']['iids'.$m_id])) echo 'checked'; ?> >
                                                                        
                                                                        <?php echo $item['item']->title; ?>
                                                                        </label>
                                                                        
                                                                        <?php echo ' ( '.trans('forms.lessons').': <input type="number" name="lessons'.$item['item']->id.'" value="'.$lessons.'" style="max-width:60px; padding-top:0px; padding-bottom:0px;" min="0" max="'.$item['item']->lessons.'" required> '.trans('forms.price_lesson').': € <input type="number" name="prices'.$item['item']->id.'" value="'.$price.'" style="max-width:60px; padding-top:0px; padding-bottom:0px;" required min="0" step="any"> )'; ?></li>
                                                                        <?php } } ?>
                                                                        </ul>
                                                                        </li>
                                                                        <?php $node.=' ]}'; } } ?>
                                                                        
                                                                    </ul>
                                                                    </li>
                                                                    <!--<li style="list-style-type:none; padding-bottom:25px;"></li>-->
                                                                    <?php $node.=' ] }'; } } ?>
                                                                </ul>
                                                                </div>
                                                </div>
                                            </div>
                                            
                                            <button class="mt-2 btn btn-primary"><?php echo trans('forms.update'); ?></button>
                                        </form>
                                    </div>
                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include(app_path().'/common/panel/footer.php'); ?>

<div class="modal fade" id="modules" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="modal-title2"><?php echo trans('forms.modules'); ?></h4>
              </div>
              <div class="modal-body">
                  <p class="alert alert-success" id="ass-success" style="display:none;"></p>
                    
                  <div id='products' style="overflow-x:auto;">
                      
                  </div>
                  
                <p class="alert alert-danger" id="error2" style="display:none;"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><?php echo trans('forms.close'); ?></button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script src="<?php echo url('hummingbird/hummingbird-treeview.js'); ?>"></script>
<script>
    $("#treeview-contact-products").hummingbird();
    $("#treeview2").hummingbird();
    
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
    
    window.lessons=0;
    
    function add_module()
    {
        $("#f_error").hide();
        var max=$("#max_lessons").val();
        var id=$("#mod").val();
        var title=$('option:selected', $("#mod")).attr('data-title');
        var lessons=$('option:selected', $("#mod")).attr('data-lessons');
        var total_cost=$('option:selected', $("#mod")).attr('data-total-cost');
        
        if(id!='')
        {
            if( (parseInt(window.lessons)+parseInt(lessons)) < parseInt(max) ) {
                window.lessons=parseInt(window.lessons)+parseInt(lessons);
        $("#modules-data").append('<tr>\
                                                                    <th scope="row"><input type="hidden" name="modules[]" value="'+id+'">'+title+'</th>\
                                                                    <td>'+lessons+'</td>\
                                                                    <td>€'+total_cost+'</td>\
                                                                    <td><a href="javascript:void(0)" style="color:red;" onclick="$(this).parent().parent().remove();"><i class="fa fa-minus-circle"></i></a></td>\
                                                                </tr>');
            }
            else{
                $("#f_error").text("Total lessons cannot be greater than: "+max);
                $("#f_error").show();
            }
        }
        
        var id=$("#mod").val('');
    }
    
    function fetch_modules(id)
    {
        var formData=new FormData();
        var token='<?php echo csrf_token(); ?>';
        formData.append('_token', token);
        formData.append('id', id);
        
        $.ajax({
                url: "<?php echo url('admin/fetch-modules') ?>",
                type: "POST",
                data:  formData,
                beforeSend: function(){ //alert('sending');
                        $("#products").empty();
                },
                contentType: false,
                processData:false,
                success: function(data) { //console.log(data);
                    //success
                    // here we will handle errors and validation messages
                    if ( ! data.success) {
                    } else {
                        // ALL GOOD! just show the success message!
                        $("#products").append(data.products);
                    }
                },
                error: function()  {
                    //error
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
</script>