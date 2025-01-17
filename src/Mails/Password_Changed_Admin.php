<?php


namespace JUVO_MailEditor\Mails;

use CMB2;
use JUVO_MailEditor\Mail_Generator;
use WP_User;

class Password_Changed_Admin extends Mail_Generator {

	public function addCustomFields( CMB2 $cmb ): CMB2 {
		return $cmb;
	}

	protected function getTrigger(): string {
		return 'password_changed_admin';
	}

	public function getSubject( string $subject ): string {

		if ( ! empty( $subject ) ) {
			return $subject;
		}

		return sprintf( __( '%s Password Changed', 'default' ), '{{site.name}}' );
	}

	public function getMessage( string $message ): string {

		if ( ! empty( $message ) ) {
			return $message;
		}

		return sprintf( __( 'Password changed for user: %s', 'default' ), '{{user.name}}' ) . "\r\n";
	}

	public function getRecipients( array $recipients ): array {

		if ( ! empty( $recipients ) ) {
			return $recipients;
		}

		return [ '{{site.admin_email}}' ];
	}

	public function prepareSend( array $email, WP_User $user ): array {
		do_action( "juvo_mail_editor_send", $this->getTrigger(), [ "user" => $user ] );

		return $this->emptyMailArray( $email );
	}

	public function getAlwaysSent(): bool {
		return true;
	}

	protected function getName(): string {
		return 'Password Changed (Admin)';
	}
}
