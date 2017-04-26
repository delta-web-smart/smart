<?php

    class Morpher {
    
        const CACHE_TIME = 86400;

        public function MorpherInflect($text)
        {
            $url = 'http://morpher.ru/WebService.asmx/GetXml?s='. urlencode($text);
            $res = array();
            $content = simplexml_load_file($url);
            $res = xml2array($content);
            return $res;
        }
        
        public function GetPluralByWord($text) {
            $content = $this->GetCacheByWord($text);
            $word = $content["множественное"];            
            $res = $word["И"];
            return $res;
        }
        
        public function CheckCountQueries() {
            $url = 'http://api.morpher.ru/WebService.asmx/GetDailyQueryLimit';
            $content = simplexml_load_file($url);
            $content = xml2array($content);
            $res = $content[0];
            return $res;
        }

        public function GetCacheByWord($text) {
            $obCache = new CPHPCache;
            $cache_id = "morpher-word-".CUtil::translit($text, "ru");
            $cacheData = $obCache->InitCache(self::CACHE_TIME, $cache_id, "/");
            if($cacheData):
                $vars = $obCache->GetVars();
                $res = $vars["WORD"];
            else:
                $res = $this->MorpherInflect($text);
            endif;
            if($obCache->StartDataCache()):
              $obCache->EndDataCache(array("WORD" => $res));
            endif;
            return $res;
        }
    }