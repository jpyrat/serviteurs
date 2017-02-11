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
function focusimage($img, $largeur, $hauteur, $position = 'center', $max='') {
	if (!$img) return('');
	
	include_spip('inc/filtres');
	$l = largeur($img);
	$h = hauteur($img);
	if ($max == 'l') {
		if ($l < $largeur) {
			$largeur = $l;
		}
	}
	if ($max == 'h') {
		if ($h < $hauteur) {
			$hauteur = $h;
		}
	}
	if (($l < $largeur) OR ($h < $hauteur)) {
		$img = filtrer('image_aplatir', $img, "png", 'ffffff');
		$img = filtrer('image_recadre', $img, "$largeur:$hauteur", '+', $position, 'transparent');
		$img = filtrer('image_recadre', $img, $largeur, $hauteur, $position, 'transparent');
	} else  {
		$img = filtrer('image_recadre', $img, "$largeur:$hauteur", '-', 'focus', 'transparent');
		$img = filtrer('image_reduire', $img, $largeur, $hauteur);
	}
	return $img;
}

function plagemois($start, $end) {
	$current = $start;
	$ret = array();

	while( $current<$end ){
		$ret[] = @date('m', $current);	
		$next = @date('Y-M-01', $current) . "+1 month";
		$current = @strtotime($next);
	}

	return $ret;
}

function sjm_enlien($t) {
	return extraire_attribut(expanser_liens('[->'.$t.']'), 'href');
}