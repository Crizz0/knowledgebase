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
	'ALL_CATEGORIES'		=> 'Alle Categorie&euml;n',
	'APPROVE'				=> 'Goedkeuren',
	'APPROVE_ARTICLE'		=> 'Artikel goedkeuren',
	'APPROVED'				=> 'Goedgekeurd',
	'ARTICLES'				=> 'Artikels',
	'ARTICLE_CONFIRM'		=> 'Ben je zeker dat je dit artikel wil %1$s?',
	'ARTICLE_DENIED'		=> 'Artikel afgekeurd',
	'ARTICLE_STORED_MOD'	=> 'Dit artikel is succesvol verzonden, Maar het zal moeten goedgekeurd worden door een moderator alvorens het publiekelijk zichtbaar is.',
	'ARTICLE_DISAPPROVED'	=> 'Artikel niet goedgekeurd',
	'AUTHOR'				=> 'Auteur',

	'BUTTON_APPROVE'		=> 'Goedkeuren',
	'BUTTON_DELETE'			=> 'Verwijder',
	'BUTTON_DENY'			=> 'Weiger',
	'BUTTON_EDIT'			=> 'Bewerk',
	'BUTTON_NEW_ARTICLE'	=> 'Nieuw artikel',
	'BUTTON_DISAPPROVE'		=> 'Weigeren',

	'CATEGORIES'	=> 'Categorie&euml;n',
	'CHANGE_POSTER'	=> 'Verander poster',

	'DELETE_ARTICLE'	    => 'Verwijder artikel',
	'DENIED'			    => 'Afgekeurd',
	'DENY'				    => 'Weigeren',
	'DENY_ARTICLE'		    => 'Weiger artikel',
	'DESCRIPTION'		    => 'Beschrijving',
	'DISAPPROVE'			=> 'Weigeren',
	'DISAPPROVE_ARTICLE'	=> 'Weiger artikel',
	'DISAPPROVED'			=> 'Geweigerd',

	'EDIT_ARTICLE'	=> 'Bewerk artikel',

	'EMTPY_TITLE'		=> 'Je moet een titel opgeven bij het posten van een artikel.',
	'EMPTY_DESCRIPTION'	=> 'Je moet een beschrijving opgeven bij het posten van een artikel.',
	'EMPTY_CATEGORY'	=> 'Je moet ten minste 1 categorie opgeven waartoe dit artikel behoort.',
	'EMPTY_TEXT'		=> 'Je moet een bericht opgeven bij het posten van een artikel.',

	'INVALID_MODE'	=> 'Ongeldige modus',
	'INVALID_TYPE'	=> 'Ongeldig type',

	'KNOWLEDGEBASE'				=> 'Kennisbank',
	'KNOWLEDGEBASE_EXPLAIN'		=> 'Dit gedeelte bevat gedetailleerde artikels voortbordurend op een aantal van de voorkomende problemen die gebruikers ondervinden. Artikels die ingezonden worden door de leden van het forum worden gecontroleerd door het team. Indien je geen antwoorden vind op je vragen raden we je aan om het forum eens te doorzoeken. Je kan ook de zoekfunctie gebruiken.',
	'KNOWLEDGEBASE_TITLE'		=> 'Bekijk de Kennisbank',

	'LAST_MODIFIED'		=> 'Laatst bewerkt',
	'LINK_TO_ARTICLE'	=> 'Link naar dit artikel',

	'NARROW_SEARCH'	=> 'Beperk uw zoekopdracht door het selecteren van een categorie',

	'NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artikel goedgekeurd</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artikel verwijderd</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artikel geweigerd</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artikel afgekeurd</strong>: %1$s',
	'NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Kennisbank artikel goedkeuring</strong> request: %1$s',

	'NO_ARTICLE'	=> 'Het opgevraagde artikel bestaat niet.',
	'NO_ARTICLES'	=> 'Er zijn geen artikels in de Kennisbank van deze categorie.',
	'NO_CATEGORY'	=> 'De opgevraagde categorie bestaat niet.',
	'NO_PAGE_MODE'	=> 'Ongeldige of geen pagina modus gespecificeerd.',

	'POST_ARTICLE'	=> 'Post een nieuw artikel',

	'TYPE'	=> 'Type',

	'VIEWING_KNOWLEDGEBASE'	=> 'Bekijkt de Kennisbank',

	'WRITTEN_BY'	=> 'Geschreven door',
	'WRITTEN_ON'	=> 'Geschreven op',
));
