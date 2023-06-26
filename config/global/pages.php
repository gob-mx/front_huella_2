<?php
return array(
    '' => array(
        'title'       => 'Dashboard',
        'description' => '',
        'view'        => 'index',
        'layout'      => array(
            'page-title' => array(
                'description' => true,
                'breadcrumb'  => false,
            ),
        ),
        'assets'      => array(
            'custom'  => array(
                'js' => array(
                    'js/widgets.bundle.js',
                ),
            ),
            'vendors' => array('fullcalendar', 'amcharts', 'amcharts-maps'),
        ),
    ),

    'login'           => array(
        'title'  => 'Login',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-in/general.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),
    'register'        => array(
        'title'  => 'Register',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-up/general.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),
    'forgot-password' => array(
        'title'  => 'Forgot Password',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/password-reset/password-reset.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),

    'log' => array(
        'audit'  => array(
            'title'  => 'Audit Log',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
        'system' => array(
            'title'  => 'System Log',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
    ),

    'error' => array(
        'error-404' => array(
            'title' => 'Error 404',
        ),
        'error-500' => array(
            'title' => 'Error 500',
        ),
    ),

    'administracion' => array(
        'usuarios'  => array(
            'title'  => 'Lista Usuarios',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        // 'plugins/global/plugins.bundle.css',
                        // 'plugins/global/plugins-custom.bundle.css',
                        // 'css/style.bundle.css',
                        // 'css/estilos_saf.css',
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        // 'plugins/global/plugins.bundle.js',
                        // 'js/scripts.bundle.js',
                        // 'js/custom/widgets.js',
                        // 'js/funciones_generales.js',

                        'js/widgets.bundle.js',
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/apps/chat/chat.js',
                        'js/administracion/usuarios.js',
                        // 'js/custom/utilities/modals/upgrade-plan.js',
                        // 'js/custom/utilities/modals/create-app.js',
                        // 'js/custom/utilities/modals/new-target.js',
                        // 'js/custom/utilities/modals/users-search.js',
                    ),
                ),
            ),
            '*' => array(
                'edit'  => array(
                    'title'  => 'Edita Usuario',
                    'path'   => 'administracion/usuarios/edit',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(),
                            'js'  => array(
                                'plugins/custom/datatables/datatables.bundle.js',
                                'js/administracion/usuarios.js',
                                'js/administracion/usuarios_roles.js',
                                // 'assets/js/custom/apps/user-management/roles/list/update-role.js'
                                // 'js/administracion/usuario_vista.js',
                                // 'assets/js/custom/apps/user-management/users/view/view.js',
                                // 'assets/js/custom/apps/user-management/users/view/update-details.js',
                                // 'assets/js/custom/apps/user-management/users/view/add-schedule.js',
                                // 'assets/js/custom/apps/user-management/users/view/add-task.js',
                                // 'assets/js/custom/apps/user-management/users/view/update-email.js',
                                // 'assets/js/custom/apps/user-management/users/view/update-password.js',
                                // 'assets/js/custom/apps/user-management/users/view/update-role.js',
                                // 'assets/js/custom/apps/user-management/users/view/add-auth-app.js',
                                // 'assets/js/custom/apps/user-management/users/view/add-one-time-password.js',
                                // 'assets/js/widgets.bundle.js',
                                // 'assets/js/custom/widgets.js',
                                // 'assets/js/custom/apps/chat/chat.js',
                                // 'assets/js/custom/utilities/modals/upgrade-plan.js',
                                // 'assets/js/custom/utilities/modals/create-app.js',
                                // 'assets/js/custom/utilities/modals/users-search.js',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'roles'  => array(
            'title'  => 'Lista Roles',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'js/widgets.bundle.js',
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/apps/chat/chat.js',
                        'js/administracion/roles/crea_rol.js',
                        'js/administracion/roles/edita_rol.js'
                    ),
                ),
            ),
        ),
        'permisos'  => array(
            'title'  => 'Lista Permisos',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'js/widgets.bundle.js',
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/custom/apps/chat/chat.js',
                        'js/administracion/permisos/crea_modulo.js',
                        'js/administracion/permisos/crea_permiso.js',
                        'js/administracion/permisos/edita_permiso.js',
                        'js/administracion/permisos/edita_modulo.js',
                    ),
                ),
            ),
        ),
    ),

    'expediente' => array(
        'title'  => 'Captura Expediente',
        'assets' => array(
            'custom' => array(
                'css' => array(),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                    'js/expediente/captura.js',
                ),
            ),
        ),
        // '*' => array(
        //     'edit'  => array(
        //         'title'  => 'Actualiza Carpeta e Implicados',
        //         'path'   => 'registro/implicados/edit',
        //         'assets' => array(
        //             'custom' => array(
        //                 'css' => array(),
        //                 'js'  => array(
        //                     'plugins/custom/datatables/datatables.bundle.js',
        //                     'js/registro/implicados_editar.js',
        //                     'js/registro/agrega_implicado.js',
        //                     'js/registro/funciones.js',
        //                 ),
        //             ),
        //         ),
        //     ),
        // ),
    ),
    
    'registro' => array(
        'implicados'  => array(
            'title'  => 'Registro Implicado',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        // 'plugins/custom/datatables/datatables.bundle.css',
                        // 'plugins/global/plugins.bundle.css',
                        // 'css/style.bundle.css',
                    ),
                    'js'  => array(
                        // 'plugins/global/plugins.bundle.js',
                        // 'js/scripts.bundle.js',
                        // 'plugins/custom/datatables/datatables.bundle.js',
                        // 'js/widgets.bundle.js',
                        // 'js/custom/widgets.js',
                        // 'js/custom/apps/chat/chat.js',
                       
                        'js/registro/implicados.js',
                    ),
                ),
            ),
            '*' => array(
                'edit'  => array(
                    'title'  => 'Actualiza Carpeta e Implicados',
                    'path'   => 'registro/implicados/edit',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(),
                            'js'  => array(
                                'plugins/custom/datatables/datatables.bundle.js',
                                'js/registro/implicados_editar.js',
                                'js/registro/agrega_implicado.js',
                                'js/registro/funciones.js',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'home_dpfp' => array(
        'title'  => 'Registro Implicado',
        'assets' => array(
            'custom' => array(
                'css' => array(
                    // 'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    // 'js/widgets.bundle.js',
                    'plugins/custom/datatables/datatables.bundle.js',
                    // 'js/custom/apps/chat/chat.js',
                    // 'js/registro/jquery-1.7.2.min.js',
                        // 'js/registro/SweetAlert2.js',
                    'js/registro/funciones.js',
                ),
            ),
        ),
    ),

    'users_list'  => array(
        'title'  => 'users_list',
        'assets' => array(
            'custom' => array(
                'css' => array(),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
        '*' => array(
            'finger-list'  => array(
                'title'  => 'Enrola Implicado',
                'path'   => 'users_list/finger-list',
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js'  => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                            'js/registro/funciones.js',
                        ),
                    ),
                ),
            ),
        ),
        'verify-users'  => array(
            'title'  => 'Comprobar Implicado',
            'assets' => array(
                'custom' => array(
                    'css' => array(),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/registro/jquery-1.7.2.min.js',
                        'js/registro/funciones.js',
                        'js/registro/reloj.js',
                    ),
                ),
            ),
        ),
    ),



    'account' => array(
        'overview' => array(
            'title'  => 'Account Overview',
            'view'   => 'account/overview/overview',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/widgets.js',
                    ),
                ),
            ),
        ),

        'settings' => array(
            'title'  => 'Account Settings',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/account/settings/profile-details.js',
                        'js/custom/account/settings/signin-methods.js',
                        'js/custom/modals/two-factor-authentication.js',
                    ),
                ),
            ),
        ),
    ),

    'users'         => array(
        'title' => 'User List',

        '*' => array(
            'title' => 'Show User',

            'edit' => array(
                'title' => 'Edit User',
            ),
        ),
    ),

    // Documentation pages
    'documentation' => array(
        '*' => array(
            'assets' => array(
                'vendors' => array('prismjs'),
                'custom'  => array(
                    'js' => array(
                        'js/custom/documentation/documentation.js',
                    ),
                ),
            ),

            'layout' => array(
                'base'    => 'docs', // Set base layout: default|docs

                // Content
                'content' => array(
                    'width'  => 'fixed', // Set fixed|fluid to change width type
                    'layout' => 'documentation'  // Set content type
                ),
            ),
        ),

        'getting-started' => array(
            'overview' => array(
                'title'       => 'Overview',
                'description' => '',
                'view'        => 'documentation/getting-started/overview',
            ),

            'build' => array(
                'title'       => 'Gulp',
                'description' => '',
                'view'        => 'documentation/getting-started/build/build',
            ),

            'multi-demo' => array(
                'overview' => array(
                    'title'       => 'Overview',
                    'description' => '',
                    'view'        => 'documentation/getting-started/multi-demo/overview',
                ),
                'build'    => array(
                    'title'       => 'Multi-demo Build',
                    'description' => '',
                    'view'        => 'documentation/getting-started/multi-demo/build',
                ),
            ),

            'file-structure' => array(
                'title'       => 'File Structure',
                'description' => '',
                'view'        => 'documentation/getting-started/file-structure',
            ),

            'customization' => array(
                'sass'       => array(
                    'title'       => 'SASS',
                    'description' => '',
                    'view'        => 'documentation/getting-started/customization/sass',
                ),
                'javascript' => array(
                    'title'       => 'Javascript',
                    'description' => '',
                    'view'        => 'documentation/getting-started/customization/javascript',
                ),
            ),

            'dark-mode' => array(
                'title' => 'Dark Mode Version',
                'view'  => 'documentation/getting-started/dark-mode',
            ),

            'rtl' => array(
                'title' => 'RTL Version',
                'view'  => 'documentation/getting-started/rtl',
            ),

            'troubleshoot' => array(
                'title' => 'Troubleshoot',
                'view'  => 'documentation/getting-started/troubleshoot',
            ),

            'changelog' => array(
                'title'       => 'Changelog',
                'description' => 'version and update info',
                'view'        => 'documentation/getting-started/changelog/changelog',
            ),

            'updates' => array(
                'title'       => 'Updates',
                'description' => 'components preview and usage',
                'view'        => 'documentation/getting-started/updates',
            ),

            'references' => array(
                'title'       => 'References',
                'description' => '',
                'view'        => 'documentation/getting-started/references',
            ),
        ),

        'general' => array(
            'datatables'   => array(
                'overview' => array(
                    'title'       => 'Overview',
                    'description' => 'plugin overview',
                    'view'        => 'documentation/general/datatables/overview/overview',
                ),
            ),
            'remove-demos' => array(
                'title'       => 'Remove Demos',
                'description' => 'How to remove unused demos',
                'view'        => 'documentation/general/remove-demos/index',
            ),
        ),

        'configuration' => array(
            'general'     => array(
                'title'       => 'General Configuration',
                'description' => '',
                'view'        => 'documentation/configuration/general',
            ),
            'menu'        => array(
                'title'       => 'Menu Configuration',
                'description' => '',
                'view'        => 'documentation/configuration/menu',
            ),
            'page'        => array(
                'title'       => 'Page Configuration',
                'description' => '',
                'view'        => 'documentation/configuration/page',
            ),
            'npm-plugins' => array(
                'title'       => 'Add NPM Plugin',
                'description' => 'Add new NPM plugins and integrate within webpack mix',
                'view'        => 'documentation/configuration/npm-plugins',
            ),
        ),
    ),
);
