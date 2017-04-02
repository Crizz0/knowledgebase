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
	'EXCEPTION_FIELD_MISSING'		=> 'Verplicht veld ontbreekt',
	'EXCEPTION_INVALID_ARGUMENT'	=> 'Ongeldig argument opgegeven voor `%1$s`. Reden: %2$s',
	'EXCEPTION_OUT_OF_BOUNDS'		=> 'Het veld `%1$s` heeft data ontvangen buiten haar grenzen',
	'EXCEPTION_TOO_LONG'			=> 'De opgave was langer dan de maximum lengte.',
	'EXCEPTION_NOT_UNIQUE'			=> 'De opgave was niet uniek.',
	'EXCEPTION_UNEXPECTED_VALUE'	=> 'Het veld `%1$s` ontving onverwachte data. Reden: %2$s',
	'EXCEPTION_ILLEGAL_CHARACTERS'	=> 'Op opgave bevatte illegale karakters.',
));
