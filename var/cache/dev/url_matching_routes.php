<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/comment' => [[['_route' => 'comment', '_controller' => 'App\\Controller\\CommentController::index'], null, null, null, false, false, null]],
        '/back' => [[['_route' => 'app_post', '_controller' => 'App\\Controller\\PostController::index'], null, null, null, false, false, null]],
        '/front' => [[['_route' => 'app_post_fr', '_controller' => 'App\\Controller\\PostController::indexF'], null, null, null, false, false, null]],
        '/postmobile' => [[['_route' => 'app_post_index_mobile', '_controller' => 'App\\Controller\\PostController::postmobile'], null, null, null, false, false, null]],
        '/mobileNew' => [[['_route' => 'app_post_newMobile', '_controller' => 'App\\Controller\\PostController::Mobilenew'], null, null, null, false, false, null]],
        '/admin-register' => [[['_route' => 'admin_register', '_controller' => 'App\\Controller\\RegistrationController::registerAdmin'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\RegistrationController::registerUser'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin-login' => [[['_route' => 'admin_login', '_controller' => 'App\\Controller\\SecurityController::adminLogin'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/comment(?'
                    .'|like(?:/([^/]++)(?:/([^/]++))?)?(*:50)'
                    .'|/(?'
                        .'|edit/([^/]++)(*:74)'
                        .'|delete/([^/]++)(*:96)'
                    .')'
                .')'
                .'|/show/([^/]++)(*:119)'
                .'|/edit/([^/]++)(*:141)'
                .'|/delete/([^/]++)(*:165)'
                .'|/like(?:/([^/]++)(?:/([^/]++))?)?(*:206)'
                .'|/postmobileshow/([^/]++)(*:238)'
                .'|/mobile(?'
                    .'|update/([^/]++)(*:271)'
                    .'|Delete/([^/]++)(*:294)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:334)'
                    .'|wdt/([^/]++)(*:354)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:400)'
                            .'|router(*:414)'
                            .'|exception(?'
                                .'|(*:434)'
                                .'|\\.css(*:447)'
                            .')'
                        .')'
                        .'|(*:457)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        50 => [[['_route' => 'like_comment', 'id' => '', 'post' => '', '_controller' => 'App\\Controller\\CommentController::likeComment'], ['id', 'post'], null, null, false, true, null]],
        74 => [[['_route' => 'comment_edit', '_controller' => 'App\\Controller\\CommentController::editComment'], ['id'], null, null, false, true, null]],
        96 => [[['_route' => 'comment_delete', '_controller' => 'App\\Controller\\CommentController::deleteComment'], ['id'], null, null, false, true, null]],
        119 => [[['_route' => 'show_post', '_controller' => 'App\\Controller\\PostController::show'], ['id'], null, null, false, true, null]],
        141 => [[['_route' => 'edit_post', '_controller' => 'App\\Controller\\PostController::edit'], ['id'], null, null, false, true, null]],
        165 => [[['_route' => 'delete_post', '_controller' => 'App\\Controller\\PostController::delete'], ['id'], null, null, false, true, null]],
        206 => [[['_route' => 'like_post', 'id' => '', 'like' => '', '_controller' => 'App\\Controller\\PostController::like'], ['id', 'like'], null, null, false, true, null]],
        238 => [[['_route' => 'app_post_show_mobile', '_controller' => 'App\\Controller\\PostController::postMobileshow'], ['id'], ['GET' => 0], null, false, true, null]],
        271 => [[['_route' => 'app_post_updateMobile', '_controller' => 'App\\Controller\\PostController::Mobileupdate'], ['id'], null, null, false, true, null]],
        294 => [[['_route' => 'app_post_DeleteMobile', '_controller' => 'App\\Controller\\PostController::MobileDelete'], ['id'], null, null, false, true, null]],
        334 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        354 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        400 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        414 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        434 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        447 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        457 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
