<ul class="metismenu" id="menu">
    @can('user_management_access')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-lock'></i>
                    </div>
                    <div class="menu-title">{{ trans('cruds.userManagement.title') }}</div>
                </a>
                <ul>

                    @can('permission_access')
                        <li> <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="bx bx-right-arrow-alt"></i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan

                    @can('role_access')

                            <li> <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                    @endcan



                    @can('user_access')
                        <li> <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="bx bx-right-arrow-alt"></i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan

                        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                            @can('profile_password_edit')
                                <li>
                                    <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        </i>
                                        {{ trans('global.change_password') }}
                                    </a>
                                </li>
                            @endcan
                        @endif
                </ul>
            </li>
    @endcan
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Master</div>
        </a>
        <ul>
            @can('company_access')
                <li> <a href="{{ route('admin.companies.index') }}" class="nav-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage Companies</a>
                </li>
            @endcan
            @can('country_access')
            <li> <a href="{{ route('admin.countries.index') }}" class="nav-link {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i> Manage Countries</a>
            </li>
            @endcan
            @can('state_access')
                    <li> <a href="{{ route('admin.states.index') }}" class="nav-link {{ request()->is('admin/states') || request()->is('admin/states/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage States</a>
                    </li>
            @endcan
            @can('city_access')
                <li> <a href="{{ route('admin.cities.index') }}" class="nav-link {{ request()->is('admin/cities') || request()->is('admin/cities/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage Cities</a>
                </li>
            @endcan
            @can('region_access')
                <li> <a href="{{ route('admin.regions.index') }}" class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage Regions</a>
                </li>
            @endcan
            @can('bank_access')
                    <li> <a href="{{ route('admin.banks.index') }}" class="nav-link {{ request()->is('admin/banks') || request()->is('admin/banks/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage Banks</a>
                    </li>
            @endcan
            @can('product_access')
                    <li> <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage Products</a>
                    </li>
            @endcan
            @can('unit_access')
                    <li> <a href="{{ route('admin.units.index') }}" class="nav-link {{ request()->is('admin/units') || request()->is('admin/units/*') ? 'active' : '' }}"><i class="bx bx-right-arrow-alt"></i>Manage Units</a>
                    </li>
            @endcan
        </ul>
    </li>
    <li class="menu-label">Contacts</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-check'></i>
                </div>
                <div class="menu-title">Customers</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Manage Customers</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-minus'></i>
                </div>
                <div class="menu-title">Vendors</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Manage Vendors</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-car'></i>
                </div>
                <div class="menu-title">Vehicles</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Manage Vehicles</a>
                </li>
            </ul>
        </li>
    </li>
    <li class="menu-label">Sales & Purchases</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
            </div>
            <div class="menu-title">Sales</div>
        </a>
        <ul>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Manage Sales</a>
            </li>
        </ul>
    </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Purchases</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Manage Purchases</a>
                </li>
            </ul>
        </li>
{{--    <li class="menu-label">Pages</li>--}}

</ul>
<!--end navigation-->
</div>
<!--end sidebar wrapper -->
<!--start header -->

