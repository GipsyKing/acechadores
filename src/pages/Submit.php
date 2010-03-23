<?php
if (!$SAFE_INCLUDE) { return; }

class SubmitModule extends PageModule {
	protected $vars = array('url', 'titulo', 'remitente');

  public function run() {
		if ($this->vars['url'] && $this->vars['titulo']) {
			$record = array(
				'url' => $this->vars['url'],
				'name' => $this->vars['titulo'],
				'submitter' => $this->vars['remitente'],
			);
			$rs = Presa::$db->Execute("SELECT * FROM ac_links WHERE id = -1");
			if (Presa::$db->Execute(Presa::$db->GetInsertSQL($rs, $record))) {
				$this->showResult(true, $record);
			} else {
				$this->showResult(true, $record);
			}
		} else {
			$this->includeTemplate('page_submit.tpl');
		}
  }

	public function showResult($success, $data) {
		$this->presa->assign('submit_success', $success);
		if ($success) {
			$dialog = new Dialog("Tu enlace se ha enviado.");
		} else {
			$dialog = new Dialog("Ups... se ha producido un error al guardar tu enlace.", DIALOG_TYPE_ERROR);
		}
		$dialog->action = "/";
		$this->presa->assign('dialog', $dialog);
		$this->includeTemplate('page_submit_result.tpl');
	}
}

?>