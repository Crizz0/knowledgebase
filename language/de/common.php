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
	'KB_ALL_CATEGORIES'			=> 'Alle Kategorien',
	'KB_APPROVE'				=> 'Veröffentlichen',
	'KB_APPROVE_ARTICLE'		=> 'Artikel veröffentlichen',
	'KB_APPROVED'				=> 'Veröffentlicht',
	'KB_ARTICLES'				=> 'Artikel',
	'KB_ARTICLE_CONFIRM'		=> 'Bist du dir sicher, dass du diesen Artikel %1$s willst?',
	'KB_ARTICLE_DENIED'			=> 'Artikel abgelehnt',
	'KB_ARTICLE_STORED_MOD'		=> 'Dieser Artikel wurde erfolgreich gespeichert und wird durch die Moderatoren freigegeben.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Artikel zurückgestellt',
	'KB_AUTHOR'					=> 'Autor',

	'KB_BUTTON_APPROVE'		=> 'Veröffentlichen',
	'KB_BUTTON_DELETE'			=> 'Löschen',
	'KB_BUTTON_DENY'			=> 'Ablehnen',
	'KB_BUTTON_EDIT'			=> 'Bearbeiten',
	'KB_BUTTON_NEW_ARTICLE'	=> 'Neuer Artikel',
	'KB_BUTTON_DISAPPROVE'		=> 'Zurückstellen',

	'KB_CATEGORIES'			=> 'Kategorie',
	'KB_CHANGE_POSTER'			=> 'Ändere Autor',

	'KB_DELETE_ARTICLE'		=> 'Artikel löschen',
	'KB_DENIED'				=> 'Abgelehnt',
	'KB_DENY'					=> 'ablehnen',
	'KB_DENY_ARTICLE'			=> 'Artikel ablehnen',
	'KB_DESCRIPTION'			=> 'Beschreibung',
	'KB_DISAPPROVE'				=> 'zurückstellen',
	'KB_DISAPPROVE_ARTICLE'		=> 'Artikel zurückstellen',
	'KB_DISAPPROVED'			=> 'Zurückgestellt',

	'KB_EDIT_ARTICLE'			=> 'Artikel ändern',

	'KB_EMPTY_TITLE'			=> 'Bitte einen Titel angeben.',
	'KB_EMPTY_DESCRIPTION'		=> 'Bitte eine Beschreibung angeben.',
	'KB_EMPTY_CATEGORY'			=> 'Bitte mindestens eine Kategorie angeben.',
	'KB_EMPTY_TEXT'				=> 'Bitte einen Artikeltext angeben.',

	'KB_INVALID_MODE'			=> 'Ungültiger Modus',
	'KB_INVALID_TYPE'			=> 'Ungültiger Typ',

	'KNOWLEDGEBASE'			=> 'Knowledge Base',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'In der Knowledge Base werden die häufigsten Fragen und Probleme behandelt. Die Artikel wurden von Mitgliedern erstellt und durch das Moderatoren Team auf Richtigkeit überprüft. Wenn hier nicht die Antwort auf eine Frage zu finden ist, empfehlen wir, die Foren zu durchsuchen und die Suche zu nutzen.',
	'KNOWLEDGEBASE_TITLE'	=> 'Knowledge Base ansehen',

	'KB_LAST_MODIFIED'			=> 'zuletzt geändert',
	'KB_LAST_MODIFIED_BY'		=> 'zuletzt geändert von',
	'KB_LINK_TO_ARTICLE'		=> 'Link zu diesem Artikel',

	'KB_NARROW_SEARCH'			=> 'Bitte wähle eine Kategorie aus, um die Suche zu verfeinern',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artikel veröffentlicht</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artikel gelöscht</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artikel abgelehnt</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artikel zurückgestellt</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Freigabeanfrage zu Knowledge Base Artikel:</strong> %1$s',

	'KB_NO_ARTICLE'			=> 'Der aufgerufene Artikel existiert nicht.',
	'KB_NO_ARTICLES'			=> 'Es gibt keine Artikel, die dem gewählten Filter entsprechen.',
	'KB_NO_CATEGORY'			=> 'Die aufgerufene Kategorie existiert nicht.',
	'KB_NO_PAGE_MODE'			=> 'Ungültiger Aufruf der Seite',

	'KB_POST_ARTICLE'			=> 'Neuen Artikel verfassen',

	'KB_TYPE'					=> 'Typ',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Knowledge Base ansehen',

	'KB_WRITTEN_BY'			=> 'Geschrieben von',
	'KB_WRITTEN_ON'			=> 'Veröffentlicht am',
));
