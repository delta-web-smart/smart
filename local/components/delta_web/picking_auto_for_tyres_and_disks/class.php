<?php
    
    class PickingAutoForTyresAndDisks {
        
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
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "PROPERTY_VENDOR" => $vendor, "!PROPERTY_CAR" => false), array("PROPERTY_CAR"), false, array("PROPERTY_CAR"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_CAR_VALUE"];
            }
            return $res;
        }       
        
        public function GetYears($iblockId, $vendor, $car)
        {
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "PROPERTY_CAR" => $car, "PROPERTY_VENDOR" => $vendor, "!PROPERTY_YEAR" => false), array("PROPERTY_YEAR"), false, array("PROPERTY_CAR"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_YEAR_VALUE"];
            }
            return $res;
        }        
        
        public function GetModifications($iblockId, $vendor, $car, $year)
        {
            $query = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $iblockId, "PROPERTY_CAR" => $car, "PROPERTY_VENDOR" => $vendor, "PROPERTY_YEAR" => $year, "!PROPERTY_MODIFICATION" => false), false, false, array("PROPERTY_MODIFICATION"));
            $res = array();
            while($result = $query->GetNext()) {
                $res[] = $result["PROPERTY_MODIFICATION_VALUE"];
            }
            return $res;
        }
        
    }