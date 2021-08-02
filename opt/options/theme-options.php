<?php
if( class_exists( 'CSF' ) ) {

  $prefix = 'iro_options';

  CSF::createOptions( $prefix, array(
    'menu_title' => 'iro 主題設置',
    'menu_slug'  => 'iro_options',
  ) );

  CSF::createSection( $prefix, array(
    'id'    => 'preliminary',
    'title' => '初步設置',
    'icon'      => 'fa fa-sliders',
    'fields' => array(

      array(
        'id'    => 'site_name',
        'type'  => 'text',
        'title' => '站點名稱',
        'desc'   => '例如：Fuukei Blog',
      ),

      array(
        'id'    => 'author_name',
        'type'  => 'text',
        'title' => '作者名稱',
        'desc'   => '例如：Fuukei',
      ),

      array(
        'id'    => 'personal_avatar',
        'type'  => 'upload',
        'title' => '個人頭像',
        'desc'   => '最佳比例1比1',
        'library'      => 'image',
      ),

      array(
        'id'    => 'text_logo_options',
        'type'  => 'switcher',
        'title' => '白貓特效文字',
        'label'   => '開啟之後將替換個人頭像作為首頁顯示內容',
        'default' => false
      ),

      array(
        'id'        => 'text_logo',
        'type'      => 'fieldset',
        'title'     => '白貓特效文字',
        'dependency' => array( 'text_logo_options', '==', 'true' ),
        'fields'    => array(
          array(
            'id'     => 'text',
            'type'   => 'text',
            'title'  => '文本',
            'desc'   => '文本內容建議不要過長，推薦長度為16個字節。',
          ),
          array(
            'id'     => 'font',
            'type'   => 'text',
            'title'  => '字體',
            'desc'   => '填寫字體名稱。例如：Ma Shan Zheng',
          ),
          array(
            'id'     => 'size',
            'type'   => 'slider',
            'title'  => '字體大小',
            'desc'   => '滑動滑塊，推薦數值範圍為70-90',
            'unit'    => 'px',
            'min'   => '40',
            'max'   => '140',
          ),
          array(
            'id'      => 'color',
            'type'    => 'color',
            'title'   => '字體顏色',
            'desc'    => '自定義顏色，建議使用淺色系顏色',
          ),      
        ),
        'default'        => array(
          'text'    => 'ぐんじょう',
          'size'    => '80',
          'color'    => '#FFF',
        ),
      ),

      array(
        'id'    => 'iro_logo',
        'type'  => 'upload',
        'title' => '導航選單Logo',
        'desc'   => '最佳尺寸40px，填寫後導航選單文字Logo不顯示',
        'library'      => 'image',
      ),

      array(
        'id'    => 'favicon_link',
        'type'  => 'text',
        'title' => '站點Logo',
        'desc'   => '填寫地址，站點Logo即瀏覽器上方標題旁的圖標',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/basic/favicon.ico'
      ),

      array(
        'id'    => 'iro_meta',
        'type'  => 'switcher',
        'title' => '自定義站點關鍵字和描述',
        'label'   => '開啟之後可自定義填充站點關鍵字和描述',
        'default' => false
      ),

      array(
        'id'     => 'iro_meta_keywords',
        'type'   => 'text',
        'title'  => '站點關鍵詞',
        'dependency' => array( 'iro_meta', '==', 'true' ),
        'desc'   => '各關鍵字間用半角逗號“，”分割，數量在5個以內最佳',
      ),

      array(
        'id'     => 'iro_meta_description',
        'type'   => 'text',
        'title'  => '站點描述',
        'dependency' => array( 'iro_meta', '==', 'true' ),
        'desc'   => '用簡潔的文字描述本站點，字數建議在120個字以內',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'id'    => 'global', 
    'title' => '全局設置',
    'icon'      => 'fa fa-globe',
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '外觀設置',
    'icon'      => 'fa fa-tree',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '主題配色',
      ),

      array(
        'id'      => 'theme_skin',
        'type'    => 'color',
        'title'   => '主題色',
        'desc'    => '自定義顏色',
        'default' => '#505050'
      ),  

      array(
        'id'      => 'theme_skin_matching',
        'type'    => 'color',
        'title'   => '主題色搭配色',
        'desc'    => '自定義顏色',
        'default' => '#ffe066'
      ),  

      array(
        'type'    => 'subheading',
        'content' => '深色模式',
      ),

      array(
        'id'      => 'theme_skin_dark',
        'type'    => 'color',
        'title'   => '深色模式主題色',
        'desc'    => '自定義顏色',
        'default' => '#ffcc00'
      ),  

      array(
        'id'    => 'theme_darkmode_auto',
        'type'  => 'switcher',
        'title' => '深色模式自動切換',
        'label'   => '默認開啟，深色模式會在22:00-7:00自動切換',
        'default' => true
      ),

      array(
        'id'     => 'theme_darkmode_img_bright',
        'type'   => 'slider',
        'title'  => '深色模式圖像亮度',
        'desc'   => '滑動滑塊，推薦數值範圍為0.6-0.8',
        'step'   => '0.01',
        'min'   => '0.4',
        'max'   => '1',
        'default' => '0.8'
      ),

      array(
        'id'     => 'theme_darkmode_widget_transparency',
        'type'   => 'slider',
        'title'  => '深色模式部件透明度',
        'desc'   => '滑動滑塊，推薦數值範圍為0.6-0.8',
        'step'   => '0.01',
        'min'   => '0.2',
        'max'   => '1',
        'default' => '0.8'
      ),

      array(
        'type'    => 'subheading',
        'content' => '其他',
      ),

      array(
        'id'     => 'load_out_svg',
        'type'   => 'text',
        'title'  => '加載控件單元佔位SVG',
        'desc'   => '填寫地址，此為加載控件單元時佔位顯示的SVG',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/load_svg/outload.svg'
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '字體設置',
    'icon'      => 'fa fa-font',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '全局',
      ),

      array(
        'id'     => 'global_font_weight',
        'type'   => 'slider',
        'title'  => '非強調文本字重',
        'desc'   => '滑動滑塊，推薦數值範圍為300-500',
        'step'   => '10',
        'min'   => '100',
        'max'   => '700',
        'default' => '300'
      ),

      array(
        'id'     => 'global_font_size',
        'type'   => 'slider',
        'title'  => '文本字體大小',
        'desc'   => '滑動滑塊，推薦數值範圍為15-18',
        'step'   => '1',
        'unit'    => 'px',
        'min'   => '10',
        'max'   => '20',
        'default' => '15'
      ),

      array(
        'type'    => 'subheading',
        'content' => '外部字體',
      ),

      array(
        'id'    => 'reference_exter_font',
        'type'  => 'switcher',
        'title' => '引用外部字體',
        'label'   => '開啟之後可以使用外部字體作為替代字體或其他部件字體，但可能影響性能',
        'default' => false
      ),

      array(
        'id'     => 'exter_font_link',
        'type'   => 'text',
        'title'  => '外部字體地址',
        'dependency' => array( 'reference_exter_font', '==', 'true' ),
      ),

      array(
        'id'     => 'exter_font_name',
        'type'   => 'text',
        'title'  => '外部字體名稱',
        'dependency' => array( 'reference_exter_font', '==', 'true' ),
      ),

      array(
        'id'     => 'google_fonts_api',
        'type'   => 'text',
        'title'  => 'Google字體API地址',
        'default' => 'fonts.googleapis.com'
      ),

      array(
        'id'     => 'google_fonts_add',
        'type'   => 'text',
        'title'  => 'Google字體名稱',
        'desc'   => '請確保新增的字體在Google字體庫內可被引用，填寫字體名稱。新增的字體前面必須有“ |”。如果引用多個字體，請使用“ |”作為分割符，如果字體名稱有空格，請用加號替代。例如：|ZCOOL+XiaoWei|Ma+Shan+Zheng ',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '導航選單設置',
    'icon'      => 'fa fa-map-signs',
    'fields' => array(

      array(
        'id'         => 'nav_menu_style',
        'type'       => 'image_select',
        'title'      => '導航選單樣式',
        'options'    => array(
          'sakurairo' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/nav_menu_style_iro.png',
          'sakura' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/nav_menu_style_sakura.png',
        ),
        'default'    => 'sakurairo'
      ),

      array(
        'id'    => 'nav_menu_radius',
        'type'  => 'slider',
        'title' => '導航選單圓角',
        'dependency' => array( 'nav_menu_style', '==', 'sakurairo' ),
        'desc'   => '滑動滑塊，推薦數值為15',
        'unit'    => 'px',
        'max'   => '50',
        'default' => '15'
      ),

      array(
        'id'     => 'nav_menu_shrink_animation',
        'type'   => 'slider',
        'title'  => '導航選單收縮比率',
        'dependency' => array( 'nav_menu_style', '==', 'sakurairo' ),
        'desc'   => '滑動滑塊，根據導航選單的內容長度自行設置合適的比率，當比率設置為95時則關閉收縮，替代關閉收縮',
        'step'   => '0.5',
        'unit'    => '%',
        'max'   => '95',
        'min'   => '30',
        'default' => '95'
      ),

      array(
        'id'         => 'nav_menu_display',
        'type'       => 'radio',
        'title'      => '導航選單內容顯示',
        'desc'    => '您可以選擇展開顯示或收縮顯示導航選單內容',
        'options'    => array(
          'unfold' => '展開顯示',
          'fold' => '收縮顯示',
        ),
        'default'    => 'unfold'
      ),

      array(
        'id'    => 'nav_menu_animation',
        'type'  => 'switcher',
        'title' => '導航選單動畫',
        'label'   => '默認開啟，如果關閉，則導航內容將直接顯示',
        'default' => true
      ),

      array(
        'id'     => 'nav_menu_animation_time',
        'type'   => 'slider',
        'title'  => '導航選單動畫時間',
        'dependency' => array( 'nav_menu_animation', '==', 'true' ),
        'desc'   => '滑動滑塊，推薦數值範圍為1-2',
        'step'   => '0.01',
        'unit'    => 's',
        'max'   => '5',
        'default' => '2'
      ),

      array(
        'id'         => 'nav_menu_icon_size',
        'type'       => 'radio',
        'title'      => '導航選單圖標大小',
        'options'    => array(
          'standard' => '標準圖標',
          'large' => '大圖標',
        ),
        'default'    => 'standard'
      ),

      array(
        'id'    => 'nav_menu_search',
        'type'  => 'switcher',
        'title' => '導航選單搜尋',
        'label'   => '默認開啟，點擊將進入搜尋區域',
        'default' => true
      ),

      array(
        'id'    => 'search_area_background',
        'type'  => 'upload',
        'title' => '導航選單搜尋區域背景圖片',
        'desc'   => '設置您的搜尋區域背景圖片，此選項留空則顯示白色背景',
        'library'      => 'image',
        'default'     => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/basic/iloli.gif'
      ),

      array(
        'id'    => 'nav_menu_user_avatar',
        'type'  => 'switcher',
        'title' => '導航選單用戶頭像',
        'label'   => '默認開啟，點擊將進入登入介面',
        'default' => true
      ),

      array(
        'id'     => 'unlisted_avatar',
        'type'  => 'upload',
        'title' => '導航選單用戶未登入頭像',
        'dependency' => array( 'nav_menu_user_avatar', '==', 'true' ),
        'desc'   => '最佳比例1比1',
        'library'      => 'image',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/basic/topavatar.png'
      ),

      array(
        'id'    => 'nav_menu_secondary_arrow',
        'type'  => 'switcher',
        'title' => '導航選單二級選單提示箭頭',
        'label'   => '開啟之後選單提示箭頭將出現在導航選單二級選單',
        'dependency' => array( 'nav_menu_style', '==', 'sakura' ),
        'default' => false
      ),

      array(
        'id'    => 'nav_menu_secondary_radius',
        'type'  => 'slider',
        'title' => '導航選單二級選單圓角',
        'dependency' => array( 'nav_menu_style', '==', 'sakurairo' ),
        'desc'   => '滑動滑塊，推薦數值為15',
        'unit'    => 'px',
        'max'   => '30',
        'default' => '15'
      ),

      array(
        'id'     => 'logo_text',
        'type'   => 'text',
        'title'  => '導航選單文字Logo文本',
        'desc'   => '填寫文本內容，如開啟白貓樣式Logo則此選項無效',
        'dependency' => array( 'mashiro_logo_option', '==', 'false' ),
      ),

      array(
        'id'    => 'mashiro_logo_option',
        'type'  => 'switcher',
        'title' => '導航選單白貓樣式Logo',
        'label'   => '開啟之後白貓樣式Logo將出現並替換導航選單Logo位置',
        'default' => false
      ),

      array(
        'id'     => 'mashiro_logo',
        'type'   => 'fieldset',
        'title'  => '白貓樣式Logo選項',
        'dependency' => array( 'mashiro_logo_option', '==', 'true' ),
        'fields' => array(
          array(
            'id'    => 'text_a',
            'type'  => 'text',
            'title' => '文字A',
          ),
          array(
            'id'    => 'text_b',
            'type'  => 'text',
            'title' => '文字B',
          ),
          array(
            'id'    => 'text_c',
            'type'  => 'text',
            'title' => '文字C',
          ),
          array(
            'id'    => 'text_secondary',
            'type'  => 'text',
            'title' => '二級文字',
          ),
          array(
            'id'    => 'font_link',
            'type'  => 'text',
            'title' => '字體連結',
          ),
          array(
            'id'    => 'font_name',
            'type'  => 'text',
            'title' => '字體名稱',
          ),
        ),
        'default'        => array(
          'font_link'     => 'https://cdn.jsdelivr.net/gh/acai66/mydl/fonts/wenyihei/wenyihei-subfont.css',
          'font_name'    => 'wenyihei-subfont',
        ),
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '樣式選單和前臺背景相關設置',
    'icon'      => 'fa fa-th-large',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '樣式選單',
      ),

      array(
        'id'         => 'style_menu_display',
        'type'       => 'image_select',
        'title'      => '樣式選單顯示',
        'desc'    => '您可以選擇完整顯示或簡單顯示樣式選單，完整顯示將顯示字體切換功能和文本提示',
        'options'    => array(
          'full' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/style_menu_full.png',
          'mini' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/style_menu_mini.png',
        ),
        'default'    => 'full'
      ),

      array(
        'id'    => 'style_menu_radius',
        'type'  => 'slider',
        'title' => '樣式選單按鈕圓角',
        'desc'   => '滑動滑塊，推薦數值為10',
        'unit'    => 'px',
        'max'   => '50',
        'default' => '10'
      ),

      array(
        'id'      => 'style_menu_background_color',
        'type'    => 'color',
        'title'   => '樣式選單背景顏色',
        'desc'    => '自定義顏色，建議使用淺色系顏色',
        'default' => 'rgba(255,255,255,0.8)'
      ),   

      array(
        'id'      => 'style_menu_selection_color',
        'type'    => 'color',
        'title'   => '樣式選單選項背景顏色',
        'desc'    => '自定義顏色，建議使用與主題色相同色系且屬於淺色系的顏色',
        'default' => '#e8e8e8'
      ),

      array(
        'id'    => 'style_menu_selection_radius',
        'type'  => 'slider',
        'title' => '樣式選單選項介面圓角',
        'desc'   => '滑動滑塊，推薦數值為15',
        'unit'    => 'px',
        'max'   => '30',
        'default' => '15'
      ),

      array(
        'type'    => 'subheading',
        'content' => '前臺背景',
      ),

      array(
        'id'            => 'reception_background',
        'type'          => 'tabbed',
        'title'         => '前臺背景設置',
        'tabs'          => array(
          array(
            'title'     => '默認',
            'icon'      => 'fa fa-television',
            'fields'    => array(
              array(
                'id'    => 'img1',
                'type'  => 'upload',
                'title' => '圖片',
              ),
            )
          ),
          array(
            'title'     => '心形圖標',
            'icon'      => 'fa fa-heart-o',
            'fields'    => array(
              array(
                'id'    => 'heart_shaped',
                'type'  => 'switcher',
                'title' => '開關',
              ),
              array(
                'id'    => 'img2',
                'type'  => 'upload',
                'title' => '圖片',
              ),
            )
          ),
          array(
            'title'     => '星形圖標',
            'icon'      => 'fa fa-star-o',
            'fields'    => array(
              array(
                'id'    => 'star_shaped',
                'type'  => 'switcher',
                'title' => '開關',
              ),
              array(
                'id'    => 'img3',
                'type'  => 'upload',
                'title' => '圖片',
              ),
            )
          ),
          array(
            'title'     => '方形圖標',
            'icon'      => 'fa fa-delicious',
            'fields'    => array(
              array(
                'id'    => 'square_shaped',
                'type'  => 'switcher',
                'title' => '開關',
              ),
              array(
                'id'    => 'img4',
                'type'  => 'upload',
                'title' => '圖片',
              ),
            )
          ),
          array(
            'title'     => '檸檬形圖標',
            'icon'      => 'fa fa-lemon-o',
            'fields'    => array(
              array(
                'id'    => 'lemon_shaped',
                'type'  => 'switcher',
                'title' => '開關',
              ),
              array(
                'id'    => 'img5',
                'type'  => 'upload',
                'title' => '圖片',
              ),
            )
          ),
        ),
        'default'       => array(
          'heart_shaped'  => true,
          'star_shaped'  => true,
          'square_shaped'  => true,
          'lemon_shaped'  => true,
          'img2'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/background/foreground/bg1.png',
          'img3'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/background/foreground/bg2.png',
          'img4' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/background/foreground/bg3.png',
          'img5' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/background/foreground/bg4.png',
        )
      ),

      array(
        'id'     => 'reception_background_transparency',
        'type'   => 'slider',
        'title'  => '前臺背景透明度',
        'desc'   => '滑動滑塊，推薦數值範圍為0.6-0.8',
        'step'   => '0.01',
        'min'   => '0.2',
        'max'   => '1',
        'default' => '0.8'
      ),

      array(
        'type'    => 'subheading',
        'content' => '字體區域',
      ),

      array(
        'id'     => 'global_default_font',
        'type'   => 'text',
        'title'  => '默認字體/樣式選單字體A',
        'desc'   => '填寫字體名稱。例如：Ma Shan Zheng',
      ),

      array(
        'id'     => 'global_font_2',
        'type'   => 'text',
        'title'  => '樣式選單字體B',
        'dependency' => array( 'style_menu_display', '==', 'full' ),
        'desc'   => '填寫字體名稱。例如：Ma Shan Zheng',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '頁尾設置',
    'icon'      => 'fa fa-caret-square-o-down',
    'fields' => array(

      array(
        'id'          => 'aplayer_server',
        'type'        => 'select',
        'title'       => '頁尾在線播放器',
        'desc'   => '開啟之後頁尾左下角將出現按鈕，點擊按鈕後頁尾在線播放器將顯示',
        'options'     => array(
          'off'  => '關閉',
          'netease'  => '網易雲音樂',
          'kugou'  => '酷狗音樂（可能無法使用）',
          'baidu'  => '千千音樂（海外服務器無法使用）',
          'tencent'  => 'QQ音樂（可能無法使用）',
        ),
        'default'     => 'off'
      ),

      array(
        'id'     => 'aplayer_playlistid',
        'type'   => 'text',
        'title'  => '頁尾在線播放器歌單ID',
        'dependency' => array( 'aplayer_server', '!=', 'off' ),
        'desc'   => '填寫歌單ID，例如：https://music.163.com/#/playlist?id=5380675133的歌單ID是5380675133',
        'default' => '5380675133'
      ),

      array(
        'id'     => 'aplayer_volume',
        'type'   => 'slider',
        'title'  => '頁尾在線播放器默認音量',
        'dependency' => array( 'aplayer_server', '!=', 'off' ),
        'desc'   => '滑動滑塊，推薦數值範圍為0.4-0.6',
        'step'   => '0.01',
        'max'   => '1',
        'default' => '0.5'
      ),

      array(
        'id'     => 'aplayer_cookie',
        'type'   => 'textarea',
        'title'  => '頁尾在線播放器網易雲音樂Cookies',
        'dependency' => array( 'aplayer_server', '==', 'netease' ),
        'desc'   => '如果您想播放網易雲音樂會員專享音樂，請在此選項填入您的帳號Cookies。',
      ),

      array(
        'id'    => 'sakura_widget',
        'type'  => 'switcher',
        'title' => '頁尾小部件區',
        'label'   => '開啟之後頁尾左下角將出現按鈕，點擊按鈕後頁尾小部件區將顯示，如果您開啟了頁尾在線播放器，則會一起顯示',
        'default' => false
      ),

      array(
        'id'     => 'sakura_widget_background',
        'type'  => 'upload',
        'title' => '頁尾小部件區背景',
        'dependency' => array( 'sakura_widget', '==', 'true' ),
        'desc'   => '最佳寬度400px，最佳高度460px',
        'library'      => 'image',
      ),

      array(
        'id'    => 'footer_sakura_icon',
        'type'  => 'switcher',
        'title' => '頁尾動態櫻花圖標',
        'label'   => '開啟之後頁尾將出現動態櫻花圖標',
        'default' => false
      ),

      array(
        'id'    => 'footer_random_word',
        'type'  => 'switcher',
        'title' => '頁尾隨機話語',
        'label'   => '開啟之後頁尾將出現隨機話語',
        'default' => false
      ),

      array(
        'id'    => 'footer_load_occupancy',
        'type'  => 'switcher',
        'title' => '頁尾負載佔用查詢',
        'label'   => '開啟之後頁尾將出現負載佔用資訊',
        'default' => false
      ),

      array(
        'id'     => 'footer_info',
        'type'   => 'textarea',
        'title'  => '頁尾資訊',
        'desc'   => '頁尾說明文字，支持HTML代碼',
        'default' => 'Copyright &copy; by FUUKEI All Rights Reserved.'
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '鼠標設置',
    'icon'      => 'fa fa-i-cursor',
    'fields' => array(

      array(
        'id'     => 'cursor_nor',
        'type'   => 'text',
        'title'  => '標準鼠標樣式',
        'desc'   => '應用於全局，填寫Cur鼠標檔連結',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/cursor/normal.cur'
      ),

      array(
        'id'     => 'cursor_no',
        'type'   => 'text',
        'title'  => '選定鼠標樣式',
        'desc'   => '應用於多種樣式，填寫Cur鼠標檔連結',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/cursor/No_Disponible.cur'
      ),

      array(
        'id'     => 'cursor_ayu',
        'type'   => 'text',
        'title'  => '選中控件單元鼠標樣式',
        'desc'   => '應用於選中某個控件單元，填寫Cur鼠標檔連結',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/cursor/ayuda.cur'
      ),

      array(
        'id'     => 'cursor_text',
        'type'   => 'text',
        'title'  => '選中文本鼠標樣式',
        'desc'   => '應用於選中文本，填寫Cur鼠標檔連結',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/cursor/texto.cur'
      ),

      array(
        'id'     => 'cursor_work',
        'type'   => 'text',
        'title'  => '工作狀態鼠標樣式',
        'desc'   => '應用於加載控件單元，填寫Cur鼠標檔連結',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/cursor/work.cur'
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'global', 
    'title'  => '額外設置',
    'icon'      => 'fa fa-gift',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '春節限定',
      ),

      array(
        'type'    => 'content',
        'content' => '<img src="https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/newyear.png"  alt="謹賀新年" />',
      ),

      array(
        'id'    => 'spring_festival_limited_deng',
        'type'  => 'switcher',
        'title' => '燈籠',
        'label'   => '開啟之後會加載春節燈籠，此選項為版本限定選項',
        'default' => false
      ),

      array(
        'type'    => 'subheading',
        'content' => '特效及動畫',
      ),

      array(
        'id'    => 'preload_animation',
        'type'  => 'switcher',
        'title' => '預加載動畫',
        'label'   => '開啟之後新頁面加載前會有預加載動畫，此選項需確保您的頁面資源正常加載。',
        'default' => false
      ),

      array(
        'id'      => 'preload_animation_color1',
        'type'    => 'color',
        'title'   => '預加載動畫顏色A',
        'dependency' => array( 'preload_animation', '==', 'true' ),
        'desc'    => '自定義顏色',
        'default' => '#ffea99'
      ),   

      array(
        'id'      => 'preload_animation_color2',
        'type'    => 'color',
        'title'   => '預加載動畫顏色B',
        'dependency' => array( 'preload_animation', '==', 'true' ),
        'desc'    => '自定義顏色',
        'default' => '#ffcc00'
      ),   

      array(
        'id'          => 'falling_effects',
        'type'        => 'select',
        'title'       => '飄落特效',
        'options'     => array(
          'off'  => '關閉',
          'sakura-native'  => '櫻花 原生數量',
          'sakura-quarter'  => '櫻花 四分之一數量',
          'sakura-half'  => '櫻花 二分之一數量',
          'sakura-less'  => '櫻花 較少數量',
          'yuki-native'  => '雪花 原生數量',
          'yuki-half'  => '雪花 二分之一數量',
        ),
        'default'     => 'off'
      ),

      array(
        'id'    => 'live2d_options',
        'type'  => 'switcher',
        'title' => 'Live2D看板娘',
        'label'   => '開啟之後頁面左下角將加載Live2D看板娘',
        'default' => false
      ),

      array(
        'id'     => 'live2d_custom_user',
        'type'   => 'text',
        'title'  => 'Live2D看板娘自定義Github項目用戶名',
        'dependency' => array( 'live2d_options', '==', 'true' ),
        'desc'   => '如果想自定義本選項，您需要先去Github Fork本項目並對本項目進行修改，此處填寫Github項目的用戶名',
        'default' => 'mirai-mamori'
      ),

      array(
        'id'     => 'live2d_custom_user_ver',
        'type'   => 'text',
        'title'  => 'Live2D看板娘自定義Github項目版本',
        'dependency' => array( 'live2d_options', '==', 'true' ),
        'desc'   => '如果想自定義本選項，您需要先去Github Fork本項目並對本項目進行修改，此處填寫Github項目的版本',
        'default' => 'latest'
      ),

      array(
        'id'    => 'note_effects',
        'type'  => 'switcher',
        'title' => '音符觸動特效',
        'label'   => '開啟之後返回頂部按鈕和白貓樣式Logo觸碰時將有音符聲音提示',
        'default' => false
      ),

      array(
        'type'    => 'subheading',
        'content' => '功能',
      ),

      array(
        'id'     => 'poi_pjax',
        'type'   => 'switcher',
        'title'  => 'PJAX局部刷新',
        'label'   => '開啟之後點擊新內容將不需要重新加載',
        'default' => false
      ),

      array(
        'id'     => 'nprogress_on',
        'type'   => 'switcher',
        'title'  => 'NProgress加載進度條',
        'label'   => '默認開啟，加載頁面將有進度條提示',
        'default' => true
      ),

      array(
        'id'     => 'smoothscroll_option',
        'type'   => 'switcher',
        'title'  => '全局平滑滾動',
        'label'   => '默認開啟，加載頁面將有進度條提示',
        'default' => true
      ),

      array(
        'id'         => 'pagenav_style',
        'type'       => 'radio',
        'title'      => '分頁模式',
        'options'    => array(
          'ajax' => 'Ajax加載',
          'np' => '上下頁',
        ),
        'default'    => 'ajax'
      ),

      array(
        'id'          => 'page_auto_load',
        'type'        => 'select',
        'title'       => '下一頁自動加載',
        'dependency' => array( 'pagenav_style', '==', 'ajax' ),
        'options'     => array(
          '233'  => '不自動加載',
          '0'  => '0秒',
          '1'  => '1秒',
          '2'  => '2秒',
          '3'  => '3秒',
          '4'  => '4秒',
          '5'  => '5秒',
          '6'  => '6秒',
          '7'  => '7秒',
          '8'  => '8秒',
          '9'  => '9秒',
          '10'  => '10秒',
        ),
        'default'     => '233'
      ),

      array(
        'id'     => 'load_nextpage_svg',
        'type'   => 'text',
        'title'  => '下一頁加載佔位SVG',
        'desc'   => '填寫地址，此為加載下一頁時佔位顯示的SVG',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/load_svg/ball.svg'
      ),
    )
  ) );

  CSF::createSection( $prefix, array(
    'id'    => 'homepage', 
    'title' => '主頁設置',
    'icon'      => 'fa fa-home',
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'homepage', 
    'title'  => '封面設置',
    'icon'      => 'fa fa-laptop',
    'fields' => array(

      array(
        'id'    => 'cover_switch',
        'type'  => 'switcher',
        'title' => '封面',
        'label'   => '默認開啟，如果關閉，則下文所有選項均將失效',
        'default' => true
      ),

      array(
        'id'    => 'cover_full_screen',
        'type'  => 'switcher',
        'title' => '封面全屏顯示',
        'label'   => '默認開啟',
        'default' => true
      ),

      array(
        'id'    => 'cover_radius',
        'type'  => 'slider',
        'title' => '封面圓角',
        'desc'   => '滑動滑塊，推薦數值範圍為15-20',
        'unit'    => 'px',
        'max'    => '60',
        'default' => '15'
      ),

      array(
        'id'    => 'cover_animation',
        'type'  => 'switcher',
        'title' => '封面動畫',
        'label'   => '默認開啟，如果關閉，則封面將直接顯示',
        'default' => true
      ),

      array(
        'id'     => 'cover_animation_time',
        'type'   => 'slider',
        'title'  => '封面動畫時間',
        'dependency' => array( 'cover_animation', '==', 'true' ),
        'desc'   => '滑動滑塊，推薦數值範圍為1-2',
        'step'   => '0.01',
        'unit'    => 's',
        'max'   => '5',
        'default' => '2'
      ),

      array(
        'id'    => 'infor_bar',
        'type'  => 'switcher',
        'title' => '封面資訊欄',
        'label'   => '默認開啟，顯示頭像、白貓特效文字、簽名欄、社交區域',
        'default' => true
      ),

      array(
        'id'         => 'infor_bar_style',
        'type'       => 'image_select',
        'title'      => '封面資訊欄樣式',
        'options'    => array(
          'v1' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/infor_bar_style_v1.png',
          'v2' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/infor_bar_style_v2.png',
        ),
        'default'    => 'v1'
      ),

      array(
        'id'      => 'infor_bar_bgcolor',
        'type'    => 'color',
        'title'   => '封面資訊欄背景顏色',
        'desc'    => '自定義顏色，建議使用淺色系顏色',
        'default' => 'rgba(255,255,255,0.8)'
      ),     

      array(
        'id'    => 'avatar_radius',
        'type'  => 'slider',
        'title' => '封面資訊欄頭像圓角',
        'desc'   => '滑動滑塊，推薦數值為100',
        'unit'    => 'px',
        'default' => '100'
      ),

      array(
        'id'    => 'signature_radius',
        'type'  => 'slider',
        'title' => '封面簽名欄圓角',
        'desc'   => '滑動滑塊，推薦數值範圍為10-20',
        'unit'    => 'px',
        'max'    => '50',
        'default' => '15'
      ),

      array(
        'id'     => 'signature_text',
        'type'   => 'text',
        'title'  => '封面簽名欄文本',
        'desc'   => '一段自我描述的話',
        'default' => '本當の聲を響かせてよ'
      ),

      array(
        'id'     => 'signature_font',
        'type'   => 'text',
        'title'  => '封面簽名欄文本字體',
        'desc'   => '填寫字體名稱。例如：Ma Shan Zheng',
        'default' => 'Noto Serif SC'
      ),

      array(
        'id'     => 'signature_font_size',
        'type'   => 'slider',
        'title'  => '封面簽名欄文本字體大小',
        'desc'   => '滑動滑塊，推薦數值範圍為15-18',
        'unit'    => 'px',
        'min'   => '5',
        'max'   => '20',
        'default' => '16'
      ),

      array(
        'id'     => 'signature_typing',
        'type'   => 'switcher',
        'title'  => '封面簽名欄打字特效',
        'label'   => '開啟之後簽名欄文本將增加一段文本並呈現打字特效',
        'default' => false
      ),

      array(
        'id'     => 'signature_typing_marks',
        'type'   => 'switcher',
        'title'  => '封面簽名欄打字特效雙引號',
        'dependency' => array( 'signature_typing', '==', 'true' ),
        'label'   => '開啟之後打字特效將追加雙引號',
        'default' => false
      ),

      array(
        'id'     => 'signature_typing_text',
        'type'   => 'text',
        'title'  => '封面簽名欄打字特效文本',
        'dependency' => array( 'signature_typing', '==', 'true' ),
        'desc'   => '填寫打字特效文本部分，文本外必須使用英文雙引號，二句話之間使用英文逗號隔開，支持HTML標籤',
        'default' => '"寒蟬黎明之時,便是重生之日。"'
      ),

      array(
        'id'          => 'random_graphs_options',
        'type'        => 'select',
        'title'       => '封面隨機圖片選項',
        'options'     => array(
          'external_api'  => '外部API隨機圖片',
          'webp_optimization'  => 'Webp優化隨機圖片',
          'local'  => '本地隨機圖片',
        ),
        'default'     => 'external_api'
      ),

      array(
        'id'    => 'random_graphs_mts',
        'type'  => 'switcher',
        'title' => '封面隨機圖片多終端分離',
        'label'   => '默認開啟，桌面端和移動端會分別使用不同的隨機圖片地址',
        'default' => true
      ),

      array(
        'id'     => 'random_graphs_link',
        'type'   => 'text',
        'title'  => 'Webp優化/外部API桌面端隨機圖片地址',
        'desc'   => '填寫地址',
        'default' => 'https://api.iro.tw/webp_pc.php'
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => sprintf(__('如果您選擇使用Webp優化隨機圖片，請點擊 <a href = "%s">這裡</a> 來更新 Manifest 路徑', 'sakurairo'), rest_url('sakura/v1/database/update')), 
      ),

      array(
        'id'     => 'random_graphs_link_mobile',
        'type'   => 'text',
        'title'  => '外部API手機端隨機圖片地址',
        'dependency' => array( 'random_graphs_mts', '==', 'true' ),
        'desc'   => '填寫地址',
        'default' => 'https://api.iro.tw/webp_mb.php'
      ),

      array(
        'id'          => 'random_graphs_filter',
        'type'        => 'select',
        'title'       => '封面隨機圖片濾鏡',
        'options'     => array(
          'filter-nothing'  => '無濾鏡',
          'filter-undertint'  => '淺色濾鏡',
          'filter-dim'  => '暗淡濾鏡',
          'filter-grid'  => '網格濾鏡',
          'filter-dot'  => '點狀濾鏡',
        ),
        'default'     => 'filter-nothing'
      ),

      array(
        'id'    => 'wave_effects',
        'type'  => 'switcher',
        'title' => '封面波浪特效',
        'label'   => '開啟之後首頁封面底部將出現波浪特效',
        'default' => false
      ),

      array(
        'id'    => 'drop_down_arrow',
        'type'  => 'switcher',
        'title' => '封面下拉箭頭',
        'label'   => '默認開啟，首頁封面底部顯示下拉箭頭',
        'default' => true
      ),

      array(
        'id'    => 'drop_down_arrow_mobile',
        'type'  => 'switcher',
        'title' => '封面下拉箭頭移動端顯示',
        'dependency' => array( 'drop_down_arrow', '==', 'true' ),
        'label'   => '開啟之後移動端首頁封面底部將出現下拉箭頭',
        'default' => false
      ),

      array(
        'id'      => 'drop_down_arrow_color',
        'type'    => 'color',
        'title'   => '封面下拉箭頭顏色',
        'dependency' => array( 'drop_down_arrow', '==', 'true' ),
        'desc'    => '自定義顏色，建議使用淺色系顏色',
        'default' => 'rgba(255,255,255,0.8)'
      ),  

      array(
        'id'      => 'drop_down_arrow_dark_color',
        'type'    => 'color',
        'title'   => '封面下拉箭頭深色模式顏色',
        'dependency' => array( 'drop_down_arrow', '==', 'true' ),
        'desc'    => '自定義顏色，建議使用深色系顏色',
        'default' => 'rgba(51,51,51,0.8)'
      ),  

      array(
        'id'    => 'cover_video',
        'type'  => 'switcher',
        'title' => '封面視頻',
        'label'   => '開啟之後將替代封面隨機圖片作為主要顯示內容',
        'default' => false
      ),

      array(
        'id'    => 'cover_video_loop',
        'type'  => 'switcher',
        'title' => '封面視頻循環',
        'dependency' => array( 'cover_video', '==', 'true' ),
        'label'   => '開啟之後視頻將自動循環，需要開啟Pjax功能',
        'default' => false
      ),

      array(
        'id'     => 'cover_video_link',
        'type'   => 'text',
        'title'  => '封面視頻地址',
        'dependency' => array( 'cover_video', '==', 'true' ),
        'desc'   => '填寫地址，該地址拼接下麵的視頻名，地址尾部不需要加斜杠',
      ),

      array(
        'id'     => 'cover_video_title',
        'type'   => 'text',
        'title'  => '封面視頻名稱',
        'dependency' => array( 'cover_video', '==', 'true' ),
        'desc'   => '例如：abc.mp4，只需要填寫視頻檔案名abc即可，多個用英文逗號隔開如abc,efg，默認隨機播放',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'homepage', 
    'title'  => '封面社交區域設置',
    'icon'      => 'fa fa-share-square-o',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '選項',
      ),

      array(
        'id'    => 'social_area',
        'type'  => 'switcher',
        'title' => '封面社交區域',
        'label'   => '默認開啟，顯示封面隨機圖片切換按鈕和社交網絡圖標',
        'default' => true
      ),

      array(
        'id'          => 'social_display_icon',
        'type'        => 'image_select',
        'title'       => '社交網絡圖標',
        'desc'   => '選擇您喜歡的圖標包。圖標包引用資訊詳見關於主題',
        'options'     => array(
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/fluent_design'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_fd.gif',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/muh2'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_h2.gif',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/flat_colorful'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_fc.gif',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/sakura'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_sa.gif',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/macaronblue'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_mb.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/macarongreen'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_mg.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/macaronpurple'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_mp.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/pink'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_sp.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/orange'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_so.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/sangosyu'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_sg.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/sora'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_ts.png',
          'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/nae'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/display_icon_nn.png',
        ),
        'default'     => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/display_icon/fluent_design'
      ),

      array(
        'id'    => 'social_area_radius',
        'type'  => 'slider',
        'title' => '封面社交區域圓角',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '滑動滑塊，推薦數值範圍為10-20',
        'unit'    => 'px',
        'max'   => '30',
        'default' => '15'
      ),

      array(
        'id'    => 'cover_random_graphs_switch',
        'type'  => 'switcher',
        'title' => '封面隨機圖片切換按鈕',
        'dependency' => array( 'social_area', '==', 'true' ),
        'label'   => '默認開啟，顯示封面隨機圖切換按鈕',
        'default' => true
      ),

      array(
        'type'    => 'subheading',
        'content' => '社交網絡',
      ),

      array(
        'id'     => 'wechat',
        'type'  => 'upload',
        'title' => '微信',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '最佳比例1比1',
        'library'      => 'image',
      ),

      array(
        'id'     => 'qq',
        'type'   => 'text',
        'title'  => 'QQ',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '請注意填寫格式，例如：tencent://message/?uin=123456',
      ),

      array(
        'id'     => 'bili',
        'type'   => 'text',
        'title'  => '嗶哩嗶哩',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'wangyiyun',
        'type'   => 'text',
        'title'  => '網易雲音樂',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'sina',
        'type'   => 'text',
        'title'  => '新浪微博',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'github',
        'type'   => 'text',
        'title'  => 'Github',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'telegram',
        'type'   => 'text',
        'title'  => 'Telegram',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'steam',
        'type'   => 'text',
        'title'  => 'Steam',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'zhihu',
        'type'   => 'text',
        'title'  => '知乎',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'qzone',
        'type'   => 'text',
        'title'  => 'QQ空間',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'lofter',
        'type'   => 'text',
        'title'  => 'Lofter',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'youku',
        'type'   => 'text',
        'title'  => '優酷視頻',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'linkedin',
        'type'   => 'text',
        'title'  => 'Linkedin',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'twitter',
        'type'   => 'text',
        'title'  => '推特',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'facebook',
        'type'   => 'text',
        'title'  => '臉書',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'csdn',
        'type'   => 'text',
        'title'  => 'CSDN',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'jianshu',
        'type'   => 'text',
        'title'  => '簡書',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'socialdiy1',
        'type'   => 'text',
        'title'  => '自定義社交網絡Ⅰ',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'socialdiyp1',
        'type'  => 'upload',
        'title' => '自定義社交網絡Ⅰ圖標',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '最佳比例1比1',
        'library'      => 'image',
      ),

      array(
        'id'     => 'socialdiy2',
        'type'   => 'text',
        'title'  => '自定義社交網絡Ⅱ',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'socialdiyp2',
        'type'  => 'upload',
        'title' => '自定義社交網絡Ⅱ圖標',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => '最佳比例1比1',
        'library'      => 'image',
      ),

      array(
        'id'     => 'email_name',
        'type'   => 'text',
        'title'  => '郵箱用戶名',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => 'name@domain.com的name部分，前端僅具有 js 運行環境時才能獲取完整地址，可放心填寫',
      ),

      array(
        'id'     => 'email_domain',
        'type'   => 'text',
        'title'  => '郵箱用戶名',
        'dependency' => array( 'social_area', '==', 'true' ),
        'desc'   => 'name@domain.com的domain.com部分',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'homepage', 
    'title'  => '公告欄和區域標題設置',
    'icon'      => 'fa fa-bullhorn',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '公告欄',
      ),

      array(
        'id'    => 'announce_bar',
        'type'  => 'switcher',
        'title' => '公告欄',
        'label'   => '開啟之後公告欄將在首頁封面下方顯示',
        'default' => false
      ),

      array(
        'id'         => 'announce_bar_style',
        'type'       => 'radio',
        'title'      => '公告欄樣式',
        'dependency' => array( 'announce_bar', '==', 'true' ),
        'options'    => array(
          'picture' => '圖片背景',
          'pure' => '純色背景',
        ),
        'default' => 'picture'
      ),

      array(
        'id'    => 'announce_bar_icon',
        'type'  => 'switcher',
        'title' => '公告欄“廣播”圖標',
        'dependency' => array( 'announce_bar', '==', 'true' ),
        'label'   => '“廣播”圖標將顯示在公告欄的左側',
        'default' => true
      ),

      array(
        'id'     => 'announcement_bg',
        'type'  => 'upload',
        'title' => '公告欄背景',
        'dependency' => array(
          array( 'announce_bar', '==', 'true' ),
          array( 'announce_bar_style',   '==', 'picture' ),
        ),
        'desc'   => '最佳寬度820px，最佳高度67px',
        'library'      => 'image',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/announcement_bg.jpg'
      ),

      array(
        'id'      => 'announce_bar_border_color',
        'type'    => 'color',
        'title'   => '公告欄邊框顏色',
        'dependency' => array(
          array( 'announce_bar', '==', 'true' ),
          array( 'announce_bar_style',   '==', 'pure' ),
        ),
        'desc'    => '自定義顏色，建議使用與主題色相同色系且屬於淺色系的顏色',
        'default' => '#E6E6E6'
      ),

      array(
        'id'     => 'announce_text',
        'type'   => 'text',
        'title'  => '公告文本',
        'dependency' => array( 'announce_bar', '==', 'true' ),
        'desc'   => '填寫公告文本，文本超出142個字節將會被滾動顯示',
      ),

      array(
        'id'          => 'announce_text_align',
        'type'        => 'image_select',
        'title'       => '公告文本對齊方向',
        'dependency' => array( 'announce_bar', '==', 'true' ),
        'options'     => array(
          'left'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/announce_text_left.png',
          'right'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/announce_text_right.png',
          'center'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/announce_text_center.png',
        ),
        'default'     => 'left'
      ),

      array(
        'id'      => 'announce_text_color',
        'type'    => 'color',
        'title'   => '公告文本顏色',
        'dependency' => array( 'announce_bar', '==', 'true' ),
        'desc'    => '自定義顏色，建議根據背景顏色搭配合適的顏色',
        'default' => '#999'
      ),    

      array(
        'type'    => 'subheading',
        'content' => '區域標題',
      ),

      array(
        'id'     => 'exhibition_area_title',
        'type'   => 'text',
        'title'  => '展示區域標題',
        'desc'   => '默認為“展示”，您可以修改為其他，當然不能當廣告用！不允許！！',
        'default' => '展示'
      ),

      array(
        'id'     => 'post_area_title',
        'type'   => 'text',
        'title'  => '文章區域標題',
        'desc'   => '默認為“文章”，您可以修改為其他，當然不能當廣告用！不允許！！',
        'default' => '文章'
      ),

      array(
        'id'     => 'area_title_font',
        'type'   => 'text',
        'title'  => '區域標題字',
        'desc'   => '填寫字體名稱。例如：Ma Shan Zheng',
        'default' => 'Noto Serif SC'
      ),

      array(
        'id'          => 'area_title_text_align',
        'type'        => 'image_select',
        'title'       => '區域標題對齊方向',
        'options'     => array(
          'left'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/area_title_text_left.png',
          'right'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/area_title_text_right.png',
          'center'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/area_title_text_center.png',
        ),
        'default'     => 'left'
      ),

      array(
        'id'      => 'area_title_bottom_color',
        'type'    => 'color',
        'title'   => '區域標題下分隔線顏色',
        'desc'    => '自定義顏色，建議使用與主題色相同色系且屬於淺色系的顏色',
        'default' => '#e8e8e8'
      ),  

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'homepage', 
    'title'  => '展示區域設置',
    'icon'      => 'fa fa-bookmark',
    'fields' => array(

      array(
        'id'    => 'exhibition_area',
        'type'  => 'switcher',
        'title' => '展示區域',
        'label'   => '默認開啟，展示區域顯示在文章區域上方',
        'default' => true
      ),

      array(
        'id'         => 'exhibition_area_style',
        'type'       => 'image_select',
        'title'      => '展示區域樣式',
        'options'    => array(
          'left_and_right' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/exhibition_area_style_lr.png',
          'bottom_to_top' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/exhibition_area_style_ud.png',
        ),
        'default'    => 'left_and_right'
      ),

      array(
        'id'    => 'exhibition_area_compat',
        'type'  => 'switcher',
        'title' => '展示區域相容模式',
        'dependency' => array( 'exhibition_area_style', '==', 'left_and_right' ),
        'label'   => '默認開啟，此選項避免了展示區域錯位的問題',
        'default' => true
      ),

      array(
        'id'      => 'exhibition_background_color',
        'type'    => 'color',
        'title'   => '展示區域背景顏色',
        'dependency' => array( 'exhibition_area_style', '==', 'left_and_right' ),
        'desc'    => '自定義顏色，建議使用淺色系顏色',
        'default' => 'rgba(255,255,255,0.4)'
      ),
      
      array(
        'id'    => 'exhibition_radius',
        'type'  => 'slider',
        'title' => '展示區域圓角',
        'desc'   => '滑動滑塊，推薦數值為15',
        'unit'    => 'px',
        'default' => '15'
      ),

      array(
        'id'            => 'exhibition',
        'type'          => 'tabbed',
        'title'         => '展示區域設置',
        'tabs'          => array(
          array(
            'title'     => '第一展示區域',
            'fields'    => array(
              array(
                'id'    => 'img1',
                'type'  => 'upload',
                'title' => '圖片',
                'desc'  => '最佳寬度260px，最佳高度160px',
              ),
              array(
                'id'    => 'title1',
                'type'  => 'text',
                'title' => '標題',
              ),
              array(
                'id'    => 'description1',
                'type'  => 'text',
                'title' => '描述',
              ),
              array(
                'id'    => 'link1',
                'type'  => 'text',
                'title' => '地址',
              ),
            )
          ),
          array(
            'title'     => '第二展示區域',
            'fields'    => array(
              array(
                'id'    => 'img2',
                'type'  => 'upload',
                'title' => '圖片',
                'desc'  => '最佳寬度260px，最佳高度160px',
              ),
              array(
                'id'    => 'title2',
                'type'  => 'text',
                'title' => '標題',
              ),
              array(
                'id'    => 'description2',
                'type'  => 'text',
                'title' => '描述',
              ),
              array(
                'id'    => 'link2',
                'type'  => 'text',
                'title' => '地址',
              ),
            )
          ),
          array(
            'title'     => '第三展示區域',
            'fields'    => array(
              array(
                'id'    => 'img3',
                'type'  => 'upload',
                'title' => '圖片',
                'desc'    => '最佳寬度260px，最佳高度160px',
              ),
              array(
                'id'    => 'title3',
                'type'  => 'text',
                'title' => '標題',
              ),
              array(
                'id'    => 'description3',
                'type'  => 'text',
                'title' => '描述',
              ),
              array(
                'id'    => 'link3',
                'type'  => 'text',
                'title' => '地址',
              ),
            )
          ),
        ),
        'default'       => array(
          'img1'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/exhibition1.jpg',
          'img2'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/exhibition2.jpg',
          'img3' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/exhibition3.jpg',
          'title1' => 'アンコール',
          'title2' => 'ハルジオン',
          'title3' => 'かいぶつ',
          'description1' => 'ここは夜のない世界',
          'description2' => '過ぎてゆく時間の中',
          'description3' => '素晴らしき世界に今日も乾杯',
        )
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'homepage', 
    'title'  => '文章區域設置',
    'icon'      => 'fa fa-book',
    'fields' => array(

      array(
        'id'         => 'post_list_style',
        'type'       => 'image_select',
        'title'      => '文章區域展示樣式',
        'options'    => array(
          'imageflow' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_sakura_left.png',
          'akinastyle' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_akina.png',
        ),
        'default'    => 'imageflow'
      ),

      array(
        'id'         => 'post_list_akina_type',
        'type'       => 'image_select',
        'title'      => '文章區域裝飾特色圖片展示形狀',
        'dependency' => array( 'post_list_style', '==', 'akinastyle' ),
        'desc'   => '您可以選擇圓形展示或者矩形展示文章區域裝飾特色圖片',
        'options'    => array(
          'round' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_akina.png',
          'square' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_akina2.png',
        ),
        'default'    => 'round'
      ),

      array(
        'id'          => 'post_list_image_align',
        'type'        => 'image_select',
        'title'       => '文章區域裝飾特色圖片對齊方向',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'desc'   => '您可以選擇不同方向展示文章區域裝飾特色圖片',
        'options'     => array(
          'alternate'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_sakura1.png',
          'left'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_sakura2.png',
          'right'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/post_list_style_sakura3.png',
        ),
        'default'     => 'alternate'
      ),

      array(
        'id'         => 'post_cover_options',
        'type'       => 'radio',
        'title'      => '文章區域裝飾特色圖片選項',
        'options'    => array(
          'type_1' => '封面隨機圖片',
          'type_2' => '外部API隨機圖片',
        ),
        'default'    => 'type_1'
      ),

      array(
        'id'     => 'post_cover',
        'type'   => 'text',
        'title'  => '文章區域裝飾特色圖片外部API隨機圖片地址',
        'dependency' => array( 'post_cover_options', '==', 'type_2' ),
        'desc'   => '填寫地址',
      ),

      array(
        'id'     => 'post_title_font_size',
        'type'   => 'slider',
        'title'  => '文章區域標題字體大小',
        'desc'   => '滑動滑塊，推薦數值範圍為16-20',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'unit'    => 'px',
        'step'   => '1',
        'min'   => '10',
        'max'   => '30',
        'default' => '18'
      ),

      array(
        'id'      => 'post_date_background_color',
        'type'    => 'color',
        'title'   => '文章區域時間提示區域背景顏色',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'desc'    => '自定義顏色，建議使用與主題色搭配色相同色系且屬於淺色系的顏色',
        'default' => '#fff5e0'
      ),    

      array(
        'id'      => 'post_date_text_color',
        'type'    => 'color',
        'title'   => '文章區域時間提示區域文本顏色',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'desc'    => '自定義顏色，建議使用與主題色搭配色相同色系的顏色',
        'default' => '#ffcc00'
      ),    

      array(
        'id'     => 'post_date_font_size',
        'type'   => 'slider',
        'title'  => '文章區域時間提示區域字體大小',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'desc'   => '滑動滑塊，推薦數值範圍為10-14',
        'unit'    => 'px',
        'step'   => '1',
        'min'   => '6',
        'max'   => '20',
        'default' => '12'
      ),

      array(
        'id'    => 'post_icon_more',
        'type'  => 'switcher',
        'title' => '文章區域“詳細”圖標',
        'label'   => '開啟之後“詳細”圖標將顯示在文章區域內下方',
        'default' => false
      ),

      array(
        'id'      => 'post_icon_color',
        'type'    => 'color',
        'title'   => '文章區域圖標顏色',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'desc'    => '自定義顏色，建議使用與主題色搭配色相同色系的顏色',
        'default' => '#ffcc00'
      ),    

      array(
        'id'      => 'post_border_shadow_color',
        'type'    => 'color',
        'title'   => '文章區域邊框陰影顏色',
        'dependency' => array( 'post_list_style', '==', 'imageflow' ),
        'desc'    => '自定義顏色，建議使用與主題色相同色系且屬於淺色系的顏色',
        'default' => '#e8e8e8'
      ),    

    )
  ) );

  CSF::createSection( $prefix, array(
    'id'    => 'page', 
    'title' => '頁面設置',
    'icon'      => 'fa fa-file-text',
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'page', 
    'title'  => '綜合設置',
    'icon'      => 'fa fa-compass',
    'fields' => array(

      array(
        'id'         => 'page_style',
        'type'       => 'image_select',
        'title'      => '頁面樣式',
        'options'    => array(
          'sakurairo' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/page_style_iro.png',
          'sakura' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/page_style_sakura.png',
        ),
        'default'    => 'sakurairo'
      ),

      array(
        'id'         => 'entry_content_style',
        'type'       => 'radio',
        'title'      => '頁面排版樣式',
        'options'    => array(
          'sakurairo' => '默認樣式',
          'github' => 'Github樣式',
        ),
        'default'    => 'sakurairo'
      ),

      array(
        'id'    => 'patternimg',
        'type'  => 'switcher',
        'title' => '頁面裝飾圖片',
        'label'   => '默認開啟，顯示在文章頁面，獨立頁面和分類頁',
        'default' => true
      ),

      array(
        'id'    => 'page_title_animation',
        'type'  => 'switcher',
        'title' => '頁面標題動畫',
        'label'   => '開啟之後頁面標題將有浮入動畫',
        'default' => true
      ),

      array(
        'id'     => 'page_title_animation_time',
        'type'   => 'slider',
        'title'  => '頁面標題動畫時間',
        'dependency' => array( 'page_title_animation', '==', 'true' ),
        'desc'   => '滑動滑塊，推薦數值範圍為1-2',
        'step'   => '0.01',
        'unit'    => 's',
        'max'   => '5',
        'default' => '2'
      ),

      array(
        'id'    => 'clipboard_copyright',
        'type'  => 'switcher',
        'title' => '頁面剪切板版權提示',
        'label'   => '默認開啟，用戶在復製文字內容超過30字節時，會有版權提示文本',
        'default' => true
      ),

      array(
        'id'    => 'page_lazyload',
        'type'  => 'switcher',
        'title' => '頁面LazyLoad加載',
        'label'   => '默認開啟，頁面圖片會有LazyLoad加載效果',
        'default' => true
      ),

      array(
        'id'     => 'page_lazyload_spinner',
        'type'   => 'text',
        'title'  => '頁面LazyLoad加載佔位SVG',
        'dependency' => array( 'page_lazyload', '==', 'true' ),
        'desc'   => '填寫地址，此為頁面LazyLoad加載時會顯示的佔位圖',
        'default'    => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/load_svg/inload.svg'
      ),

      array(
        'id'     => 'load_in_svg',
        'type'   => 'text',
        'title'  => '頁面圖像加載佔位SVG',
        'desc'   => '填寫地址，此為加載頁面圖像時佔位顯示的SVG',
        'default' => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/load_svg/inload.svg'
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'page', 
    'title'  => '文章頁面設置',
    'icon'      => 'fa fa-archive',
    'fields' => array(

      array(
        'id'     => 'article_title_font_size',
        'type'   => 'slider',
        'title'  => '文章頁面標題字體大小',
        'desc'   => '滑動滑塊，推薦數值範圍為28-36。此選項僅對已經設置了特色圖片的文章頁面生效',
        'unit'    => 'px',
        'min'   => '16',
        'max'   => '48',
        'default' => '32'
      ),

      array(
        'id'    => 'article_title_line',
        'type'  => 'switcher',
        'title' => '文章頁面標題下劃線動畫',
        'label'   => '開啟且文章設置了特色圖片之後，文章標題將有下劃線動畫',
        'default' => false
      ),

      array(
        'id'    => 'article_nextpre',
        'type'  => 'switcher',
        'title' => '文章頁面上下文章切換',
        'label'   => '開啟之後文章頁面將出現上下文章切換',
        'default' => false
      ),

      array(
        'id'    => 'article_lincenses',
        'type'  => 'switcher',
        'title' => '文章頁面版權提示和標籤',
        'label'   => '開啟之後文章頁面將出現版權提示和標籤',
        'default' => false
      ),

      array(
        'id'    => 'author_profile',
        'type'  => 'switcher',
        'title' => '文章頁面作者資訊',
        'label'   => '開啟之後文章頁面將出現作者資訊',
        'default' => false
      ),

      array(
        'id'     => 'author_profile_text',
        'type'   => 'text',
        'title'  => '文章頁面作者資訊簽名欄文本',
        'dependency' => array( 'author_profile', '==', 'true' ),
        'desc'   => '一段自我描述的話',
        'default'    => '本當の聲を響かせてよ'
      ),

      array(
        'id'    => 'alipay_code',
        'type'  => 'upload',
        'title' => '文章頁面讚賞按鈕支付寶二維碼',
        'desc'   => '上傳支付寶收款碼圖片',
        'library'      => 'image',
      ),

      array(
        'id'    => 'wechat_code',
        'type'  => 'upload',
        'title' => '文章頁面讚賞按鈕微信二維碼',
        'desc'   => '上傳微信收款碼圖片',
        'library'      => 'image',
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'page', 
    'title'  => '範本頁面設置',
    'icon'      => 'fa fa-window-maximize',
    'fields' => array(

      array(
        'id'     => 'page_temp_title_font_size',
        'type'   => 'slider',
        'title'  => '範本頁面標題字體大小',
        'desc'   => '滑動滑塊，推薦數值範圍為36-48。此選項僅對已經設置了特色圖片的範本頁面生效',
        'unit'    => 'px',
        'min'   => '20',
        'max'   => '64',
        'default' => '40'
      ),

      array(
        'id'      => 'shuoshuo_background_color1',
        'type'    => 'color',
        'title'   => '說說範本說說背景顏色Ⅰ',
        'desc'    => '自定義顏色',
        'default' => '#ffe066'
      ),    

      array(
        'id'      => 'shuoshuo_background_color2',
        'type'    => 'color',
        'title'   => '說說範本說說背景顏色Ⅱ',
        'desc'    => '自定義顏色',
        'default' => '#ffcc00'
      ),    

      array(
        'id'    => 'shuoshuo_arrow',
        'type'  => 'switcher',
        'title' => '說說範本說說提示箭頭',
        'label'   => '開啟之後提示箭頭將出現在說說左側上方',
        'default' => false
      ),

      array(
        'id'     => 'shuoshuo_font',
        'type'   => 'text',
        'title'  => '說說範本說說字體',
        'desc'   => '填寫字體名稱。例如：Ma Shan Zheng',
        'default' => 'Noto Serif SC'
      ),

      array(
        'id'     => 'bilibili_id',
        'type'   => 'text',
        'title'  => '嗶嗶哩嗶哩追番範本帳號ID',
        'desc'   => '填寫您的帳號ID，例如：https://space.bilibili.com/13972644/，只需填寫數字“13972644”部分',
        'default'    => '13972644'
      ),

      array(
        'id'     => 'bilibili_cookie',
        'type'   => 'text',
        'title'  => '嗶哩嗶哩追番範本帳號Cookies',
        'desc'   => '填寫您的帳號Cookies，F12打開瀏覽器網絡面板，前往您的B站主頁獲取Cookies。如果留空，將不會顯示追番進度',
        'default'    => 'LIVE_BUVID='
      ),

      array(
        'id'          => 'friend_link_align',
        'type'        => 'image_select',
        'title'       => '友情連結範本單元對齊方向',
        'options'     => array(
          'left'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/friend_link_left.png',
          'right'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/friend_link_right.png',
          'center'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/friend_link_center.png',
        ),
        'default'     => 'left'
      ),

      array(
        'id'     => 'ex_register_open',
        'type'   => 'switcher',
        'title'  => '登入範本註冊功能',
        'label'   => '開啟之後登入範本將允許註冊',
        'default' => false
      ),

      array(
        'id'     => 'registration_validation',
        'type'   => 'switcher',
        'title'  => '登入範本註冊滑動驗證',
        'label'   => '開啟之後登入範本註冊需要經過滑動驗證',
        'default' => false
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'page', 
    'title'  => '評論相關設置',
    'icon'      => 'fa fa-comments-o',
    'fields' => array(

      array(
        'id'         => 'comment_area',
        'type'       => 'radio',
        'title'      => '頁面評論區域顯示',
        'desc'    => '您可以選擇展開顯示或者收縮顯示評論區域內容',
        'options'    => array(
          'unfold' => '展開顯示',
          'fold' => '收縮顯示',
        ),
        'default'    => 'unfold'
      ),

      array(
        'id'     => 'comment_smile_bilibili',
        'type'   => 'switcher',
        'title'  => '頁面評論區域嗶哩嗶哩表情包',
        'label'   => '默認開啟，嗶哩嗶哩表情包顯示在評論框的下方',
        'default' => true
      ),

      array(
        'id'    => 'comment_area_image',
        'type'  => 'upload',
        'title' => '頁面評論區域右下背景圖片',
        'desc'   => '如果此選項為空白，則沒有圖像，無最佳推薦',
        'library'      => 'image',
      ),

      array(
        'id'     => 'comment_useragent',
        'type'   => 'switcher',
        'title'  => '頁面評論區域UA資訊',
        'label'   => '開啟之後頁面評論區域將顯示用戶的瀏覽器，操作系統資訊',
        'default' => false
      ),

      array(
        'id'     => 'comment_location',
        'type'   => 'switcher',
        'title'  => '頁面評論區域位置資訊',
        'label'   => '開啟之後頁面評論區域將顯示用戶的位置資訊',
        'default' => false
      ),

      array(
        'id'     => 'comment_private_message',
        'type'   => 'switcher',
        'title'  => '私人評論功能',
        'label'   => '開啟之後將允許用戶設置自己的評論對其他人不可見',
        'default' => false
      ),

      array(
        'id'     => 'not_robot',
        'type'   => 'switcher',
        'title'  => '頁面評論區域機器人驗證',
        'label'   => '開啟之後用戶評論前需要經過驗證後才可發布',
        'default' => false
      ),

      array(
        'id'          => 'qq_avatar_link',
        'type'        => 'select',
        'title'       => 'QQ頭像連結加密',
        'options'     => array(
          'off'  => '關閉',
          'type_1'  => '重定向（低安全性）',
          'type_2'  => '後端獲取頭像數據（中安全性）',
          'type_3'  => '後端解析頭像介面（高安全性，慢速）',
        ),
        'default'     => 'off'
      ),

      array(
        'id'          => 'img_upload_api',
        'type'        => 'select',
        'title'       => '頁面評論區域上傳圖片介面',
        'options'     => array(
          'off'  => '關閉',
          'imgur'  => 'Imgur (https://imgur.com)',
          'smms'  => 'SM.MS (https://sm.ms)',
          'chevereto'  => 'Chevereto (https://chevereto.com)',
        ),
        'default'     => 'off'
      ),

      array(
        'id'     => 'imgur_client_id',
        'type'   => 'text',
        'title'  => 'Imgur Client ID',
        'dependency' => array( 'img_upload_api', '==', 'imgur' ),
        'desc'   => '此處填寫Client ID，註冊請訪問 https://api.imgur.com/oauth2/addclient ',
      ),

      array(
        'id'     => 'imgur_upload_image_proxy',
        'type'   => 'text',
        'title'  => 'Imgur上傳代理',
        'dependency' => array( 'img_upload_api', '==', 'imgur' ),
        'desc'   => '後端上傳圖片到 Imgur 的時候使用的代理。您可以參考教程：https://2heng.xin/2018/06/06/javascript-upload-images-with-imgur-api/',
        'default'     => 'https://api.imgur.com/3/image/'
      ),

      array(
        'id'     => 'smms_client_id',
        'type'   => 'text',
        'title'  => 'SM.MS Secret Token',
        'dependency' => array( 'img_upload_api', '==', 'smms' ),
        'desc'   => '此處填寫Key，獲取請訪問 https://sm.ms/home/apitoken ',
      ),

      array(
        'id'     => 'chevereto_api_key',
        'type'   => 'text',
        'title'  => 'Chevereto API v1 Key',
        'dependency' => array( 'img_upload_api', '==', 'chevereto' ),
        'desc'   => '此處填寫Key，獲取請訪問您的Chevereto首頁地址/dashboard/settings/api ',
      ),

      array(
        'id'     => 'cheverto_url',
        'type'   => 'text',
        'title'  => 'Chevereto地址',
        'dependency' => array( 'img_upload_api', '==', 'chevereto' ),
        'desc'   => '您的Chevereto首頁地址, 注意結尾沒有 /, 例如：https://your.cherverto.com',
      ),

      array(
        'id'     => 'comment_image_proxy',
        'type'   => 'text',
        'title'  => '評論圖片代理',
        'desc'   => '前端顯示的圖片的代理',
        'default'     => 'https://images.weserv.nl/?url='
      ),

      array(
        'id'    => 'mail_img',
        'type'  => 'upload',
        'title' => '郵件範本特色圖片',
        'desc'   => '設置您的回復郵件上方背景圖片',
        'library'      => 'image',
        'default'     => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/mail_head.jpg'
      ),

      array(
        'id'     => 'mail_user_name',
        'type'   => 'text',
        'title'  => '郵件範本發件地址前綴',
        'desc'   => '用於發送系統郵件，在用戶的郵箱中顯示的發件人地址，不要使用中文，默認系統郵件地址為 bibi@您的功能變數名稱',
        'default'     => 'bibi'
      ),

      array(
        'id'     => 'mail_notify',
        'type'   => 'switcher',
        'title'  => '用戶郵件回復通知',
        'label'   => 'WordPress默認會使用郵件通知用戶評論收到回復，開啟之後允許用戶設置自己的評論收到回復時是否使用郵件通知',
        'default' => false
      ),

      array(
        'id'     => 'admin_notify',
        'type'   => 'switcher',
        'title'  => '管理員郵件回復通知',
        'label'   => '開啟之後當管理員評論收到回復時使用郵件通知',
        'default' => false
      ),

    )
  ) );

  CSF::createSection( $prefix, array(
    'id'    => 'others', 
    'title' => '其他設置',
    'icon'      => 'fa fa-coffee',
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'others', 
    'title'  => '登入介面和儀錶盤相關設置',
    'icon'      => 'fa fa-sign-in',
    'fields' => array(

      array(
        'type'    => 'subheading',
        'content' => '登入介面',
      ),

      array(
        'id'    => 'login_background',
        'type'  => 'upload',
        'title' => '登入介面背景圖片',
        'desc'   => '設置您的登入介面背景圖片，此選項留空則顯示默認背景',
        'library'      => 'image',
        'default'     => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/login_background.jpg'
      ),

      array(
        'id'     => 'login_blur',
        'type'   => 'switcher',
        'title'  => '登入介面背景虛化',
        'label'   => '開啟之後登入介面背景圖片將被虛化',
        'default' => false
      ),

      array(
        'id'    => 'login_logo_img',
        'type'  => 'upload',
        'title' => '登入介面Logo',
        'desc'   => '設置您的登入介面Logo',
        'library'      => 'image',
        'default'     => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/login_logo.png'
      ),

      array(
        'id'     => 'login_validation',
        'type'   => 'switcher',
        'title'  => '登入介面滑動驗證',
        'label'   => '開啟之後登入需要經過滑動驗證',
        'default' => false
      ),

      array(
        'id'     => 'login_urlskip',
        'type'   => 'switcher',
        'title'  => '登入後跳轉',
        'label'   => '開啟之後管理員跳轉至後臺，用戶跳轉至主頁',
        'default' => false
      ),

      array(
        'type'    => 'subheading',
        'content' => '儀錶盤',
      ),

      array(
        'id'    => 'admin_background',
        'type'  => 'upload',
        'title' => '儀錶盤背景圖片',
        'desc'   => '設置您的儀錶盤背景圖片，此選項留空則顯示白色背景',
        'library'      => 'image',
        'default'     => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/ultramarine/admin_background.jpg'
      ),

      array(
        'id'      => 'admin_first_class_color',
        'type'    => 'color',
        'title'   => '儀錶盤一級選單顏色',
        'desc'    => '自定義顏色',
        'default' => '#a9c7d4'
      ),  

      array(
        'id'      => 'admin_second_class_color',
        'type'    => 'color',
        'title'   => '儀錶盤二級選單顏色',
        'desc'    => '自定義顏色',
        'default' => '#98b3bf'
      ),  

      array(
        'id'      => 'admin_emphasize_color',
        'type'    => 'color',
        'title'   => '儀錶盤強調顏色',
        'desc'    => '自定義顏色',
        'default' => '#8a8276'
      ),  

      array(
        'id'      => 'admin_button_color',
        'type'    => 'color',
        'title'   => '儀錶盤按鈕顏色',
        'desc'    => '自定義顏色',
        'default' => '#8995ad'
      ),  

      array(
        'id'      => 'admin_text_color',
        'type'    => 'color',
        'title'   => '儀錶盤文本顏色',
        'desc'    => '自定義顏色',
      ),  

    )
  ) );

  CSF::createSection( $prefix, array(
    'parent' => 'others', 
    'title'  => '低使用設置',
    'icon'      => 'fa fa-low-vision',
    'fields' => array(

      array(
        'id'         => 'statistics_api',
        'type'       => 'radio',
        'title'      => '統計介面',
        'desc'    => '您可以選擇WP-Statistics插件統計或者主題內建統計作為統計結果',
        'options'    => array(
          'theme_build_in' => '主題內建統計',
          'wp_statistics' => 'WP-Statistics插件統計',
        ),
        'default'    => 'theme_build_in'
      ),

      array(
        'id'          => 'statistics_format',
        'type'        => 'select',
        'title'       => '統計數據顯示格式',
        'desc'   => '您可以選擇四種不同的數據顯示格式',
        'options'     => array(
          'type_1'  => '23333次訪問',
          'type_2'  => '23,333次訪問',
          'type_3'  => '23 333次訪問',
          'type_4'  => '23K次訪問',
        ),
        'default'     => 'type_1'
      ),

      array(
        'id'     => 'live_search',
        'type'   => 'switcher',
        'title'  => '實時搜尋',
        'label'   => '開啟之後將在前臺實現實時搜尋，調用 Rest API 每小時更新一次緩存，可在 api.php 裏手動設置緩存時間',
        'default' => false
      ),

      array(
        'id'     => 'live_search_comment',
        'type'   => 'switcher',
        'title'  => '實時搜尋評論支援',
        'label'   => '開啟之後將在可在實時搜尋中搜尋評論（如果網站評論數量太多不建議開啟）',
        'default' => false
      ),

      array(
        'id'     => 'gravatar_proxy',
        'type'   => 'text',
        'title'  => 'Gravatar頭像代理',
        'desc'   => '填寫Gravatar頭像的代理地址，默認使用極客族代理，留空則不使用代理',
        'default'     => 'sdn.geekzu.org/avatar'
      ),

      array(
        'id'     => 'google_analytics_id',
        'type'   => 'text',
        'title'  => 'Google統計代碼',
      ),

      array(
        'id'     => 'site_custom_style',
        'type'   => 'textarea',
        'title'  => '自定義CSS樣式',
        'desc'   => '填寫CSS代碼，不需要寫style標籤',
      ),

      array(
        'id'     => 'block_library_css',
        'type'   => 'switcher',
        'title'  => 'WordPress區塊編輯器CSS',
        'label'   => '開啟之後將加載WordPress區塊編輯器CSS',
        'default' => false
      ),

      array(
        'id'     => 'time_zone_fix',
        'type'   => 'slider',
        'title'  => '時區修正',
        'desc'   => '滑動滑塊，如果評論出現時差問題在這裡調整，填入一個整數，計算方法：實際時間=顯示錯誤的時間-您輸入的整數（單位：小時）',
        'step'   => '1',
        'max'   => '24',
        'default'    => '0'
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'danger',
        'content' => '以下設置不推薦盲目進行修改，請在他人的指導下使用',
      ),

      array(
        'id'     => 'image_cdn',
        'type'   => 'text',
        'title'  => '圖片CDN',
        'desc'   => '注意：填寫格式為 http(s)://您的CDN功能變數名稱/。也就是說，原路徑為 http://your.domain/wp-content/uploads/2018/05/xx.png 的圖片將從 http://您的CDN功能變數名稱/2018/05/xx.png 加載',
        'default'     => ''
      ),

      array(
        'id'     => 'classify_display',
        'type'   => 'text',
        'title'  => '不顯示的文章分類',
        'desc'   => '填寫分類ID，多個用英文“ , ”分開',
      ),

      array(
        'id'     => 'image_category',
        'type'   => 'text',
        'title'  => '圖片展示分類',
        'desc'   => '填寫分類ID，多個用英文“ , ”分開',
      ),

      array(
        'id'     => 'exlogin_url',
        'type'   => 'text',
        'title'  => '指定登入地址',
        'desc'   => '強制不使用WordPress登入頁面地址登入，填寫新建的登陸頁面地址，比如：http://www.xxx.com/login。注意填寫前先測試下您新建的頁面是可以正常打開的，以免造成無法進入後臺等情況',
      ),

      array(
        'id'     => 'exregister_url',
        'type'   => 'text',
        'title'  => '指定註冊地址',
        'desc'   => '該地址在登入頁面作為註冊入口，如果您指定了登入地址，則建議填寫',
      ),

      array(
        'id'     => 'cookie_version',
        'type'   => 'text',
        'title'  => '版本控制',
        'desc'   => '用於更新前端Cookie和瀏覽器緩存，可使用任意字串',
      ),

      array(
        'id'     => 'image_viewer',
        'type'   => 'switcher',
        'title'  => 'BaguetteBox燈箱效果',
        'label'   => '開啟之後將替換Fancybox作為圖片燈箱效果，不建議使用',
        'default' => false
      ),

    )
  ) );

  CSF::createSection($prefix, array(
    'title'       => '備份恢復',
    'icon'        => 'fa fa-shield',
    'description' => '備份或恢復您的主題設置',
    'fields'      => array(

        array(
            'type' => 'backup',
        ),

    )
  ) );

  CSF::createSection($prefix, array(
    'title'       => '關於主題',
    'icon'        => 'fa fa-paperclip',
    'fields'      => array(

      array(
        'type'    => 'subheading',
        'content' => '版本資訊',
      ),

      array(
        'type'    => 'content',
        'content' => '<img src="https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/ultramarinelogo.gif"  alt="主題資訊" />',
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => sprintf(__('正在使用 iro 主題 版本 %s  |  <a href="https://iro.tw">主題文檔</a>  |  <a href="https://github.com/mirai-mamori/Sakurairo">源碼地址</a>', 'sakurairo'), SAKURA_VERSION), 
      ),

      array(
        'type'    => 'subheading',
        'content' => '更新相關',
      ),

      array(
        'id'          => 'iro_update_source',
        'type'        => 'image_select',
        'title'       => '主題更新源',
        'options'     => array(
          'github'  => 'https://cdn.jsdelivr.net/gh/Fuukei/Public_Repository@latest/vision/options/update_source_github.png',
        ),
        'default'     => 'github'
      ),

      array(
        'type'    => 'subheading',
        'content' => '本地化',
      ),

      array(
        'id'     => 'local_global_library',
        'type'   => 'switcher',
        'title'  => '本地化前端庫',
        'label'   => '開啟之後前端庫將不走jsDelivr CDN',
        'default' => false
      ),

      array(
        'id'     => 'local_application_library',
        'type'   => 'switcher',
        'title'  => '本地化JS/CSS檔',
        'label'   => '默認開啟，部分JS檔和CSS檔不走jsDelivr CDN',
        'default' => true
      ),

      array(
        'type'    => 'subheading',
        'content' => '引用資訊',
      ),

      array(
        'type'    => 'content',
        'content' => '<p>流暢設計圖標引用了由 Paradox 設計的 <a href="https://wwi.lanzous.com/ikyq5kgx0wb">Fluent圖標</a></p>
        <p>沐氫圖標引用了由 緘默 設計的 <a href="https://www.coolapk.com/apk/com.muh2.icon">沐氫圖標</a></p>
        <p>看板娘引用了由 Stevenjoezhang 開源的 <a href="https://github.com/stevenjoezhang/live2d-widget">Live2d-Widget</a> 項目</p>
        <p>白貓樣式Logo參考原主題作者白貓，由 <a href="https://hyacm.com/acai/ui/143/sakura-logo/">Hyacm</a> 提供方案並引用</p>',
      ),

      array(
        'type'    => 'subheading',
        'content' => '依賴資訊',
      ),

      array(
        'type'    => 'content',
        'content' => '<p>靜態資源依賴於主題官方 Fuukei 創建的 <a href="https://github.com/Fuukei/Public_Repository">Public Repository</a> 項目</p>
        <p>設置框架依賴於 Codestar 開源的 <a href="https://github.com/Codestar/codestar-framework">Codestar-Framework</a> 項目</p>
        <p>更新功能依賴於 YahnisElsts 開源的 <a href="https://github.com/YahnisElsts/plugin-update-checker">Plugin-Update-Checker</a> 項目</p>',
      ),

      array(
        'type'    => 'content',
        'content' => '<img src="https://img.shields.io/github/v/release/mirai-mamori/Sakurairo.svg?style=flat-square"  alt="主題最新版本" />  <img src="https://img.shields.io/github/release-date/mirai-mamori/Sakurairo?style=flat-square"  alt="主題最新版本發佈時間" />  <img src="https://data.jsdelivr.com/v1/package/gh/Fuukei/Public_Repository/badge"  alt="主題CDN資源訪問量" />',
      ),

    )
  ) );

}
