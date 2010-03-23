<?php
if (!$SAFE_INCLUDE) { return; }

class FrontpageModule extends PageModule {

  public function run() {
    $this->includeTemplate('page_frontpage.tpl');
		$sql = "SELECT ac_links.*, (ac_votes.value * ac_votes.votes) AS karma
						FROM ac_links
						LEFT JOIN ac_votes
							ON ac_votes.link = ac_links.id
						ORDER BY karma DESC
						LIMIT 30";
		$rs = Presa::$db->GetAssoc($sql);
		$this->assign('links', $rs);
		
		$tips = array(
		  'puedes abrir enlaces en una pestaña nueva haciendo click con el botón del 
      centro, o manteniendo CTRL?',
      'la función de búsqueda de esta página no está implementada?',
      'As-Ocho, supuestamente de picas, era la mano del muerto?',
      'puedes envíar un enlace? (Sí, lo sabías.)',
      'tienes que acechar siempre?',
      'la monarquía le cuesta 3€ al mes a <em>cada</em> español?',
      'puedes (podrás) votar a favor o en contra de un enlace pinchando en las
      flechicas?',
      'Google Chrome es más rápido que firefox, y es open source?
      <a href="http://www.google.com/chrome">Descárgalo aqui</a>', 
		);
		$randomTip = $tips[(rand(0,count($tips)-1))];
		$this->assign('tip', $randomTip);
  }
}

?>
