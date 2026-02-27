<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Menu Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the menu structure for the admin dashboard sidebar.
    | Each menu item can have sub-items, icons, and permissions.
    |
    */

    'menu_items' => [
        [
            'title' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'active' => 'admin.dashboard',
        ],
        [
            'title' => 'Sliders',
            'route' => 'admin.sliders.index',
            'icon' => 'fas fa-images',
            'active' => 'admin.sliders.*',
            'badge' => null,
        ],
        [
            'title' => 'Properties',
            'icon' => 'fas fa-building',
            'submenu' => [
                [
                    'title' => 'All Properties',
                    'route' => 'admin.properties.index',
                    'active' => 'admin.properties.*',
                ],
                [
                    'title' => 'Property Features',
                    'route' => 'admin.property-features.index',
                    'active' => 'admin.property-features.*',
                ],
                [
                    'title' => 'Property Types',
                    'route' => 'admin.property-types.index',
                    'active' => 'admin.property-types.*',
                ],
                [
                    'title' => 'Business Types',
                    'route' => 'admin.business-types.index',
                    'active' => 'admin.business-types.*',
                ],
            ],
        ],
        [
            'title' => 'Locations',
            'icon' => 'fas fa-map-marker-alt',
            'submenu' => [
                [
                    'title' => 'States',
                    'route' => 'admin.states.index',
                    'active' => 'admin.states.*',
                ],
                [
                    'title' => 'Municipalities',
                    'route' => 'admin.municipalities.index',
                    'active' => 'admin.municipalities.*',
                ],
            ],
        ],
        [
            'title' => 'Enquiries',
            'route' => 'admin.enquiries.index',
            'icon' => 'fas fa-envelope',
            'active' => 'admin.enquiries.*',
            'badge' => 'new_enquiries_count', // Can be dynamically populated
        ],
        [
            'title' => 'Contact Forms',
            'route' => 'admin.contact-forms.index',
            'icon' => 'fas fa-comment-dots',
            'active' => 'admin.contact-forms.*',
        ],
        [
            'title' => 'Media',
            'icon' => 'fas fa-photo-video',
            'submenu' => [
                [
                    'title' => 'All Images',
                    'route' => 'admin.images.index',
                    'active' => 'admin.images.*',
                ],
                [
                    'title' => 'Upload New',
                    'route' => 'admin.images.create',
                    'active' => 'admin.images.create',
                ],
            ],
        ],
        [
            'title' => 'Settings',
            'icon' => 'fas fa-cog',
            'submenu' => [
                [
                    'title' => 'General Settings',
                    'route' => 'admin.settings.general',
                    'active' => 'admin.settings.general',
                ],
                [
                    'title' => 'SEO Settings',
                    'route' => 'admin.settings.seo',
                    'active' => 'admin.settings.seo',
                ],
            ],
        ],
        [
            'title' => 'Users',
            'route' => 'admin.users.index',
            'icon' => 'fas fa-users',
            'active' => 'admin.users.*',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Display Options
    |--------------------------------------------------------------------------
    */
    'options' => [
        'collapsed_by_default' => false,
        'show_badge' => true,
        'show_icons' => true,
    ],
];
