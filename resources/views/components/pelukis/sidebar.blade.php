<x-sidebar
    :menuItems="[
        [
            'label' => 'Dashboard',
            'url' => route('pelukis.home'),
            'icon' => 'bx bx-home-circle',
            'route_is' => 'pelukis.home'
        ],
        [
            'label' => 'Produk Dijual',
            'url' => '#',
            'icon' => 'bx bx-palette',
            'route_is' => 'pelukis.lukisan.*',
            'submenu' => [
                [
                    'label' => 'Tambahan Produk',
                    'url' => route('pelukis.lukisan.create'),
                    'route_is' => 'pelukis.lukisan.create'
                ],
                [
                    'label' => 'Daftar Produk',
                    'url' => route('pelukis.lukisan.index'),
                    'route_is' => 'pelukis.lukisan.index'
                ],
            ]
        ],
        [
            'label' => 'Lukisan AR',
            'url' => '#',
            'icon' => 'bx bx-cuboid',
            'route_is' => 'pelukis.lukisanAr.*',
            'submenu' => [
                [
                    'label' => 'Tambahan Lukisan',
                    'url' => route('pelukis.lukisanAr.create'),
                    'route_is' => 'pelukis.lukisanAr.create'
                ],
                [
                    'label' => 'Daftar Lukisan',
                    'url' => route('pelukis.lukisanAr.index'),
                    'route_is' => 'pelukis.lukisanAr.index'
                ],
            ]
        ],
        [
            'label' => 'Profil',
            'url' => route('pelukis.profile.index'),
            'icon' => 'bx bx-user',
            'route_is' => 'pelukis.profile.index'
        ],
    ]"
    brandName="MyBrand"
    brandUrl="{{ route('pelukis.home') }}"
/>
