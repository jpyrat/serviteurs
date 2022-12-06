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

// Masquer l'inscription aux evenements
// cf http://zone.spip.org/trac/spip-zone/changeset/33103
$GLOBALS['agenda_affiche_inscription'] = 'non';

if (!defined('_IMG_GD_QUALITE'))
	define('_IMG_GD_QUALITE', 95); // Haute qualité pour les images réduites ; voir http://contrib.spip.net/Astuces-SPIP
if (!defined('_MAX_MOTS_LISTE'))
	define('_MAX_MOTS_LISTE', 500);

if (!defined('_ACCESSIBILITE_CONSERVER_BULLE'))
	define('_ACCESSIBILITE_CONSERVER_BULLE',true); // Pour conserver les bulles d'aide volontaire sur les liens vers les documents
#if (!defined('_BONUX_STYLE'))
#	define('_BONUX_STYLE',1); // http://zone.spip.org/trac/spip-zone/changeset/35480
if (!defined('_LARGEUR_MODE_IMAGE'))
	define('_LARGEUR_MODE_IMAGE', 799); //  Voir http://permalink.gmane.org/gmane.comp.web.spip.zone/16461
if (!defined('_TITRER_DOCUMENTS'))
	define('_TITRER_DOCUMENTS', true); // Le titre des documents joints est automatiquement pris à partir du nom du fichier (avec mediatheque) ; Voir http://zone.spip.org/trac/spip-zone/changeset/41565

// Pour forcer le mode écran large
$GLOBALS['spip_ecran']=$_COOKIE['spip_ecran']='large';

// Activer HTML5 depuis le squelette uniquement dans le public, et jamais dans le privé
// Cf http://contrib.spip.net/Formidable-le-generateur-de-formulaires#forum488975
if (!test_espace_prive()) {
    $GLOBALS['meta']['version_html_max'] = 'html5';
} else {
	$GLOBALS['meta']['version_html_max'] = 'html4';
}

// Pour avoir un affichage compact des Saisies (admin et mails), cf http://zone.spip.org/trac/spip-zone/changeset/99576
if (!defined('_SAISIES_AFFICHAGE_COMPACT'))
	define('_SAISIES_AFFICHAGE_COMPACT', 'oui');

// Demander au compresseur CSS d'embarquer les images : cf https://core.spip.net/issues/3425
#$GLOBALS['compresseur_filtres_css'] = array('compresseur_embarquer_images_css');

$GLOBALS['toujours_paragrapher'] = true;
$GLOBALS['barre_typo_pas_de_fork_typo'] = false; // Pour tenir compte de http://zone.spip.org/trac/spip-zone/changeset/22723 et disposer des raccourcis typo supplémentaires !
if (!defined('_AUTOBR'))
	define('_AUTOBR', ''); // cf http://www.spip.net/fr_article5427.html (TextWheel)

//if (!defined('_PREVIEW_TOKEN'))
//	define('_PREVIEW_TOKEN', true); // http://core.spip.org/projects/spip/repository/revisions/21077 et http://core.spip.org/projects/spip/repository/revisions/21084

/*
	Le truc pour disposer dans #ENV{marker_icon_name} dans les squelettes.
	Merci à ARNO* : http://permalink.gmane.org/gmane.comp.web.spip.devel/55856
*/
#$_GET['marker_icon_name'] = '_Marker_icon'; // Pas utilisé

// Tous ces parametres sont inutiles et non pris en compte si le plugin cfg est installe
$GLOBALS['barre_typo_pas_de_fausses_puces'] = true;
$GLOBALS['BarreTypoEnrichie_Preserve_Header'] = true;
$GLOBALS['config_intertitre'] = true; // Necessaire pour empécher la configuration par CFG
$GLOBALS['debut_intertitre'] = '<h2 class="spip">';
$GLOBALS['fin_intertitre'] = '</h2>';
$GLOBALS['debut_intertitre_2'] = '<h3 class="spip">';
$GLOBALS['fin_intertitre_2'] = '</h3>';
$GLOBALS['debut_intertitre_3'] = '<h4 class="spip">';
$GLOBALS['fin_intertitre_3'] = '</h4>';
$GLOBALS['debut_intertitre_4'] = '<h5 class="spip">';
$GLOBALS['fin_intertitre_4'] = '</h5>';
$GLOBALS['debut_intertitre_5'] = '<h6 class="spip">';
$GLOBALS['fin_intertitre_5'] = '</h6>';

// Pour suivre les recommandations du RGAA :
$GLOBALS['debut_italique'] = '<em class="spip">';
$GLOBALS['fin_italique'] = '</em>';

// Pour pouvoir styler en appliquant : http://www.sovavsiti.cz/css/hr.html
$GLOBALS['ligne_horizontale'] = "\n<div class='hrspip'><hr class='spip' /></div>\n";

$GLOBALS['marqueur'] = (isset($GLOBALS['marqueur'])?$GLOBALS['marqueur']:'').':sjm'.md5(isset($GLOBALS['visiteur_session']['statut'])?$GLOBALS['visiteur_session']['statut']:'');