<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * Nederlandse vertaling @ Solidjeuh <https://www.froddelpower.be>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_KNOWLEDGEBASE'				=> 'Kennisbank',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Beheer categorie&euml;n',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Kennisbank Instellingen',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Kennisbank instellingen gewijzigd</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Goedgekeurde Kennisbank artikels</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Verwijderde Kennisbank artikels</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Geweigerde Kennisbank artikels</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Afgekeurde Kennisbank artikels</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Maakte nieuwe Kennisbank categorie aan</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Verwijderde Kennisbank categorie</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Update Kennisbank categorie informatie</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Verplaatste Kennisbank categorie</strong> %1$s <strong>naar onder</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Verplaatste Kennisbank categorie</strong> %1$s <strong>naar boven</strong> %2$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Hier kan je de hoofd instellingen configureren van de Kennisbank.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Schakel kennisbank in',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Toon Kennisbank link in de header',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Kennisbank link icoon',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Vul de naam in van een <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icoon om te gebruiken voor de kennisbank link in de header. Laat dit veld leeg als je geen kennisbank icoon wenst.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'Het Kennisbank link icoon bevat ongeldige karakters.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Kennisbank instellingen opgeslagen.',
	
	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Categorie succesvol verwijderd.<br /><br />Houd er rekening mee dat er %d artikel was in deze categorie die reeds toebehoorde tot de nieuwe categorie. Het volgende artikel was reeds aanwezig:<br />%s',
		2	=> 'Categorie succesvol verwijderd.<br /><br />Houd er rekening mee dat er %d artikels waren in deze categorie die reeds toebehoorde tot de nieuwe categorie. De volgende artikels waren reeds aanwezig:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Categorie succesvol verwijderd.<br /><br />Houd er rekening mee dat er %d artikel was in deze categorie die reeds toebehoorde tot de nieuwe categorie. Het volgende artikel werd <b><u>niet</u></b> verwijderd:<br />%s',
		2	=> 'Categorie succesvol verwijderd.<br /><br />Houd er rekening mee dat er %d artikels waren in deze categorie die reeds toebehoorde tot de nieuwe categorie. De volgende artikels werden <b><u>niet</u></b> verwijderd:<br />%s',
	),	

	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'Vanaf deze pagina kunt u categorie&euml;n toevoegen, bewerken, verwijderen en sorteren. Een categorie is een groep van gerelateerde artikels. Elke categorie een ongelimiteerd aantal artikels bevatten.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Categorie',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Maak categorie',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Met behulp van het onderstaande formulier kunt een nieuwe categorie aanmaken die in uw kennisbank weergegeven wordt.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Verwijder categorie',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Door gebruik te maken van het onderstaande formulier kunt u een bestaande categorie verwijderen uit de kennisbank. U kunt alle artikelen in verband met deze categorie te verwijderen of verplaatsen naar een andere categorie. <strong>Artikels die bestaan in andere categorie&euml;n zullen niet verwijderd of verplaatst worden.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Bewerk categorie',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Door gebruik te maken van het onderstaande formulier kan je een bestaande categorie die getoond wordt in de kennisbank updaten.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'De link is beschadigd. De hash is ongeldig.',
	'ACP_ARTICLES'								=> 'Artikels',
	'ACP_CATEGORIES'							=> 'Categorie&euml;n',
	'ACP_CATEGORY_SETTINGS'						=> 'Categorie instellingen',
	'ACP_CATEGORY_NAME'							=> 'Categorie naam',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Categorie namen worden getoond op de index, viewcategory en viewarticle pagina. Categorie namen worden ook gebruikt om je categorie&euml;n te identificeren wanneer je ze beheert in het beheerderspaneel.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Categorie beschrijving',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'De categorie beschrijving wordt getoond op de viewcategory pagina.',
	'ACP_ADD_CATEGORY'							=> 'Maak nieuwe categorie',
	'ACP_DELETE_ARTICLES'						=> 'Verwijder artikels',
	'ACP_MOVE_ARTICLES'							=> 'Verplaatst artikels',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> 'Ben je zeker dat u deze categorie wenst te verwijderen?',
	'ACP_CATEGORY_ADDED'						=> 'Categorie succesvol toegevoegd.',
	'ACP_CATEGORY_DELETED'						=> 'Categorie succesvol verwijderd.',
	'ACP_CATEGORY_EDITED'						=> 'Categorie succesvol bewerkt.',
));
