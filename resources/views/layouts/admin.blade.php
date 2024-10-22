@extends('layouts.app')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <x-admin.sidebar />
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <x-nav/>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('main')
                    </div>
                    <!-- Content -->
                    <!-- Footer -->
                    <x-footer/>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
