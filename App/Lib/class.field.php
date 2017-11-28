<?php 
class Vietmcn_field
{
    public static function field_single( $att = array() )
    {
        #if ( isset( ) )
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
    public static function multi_input( $att = array() )
    {
        $out = '';
        //type checked
        if ( isset( $att['field']['type_checked'] ) ) {
            $out .= '<div class="col-left">';
            $out .= '<label class="cntr tooltip" data-variation="tiny" data-position="left center" data-html="'.$att['field']['type_checked']['desc'].'">';
            $out .= '<span class="lbl"><i class="ion-ios-information-outline"></i>'.$att['field']['type_checked']['title'].':</span>';
            $out .= '<input name="vietmcn_add_option_item['.$att['option']['key'].']['.$att['field']['type_checked']['key_name'].']" class="hidden-xs-up" id="cbx" type="checkbox" value="true">';
            $out .= '<span class="cbx"></span>';
            $out .= '</label>';
            $out .= '</div>';
        }
        //type radio
        if ( isset( $att['field']['type_radio'] ) ) {
            $out .= '<div class="full">';
            $out .= '<span class="lbl tooltip"  data-variation="tiny" data-position="left center" data-html="'.$att['field']['type_radio']['desc'].'"><i class="ion-ios-information-outline"></i>'.$att['field']['type_radio']['title'].':</span>'; 
            foreach( $att['field']['type_radio']['value'] as $value ) {
                $out .= '<span class="">';
                $out .= '<input name="vietmcn_add_option_time_item['.$att['option']['key'].']['.$att['field']['type_radio']['key_name'].']" type="radio" value="'.$value.'" />';
                $out .= '<span class="vietmcn_'.$value.'"></span>';
                $out .= '</span>';
            }
            $out .= '</div>';
        }
        if ( isset( $att['field']['type_textarea'] ) ) {
            $out .= '<div class="full">';
            $out .= '<span class="tooltip" data-variation="tiny" data-position="left center" data-html="'.$att['field']['type_textarea']['desc'].'">'.$att['field']['type_textarea']['title'].'</span>';
            $out .= '<textarea name="'.esc_html( 'vietmcn_add_option_time_item['.$att['option']['key'].']['.$att['field']['type_textarea']['key_name'].']').'" form="vietmcn_time_form"></textarea>';
            $out .= '</div>';
        }

        return $out;
        
    }
    public static function text_shortcode( $att = array() )
    {
        $out  = '<div class="ui tooltip col-right" data-variation="tiny" data-position="left center" data-title="Shortcode" data-html="'.$att['option']['shortcode']['desc'].'">';
        $out .= '<label><i class="ion-gear-a"></i> Shortcode:</label>';
        $out .= '<span class="vietmcn-shortcode">'.$att['option']['shortcode']['content'].'</span>';
        $out .= '</div>';
        return $out;
    }
    private static function option_dropdown( $att = array() )
    {
        
            switch( $att['field']['display'] )
            {
                case 'multi_input':

                    return self::multi_input( $att );

                break;

            }

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