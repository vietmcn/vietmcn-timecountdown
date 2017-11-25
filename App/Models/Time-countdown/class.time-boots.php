<?php 
class Vietmcn_time_boots extends Vietmcn_boots
{
    public function __construct( $option = null )
    {   
        self::$options = $option;

        add_action( 'wp_enqueue_scripts', array( $this, 'time_script' ) );
        add_action( 'wp_footer', array( $this, 'time_script_print' ) );
        add_action ( 'vietmcn_option_hook', array( $this, 'get_option' ) );
        
        $this->import( array(
            'Class' => 'Vietmcn_time_shortcode',
            'require' => 'Time-countdown/class.time-shortcode',
        ) );
        $this->import( array(
            'Class' => 'Vietmcn_time_wc_models',
            'require' => 'Time-countdown/class.time-wc',
            'option' => self::$options,
        ) );
       
    }
    public function time_script()
    {
        wp_enqueue_script( 'vietmcn-models-time', VIETMCN_URL . 'App/Public/Js/lib/time.min.js', array('jquery'), VIETMCN_VERSION, true );
    }
    public function time_script_print()
    {
        $time_date = ( isset( self::$options['option']['format'] ) == 'date_time' ) ? '<span class="vietmcn-m">%D ngày</span><span class="vietmcn-time">%H</span><span>%M</span><span>%S</span>' : '<span class="vietmcn-time">%H giờ</span><span>%M phút</span><span>%S giây</span>';
        $time_style = ( isset( self::$options['option']))
        //style
        ?><script type='text/javascript'>jQuery(document).ready(function(a){a('[data-countdown]').each(function(){var b=a(this),c=a(this).data('countdown');b.countdown(c,function(d){b.html(d.strftime('<?php echo $time_date;?>'))})})});</script><?php
    }
    public function get_option()
    {
        $checked = ( isset( self::$options['time_countdown'] ) ) ? self::$options['time_countdown'] : '';

        $out = Vietmcn_field::get_field( array(
            'title' => 'Time CountDown',
            'desc' => 'Models gọi thời gian kết thúc giảm ra ngoài trang chú hoặc trang xem chi tiết sản phẩm.',
            'version' => '0.1',
            'option' => array(
                'key' => 'time_countdown',
                'icon' => 'ion-ios-timer-outline',
                'checked' => $checked,
                'desc_popup' => 'Tick vào để chọn không hiển thị ở trang danh mục sản phẩm.',
                'format' => '',
                'field' => array(
                    'title' => 'Tùy chọn hiển thị',
                    'checkbox' => true,
                    'mutil_input' => array(
                        'multi' => true,
                        'check' => 'display',
                    ),
                    'multi_checked' => array(
                        'check' => true,
                        'title' => 'Kiểu hiển thị',
                        'Định Dạng_format' => 'date_time',
                        'style' => array(
                            'Đen_black' => 'black',
                            'Trắng_white' => 'white',
                        ),
                    )
                ),
                'shortcode' => array(
                    'content' => '[time_down date="YY/MM/DD"/]',
                    'desc' => 'Sử dụng shortcode này để hiển thị ở một trang bất kỳ mà bạn muốn.<br/> <b>Kiểu Năm/Tháng/Ngày</b>.',
                ),
            ),
        ) );
        echo $out;
    }
}