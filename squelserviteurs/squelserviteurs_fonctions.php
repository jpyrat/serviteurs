<?php
/**
 * Options du plugin squelserviteurs au chargement
 *
 * @plugin     Squelette Serviteurs
 * @copyright  2016
 * @author     Pyrat
 * @licence    GNU/GPL
 * @package    SPIP\squelavignon\Options
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function sinoncrayon($texte, $sinon = '') {
	if ((isset($GLOBALS['visiteur_session']['statut']) AND $GLOBALS['visiteur_session']['statut']=='0minirezo')) {
		return sinon($texte, $sinon);
	} else {
		return $texte;
	}
}

// Permet de recadrer une image en la centrant sur son focus (plugin Centre Image)
function focusimage($img, $largeur, $hauteur, $position = 'center') {
	if (!$img) return('');
	
	include_spip('inc/filtres');
	if ((largeur($img) < $largeur) OR (hauteur($img) < $hauteur)) {
		$img = filtrer('image_recadre', $img, "$largeur:$hauteur", '+', $position, 'transparent');
		$img = filtrer('image_recadre', $img, $largeur, $hauteur, $position, 'transparent');
	} else  {
		$img = filtrer('image_recadre', $img, "$largeur:$hauteur", '-', 'focus', 'transparent');
		$img = filtrer('image_reduire', $img, $largeur, $hauteur);
	}
	return $img;
}
