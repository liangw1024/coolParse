<?php
    define('TYPE_KS',1);//快手
    define('TYPE_DY',2);//抖音 
    define('TYPE_WS',3);//微视
    define('TYPE_QZONE',4)//qq空间
    $url = $_GET['url'];//网页 链接

    /**
     * 根据网页源码获取video url
     */
    function get_video_url($url){
        //获取源码
        $html_source = get_html($url);
        //解析数据
        switch(get_platform_type){
            case TYPE_KS:
                
            break;
            case TYPE_DY:
            break;
            case TYPE_WS:
            break;
            case TYPE_QZONE:
            break;
        }
    }
    /**
     * 根据url获取平台类型 
     */
    function get_platform_type($url){
        $result = null;
        if(explode('kuaishou',$url)){
            $result = TYPE_KS;
        }else if(explode('dy',$url)){
            $result =  TYPE_DY;
        }else if(explode('ws',$url)){
            $result = TYPE_WS;
        }else if(explode('qz',$url){
            $result = TYEP_QZONE;   
        }
        return $result;
    }

    /**
     * 获取网页源码 
     */
    function get_html($url){
        $result = null;
        if(explode("https")){//https
            $curl = curl_init();
            curl_setopt($curl,)
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            $data = curl_exec($curl);
            $result = $data;
            curl_close($curl);
        }else{//http
            $html = file_get_contents($url);
            $result = htmlspecialchars($html);
        }
        return $result;
    }