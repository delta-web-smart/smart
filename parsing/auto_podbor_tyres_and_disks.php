<?php
    
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule('iblock');
    
    class AutoPodborTyresAndDisks {
    
        const TABLE_NAME = "podbor_shini_i_diski";
        
        public function Parsing() {
            global $DB;
            $strSql = "SELECT * FROM ". self::TABLE_NAME;
            $query = $DB->Query($strSql, false, $err_mess.__LINE__);
            while ($result = $query->GetNext()) {
                var_dump($result["year"]); echo "<br/>";
            }
        }
        
    }
    
    $autoPodborTyresAndDisks = new AutoPodborTyresAndDisks();
    $autoPodborTyresAndDisks->Parsing();
    
    