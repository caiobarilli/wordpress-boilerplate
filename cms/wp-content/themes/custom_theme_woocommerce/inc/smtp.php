<?php

/**
 * SMTP configuration Hooked to phpmailer_init
 * @param PHPMailer $phpmailer
 * @return void
 */
function send_smtp_email($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'mailhog';
    $phpmailer->Port       = 1025;
    $phpmailer->SMTPAuth   = false;
}
add_action('phpmailer_init', 'send_smtp_email');
