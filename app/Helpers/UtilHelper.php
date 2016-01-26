<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

class UtilHelper {

    public static function getUrlOgInfo($url) {
        $site_html = file_get_contents($url);
        $matches = null;
        preg_match_all('~<\s*meta\s+property="(og:[^"]+)"\s+content="([^"]*)~i', $site_html, $matches);
        $ogtags = array();
        for ($i = 0; $i < count($matches[1]); $i++) {
            $ogtags[$matches[1][$i]] = $matches[2][$i];
        }
        return self::convertToPoll($ogtags);
    }

    public static function convertToPoll($ogtags) {
        if (sizeof($ogtags) > 0) {
            return array(
                'product_url' => isset($ogtags["og:url"]) ? $ogtags["og:url"] : '',
                'image_url' => isset($ogtags["og:image"]) ? $ogtags["og:image"] : '',
                'title' => isset($ogtags["og:site_name"]) ? $ogtags["og:site_name"] : '',
            );
        }
        return array('product_url' => '', 'image_url' => '', 'title' => '');
    }

}
