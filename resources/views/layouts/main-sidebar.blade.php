<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img
                    src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img
                    src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img
                    src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img
                    src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span
                            class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
                    <span class="mb-0 text-muted">{{Auth::user()->email}}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                        <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                    </svg>
                    <span class="side-menu__label">Index</span><span class="badge badge-success side-badge">1</span></a>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/>
                    </svg>
                    <span class="side-menu__label">invoices</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('invoice.index') }}">invoices list</a></li>
                    <li><a class="slide-item" href="{{ route('PaidInvoice') }}">Paid invoice</a></li>
                    <li><a class="slide-item" href="{{ route('UnpaidInvoice') }}">unpaid invoice</a></li>
                    <li><a class="slide-item" href="{{ route('PartialyPaidInvoice') }}">partialy paid invoice</a></li>
                    <li><a class="slide-item" href="{{ route('Archive.index') }}">Archive</a></li>


                </ul>
            </li>
            <li class="slide">
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . $page='chart-morris') }}">Morris Charts</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='chart-flot') }}">Flot Charts</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">ChartJS</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='chart-echart') }}">Echart</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='chart-sparkline') }}">Sparkline</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='chart-peity') }}">Chart-peity</a></li>
                </ul>
            </li>
            <li class="slide">
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . $page='products') }}">Products</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='product-details') }}">Product-Details</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='product-cart') }}">Cart</a></li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/>
                    </svg>
                    <span class="side-menu__label">Reports</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . $page='invoices_reports') }}">Invoices Reports</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='User_reports') }}">User Reports</a></li>

                </ul>
            </li>
            <li class="slide">
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . $page='alerts') }}">Alerts</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='avatar') }}">Avatar</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='breadcrumbs') }}">Breadcrumbs</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='buttons') }}">Buttons</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='badge') }}">Badge</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='dropdown') }}">Dropdown</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='thumbnails') }}">Thumbnails</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='list-group') }}">List Group</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='navigation') }}">Navigation</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='images') }}">Images</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='pagination') }}">Pagination</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='popover') }}">Popover</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='progress') }}">Progress</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='spinners') }}">Spinners</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='media-object') }}">Media Object</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='typography') }}">Typography</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='tooltip') }}">Tooltip</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='toast') }}">Toast</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='tags') }}">Tags</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='tabs') }}">Tabs</a></li>
                </ul>
            </li>
            <li class="slide">
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . $page='accordion') }}">Accordion</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='carousel') }}">Carousel</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='collapse') }}">Collapse</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='modals') }}">Modals</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='timeline') }}">Timeline</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='sweet-alert') }}">Sweet Alert</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='rating') }}">Ratings</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='counters') }}">Counters</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='search') }}">Search</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='userlist') }}">Userlist</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='blog') }}">Blog</a></li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/>
                        <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/>
                    </svg>
                    <span class="side-menu__label">Users</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ url('/' . $page='users') }}">Users List</a></li>
                    <li><a class="slide-item" href="{{ url('/' . $page='roles') }}">Users Permissions</a></li>

                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h15v3H5zm12 5h3v9h-3zm-7 0h5v9h-5zm-5 0h3v9H5z" opacity=".3"/>
                        <path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM8 19H5v-9h3v9zm7 0h-5v-9h5v9zm5 0h-3v-9h3v9zm0-11H5V5h15v3z"/>
                    </svg>
                    <span class="side-menu__label">Settings</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('section.index') }}">Sections</a></li>
                    <li><a class="slide-item" href="{{ route('product.index') }}">products</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
