<?php 
class Vietmcn_front_credit
{
    public static function show_credit()
    {
        return self::Name();
    }
    private static function Name()
    {
        $out  = '<div class="title"><h1>Vietmcn/TimeCount Down Saleoff Product '.VIETMCN_VERSION.'</h1>';
        $out .= '<div class="link">public_html/vietmcn-timecountdown/#</div>';
        $out .= '</div>';
        $out .= '<div class="desc">';
        $out .= '<p>Hổ trợ bạn hiển thị ngày kết thúc giảm giá dành cho <strong>Woocommerce</strong></p>';
        $out .= '</div>';
        $out .= '<a target="_blank" href="//vietmcn.com/wordpress#">Site://Vietmcn.com</a><br/>';
        $out .= '<a target="_blank" href="//facebook.com/Vietmcn-120069061984349/?ref=bookmarks">fb:Vietmcn-120069061984349/?ref=bookmarks</a> <br/>';
        $out .= '<a target="_blank" href="//github.com/vietmcn/vietmcn-plugins">git:github.com/vietmcn/vietmcn-timecountdown</a> <br/>';
        $out .= 'Đặt câu hỏi vui lòng gữi tại đây <a target="_blank" href="//vietmcn.com/vietmcn-plugins#">//vietmcn.com/vietmcn-plugins#</a> <br/> <br/>';
        $out .= 'thuthuat_wp@vietmcn.com - Vietmcn © 2017';
        return $out;
    }
}