<!-- COPIEI E COLEI A VIEW SUBCATEGORY -->


<?php $__env->startSection('admin'); ?>
    <!-- JQuery CDN p/ trabalhar com JS (mostrar nome subcategoria dinamicamente no select field) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content-wrapper" style="min-height: 326px;">
        <div class="container-full">

            <!-- conteúdo principal -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sub-Sub-Categorias <span class="badge badge-pill badge-danger">
                                        <?php echo e(count($subsubcategories)); ?> </span></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th> Categoria </th>
                                                <th> Sub Categoria </th>
                                                <th> Sub Sub Category </th>
                                                <th> Acão </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $__currentLoopData = $subsubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <!-- chamar aqui o método ['category'] Criado na Models/SubCategory.php
                                                                                para mostrar o nome categoria ['category_name_en'] dinamicamente na view subcategory -->
                                                    <td><?php echo e($item['category']['category_name_en']); ?></td>
                                                    <td><?php echo e($item['subcategory']['subcategory_name_en']); ?></td>
                                                    <td><?php echo e($item->subsubcategory_name_en); ?></td>

                                                    <!-- Alterar o tamanho da width acy conforme necessário -->
                                                    <td width="25%">
                                                        <!-- Editar Sub-Sub-Categoria(s) -->
                                                        <a href="<?php echo e(route('subsubcategory.edit', $item->id)); ?>"
                                                            class="btn btn-info" title="Editar Sub-Sub-Categoria"><i
                                                                class="fa fa-pencil"></i> </a>

                                                        <!-- Excluir Sub-Sub-Categoria(s) -->
                                                        <a href="<?php echo e(route('subsubcategory.delete', $item->id)); ?>"
                                                            class="btn btn-danger" id="delete"
                                                            title="Excluir Sub-Sub-Categoria">
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


                    <!--  =============== Adicionar Sub-Sub-Categorias ================ -->


                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adicionar Sub-Sub-Categoria</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="<?php echo e(route('subsubcategory.store')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <!-- SELECT FIELD p/ CATEGORIA -->
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

                                        <!-- SELECT FIELD p/ SUB-CATEGORIA -->
                                        <div class="form-group">
                                            <h5>Selecionar Sub-Categoria <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" class="form-control">
                                                    <option value="" selected="" disabled="">Selecionar
                                                        Sub-Categoria
                                                    </option>

                                                    <!-- JavaScript AJAX Para mostrar subcategoria dinamicamente no select -->

                                                </select>
                                                <?php $__errorArgs = ['subcategory_id'];
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
                                            <h5>Sub Sub Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_en" class="form-control">
                                                <?php $__errorArgs = ['subsubcategory_name_en'];
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
                                            <h5>Sub-Sub-Categoria<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_pt" class="form-control">

                                                <!-- Mensagem de Erro -->
                                                <?php $__errorArgs = ['subsubcategory_name_pt'];
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

    <!-- Código JS para mostrar nome sub-categoria dinamicamente no select field ao selecionar a categoria -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "<?php echo e(url('/category/subcategory/ajax')); ?>/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/backend/subsubcategory/subsubcategory_view.blade.php ENDPATH**/ ?>