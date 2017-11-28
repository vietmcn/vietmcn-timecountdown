<?php 
class Vietmcn_time_boots extends Vietmcn_boots
{
    public function __construct( $option = null )
    {   
        self::$options = $option;

        add_action( 'wp_enqueue_scripts',   array( $this, 'time_script' ) );
        add_action( 'wp_head',              array( $this, 'time_style' ) );
        add_action( 'wp_footer',            array( $this, 'time_script_print' ) );
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
    public function time_style()
    {  
        $out  = '<style type="text/css" media="all">';
        $out .= ( isset( self::$options['time_countdown']['time_stylecss'] ) ) ? self::$options['time_countdown']['time_stylecss'] : '';   
        $out .= '</style>';
        echo $out;
    }
    public function time_script()
    {
        wp_enqueue_script( 'vietmcn-models-time', VIETMCN_URL . 'App/Public/Js/lib/time.min.js', array('jquery'), VIETMCN_VERSION, true );
    }
    public function time_script_print()
    {
        $time_date = ( isset( self::$options['option']['format'] ) == 'date_time' ) ? '<span class="vietmcn-m">%D ngày</span><span class="vietmcn-time">%H</span><span>%M</span><span>%S</span>' : '<span class="vietmcn-time">%H giờ</span><span>%M phút</span><span>%S giây</span>';
        //style
        ?><script type='text/javascript'>jQuery(document).ready(function(a){a('[data-countdown]').each(function(){var b=a(this),c=a(this).data('countdown');b.countdown(c,function(d){b.html(d.strftime('<?php echo $time_date;?>'))})})});</script><?php
    }
    public function get_option()
    {
        $out = Vietmcn_field::get_field( array(
            'title' => 'Time CountDown',
            'desc' => 'Models gọi thời gian kết thúc giảm ra ngoài trang chú hoặc trang xem chi tiết sản phẩm.',
            'version' => '0.1',
            'option' => array(
                'key' => 'time_countdown',
                'icon' => 'ion-ios-timer-outline',
                'desc_popup' => 'Tick vào để chọn không hiển thị ở trang danh mục sản phẩm.',
                'shortcode' => array(
                    'content' => '[time_down date="YY/MM/DD"/]',
                    'desc' => 'Sử dụng shortcode này để hiển thị ở một trang bất kỳ mà bạn muốn.<br/> <b>Kiểu Năm/Tháng/Ngày</b>.',
                ),
            ),
            'field' => array( 
                'display' => 'multi_input',
                'type_checked' => array(
                    'checked' => ( isset( self::$options['time_countdown']['time_checked'] ) ) ? 'checked' : '',
                    'title' => 'Ẩn/hiện',
                    'desc' => 'Tùy chọn này sẽ ẩn việc điếm thời gian tại trang catalog, của bạn.',
                    'key_name' => 'time_checked',
                ),
                'type_radio' => array(
                    'title' => 'Chọn kiểu dán',
                    'desc' => 'Tạo kiểu dán hiển thị',
                    'key_name' => 'time_radio',
                    'checked' => ( isset( self::$options['time_countdown']['time_radio'] ) ) ? 'checked' : '',
                    'value' => array(
                        'Style-1' => 'default',
                    ),
                ),
                'type_textarea' => array( 
                    'title' => 'Tùy chỉnh CSS',
                    'desc' => 'Thêm css để hiển thị style đồng hồ đếm theo cách của bạn',
                    'key_name' => 'time_stylecss',
                    'show_text' => ( isset( self::$options['time_countdown']['time_stylecss'] ) ) ? self::$options['time_countdown']['time_stylecss'] : '',
                ),
                'type_shortcode' => array( 
                    'title' => 'TimeCountdow',
                    'desc' => 'Sử dụng shortcode để thêm vào khu vực hiển thị tùy ý',
                    'content' => '[vietmcn_time_down date="YY/MM/DD"/]',
                )
            ),
        ) );
        echo $out;
    }
}