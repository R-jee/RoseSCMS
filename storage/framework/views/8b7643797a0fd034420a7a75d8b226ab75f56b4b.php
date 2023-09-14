<div class="modal" id="ViewTaskModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content ">
            <section class="todo-form">
                <form id="data_form_task_view" class="todo-input">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel"><?php echo e(trans('tasks.task')); ?> : <span id="t_name"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3"><?php echo e(trans('tasks.start')); ?> <span class="font-weight-bold"
                                                                                 id="t_start"></span></div>
                            <div class="col-md-3"><?php echo e(trans('tasks.duedate')); ?> <span class="font-weight-bold"
                                                                                   id="t_end"></span></div>
                            <div class="col-md-3"> <span class="font-weight-bold"
                                                         id="t_status"></span></div>
                            <div class="col-md-3"><select class="custom-select" id="t_status_list" name="status"
                                                          onchange="update_status(this.value)">


                                </select></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6"><?php echo e(trans('tasks.creator_id')); ?> <span class="font-weight-bold"
                                                                                      id="t_creator"></span></div>
                            <div class="col-md-6"><?php echo e(trans('tasks.assigned')); ?> <span class="font-weight-bold"
                                                                                    id="t_assigned"></span></div>
                        </div>
                        <hr>

                        <hr>
                        <p class="info" id="ts_description"></p>
                        <hr>
                        <p id="t_description"></p>


                    </div>
                    <div class="modal-footer">
                        <fieldset class="form-group position-relative has-icon-left mb-0">

                        </fieldset>
                    </div>
                    <input type="hidden" value="" id="t_id">
                </form>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    function update_status(did) {
                 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url: '<?php echo e(route('biller.tasks.update_status')); ?>',
            type: 'POST',
            dataType: 'json',
            data: {'id': $('#t_id').val(), 'sid': did},
            success: function (data) {
                $('#t_status').html(data.status);
                $('#tasks-table').DataTable().ajax.reload();
            }
        });
    }
</script><?php /**PATH C:\laragon\www\RoseSCMS\resources\views/focus/projects/modal/task_view.blade.php ENDPATH**/ ?>