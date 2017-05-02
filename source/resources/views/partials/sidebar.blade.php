<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-avatar">
                <div class="dropdown">
                    <div>
                        <img alt="image" class="img-circle avatar" width="100" src="{{ Auth::user()->present()->avatar }}">
                    </div>
                    <div class="name"><strong>{{ Auth::user()->present()->nameOrEmail }}</strong></div>
                </div>
            </li>
            <li class="{{ Request::is('/') ? 'active open' : ''  }}">
                <a href="{{ route('dashboard') }}" class="{{ Request::is('/') ? 'active' : ''  }}">
                    <i class="fa fa-dashboard fa-fw"></i> Trang tổng quan
                </a>
            </li>
            @permission('invest.manage')
            <li class="{{ Request::is('dau-tu*') ? 'active open' : ''  }}">
                <a href="{{ route('invest.tao_moi') }}" class="{{ Request::is('dau-tu*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> Đầu tư
                </a>
            </li>
            <li class="{{ Request::is('hop-dong*') ? 'active open' : ''  }}">
                <a href="{{ route('invest.hop_dong') }}" class="{{ Request::is('hop-dong*') ? 'active' : ''  }}">
                    <i class="fa fa-list-alt fa-fw"></i> Hợp đồng đầu tư
                </a>
            </li>
            <li class="{{ Request::is('hoan-von*') ? 'active open' : ''  }}">
                <a href="{{ route('invest.hoan_von') }}" class="{{ Request::is('hoan-von*') ? 'active' : ''  }}">
                    <i class="fa fa-exchange fa-fw"></i> Hoàn vốn đầu tư
                </a>
            </li>
            @endpermission
            @permission('news.user')
            <li class="{{ Request::is('tin-tuc-noi-bo*') ? 'active open' : ''  }}">
                <a href="{{ route('newsuser.list') }}" class="{{ Request::is('tin-tuc-noi-bo*') ? 'active' : ''  }}">
                    <i class="fa fa-newspaper-o"></i> Tin tức
                </a>
            </li>
            @endpermission
            @permission('users.manage')
                <li class="{{ Request::is('user*') ? 'active open' : ''  }}">
                    <a href="{{ route('user.list') }}" class="{{ Request::is('user*') ? 'active' : ''  }}">
                        <i class="fa fa-users fa-fw"></i> @lang('app.users')
                    </a>
                </li>
            @endpermission

            @permission('users.activity')
                <li class="{{ Request::is('activity*') ? 'active open' : ''  }}">
                    <a href="{{ route('activity.index') }}" class="{{ Request::is('activity*') ? 'active' : ''  }}">
                        <i class="fa fa-list-alt fa-fw"></i> Lịch sử
                    </a>
                </li>
            @endpermission

            @permission(['roles.manage', 'permissions.manage'])
                <li class="{{ Request::is('role*') || Request::is('permission*') ? 'active open' : ''  }}">
                    <a href="#">
                        <i class="fa fa-user fa-fw"></i>
                        Vai trò và Quyền
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @permission('roles.manage')
                            <li>
                                <a href="{{ route('role.index') }}" class="{{ Request::is('role*') ? 'active' : ''  }}">
                                    Vai trò
                                </a>
                            </li>
                        @endpermission
                        @permission('permissions.manage')
                            <li>
                                <a href="{{ route('permission.index') }}"
                                   class="{{ Request::is('permission*') ? 'active' : ''  }}">Quyền</a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission

            @permission(['settings.general', 'settings.auth', 'settings.notifications'])
            <li class="{{ Request::is('settings*') ? 'active open' : ''  }}">
                <a href="#">
                    <i class="fa fa-gear fa-fw"></i> Cài đặt
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    @permission('settings.general')
                        <li>
                            <a href="{{ route('settings.general') }}"
                               class="{{ Request::is('settings') ? 'active' : ''  }}">
                                Tổng quát
                            </a>
                        </li>
                    @endpermission
                    @permission('settings.auth')
                        <li>
                            <a href="{{ route('settings.auth') }}"
                               class="{{ Request::is('settings/auth*') ? 'active' : ''  }}">
                                Xác thực & Đăng ký
                            </a>
                        </li>
                    @endpermission
                    @permission('settings.notifications')
                        <li>
                            <a href="{{ route('settings.notifications') }}"
                               class="{{ Request::is('settings/notifications*') ? 'active' : ''  }}">
                                Thông báo
                            </a>
                        </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('investAdmin.manage')
            <li class="{{ Request::is('interest*') ? 'active open' : ''  }}">
                <a href="#">
                    <i class="fa fa-dashboard fa-fw"></i> Quản lý đầu tư
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('interest.list-tra-lai') }}" class="{{ Request::is('interest*') ? 'active' : ''  }}">
                            Quản lý trả lãi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('interest.list-hop-dong-dau-tu') }}" class="{{ Request::is('interest*') ? 'active' : ''  }}">
                            Quản lý HĐ đầu tư
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('interest.lai_bien_dong.list') }}" class="{{ Request::is('interest*') ? 'active' : ''  }}">
                            Lãi suất biên động
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('interest.goi_lai.list') }}" class="{{ Request::is('interest*') ? 'active' : ''  }}">
                            Danh sách gói lãi
                        </a>
                    </li>
                </ul>
            </li>
            @endpermission
            @permission('docs.view')
            <li class="{{ Request::is('docsview*') ? 'active open' : ''  }}">
                <a href="{{ route('docsview.list') }}" class="{{ Request::is('docsview*') ? 'active' : ''  }}">
                    <i class="fa fa-dashboard fa-fw"></i> Tài liệu công ty
                </a>

            </li>
            @endpermission
            @permission('docs.manage')
            <li class="{{ Request::is('docs*') ? 'active open' : ''  }}">
                <a href="#">
                    <i class="fa fa-dashboard fa-fw"></i> Quản lý tài liệu
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('docs.tai-lieu.list') }}" class="{{ Request::is('docs*') ? 'active' : ''  }}">
                            Tài liệu công ty
                        </a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="{{ route('docs.du-an.list') }}" class="{{ Request::is('docs*') ? 'active' : ''  }}">--}}
                            {{--Quản lý dự án--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('docs.chi-nhanh.list') }}" class="{{ Request::is('docs*') ? 'active' : ''  }}">--}}
                            {{--Quản lý chi nhánh--}}
                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            @endpermission
            @permission('users.manage')
            <li class="{{ Request::is('quan-ly-tin-tuc*') ? 'active open' : ''  }}">
                <a href="{{ route('newsadmin.list') }}" class="{{ Request::is('quan-ly-tin-tuc*') ? 'active' : ''  }}">
                    <i class="fa fa-newspaper-o fa-fw"></i> Quản lý tin tức
                </a>
            </li>
            @endpermission
            @permission('users.manage')
            <li class="{{ Request::is('quan-ly-hoi-dap*') ? 'active open' : ''  }}">
                <a href="{{ route('qaadmin.list') }}" class="{{ Request::is('quan-ly-hoi-dap*') ? 'active' : ''  }}">
                    <i class="fa fa-question fa-fw"></i> Quản lý hỏi đáp
                </a>
            </li>
            @endpermission
            @permission('leaderHSG.users')
            <li class="{{ Request::is('ban-lanh-dao-hsg*') ? 'active open' : ''  }}">
                <a href="{{ route('leadergroup') }}" class="{{ Request::is('ban-lanh-dao-hsg*') ? 'active' : ''  }}">
                    <i class="fa fa-cogs fa-fw"></i> Ban lãnh đạo HSG
                </a>
            </li>
            @endpermission
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>