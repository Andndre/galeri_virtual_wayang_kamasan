<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand py-4">
        <a href="{{ $brandUrl ?? '#' }}" class="app-brand-link">
            <img class="img-fluid" src="{{ asset('assets/img/logo/text-logo.png') }}" alt="logo">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menuItems as $menuItem)
            <li class="menu-item {{ Route::is($menuItem['route_is']) ? (!empty($menuItem['submenu']) ? 'open' : 'active') : '' }}">
                <a href="{{ $menuItem['url'] }}" class="menu-link {{ !empty($menuItem['submenu']) ? 'menu-toggle' : ''}}">
                    <i class="menu-icon tf-icons {{ $menuItem['icon'] }}"></i>
                    <div data-i18n="{{ $menuItem['label'] }}">{{ $menuItem['label'] }}</div>
                </a>
                @if (!empty($menuItem['submenu']))
                    <ul class="menu-sub">
                        @foreach ($menuItem['submenu'] as $submenu)
                            <li class="menu-item {{ Route::is($submenu['route_is']) ? 'active' : '' }}">
                                <a href="{{ $submenu['url'] }}" class="menu-link">
                                    <div data-i18n="{{ $submenu['label'] }}">{{ $submenu['label'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</aside>
