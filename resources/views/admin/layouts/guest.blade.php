<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    @include('admin.partials.prologue')
    <!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-dark header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
    <!--end::Main-->

    @include('admin.partials.epilogue')
</body>
<!--end::Body-->
</html>
