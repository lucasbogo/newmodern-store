<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="NewModern team" content="">
    <link rel="icon" href="<?php echo e(asset('backend/images/favicon-32x32.png')); ?>">

    <title>NewModern Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/vendors_css.css')); ?>">

    <!-- Style-->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/skin_color.css')); ?>">

    <!-- Toaster Stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">


        <?php echo $__env->yieldContent('admin'); ?>


        <?php echo $__env->make('admin.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.body.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        </div>

        <?php echo $__env->make('admin.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="<?php echo e(asset('backend/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('../assets/icons/feather-icons/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')); ?>"></script>
    <script src="<?php echo e(asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')); ?>"></script>
    <script src="<?php echo e(asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')); ?>"></script>

    <!-- JS tabela de Marcas -->
    <script src="<?php echo e(asset('../assets/vendor_components/datatable/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/pages/data-table.js')); ?>"></script>

    <!-- Sunny Admin App -->
    <script src="<?php echo e(asset('backend/js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/pages/dashboard.js')); ?>"></script>
    
    <!-- Bootstrap p/ trababalhar com TAGS -->
    <script src="<?php echo e(asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')); ?>"></script>

    <!-- Bootstrap p/ tabalhar com editores de texto completos como o CK EDITOR -->	
    <script src="<?php echo e(asset('../assets/vendor_components/ckeditor/ckeditor.js')); ?>"></script>
	<script src="<?php echo e(asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/js/pages/editor.js')); ?>"></script>


    <!-- Script para mostrar as mensagens toaster para o admin. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- TOASTER MESSAGE -->
    <script>
        <?php if(Session::has('message')): ?>
            var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"
            switch (type) {

                case 'info':
                    toastr.info(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'success':
                    toastr.success(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'warning':
                    toastr.warning(" <?php echo e(Session::get('message')); ?> ");
                    break;

                case 'error':
                    toastr.error(" <?php echo e(Session::get('message')); ?> ");
                    break;

            }
        <?php endif; ?>
    </script>

    <!-- CDN do sweet alert: mensagensde alerta,customizadas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- ========== SWEET ALERT ========= -->
    <!-- ARRUMAR ISSO: mensagem aparece, mas não exlui o objeto-->


    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete',function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Voce tem certeza?',
                    text: "Você não poderá desfazer isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, Exclua!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Excluido!',
                            'Seu arquivo foi Excluido.',
                            'successo'
                        )
                    }
                })
            })
        })
    </script>
-->

</body>

</html>
<?php /**PATH /home/lucas/newmodern-store/resources/views/admin/admin_master.blade.php ENDPATH**/ ?>