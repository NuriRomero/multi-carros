<?php
/**
 * Form processing script for handling form submissions.
 *
 * @package YourThemeName
 */

// Error message.
$error_msg = '';
5
// Verify if the form has been submitted and use nonce verification.
if ( isset( $_POST['submit'] ) && isset( $_POST['_wpnonce'] ) ) {
	$nonce = sanitize_key( wp_unslash( $_POST['_wpnonce'] ) ); // Unslash and sanitize the value.

	if ( wp_verify_nonce( $nonce, 'your_form_action' ) ) {
		// Verify if a name has been provided.
		if ( empty( $_POST['name'] ) ) {
			$error_msg .= 'Name is required. ';
		} else {
			$name = sanitize_text_field( wp_unslash( $_POST['name'] ) ); // Unslash and sanitize the value.
		}

		// Verify if a valid email has been provided.
		if ( empty( $_POST['email'] ) || ! filter_var( wp_unslash( $_POST['email'] ), FILTER_VALIDATE_EMAIL ) ) {
			$error_msg .= 'Valid email is required. ';
		} else {
			$email = sanitize_email( wp_unslash( $_POST['email'] ) ); // Unslash and sanitize the value.
		}

		// Verify if a message has been provided.
		if ( empty( $_POST['message'] ) ) {
			$error_msg .= 'Message is required. ';
		} else {
			$message = sanitize_text_field( wp_unslash( $_POST['message'] ) ); // Unslash and sanitize the value.
		}

		// If there are no errors, proceed to send the email.
		if ( empty( $error_msg ) ) {
			$email_to     = 'yourmail@domain.com';
			$body_subject = 'New Message Received';

			// Prepare the email body.
			$body  = 'Name: ' . esc_html( $name ) . "\n";
			$body .= 'Email: ' . esc_html( $email ) . "\n";
			$body .= 'Message: ' . esc_html( $message ) . "\n";

			// Send the email using wp_mail.
			$headers = array(
				'From: ' . esc_html( $email ),
			);

			$success = wp_mail( $email_to, $body_subject, $body, $headers );

			// Redirect to a success page or display an error message.
			if ( $success ) {
				echo 'success';
			} else {
				echo 'Something went wrong :(';
			}
		} else {
			echo esc_html( $error_msg ); // Escaping the error message.
		}
	} else {
		echo 'Nonce verification failed.';
	}
}
