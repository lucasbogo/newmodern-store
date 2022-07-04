<!-- COPIEI E COLEI A VIEW SUBCATEGORY -->


<?php $__env->startSection('admin'); ?>
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- conteúdo principal -->
            <section class="content">
                <div class="row">




                    <!--  =============== Adicionar Sub-Categorias ================ -->

                    <!-- "col-12" deixa classe larga; abrage a página inteira -->
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Editar Sub-Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="<?php echo e(route('subcategory.update')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <!-- incluir dados que não podem ser vistos ou modificados pelos usuários 
                                                    quando um formulário é enviado; -->
                                        <input type="hidden" name="id" value="<?php echo e($subcategory->id); ?>">

                                        <!-- FIELD p/ Categoria -->
                                        <div class="form-group">
                                            <h5>Selecionar Categoria <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control">
                                                    <option value="" selected="" disabled="">Selecionar
                                                        Categoria
                                                    </option>

                                                    <!-- Mostrar os dados da variável $categories na condição foreach (nome categoria em inglês) -->
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <!--  CONDIÇÃO p/ mostrar os dados, passa-se a coluna category e o id da mesma:
                                                              quando os IDs combinarem, a fk_id category com a id subcategory, então 
                                                              retorna os valores solicitados, caso contrário, retorna nulo -->
                                                        <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $subcategory->category_id ?
                                                        'selected': ''); ?>>

                                                            <?php echo e($category->category_name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                                <?php $__errorArgs = ['category_id'];
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

                                        <!-- INPUT FIELD P/ SUB-CATEGORIA EN -->
                                        <div class="form-group">
                                            <h5>SubCategory <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <!-- campo value="" serve p/ mostrar dinamicamente os valores da subcategoria,(name_en ou name_ptbr) -->
                                                <input type="text" name="subcategory_name_en" class="form-control"
                                                    value="<?php echo e($subcategory->subcategory_name_en); ?>">

                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['subcategory_name_en'];
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

                                        <!-- INPUT FIELD P/ SUB-CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5>Sub-Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <!-- campo value="" serve p/ mostrar dinamicamente os valores da subcategoria,(name_en ou name_ptbr) -->
                                                <input type="text" name="subcategory_name_pt" class="form-control"
                                                    value="<?php echo e($subcategory->subcategory_name_pt); ?>">

                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['subcategory_name_pt'];
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


                                        <!-- Botão adicionar formato 'success' (verde) -->
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                value="Confirmar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/backend/category/subcategory_edit.blade.php ENDPATH**/ ?>