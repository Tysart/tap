<?php
// ===================================================================
// Theme Support
// ===================================================================
function tysart_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
}
add_action('after_setup_theme', 'tysart_setup');

// ===================================================================
// Enqueue Styles & Scripts
// ===================================================================
function tysart_enqueue_assets() {
    // Основной стиль темы
    wp_enqueue_style(
        'tysart-style',
        get_stylesheet_uri(),
        [],
        '1.0'
    );

    // Скрипты темы
    wp_enqueue_script(
        'tysart-script',
        get_template_directory_uri() . '/js/scripts.js',
        ['jquery'],
        '1.0',
        true
    );

    // Локализация данных для AJAX
    wp_localize_script(
        'tysart-script',
        'tysart_ajax',
        [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('tysart_contact_form'),
        ]
    );
}
add_action('wp_enqueue_scripts', 'tysart_enqueue_assets');

// ===================================================================
// Подключаем отдельный AJAX-скрипт
// ===================================================================
function enqueue_custom_ajax_script() {
    wp_enqueue_script(
        'custom-ajax',
        get_template_directory_uri() . '/js/custom-ajax.js',
        ['jquery'],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_ajax_script');

// ===================================================================
// Обработка формы через AJAX
// ===================================================================
function handle_tysart_contact_form() {
    check_ajax_referer('tysart_contact_form', 'nonce');

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = get_option('admin_email');
    $subject = "Новое сообщение с сайта от $name";
    $body = "Имя: $name\nEmail: $email\nТелефон: $phone\n\nСообщение:\n$message";

    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    $sent = wp_mail($to, $subject, $body, $headers);

    wp_send_json_success(['sent' => $sent]);
}
add_action('wp_ajax_send_contact_form', 'handle_tysart_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'handle_tysart_contact_form');