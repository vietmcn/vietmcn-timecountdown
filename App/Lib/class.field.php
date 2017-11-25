<?php 
class Vietmcn_field
{
    public static function field_checkbox( $att = array() )
    {
        $checked = ( ! empty( $att['option']['checked'] ) == true ) ? 'checked' : '';
        if ( isset( $att['option']['field']['multi_input']['multi'] ) == true ) {
            $multi = '['.$att['option']['field']['multi_input']['check'].']';
        } else {
            $multi = '';
        }
        //
        $out  = '<div class="col-left">';
        $out .= '<label class="cntr tooltip" data-variation="tiny" data-position="left center" data-html="'.$att['option']['desc_popup'].'">';
        $out .= '<span class="lbl"><i class="ion-ios-information-outline"></i>'.$att['option']['field']['title'].':</span>';
        $out .= '<input name="vietmcn_add_option_item['.$att['option']['key'].']'.$multi.'" class="hidden-xs-up" id="cbx" type="checkbox" '.$checked.' value="true">';
        $out .= '<span class="cbx"></span>';
        $out .= '</label>';
        $out .= '</div>';
        return $out;
    }
    public static function field_shortcode( $att = array() )
    {
        $out  = '<div class="ui tooltip col-right" data-variation="tiny" data-position="left center" data-title="Shortcode" data-html="'.$att['option']['shortcode']['desc'].'">';
        $out .= '<label><i class="ion-gear-a"></i> Shortcode:</label>';
        $out .= '<span class="vietmcn-shortcode">'.$att['option']['shortcode']['content'].'</span>';
        $out .= '</div>';
        return $out;
    }
    public static function field_textbox( $att = array() )
    {
        if ( isset( $att['option']['field']['multi_input']['multi'] ) == true ) {
            $input = '['.$att['option']['field']['multi_input']['input'].']';
        } else {
            $input = '';
        }

        $out  = '<div class="vietmcn_option_textbox col-right">';
        $out .= '<label class="tooltip" data-variation="tiny" data-position="left center" data-html="'.$att['option']['field']['desc'].'"><i class="ion-gear-a"></i> Name:</label>';
        $out .= '<input id="hello" type="text" name="vietmcn_add_option_item['.$att['option']['key'].']'.$input.'" value="'.$att['option']['text_value'].'" />';
        $out .= '</div>';
        return $out;
    }
    public static function field_texbox_muil()
    {

    }
    private static function option_dropdown( $att = array() )
    {
        $out = '';
        if ( isset( $att['option']['field']['checkbox'] ) == true ) {

            $out .= self::field_checkbox( $att );

        }
        if ( isset( $att['option']['field']['shortcode'] ) == true ) {

            $out .= self::field_shortcode( $att );

        }
        if ( isset( $att['option']['field']['textbox'] ) == true ) {

            $out .= self::field_textbox( $att );

        }
        return $out;

    }
    public static function get_field( $att = array() )
    {
        $is_bg = ( !empty( $att['option']['color'] ) ) ? $att['option']['color'] : '';
        //
        $out  = '<div class="vietmcn-wrap">';
        $out .= '<div data-elemt="vietmcn-time" class="vietmcn-option-item">';
        $out .= '<div data-elemt="vietmcn-time-thumbnail" style="background:'.$is_bg.'" class="vietmcn-option-item-thumbnail"><i class="'.$att['option']['icon'].'"></i></div>';
        $out .= '<div data-elemt="vietmcn-time-title">';
        $out .= '<h2>'.$att['title'].' - '.$att['version'].' <a class="tooltip" data-variation="tiny" data-content="Hướng dẫn sử dụng" data-position="right center" target="_blank" href="//'.VIETMCN.'/vietmcn-plugins#time-countdown" title="Hướng dẫn sử dụng"><i class="ion-help-circled"></i></a></h2>';
        $out .= '<div data-elemt="vietmcn-time-desc">'.$att['desc'].'</div>';
        $out .= '</div>';
        $out .= '<div class="vietmcn-option-models-setting"><i class="ion-gear-a"></i></div>';
        $out .= '</div>';
        //
        $out .= '<div class="vietmcn-option-dropdown-item">';
        
        $out .= self::option_dropdown( $att );

        $out .= '</div>';
        $out .= '</div>';
        return $out;
    }
}
//New Object Ố là la
new Vietmcn_field();