<?php
/**
 * Customizer Radio Image Control.
 * 
 * @package TrustNews
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'TrustNews_Control_Radio_Image' ) ){
    
    /**
	 * Radio Image control (modified radio).
    */
	class TrustNews_Control_Radio_Image extends WP_Customize_Control{

        /**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'tn-radio-image';
        
        public $tooltip = '';
        
        public function to_json() {
			parent::to_json();
			
            if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			} else {
				$this->json['default'] = $this->setting->default;
			}
			
            $this->json['value']   = $this->value();
			$this->json['link']    = $this->get_link();
            $this->json['id']      = $this->id;
            $this->json['tooltip'] = $this->tooltip;
            $this->json['choices'] = $this->choices;
						
            $this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}
		}
        
        public function enqueue() {
            wp_enqueue_style( 'trustnews-radio-image-style', get_template_directory_uri() . '/inc/custom/radio-image/radioimage.css', null );
            wp_enqueue_script( 'trustnews-radio-image-script', get_template_directory_uri() . '/inc/custom/radio-image/radioimage.js', array( 'jquery' ), false, true );
        }

        protected function content_template() {
            ?>

			<# if ( data.tooltip ) { #>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
			<# } #>
            <label class="customizer-text">
                <# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
                <# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><# } #>
            </label>
            <div id="input_{{ data.id }}" class="image">
                <# for ( key in data.choices ) { #>
                    <# dataAlt = ( _.isObject( data.choices[ key ] ) && ! _.isUndefined( data.choices[ key ].alt ) ) ? data.choices[ key ].alt : '' #>
                    <input {{{ data.inputAttrs }}} class="image-select" type="radio" value="{{ key }}" name="_customize-radio-{{ data.id }}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( data.value === key ) { #> checked="checked"<# } #> data-alt="{{ dataAlt }}">
                        <label for="{{ data.id }}{{ key }}" {{{ data.labelStyle }}} class="{{{ data.id + key }}}">
                            <# if ( _.isObject( data.choices[ key ] ) ) { #>
                                <img src="{{ data.choices[ key ].src }}" alt="{{ data.choices[ key ].alt }}">
                                <span class="image-label"><span class="inner">{{ data.choices[ key ].alt }}</span></span>
                            <# } else { #>
                                <img src="{{ data.choices[ key ] }}">
                            <# } #>
                            <span class="image-clickable"></span>
                        </label>
                    </input>
                <# } #>
            </div>
			<?php
		}

    }

}