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
	'EXCEPTION_FIELD_MISSING'		=> 'Required field missing',
	'EXCEPTION_INVALID_ARGUMENT'	=> 'Invalid argument specified for `%1$s`. Reason: %2$s',
	'EXCEPTION_OUT_OF_BOUNDS'		=> 'The field `%1$s` received data beyond its bounds',
	'EXCEPTION_TOO_LONG'			=> 'The input was longer than the maximum length.',
	'EXCEPTION_NOT_UNIQUE'			=> 'The input was not unique.',
	'EXCEPTION_UNEXPECTED_VALUE'	=> 'The field `%1$s` received unexpected data. Reason: %2$s',
	'EXCEPTION_ILLEGAL_CHARACTERS'	=> 'The input contained illegal characters.',
));
