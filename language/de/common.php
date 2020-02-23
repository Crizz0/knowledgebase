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
	'ALL_CATEGORIES'		=> 'Alle Kategorien',
	'APPROVE'				=> 'Veröffentlichen',
	'APPROVE_ARTICLE'		=> 'Artikel veröffentlichen',
	'APPROVED'				=> 'Veröffentlicht',
	'ARTICLES'				=> 'Artikel',
	'ARTICLE_CONFIRM'		=> 'Bist du dir sicher, dass du diesen Artikel %1$s willst?',
	'ARTICLE_DENIED'		=> 'Artikel verweigert',
	'ARTICLE_STORED_MOD'	=> 'Dieser Artikel wurde erfolgreich gespeichert und wird durch die Moderatoren freigegeben.',
	'ARTICLE_DISAPPROVED'	=> 'Artikel zurückgestellt',
	'AUTHOR'				=> 'Autor',

	'BUTTON_APPROVE'		=> 'Veröffentlichen',
	'BUTTON_DELETE'			=> 'Löschen',
	'BUTTON_DENY'			=> 'Verweigern',
	'BUTTON_EDIT'			=> 'Bearbeiten',
	'BUTTON_NEW_ARTICLE'	=> 'Neuer Artikel',
	'BUTTON_DISAPPROVE'		=> 'Zurückstellen',

	'CATEGORIES'			=> 'Kategorie',
	'CHANGE_POSTER'			=> 'Ändere Autor',

	'DELETE_ARTICLE'		=> 'Artikel löschen',
	'DENIED'				=> 'Verweigert',
	'DENY'					=> 'ablehnen',
	'DENY_ARTICLE'			=> 'Artikel ablehnen',
	'DESCRIPTION'			=> 'Beschreibung',
	'DISAPPROVE'			=> 'Zurückstellen',
	'DISAPPROVE_ARTICLE'	=> 'Artikel zurückgestellt',
	'DISAPPROVED'			=> 'Zurückgestellt',

	'EDIT_ARTICLE'			=> 'Artikel ändern',

	'EMPTY_TITLE'			=> 'Bitte einen Titel angeben.',
	'EMPTY_DESCRIPTION'		=> 'Bitte eine Beschreibung angeben.',
	'EMPTY_CATEGORY'		=> 'Bitte mindestens eine Kategorie angeben.',
	'EMPTY_TEXT'			=> 'Bitte einen Artikeltext angeben.',

	'INVALID_MODE'			=> 'Ungültiger Modus',
	'INVALID_TYPE'			=> 'Ungültiger Typ',

	'KNOWLEDGEBASE'			=> 'Knowledge Base',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'In der Knowledge Base werden die häufigsten Fragen und Probleme behandelt. Die Artikel wurden von Mitgliedern erstellt und durch das Moderatoren Team auf Richtigkeit überprüft. Wenn hier nicht die Antwort auf eine Frage zu finden ist, empfehlen wir, die Foren zu durchsuchen und die Suche zu nutzen.',
	'KNOWLEDGEBASE_TITLE'	=> 'Knowledge Base ansehen',

	'LAST_MODIFIED'			=> 'zuletzt geändert',
	'LINK_TO_ARTICLE'		=> 'Link zu diesem Artikel',

	'NARROW_SEARCH'			=> 'Bitte wähle eine Kategorie aus, um die Suche zu verfeinern',

	'NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artikel veröffentlicht</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artikel gelöscht</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artikel verweigert</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artikel zurückgestellt</strong>: %1$s',
	'NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Freigabeanfrage zu Knowledge Base Artikel:</strong> %1$s',

	'NO_ARTICLE'			=> 'Der aufgerufene Artikel existiert nicht.',
	'NO_ARTICLES'			=> 'Es gibt keine Artikel, die dem gewählten Filter entsprechen.',
	'NO_CATEGORY'			=> 'Die aufgerufene Kategorie existiert nicht.',
	'NO_PAGE_MODE'			=> 'Ungültiger Aufruf der Seite',

	'POST_ARTICLE'			=> 'Neuen Artikel verfassen',

	'TYPE'					=> 'Typ',

	'VIEWING_KNOWLEDGEBASE'	=> 'Knowledge Base ansehen',

	'WRITTEN_BY'			=> 'Geschrieben von',
	'WRITTEN_ON'			=> 'Veröffentlicht am',
));
