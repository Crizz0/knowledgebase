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
	'KB_ALL_CATEGORIES'		=> 'Alle Categorie&euml;n',
	'KB_APPROVE'				=> 'Goedkeuren',
	'KB_APPROVE_ARTICLE'		=> 'Artikel goedkeuren',
	'KB_APPROVED'				=> 'Goedgekeurd',
	'KB_ARTICLES'				=> 'Artikels',
	'KB_ARTICLE_CONFIRM'		=> 'Ben je zeker dat je dit artikel wil %1$s?',
	'KB_ARTICLE_DENIED'		=> 'Artikel afgekeurd',
	'KB_ARTICLE_STORED_MOD'	=> 'Dit artikel is succesvol verzonden, Maar het zal moeten goedgekeurd worden door een moderator alvorens het publiekelijk zichtbaar is.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Artikel niet goedgekeurd',
	'KB_AUTHOR'				=> 'Auteur',

	'KB_BUTTON_APPROVE'		=> 'Goedkeuren',
	'KB_BUTTON_DELETE'			=> 'Verwijder',
	'KB_BUTTON_DENY'			=> 'Weiger',
	'KB_BUTTON_EDIT'			=> 'Bewerk',
	'KB_BUTTON_NEW_ARTICLE'	=> 'Nieuw artikel',
	'KB_BUTTON_DISAPPROVE'		=> 'Weigeren',

	'KB_CATEGORIES'	=> 'Categorie&euml;n',
	'KB_CHANGE_POSTER'	=> 'Verander poster',

	'KB_DELETE_ARTICLE'	    => 'Verwijder artikel',
	'KB_DENIED'			    => 'Afgekeurd',
	'KB_DENY'				    => 'Weigeren',
	'KB_DENY_ARTICLE'		    => 'Weiger artikel',
	'KB_DESCRIPTION'		    => 'Beschrijving',
	'KB_DISAPPROVE'			=> 'Weigeren',
	'KB_DISAPPROVE_ARTICLE'	=> 'Weiger artikel',
	'KB_DISAPPROVED'			=> 'Geweigerd',

	'KB_EDIT_ARTICLE'	=> 'Bewerk artikel',

	'KB_EMPTY_TITLE'		=> 'Je moet een titel opgeven bij het posten van een artikel.',
	'KB_EMPTY_DESCRIPTION'	=> 'Je moet een beschrijving opgeven bij het posten van een artikel.',
	'KB_EMPTY_CATEGORY'	=> 'Je moet ten minste 1 categorie opgeven waartoe dit artikel behoort.',
	'KB_EMPTY_TEXT'		=> 'Je moet een bericht opgeven bij het posten van een artikel.',

	'KB_INVALID_MODE'	=> 'Ongeldige modus',
	'KB_INVALID_TYPE'	=> 'Ongeldig type',

	'KB_KNOWLEDGEBASE'				=> 'Kennisbank',
	'KB_KNOWLEDGEBASE_EXPLAIN'		=> 'Dit gedeelte bevat gedetailleerde artikels voortbordurend op een aantal van de voorkomende problemen die gebruikers ondervinden. Artikels die ingezonden worden door de leden van het forum worden gecontroleerd door het team. Indien je geen antwoorden vind op je vragen raden we je aan om het forum eens te doorzoeken. Je kan ook de zoekfunctie gebruiken.',
	'KB_KNOWLEDGEBASE_TITLE'		=> 'Bekijk de Kennisbank',

	'KB_LAST_MODIFIED'		=> 'Laatst bewerkt',
'KB_LAST_MODIFIED_BY'	=> 'Last modified by',
	'KB_LINK_TO_ARTICLE'	=> 'Link naar dit artikel',

	'KB_NARROW_SEARCH'	=> 'Beperk uw zoekopdracht door het selecteren van een categorie',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artikel goedgekeurd</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artikel verwijderd</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artikel geweigerd</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artikel afgekeurd</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Kennisbank artikel goedkeuring</strong> request: %1$s',

	'KB_NO_ARTICLE'	=> 'Het opgevraagde artikel bestaat niet.',
	'KB_NO_ARTICLES'	=> 'Er zijn geen artikels in de Kennisbank van deze categorie.',
	'KB_NO_CATEGORY'	=> 'De opgevraagde categorie bestaat niet.',
	'KB_NO_PAGE_MODE'	=> 'Ongeldige of geen pagina modus gespecificeerd.',

	'KB_POST_ARTICLE'	=> 'Post een nieuw artikel',

	'KB_TYPE'	=> 'Type',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Bekijkt de Kennisbank',

	'KB_WRITTEN_BY'	=> 'Geschreven door',
	'KB_WRITTEN_ON'	=> 'Geschreven op',
));
