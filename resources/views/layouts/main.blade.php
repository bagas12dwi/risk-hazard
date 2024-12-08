<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laman {{ ucfirst(auth()->user()->role) }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <style>
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            cursor: pointer;
        }

        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        input::placeholder {
            color: #fff;
            opacity: 1;
        }

        .bg-gray {
            background-color: #d4d4d4;
        }

        /* Responsive Sidebar */
        .sidebar {
            width: 250px;
            transition: all 0.3s;
            position: fixed;
            height: 100vh;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 20px;
        }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar.collapsed {
            margin-left: -250px;
        }

        .main-content {
            margin-left: 250px;
            transition: all 0.3s;
            width: calc(100% - 250px);
        }

        .main-content.expanded {
            margin-left: 0;
            width: 100%;
        }

        /* Scrollbar styling */
        .sidebar-content::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-content::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.mobile-show {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .profile-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-section .text-end {
                text-align: center !important;
                margin-bottom: 10px;
            }
        }

        /* Fix overflow issues */
        body {
            overflow-x: hidden;
        }

        .form-section {
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Toggle button styles */
        #sidebarToggle {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1001;
        }
    </style>

    @stack('style')
</head>

<body class="bg-light">
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="position-absolute rounded-circle"
            style="
          top: -90px;
          left: -70px;
          width: 400px;
          height: 400px;
          background: linear-gradient(135deg, #2d82ff 0%, #0055cc 100%);
          z-index: 0;
        ">
        </div>
        <div class="position-absolute rounded-circle opacity-75"
            style="
          bottom: 0px;
          right: -100px;
          width: 300px;
          height: 300px;
          background: linear-gradient(135deg, #2d82ff 0%, #0055cc 100%);
        ">
        </div>
        <div class="position-relative">
            @include('components.navbar')

            @yield('konten')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.getElementById("mainContent");
            const sidebarToggle = document.getElementById("sidebarToggle");

            function toggleSidebar() {
                sidebar.classList.toggle("collapsed");
                mainContent.classList.toggle("expanded");
            }

            sidebarToggle.addEventListener("click", toggleSidebar);

            // Close sidebar on mobile when clicking outside
            document.addEventListener("click", function(event) {
                const isMobile = window.innerWidth <= 768;
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggleButton = sidebarToggle.contains(event.target);

                if (isMobile && !isClickInsideSidebar && !isClickOnToggleButton) {
                    sidebar.classList.add("collapsed");
                    mainContent.classList.add("expanded");
                }
            });

            // Adjust sidebar on window resize
            window.addEventListener("resize", function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove("collapsed");
                    mainContent.classList.remove("expanded");
                } else {
                    sidebar.classList.add("collapsed");
                    mainContent.classList.add("expanded");
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();

                // Use `$(this)` to get the clicked delete button, then find the closest form
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // submit the correct form
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
    @stack('script')
</body>

</html>
