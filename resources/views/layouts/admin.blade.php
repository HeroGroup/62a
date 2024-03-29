<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Navid Hero">

    <title>62&#xb0; ARCHITECTS Admin | {{$pageTitle}}</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/assets/css/colored-toast.css" rel="stylesheet">
    <link href="/assets/css/selectize.bootstrap3.min.css" rel="stylesheet">
    <link href="/assets/css/image-uploader.css" rel="stylesheet">
    <link href="/assets/css/slider.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('layouts.topbar')

            <div class="container-fluid">
                <div style="display:flex;justify-content:space-between;padding-bottom:10px">
                    <h1 class="h3 mb-2 text-gray-800">{{$pageTitle}}</h1>
                    @if(isset($newButton))
                        <a href="{{isset($newButtonUrl) ? $newButtonUrl : '#'}}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">{{isset($newButtonText) ? $newButtonText : 'add'}}</span>
                        </a>
                    @endif
                </div>

                @yield('content')

            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <b>62&#xb0; ARCHITECTS.</b> 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>
<script src="/assets/js/sweetalert2.min.js"></script>
<script src="/assets/js/selectize.min.js"></script>

<script>
    $(document).ready(function() {
        if("{{\Illuminate\Support\Facades\Session::has('message')}}" === "1") {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            Toast.fire({
                icon: "{{\Illuminate\Support\Facades\Session::get('type')}}" === 'danger' ? 'error' : 'success',
                title: "{{\Illuminate\Support\Facades\Session::get('message')}}"
            });
        }

        $('select:not(select[name=DataTables_Table_0_length])').selectize({
            sortField: 'text'
        });
    });

    function destroy(route,id,elementId) {
        event.preventDefault();

        Swal.fire({
            title: "Delete this record?",
            text: "Bear in mind that deleting is irreversible!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: 'lightgray',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append('_token', "{{csrf_token()}}");
                formData.append('_method', "DELETE");
                formData.append('id',id);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', route, true);
                xhr.addEventListener("load", function() {
                    var response = JSON.parse(xhr.response);
                    if(response.status === 1) {
                        document.getElementById(elementId).remove();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "removed successfully",
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          title: response.message,
                          showConfirmButton: false,
                          timer: 3000
                        })
                    }
                });
                xhr.send(formData);
            }
        });
    }
</script>
</body>
</html>
