<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
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
	'ACP_KNOWLEDGEBASE'				=> 'Knowledge Base',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Kategorien verwalten',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Knowledge Base Einstellungen',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Knowledge Base: Einstellungen geändert</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Knowledge Base: Beitrag genehmigt</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Knowledge Base: Beitrag gelöscht</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Knowledge Base: Beitrag verweigert</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Knowledge Base: Beitrag abgelehnt</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Knowledge Base: neue Kategorie angelegt</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Knowledge Base: Kategorie gelöscht</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Knowledge Base: Kategorie aktualisiert</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Knowledge Base: Kategorie nach unten verschoben </strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Knowledge Base: Kategorie nach oben verschoben</strong><br />» %1$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Hier können die wesentlichen Einstellungen vorgenommen werden.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Knowledge Base aktivieren',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Knowledge Base link im Header zeigen',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Knowledge Base link icon',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Namen eines <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> Icons eingeben. <br /> Dies wird vor dem Linknamen angezeigt. Lasse dieses Feld leer, wenn kein Icon angezeigt werden soll',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'Das Knowledge Base link Icon enthält ungültige Zeichen.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Knowledge Base Einstellungen gespeichert',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Kategoprie erfolgreich gelöscht.<br /><br />Please note that there was %d article in this category that already belonged to the new category. The following article was already present:<br />%s',
		2	=> 'Kategoprie erfolgreich gelöscht.<br /><br />Please note that there were %d articles in this category that already belonged to the new category. The following articles were already present:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Kategoprie erfolgreich gelöscht.<br /><br />Please note that there was %d article in this category that belonged to another category. The following article was <b><u>not</u></b> deleted:<br />%s',
		2	=> 'Kategoprie erfolgreich gelöscht.<br /><br />Please note that there were %d articles in this category that belonged to another category. The following articles were <b><u>not</u></b> deleted:<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'From this page you can add, edit, delete and re-order categories. A category is a group of related articles. Each category can have an unlimited number of articles.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Kategorie',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Kategorie hinzufügen',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Using the form below you can create a new category which will be displayed in the Knowledge Base.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Kategorie löschen',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Using the form below you can delete an existing category in the Knowledge Base. You can delete all articles associated with this category or move them to another category. <strong>Articles that exist in other categories will not be deleted or moved.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Kategorie anpassen',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Using the form below you can update an existing category which will be displayed in the Knowledge Base.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'The link is corrupted. The hash is invalid.',
	'ACP_ARTICLES'								=> 'Beiträge',
	'ACP_CATEGORIES'							=> 'Kategorien',
	'ACP_CATEGORY_SETTINGS'						=> 'Einstellungen',
	'ACP_CATEGORY_NAME'							=> 'Name der Kategorie',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Die Kategorienamen werden allen Übersichtsseiten und im Artikel angezeigt. Kategorienamen werden auch verwendet, um die Kategorien im ACP zu identifizieren.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Beschreibung der Kategorie',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'Die Beschreibung wird angezeigt, wenn sie auf der Index-Seite ausgewählt wird.',
	'ACP_ADD_CATEGORY'							=> 'Neue Kategorie anlegen',
	'ACP_DELETE_ARTICLES'						=> 'Beiträge löschen',
	'ACP_MOVE_ARTICLES'							=> 'Beiträge verschieben',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> 'Soll die Kategorie wirklich gelöscht werden?',
	'ACP_CATEGORY_ADDED'						=> 'Kategorie erfolgreich hinzugefügt.',
	'ACP_CATEGORY_DELETED'						=> 'Kategorie erfolgreich gelöscht.',
	'ACP_CATEGORY_EDITED'						=> 'Kategorie erfolgreich geändert.',
));
