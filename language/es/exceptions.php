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
	'EXCEPTION_FIELD_MISSING'		=> 'Falta el campo requerido',
	'EXCEPTION_INVALID_ARGUMENT'	=> 'Se ha especificado un argumento no válido para `%1$s`. Razón: %2$s',
	'EXCEPTION_OUT_OF_BOUNDS'		=> 'El campo `%1$s` tiene datos recibidos fuera de sus límites',
	'EXCEPTION_TOO_LONG'			=> 'La entrada era más larga que la longitud máxima.',
	'EXCEPTION_NOT_UNIQUE'			=> 'La entrada no era única.',
	'EXCEPTION_UNEXPECTED_VALUE'	=> 'Elcampo `%1$s` recibió datos inesperados. Razón: %2$s',
	'EXCEPTION_ILLEGAL_CHARACTERS'	=> 'La entrada contenía caracteres ilegales.',
));
