<x-sidebar
    :menuItems="[
        [
            'label' => 'Dashboard',
            'url' => route('home'),
            'icon' => 'bx bx-home-circle',
            'route_is' => 'home'
        ],
        [
            'label' => 'Pengaturan Pelukis',
            'url' => '#',
            'icon' => 'bx bx-layout',
            'route_is' => 'pelukis.*',
            'submenu' => [
                [
                    'label' => 'Tambahan Pelukis',
                    'url' => route('pelukis.create'),
                    'route_is' => 'pelukis.create'
                ],
                [
                    'label' => 'Daftar Pelukis',
                    'url' => route('pelukis.index'),
                    'route_is' => 'pelukis.index'
                ],
            ]
        ],
    ]"
    brandName="MyBrand"
    brandUrl="{{ route('home') }}"
/>
