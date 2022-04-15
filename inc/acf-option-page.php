<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Основные настройки',
        'menu_title'	=> 'Настройки темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'position'  =>  false,
        'icon_url'  =>  false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'header-setting',
        'parent_slug'	=> 'theme-general-settings',
        'redirect'		=> false,
        'position'  =>  false,
        'icon_url'  =>  false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'currency-setting',
        'parent_slug'	=> 'theme-general-settings',
        'redirect'		=> false,
        'position'  =>  false,
        'icon_url'  =>  false
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'weather-setting',
        'parent_slug'	=> 'theme-general-settings',
        'redirect'		=> false,
        'position'  =>  false,
        'icon_url'  =>  false
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Настройки баннеров',
        'parent_slug'	=> 'theme-general-settings',
        'redirect'		=> false,
        'position'  =>  false,
        'icon_url'  =>  false
    ));



}