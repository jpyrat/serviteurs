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


if (!isset($GLOBALS['z_blocs']))
	$GLOBALS['z_blocs'] = array('content','off-canvas','head','head_js','header','footer');

// Pour suivre les recommandations du RGAA :
$GLOBALS['debut_italique'] = '<em class="spip">';
$GLOBALS['fin_italique'] = '</em>';

// Masquer l'inscription aux evenements
// cf http://zone.spip.org/trac/spip-zone/changeset/33103
$GLOBALS['agenda_affiche_inscription'] = 'non';