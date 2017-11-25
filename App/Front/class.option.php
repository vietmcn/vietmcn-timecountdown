<?php 
class Vietmcn_front_option 
{
    public static function vietmcn_option_welcome()
    {
        ?>
        <div class="wrapper">
            <header><h1><span class="vietmcn-logo"></span>Vietmcn+<span class="beta">Beta</span></h1><div><span><i class="ion-wrench"></i> Tùy chỉnh plugins</span><span><i class="ion-ios-information-outline"></i> Phiên bản Plugins hiện tại <strong><?php echo VIETMCN_VERSION;?></strong></span></header>
            <div class="trangfox-container">
            <nav><ul>
            <li class="gnav1"><a id="tab1" href="#tab1"><i class="ion-ios-color-filter-outline"></i> Danh sách Models</a></li>
            <li class="gnav3"><a id="tab3" href="#tab2"><i class="ion-ios-information-outline"></i> Credit Edit</a></li>
            </ul></nav>
            <div class="contents" id="contents">
                <div class="container">
                    <form id="table" method="post" action="options.php">
                        <?php 
                            settings_fields( 'vietmcn_plugins_option' );
                            do_settings_sections( 'vietmcn_plugins_option' );
                            get_settings_errors( 'vietmcn_plugins_option' );
                            settings_errors( 'vietmcn_plugins_option' );          
                        ?>
                        <article id="page1" class="show top scrollbar-inner">
                            <?php 
                            /** Hooked */
                                do_action( 'vietmcn_option_hook' );
                            ?>
                            <button type="submit"> Lưu Lại</button>
                        </article>
                    </form>
                    <?php self::option_content_credit();?>
                </div>
            </div>
        </div>
        <?php
    }
    private static function option_content_credit()
    {
        //Import Lib
        if ( ! class_exists(  'Vietmcn_front_credit' ) ) {
            require_once( VIETMCN_PATH .'/App/Front/class.credit.php' );
            new Vietmcn_front_credit();
        }
        $out  = '<article id="page2" data-elemt="vietmcn-credit">';
        $out .= '<div class="fox-social fb">';
        $out .=  Vietmcn_front_credit::show_credit();
        $out .= '</div>';
        $out .= '</article>';
        echo $out;
    }
}