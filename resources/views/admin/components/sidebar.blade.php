<div class="vertical-menu">

    <div data-simplebar class="h-100 bg-dark">

        <!-- User details -->
        {{-- <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ auth()->user()->photo ? asset('storage/user/'.auth()->user()->photo) : asset('global/img/default-avatar.png') }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
                <span class="text-muted">{{ auth()->user()->username ?? "-" }}</span>
            </div>
        </div> --}}

        <!--- Sidemenu -->
        <div class="sidebar-menu" id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-earth-americas"></i>
                        <span>Country Foods</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('categories.create')}}">Create Country</a></li>
                        <li><a href="{{ route('categories.index') }}">Country List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-utensils"></i>
                        <span>Foods Items</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('subcategories.create')}}">Create Foods Items</a></li>
                        <li><a href="{{ route('subcategories.index') }}">Foods Items List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span>Foods</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('products.create')}}">Create Foods</a></li>
                        <li><a href="{{ route('products.index') }}">Foods List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-truck-fast"></i>
                        <span>Manage Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.orders.index') }}">Order List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-gifts"></i>
                        <span>Gift</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.consecutive_orders.index') }}">07 Order Gift</a></li>
                        <li><a href="{{ route('admin.consecutive_orders.awarded') }}">Gift Awarded</a></li>
                        <li><a href="{{ route('specialcontacts.index') }}">Special Gift List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span>Deal of the Day</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('deals.create')}}">Create Deal</a></li>
                        <li><a href="{{ route('deals.index') }}">Deal List</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span>Special</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('specialcontacts.create')}}">Special Create </a></li>
                        <li><a href="{{ route('specialcontacts.index') }}">Special Gift List</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span>coupons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('coupons.create')}}">Create coupons</a></li>
                        <li><a href="{{ route('coupons.index') }}">coupons List</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-solid fa-square-h"></i>
                        <span>Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-photo-film"></i>
                                <span>Hero section</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('hero.create')}}">Create Hero Section</a></li>
                                <li><a href="{{ route('hero.index') }}">Hero Section List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-address-card"></i>
                                <span>Contact</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" class="has-arrow">User Contact</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        {{-- <li><a href="{{ route('usercontact.create')}}">create</a></li> --}}
                                        <li><a href="{{ route('usercontact.index')}}">User Contact List</a></li>
                                    </ul>
                                </li>

                                <li><a href="javascript: void(0);" class="has-arrow">Admin Contact</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ route('admincontact.create')}}">Admin Contact Add</a></li>
                                        <li><a href="{{ route('admincontact.index')}}">Admin Contact List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-bars"></i>
                                <span>About</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('about.create')}}">Create About</a></li>
                                <li><a href="{{ route('about.index') }}">About List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-people-group"></i>
                                <span>Client</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('client.create')}}">Create Client</a></li>
                                <li><a href="{{ route('client.index') }}">Client List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-brands fa-buffer"></i>
                                <span>Offer</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="ri-share-line"></i>
                                        <span>Summer Offer</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('summer.create')}}">Create Summer Offer</a></li>
                                        <li><a href="{{ route('summer.index') }}">Summer Offer List</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="ri-share-line"></i>
                                        <span>Winter Offer</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('winter.create')}}">Create Winter Offer</a></li>
                                        <li><a href="{{ route('winter.index') }}">Winter Offer List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-address-card"></i>
                                <span>Chef</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" class="has-arrow">Chef Contact</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        {{-- <li><a href="{{ route('chefcontact.create')}}">create</a></li> --}}
                                        <li><a href="{{ route('chefcontact.index')}}">Chef Contact List</a></li>
                                    </ul>
                                </li>

                                <li><a href="javascript: void(0);" class="has-arrow">My Chef</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ route('mychef.create')}}">Chef Add</a></li>
                                        <li><a href="{{ route('mychef.index')}}">Chef List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa-solid fa-address-card"></i>
                                <span>subscription</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" class="has-arrow">My Subscription</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        {{-- <li><a href="{{ route('usercontact.create')}}">create</a></li> --}}
                                        {{-- <li><a href="{{ route('usercontact.index')}}">User Contact List</a></li> --}}
                                    </ul>
                                </li>

                                <li><a href="javascript: void(0);" class="has-arrow">Subscribes Contact</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        {{-- <li><a href="{{ route('subscribecontact.create')}}">Subscribes Contact Add</a></li> --}}
                                        <li><a href="{{ route('subscribecontact.index')}}">Contact List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>







                    </ul>
                </li>


                {{-- <li>
                    <a href="#" class=" waves-effect">
                        <i class="ri-price-tag-3-line"></i>
                        <span>Brand</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Read Email</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-preloader.html">Preloader</a></li>
                                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pencil-ruler-2-line"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-images.html">Images</a></li>
                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-offcanvas.html">Offcavas</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-general.html">General</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-vip-crown-2-line"></i>
                        <span>Advanced UI</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="advance-rangeslider.html">Range Slider</a></li>
                        <li><a href="advance-roundslider.html">Round Slider</a></li>
                        <li><a href="advance-session-timeout.html">Session Timeout</a></li>
                        <li><a href="advance-sweet-alert.html">Sweetalert 2</a></li>
                        <li><a href="advance-rating.html">Rating</a></li>
                        <li><a href="advance-notifications.html">Notifications</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span class="badge rounded-pill bg-danger float-end">8</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements.html">Form Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Form Advanced Plugins</a></li>
                        <li><a href="form-editors.html">Form Editors</a></li>
                        <li><a href="form-uploads.html">Form File Upload</a></li>
                        <li><a href="form-xeditable.html">Form X-editable</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Tables</a></li>
                        <li><a href="tables-responsive.html">Responsive Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-apex.html">Apex Charts</a></li>
                        <li><a href="charts-chartjs.html">Chartjs Charts</a></li>
                        <li><a href="charts-flot.html">Flot Charts</a></li>
                        <li><a href="charts-knob.html">Jquery Knob Charts</a></li>
                        <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-remix.html">Remix Icons</a></li>
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font awesome 5</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
