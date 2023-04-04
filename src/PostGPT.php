<?php
/**
 * Main Plugin.
 *
 * @package PostGPT
 */

namespace PostGPT;

/**
 * PostGPT Class.
 */
class PostGPT {
	/**
	 * Plugin instance.
	 *
	 * @var \PostGPT
	 */
	private static $instance;

	/**
	 * Return plugin instance.
	 *
	 * @return \PostGPT
	 */
	public static function get_instance(): PostGPT {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Run hooks.
	 *
	 * @return void
	 */
	public function run(): void {
		add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
	}

	/**
	 * Add Custom Meta Box
	 *
	 * @return void
	 */
	public function add_custom_meta_box() {
		add_meta_box(
			'custom_discussion_settings',
			'OpenAI',
			[ $this, 'custom_discussion_settings_callback' ],
			'post',
			'side',
			'low'
		);
	}

	public function custom_discussion_settings_callback() {
		$value = get_post_meta( get_the_ID(), 'custom_discussion_setting', true );
		$checked = checked( $value, 'on', false );

		wp_nonce_field( 'custom_discussion_setting_nonce', 'custom_discussion_setting_nonce' );
		?>
		<p>
			<label for="custom_discussion_setting">Custom Discussion Setting</label>
			<br>
			<input type="text" name="custom_discussion_setting" id="custom_discussion_setting" value="<?php echo esc_attr( $value ); ?>">
		</p>
		<p>
			<label for="custom_discussion_checkbox">
				<input type="checkbox" name="custom_discussion_checkbox" id="custom_discussion_checkbox" value="on" <?php echo $checked; ?>>
				Custom Discussion Checkbox
			</label>
		</p>
		<?php
	}
}
