<?php

return array(
    // Documentation menu
    'documentation' => array(
        // Getting Started
        array(
            'heading' => 'Getting Started',
        ),

        // Overview
        array(
            'title' => 'Overview',
            'path'  => 'documentation/getting-started/overview',
            // 'role' => ['admin'],
            // 'permission' => [],
        ),

        // Build
        array(
            'title' => 'Build',
            'path'  => 'documentation/getting-started/build',
        ),

        array(
            'title'      => 'Multi-demo',
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'classes'    => array('item' => 'menu-accordion'),
            'sub'        => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title'  => 'Overview',
                        'path'   => 'documentation/getting-started/multi-demo/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Build',
                        'path'   => 'documentation/getting-started/multi-demo/build',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // File Structure
        array(
            'title' => 'File Structure',
            'path'  => 'documentation/getting-started/file-structure',
        ),

        // Customization
        array(
            'title'      => 'Customization',
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'classes'    => array('item' => 'menu-accordion'),
            'sub'        => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title'  => 'SASS',
                        'path'   => 'documentation/getting-started/customization/sass',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Javascript',
                        'path'   => 'documentation/getting-started/customization/javascript',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Dark skin
        array(
            'title' => 'Dark Mode Version',
            'path'  => 'documentation/getting-started/dark-mode',
        ),

        // RTL
        array(
            'title' => 'RTL Version',
            'path'  => 'documentation/getting-started/rtl',
        ),

        // Troubleshoot
        array(
            'title' => 'Troubleshoot',
            'path'  => 'documentation/getting-started/troubleshoot',
        ),

        // Changelog
        array(
            'title'            => 'Changelog <span class="badge badge-changelog badge-light-danger bg-hover-danger text-hover-white fw-bold fs-9 px-2 ms-2">v'.theme()->getVersion().'</span>',
            'breadcrumb-title' => 'Changelog',
            'path'             => 'documentation/getting-started/changelog',
        ),

        // References
        array(
            'title' => 'References',
            'path'  => 'documentation/getting-started/references',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // Configuration
        array(
            'heading' => 'Configuration',
        ),

        // General
        array(
            'title' => 'General',
            'path'  => 'documentation/configuration/general',
        ),

        // Menu
        array(
            'title' => 'Menu',
            'path'  => 'documentation/configuration/menu',
        ),

        // Page
        array(
            'title' => 'Page',
            'path'  => 'documentation/configuration/page',
        ),

        // Page
        array(
            'title' => 'Add NPM Plugin',
            'path'  => 'documentation/configuration/npm-plugins',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // General
        array(
            'heading' => 'General',
        ),

        // DataTables
        array(
            'title'      => 'DataTables',
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'sub'        => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title'  => 'Overview',
                        'path'   => 'documentation/general/datatables/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Remove demos
        array(
            'title' => 'Remove Demos',
            'path'  => 'documentation/general/remove-demos',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // HTML Theme
        array(
            'heading' => 'HTML Theme',
        ),

        array(
            'title' => 'Components',
            'path'  => '//preview.keenthemes.com/metronic8/demo1/documentation/base/utilities.html',
        ),

        array(
            'title' => 'Documentation',
            'path'  => '//preview.keenthemes.com/metronic8/demo1/documentation/getting-started.html',
        ),
    ),

    // Main menu
    'main'          => array(
        //// Dashboard
        array(
            'title' => 'Dashboard',
            'path'  => 'dashboard',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Menú</span>',
        ),

        // Administracion
        array(
            'title'     => 'Administración',
            'icon'      => array(
                'svg'   => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
                'font'  => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'  => 'Usuarios',
                        'path'   => 'administracion/usuarios',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Roles',
                        'path'   => 'administracion/roles',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Permisos',
                        'path'   => 'administracion/permisos',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Configuración',
                        'path'   => 'lalo_prueba',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Account
        array(
            'title'      => 'Información Personal.',
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title'  => 'Mi perfil',
                        'path'   => 'account/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),                   
                ),
            ),
        ),

        // System
        array(
            'title'      => 'Registros',
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub'        => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(                    
                    array(
                        'title'  => 'Log de Auditoria',
                        'path'   => 'log/audit',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Log de Sistema ',
                        'path'   => 'log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),                   
                ),
            ),
        ),
        
    ),

    // Horizontal menu
    'horizontal'    => array(
        // Dashboard
        array(
            'title'   => 'Dashboard',
            'path'    => 'dashboard',
            'classes' => array('item' => 'me-lg-1'),
        ),

        array(
            'title'      => 'Administración',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'       => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title' => 'Usuarios',
                        'path'  => 'administracion/usuarios',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
                    ),
                    array(
                        'title' => 'Roles',
                        'path'  => 'administracion/roles',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
                    ),
                    array(
                        'title' => 'Permisos',
                        'path'  => 'administracion/permisos',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
                    ),
                    array(
                        'title' => 'Configuración',
                        'path'  => 'lalo_prueba',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
                    ),
                    // Documentation
                    array(
                        'title' => 'Documentation',
                        'path'  => 'documentation/getting-started/overview',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
                    ),
                ),
            ),
        ),

        array(
            'title'      => 'Información Personal',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'       => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title' => 'Mi perfil',
                        'path'  => 'account/overview',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
                    ),
                ),
            ),
        ),

        array(
            'title'      => 'Registros',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'       => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title' => 'Log de Auditoria',
                        'path'  => 'log/audit',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
                    ),
                    array(
                        'title' => 'Log de Sistema ',
                        'path'  => 'log/system',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
                    ),
                ),
            ),
        ),

        // Resources
        /*
        array(
            'title'      => 'Resources',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    // Documentation
                    array(
                        'title' => 'Documentation',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/abstract/abs027.svg", "svg-icon-2"),
                        'path'  => 'documentation/getting-started/overview',
                    ),

                    // Changelog
                    array(
                        'title' => 'Changelog v'.theme()->getVersion(),
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                        'path'  => 'documentation/getting-started/changelog',
                    ),
                ),
            ),
        ),*/     
    ),
);
