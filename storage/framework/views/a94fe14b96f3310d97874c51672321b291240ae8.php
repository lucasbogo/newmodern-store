<!--
Eu utilizei o template "forms_validation.html"
como referencia para essa view adicionar produto.
Está disponível no pacote template que eu comprei
e compartilhei com a equipe.
-->


<?php $__env->startSection('admin'); ?>
    <!-- JQuery CDN p/ trabalhar com JS (mostrar nome subcategoria dinamicamente no select field) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">


            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title"> Adicionar Produtos</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <!-- Validar os campos com POST e garantir que as imagens serão aceitas via upload, enctype -->
                                <form method="post" action=" <?php echo e(route('product.store')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="row">
                                        <div class="col-12">


                                            <!-- PRIMEIRO ROW -->
                                            <div class="row">

                                                <!-- SELECT FIELD MARCA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Marca <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="brand_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Marca
                                                                </option>

                                                                <!-- Mostrar os dados da variável $brands na condição foreach (nome marca em inglês) -->
                                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($brand->id); ?>">
                                                                        <?php echo e($brand->brand_name_en); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                            <?php $__errorArgs = ['brand_id'];
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
                                                </div> <!-- /col-md-4 -->

                                                <!-- SELECT FIELD CATEGORIA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Categoria <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Categoria
                                                                </option>

                                                                <!-- Mostrar os dados da variável $categories na condição foreach (nome categoria em inglês) -->
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                    
                                                                                                
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
                                                </div> <!-- /col-md-4 -->

                                                <!-- SELECT FIELD SUB CATEGORIA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Sub-Categoria <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subcategory_id" class="form-control"
                                                                required="">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar
                                                                    Categoria
                                                                </option>

                                                                
                                                                       

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
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->

                                            <!-- SEGUNDO ROW -->
                                            <div class="row">

                                                <!-- SELECT FIELD SUB-SUB-CATEGORIA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Selecionar Sub-Sub-Categoria <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="subsubcategory_id" class="form-control"
                                                                required="">
                                                                <option value="" selected="" disabled="">
                                                                    Selecionar Sub Sub Categoria
                                                                </option>

                                                                
                                                                        

                                                            </select>
                                                            <?php $__errorArgs = ['subsubcategory_id'];
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
                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD NOME PRODUTO INGLÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name (EN) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en"
                                                                class="form-control" required="">

                                                            <?php $__errorArgs = ['product_id'];
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
                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD NOME PRODUTO PORTUGUÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Nome Produto (PTBR) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_pt"
                                                                class="form-control" required="">

                                                            <?php $__errorArgs = ['product_id'];
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
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->

                                            <!-- TERCEIRO ROW -->
                                            <div class="row">

                                                <!-- INPUT FIELD CÓDIGO DO PRODUTO-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Código <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_code" class="form-control"
                                                                required="">

                                                            <?php $__errorArgs = ['product_code'];
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
                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD QUANTIDADE PRODUTO-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Quantidade <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_qty" class="form-control"
                                                                required="">

                                                            <?php $__errorArgs = ['product_qty'];
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

                                                </div> <!-- /col-md-4 -->

                                                <!-- INPUT FIELD VALOR VENDA -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Valor Venda <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_selling_price"
                                                                class="form-control" required="">

                                                            <?php $__errorArgs = ['product_selling_price'];
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
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->


                                            <!-- QUARTA ROW -->
                                            <div class="row">

                                                <!-- INPUT FIELD INSERIR VALOR DESCONTO-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Valor Final com Desconto <span
                                                                class="text-info">Opcional</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_discount_price"
                                                                class="form-control">


                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INPUT FILE THUMBNAIL (MINIATURA)-->
                                                <!-- JS (onChange) utilizado para mostrar a img miniatura-->
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <h5>Thumbnail (miniatura) <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="file" name="product_thumbnail"
                                                                class="form-control" required=""
                                                                onChange="thumbnailURL(this)">

                                                            <?php $__errorArgs = ['product_thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                            <!-- Mostrar Img Thumbanail pelo JS -->
                                                            <img src="" id="thumbnail">

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INPUT FILE IMAGENS MULTIPLAS -->
                                                <!--JS (onChange) utilizado para mostrar imagens O campo multiple="" serve para poder inserir multiplas fotos-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Imagens <span class="text-danger">*</span></h5>
                                                        <div class="controls">

                                                            <input type="file" name="images[]" class="form-control"
                                                                required="" multiple="" id="images">

                                                            <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="text-danger"><?php echo e($message); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <div class="row" id="preview_images"></div>




                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->

                                            <br>
                                            <br>

                                            <!-- QUINTA ROW -->
                                            <div class="row">

                                                <!-- INSERIR COR INGLÊS-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Color <span class="text-info">OPCIONAL</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_en"
                                                                class="form-control" value=""
                                                                data-role="tagsinput">



                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INSERIR COR PORTUGUÊS-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Cor <span class="text-info">OPCIONAL</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_color_pt"
                                                                class="form-control" value=""
                                                                data-role="tagsinput">



                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <!-- TAMANHO PRODUTO INGLÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Size <span class="text-info">Optional</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_en"
                                                                class="form-control" value=""
                                                                data-role="tagsinput">



                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- TAMANHO PRODUTO PORTUGUÊS -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Tamanho <span class="text-info">Opcional</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_size_pt"
                                                                class="form-control" value=""
                                                                data-role="tagsinput">



                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-4 -->

                                            </div><!-- /row -->

                                            <br>
                                            <br>

                                            <!-- SÉTIMO ROW -->
                                            <div class="row">

                                                <!-- TEXT-AREA DESCRIÇÃO CURTA EN -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Short Description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="product_short_description_en" id="product_short_description_en" class="form-control" required
                                                                placeholder="Insert Product's Short Description"></textarea>



                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-6 -->

                                                <!-- TEXT-AREA DESCRIÇÃO CURTA PTBR -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Descrição Curta <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="product_short_description_pt" id="product_short_description_pt" class="form-control" required
                                                                placeholder="Insira a Descrição Curta do Produto"></textarea>



                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-6 -->
                                            </div><!-- /row -->

                                            <br>
                                            <br>

                                            <!-- OITAVO ROW -->
                                            <div class="row">

                                                <!-- TEXT-AREA DESCRIÇÃO LONGA EN -->
                                                <!-- CK EDITOR FOI UTILIZADO PARA DESCRIÇÃO LONGA TIRADO DE **forms_editor.html** DO PACOTE TEMPLATE COMPRADO -->
                                                <!-- É possível criar mais editores CK adicionando novas funções no editor.js localizado em /public/backend/pages/editor.js -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Long Description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editorEN" name="product_long_description_en" rows="10" cols="80">
                                                                Insert Product's Long Description
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-6 -->


                                                <!-- TEXT-AREA DESCRIÇÃO LONGA PTBR -->
                                                <!-- CK EDITOR FOI UTILIZADO PARA DESCRIÇÃO LONGA TIRADO DE **forms_editor.html** DO PACOTE TEMPLATE COMPRADO -->
                                                <!-- É possível criar mais editores CK adicionando novas funções no editor.js localizado em /public/backend/pages/editor.js -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Descrição Longa <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editorPTBR" name="product_long_description_pt" rows="10" cols="80">
                                                                Insira a descrição Longa do Produto
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div> <!-- /col-md-6 -->
                                            </div><!-- /row -->


                                            <br><!-- quebra temática em uma página HTML -->


                                            <div class="row">
                                                <!-- CHECKBOX 1 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5> PROMOÇÕES (OPCIONAL) </h5>
                                                        <div class="controls">
                                                            <fieldset>
                                                                
                                                                <input type="checkbox" id="checkbox_2"
                                                                    name="product_hot_deals" value="1">
                                                                <label for="checkbox_2">Hot Deals</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_3"
                                                                    name="product_featured" value="1">
                                                                <label for="checkbox_3">Featured/Destaque</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CHECKBOX 2 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>PROMOÇÕES (OPCIONAL) </h5>
                                                        <div class="controls">
                                                            <fieldset>
                                                                
                                                                <input type="checkbox" id="checkbox_4"
                                                                    name="product_special_offer" value="1">
                                                                <label for="checkbox_4">Especial Offer</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_5"
                                                                    name="product_special_deals" value="1">
                                                                <label for="checkbox_5">Especial Deals</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- BOTÃO ADICIONAR PRODUTO -->
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                    value="Adicionar">
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
    </div>
    <!-- /.content-wrapper -->

    <!-- Código JS para mostrar nome subcategoria dinamicamente -->
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
                            $('select[name="subsubcategory_id"]').html(
                                ''
                            ); // ao mudar a categoria no selectview, o campo sub-sub-categoria torna-se nulo
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

            // Código JS para mostrar nome sub-sub0categoria dinamicamente no select field ao selecionar a sub-categoria 
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "<?php echo e(url('/category/sub-subcategory/ajax')); ?>/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>


    
                                
    <script type="text/javascript">
        // Chamar a função declarada na div thumbnail e passar o input
        function thumbnailURL(input) {
            // Condição: se existir um arquivo, pegar o primeiro index
            if (input.files && input.files[0]) {
                //declarar a variável (va reader) como FileReader
                var reader = new FileReader();
                // Onload a variável FileReader passando e na função
                reader.onload = function(e) {
                    // Pegar a id thumbnail img e passar o atributo, (src) declarado na div thumbnail <img src="" id="thumbnail"> 
                    // e o 'e' target (e.target.result) declarando, também, a largura e a altura do thumbnail
                    $('#thumbnail').attr('src', e.target.result).width(60).height(60);

                };
                // Função Default do JS para ler/interpretar o primeiro index declarado na condição deste cod;
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Código JS p/ mostrar imagens produto pela função JS onChange -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#images').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) // verificar API Arquivo se o mesmo é suportado pelo navegador
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop em cada arquivo
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { // verifica o tipo do arquivo suportado 
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumbnail').attr(
                                            'src',
                                            e.target.result).width(60)
                                        .height(60); // cria um elemento de imagem 
                                    $('#preview_images').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucas/newmodern-store/resources/views/backend/product/product_add.blade.php ENDPATH**/ ?>