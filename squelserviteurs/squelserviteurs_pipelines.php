<?php
/**
 * Options du plugin squelserviteurs au chargement
 *
 * @plugin     Squelette Serviteurs
 * @copyright  2016
 * @author     Pyrat
 * @licence    GNU/GPL
 * @package    SPIP\squelavignon\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function squelserviteurs_jqueryui_plugins($plugins){
	if (
			// Dans le public
			!test_espace_prive()
	) {
		$plugins[] = 'jquery.ui.autocomplete';
	}
	
	return $plugins;
}
