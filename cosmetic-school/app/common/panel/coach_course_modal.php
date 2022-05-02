<div class="modal fade" id="course_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 30px">
            <h3>Create coach course</h3>

            <form action="" method="post" id="course_form" enctype="multipart/form-data">
                <input type="hidden" name="t_id" value="0" id="task_id">
                <input type="hidden" name="c_id" value="<?php echo $course['course']->id ?>" id="course_id" >
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="Maßnahme" class="" style="font-weight:bold">Ziel der Maßnahme<font style="color:red;">*</font></label>
                            <select name="coaches" class="form-control" style="width:100%; margin-bottom: 20px" style="width:100%;">
                                <option value="">Ziele aus dem AVGS</option>
                                <option value="">Ziele des Kundens</option>
                            </select>
                            <textarea class="form-control" id="measure" name="measure" style="margin-top: 30px"></textarea>
                        </div>
                        <div class="position-relative form-group">
                            <label for="Maßnahme" class="" style="font-weight:bold">Konkretes Ergebnis/erbrachte Leistungen<font style="color:red;">*</font></label>
                            <div>
                                <div style="float: left">Vermittlung?</div>
                                <div style="float: left; margin-left: 30px">
                                    <div class="position-relative form-group">
                                        <input type="radio" class="" name="vermitting" value="yes" checked> Yes
                                        <input type="radio" class="" name="vermitting" value="no"> No
                                    </div>
                                </div>
                            </div>
                            <textarea class="form-control" name="vermit_content" id="vermit_content" style="margin-top: 30px"></textarea>
                            <div></div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="Maßnahme" class="" style="font-weight:bold">Weiterführende Empfehlungen<font style="color:red;">*</font></label>
                            <div>1. Werden weitere Coachingstunden benötigt, wenn ja, zu welchem Thema?</div>
                            <textarea class="form-control" name="description" style="margin-top: 10px"></textarea>
                            <div>2. Was wird dem Coachee empfohlen?</div>
                            <textarea class="form-control" name="description" style="margin-top: 10px"></textarea>
                        </div>

                        <div>
                            <button type="submit" id="submit_btn_create">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $("#course_form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData();
            var token = '<?php echo csrf_token(); ?>';
            var measure = $("#measure").val();
            var c_id = $("#course_id").val();
            var vermit = $("#vermit_content").val();
            formData.append('_token', token);
            formData.append('measure', measure);
            formData.append('vermit', vermit);
            formData.append('course_id', c_id);
       
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
                    // alert("success")
                },
                error: function() {
                    //error
                }
            })
        })
    </script>