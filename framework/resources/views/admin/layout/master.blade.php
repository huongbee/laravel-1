<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.layout.head')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.layout.header')
            <!-- /.navbar-header -->

            @include('admin.layout.navbar')
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    @include('admin.layout.script')

</body>

</html>
