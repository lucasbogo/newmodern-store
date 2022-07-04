<!-- Copiei e colei código de category_edit.blade.php -->


<?php $__env->startSection('admin'); ?>
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- Conteúdo Principal -->
            <section class="content">
                <div class="row">


                    <!--  =============== EDITAR CATEGORIA ================ -->


                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Atualizar Categoria </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <!-- foi criado uma rota POST para guardar a atualização Category 
                                            passa p/ rota category.update com a ID da mesma-->
                                    <form method="post" action="<?php echo e(route('category.update', $category->id)); ?>">
                                        <?php echo csrf_field(); ?>

                                        <!-- incluir dados que não podem ser vistos ou modificados pelos usuários 
                                                    quando um formulário é enviado -->
                                        <input type="hidden" name="id" value="<?php echo e($category->id); ?>" >

                                        <!-- SE QUISERMOS TRABALHAR COM IMAGEM AO INVÉS DE ÍCONE -->
                                        <!-- POST image update
                                            <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                                             POST method: pegar a imagem antiga
                                            <input type="hidden" name="old_image" value="<?php echo e($category->category_image); ?>">
                                             -->

                                        <!-- INPUT FIELD P/ CATEGORIA EN -->
                                        <div class="form-group">
                                            <h5> Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_en" class="form-control"
                                                    value="<?php echo e($category->category_name_en); ?>">
                                                <!-- Mostrar nome categoria dinamicamente -->


                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['category_name_en'];
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

                                        <!-- INPUT FIELD P/ CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5> Categoria <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_name_pt" class="form-control"
                                                    value="<?php echo e($category->category_name_pt); ?>">
                                                <!-- Mostrar nome marca dinamicamente -->


                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['category_name_pt'];
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

                                        <!-- INPUT FIELD P/ ÍCONE CATEGORIA -->
                                        <div class="form-group">
                                            <h5> Ícone <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="category_icon" class="form-control"
                                                    value="<?php echo e($category->category_icon); ?>">
                                                <!-- Mostrar nome categoria dinamicamente -->

                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['category_icon'];
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

                                        <!--SE QUISERMOS TRABALHAR COM IMAGEM AO INVÉS DE ÍCONE -->
                                        <!--
                                            <div class="form-group">
                                                <h5>Imagem <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="category_image" class="form-control">
                                                    <?php $__errorArgs = ['category_image'];
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
                                            -->

                                        <!-- Update Button -->
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

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/backend/category/category_edit.blade.php ENDPATH**/ ?>