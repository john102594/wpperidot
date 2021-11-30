<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: checkbox
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SP_WQV_Framework_Field_checkbox' ) ) {
	class SP_WQV_Framework_Field_checkbox extends SP_WQV_Framework_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}


		/**
		 * Render
		 *
		 * @return void
		 */
		public function render() {

			$args = wp_parse_args(
				$this->field,
				array(
					'inline'     => false,
					'query_args' => array(),
				)
			);

			$inline_class = ( $args['inline'] ) ? ' class="sp_wqv--inline-list"' : '';

			echo wp_kses_post( $this->field_before() );

			if ( isset( $this->field['options'] ) ) {

				$value   = ( is_array( $this->value ) ) ? $this->value : array_filter( (array) $this->value );
				$options = $this->field['options'];
				$options = ( is_array( $options ) ) ? $options : array_filter( $this->field_data( $options, false, $args['query_args'] ) );

				if ( is_array( $options ) && ! empty( $options ) ) {

					echo '<ul' . $inline_class . '>';

					foreach ( $options as $option_key => $option_value ) {

						if ( is_array( $option_value ) && ! empty( $option_value ) ) {

							echo '<li>';
							echo '<ul>';
							echo '<li><strong>' . esc_attr( $option_key ) . '</strong></li>';
							foreach ( $option_value as $sub_key => $sub_value ) {
								$checked = ( in_array( $sub_key, $value ) ) ? ' checked' : '';
								echo '<li>';
								echo '<label>';
								echo '<input type="checkbox" name="' . esc_attr( $this->field_name( '[]' ) ) . '" value="' . esc_attr( $sub_key ) . '"' . $this->field_attributes() . esc_attr( $checked ) . '/>';
								echo '<span class="sp_wqv--text">' . esc_attr( $sub_value ) . '</span>';
								echo '</label>';
								echo '</li>';
							}
							echo '</ul>';
							echo '</li>';

						} else {

							$checked = ( in_array( $option_key, $value ) ) ? ' checked' : '';

							echo '<li>';
							echo '<label>';
							echo '<input type="checkbox" name="' . esc_attr( $this->field_name( '[]' ) ) . '" value="' . esc_attr( $option_key ) . '"' . $this->field_attributes() . esc_attr( $checked ) . '/>';
							echo '<span class="sp_wqv--text">' . esc_attr( $option_value ) . '</span>';
							echo '</label>';
							echo '</li>';

						}
					}

					echo '</ul>';

				} else {

					echo ( ! empty( $this->field['empty_message'] ) ) ? esc_attr( $this->field['empty_message'] ) : esc_html__( 'No data available.', 'woo-quick-view' );

				}
			} else {

					echo '<label class="sp_wqv-checkbox">';
					echo '<input type="hidden" name="' . esc_attr( $this->field_name() ) . '" value="' . $this->value . '" class="sp_wqv--input"' . $this->field_attributes() . '/>';
					echo '<input type="checkbox" name="_pseudo" class="sp_wqv--checkbox"' . esc_attr( checked( $this->value, 1, false ) ) . '/>';
					echo ( ! empty( $this->field['label'] ) ) ? '<span class="sp_wqv--text">' . esc_attr( $this->field['label'] ) . '</span>' : '';
					echo '</label>';

			}

			echo wp_kses_post( $this->field_after() );

		}

	}
}
