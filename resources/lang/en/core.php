<?php

return [

    'site_name' => 'Montreal DBaaS',
    'site_name_short' => 'MDb',
    'dashboard' => 'Dashboard',
    'version' => 'Version',
    'login' => 'Login',
    'menu' => 'Menu',
    'about' => 'about',
    'download' => 'download',
    'contact' => 'contact',
    'actions' => 'Actions',
    'twitter' => 'Twitter',
    'google_plus' => 'Google+',
    'github' => 'Github',
    'copyright' => 'Copyright',
    'all_rights_reserved' => 'All rights reserved by MIT License.',
    'sign_in' => 'Sign In',
    'sign_out' => 'Sign out',
    'search' => 'Search...',
    'email' => 'Email',
    'password' => 'Password',
    'retype_password' => 'Retype password',
    'delete' => 'Delete',
    'cancel' => 'Cancel',
    'or' => 'OR',
    'edit' => 'Edit',
    'gender' => 'Gender',
    'male' => 'Male',
    'female' => 'Female',
    'panel' => [

        'tpl_copyrigth' => "DBaaS Application based on :adminlte_link and :grayscale_link templates",
        'tpl_settings' => 'Template Settings',
        'tpl' => [

            //
            '404' => [
                'title' => '404 Error Page',
                'msg' => ' Oops! Page not found.',
                'msg_html' => 'We could not find the page you were looking for.Meanwhile, you may <a href="/">return to dashboard</a> or try using the search form.',
            ],

            /**/
            '500' => [
                'title' => '500 Error Page',
                'msg' => ' Oops! Something went wrong.',
                'msg_html' => 'We will work on fixing that right away.Meanwhile, you may <a href="/">return to dashboard</a> or try using the search form.',
            ],

            /*index*/
            'index' => [

                'title' => 'Grayscale - Start Bootstrap Theme',
                'intro' => 'Grayscale',
                'intro_text_1' => 'A free, responsive, one page Bootstrap theme. ',
                'intro_text_2' => 'Created by Start Bootstrap.',
                'about_section' => 'About Grayscale',
                'about_section_text_1' => 'This theme features stock photos by Gratisography along with a custom Google Maps skin courtesy of Snazzy Maps.',
                'about_section_text_2' => 'This theme features stock photos by Gratisography along with a custom Google Maps skin courtesy of Snazzy Maps.',
                'about_section_text_3' => 'Grayscale includes full HTML, CSS, and custom JavaScript files along with LESS files for easy customization.',
                'download_section' => 'Download Grayscale',
                'download_section_text_1' => 'You can download Grayscale for free on the preview page at Start Bootstrap.',
                'download_section_button' => 'Visit Download Page',
                'contact_section' => 'Contact Start Bootstrap',
                'contact_section_text_1' => 'Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!',
                'contact_section_en_email' => 'test@gmail.com',
            ],

            /*main*/
            'main' => [

                'site_name_html' => "<b>Montreal</b>DBaaS",
                'site_name_short_html' => "<b>M</b>Db",
                'toggle_navigation' => "Toggle navigation",
                'member_since' => "Member since",

            ],

            'auth' => [

                'login' => [

                    'msg' => 'Sign in to start your session',
                    'remember_me' => 'Remember Me',
                    'forgot_pwd' => 'I forgot my password',
                    'registration' => 'Register a new membership',
                    'sign_in_fb' => 'Sign in using Facebook',
                    'sign_in_gplus' => 'Sign in using Google+',

                ],

                'registration' => [

                    'msg' => 'Register a new membership',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'button' => 'Register',
                    'sign_up_fb' => 'Sign up using Facebook',
                    'sign_in_gplus' => 'Sign up using Google+',
                    'already_member' => 'I already have a membership',
                    'terms' => 'I agree to the <a href="#">terms</a>',

                ],

                'reset' => [

                    'msg' => 'Reset Password',
                    'button' => 'Send Password Reset Link',

                ],
            ],

            /*user.home*/
            'home' => [
                'title' => 'Home',
                'cpu_bage' => 'CPU Traffic',
                'ram_bage' => 'RAM in use',
                'total_db_bage' => 'Total databases',
                'total_queries_bage' => 'Total queries',
                'monthly_attendance_report' => 'Monthly Attendance report',
                'monthly_attendance_report_bage' => 'Visitors',
                'visitors_locations' => 'Visitors Locations',
                'request_or_s' => 'request/s',
                'plaform_and_browser' => 'OS & Browser Usage',
                'customer_actions' => [
                    'all_button' => 'View All Actions',
                    'status' => [
                        'create' => 'Create',
                        'edit' => 'Edit',
                        'update' => 'Update',
                        'delete' => 'Delete',
                    ]
                ],
            ],

            /*??*/
            'settings' => [
                'title' => 'Settings',
            ],

            // db.*
            'databases' => [
                'title' => 'DataBases',
                'list_title' => 'List',
                'create_title' => 'Create',
                'main_list' => 'Main list',
                'name' => 'Name',
                'charset' => 'Charset',
                'collation' => 'Collation',
                'options' => 'Options',
                'actions' => 'Actions',
                'delete_modal' => [
                    'title' => 'Confirm Delete',
                    'msg' => 'You are about to delete one database, this procedure is irreversible.',
                    'question' => 'Do you want to proceed?',
                ]

            ],

            /*??*/
            'tables' => [
                'title' => 'Table',
            ],

        ]

    ]


];




