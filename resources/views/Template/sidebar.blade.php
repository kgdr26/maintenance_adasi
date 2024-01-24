<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
                            <div data-i18n="Maintenance">Maintenance</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-3d-cube-sphere"></i>
                            <div data-i18n="Claim Handle">Claim Handle</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pages -->
            @php
                $array_route = ['manageusers', 'managerole', 'managelocation', 'managesection', 'managemachine'];
            @endphp
            <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Manage Data">Manage Data</div>
                </a>
                <ul class="menu-sub">
                    @php
                        $array_route = ['manageusers', 'managerole'];
                    @endphp
                    <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Manage User">Manage User</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item @if (Route::currentRouteName() == 'managerole') active @endif">
                                <a href="{{ route('managerole') }}" class="menu-link">
                                    <div data-i18n="Role">Role</div>
                                </a>
                            </li>
                            <li class="menu-item @if (Route::currentRouteName() == 'manageusers') active @endif">
                                <a href="{{ route('manageusers') }}" class="menu-link">
                                    <div data-i18n="Users">Users</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $array_route = ['managelocation', 'managesection', 'managemachine'];
                    @endphp
                    <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Manage Machine">Manage Machine</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item @if (Route::currentRouteName() == 'managelocation') active @endif">
                                <a href="{{ route('managelocation') }}" class="menu-link">
                                    <div data-i18n="Location">Location</div>
                                </a>
                            </li>
                            <li class="menu-item @if (Route::currentRouteName() == 'managesection') active @endif">
                                <a href="{{ route('managesection') }}" class="menu-link">
                                    <div data-i18n="Section">Section</div>
                                </a>
                            </li>
                            <li class="menu-item @if (Route::currentRouteName() == 'managemachine') active @endif">
                                <a href="{{ route('managemachine') }}" class="menu-link">
                                    <div data-i18n="Machine">Machine</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Sparepart">Sparepart</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Misc -->
            @php
                $array_route = ['createcorrective'];
            @endphp
            <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Production">Production</div>
                </a>
                <ul class="menu-sub">
                    @php
                        $array_route = ['createcorrective'];
                    @endphp
                    <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Corrective">Corrective</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item @if (Route::currentRouteName() == 'createcorrective') active @endif">
                                <a href="{{ route('createcorrective') }}" class="menu-link">
                                    <div data-i18n="Create Corrective">Create Corrective</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Corrective Waiting Closed">Corrective Waiting Closed</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Preventive">Preventive</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Create Preventive">Create Preventive</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Preventive Release">Preventive Release</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <div data-i18n="Preventive Action">Preventive Action</div>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </li>

            @php
                $array_route = ['actioncorrective'];
            @endphp
            <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Maintenance">Maintenance</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item @if (Route::currentRouteName() == 'actioncorrective') active @endif">
                        <a href="{{ route('actioncorrective') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Corrective Action">Corrective Action</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('actioncorrective') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Preventive Action">Preventive Action</div>
                        </a>
                    </li>
                </ul>
            </li>

            @php
                $array_route = ['finishedcorrective'];
            @endphp
            <li class="menu-item @if (in_array(Route::currentRouteName(), $array_route)) active @endif">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Deptman">Deptman</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('finishedcorrective') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-help"></i>
                            <div data-i18n="Finished Corrective">Finished Corrective</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Misc -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-box-multiple"></i>
                    <div data-i18n="Laporan">Laporan</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="" target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                            <div data-i18n="Laporan Maintenance">Laporan Maintenance</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- / Menu -->
