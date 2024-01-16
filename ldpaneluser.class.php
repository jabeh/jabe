<?php            
$PageRequest = strtolower(basename( $_SERVER['REQUEST_URI'] ));
$PageName = strtolower(basename( __FILE__ ));
if($PageRequest == $PageName) exit("<strong> Erro: N&atilde;o &eacute; permitido acessar o arquivo diretamente. </strong>");
global $ldLeandroDaldegam, $ldLeandroDaldegamU;
if($ldLeandroDaldegam != "MuOnline"){
exit();}
if($ldLeandroDaldegamU != $_SERVER['HTTP_HOST'] && "www.".$ldLeandroDaldegamU != $_SERVER['HTTP_HOST']){
exit();}
if ( class_exists( "ldPanelUser" ) == false ) {
    new ldLanguage( str_replace(".class.", ".lang.", basename(__FILE__)), false );
	if($ldLeandroDaldegam == "MuOnline"){	
	if($ldLeandroDaldegamU != $_SERVER['HTTP_HOST'] && "www.".$ldLeandroDaldegamU != $_SERVER['HTTP_HOST']){exit();}
    class ldPanelUser extends ldMssql {
		public function __construct()
		{
            global $ldTpl, $PANELUSER_PREMISSIONS, $PAINEL_USER;
			if(isset($_SESSION['LOGIN']) == false)
				return $ldTpl->open("templates/".TEMPLATE_DIR."/loginerror.tpl.php");
			$this->setPermissions();
			
			switch(strtoupper($_GET['option']))
			{
				case "MODIFY_DATA":
					if($PANELUSER_PREMISSIONS['MODIFY_DATA'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("MODIFY_DATA") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsModifyData();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[MODIFY_DATA].tpl.php");	
					break;
				case "LOG_BUYS":
					if($PANELUSER_PREMISSIONS['LOG_BUYS'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("LOG_BUYS") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsLogBuys();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[LOG_BUYS].tpl.php");	
					break;
				case "MODIFY_PERSONALID":
					if($PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("MODIFY_PERSONALID") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsModifyPersonalID();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[MODIFY_PERSONALID].tpl.php");	
					break;   
                case "MASTER_RESET":
                    if($PANELUSER_PREMISSIONS['MASTER_RESET'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
                    if($this->checkPermissionModule("MASTER_RESET") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");    
                    $this->loadOptionsMasterReset();
                    $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[MASTER_RESET].tpl.php");    
                    break;
				case "CHANGE_NICK":
					if($PANELUSER_PREMISSIONS['CHANGE_NICK'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("CHANGE_NICK") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsChangeNick();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[CHANGE_NICK].tpl.php");	
					break;
				case "MANAGER_PHOTO":
					if($PANELUSER_PREMISSIONS['MANAGER_PHOTO'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("MANAGER_PHOTO") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsManagerPhoto();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[MANAGER_PHOTO].tpl.php");	
					break;
				case "BUY_VIPS":
					if($PANELUSER_PREMISSIONS['BUY_VIPS'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("BUY_VIPS") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsBuyVips();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[BUY_VIPS].tpl.php");	
					break;
				case "CONFIRM_PAYMENT":
					if($PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("CONFIRM_PAYMENT") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsConfirmPayment();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[CONFIRM_PAYMENT].tpl.php");	
					break;
				case "OPEN_COMPLAINTS":
					if($PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("OPEN_COMPLAINTS") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsOpenComplaints();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[OPEN_COMPLAINTS].tpl.php");	
					break;
				case "OPEN_TICKET":
					if($PANELUSER_PREMISSIONS['OPEN_TICKET'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("OPEN_TICKET") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsOpenTicket();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[OPEN_TICKET].tpl.php");	
					break;
				case "READ_TICKET":
					if($PANELUSER_PREMISSIONS['READ_TICKET'][0] == 0) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[DESACTIVE].tpl.php");
					if($this->checkPermissionModule("READ_TICKET") == false) return $ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[ACCESSDANIED].tpl.php");	
					$this->loadOptionsReadTicket();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser[READ_TICKET].tpl.php");	
					break;
				default:
					$this->loadOptionsDefault();
					$ldTpl->open("templates/".TEMPLATE_DIR."/paneluser.tpl.php");	
					break;
			}				
		}
		private function checkBanAccount()
		{
			$findAccountBanQ = $this->query("SELECT dateend FROM dbo.webBanneds WHERE name='". $_SESSION['LOGIN'] ."' AND type=1");
			$findAccountBan = mssql_fetch_object($findAccountBanQ);
			if(time() > $findAccountBan->dateend) 
			{
				$this->query("UPDATE ". DATABASE_ACCOUNTS .".dbo.MEMB_INFO SET bloc_code=0 WHERE memb___id='". $_SESSION['LOGIN'] ."'");
				$this->query("DELETE FROM dbo.webBanneds WHERE name = '". $_SESSION['LOGIN'] ."' AND type=1");	
			} 
			return $findAccountBan->dateend;
		}
		private function checkBanCharacter($name)
		{
			$findCharacterBanQ = $this->query("SELECT dateend FROM dbo.webBanneds WHERE name='". $name ."' AND type=2");
			$findCharacterBan = mssql_fetch_object($findCharacterBanQ);
			if(time() > $findCharacterBan->dateend) 
			{
				$this->query("UPDATE ". DATABASE_CHARACTERS .".dbo.Character SET CtlCode=0 WHERE Name='". $name ."'");
				$this->query("DELETE FROM dbo.webBanneds WHERE name = '". $name ."' AND type=2");	
			} 
			return $findCharacterBan->dateend;
		}
		private function checkPermissionModule($module)
		{
			global $PANELUSER_PREMISSIONS, $TABLES_CONFIGS;
			$findAccountVipQ = $this->query("SELECT ".$TABLES_CONFIGS['WEBVIPS']['columnType']." as type FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'");
			$findAccountVip = mssql_fetch_object($findAccountVipQ);			
			if($PANELUSER_PREMISSIONS[$module][(int)$findAccountVip->type + 1] == 1) return true;
			else return false;
		}
        public function writeLog($type, $account, $character, $extraText)
        {
            global $PANELUSER_MODULE;
            if($PANELUSER_MODULE['LOG']['Active'] == false) return;
            
            switch($type)
            {
                case 1: 
                    $args = array("MODIFY_DATA", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_MODIFY_DATA." [{$extraText}]\n");
                    break;
                case 2: 
                    $args = array("CLEAN_VAULT", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_CLEAN_VAULT." [{$extraText}]\n");
                    break;
                case 3: 
                    $args = array("DOUBLE_VAULT", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_DOUBLE_VAULT." [{$extraText}]\n");
                    break;
                case 4: 
                    $args = array("MODIFY_PERSONALID", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_MODIFY_PERSONALID." [{$extraText}]\n");
                    break;
                case 5: 
                    $args = array("RESET", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_RESET." [{$extraText}]\n");
                    break;
                case 6: 
                    $args = array("MASTER_RESET", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_MASTER_RESET." [{$extraText}]\n");
                    break;
                case 7: 
                    $args = array("RESET_TRANSFER", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_RESET_TRANSFER." [{$extraText}]\n");
                    break;
                case 8: 
                    $args = array("CLEAN_PK", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_CLEAN_PK." [{$extraText}]\n");
                    break;
                case 9: 
                    $args = array("DISTRIBUTE_POINTS", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_DISTRIBUTE_POINTS." [{$extraText}]\n");
                    break;
                case 10: 
                    $args = array("MOVE_CHARACTER", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_MOVE_CHARACTER." [{$extraText}]\n");
                    break;
                case 11: 
                    $args = array("CHANGE_NICK", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_CHANGE_NICK." [{$extraText}]\n");
                    break;
                case 12: 
                    $args = array("CHANGE_CLASS", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_CHANGE_CLASS." [{$extraText}]\n");
                    break;
                case 13: 
                    $args = array("REDISTRIBUTE_POINTS", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_REDISTRIBUTE_POINTS." [{$extraText}]\n");
                    break;
                case 14: 
                    $args = array("CLEAN_INVENTORY", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_CLEAN_INVENTORY." [{$extraText}]\n");
                    break;
                case 15: 
                    $args = array("SEND_SMS", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_SEND_SMS." [{$extraText}]\n");
                    break;
                case 16: 
                    $args = array("GAME_DISCONNECT", "[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_GAME_DISCONNECT." [{$extraText}]\n");
                    break;
                case 17: 
                    $args = array("TRANSFER_CASH", "[".date("d/m/Y \a\s G:i:s")."][{$account}] ".LDPU_LOG_TXT_TRANSFER_CASH." [{$extraText}]\n");
                    break;
                case 18: 
                    $args = array("COLLECTOR_POINTS", "[".date("d/m/Y \a\s G:i:s")."][{$account}] ".LDPU_LOG_TXT_COLLECTOR_POINTS." [{$extraText}]\n");
                    break;
                default: $args = array("error", sprintf("[".date("d/m/Y \a\s G:i:s")."][{$account} | {$character}] ".LDPU_LOG_TXT_NOT_FOUND." [{$extraText}]\n", $type));
            }
            $handle = fopen($PANELUSER_MODULE['LOG']['DirLog']."/[".date("d-m-Y")."][".$args[0]."].log", "a");
            fwrite($handle, $args[1]);
            fclose($handle);  
        }
		public function classNameDefine($numberClass)
		{
			global $CLASS_CHARACTERS;
			switch($numberClass) {
				case $CLASS_CHARACTERS['CLASSCODES']['DW'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DW'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['SM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['SM'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['GM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['GM'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['DK'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DK'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['BK'][0] : return $CLASS_CHARACTERS['CLASSCODES']['BK'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['BM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['BM'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['FE'][0] : return $CLASS_CHARACTERS['CLASSCODES']['FE'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['ME'][0] : return $CLASS_CHARACTERS['CLASSCODES']['ME'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['HE'][0] : return $CLASS_CHARACTERS['CLASSCODES']['HE'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['MG'][0] : return $CLASS_CHARACTERS['CLASSCODES']['MG'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['DMM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DMM'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['DL'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DL'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['LE'][0] : return $CLASS_CHARACTERS['CLASSCODES']['LE'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['SU'][0] : return $CLASS_CHARACTERS['CLASSCODES']['SU'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['BS'][0] : return $CLASS_CHARACTERS['CLASSCODES']['BS'][1]; break;
                case $CLASS_CHARACTERS['CLASSCODES']['DMS'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DMS'][1]; break;
                case $CLASS_CHARACTERS['CLASSCODES']['RF'][0] : return $CLASS_CHARACTERS['CLASSCODES']['RF'][1]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['FM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['FM'][1]; break;
			}
		}
		public function resetClassCode($class)
		{
			global $CLASS_CHARACTERS;
			switch($class)
			{
				case $CLASS_CHARACTERS['CLASSCODES']['DW'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DW'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['SM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DW'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['GM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DW'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['DK'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DK'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['BK'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DK'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['BM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DK'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['FE'][0] : return $CLASS_CHARACTERS['CLASSCODES']['FE'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['ME'][0] : return $CLASS_CHARACTERS['CLASSCODES']['FE'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['HE'][0] : return $CLASS_CHARACTERS['CLASSCODES']['FE'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['MG'][0] : return $CLASS_CHARACTERS['CLASSCODES']['MG'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['DMM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['MG'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['DL'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DL'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['LE'][0] : return $CLASS_CHARACTERS['CLASSCODES']['DL'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['SU'][0] : return $CLASS_CHARACTERS['CLASSCODES']['SU'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['BS'][0] : return $CLASS_CHARACTERS['CLASSCODES']['SU'][0]; break;
                case $CLASS_CHARACTERS['CLASSCODES']['DMM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['SU'][0]; break;
                case $CLASS_CHARACTERS['CLASSCODES']['RF'][0] : return $CLASS_CHARACTERS['CLASSCODES']['RF'][0]; break;
				case $CLASS_CHARACTERS['CLASSCODES']['FM'][0] : return $CLASS_CHARACTERS['CLASSCODES']['RF'][0]; break;
			}
		}
		public function checkOnlineAccount($account)
		{
			$findAccountOnlineQ = $this->query("SELECT ConnectStat FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_STAT WHERE memb___id='". $account ."'");
			$findAccountOnlineQ = mssql_fetch_object($findAccountOnlineQ);
			return $findAccountOnlineQ->ConnectStat;
		}
		private function loadOptionsDefault()
		{
			global $ldTpl, $TABLES_CONFIGS, $PANELUSER_MODULE, $PAINEL_USER, $PATENTES;
			$findAccountBanQ = $this->query("SELECT bloc_code, hashActivate FROM ". DATABASE_ACCOUNTS .".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'");
			$findAccountBan = mssql_fetch_object($findAccountBanQ);   
            if($findAccountBan->bloc_code == 1 && $findAccountBan->hashActivate == null)
            {
                $timestamp = $this->checkBanAccount();
                $tempBanTpl = sprintf("<div class='qdestaques'>".LDPU_OPTIONS_DEFAULT_BANNED_ACCOUNT."</div>", date("d/m/Y g:i a",$timestamp));
            }
            elseif($findAccountBan->hashActivate != null)
            {
                $tempBanTpl = sprintf("<div class='qdestaques'>".LDPU_OPTIONS_DEFAULT_NOT_ACTIVE_ACCOUNT."</div>", $_SESSION['LOGIN']);
            }
			$ldTpl->set("BAN_ACCOUNT_DATAILS", $tempBanTpl);
			
			$findAccountVipQ = $this->query("
			SELECT ".$TABLES_CONFIGS['WEBVIPS']['columnType']." as type, 
			DATEPART(yy,".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip'].") as ano,
			DATEPART(mm,".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip'].") as mes,
			DATEPART(d,".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip'].") as dia			
			from ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'
			");
			$findAccountVip = mssql_fetch_object($findAccountVipQ);
			if($findAccountVip->dia < 10)
			{
				$diaVipPainel = "0".$findAccountVip->dia;
			}
			else
			{
				$diaVipPainel = $findAccountVip->dia;
			}
			
			if($findAccountVip->mes < 10)
			{
				$mesVipPainel = "0".$findAccountVip->mes;
			}
			else
			{
				$mesVipPainel = $findAccountVip->mes;
			}
			

			$vipPainel .= 
            $ldTpl->set("ACCOUNT_PLAN_DATAILS", $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][ $findAccountVip->type ] . ($findAccountVip->type > 0  ? " até: 
			".$diaVipPainel."/".$mesVipPainel."/".$findAccountVip->ano : NULL ));
			//$ldTpl->set("ACCOUNT_PLAN_DATAILS", ($findAccountVip->type == 0 ? $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][0] : ($findAccountVip->type == 1 ? $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][1].", ".LDPU_OPTIONS_DEFAULT_FLAT_EXPIRE.": ".date("d/m/Y g:i a",$findAccountVip->dateend) : ($findAccountVip->type == 2 ? $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][2].", ".LDPU_OPTIONS_DEFAULT_FLAT_EXPIRE.": ".date("d/m/Y g:i a",$findAccountVip->dateend) : LDPU_OPTIONS_DEFAULT_FLAT_ERROR))));
			
			for($i=1;$i <= count($PAINEL_USER['moeda']); $i++){
				if($i == 1){
				$buscaSqlMoedas .= $PAINEL_USER['moeda'][$i]['coluna'];	
				}
				else{
				$buscaSqlMoedas .= "," . $PAINEL_USER['moeda'][$i]['coluna'];}
			}
			$findAccountCashQ = $this->query("SELECT ".$buscaSqlMoedas." FROM ".DATABASE_CHARACTERS.".dbo.".MOEDA_TABELA." WHERE ".MOEDA_COLUNA_LOGIN."='". $_SESSION['LOGIN'] ."'");
            $findAccountCash = mssql_fetch_object($findAccountCashQ);
			for($i=1;$i <= count($PAINEL_USER['moeda']); $i++){
			$moedasInfoPainel .=  "<em>Saldo de ".$PAINEL_USER['moeda'][$i]['nome'].":</em> <strong>".$findAccountCash->$PAINEL_USER['moeda'][$i]['coluna']."</strong><br />";}
			unset($i);
            $ldTpl->set("ACCOUNT_CASH", $moedasInfoPainel);
			
			if($PAINEL_USER['bancojoias']['active'] == true){
				for($i=1;$i <= count($PAINEL_USER['bancojoias']['joias']); $i++){
					if($i == 1){
					$buscaSqlJoias .= $PAINEL_USER['bancojoias']['joias'][$i]['coluna'];	
					}
					else{
					$buscaSqlJoias .= "," . $PAINEL_USER['bancojoias']['joias'][$i]['coluna'];}
				}
				unset($i);
				$findAccountBancoJoiasQ = $this->query("SELECT ".$buscaSqlJoias." FROM ".DATABASE_CHARACTERS.".dbo.".$PAINEL_USER['bancojoias']['tabela']." WHERE ".$PAINEL_USER['bancojoias']['account']."='". $_SESSION['LOGIN'] ."'");
				$findAccountBancoJoias = mssql_fetch_object($findAccountBancoJoiasQ);
				for($i=1;$i <= count($PAINEL_USER['bancojoias']['joias']); $i++){
					$totalJoia = $findAccountBancoJoias->$PAINEL_USER['bancojoias']['joias'][$i]['coluna'];
					if($totalJoia < 1){
					$joiasInfoPainel .=  "<em>Saldo de ".$PAINEL_USER['bancojoias']['joias'][$i]['nome'].": </em> <style=\"color:#999\">0 joia";}
					else{
					$joiasInfoPainel .=  "<em>Saldo de ".$PAINEL_USER['bancojoias']['joias'][$i]['nome'].": </em> <style=\"color:#999\">".$findAccountBancoJoias->$PAINEL_USER['bancojoias']['joias'][$i]['coluna']." joia";}
				if($findAccountBancoJoias->$PAINEL_USER['bancojoias']['joias'][$i]['coluna'] > 1)
				{
				$joiasInfoPainel .= "s";}
				
				$joiasInfoPainel .= "</style><br />";
				if($i != count($PAINEL_USER['bancojoias']['joias'])){
					$joiasInfoPainel.="<br />";
				}}
				$ldTpl->set("ACCOUNT_BANCO", $joiasInfoPainel);
			}
			
			
			
			
		
			$findLastConnectionQ = $this->query("SELECT ConnectTM,IP,ServerName FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_STAT WHERE memb___id='". $_SESSION['LOGIN'] ."'");
			$findLastConnection = mssql_fetch_object($findLastConnectionQ);
			$ldTpl->set("LAST_CONNECTION_DETAILS", $findLastConnection->ConnectTM." ".LDPU_OPTIONS_DEFAULT_LAST_CONNECTION." ". $findLastConnection->ServerName );
			$ldTpl->set("LAST_CONNECTION_DETAILS_IP", $findLastConnection->IP );
			
				for($i=1;$i <= count($PAINEL_USER['char']);$i++){
				$dadosChars .= "," . $PAINEL_USER['char'][$i]['coluna'];
				}
				unset($i);
			$findLastCharsQ = $this->query("SELECT Name,Class,CtlCode". $dadosChars ." FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."'");
			if(mssql_num_rows($findLastCharsQ) == 0) $ldTpl->set("CHARACTER_DETAILS","<tr><td colspan='4' align='center'>".LDPU_OPTIONS_DEFAULT_YOU_NOT_HAVE_CHARACTERS."</td></tr>");
			else
			{

				
				
				$tmpChars .= "<div align='center'><strong>Status dos meus personagens</strong>
							<table border='0' width='100%'><tr><center><td><strong><em>Personagem</em></strong></td>
                            <td><strong><em>Classe</em></strong></td>";
							
				if($PATENTES['active'] == true && $PATENTES['painelusuario'] == true){
				$tmpChars .= "<td><strong><em>Patente</em></strong></td>";					
				}			
				
					for($i=1;$i <= count($PAINEL_USER['char']);$i++){
					$tmpChars .= '<td><strong><em>' . $PAINEL_USER['char'][$i]['nome'] . '</em></strong></td>';
					}
					unset($i);
				$tmpChars .= '</center></tr><center>';
				while($findLastChars = mssql_fetch_row($findLastCharsQ))
				{
					$tmpChars .= "<tr><td>". $findLastChars[0] ."</td><td>". $this->classNameDefine($findLastChars[1]) ."</td>";
					
						if($PATENTES['active'] == true && $PATENTES['painelusuario'] == true){
								$checkPatenteQ = $this->query("SELECT ".$PATENTES['colunaptt']." as ptt FROM dbo.".$PATENTES['tabela']." WHERE ".$PATENTES['colunaname']." = '".$findLastChars[0]."'");
								$checkPatente = mssql_fetch_object($checkPatenteQ);
								$tmpChars .= "<td>";
											for($i=0;$i < count($PATENTES['nome']);$i++){
												if($i == 0 && $checkPatente->ptt <= $PATENTES['limite'][$i])
												{
												$tmpChars .= $PATENTES['nome'][$i];
												
												$i = count($PATENTES['nome']);
												}
												elseif ($i == (count($PATENTES['nome'])-1)){
													$tmpChars .= $PATENTES['nome'][$i];
												}
												else {
														$anterior = ($i - 1);
														if($checkPatente->ptt > $PATENTES['limite'][$anterior] && $checkPatente->ptt <= $PATENTES['limite'][$i]){
														$tmpChars .= $PATENTES['nome'][$i];
														$i = count($PATENTES['nome']);
														}
												}
											}	
								$tmpChars .= "</td>";					
						}		
				
					for($i=3;$i <= count($PAINEL_USER['char'])+2;$i++){
					$tmpChars .= "<td>". $findLastChars[$i] ."</td>";}
					unset($i);
					
					
					$tmpChars .= "</tr>";
					
					if($findLastChars[2] == 1) $tmpBanChars .= sprintf("<div class='qdestaques'>".LDPU_OPTIONS_DEFAULT_BANNED_CHARACTER."</div>", $findLastChars[0], date("d/m/Y g:i a",$this->checkBanCharacter($findLastChars[0])));
				}
					$tmpChars .= "</center></table></div>";
				$ldTpl->set("CHARACTER_DETAILS", $tmpChars);
			}
			$ldTpl->set("BAN_CHARACTERS_DETAILS", $tmpBanChars);
		}
		private function loadOptionsModifyData()
		{
			global $ldTpl;									
			switch($_GET['Write'])
			{
				case 1:
					if(empty($_POST['userName']) == true) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_FILL_NAME."</div>";
					elseif(empty($_POST['userTel']) == true) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_FILL_PHONE."</div>";
					elseif(strlen($_POST['userName']) > 10) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_INVALID_SIZE_NAME."</div>";
					elseif(strlen($_POST['userTel']) > 15) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_INVALID_SIZE_PHONE."</div>";
					else {
						if($this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO SET memb_name = '". $_POST['userName'] ."', tel__numb = '". $_POST['userTel'] ."' WHERE memb___id='". $_SESSION['LOGIN'] ."'"))
						{
                        	$tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_SUCCESS_ALTER."</div>";
                            $this->writeLog(1, $_SESSION['LOGIN'], "", "");
                        }
						else
							$tempRepost .= "<div class='qdestaques'>".LDPU_MODIFY_DATA_ERROR_ALTER."</div>";
					}
					break;
				case 2:
					$Search_data_q = $this->query("SELECT fpas_answ FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'");
					$Search_data_q = mssql_fetch_object($Search_data_q);
					$checkPwdQ = $this->query('exec dbo.webVerifyLogin "'. $_SESSION['LOGIN'] .'","'. $_POST['userPwd'] .'","'. USE_MD5 .'"');
					$checkPwd = mssql_fetch_row($checkPwdQ);
					if(empty($_POST['userPwd']) == true) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_FILL_PASSWORD."</div>";
					elseif(empty($_POST['userPwdNew']) == true || empty($_POST['userPwdNewRe']) == true) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_FILL_NEW_PASSWORD."</div>";
					elseif(empty($_POST['userAnswer']) == true) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_FILL_SECRET_ANSWER."</div>";
					elseif(strlen($_POST['userPwdNew']) > 10 || strlen($_POST['userPwdNewRe']) > 10) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_INVALID_SIZE_PASSWORD."</div>";
					elseif($_POST['userPwdNew'] <> $_POST['userPwdNewRe']) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_PASSWORDS_MUST_BE_IDENTICAL."</div>";
					elseif($_POST['userAnswer'] <> $Search_data_q->fpas_answ) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_INVALID_SECRET_ANSWER."</div>";
					elseif($checkPwd[0] == 0) $tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_INVALID_PASSWORD."</div>";
					else {
						if(USE_MD5 == false) $result = $this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO SET memb__pwd = '". $_POST['userPwdNew'] ."' WHERE memb___id='". $_SESSION['LOGIN'] ."'");
						if(USE_MD5 == true) $result = $this->query("exec dbo.webPwdHashWrite '". $_SESSION['LOGIN'] ."', '". $_POST['userPwdNew'] ."'");
						if($result)
                        {
							$tempRepost .= "<div class='qdestaques2'>".LDPU_MODIFY_DATA_SUCCESS_ALTER."</div>";
                            $this->writeLog(1, $_SESSION['LOGIN'], "", LDPU_MODIFY_DATA_LOG_PASSWORD_ALTER);
                        }
						else
							$tempRepost .= "<div class='qdestaques'>".LDPU_MODIFY_DATA_ERROR_ALTER.".</div>";
					}
					break;
			}
			$ldTpl->set("RespostWrite", $tempRepost);
			
			$SQL_Q = $this->query("SELECT tel__numb,mail_addr,fpas_ques FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'");
			$SQL = mssql_fetch_object($SQL_Q);
			$ldTpl->set("TEL__NUMB", $SQL->tel__numb);
			$ldTpl->set("MAIL_ADDR", $SQL->mail_addr);
			$ldTpl->set("USER_FQUEST", $SQL->fpas_ques);
		}	

        private function createHashSerial() 
        { 
            return strtoupper(substr(md5(rand(0,10000)),0,4)); 
        }
        private function checkExistHash()
        {                                 
            $checkExistsQ = $this->query("SELECT 1 FROM [dbo].[webGoldenArcher] WHERE [pserial1] = '". $this->SerialPart1 ."' AND [pserial2] = '". $this->SerialPart2 ."' AND [pserial3] = '". $this->SerialPart3 ."'");
            return mssql_num_rows($checkExistsQ);
        }
        private function createSerial() 
        {
            $cond = 1; 
            while($cond <> 0) 
            {             
                $this->SerialPart1 = $this->createHashSerial(); 
                                                                 
                $this->SerialPart2 = $this->createHashSerial();
                                                                 
                $this->SerialPart3 = $this->createHashSerial(); 
                
                $cond = $this->checkExistHash();
            }
            return array($this->SerialPart1, $this->SerialPart2, $this->SerialPart3);
        }
        private function loadOptionsGoldenArcher()
        {
            if($_GET['action'] == "check")
            {
                try
                {
                    if($this->checkOnlineAccount($_SESSION['LOGIN']) == 1)
                        throw new Exception(LDPU_YOU_MUST_BE_OFFLINE, 1);
                    
                    if(empty($_GET['serial']) == true)
                        throw new Exception(LDPU_GOLDEN_ARCHER_FILL_SERIAL, 1);
                    
                    $this->serial = $_GET['serial'];
                    $this->serial = str_replace("-", "", $this->serial);
                    if(strlen($this->serial) != 12)
                        throw new Exception(LDPU_GOLDEN_ARCHER_INVALID_SERIAL, 1);
                    
                    $this->serial = array( substr($this->serial, 0, 4),  substr($this->serial, 4, 4),  substr($this->serial, 8, 4) );
                    
                    $itemSerial = $this->query("SELECT [id],[username],[status],[itemCategorie],[itemIndex],[itemLevel],[itemOption],[itemSkill],[itemLuck],[excellent1],[excellent2],[excellent3],[excellent4],[excellent5],[excellent6],[ancient],[refine],[harmonyType],[harmonyLevel],[socketOp1],[socketOp2],[socketOp3],[socketOp4],[socketOp5] FROM [dbo].[webGoldenArcher] WHERE [pserial1] = '".$this->serial[0]."' AND [pserial2] = '".$this->serial[1]."' AND [pserial3] = '".$this->serial[2]."'");
                    if(mssql_num_rows($itemSerial) == 0)
                        throw new Exception(LDPU_GOLDEN_ARCHER_INVALID_SERIAL, 1);
                    
                    $itemSerial = mssql_fetch_object($itemSerial);
                    if($itemSerial->username != $_SESSION['LOGIN'])
                        throw new Exception(LDPU_GOLDEN_ARCHER_SERIAL_NOT_BELONG, 1);
                    
                    if($itemSerial->status == 1)
                        throw new Exception(LDPU_GOLDEN_ARCHER_SERIAL_IS_ACTIVE, 1);
                    
                    require_once("ldItemClass/ldItemDatabase.class.php");
                    require_once("ldItemClass/ldItemMake.class.php");
                    require_once("ldItemClass/ldItemParse.class.php");  
                    require_once("ldItemClass/ldVault.class.php");

                    // Gerar / Carregar banco de dados
                    ldItemDatabase::setDatabases("modules/", "item.txt", "classes/ldItemClass/data/item.serialize.txt");
                    if(ldItemDatabase::checkDatabaseExists() == false)
                    {
                        ldItemDatabase::createDatabase();   
                    }
                    if(ldItemDatabase::checkDatabaseExists() == false)
                    {
                        exit(LDPU_VIRTUAL_VAULT_CANT_LOAD_DB);   
                    }
                    
                    if(isset(ldItemDatabase::$dbItem[ $itemSerial->itemCategorie ][ $itemSerial->itemIndex ]) == false)
                        throw new Exception(LDPU_GOLDEN_ARCHER_ITEM_NOT_EXISTS, 1);
                    
                    $dbVersion = $this->query("SELECT [DbVersion] FROM [".DATABASE_CHARACTERS."].[dbo].[warehouse] WHERE [AccountId] = '". $_SESSION['LOGIN'] ."'");
                    if(mssql_num_rows($dbVersion) == 0)
                        throw new Exception(LDPU_GOLDEN_ARCHER_ACCOUNT_NOT_VAULT, 1);
                    $dbVersion = mssql_fetch_object($dbVersion)->DbVersion;
                    
                    $HexItem = NULL;
                    $optionsItem = array("Level" => $itemSerial->itemLevel, "Option" => $itemSerial->itemOption, "Skill" => $itemSerial->itemSkill, "Luck" => $itemSerial->itemLuck, "Serial" => true, "Excellent" => array($itemSerial->excellent1, $itemSerial->excellent2, $itemSerial->excellent3, $itemSerial->excellent4, $itemSerial->excellent5, $itemSerial->excellent6), "Ancient" => $itemSerial->ancient, "Refine" => $itemSerial->refine, "HarmonyType" => $itemSerial->harmonyType, "HarmonyLevel" => $itemSerial->harmonyLevel, "SocketOption" => array($itemSerial->socketOp1, $itemSerial->socketOp2, $itemSerial->socketOp3, $itemSerial->socketOp4, $itemSerial->socketOp5));
                    if(ldItemMake::makeHexItem($HexItem, $itemSerial->itemIndex, $itemSerial->itemCategorie, $dbVersion, $optionsItem) == true)
                    {
                        $ldVault = new ldVault($_SESSION['LOGIN'], $dbVersion);
                        $ldVault->getVault();   
                        $ldVault->cutCode();  
                        $ldVault->structureVault(); 

                        ldItemParse::parseHexItem($HexItem, $dbVersion);
                        $slot = $ldVault->searchSlotsInVault(ldItemParse::$dumpTemp['Item']['X'], ldItemParse::$dumpTemp['Item']['Y']);
                        if($slot != -1)
                            $ldVault->insertItemInSlot($HexItem, $slot);
                        else
                            throw new Exception(LDPU_GOLDEN_ARCHER_VAULT_NOT_SPACE, 1);
                            
                        $ldVault->structureVault();
                        $ldVault->writeVault(true);
                        unset($ldVault);
                    } 
                    else 
                        throw new Exception(LDPU_GOLDEN_ARCHER_ERROR_MAKE_ITEM, 1);
                        
                    unset($HexItem);
                    
                    $updateStatus = $this->query("UPDATE [dbo].[webGoldenArcher] SET [status] = 1 WHERE [id] = '".$itemSerial->id."'");
                    
                    throw new Exception(ldItemDatabase::$dbItem[ $itemSerial->itemCategorie ][ $itemSerial->itemIndex ]["Name"], 0);
                }
                catch(Exception $e)
                {
                    switch($e->getCode())
                    {
                        case 1: echo "<p class=\"white\">".$e->getMessage()."</p>"; break;
                        case 0: echo "<p class=\"yellow\">".LDPU_GOLDEN_ARCHER_REGISTER_SUCCESS."</p><p class=\"yellow\">".LDPU_GOLDEN_ARCHER_ITEM_RECEIVER.": ".$e->getMessage()."</p>"; break;
                    }
                }
                exit();
            }
        } 
        private function loadOptionsCollectorPoints()
        {
            global $ldTpl, $PANELUSER_MODULE, $TABLES_CONFIGS;
            $responseWrite = NULL;
            
            require_once("ldItemClass/ldItemDatabase.class.php");
            require_once("ldItemClass/ldItemOptionsDatabase.class.php");
            require_once("ldItemClass/ldItemMake.class.php");
            require_once("ldItemClass/ldItemParse.class.php");     
            require_once("ldItemClass/ldVault.class.php");
            require_once("ldItemClass/ldInventory.class.php");
            ldItemDatabase::setDatabases("modules/", "item.txt", "classes/ldItemClass/data/item.serialize.txt");
            if(ldItemDatabase::checkDatabaseExists() == false)
            {
                ldItemDatabase::createDatabase();   
            }
            if(ldItemDatabase::checkDatabaseExists() == false)
            {
                exit(LDPU_VIRTUAL_VAULT_CANT_LOAD_DB);   
            } 
            
            $ldTpl->set("POINTS_PER_ITEM", $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['premiumInPoints'] );
            $ldTpl->set("ITEM_NAME", ldItemDatabase::$dbItem[ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idCategorie'] ][ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idItem'] ]["Name"] );
            
            if($_GET['action'] == "collect")
            {
                if($this->checkOnlineAccount($_SESSION['LOGIN']) == 1)
                { 
                    $responseWrite = "<div class='qdestaques2'>".LDPU_YOU_MUST_BE_OFFLINE."</div>";
                    return false;
                }
                        
                $itemsCollects = 0;
                $this->ldVault = new ldVault($_SESSION['LOGIN']);
                $this->ldVault->getVault();   
                $this->ldVault->cutCode();  
                $this->ldVault->structureVault();
                for($i = 0; $i < 120; $i++)
                {
                    $shortcut = $this->ldVault->codeGroup[$i];
                    if($shortcut['Details']['IsItem'] == false) continue;
                    
                    if($shortcut['Details']['ItemIdIndex'] == $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idItem'] && $shortcut['Details']["ItemIdSection"] == $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idCategorie'])
                    {
                        $itemsCollects++;
                        $this->ldVault->insertItemInSlot( ($this->ldVault->dbVersion > 2 ? str_repeat("F", 32) : str_repeat("F", 20)) , $i);
                    }
                }
                if($itemsCollects > 0)
                {
                    $pointsToAdd = $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['premiumInPoints'] * $itemsCollects;
                            
                    $this->query("UPDATE ".$TABLES_CONFIGS['WEBCASH']['database'].".dbo.".$TABLES_CONFIGS['WEBCASH']['table']." SET ".$TABLES_CONFIGS['WEBCASH']['columnPoints']."=".$TABLES_CONFIGS['WEBCASH']['columnPoints']."+". $pointsToAdd ." WHERE ".$TABLES_CONFIGS['WEBCASH']['columnUsername']."='". $_SESSION['LOGIN'] ."'");
                            
                    $this->ldVault->writeVault(true);
                    
                    $responseWrite = sprintf("<div class=\"qdestaques2\">".LDPU_COLLECTOR_POINTS_SUCCESS."</div>", $itemsCollects, ldItemDatabase::$dbItem[ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idCategorie'] ][ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idItem'] ]["Name"], $pointsToAdd); 
                    
                    $this->writeLog(18, $_SESSION['LOGIN'], "", sprintf(LDPU_COLLECTOR_POINTS_SUCCESS_LOG, $itemsCollects, ldItemDatabase::$dbItem[ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idCategorie'] ][ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idItem'] ]["Name"], $pointsToAdd));
                }
                else
                {
                    $responseWrite = sprintf("<div class=\"qdestaques\">".LDPU_COLLECTOR_POINTS_ERROR."</div>", ldItemDatabase::$dbItem[ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idCategorie'] ][ $PANELUSER_MODULE['COLLECTOR_POINTS']['REQUIRE']['idItem'] ]["Name"]);
                }
                
            }
            
            $ldTpl->set("RESPONSE_WRITE", $responseWrite );
        }



   

		private function loadOptionsLogBuys()
		{
			global $ldTpl, $PANELUSER_MODULE;
			switch($_GET['Write'])
			{
				case 1:
					$findLogQ = $this->query("SELECT * FROM dbo.webLogBuyCash WHERE username='". $_SESSION['LOGIN'] ."'");
					while($findLog = mssql_fetch_object($findLogQ))
					{
						$tempRepost .= "<div class=\"quadros\"><em>".LDPU_LOG_BUY_TEXT_ID.":</em> <strong>".$findLog->id."</strong><br /><em>".LDPU_LOG_BUY_TEXT_AMOUNT.":</em> <strong>".$findLog->cash."</strong><br /><em>".LDPU_LOG_BUY_TEXT_DATE.":</em> <strong>".$findLog->data."</strong><br /><em>".LDPU_LOG_BUY_TEXT_HOUR.":</em> <strong>".$findLog->hora."</strong><br /><em>".LDPU_LOG_BUY_TEXT_COMMENT.":</em> <strong>".nl2br(base64_decode($findLog->comentario))."</strong><br /><em>".LDPU_LOG_BUY_TEXT_COMMENT_ADM.":</em> <strong>".nl2br(base64_decode($findLog->comentario_adm))."</strong><br /><em>".LDPU_LOG_BUY_TEXT_STATUS.":</em> <strong>". ($findLog->status == 0 ? LDPU_LOG_BUY_TEXT_IN_PROGRESS : ($findLog->status == 1 ? LDPU_LOG_BUY_TEXT_COMPLETED : ($findLog->status == 0 ? LDPU_LOG_BUY_TEXT_REJECTED : LDPU_LOG_BUY_TEXT_STATUS_ERROR))) ."</strong><br /></div>";
					}
					break;
				case 2:
					$findLogQ = $this->query("SELECT * FROM dbo.webLogBuyVips WHERE username='". $_SESSION['LOGIN'] ."'");
					while($findLog = mssql_fetch_object($findLogQ))
					{
						$tempRepost .= "<div class=\"quadros\"><em>".LDPU_LOG_BUY_TEXT_ID.":</em> <strong>".$findLog->id."</strong><br /><em>".LDPU_LOG_BUY_TEXT_TYPE.":</em> <strong>". ($PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][$findLog->type])."</strong><br /><em>".LDPU_LOG_BUY_TEXT_DAYS.":</em> <strong>".$findLog->days."</strong><br /><em>".LDPU_LOG_BUY_TEXT_VALUE_BY.":</em> <strong>".$findLog->cashAmount."</strong><br /><em>".LDPU_LOG_BUY_TEXT_DATE.":</em> <strong>". date("d/m/Y g:i a",$findLog->date) ."</strong><br /></div>";
					}
					break;
			}			
			$ldTpl->set("RespostWrite", $tempRepost);
		}
		private function loadOptionsModifyPersonalID()
		{
			global $ldTpl;
			if($_GET['Write'] == true)
			{
				$checkPwdQ = $this->query('exec dbo.webVerifyLogin "'. $_SESSION['LOGIN'] .'","'. $_POST['pwd'] .'","'. USE_MD5 .'"');
				$checkPwd = mssql_fetch_row($checkPwdQ);
				if(is_numeric($_POST['pid']) == false) $tempRepost .= "<div class='qdestaques'><strong style='color:red;'>".LDPU_MODIFY_PID_FILL_ONLY_NUMBERS."</strong></div>";
				elseif(strlen($_POST['pid']) != 7) $tempRepost .= "<div class='qdestaques'><strong style='color:red;'>".LDPU_MODIFY_PID_INVALID_SIZE."</strong></div>";
				elseif($checkPwd[0] == 0) $tempRepost .= "<div class='qdestaques'><strong style='color:red;'>".LDPU_MODIFY_PID_INVALID_PASSWORD."</strong></div>";
				else {
                    $this->writeLog(4, $_SESSION['LOGIN'], "", ""); 
					$this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO SET sno__numb = 111111".$_POST['pid']." WHERE memb___id='".$_SESSION['LOGIN']."'");
					$tempRepost .= "<div class='quadros'><strong style='color:blue;'>".LDPU_MODIFY_PID_SUCCESS."</strong></div>";		
				}
			}
			$ldTpl->set("RespostWrite", $tempRepost);
		}  

        private function loadOptionsMasterReset()
        {
            global $ldTpl, $PANELUSER_MODULE, $TABLES_CONFIGS, $CLASS_CHARACTERS; 
            $findCharactersQ = $this->query("SELECT Name FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."'");
            while($findCharacters = mssql_fetch_object($findCharactersQ)){
                $tempOption .= "<option value=\"".urlencode($findCharacters->Name)."\">". $findCharacters->Name ."</option>";
            }
            $ldTpl->set("CHARACTER_LIST_TAG_OPTION", $tempOption); 
            unset($tempOption);
            
            if(empty($_GET['character']) == false)
            {
                $findCharactersQ = $this->query("SELECT ".COLUMN_RESETS.", Class, Money, cLevel, ".COLUMN_MASTER_RESETS.", Strength, Dexterity, Energy, Vitality, LeaderShip  FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."' AND Name='". $_GET['character'] ."'");
                if($this->checkOnlineAccount($_SESSION['LOGIN']) == 1) $tempRepost .= "<div class='qdestaques2'>".LDPU_YOU_MUST_BE_OFFLINE."</div>";
                elseif(mssql_num_rows($findCharactersQ) == 0) $tempRepost .= "<div class='quadros'>".LDPU_THIS_CHARACTER_NOT_EXIST."</div>";
                else
                {
                    $findCharacters = mssql_fetch_row($findCharactersQ);
                    $findTypeAccountQ = $this->query("SELECT ".$TABLES_CONFIGS['WEBVIPS']['columnType']." as type FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'");
                    $findTypeAccount = mssql_fetch_object($findTypeAccountQ);
                    $findCharacters[0]++;
                    $this->masterResetRequireResets = $PANELUSER_MODULE['MASTER_RESET']['ResetsRequire'][(int)$findTypeAccount->type];
                    switch($PANELUSER_MODULE['RESET']['RESET_MODE'])
                    {
                        case 1:
                            $this->LevelReset  = $PANELUSER_MODULE['RESET']['0-10']['LevelReset'][(int)$findTypeAccount->type];
                            $this->LevelAfter  = $PANELUSER_MODULE['RESET']['0-10']['LevelAfter'][(int)$findTypeAccount->type];
                            $this->ZenRequire  = $PANELUSER_MODULE['RESET']['0-10']['ZenRequire'][(int)$findTypeAccount->type];
                            $this->Points      = $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type];
                            $this->CleanItens  = $PANELUSER_MODULE['RESET']['0-10']['CleanItens'][(int)$findTypeAccount->type];
                            $this->CleanMagics = $PANELUSER_MODULE['RESET']['0-10']['CleanMagics'][(int)$findTypeAccount->type];
                            $this->CleanQuests = $PANELUSER_MODULE['RESET']['0-10']['CleanQuests'][(int)$findTypeAccount->type];
                            $this->ResetPoints = true;
                            break;
                        case 2: 
                            if($findCharacters[0] >= 0 && $findCharacters[0] <= 10) $this->intervalResets = '0-10';
                            elseif($findCharacters[0] >= 11 && $findCharacters[0] <= 50) $this->intervalResets = '11-50';
                            elseif($findCharacters[0] >= 51 && $findCharacters[0] <= 100) $this->intervalResets = '51-100';
                            elseif($findCharacters[0] >= 101 && $findCharacters[0] <= 150) $this->intervalResets = '101-150';
                            elseif($findCharacters[0] >= 151 && $findCharacters[0] <= 200) $this->intervalResets = '151-200';
                            elseif($findCharacters[0] >= 201 && $findCharacters[0] <= 300) $this->intervalResets = '201-300';
                            elseif($findCharacters[0] >= 301) $this->intervalResets = '301-XXX';
                            $this->LevelReset  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['LevelReset'][(int)$findTypeAccount->type];
                            $this->LevelAfter  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['LevelAfter'][(int)$findTypeAccount->type];
                            $this->ZenRequire  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['ZenRequire'][(int)$findTypeAccount->type];
                            $this->Points      = $PANELUSER_MODULE['RESET'][$this->intervalResets]['Points'][(int)$findTypeAccount->type];
                            $this->CleanItens  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['CleanItens'][(int)$findTypeAccount->type];
                            $this->CleanMagics = $PANELUSER_MODULE['RESET'][$this->intervalResets]['CleanMagics'][(int)$findTypeAccount->type];
                            $this->CleanQuests = $PANELUSER_MODULE['RESET'][$this->intervalResets]['CleanQuests'][(int)$findTypeAccount->type];
                            $this->ResetPoints = true;
                            break;
                        case 3: 
                            $this->LevelReset  = $PANELUSER_MODULE['RESET']['0-10']['LevelReset'][(int)$findTypeAccount->type];
                            $this->LevelAfter  = $PANELUSER_MODULE['RESET']['0-10']['LevelAfter'][(int)$findTypeAccount->type];
                            $this->ZenRequire  = $PANELUSER_MODULE['RESET']['0-10']['ZenRequire'][(int)$findTypeAccount->type];
                            $this->Points      = $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type];
                            $this->CleanItens  = $PANELUSER_MODULE['RESET']['0-10']['CleanItens'][(int)$findTypeAccount->type];
                            $this->CleanMagics = $PANELUSER_MODULE['RESET']['0-10']['CleanMagics'][(int)$findTypeAccount->type];
                            $this->CleanQuests = $PANELUSER_MODULE['RESET']['0-10']['CleanQuests'][(int)$findTypeAccount->type];
                            $this->ResetPoints = true;
                            break;
                        case 4: 
                             if($findCharacters[0] >= 0 && $findCharacters[0] <= 10) $this->intervalResets = '0-10';
                            elseif($findCharacters[0] >= 11 && $findCharacters[0] <= 50) $this->intervalResets = '11-50';
                            elseif($findCharacters[0] >= 51 && $findCharacters[0] <= 100) $this->intervalResets = '51-100';
                            elseif($findCharacters[0] >= 101 && $findCharacters[0] <= 150) $this->intervalResets = '101-150';
                            elseif($findCharacters[0] >= 151 && $findCharacters[0] <= 200) $this->intervalResets = '151-200';
                            elseif($findCharacters[0] >= 201 && $findCharacters[0] <= 300) $this->intervalResets = '201-300';
                            elseif($findCharacters[0] >= 301) $this->intervalResets = '301-XXX';
                            
                            $this->LevelReset  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['LevelReset'][(int)$findTypeAccount->type];
                            $this->LevelAfter  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['LevelAfter'][(int)$findTypeAccount->type];
                            $this->ZenRequire  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['ZenRequire'][(int)$findTypeAccount->type];
                            $this->CleanItens  = $PANELUSER_MODULE['RESET'][$this->intervalResets]['CleanItens'][(int)$findTypeAccount->type];
                            $this->CleanMagics = $PANELUSER_MODULE['RESET'][$this->intervalResets]['CleanMagics'][(int)$findTypeAccount->type];
                            $this->CleanQuests = $PANELUSER_MODULE['RESET'][$this->intervalResets]['CleanQuests'][(int)$findTypeAccount->type];
                            $this->ResetPoints = true;
                            
                            $newResetsDump = ($findCharacters[0] - $this->masterResetRequireResets);
                            if($newResetsDump >= 0 && $newResetsDump <= 10) 
                            {
                                $this->Points = (int) ( ($newResetsDump) * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] )
                                ;
                            }
                            elseif($newResetsDump >= 11 && $newResetsDump <= 50) 
                            {
                                $this->Points = (int)(( $newResetsDump * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['11-50']['Points'][(int)$findTypeAccount->type] )
                                );
                            }
                            elseif($newResetsDump >= 51 && $newResetsDump <= 100)
                            {
                                $this->Points = (int)(( $newResetsDump * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['11-50']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['51-100']['Points'][(int)$findTypeAccount->type] )
                                );
                            }
                            elseif($newResetsDump >= 101 && $newResetsDump <= 150) 
                            {
                                $this->Points = (int)(( $newResetsDump * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['11-50']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['51-100']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['101-150']['Points'][(int)$findTypeAccount->type] )
                                );
                            }
                            elseif($newResetsDump >= 151 && $newResetsDump <= 200) 
                            {
                                $this->Points = (int)(( $newResetsDump * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['11-50']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['51-100']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['101-150']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['151-200']['Points'][(int)$findTypeAccount->type] )
                                );
                            }
                            elseif($newResetsDump >= 201 && $newResetsDump <= 300) 
                            {   
                                $this->Points = (int)(( $newResetsDump * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['11-50']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['51-100']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['101-150']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['151-200']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['201-300']['Points'][(int)$findTypeAccount->type] )
                                );
                            }
                            elseif($newResetsDump >= 301) 
                            {
                                $this->Points = (int)(( $newResetsDump * $PANELUSER_MODULE['RESET']['0-10']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['11-50']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['51-100']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['101-150']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['151-200']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['201-300']['Points'][(int)$findTypeAccount->type] ) +
                                                      ( $newResetsDump * $PANELUSER_MODULE['RESET']['301-XXX']['Points'][(int)$findTypeAccount->type] )
                                );
                            }
                            break;
                    }
                                     
                    if($findCharacters[5] < $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Strength']) $errorReset .= sprintf("<strong style='color:#FF0000'>".LDPU_MRESET_TEXT_NEED_POINTS_STRENGTH."</strong><br />", $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Strength']);                                                                                                                         
                    if($findCharacters[6] < $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Dexterity']) $errorReset .= sprintf("<strong style='color:#FF0000'>".LDPU_MRESET_TEXT_NEED_POINTS_DEXTERITY."</strong><br />", $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Dexterity']);                                                                                                                         
                    if($findCharacters[7] < $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Energy']) $errorReset .= sprintf("<strong style='color:#FF0000'>".LDPU_MRESET_TEXT_NEED_POINTS_ENERGY."</strong><br />", $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Energy']);                                                                                                                         
                    if($findCharacters[8] < $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Vitality']) $errorReset .= sprintf("<strong style='color:#FF0000'>".LDPU_MRESET_TEXT_NEED_POINTS_VITALITY."</strong><br />", $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Vitality']);                                                                                                                         
                    if($findCharacters[9] < $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Leadership'] && $findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['DL'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['LE'][0]) $errorReset .= sprintf("<strong style='color:#FF0000'>".LDPU_MRESET_TEXT_NEED_POINTS_LEADERSHIP."</strong><br />", $PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Leadership']);                                                                                                                         
                    if($findCharacters[3] < $this->LevelReset) $errorReset .= "<strong style='color:#FF0000'>".LDPU_RESET_NOT_HAVE_LEVEL."</strong><br />";
                    if($findCharacters[2] < $this->ZenRequire) $errorReset .= "<strong style='color:#FF0000'>".LDPU_RESET_NOT_HAVE_ZEN."</strong><br />";
                    if(($findCharacters[0]-1) < $this->masterResetRequireResets) $errorReset .= "<strong style='color:#FF0000'>".LDPU_MRESET_TEXT_NOT_HAVE_RESETS."</strong><br />";
                   
                    if($_GET['reset'] == false)
                    {
                        $tempRepost .= "<div class='quadros'>
                                            <em>".LDPU_RESET_TEXT_CHARACTER_SELECTED.":</em> <strong>". $_GET['character'] ."</strong><br /><br />
                                            <strong><em>".LDPU_RESET_TEXT_YOU_NEED_TO_RESET.":</em></strong><br />
                                            <em>".LDPU_RESET_TEXT_LEVEL.":</em> <strong>". $this->LevelReset ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_ZEN.":</em> <strong>". $this->ZenRequire ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_RESETS."</em>: <strong>".$this->masterResetRequireResets."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_STRENGTH."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Strength']."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_DEXTERITY."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Dexterity']."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_ENERGY."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Energy']."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_VITALITY."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Vitality']."</strong><br />
                                            ". ($findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['DL'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['LE'][0] ? "<em>".LDPU_MRESET_TEXT_POINTS_LEADERSHIP."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsRequire']['Leadership']."</strong><br />" : "")  ."
                                            <br /> 
                                            <strong><em>".LDPU_RESET_TEXT_STATUS_BEFORE_RESET.":</em></strong><br />   
                                            <em>".LDPU_RESET_TEXT_RESETS.":</em> <strong>". (int)($findCharacters[0]-1) ."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_STRENGTH."</em>: <strong>".$findCharacters[5]."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_DEXTERITY."</em>: <strong>".$findCharacters[6]."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_ENERGY."</em>: <strong>".$findCharacters[7]."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_VITALITY."</em>: <strong>".$findCharacters[8]."</strong><br />
                                            ". ($findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['DL'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['LE'][0] ? "<em>".LDPU_MRESET_TEXT_POINTS_LEADERSHIP."</em>: <strong>".$findCharacters[9]."</strong><br />" : "")  ."
                                            <em>".LDPU_MRESET_TEXT_MASTER_RESETS.":</em> <strong>". $findCharacters[4] ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_LEVEL.":</em> <strong>". $findCharacters[3] ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_ZEN.":</em> <strong>". $findCharacters[2] ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_CLASS.":</em> <strong>". $this->classNameDefine($findCharacters[1]) ."</strong><br /><br /> 
                                            <strong><em>".LDPU_RESET_TEXT_STATUS_AFTER_RESET.":</em></strong><br />
                                            <em>".LDPU_RESET_TEXT_RESETS.":</em> <strong>". (($findCharacters[0]-1)-$this->masterResetRequireResets) ."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_STRENGTH."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Strength']."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_DEXTERITY."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Dexterity']."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_ENERGY."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Energy']."</strong><br />
                                            <em>".LDPU_MRESET_TEXT_POINTS_VITALITY."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Vitality']."</strong><br />
                                            ". ($findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['DL'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['LE'][0] ? "<em>".LDPU_MRESET_TEXT_POINTS_LEADERSHIP."</em>: <strong>".$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Leadership']."</strong><br />" : "")  ."
                                            <em>".LDPU_MRESET_TEXT_MASTER_RESETS.":</em> <strong>". ($findCharacters[4]+1) ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_LEVEL.":</em> <strong>". $this->LevelAfter ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_ZEN.":</em> <strong>". (int)($findCharacters[2]-$this->ZenRequire) ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_CLASS.":</em> <strong>". ($this->CleanQuests == true ? $this->classNameDefine($this->resetClassCode($findCharacters[1])) : $this->classNameDefine($findCharacters[1])) ."</strong><br />
                                            <em>".LDPU_RESET_TEXT_MAGICS.":</em> ". ($this->CleanMagics == true ? "<strong style='color:#FF0000'>".LDPU_RESET_TEXT_MAGICS_ERASE."</strong>":"<strong>".LDPU_RESET_TEXT_MAGICS_NOT_ERASE."</strong>") ."<br />
                                            <em>".LDPU_RESET_TEXT_ITEMS.":</em> ". ($this->CleanItens == true ? "<strong style='color:#FF0000'>".LDPU_RESET_TEXT_ITEMS_ERASE."</strong>":"<strong>".LDPU_RESET_TEXT_ITEMS_NOT_ERASE."</strong>") ."<br />
                                            <em>".LDPU_RESET_TEXT_QUESTS.":</em> ". ($this->CleanQuests == true ? "<strong style='color:#FF0000'>".LDPU_RESET_TEXT_QUESTS_ERASE."</strong>":"<strong>".LDPU_RESET_TEXT_QUESTS_NOT_ERASE."</strong>") ."<br /><br />";
                                            if(isset($errorReset)) $tempRepost .= $errorReset; else $tempRepost .= "<input type='button' class='button' value='".LDPU_MRESET_TEXT_SUBMIT."' onclick=\"javascript:window.location='?page=paneluser&amp;option=MASTER_RESET&amp;character=".urlencode($_GET['character'])."&amp;reset=true';\" />";
                        $tempRepost .= "</div>";
                    } 
                    else
                    {
                        if(isset($errorReset)) $tempRepost .= "<div class='qdestaques'>".$errorReset."</div>";
                        else
                        {
                            $this->query("UPDATE ".DATABASE_CHARACTERS.".dbo.Character SET 
                                            Experience = 0 ,                                                                                     
                                            ".COLUMN_RESETS." = ".COLUMN_RESETS." - ".$this->masterResetRequireResets." , 
                                            ".COLUMN_MASTER_RESETS." = ".COLUMN_MASTER_RESETS." + 1 , 
                                            cLevel = ".$this->LevelAfter." , 
                                            MapNumber = ".($findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['FE'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['HE'][0] ? 3 : 0)." ,
                                            MapPosX = ".($findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['FE'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['HE'][0] ? 174 : 125)." , 
                                            MapPosY = ".($findCharacters[1] >= $CLASS_CHARACTERS['CLASSCODES']['FE'][0] && $findCharacters[1] <= $CLASS_CHARACTERS['CLASSCODES']['HE'][0] ? 111 : 125)." ,
                                            Money = Money - ".$this->ZenRequire." ,
                                            ". ($this->CleanItens == true ? "Inventory = NULL,":"") ."
                                            ". ($this->CleanMagics == true ? "MagicList = NULL,":"") ."
                                            ". ($this->CleanQuests == true ? "Quest = NULL, class = ".$this->resetClassCode($findCharacters[1]).",":"") ."                            
                                            ". ($this->ResetPoints == true ? "Strength = {$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Strength']} , Dexterity = {$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Dexterity']} , Energy = {$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Energy']} , Vitality = {$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Vitality']}, LeaderShip = {$PANELUSER_MODULE['MASTER_RESET']['PointsAfter']['Leadership']} ":"") ."
                                            WHERE Name = '".$_GET['character']."'");
                                            
                            if($PANELUSER_MODULE['MASTER_RESET']['Bonus']['Active'] == true)
                                $this->query("UPDATE ".$PANELUSER_MODULE['MASTER_RESET']['Bonus']['Columns']['table']." SET ".$PANELUSER_MODULE['MASTER_RESET']['Bonus']['Columns']['columnAmount']." = ".$PANELUSER_MODULE['MASTER_RESET']['Bonus']['Columns']['columnAmount']." + ".$PANELUSER_MODULE['MASTER_RESET']['Bonus']['Amount'][(int)$findTypeAccount->type]." WHERE ".$PANELUSER_MODULE['MASTER_RESET']['Bonus']['Columns']['columnUsername']." = '".$_SESSION['LOGIN']."'");                
                            
                            $this->writeLog(6, $_SESSION['LOGIN'], $_GET['character'], ($this->CleanItens == true ? LDPU_RESET_LOG_SUBMIT_ERASED_ITEMS:"")); 
                            $tempRepost .= "<div class='qdestaques2'>".LDPU_MRESET_TEXT_SUCCESS."</div>";
                            $this->query("EXEC [dbo].[webPanelAction_MasterReset] '". $_SESSION['LOGIN'] ."', '".$_GET['character']."'"); 
                        }
                    }
                }
            }
            $ldTpl->set("RespostWrite", $tempRepost);
        }
		private function loadOptionsChangeNick()
		{
			global $ldTpl, $TABLES_CONFIGS, $PANELUSER_MODULE; 
			$findCharactersQ = $this->query("SELECT Name FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."'");
			while($findCharacters = mssql_fetch_object($findCharactersQ)){
				$tempOption .= "<option value=\"".urlencode($findCharacters->Name)."\">". $findCharacters->Name ."</option>";
			}
			$ldTpl->set("CHARACTER_LIST_TAG_OPTION", $tempOption); 
			unset($tempOption);
			
			if(empty($_GET['character']) == false)
			{
				$findCharactersQ = $this->query("SELECT MapNumber,MapPosX,MapPosY FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."' AND Name='". $_GET['character'] ."'");
				if($this->checkOnlineAccount($_SESSION['LOGIN']) == 1) $tempRepost .= "<div class='qdestaques2'>".LDPU_YOU_MUST_BE_OFFLINE."</div>";
				elseif(mssql_num_rows($findCharactersQ) == 0) $tempRepost .= "<div class='quadros'>".LDPU_THIS_CHARACTER_NOT_EXIST."</div>";
				else {
					$findMoneyQ = $this->query("SELECT ".$PANELUSER_MODULE['CHANGE_NICK']['coluna']." as money FROM ".DATABASE_ACCOUNTS.".dbo.".MOEDA_TABELA." WHERE ".MOEDA_COLUNA_LOGIN." ='". $_SESSION['LOGIN'] ."'");
					$Money = mssql_fetch_object($findMoneyQ);
					$findVipNickQ = $this->query("SELECT ".$TABLES_CONFIGS['WEBVIPS']['columnType']." as type FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='". $_SESSION['LOGIN'] ."'");
					$findVipNick = mssql_fetch_object($findVipNickQ);
					if($findVipNick->type < $PANELUSER_MODULE['CHANGE_NICK']['vip'] && $PANELUSER_MODULE['CHANGE_NICK']['cobranca'] == true && $PANELUSER_MODULE['CHANGE_NICK']['price'] > $Money->money) {						
						$tempRepost = sprintf("<div class='quadros'><div class='qdestaques'>Você não tem ".$PANELUSER_MODULE['CHANGE_NICK']['nome']." suficientes</div></div>", $PANELUSER_MODULE['CHANGE_NICK']['nome'],(int)$PANELUSER_MODULE['CHANGE_NICK']['price'], $PANELUSER_MODULE['CHANGE_NICK']['nome'], (int)$Money->money);
					} else {
						$findCharacters = mssql_fetch_object($findCharactersQ);
						if($_GET['Write'] == false)
						{
							$tempRepost .= "<div class='quadros'>
												<form action='?page=paneluser&amp;option=CHANGE_NICK&amp;character=".urlencode($_GET['character'])."&amp;Write=true' method='post'>
												<table width='100%' border='0'>
												 <tr>
												  <td align='center' colspan='2'><em>".LDPU_CHANGE_NICK_CHARACTER.":</em> <strong>".$_GET['character']."</strong></td>
												 </tr>
												 <tr>
												  <td align='right' width='40%'><strong>".LDPU_CHANGE_NICK_NEW_NICK.": </strong></td>
												  <td><input name='newnick' id='newnick' maxlength='10' size='15' type='text' class='' value='".$_GET['character']."' /></td>
												 </tr>
												 <tr>
												  <td align='center' colspan='2'><input type='submit' class='button' value='".LDPU_CHANGE_NICK_SUBMIT."' /></td>
												 </tr>
												</table>
												</form>						
											</div>";						
						}
						else
						{
							$findCharGuildQ = $this->query("SELECT 1 FROM ".DATABASE_CHARACTERS.".dbo.GuildMember WHERE Name='". $_GET['character'] ."'");
							$findCharQ = $this->query("SELECT 1 FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE Name='". $_POST['newnick'] ."'");
							$findCharStatusQ = $this->query("SELECT CtlCode FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE Name='".$_GET['character']."'");
							$findCharStatus = mssql_fetch_row($findCharStatusQ);
							if(mssql_num_rows($findCharGuildQ) > 0) $tempRepost .= "<div class='qdestaques'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_NOT_HAVE_GUILD."</strong></div>";
							elseif(empty($_POST['newnick']) || eregi("[^a-zA-Z0-9_!=?&-]-", $_POST['newnick'])) $tempRepost .= "<div class='qdestaques'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_INVALID_CHARS."</strong></div>";
							elseif(strlen($_POST['newnick']) > 10) $tempRepost .= "<div class='qdestaques'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_INVALID_NAME_SIZE."</strong></div>";
							elseif($_GET['character'] == $_POST['newnick']) $tempRepost .= "<div class='qdestaques'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_FILL_NAME."</strong></div>";
							elseif(mssql_num_rows($findCharQ) > 0) $tempRepost .= "<div class='qdestaques'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_ALREADY_EXISTS_THIS_NICK."</strong></div>";
							elseif($findCharStatus[0] == 1) $tempRepost .= "<div class='qdestaques'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_CHARACTER_BANNED."</strong></div>";
							elseif(eregi("WEBZEN",$_POST['newnick']) == true || eregi("ADM",$_POST['newnick']) == true || eregi("GM",$_POST['newnick']) == true || eregi("MD",$_POST['newnick']) == true || eregi("NT",$_POST['newnick']) == true || eregi("DV",$_POST['newnick']) == true) $tempRepost .= "<div class='qdestaques2'><strong style='color:#BB0000'>".LDPU_CHANGE_NICK_INVALID_SIGLES."</strong></div>";
							elseif (!preg_match("/^[]a-zA-Z0-9[]+$/", $_POST['newnick']) == 1) {
							$tempRepost .= "Use apenas caracteres a-z e A-Z, sem números e simbolos";
						}
							else {
								$selectSlotQ = $this->query("SELECT GameID1,GameID2,GameID3,GameID4,GameID5 FROM ".DATABASE_CHARACTERS.".dbo.AccountCharacter WHERE Id='".$_SESSION['LOGIN']."'");
								$selectSlot = mssql_fetch_object($selectSlotQ);
								
								if($selectSlot->GameID1 == $_GET['character']) $Slot_GameID = "GameID1";
								if($selectSlot->GameID2 == $_GET['character']) $Slot_GameID = "GameID2";
								if($selectSlot->GameID3 == $_GET['character']) $Slot_GameID = "GameID3";
								if($selectSlot->GameID4 == $_GET['character']) $Slot_GameID = "GameID4";
								if($selectSlot->GameID5 == $_GET['character']) $Slot_GameID = "GameID5";   
						
								$Query_part1 = $this->query("UPDATE ".DATABASE_CHARACTERS.".dbo.AccountCharacter SET $Slot_GameID='".$_POST['newnick']."' WHERE $Slot_GameID='".$_GET['character']."'");
								$Query_part2 = $this->query("UPDATE ".DATABASE_CHARACTERS.".dbo.Character SET Name='".$_POST['newnick']."' WHERE Name='".$_GET['character']."'");
							
								if(MUSERVER_TEAM == 1 && VESION_MUSERVER == 1) {
									$this->query("DELETE FROM ".DATABASE_CHARACTERS.".dbo.MasterSkillTree WHERE Name = '". $_GET['character'] ."'");
								}
								$login = $_SESSION['LOGIN'];
								$old_nick = $_GET['character'];
								$new_nick = $_POST['newnick'];
								$data = date('d/m/Y H:i:s');
								$price = $PANELUSER_MODULE['CHANGE_NICK']['price'];
								$money = $Money->money;
								$reason = base64_encode('Altera&ccedil;&atilde;o do nome do personagem '. $old_nick .' para '.$new_nick.'');
								switch($PANELUSER_MODULE['CHANGE_NICK']['MONEY_SETTINGS']['COLUMN_MONEY'])
								{
									case $TABLES_CONFIGS['WEBCASH']['columnAmount'] : $moneyType = '1'; break;
									case $TABLES_CONFIGS['WEBCASH']['columnAmount2'] : $moneyType = '2'; break;
									case $TABLES_CONFIGS['WEBCASH']['columnPoints'] : $moneyType = '3'; break;
								}
								$this->query("INSERT INTO [".DATABASE_ACCOUNTS."].[dbo].[webChangeNickHistory] ([login], [new_nick], [old_nick], [data]) VALUES ('$login', '$new_nick','$old_nick','$data')");
								if ($PANELUSER_MODULE['CHANGE_NICK']['cobranca'] == true && $findVipNick->type < $PANELUSER_MODULE['CHANGE_NICK']['vip']){
								$this->query("UPDATE dbo.".MOEDA_TABELA." SET ". $PANELUSER_MODULE['CHANGE_NICK']['coluna'] . " = ". $PANELUSER_MODULE['CHANGE_NICK']['coluna'] . " - ". $PANELUSER_MODULE['CHANGE_NICK']['price'] . " WHERE ".MOEDA_COLUNA_LOGIN." = '".$_SESSION['LOGIN']."'");}	
								$tempRepost .= "<div class='qdestaques2'>".LDPU_CHANGE_NICK_SUCCESS."</div>";
								$this->writeLog(11, $_SESSION['LOGIN'], $_GET['character'], LDPU_CHANGE_NICK_SUCCESS_LOG.": {$_POST['newnick']}"); 
							}
						}
					}
				}
			}
			$ldTpl->set("PRICE_CHANGE_NICK", $PANELUSER_MODULE['CHANGE_NICK']['price']);
			$ldTpl->set("CHANGE_NICK_MONEY_NAME", $PANELUSER_MODULE['CHANGE_NICK']['nome']);
			$ldTpl->set("RespostWrite", $tempRepost);
		}
		
        private function loadOptionsManagerPhoto()
		{
			global $ldTpl;
			global $PANELUSER_MODULE; 
			$findCharactersQ = $this->query("SELECT Name FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."'");
			while($findCharacters = mssql_fetch_object($findCharactersQ)){
				$tempOption .= "<option value=\"".urlencode($findCharacters->Name)."\">". $findCharacters->Name ."</option>";
			}
			$ldTpl->set("CHARACTER_LIST_TAG_OPTION", $tempOption); 
			unset($tempOption);
			
			if(empty($_GET['character']) == false)
			{
				$findCharactersQ = $this->query("SELECT image FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."' AND Name='". $_GET['character'] ."'");
				if($this->checkOnlineAccount($_SESSION['LOGIN']) == 1) $tempRepost .= "<div class='qdestaques2'>".LDPU_YOU_MUST_BE_OFFLINE."</div>";
				elseif(mssql_num_rows($findCharactersQ) == 0) $tempRepost .= "<div class='quadros'>".LDPU_THIS_CHARACTER_NOT_EXIST."</div>";
				else
				{
					$findCharacters = mssql_fetch_object($findCharactersQ);
                    if(empty($findCharacters->image) == true) $this->photo = "modules/uploads/photos/nophoto.jpg"; else $this->photo = "modules/uploads/photos/".$findCharacters->image;
					if($_GET['Write'] == false)
					{
						$tempRepost .= "<div class='quadros'>	
											<form action='?page=paneluser&amp;option=MANAGER_PHOTO&amp;character=". urlencode($_GET['character']) ."&amp;Write=true' method='post' enctype='multipart/form-data'>
											<table width='100%'>
                                                <tr>               
                                                    <td colspan='2' align='center'><em>".LDPU_MPHOTO_CHARACTER.":</em> <strong>{$_GET["character"]}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td width='34%' align='center'>".LDPU_MPHOTO_CURRENT_PHOTO.": <br />
                                                        <img src='{$this->photo}' alt='' width='100' height='100' style='border: 2px solid #222222;' /></td>
                                                    <td width='66%' align='left'>
                                                        ".LDPU_MPHOTO_REFRESH_PHOTO.": <br />
                                                        <input type='file' name='photo' /><br />
                                                        <input type='submit' class='button' value='".LDPU_MPHOTO_SUBMIT."' /> 
                                                    </td>
                                                </tr>
                                            </table>
											</form>
										</div>";						
					}
					else
					{
					    $this->photo = $_FILES['photo'];
                        if(empty($this->photo['name']) == true) return $ldTpl->set("RespostWrite", "<div class='qdestaques2'>".LDPU_MPHOTO_CHOOSE_PHOTO."</div>");
                        elseif($this->photo['error'] != 0) return $ldTpl->set("RespostWrite", "<div class='qdestaques'>".LDPU_MPHOTO_UPLOAD_ERROR." {$this->photo['error']}</div>");
                        elseif($this->photo['size'] > 500000) return $ldTpl->set("RespostWrite", "<div class='qdestaques'>".LDPU_MPHOTO_MAX_SIZE."</div>"); 
                        elseif(preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $this->photo['type']) == false) return $ldTpl->set("RespostWrite", "<div class='qdestaques'>".LDPU_MPHOTO_INVALID_TYPE."</div>"); 
                        else 
                        {
                            switch($this->photo['type'])
                            {
                                case 'image/jpeg': case 'image/jpg': $this->ext = ".jpg"; break;
                                case 'image/bmp': $this->ext = ".bmp"; break;
                                case 'image/gif': $this->ext = ".gif"; break;
                                case 'image/png': $this->ext = ".png"; break;   
                                default: return $ldTpl->set("RespostWrite", "<div class='qdestaques'>".LDPU_MPHOTO_INVALID_TYPE.".</div>");   
                            }
                            $this->tmp_name = time().$_GET['character'].$this->ext;
                            move_uploaded_file($this->photo['tmp_name'], "modules/uploads/photos/".$this->tmp_name);
                            if(empty($findCharacters->image) == false) @unlink("modules/uploads/photos/".$findCharacters->image);   
                            $this->query("UPDATE ".DATABASE_CHARACTERS.".dbo.Character SET image = '{$this->tmp_name}' WHERE AccountID='". $_SESSION['LOGIN'] ."' AND Name='". $_GET['character'] ."'"); 
                            $tempRepost = "<div class='qdestaques2'>".LDPU_MPHOTO_SUCCESS."</div>";
                        }		
					}
				}
			}
			$ldTpl->set("RespostWrite", $tempRepost);
		}
		private function loadOptionsBuyVips()
		{
			global $ldTpl, $PANELUSER_MODULE, $TABLES_CONFIGS, $PAINEL_USER;
			
			$findAmountCashQ = $this->query("SELECT ".$PAINEL_USER['moeda'][1]['coluna']." as amount FROM ".DATABASE_ACCOUNTS.".dbo.".MOEDA_TABELA." WHERE ".MOEDA_COLUNA_LOGIN."='".$_SESSION['LOGIN']."'");
			$findAmountCash = mssql_fetch_object($findAmountCashQ);
			$ldTpl->set("CASH_AMOUNT", $findAmountCash->amount);
			$ldTpl->set("CASHS_NAME", $PAINEL_USER['moeda'][1]['nome']);			
			
			$ldTpl->set("CASH_AMOUNT_VIPSILVER_30_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][0]);
			$ldTpl->set("CASH_AMOUNT_VIPSILVER_90_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][1]);
			$ldTpl->set("CASH_AMOUNT_VIPSILVER_180_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][2]);
			$ldTpl->set("CASH_AMOUNT_VIPSILVER_365_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][3]);
            
            $ldTpl->set("CASH_AMOUNT_VIPGOLD_30_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][0]);
            $ldTpl->set("CASH_AMOUNT_VIPGOLD_90_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][1]);
            $ldTpl->set("CASH_AMOUNT_VIPGOLD_180_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][2]);
            $ldTpl->set("CASH_AMOUNT_VIPGOLD_365_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][3]);
            
            $ldTpl->set("CASH_AMOUNT_VIP3_30_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][0]);
            $ldTpl->set("CASH_AMOUNT_VIP3_90_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][1]);
            $ldTpl->set("CASH_AMOUNT_VIP3_180_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][2]);
            $ldTpl->set("CASH_AMOUNT_VIP3_365_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][3]);
            
            $ldTpl->set("CASH_AMOUNT_VIP4_30_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][0]);
            $ldTpl->set("CASH_AMOUNT_VIP4_90_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][1]);
            $ldTpl->set("CASH_AMOUNT_VIP4_180_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][2]);
            $ldTpl->set("CASH_AMOUNT_VIP4_365_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][3]);
			
			$ldTpl->set("CASH_AMOUNT_VIP5_30_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][0]);
			$ldTpl->set("CASH_AMOUNT_VIP5_90_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][1]);
			$ldTpl->set("CASH_AMOUNT_VIP5_180_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][2]);
			$ldTpl->set("CASH_AMOUNT_VIP5_365_DAYS",$PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][3]);
		
			if($_GET['Write'] == true)
			{
				$vip = explode(":", $_POST['vip']);
				switch($vip[0])
				{
					case 1:
                        if($PANELUSER_MODULE['BUY_VIPS']['ACTIVES']["VIP_1"] == false) $error = "<div class='qdestaques'>".LDPU_BUY_VIP_DISABLED_TYPE."</div>";
						elseif($vip[1] == 30) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][0];
						elseif($vip[1] == 90) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][1];
						elseif($vip[1] == 180) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][2];
						elseif($vip[1] == 365) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_1'][3];
						else $error = "<div class='qdestaques'>".LDPU_BUY_VIP_ERROR_TIME."</div>";
					break;
                    case 2:
                        if($PANELUSER_MODULE['BUY_VIPS']['ACTIVES']["VIP_2"] == false) $error = "<div class='qdestaques'>".LDPU_BUY_VIP_DISABLED_TYPE."</div>";
                        elseif($vip[1] == 30) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][0];
                        elseif($vip[1] == 90) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][1];
                        elseif($vip[1] == 180) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][2];
                        elseif($vip[1] == 365) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_2'][3];
                        else $error = "<div class='qdestaques'>".LDPU_BUY_VIP_ERROR_TIME."</div>";
                    break;
                    case 3:
                        if($PANELUSER_MODULE['BUY_VIPS']['ACTIVES']["VIP_3"] == false) $error = "<div class='qdestaques'>".LDPU_BUY_VIP_DISABLED_TYPE."</div>";
                        elseif($vip[1] == 30) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][0];
                        elseif($vip[1] == 90) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][1];
                        elseif($vip[1] == 180) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][2];
                        elseif($vip[1] == 365) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_3'][3];
                        else $error = "<div class='qdestaques'>".LDPU_BUY_VIP_ERROR_TIME."</div>";
                    break;
                    case 4:
                        if($PANELUSER_MODULE['BUY_VIPS']['ACTIVES']["VIP_4"] == false) $error = "<div class='qdestaques'>".LDPU_BUY_VIP_DISABLED_TYPE."</div>";
                        elseif($vip[1] == 30) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][0];
                        elseif($vip[1] == 90) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][1];
                        elseif($vip[1] == 180) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][2];
                        elseif($vip[1] == 365) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_4'][3];
                        else $error = "<div class='qdestaques'>".LDPU_BUY_VIP_ERROR_TIME."</div>";
                    break;
					case 5:
						if($PANELUSER_MODULE['BUY_VIPS']['ACTIVES']["VIP_5"] == false) $error = "<div class='qdestaques'>".LDPU_BUY_VIP_DISABLED_TYPE."</div>";
                        elseif($vip[1] == 30) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][0];
						elseif($vip[1] == 90) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][1];
						elseif($vip[1] == 180) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][2];
						elseif($vip[1] == 365) $this->priceVip = $PANELUSER_MODULE['BUY_VIPS']['PRICE']['VIP_5'][3];
						else $error = "<div class='qdestaques'>".LDPU_BUY_VIP_ERROR_TIME."</div>";
					break;
					default: $error = "<div class='qdestaques'>".LDPU_BUY_VIP_ERROR_TIME."</div>";
				}
				$checkMemberVipQ = $this->query("SELECT ".$TABLES_CONFIGS['WEBVIPS']['columnType']." as type FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='".$_SESSION['LOGIN']."'");
				$checkMemberVip = mssql_fetch_object($checkMemberVipQ);
				if(isset($error)) $tempRespost .= $error;
				elseif($this->priceVip > $findAmountCash->amount) $tempRespost .= "<div class='qdestaques'>".LDPU_BUY_VIP_NOT_HAVE_CASH."</div>";
				elseif((int)$checkMemberVip->type > 0 && $vip[0] != $checkMemberVip->type) $tempRespost .= sprintf("<div class='qdestaques'>".LDPU_BUY_VIP_YOU_IS_VIP."</div>", $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][$checkMemberVip->type], $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][$vip[0]], $PANELUSER_MODULE['BUY_VIPS']['NAME_FLATS'][$checkMemberVip->type]);
				else
				{
                    if((int)$checkMemberVip->type > 0)
					{
						$this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.".MOEDA_TABELA." SET ".$PAINEL_USER['moeda'][1]['coluna']."=".$PAINEL_USER['moeda'][1]['coluna']."-".$this->priceVip." WHERE ".MOEDA_COLUNA_LOGIN." ='".$_SESSION['LOGIN']."'");
						$this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO SET ".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip']."=".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip']." + ".$vip[1]." WHERE memb___id='".$_SESSION['LOGIN']."'");
						$checkMemberVipAposQ = $this->query("SELECT ".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip']." as data FROM ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO WHERE memb___id='".$_SESSION['LOGIN']."'");
						$checkMemberVipApos = mssql_fetch_object($checkMemberVipAposQ);
                        
					    $tempRespost .= sprintf("<div class='qdestaques2'>".LDPU_BUY_VIP_SUCCESS."</em></div>", date("d-m-Y g:i a",strtotime($checkMemberVipApos->data)));
					}
					else
					{                                                   
						$this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.".MOEDA_TABELA." SET ".$PAINEL_USER['moeda'][1]['coluna']."=".$PAINEL_USER['moeda'][1]['coluna']."-".$this->priceVip." WHERE ".MOEDA_COLUNA_LOGIN."='".$_SESSION['LOGIN']."'");
						$this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO SET 
						".$TABLES_CONFIGS['WEBVIPS']['columnType']." = ".$vip[0].",
						".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip']."=GETDATE() WHERE memb___id='".$_SESSION['LOGIN']."'");
						$this->query("UPDATE ".DATABASE_ACCOUNTS.".dbo.MEMB_INFO SET ".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip']."=".$TABLES_CONFIGS['WEBVIPS']['columnExpiraVip']." + ".$vip[1]." WHERE memb___id='".$_SESSION['LOGIN']."'");
					    $tempRespost .= sprintf("<div class='qdestaques2'>".LDPU_BUY_VIP_SUCCESS."</em></div>", date("d-m-Y g:i a",strtotime("+ ".$vip[1]." days")));
					}  

				}			
			}
			$ldTpl->set("RespostWrite", $tempRespost);
		}
		private function loadOptionsConfirmPayment()
		{
			global $ldTpl, $PANELUSER_MODULE;
			if($_GET['Write'] == true)
			{
				$check = $this->query("SELECT count(1) [count] FROM [dbo].[webLogBuyCash] WHERE [username] = '". $_SESSION['LOGIN'] ."' and [status] = 0");
                $check = mssql_fetch_object($check);
                if($check->count >= $PANELUSER_MODULE['CONFIRM_PAYMENT']['MAX_OPEN'])
                    $this->Check_List_Error .= sprintf("<ul><li> ". LDPU_CONFIRM_DEPOSIT_ERROR_LIMIT_CONFIRM_OPEN .". </li></ul>", $PANELUSER_MODULE['CONFIRM_PAYMENT']['MAX_OPEN']);
                
                if(empty($_POST['golds']) == true) $this->Check_List_Error .= "<ul><li> ".LDPU_CONFIRM_DEPOSIT_FILL_AMOUNT_CASH." ". CASH_NAME .". </li></ul>";
				if(empty($_POST['bank']) == true) $this->Check_List_Error .= "<ul><li> ".LDPU_CONFIRM_DEPOSIT_FILL_BANK." </li></ul>";
				if(empty($_POST['data']) == true) $this->Check_List_Error .= "<ul><li> ".LDPU_CONFIRM_DEPOSIT_FILL_DATE." </li></ul>";
				if(empty($_POST['hora']) == true) $this->Check_List_Error .= "<ul><li> ".LDPU_CONFIRM_DEPOSIT_FILL_HOUR." </li></ul>";
				if(empty($_POST['valor']) == true) $this->Check_List_Error .= "<ul><li> ".LDPU_CONFIRM_DEPOSIT_FILL_VALUE." </li></ul>";
				if(empty($_POST['pago_em']) == true) $this->Check_List_Error .= "<ul><li> ".LDPU_CONFIRM_DEPOSIT_FILL_PAY_IN." </li></ul>";
				
				if(empty($this->Check_List_Error) == false) $this->ResponseTpl = "<div class=\"qdestaques\"><strong><em>".LDPU_CONFIRM_DEPOSIT_ERROR_FOUND.":</em></strong> <br />". $this->Check_List_Error ."</div>";
				else
				{
					if(in_array($_FILES['image']['type'], array('image/jpeg', 'image/pjpeg', 'image/png')))
					{
						$TmpUploadName = "modules/uploads/confirmBuys/". $_SESSION['LOGIN'] ."[". date("d-m-Y~G-i-s") ."].jpg";
						move_uploaded_file($_FILES['image']['tmp_name'], $TmpUploadName);
					}
					$this->ResponseTpl .= "<script type=\"text/javascript\"> document.getElementById('FormConfirm').style.display = 'none'; </script>";
					$this->query("INSERT INTO dbo.webLogBuyCash
									(username,cash,banco,nterminal,ntransferencia,agencia_acolhedora,nsequencia,ctr,caixa_eletronico,nenvelope,ndocumento,ncontrole,noperador,data,hora,pago_em,anexo,comentario,valor,status) VALUES
									('". $_SESSION['LOGIN'] ."', '". $_POST['golds'] ."', '". $_POST['bank'] ."', '". $_POST['nterminal'] ."', '". $_POST['ntransferencia'] ."', '". $_POST['agencia_acolhedora'] ."', '". $_POST['nsequencia'] ."', '". $_POST['ctr'] ."', '". $_POST['caixa_eletronico'] ."', '". $_POST['nenvelope'] ."', '". $_POST['ndocumento'] ."', '". $_POST['ncontrole'] ."', '". $_POST['noperador']."', '". $_POST['data'] ."', '". $_POST['hora'] ."', '". $_POST['pago_em'] ."', '". $TmpUploadName  ."', '".base64_encode($_POST['comment'])."', '". $_POST['valor'] ."', 0);");
					$this->ResponseTpl .= "<div class=\"qdestaques\">".LDPU_CONFIRM_DEPOSIT_SUCCESS."</div>";
				}
			}
			$ldTpl->set("RespostWrite",$this->ResponseTpl);
		}
		private function loadOptionsOpenComplaints()
		{
			global $ldTpl;
			if($_GET['Write'] == true && empty($_POST['descricao']) == false)
			{
				if(in_array($_FILES['image']['type'], array('image/jpeg', 'image/pjpeg', 'image/png')))
				{
					$TmpUploadName = "modules/uploads/complaints/". $_SESSION['LOGIN'] ."[". date("d-m-Y~G-i-s") ."].jpg";
					move_uploaded_file($_FILES['image']['tmp_name'], $TmpUploadName);
					$this->query("INSERT INTO dbo.webComplaints (username,image,description,date,ip,status) VALUES ('".$_SESSION['LOGIN']."','". $TmpUploadName ."','".base64_encode($_POST['descricao'])."','".time()."','".$_SERVER['REMOTE_ADDR']."',0)");
					$tempResult .= "<div class='qdestaques2'>".LDPU_COMPLAINT_SUCCESS."</div>";
				}
				else
					$tempResult .= "<div class='qdestaques'>".LDPU_COMPLAINT_INVALID_FILE."</div>";
			}
			$ldTpl->set("RespostWrite", $tempResult);
		}
		private function loadOptionsOpenTicket()
		{
			global $ldTpl, $PANELUSER_MODULE;
			$findCharactersQ = $this->query("SELECT Name FROM ".DATABASE_CHARACTERS.".dbo.Character WHERE AccountID='". $_SESSION['LOGIN'] ."'");
			while($findCharacters = mssql_fetch_object($findCharactersQ)){
				$tempOption .= "<option value=\"".urlencode($findCharacters->Name)."\">". $findCharacters->Name ."</option>";
			}
			$ldTpl->set("CHARACTER_LIST_TAG_OPTION", $tempOption); 
			unset($tempOption);
			
			if($_GET['Write'] == true)
			{
                $this->checkTicketsOpenQ = $this->query("SELECT count(1) as count FROM dbo.webTickets WHERE username='{$_SESSION['LOGIN']}' AND status = 0");
                $this->checkTicketsOpen = mssql_fetch_object($this->checkTicketsOpenQ);
                if($this->checkTicketsOpen->count >= $PANELUSER_MODULE['OPEN_TICKET']['MAX_OPEN'])
                    $tempResult .= sprintf("<div class='qdestaques2'>".LDPU_OPEN_TICKET_MAX_TICKET_OPEN."</div>", $PANELUSER_MODULE['OPEN_TICKET']['MAX_OPEN']);
                else
                {
				    $this->query("INSERT INTO dbo.webTickets (username,character,sector,subject,description,date,ip,status) VALUES ('". $_SESSION['LOGIN'] ."','".$_POST['character']."','".$_POST['sector']."','".base64_encode($_POST['subject'])."','".base64_encode($_POST['description'])."','".time()."','".$_SERVER['REMOTE_ADDR']."',0)");
				    $tempResult .= "<div class='qdestaques2'>".LDPU_OPEN_TICKET_SUCCESS."</div>";
                }
			}
			$ldTpl->set("RespostWrite", $tempResult);
		}
		private function loadOptionsReadTicket()
		{
			global $ldTpl;
			if(isset($_GET['Ticket']) == false)
			{
				$sqlQ = $this->query("SELECT id,subject,date,status FROM dbo.webTickets WHERE username='".$_SESSION['LOGIN']."' ORDER By id DESC");
				while($sql = mssql_fetch_object($sqlQ))
				{
					$tempResult .= "<div class='quadros'><em>".LDPU_READ_TICKET_TEXT_ID."</em>: <strong>".$sql->id."</strong><br /><em>".LDPU_READ_TICKET_TEXT_SUBJECT."</em>: <strong>".base64_decode($sql->subject)."</strong><br /><em>".LDPU_READ_TICKET_TEXT_DATE."</em>: <strong>".date("d/m/Y g:i a",$sql->date)."</strong><br /><em>".LDPU_READ_TICKET_TEXT_STATUS."</em>: <strong>".($sql->status == 0 ? LDPU_READ_TICKET_TEXT_STATUS_OPEN:LDPU_READ_TICKET_TEXT_STATUS_CLOSE)."</strong><br /><a href='?page=paneluser&amp;option=READ_TICKET&amp;Ticket=".$sql->id."'>".LDPU_READ_TICKET_TEXT_VIEW_TICKET."</a></div>";
				}
			}
			else
			{
				$sqlQ = $this->query("SELECT id,subject,description,date,status FROM dbo.webTickets WHERE username='".$_SESSION['LOGIN']."' AND id=".(int)$_GET['Ticket']." ORDER By id DESC");
				$sql = mssql_fetch_object($sqlQ);
				$ticketStatus = $sql->status;
				if($_GET['Write'] == true && empty($_POST['answer']) == false && $sql->status == 0) $this->query("INSERT INTO dbo.webTicketsAnswers (id,description,answerBy,date) VALUES (".(int)$_GET['Ticket'].",'".base64_encode($_POST['answer'])."','Player','".time()."');");
				if(mssql_num_rows($sqlQ) == 0) $tempResult .= LDPU_READ_TICKET_TEXT_TICKET_NOT_FOUND;
				else
				{
					$tempResult .= "<em>".LDPU_READ_TICKET_TEXT_ID."</em>: <strong>".$_GET['Ticket']."</strong><br />
									<em>".LDPU_READ_TICKET_TEXT_SUBJECT."</em>: <strong>".base64_decode($sql->subject)."</strong><br />
									<em>".LDPU_READ_TICKET_TEXT_DESCRIPTION."</em>: <strong>".nl2br(base64_decode($sql->description))."</strong><br />
									<em>".LDPU_READ_TICKET_TEXT_STATUS."</em>: ".($sql->status == 0 ? "<strong>".LDPU_READ_TICKET_TEXT_STATUS_OPEN."</strong>":"<strong>".LDPU_READ_TICKET_TEXT_STATUS_CLOSE."</strong>");	
					$tempResult .= "<h1>".LDPU_READ_TICKET_TEXT_HISTORY."</h1>";
					$sqlQ = $this->query("SELECT * FROM dbo.webTicketsAnswers WHERE id='".$_GET['Ticket']."' ORDER BY date DESC");
					if(mssql_num_rows($sqlQ) == 0) $tempResult .= "<div class='quadros'>".LDPU_READ_TICKET_TEXT_NO_HISTORY."</div>";
					while($sql = mssql_fetch_object($sqlQ))
					{
						$tempResult .= "<div class='quadros'><em>".LDPU_READ_TICKET_TEXT_RESPONSE_BY."</em>: <strong>".$sql->answerBy."</strong><br /><em>".LDPU_READ_TICKET_TEXT_DATE."</em>: <strong>".date("d/m/Y g:i a",$sql->date)."</strong><br /><em>".LDPU_READ_TICKET_TEXT_DESCRIPTION."</em>: <strong>".nl2br(base64_decode($sql->description))."</strong><br /></div>";
					}
					if($ticketStatus == 0) $tempResult .= "<form action='?page=paneluser&amp;option=READ_TICKET&amp;Ticket=".$_GET['Ticket']."&amp;Write=true' method='post'><em>".LDPU_READ_TICKET_TEXT_SEND_RESPONSE.":</em><textarea name='answer'></textarea><input type='submit' class='button' value='".LDPU_READ_TICKET_TEXT_SUBMIT."' /></form>";
				}
			}
			$ldTpl->set("RespostWrite1", $tempResult);
		}
		
		private function setPermissions()
		{
			global $ldTpl;
			global $PANELUSER_PREMISSIONS;
			$ldTpl->set("MODIFY_DATA_HABILIT", $PANELUSER_PREMISSIONS['MODIFY_DATA'][0]); 
			$ldTpl->set("MODIFY_DATA_FREE", $PANELUSER_PREMISSIONS['MODIFY_DATA'][1]); 
			$ldTpl->set("MODIFY_DATA_VIP_S", $PANELUSER_PREMISSIONS['MODIFY_DATA'][2]); 
            $ldTpl->set("MODIFY_DATA_VIP_G", $PANELUSER_PREMISSIONS['MODIFY_DATA'][3]); 
            $ldTpl->set("MODIFY_DATA_VIP_3", $PANELUSER_PREMISSIONS['MODIFY_DATA'][4]); 
            $ldTpl->set("MODIFY_DATA_VIP_4", $PANELUSER_PREMISSIONS['MODIFY_DATA'][5]); 
			$ldTpl->set("MODIFY_DATA_VIP_5", $PANELUSER_PREMISSIONS['MODIFY_DATA'][6]); 
			
			$ldTpl->set("LOG_BUYS_HABILIT", $PANELUSER_PREMISSIONS['LOG_BUYS'][0]); 
			$ldTpl->set("LOG_BUYS_FREE", $PANELUSER_PREMISSIONS['LOG_BUYS'][1]); 
			$ldTpl->set("LOG_BUYS_VIP_S", $PANELUSER_PREMISSIONS['LOG_BUYS'][2]); 
            $ldTpl->set("LOG_BUYS_VIP_G", $PANELUSER_PREMISSIONS['LOG_BUYS'][3]); 
            $ldTpl->set("LOG_BUYS_VIP_3", $PANELUSER_PREMISSIONS['LOG_BUYS'][4]); 
            $ldTpl->set("LOG_BUYS_VIP_4", $PANELUSER_PREMISSIONS['LOG_BUYS'][5]); 
			$ldTpl->set("LOG_BUYS_VIP_5", $PANELUSER_PREMISSIONS['LOG_BUYS'][6]); 
			
			$ldTpl->set("MODIFY_PERSONALID_HABILIT", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][0]); 
			$ldTpl->set("MODIFY_PERSONALID_FREE", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][1]); 
			$ldTpl->set("MODIFY_PERSONALID_VIP_S", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][2]); 
            $ldTpl->set("MODIFY_PERSONALID_VIP_G", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][3]); 
            $ldTpl->set("MODIFY_PERSONALID_VIP_3", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][4]); 
            $ldTpl->set("MODIFY_PERSONALID_VIP_4", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][5]); 
			$ldTpl->set("MODIFY_PERSONALID_VIP_5", $PANELUSER_PREMISSIONS['MODIFY_PERSONALID'][6]); 
            
            $ldTpl->set("MASTER_RESET_HABILIT", $PANELUSER_PREMISSIONS['MASTER_RESET'][0]); 
            $ldTpl->set("MASTER_RESET_FREE", $PANELUSER_PREMISSIONS['MASTER_RESET'][1]); 
            $ldTpl->set("MASTER_RESET_VIP_S", $PANELUSER_PREMISSIONS['MASTER_RESET'][2]); 
            $ldTpl->set("MASTER_RESET_VIP_G", $PANELUSER_PREMISSIONS['MASTER_RESET'][3]); 
            $ldTpl->set("MASTER_RESET_VIP_3", $PANELUSER_PREMISSIONS['MASTER_RESET'][4]); 
            $ldTpl->set("MASTER_RESET_VIP_4", $PANELUSER_PREMISSIONS['MASTER_RESET'][5]); 
            $ldTpl->set("MASTER_RESET_VIP_5", $PANELUSER_PREMISSIONS['MASTER_RESET'][6]); 
			
			$ldTpl->set("CHANGE_NICK_HABILIT", $PANELUSER_PREMISSIONS['CHANGE_NICK'][0]); 
			$ldTpl->set("CHANGE_NICK_FREE", $PANELUSER_PREMISSIONS['CHANGE_NICK'][1]); 
			$ldTpl->set("CHANGE_NICK_VIP_S", $PANELUSER_PREMISSIONS['CHANGE_NICK'][2]); 
            $ldTpl->set("CHANGE_NICK_VIP_G", $PANELUSER_PREMISSIONS['CHANGE_NICK'][3]); 
            $ldTpl->set("CHANGE_NICK_VIP_3", $PANELUSER_PREMISSIONS['CHANGE_NICK'][4]); 
            $ldTpl->set("CHANGE_NICK_VIP_4", $PANELUSER_PREMISSIONS['CHANGE_NICK'][5]); 
			$ldTpl->set("CHANGE_NICK_VIP_5", $PANELUSER_PREMISSIONS['CHANGE_NICK'][6]);  
            
            $ldTpl->set("MANAGER_PHOTO_HABILIT", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][0]); 
			$ldTpl->set("MANAGER_PHOTO_FREE", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][1]); 
			$ldTpl->set("MANAGER_PHOTO_VIP_S", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][2]); 
            $ldTpl->set("MANAGER_PHOTO_VIP_G", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][3]); 
            $ldTpl->set("MANAGER_PHOTO_VIP_3", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][4]); 
            $ldTpl->set("MANAGER_PHOTO_VIP_4", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][5]); 
			$ldTpl->set("MANAGER_PHOTO_VIP_5", $PANELUSER_PREMISSIONS['MANAGER_PHOTO'][6]); 
			
			$ldTpl->set("BUY_VIPS_HABILIT", $PANELUSER_PREMISSIONS['BUY_VIPS'][0]); 
			$ldTpl->set("BUY_VIPS_FREE", $PANELUSER_PREMISSIONS['BUY_VIPS'][1]); 
			$ldTpl->set("BUY_VIPS_VIP_S", $PANELUSER_PREMISSIONS['BUY_VIPS'][2]); 
            $ldTpl->set("BUY_VIPS_VIP_G", $PANELUSER_PREMISSIONS['BUY_VIPS'][3]); 
            $ldTpl->set("BUY_VIPS_VIP_3", $PANELUSER_PREMISSIONS['BUY_VIPS'][4]); 
            $ldTpl->set("BUY_VIPS_VIP_4", $PANELUSER_PREMISSIONS['BUY_VIPS'][5]); 
			$ldTpl->set("BUY_VIPS_VIP_5", $PANELUSER_PREMISSIONS['BUY_VIPS'][6]); 
			
			$ldTpl->set("CONFIRM_PAYMENT_HABILIT", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][0]); 
			$ldTpl->set("CONFIRM_PAYMENT_FREE", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][1]); 
			$ldTpl->set("CONFIRM_PAYMENT_VIP_S", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][2]); 
            $ldTpl->set("CONFIRM_PAYMENT_VIP_G", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][3]); 
            $ldTpl->set("CONFIRM_PAYMENT_VIP_3", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][4]); 
            $ldTpl->set("CONFIRM_PAYMENT_VIP_4", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][5]); 
			$ldTpl->set("CONFIRM_PAYMENT_VIP_5", $PANELUSER_PREMISSIONS['CONFIRM_PAYMENT'][6]); 
			
			$ldTpl->set("OPEN_COMPLAINTS_HABILIT", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][0]); 
			$ldTpl->set("OPEN_COMPLAINTS_FREE", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][1]); 
			$ldTpl->set("OPEN_COMPLAINTS_VIP_S", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][2]); 
            $ldTpl->set("OPEN_COMPLAINTS_VIP_G", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][3]); 
            $ldTpl->set("OPEN_COMPLAINTS_VIP_3", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][4]); 
            $ldTpl->set("OPEN_COMPLAINTS_VIP_4", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][5]); 
			$ldTpl->set("OPEN_COMPLAINTS_VIP_5", $PANELUSER_PREMISSIONS['OPEN_COMPLAINTS'][6]); 
			
			$ldTpl->set("OPEN_TICKET_HABILIT", $PANELUSER_PREMISSIONS['OPEN_TICKET'][0]); 
			$ldTpl->set("OPEN_TICKET_FREE", $PANELUSER_PREMISSIONS['OPEN_TICKET'][1]); 
			$ldTpl->set("OPEN_TICKET_VIP_S", $PANELUSER_PREMISSIONS['OPEN_TICKET'][2]); 
            $ldTpl->set("OPEN_TICKET_VIP_G", $PANELUSER_PREMISSIONS['OPEN_TICKET'][3]); 
            $ldTpl->set("OPEN_TICKET_VIP_3", $PANELUSER_PREMISSIONS['OPEN_TICKET'][4]); 
            $ldTpl->set("OPEN_TICKET_VIP_4", $PANELUSER_PREMISSIONS['OPEN_TICKET'][5]); 
			$ldTpl->set("OPEN_TICKET_VIP_5", $PANELUSER_PREMISSIONS['OPEN_TICKET'][6]); 
			
			$ldTpl->set("READ_TICKET_HABILIT", $PANELUSER_PREMISSIONS['READ_TICKET'][0]); 
			$ldTpl->set("READ_TICKET_FREE", $PANELUSER_PREMISSIONS['READ_TICKET'][1]); 
			$ldTpl->set("READ_TICKET_VIP_S", $PANELUSER_PREMISSIONS['READ_TICKET'][2]); 
            $ldTpl->set("READ_TICKET_VIP_G", $PANELUSER_PREMISSIONS['READ_TICKET'][3]); 
            $ldTpl->set("READ_TICKET_VIP_3", $PANELUSER_PREMISSIONS['READ_TICKET'][4]); 
            $ldTpl->set("READ_TICKET_VIP_4", $PANELUSER_PREMISSIONS['READ_TICKET'][5]); 
			$ldTpl->set("READ_TICKET_VIP_5", $PANELUSER_PREMISSIONS['READ_TICKET'][6]); 
			
		}  
	}
}}
?>