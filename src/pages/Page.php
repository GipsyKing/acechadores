<?php
if (!$SAFE_INCLUDE) { return; }

define('REQUEST_VAR_TYPE_GET', 1);
define('REQUEST_VAR_TYPE_POST', 2);

/**
 * 
 */
abstract class PageModule {

	protected $vars = array();

  public function __construct($presa, $getVars, $postVars) {
    $this->presa = $presa;
		foreach($this->vars as $var) {
			if (isset($postVars[$var])) {
				$tmp_vars[$var] = new QueryVar(REQUEST_VAR_TYPE_POST, $postVars[$var]);
			}
		}
		$this->vars = $tmp_vars;
  }

  protected function includeTemplate($template) {
    $this->presa->includeTemplate($template);
  }

	protected function assign($var, $value) {
		$this->presa->assign($var, $value);
	}
}

class QueryVar {
	private $value;
	public function __construct($type, $value = null) {
		$this->type = $type;
		$this->value = $value;
	}
	public function __toString() {
		return $this->value;
	}
	public function set($value) {
		$this->value = $value;
	}
}

define('DIALOG_TYPE_ERROR', 1);
define('DIALOG_TYPE_INFO', 2);
define('DIALOG_TYPE_WARNING', 3);
define('DIALOG_DEFAULT_TITLE', "Información");
define('DIALOG_ERROR_TITLE', "Error");
class Dialog {
	public $message, $title, $tipo, $action, $buttonlabel;
	public function __construct($message, $tipo=DIALOG_TYPE_INFO, $title=null, $action="", $buttonlabel="Aceptar") {
		$this->message = $message;
		if ($title == null && $tipo == DIALOG_TYPE_INFO) {
			$title = DIALOG_DEFAULT_TITLE;
		} else if ($title == null && $tipo == DIALOG_TYPE_ERROR) {
			$title = DIALOG_ERROR_TITLE;
		}
		$this->title = $title;
		$this->tipo = $tipo;
		$this->action = $action;
		$this->buttonlabel = $buttonlabel;
	}
}

?>
