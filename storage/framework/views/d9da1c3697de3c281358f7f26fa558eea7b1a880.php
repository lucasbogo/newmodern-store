<?php $__env->startSection('admin'); ?>
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">


                    <!--  =============== Página de Adicionar Marcas ================ -->


                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Atualizar Marca </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <!-- foi criado uma rota POST para guardar a atualização Marca -->
                                    <form method="post" action="<?php echo e(route('brand.update', $brand->id)); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <!-- POST image update -->
                                        <input type="hidden" name="id" value="<?php echo e($brand->id); ?>">
                                        <!-- POST method: pegar a imagem antiga -->
                                        <input type="hidden" name="old_image" value="<?php echo e($brand->brand_image); ?>">


                                        <!-- INPUT FIELD P/ MARCA EN -->
                                        <div class="form-group">
                                            <h5>Brand <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_en" class="form-control"
                                                    value="<?php echo e($brand->brand_name_en); ?>">
                                                <!-- Mostrar nome marca dinamicamente -->


                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['brand_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <!-- /Mensagem de Erro -->
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ MARCA PTBR -->
                                        <div class="form-group">
                                            <h5> Marca <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="brand_name_pt" class="form-control"
                                                    value="<?php echo e($brand->brand_name_pt); ?>">
                                                <!-- Mostrar nome marca dinamicamente -->


                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['brand_name_pt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <!-- /Mensagem de Erro -->
                                            </div>

                                        </div>



                                        <div class="form-group">
                                            <h5>Logomarca <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="brand_image" class="form-control">
                                                <?php $__errorArgs = ['brand_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Atualizar">
                                        </div>
                                    </form>





                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/div col md-4 -->
                </div><!-- /div class row -->

            </section>
            <!-- /.content -->

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/backend/brand/brand_edit.blade.php ENDPATH**/ ?>