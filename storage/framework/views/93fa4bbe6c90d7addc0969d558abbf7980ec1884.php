<!-- COPIEI E COLEI A VIEW CATEGORY -->


<?php $__env->startSection('admin'); ?>
    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- conteúdo principal -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sub-Categorias <span class="badge badge-pill badge-danger">
                                        <?php echo e(count($subcategories)); ?> </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th> Categoria </th>
                                                <th> Sub Category </th>
                                                <th> Sub-Categoria </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <!-- chamar aqui o método category, declarado na Models/SubCategory.php
                                                                        para mostrar o nome categoria dinamicamente na view subcategory -->
                                                    <td><?php echo e($item['category']['category_name_en']); ?></td>
                                                    <td><?php echo e($item->subcategory_name_en); ?></td>
                                                    <td><?php echo e($item->subcategory_name_pt); ?></td>

                                                    <!-- Alterar o tamanho da width acy conforme necessário -->
                                                    <td width="25%">
                                                        <!-- Editar Sub-Categoria(s) -->
                                                        <a href="<?php echo e(route('subcategory.edit', $item->id)); ?>"
                                                            class="btn btn-info" title="Editar Sub-Categoria"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Sub-Categoria(s) -->
                                                        <a href="<?php echo e(route('subcategory.delete', $item->id)); ?>"
                                                            class="btn btn-danger" id="delete"
                                                            title="Excluir Sub-Categoria">
                                                            <i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->


                    <!--  =============== Adicionar Sub-Categorias ================ -->


                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adicionar Sub-Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="<?php echo e(route('subcategory.store')); ?>">
                                        <?php echo csrf_field(); ?>

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
                                                        <!-- P/ mostrar os dados, passa-se a coluna category e o id da mesma -->
                                                        <option value="<?php echo e($category->id); ?>">
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


                                        <div class="form-group">
                                            <h5>SubCategory <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subcategory_name_en" class="form-control">
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
                                            </div>
                                        </div>

                                        <!-- INPUT FIELD P/ CATEGORIA PTBR -->
                                        <div class="form-group">
                                            <h5>Sub-Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subcategory_name_pt" class="form-control">

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
                                                value="Adicionar">
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

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/backend/subcategory/subcategory_view.blade.php ENDPATH**/ ?>