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
	'ACP_KNOWLEDGEBASE'							=> 'Knowledge Base',
	'ACP_KNOWLEDGEBASE_MANAGE'					=> 'Kategorien verwalten',
	'ACP_KNOWLEDGEBASE_SETTINGS'				=> 'Knowledge Base Einstellungen',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'			=> '<strong>Knowledge Base: Einstellungen geändert</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Knowledge Base: Artikel genehmigt</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Knowledge Base: Artikel gelöscht</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Knowledge Base: Artikel abgelehnt</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Knowledge Base: Artikel zurückgestellt</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_ARTICLE_CREATED_LOG'		=> '<strong>Knowledge Base: Neuen Artikel erstellt</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_EDITED_LOG'		=> '<strong>Knowledge Base: Artikel geändert</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Knowledge Base: neue Kategorie angelegt</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Knowledge Base: Kategorie gelöscht</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Knowledge Base: Kategorie aktualisiert</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Knowledge Base: Kategorie nach unten verschoben </strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Knowledge Base: Kategorie nach oben verschoben</strong><br />» %1$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'		=> 'Hier können die wesentlichen Einstellungen vorgenommen werden.',
	'ACP_KNOWLEDGEBASE_ENABLE'					=> 'Knowledge Base aktivieren',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'				=> 'Knowledge Base Link im Header zeigen',
	'ACP_KNOWLEDGEBASE_FONT_ICON'				=> 'Knowledge Base Link Icon',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'		=> 'Namen eines <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> Icons eingeben. <br /> Dies wird vor dem Linknamen angezeigt. Lasse dieses Feld leer, wenn kein Icon angezeigt werden soll',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'		=> 'Das Knowledge Base Link Icon enthält ungültige Zeichen.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'		=> 'Knowledge Base Einstellungen gespeichert',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Kategorie erfolgreich gelöscht.<br /><br />Bitte beachte, dass es in dieser Kategorie bereits %d Artikel gab, der einer neuen Kategorie angehörte. Der folgende Artikel war bereits vorhanden:<br />%s',
		2	=> 'Kategorie erfolgreich gelöscht.<br /><br />Bitte beachte, dass es in dieser Kategorie bereits %d Artikel gab, die einer neuen Kategorie angehörten. Die folgenden Artikel war bereits vorhanden:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Kategorie erfolgreich gelöscht.<br /><br />Bitte beachte, dass es in dieser Kategorie bereits %d Artikel gab, der einer anderen Kategorie angehörte. Der folgende Artikel wurde <b><u>nicht</u></b> gelöscht:<br />%s',
		2	=> 'Kategorie erfolgreich gelöscht.<br /><br />Bitte beachte, dass es in dieser Kategorie bereits %d Artikel gab, die einer anderen Kategorie angehörten. Die folgenden Artikel wurden <b><u>nicht</u></b> gelöscht:<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'				=> 'Hier können Kategorien erstellt, gelöscht, geändert und neu sortiert werden. Eine Kategorie ist eine Gruppe für gleichartige Artikel. Jede Kategorie kann unendlich viele Artikel enthalten.',
	'ACP_KNOWLEDGEBASE_CATEGORY'					=> 'Kategorie',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'				=> 'Kategorie hinzufügen',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'		=> 'Erstellen von neuen Kategorien, die in der Knowledge Base angezeigt werden.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'				=> 'Kategorie löschen',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'		=> 'Löschen von bestehenden Kategorien, die in der Knowledge Base angezeigt werden. Es können alle Artikel dieser Kategorie gelöscht oder verschoben werden. <strong>Artikel, die bereits anderen Kategorien zugeordnet sind, werden nicht gelöscht oder verschoben</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'				=> 'Kategorie anpassen',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'		=> 'Anpassen von bestehenden Kategorien, die in der Knowledge Base angezeigt werden.',
	'ACP_KNOWLEDGEBASE_INVALID_HASH'				=> 'Der Link funktioniert nicht. Der Hash-Wert ist ungültig',
	'ACP_KNOWLEDGEBASE_ARTICLES'						=> 'Artikel',
	'ACP_KNOWLEDGEBASE_CATEGORIES'						=> 'Kategorien',
	'ACP_KNOWLEDGEBASE_CATEGORY_SETTINGS'				=> 'Einstellungen',
	'ACP_KNOWLEDGEBASE_CATEGORY_NAME'					=> 'Name der Kategorie',
	'ACP_KNOWLEDGEBASE_CATEGORY_NAME_EXPLAIN'			=> 'Die Kategorienamen werden in allen Übersichtsseiten und im Artikel angezeigt. Kategorienamen werden auch verwendet, um die Kategorien im ACP zu identifizieren.',
	'ACP_KNOWLEDGEBASE_CATEGORY_DESCRIPTION'			=> 'Beschreibung der Kategorie',
	'ACP_KNOWLEDGEBASE_CATEGORY_DESCRIPTION_EXPLAIN'	=> 'Die Beschreibung wird angezeigt, wenn sie auf der Index-Seite ausgewählt wird.',
	'ACP_KNOWLEDGEBASE_ADD_CATEGORY'					=> 'Neue Kategorie anlegen',
	'ACP_KNOWLEDGEBASE_DELETE_ARTICLES'					=> 'Artikel löschen',
	'ACP_KNOWLEDGEBASE_MOVE_ARTICLES'					=> 'Artikel verschieben',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_CONFIRM'			=> 'Soll die Kategorie wirklich gelöscht werden?',
	'ACP_KNOWLEDGEBASE_CATEGORY_ADDED'					=> 'Kategorie erfolgreich hinzugefügt.',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETED'				=> 'Kategorie erfolgreich gelöscht.',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDITED'					=> 'Kategorie erfolgreich geändert.',
));
