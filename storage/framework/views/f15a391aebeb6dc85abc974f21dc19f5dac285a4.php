<?php $__env->startSection('admin'); ?>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="content-wrapper" style="min-height: 326px;">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Admin Profile</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <!--IMPORTANTE: Validar dados | Subir dados p/ BD |
                                Rota POST  p/ admin.profile.store em /routes/web.php-->
                            <form method="post" action="<?php echo e(route('admin.profile.store')); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?><!--SEGURANÇA. impede ataques CROSS SITE REQUEST FORGERY -->

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Admin User Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"
                                                            required="" value="<?php echo e($editData->name); ?>">

                                                    </div>
                                                </div>

                                            </div><!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Admin Email<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            required="" value="<?php echo e($editData->email); ?>">

                                                    </div>
                                                </div>


                                            </div><!-- end col md 6 -->
                                        </div><!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">

                                                <!-- Div campo postar imagem -->
                                                <div class="form-group">
                                                    <h5>Admin Profile Picture<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path"
                                                            class="form-control" required="" id="image">

                                                    </div>
                                                </div>
                                            </div>

                                             <!-- Div campo mostrar imagem -->
                                            <div class="col-md-6">
                                                <img id="showImage"
                                                    src="<?php echo e(!empty($editData->profile_photo_path)
                                                        ? url('upload/admin_images/' . $editData->profile_photo_path)
                                                        : url('upload/no-image.png')); ?>"
                                                    style=" width: 100px; height: 100px;">
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Update">
                                        </div>
                                    </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <!-- javascript code para mostrar dinamicamente a foto do upload no perfil adm -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/admin/admin_profile_edit.blade.php ENDPATH**/ ?>