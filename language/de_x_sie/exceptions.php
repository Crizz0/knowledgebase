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
	'KB_EXCEPTION_FIELD_MISSING'		=> 'Pflichtfeld fehlt',
	'KB_EXCEPTION_INVALID_ARGUMENT'	=> 'Ungültige Angabe für `%1$s`. Grund: %2$s',
	'KB_EXCEPTION_OUT_OF_BOUNDS'		=> 'Das Feld `%1$s` enthält Daten außerhalb des Gültigkeitsbereichs.',
	'KB_EXCEPTION_TOO_LONG'			=> 'Die Eingabe ist zu lang',
	'KB_EXCEPTION_NOT_UNIQUE'			=> 'Die Eingabe ist nicht eindeutig',
	'KB_EXCEPTION_UNEXPECTED_VALUE'	=> 'Das Feld `%1$s` enthält unerwartete Daten. Grund: %2$s',
	'KB_EXCEPTION_ILLEGAL_CHARACTERS'	=> 'Die Eingabe enthält unerlaubte Zeichen.',
));
