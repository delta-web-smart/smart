<?php
    
    class PickingAutoForTyresAndDisks {
        
        var $multiplyProperties = array(
            "ZAVOD_SHINI",
            "ZAMEN_SHINI",
            "TUNING_SHINI",
            "ZAVOD_DISKOV",
            "ZAMEN_DISKOV",
            "TUNING_DISKI"
        );
        
        var $filterPropertiesTwo = array(
            "SHIRINA",
            "DIAMETR",
            "ET"
        );
        
        var $filterPropertiesOne = array(
            "SHIRINA",
            "VYSOTA",
            "DIAMETR"
        );
        
        public function GetVendors($iblockId)
        {
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "!PROPERTY_VENDOR" => false), array("PROPERTY_VENDOR"), false, array("PROPERTY_VENDOR"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_VENDOR_VALUE"];
            }
            return $res;
        }
        
        public function GetCars($iblockId, $vendor)
        {         
            if (empty($vendor)) {
                return false;
            }
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "PROPERTY_VENDOR" => $vendor, "!PROPERTY_CAR" => false), array("PROPERTY_CAR"), false, array("PROPERTY_CAR"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_CAR_VALUE"];
            }
            return $res;
        }       
        
        public function GetYears($iblockId, $vendor, $car)
        {
            if (empty($vendor) && empty($car)) {
                return false;
            }
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "PROPERTY_CAR" => $car, "PROPERTY_VENDOR" => $vendor, "!PROPERTY_YEAR" => false), array("PROPERTY_YEAR"), false, array("PROPERTY_CAR"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_YEAR_VALUE"];
            }
            return $res;
        }        
        
        public function GetModifications($iblockId, $vendor, $car, $year)
        {
            if (empty($vendor) && empty($car) && empty($year)) {
                return false;
            }
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "PROPERTY_CAR" => $car, "PROPERTY_VENDOR" => $vendor, "PROPERTY_YEAR" => $year, "!PROPERTY_MODIFICATION" => false), false, false, array("PROPERTY_MODIFICATION"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_MODIFICATION_VALUE"];
            }
            return $res;
        }
        
        public function GetData($iblockId, $vendor, $car, $year, $modification) {
            if (empty($vendor) && empty($car) && empty($year) && !empty($modification)) {
                return false;
            }
            $query = CIBlockElement::GetList(array(), array(
                "IBLOCK_ID" => $iblockId, 
                "PROPERTY_CAR" => $car, 
                "PROPERTY_VENDOR" => $vendor, 
                "PROPERTY_YEAR" => $year, 
                "PROPERTY_MODIFICATION" => $modification
            ));
            $res = array();
            while($result = $query->GetNextElement()) {
                $res[] = $result->GetFields();
                $res["PROPERTIES"] = $result->GetProperties();
            }
            
            return $res;
        }
        
        public function SetMultiplyProperty($values, $sefUrl) {
            $res = array();
            $values_ = explode('|', $values);
            for ($j=0; $j <= count($values_); $j++) {
                $values__ = explode('#', $values_[$j]);
                if (count($values__) >= 2) {
                    if (!empty($values__[0]) && !empty($values__[1])) {
                        $res["FRONT_AXLE"]["VALUE"] = $values__[0];
                        $res["REAR_AXLE"]["VALUE"] = $values__[1];
                        $res["FRONT_AXLE"]["URL"] = $this->GenerateUrl($values__[0], $sefUrl);
                        $res["REAR_AXLE"]["URL"] = $this->GenerateUrl($values__[1], $sefUrl);
                    }
                } else {
                    if (!empty($values_[$j])) {
                        $res["VALUES"][] = array(
                            "URL" => $this->GenerateUrl($values_[$j], $sefUrl),
                            "VALUE" => $values_[$j]   
                        );
                    }
                }
            }
            return $res;
        }
        
        public function GenerateUrl($value, $sefUrl) {
            $res = $sefUrl;
            preg_match("!(\d+)\/(\d+)\sR(\d+$)!", $value, $result);
            if (!empty($result)) {
                foreach($this->filterPropertiesOne as $i=>$property) {
                $xmlValue = $this->GetPropertyXmlValueByEnum($property, $result[$i+1]);
                    $res .= toLower(urlencode($property))."-is-".$xmlValue."/";
                }
            } else {
                preg_match("!(.+?)\sx\s(\d+)\sET(\d+)!", $value, $result);
                foreach($this->filterPropertiesTwo as $i=>$property) {
                $xmlValue = $this->GetPropertyXmlValueByEnum($property, $result[$i+1]);
                    $res .= toLower(urlencode($property))."-is-".$xmlValue."/";
                }
            }
            return $res;
        }
        
        public function GetPropertyXmlValueByEnum($property, $value) {
            $result = CIBlockPropertyEnum::GetList(Array(),  Array("IBLOCK_ID"=>IBLOCK_ID_CATALOG_OFFERS, "VALUE"=>$value, "CODE"=>$property))->Fetch();
            $res = $result["XML_ID"];
            return $res;
        }
        
    }