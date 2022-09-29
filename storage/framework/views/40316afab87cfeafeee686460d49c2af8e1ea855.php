<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation <?php echo e($errors->any()?'was-validated':''); ?>" novalidate="">
                <h4 class="panel-hdr">
                    <i class="fal fa-address-book"></i> <?php echo app('translator')->get('staff::labels.lbl_data_person'); ?>
                </h4>
                <hr class="mb-0 mt-4">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <div id="xyDivUploadPhoto" wire:ignore>
                        <label class="form-label" for="photo"><?php echo app('translator')->get('staff::labels.lbl_photo'); ?> <span class="text-danger">*</span> </label>
                        <div class="custom-file">
                            <input wire:model="photo" type="file" class="custom-file-input" id="photo">
                            <label class="custom-file-label" for="customFile"><?php echo app('translator')->get('staff::labels.lbl_choose_file'); ?></label>
                        </div>
                        </div>
                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2" id="xyDivErrorPhoto"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="d-flex flex-column align-items-center justify-content-center" wire:ignore style="display: none !important;" id="xyDivPreviewPhoto">
                            <img src="" id="preview-image-before-upload" class="rounded-circle shadow-2 img-thumbnail" style="width: 80px;height: 70px" alt="">
                            <a href="javascript:void(0);" onclick="deletePhoto()" class="btn btn-outline-danger btn-xs btn-icon rounded-circle waves-effect waves-themed">
                                <i class="fal fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="names"><?php echo app('translator')->get('staff::labels.lbl_names'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="names" type="text" class="form-control" id="names" required="">
                        <?php $__errorArgs = ['names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="last_name_father"><?php echo app('translator')->get('staff::labels.lbl_surname_father'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="last_name_father" type="text" class="form-control" id="last_name_father" required="">
                        <?php $__errorArgs = ['last_name_father'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="last_name_mother"><?php echo app('translator')->get('staff::labels.lbl_surname_mother'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="last_name_mother" type="text" class="form-control" id="last_name_mother" required="">
                        <?php $__errorArgs = ['last_name_mother'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="address"><?php echo app('translator')->get('staff::labels.lbl_address'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="address" type="text" class="form-control" id="address" required="">
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="telephone"><?php echo app('translator')->get('staff::labels.lbl_telephone'); ?> </label>
                        <input wire:model="telephone" type="text" class="form-control" id="telephone">
                        <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="department_id"><?php echo app('translator')->get('staff::labels.lbl_department'); ?> <span class="text-danger">*</span> </label>
                        <select wire:change="getProvinves" wire:model="department_id" id="department_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['department_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="province_id"><?php echo app('translator')->get('staff::labels.lbl_province'); ?> <span class="text-danger">*</span> </label>
                        <select wire:change="getPDistricts" wire:model="province_id" id="province_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($province->id); ?>"><?php echo e($province->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="district_id"><?php echo app('translator')->get('staff::labels.lbl_district'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="district_id" id="district_id" class="custom-select" required="">
                            <option value="">Seleccionar</option>
                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($district->id); ?>"><?php echo e($district->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="sex"><?php echo app('translator')->get('staff::labels.lbl_sex'); ?> <span class="text-danger">*</span> </label>
                        <div class="frame-wrap">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="man" name="sex" wire:model="sex" value="H">
                                <label class="custom-control-label" for="man"><?php echo app('translator')->get('staff::labels.lbl_man'); ?></label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="woman" name="sex" wire:model="sex" value="M" >
                                <label class="custom-control-label" for="woman"><?php echo app('translator')->get('staff::labels.lbl_woman'); ?></label>
                            </div>
                        </div>
                        <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="identity_document_type_id"><?php echo app('translator')->get('staff::labels.lbl_identity_document_type'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="identity_document_type_id" id="identity_document_type_id" class="custom-select" required="">
                            <option value=""><?php echo app('translator')->get('staff::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $document_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['identity_document_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="number"><?php echo app('translator')->get('staff::labels.lbl_number'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="number" type="text" class="form-control" id="number" required="" <?php echo e($this->person_id ? 'readonly' : ''); ?>>
                        <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="birth_date"><?php echo app('translator')->get('staff::labels.lbl_date_of_birth'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="birth_date" required="" onchange="this.dispatchEvent(new InputEvent('input'))" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control" im-insert="true" id="txtDate_of_birth">
                        <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="email"><?php echo app('translator')->get('staff::labels.lbl_email'); ?> </label>
                        <input wire:model="email" type="text" class="form-control" id="email" required="">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <h4 class="panel-hdr">
                    <i class="fal fa-user-cog"></i> <?php echo app('translator')->get('staff::labels.lbl_employee_data'); ?>
                </h4>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="employee_type_id"><?php echo app('translator')->get('staff::labels.lbl_employee_type'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="employee_type_id" id="employee_type_id" class="custom-select" required="">
                            <option value=""><?php echo app('translator')->get('staff::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $employees_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($employees_type->id); ?>"><?php echo e($employees_type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['employee_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="occupation_id"><?php echo app('translator')->get('staff::labels.lbl_occupation'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="occupation_id" id="occupation_id" class="custom-select" required="">
                            <option value=""><?php echo app('translator')->get('staff::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($occupation->id); ?>"><?php echo e($occupation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['occupation_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3" id="xyDivCompany" wire:ignore>
                        <label class="form-label" for="company_id"><?php echo app('translator')->get('staff::labels.lbl_company'); ?></label>
                        <select wire:model="company_id" id="company_id" class="custom-select">
                            <option value=""><?php echo app('translator')->get('staff::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($company->id); ?>"><?php echo e($company->full_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['company_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="admission_date"><?php echo app('translator')->get('staff::labels.lbl_admission_date'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="admission_date" required="" onchange="this.dispatchEvent(new InputEvent('input'))" type="text" data-inputmask="'mask': '99/99/9999'" class="form-control" im-insert="true" id="txtAdmisionDate">
                        <?php $__errorArgs = ['admission_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="cv"><?php echo app('translator')->get('staff::labels.lbl_cv'); ?> <span class="text-danger">*</span> </label>
                        <div class="custom-file" wire:ignore>
                            <input wire:model="cv" type="file" class="custom-file-input" id="cv">
                            <label class="custom-file-label" for="customFile"><?php echo app('translator')->get('staff::labels.lbl_choose_file'); ?></label>
                        </div>
                        <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="<?php echo e(route('staff_employees_index')); ?>" type="button" class="btn btn-secondary waves-effect waves-themed"><?php echo app('translator')->get('staff::labels.lbl_list'); ?></a>
            <button wire:click="save" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed"><?php echo app('translator')->get('staff::labels.btn_save'); ?></button>
        </div>
    </div>
    <script type="text/javascript">
        function deletePhoto(){
            $('#xyDivPreviewPhoto').attr('style', 'display: none !important');
            $("#xyDivUploadPhoto").css('display', 'block');
            $("xyDivErrorPhoto").html("");
        }

        document.addEventListener('per-employees-type-save', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'><?php echo e(__('staff::labels.lbl_success')); ?>!</span>",
                message: "<span><strong><?php echo e(__('staff::labels.lbl_excellent')); ?>... </strong>"+event.detail.msg+"</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false,
                callback: function () {
                    let url = "<?php echo e(route('staff_employees_search')); ?>";
                    window.location.href = url;
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });
        document.addEventListener('livewire:load', function () {
            $('#photo').change(function(e){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                    $("#xyDivPreviewPhoto").css('display', 'block');
                    $("#xyDivUploadPhoto").css('display', 'none');
                }
                reader.readAsDataURL(this.files[0]);
            });

            $("#employee_type_id").change(function (){
                if($(this).val() == "1"){
                    $("#xyDivCompany").css("display", "none");
                    $("#company_id").val("");
                }else{
                    $("#xyDivCompany").css("display", "block");
                }
            });

            $(":input").inputmask();
            var controls = {
                leftArrow: "<i class='fal fa-angle-left' style='font-size: 1.25rem'></i>",
                rightArrow: "<i class='fal fa-angle-right' style='font-size: 1.25rem'></i>"
            }

            $("#txtDate_of_birth, #txtAdmisionDate").datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls,
                language: "es",
                autoclose: true
            });
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\partido\Modules/Staff\Resources/views/livewire/employees/employees-create.blade.php ENDPATH**/ ?>