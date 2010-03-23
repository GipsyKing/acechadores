<?php

if (!defined('DIR_PREFIX')) {
	define('DIR_PREFIX', '');
}
/**
 * $_GET, $_POST and $_SERVER: This is the only class that accesses these global variables. They must be passed to any
 *     method calls.
 * $_SESSION: TODO: make a wrapper class
 */

class Presa {

	private $smarty;
	public static $db;

	public function __construct($ajax=false) {
		$this->initConfig();
		$this->makeSession();
		
		if (!$ajax) {
			$this->makeSmarty();
		}

		$this->includeOssLib('adodb/adodb-exceptions.inc.php');
		$this->includeOssLib('adodb/adodb.inc.php');
		self::$db = ADONewConnection($this->config['dbdriver']."://dbo292215131:.nnNYYvP@db188.1and1.es/db292215131");
		self::$db->debug=false;
		self::$db->SetFetchMode(ADODB_FETCH_ASSOC);
    //$this->loadInterfaces(array('Module'));

		$this->includeOssLib('htmlpurifier/library/HTMLPurifier.auto.php');

		if (!$ajax) {
			$this->readParameters();
		} else {
			$this->readAjaxParameters();
		}
	}

	private function initConfig() {
		$this->config = array(
			'smarty_root' => '../smarty/',
			'smarty_template_dir' => 'tpl/',
			'smarty_compile_dir' => 'bin/',
			'url' => 'acechadores.es',
			'dbdriver' => 'mysqli',
		);
	}

	private function makeSession() {
		if (!defined('SESSION_NAME')) {
			define('SESSION_NAME', 'acechadores');
		}
		session_name(SESSION_NAME);
		session_start();
	}

	private function includeOssLib($path) {
		include(DIR_PREFIX.'libs_oss/'.$path);
	}

	private function makeSmarty() {
		include(DIR_PREFIX.$this->config['smarty_root'].'Smarty.class.php');
		$this->smarty = new Smarty();
		$this->smarty->template_dir = $this->config['smarty_template_dir'];
		$this->smarty->compile_dir = $this->config['smarty_compile_dir'];
		
		$this->smarty->assign('lang', 'es');
		$this->smarty->assign('baseurl', $this->config['url']);
		$this->smarty->debugging = 0;
	}
	
	private function loadInterfaces($array) {
	  foreach($array as $interface) {
	   include('src/interfaces/'.$interface.'.interface.php');
	  }
	}

	private function readParameters() {
		if (isset($_GET['submit'])) {
			$this->includeModule('Submit');
		} else {
			$this->includeModule('Frontpage');
		}
	}
	
	private function includeModule($module) {
    $SAFE_INCLUDE = true;
    include(DIR_PREFIX.'src/pages/Page.php');
    include(DIR_PREFIX.'src/pages/'.$module.'.php');
    $className = ucwords($module).'Module';
    $module = new $className($this, $_GET, $_POST);
    $module->run();
	}
	
	public function includeTemplate($template) {
	  $this->smarty->assign('page_tpl', $template);
	}

	public function assign($var, $value) {
		$this->smarty->assign($var, $value);
	}

	public function display() {
		$this->smarty->display('index.tpl');
	}

	public function getDb() {
		return self::$db;
	}

	private function readAjaxParameters() {
		if (isset($_GET['link'])) {
			$this->vote($_GET['link'], $_GET['vote']);
		}
	}

	private function vote($link, $vote) {
		$rs = self::$db->Execute("SELECT * FROM ac_votes WHERE link = ".(int)$link);
		if ($rs->fields['link'] > 0) {
			try {
				$rs = self::$db->Execute("UPDATE ac_votes SET votes = votes + 1, value = value + ".(int)$vote." WHERE link = ".(int)$link);
				echo "OK";
			} catch (exception $e) {
				echo "FAIL\n";
				echo $e->sql."\n";
				echo $e->msg;
				//adodb_backtrace($e->gettrace());
			}
		} else {
			var_dump($rs);
			try {
				$rs = self::$db->Execute("INSERT INTO ac_votes SET votes = 1, value = ".(int)$vote.", link = ".(int)$link);
				echo "OK";
			} catch (exception $e) {
				echo "FAIL\n";
				echo $e->sql."\n";
				echo $e->msg;
				//adodb_backtrace($e->gettrace());
			}
		}
	}
}


?>
