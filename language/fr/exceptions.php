<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 * French Translation - Philippe B.
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
	'EXCEPTION_FIELD_MISSING'		=> 'Champ requis manquant',
	'EXCEPTION_INVALID_ARGUMENT'	=> 'Argument spécifié invalide pour `%1$s`. Raison : %2$s',
	'EXCEPTION_OUT_OF_BOUNDS'		=> 'Le champ `%1$s` a reçu des données en dehors des bornes',
	'EXCEPTION_TOO_LONG'			=> 'L’entrée est plus longue que la longueur maximale.',
	'EXCEPTION_NOT_UNIQUE'			=> 'L’entrée n’est pas unique.',
	'EXCEPTION_UNEXPECTED_VALUE'	=> 'Le champ `%1$s` a reçu des données non attendues. Raison : %2$s',
	'EXCEPTION_ILLEGAL_CHARACTERS'	=> 'L’entrée contient des caractères interdits.',
));
