<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 * Brazilian Portuguese translation by eunaumtenhoid [ver 1.0.0] (https://github.com/eunaumtenhoid)
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
	'KB_EXCEPTION_FIELD_MISSING'		=> 'Campo obrigatório em falta',
	'KB_EXCEPTION_INVALID_ARGUMENT'	=> 'Argumento inválido especificado para `%1$s`. Razão: %2$s',
	'KB_EXCEPTION_OUT_OF_BOUNDS'		=> 'O campo `%1$s` Recebeu dados além de seus limites',
	'KB_EXCEPTION_TOO_LONG'			=> 'A entrada foi maior do que o comprimento máximo.',
	'KB_EXCEPTION_NOT_UNIQUE'			=> 'A entrada não foi única.',
	'KB_EXCEPTION_UNEXPECTED_VALUE'	=> 'O campo `%1$s` Recebeu dados inesperados. Razão: %2$s',
	'KB_EXCEPTION_ILLEGAL_CHARACTERS'	=> 'A entrada continha caracteres ilegais.',
));
