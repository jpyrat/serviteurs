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

// Permet de recadrer une image en la centrant sur son focus (plugin Centre Image)
function focusimage($img, $largeur, $hauteur, $position = 'center') {
	if (!$img) { return('');
	}

	$ext = pathinfo(supprimer_timestamp(extraire_attribut($img, 'src')), PATHINFO_EXTENSION);
	if ($ext === 'svg') {
		return $img;
	}

	$largeurimg = largeur($img);
	$hauteurimg = hauteur($img);

	$GLOBALS['Smush_Debraye'] = true;

	if (($largeurimg <= $largeur) and ($hauteurimg <= $hauteur)) {
		$img = filtrer('image_recadre', $img, $largeur, $hauteur, $position, 'transparent');
	} elseif (($largeurimg <= $largeur) or ($hauteurimg <= $hauteur)) {
		if ($largeurimg <= $largeur) {
			$img = filtrer('image_recadre', $img, "$largeurimg:$hauteur", '-', 'focus', 'transparent');
			$img = filtrer('image_graver', $img);
		} else {
			$img = filtrer('image_recadre', $img, "$largeur:$hauteurimg", '-', 'focus', 'transparent');
			$img = filtrer('image_graver', $img);
		}
		$img = filtrer('image_recadre', $img, $largeur, $hauteur, $position, 'transparent');
	} else {
		$img = filtrer('image_recadre', $img, "$largeur:$hauteur", '-', 'focus', 'transparent');
		$img = filtrer('image_graver', $img);
		$img = filtrer('image_reduire', $img, $largeur, $hauteur, $position, 'transparent');
	}

	$GLOBALS['Smush_Debraye'] = false;

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
