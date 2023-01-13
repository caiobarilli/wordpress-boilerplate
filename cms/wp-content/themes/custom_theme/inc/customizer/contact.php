<?php

    /**
    *
    *  Contato
    *
    */
    $wp_customize->add_panel('panel_contact_page', array(
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Configurações da página Contato', 'custom_theme'),
        'description'    => '',
    ));

    /**
     *
    *  Contact Page:
    *  Cabeçalho
    *
    */
    $wp_customize->add_section(
        'sec_header_contact',
        array(
            'title'			=> __('Cabeçalho', 'custom_theme'),
            'description'	=> ' ',
            'panel' 		=> 'panel_contact_page',
        )
    );

    // Field 1 - Text Box
    $wp_customize->add_setting(
        'set_title_contact',
        array(
            'type'      => 'theme_mod',
            'default'   => '',
        )
    );
    $wp_customize->add_control(
        'set_title_contact',
        array(
            'label'				=> __('Titulo do cabeçalho', 'custom_theme'),
            'description'		=> __('Digite o titulo do cabeçalho da pagina', 'custom_theme'),
            'section'			=> 'sec_header_contact',
            'type'				=> 'text'
        )
    );


    /**
     *
    *  Contact Page:
    *  Form
    *
    */
    $wp_customize->add_section(
        'sec_form_contact',
        array(
            'title'			=> __('Formulario', 'custom_theme'),
            'description'	=> ' ',
            'panel' 		=> 'panel_contact_page',
        )
    );

    // Field 1 - Text Box
    $wp_customize->add_setting(
        'set_title_form_contact',
        array(
            'type'      => 'theme_mod',
            'default'   => '',
        )
    );
    $wp_customize->add_control(
        'set_title_form_contact',
        array(
            'label'				=> __('Titulo do formulario', 'custom_theme'),
            'description'		=> __('Digite o titulo do cabeçalho da pagina', 'custom_theme'),
            'section'			=> 'sec_form_contact',
            'type'				=> 'text'
        )
    );

    // Field 1 - Text Box
    $wp_customize->add_setting(
        'set_shortcode_form_contact',
        array(
            'type'      => 'theme_mod',
            'default'   => '',
        )
    );
    $wp_customize->add_control(
        'set_shortcode_form_contact',
        array(
            'label'				=> __('Shortcode do formulario', 'custom_theme'),
            'description'		=> __('Digite o shortcode do contactform7', 'custom_theme'),
            'section'			=> 'sec_form_contact',
            'type'				=> 'text'
        )
    );


    /**
     *
    *  Contact Page:
    *  Social
    *
    */
    $wp_customize->add_section(
        'sec_form_social',
        array(
            'title'			=> __('Redes Sociais', 'custom_theme'),
            'description'	=> ' ',
            'panel' 		=> 'panel_contact_page',
        )
    );

    // Field Repeater - Item
    $wp_customize->add_setting( 'customizer_repeater_social', array(
        'sanitize_callback' => 'customizer_repeater_sanitize'
    ));
    $wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'customizer_repeater_social', array(
        'label'     => esc_html__('Item','customizer-repeater'),
        'section'   => 'sec_form_social',
        'priority'  => 1,
        'customizer_repeater_image_control'     => true,
        'customizer_repeater_icon_control'      => true,
        'customizer_repeater_title_control'     => true,
        'customizer_repeater_link_control'      => true,
        'customizer_repeater_text_control'      => false,
        'customizer_repeater_subtitle_control'  => false,
        'customizer_repeater_shortcode_control' => false,
        'customizer_repeater_repeater_control'  => false
    )));