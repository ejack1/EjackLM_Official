<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    @yield('title')
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="dist/css/app.css" />
    <link rel="stylesheet" href="{{ asset('Admin/dist/css/app.css') }}">
    <!-- END: CSS Assets-->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <link href="~/Content/fontawesome-all.min.css" rel="stylesheet" />

    {{-- Datatable --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&family=Bebas+Neue&display=swap"
        rel="stylesheet">
    <style>
        @font-face {
            font-family: myFirstFont;
            src: url({{asset('Admin/DroidSansMono.ttf')}});
        }

        body {
            font-family: myFirstFont !important;
        }

    </style>
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                    src="{{ asset('Admin/dist/images/l.jpeg') }}">
                    {{-- src="images/{{$c->unique_id_pic}}" --}}
                    {{-- {{dd($setting)}} --}}
                    {{-- <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                    src="images/logo/{{$setting->logo}}" alt="IMG"> --}}
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="index.html"
                    class="menu menu--active {{ request()->is('place-add*') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>

            
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="box"></i> </div>
                    <div class="menu__title"> Customer Management <i data-feather="chevron-down"
                            class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ route('customers.create') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title">Add Customer</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Customer</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="box"></i> </div>
                    <div class="menu__title"> Staff Management <i data-feather="chevron-down"
                            class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ route('users.create') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title">Add Staff</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Staff</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('branches.index') }}"
                    class="menu menu--active {{ request()->is('place-add*') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Branch Management </div>
                </a>
            </li>

            <li>
                <a href="{{ route('routes.index') }}"
                    class="menu menu--active {{ request()->is('place-add*') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Routs Management </div>
                </a>
            </li>

            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="box"></i> </div>
                    <div class="menu__title"> Location Management <i data-feather="chevron-down"
                            class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ route('cities.index') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title">Cities</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('states.index') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> States</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('countries.index') }}" class="menu">
                            <div class="menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="menu__title"> Countries</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('roles.index') }}"
                    class="menu menu--active {{ request()->is('place-add*') ? 'menu--active' : '' }}">
                    <div class="menu__icon"> <i data-feather="home"></i> </div>
                    <div class="menu__title"> Role Management </div>
                </a>
            </li>
            <li>
                <a href="{{ route('designations.index') }}"
                    class="menu menu--active {{ request()->is('place-add*') ? 'menu--active' : '' }}">
                    <div class="menu__icon"><i class="fas fa-tasks"></i> </div>
                    <div class="menu__title"> Designation Management </div>
                </a>
            </li>

        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone Tailwind HTML Admin Template" class="w-120"
                    src="{{ asset('Admin/dist/images/l.jpeg') }}">

                    {{-- @php
                        use general_setting;
                        $setting = general_setting::find(1);
                    @endphp --}}

                    {{-- <img style="
                    width: 144px;" alt="Midone Tailwind HTML Admin Template" class="w-6"
                    src="images/logo/{{$setting->logo}}" width="100px" alt="IMG"> --}}
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="{{ url('/') }}"
                        class="side-menu {{ request()->is('place-add*') ? 'menu--active' : '' }}">
                        <div class="side-menu__icon"> <i class="fas fa-tachometer-alt"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                {{-- setting start  --}}
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-tasks"></i> </div>
                        <div class="side-menu__title"> General Setting  <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ url('settings.main') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Company Details </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('settings.social') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Social Details </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('settings.smtpconfig') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> SMTP Configuration </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('settings.paymentsetting') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Payment Setting </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('settings.testimonials') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.create') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i class="fas fa-user-plus"></i> </div>
                                <div class="side-menu__title"> Show Testimonials </div>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- setting end  --}}

                {{-- Shipment start  --}}
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-tasks"></i> </div>
                        <div class="side-menu__title"> Shipment Setting  <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ url('shipments.main') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> All Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.add_shipment') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Create Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.return_to_client') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Return Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.delivered_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Delivered Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.inTransit_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> In Transit Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.deleted_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Deleted Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.import_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Import Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.export_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Export Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.archive_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Archive Shipments </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('shipments.print_shipments') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Bulk Print </div>
                            </a>
                        </li>


                        {{-- <li>
                            <a href="{{ url('settings.smtpconfig') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> SMTP Configuration </div>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{ url('settings.paymentsetting') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Payment Setting </div>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{ url('settings.testimonials') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.create') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i class="fas fa-user-plus"></i> </div>
                                <div class="side-menu__title"> Show Testimonials </div>
                            </a>
                        </li> --}}

                    </ul>
                </li>
                {{-- Shipment end  --}}




                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-tasks"></i> </div>
                        <div class="side-menu__title"> Customer Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('customers.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Customers </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('customers.create') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.create') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i class="fas fa-user-plus"></i> </div>
                                <div class="side-menu__title"> Add Customers </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-tasks"></i> </div>
                        <div class="side-menu__title"> Staff Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> Staff </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.create') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i class="fas fa-user-plus"></i> </div>
                                <div class="side-menu__title"> Add Staff </div>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- RTO  --}}

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-tasks"></i> </div>
                        <div class="side-menu__title"> RPO Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('RPO.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-tasks"></i></div>
                                <div class="side-menu__title"> RTO LIST </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('RPO_pendings') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('customers.create') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"><i class="fas fa-user-plus"></i> </div>
                                <div class="side-menu__title"> Pending RTO List </div>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- RTO   --}}



                <li>
                    <a href="{{ route('branches.index') }}" class="side-menu ">
                        <div class="side-menu__icon"> <i class="fas fa-building"></i> </div>
                        <div class="side-menu__title"> Branch Management</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('routes.index') }}" class="side-menu ">
                        <div class="side-menu__icon"> <i class="fas fa-route"></i> </div>
                        <div class="side-menu__title"> Routs Management </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-location-arrow"></i></div>
                        <div class="side-menu__title"> Location Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('cities.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('cities.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-city"></i></div>
                                <div class="side-menu__title"> Cities </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('states.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('states.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-university"></i> </div>
                                <div class="side-menu__title"> states </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('countries.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('countries.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-flag"></i></div>
                                <div class="side-menu__title"> countries </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}" class="side-menu ">
                        <div class="side-menu__icon"> <i class="fas fa-building"></i> </div>
                        <div class="side-menu__title"> Roles Management</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('designations.index') }}" class="side-menu ">
                        <div class="side-menu__icon"> <i class="fas fa-building"></i> </div>
                        <div class="side-menu__title"> Designation Management</div>
                    </a>
                </li>


                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-location-arrow"></i></div>
                        <div class="side-menu__title"> Supplier Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('suppliers.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('cities.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-city"></i></div>
                                <div class="side-menu__title"> suppliers </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('suppliers.create') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('countries.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-flag"></i></div>
                                <div class="side-menu__title"> Add Supplier </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-location-arrow"></i></div>
                        <div class="side-menu__title"> inventory Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('shelvelocations.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('cities.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-city"></i></div>
                                <div class="side-menu__title"> Shelve Locations </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('shelvelocations.create') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('countries.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-flag"></i></div>
                                <div class="side-menu__title"> Add Shelve Location </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('shelves.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('countries.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-flag"></i></div>
                                <div class="side-menu__title"> Shelves </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('shelves.create') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('countries.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-flag"></i></div>
                                <div class="side-menu__title"> Add Shelve </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="side-menu ">
                        <div class="side-menu__icon"> <i class="fas fa-building"></i> </div>
                        <div class="side-menu__title"> Product Type</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i class="fas fa-location-arrow"></i></div>
                        <div class="side-menu__title"> Zone Management <i data-feather="chevron-down"
                                class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('zones.index') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('cities.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-city"></i></div>
                                <div class="side-menu__title"> Show Zone List </div>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('suppliers.create') }}"
                                class="side-menu menu--active {{ Route::currentRouteName('countries.index') ? 'side-menu--active' : '' }}">
                                <div class="side-menu__icon"> <i class="fas fa-flag"></i></div>
                                <div class="side-menu__title"> Add Supplier </div>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href=""
                        class="">Application</a> <i data-feather="chevron-right"
                        class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                        <div>
                            @if(auth()->user()->role_id == 3)
                                <h1> Hello Admin</h1>
                            @else
                                <h1> Hello Customer </h1>
                            @endif
                            
                    </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
                        <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                    </div>
                    <a class="notification sm:hidden" href=""> <i data-feather="search"
                            class="notification__icon dark:text-gray-300"></i> </a>
                    <div class="search-result">
                        <div class="search-result__content">
                            <div class="search-result__content__title">Pages</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                    <div class="ml-3">Mail Settings</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="users"></i> </div>
                                    <div class="ml-3">Users & Permissions</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div
                                        class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                                        <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                    <div class="ml-3">Transactions Report</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Users</div>
                            <div class="mb-5">
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-4.jpg">
                                    </div>
                                    <div class="ml-3">John Travolta</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        johntravolta@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-11.jpg">
                                    </div>
                                    <div class="ml-3">Tom Cruise</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        tomcruise@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-6.jpg">
                                    </div>
                                    <div class="ml-3">John Travolta</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        johntravolta@left4code.com</div>
                                </a>
                                <a href="" class="flex items-center mt-2">
                                    <div class="w-8 h-8 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                            src="dist/images/profile-13.jpg">
                                    </div>
                                    <div class="ml-3">Tom Cruise</div>
                                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                        tomcruise@left4code.com</div>
                                </a>
                            </div>
                            <div class="search-result__content__title">Products</div>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-13.jpg">
                                </div>
                                <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp;
                                    Tablet</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-11.jpg">
                                </div>
                                <div class="ml-3">Dell XPS 13</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">PC &amp; Laptop
                                </div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-3.jpg">
                                </div>
                                <div class="ml-3">Samsung Q90 QLED TV</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                        src="dist/images/preview-5.jpg">
                                </div>
                                <div class="ml-3">Nike Tanjun</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications -->

                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img alt="Midone Tailwind HTML Admin Template"
                            src="{{ asset('Admin/dist/images/admin/download.png') }}">
                    </div>
                    <div class="dropdown-box w-56">
                        <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                            <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                <div class="font-medium">{{ Auth::user()->name }}</div>
                                {{-- <div class="text-xs text-theme-41 dark:text-gray-600">DevOps Engineer</div> --}}
                            </div>
                            <div class="p-2">
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                <div
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i>
                                    <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                            <div class="p-2 border-t border-theme-40 dark:border-dark-3">

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            @yield('content')
        </div>
        <!-- END: Content -->
    </div>
    {{-- <!-- BEGIN: Dark Mode Switcher-->
        <div data-url="side-menu-dark-dashboard.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
            <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
            <div class="dark-mode-switcher__toggle border"></div>
        </div> --}}
    <!-- END: Dark Mode Switcher-->
    @yield('script')

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> --}}

    <script src="{{ asset('Admin/dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->


</body>

</html>
