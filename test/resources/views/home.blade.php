<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Honor of Kings</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <br>
            <div id="content">
                <div class="container-fluid">
                    <h1 class="text-bold-black">Honor of Kings</h1>
                    <div class="slideshow-container">
                        <div class="slide active">
                            Game MOBA yang sangat populer dari Tencent Games, dengan lebih dari 100 juta pemain aktif di seluruh dunia,
                            terutama di wilayah Asia.
                        </div>
                        <div class="slide">
                            Game ini menawarkan lebih dari 120 hero, setiap satu dengan keahlian dan karakteristik yang unik.
                        </div>
                        <div class="slide">
                            Mainkan game ini sekarang juga.
                        </div>
                        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                        <button class="next" onclick="changeSlide(1)">&#10095;</button>
                    </div>
                    <script>
                    let currentSlide = 0;
                    const slides = document.querySelectorAll('.slide');
                    function changeSlide(direction) {
                    slides[currentSlide].classList.remove('active');
                    currentSlide = (currentSlide + direction + slides.length) % slides.length;
                    slides[currentSlide].classList.add('active');
                }
                </script>
                    <!-- Privacy Policy -->
                    <div class="privacy-policy mt-4">
                        <img src="{{ asset('images/logo1.jpg') }}" alt="logo" style="width:240px;height:240px;margin-right:25px;">
                        <h1 class="text-bold-black">HONOR OF KINGS</h1>
                        <p>This Privacy Policy explains the when, how and why when it comes to the processing of your personal
                        information in connection with the Official Game Version, Test Version and Websites for Honor of Kings
                        and Honor of Kings · Cloud (the Official Game Version, Test Version, Websites and the Events,
                        collectively or individually, as applicable, the “Service”), and sets out your choices and rights in
                        relation to that information.</p>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.body.classList.toggle('sidebar-toggled');
            document.querySelector('.sidebar').classList.toggle('toggled');
        });
    </script>

</body>
</html>
