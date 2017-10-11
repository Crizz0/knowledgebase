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
	'ACL_CAT_KNOWLEDGEBASE'	=> 'Base de Conocimiento',

	'ACL_U_KB_READ'			=> 'Puede ver la Base de Conocimiento',
	'ACL_U_KB_POST'			=> 'Puede crear nuevos artículos',
	'ACL_U_KB_EDIT'			=> 'Puede editar sus propios artículos',
	'ACL_U_KB_DELETE'		=> 'Puede borrar sus propios artículos',
	'ACL_U_KB_NOAPPROVE'	=> 'Pueden publicar artículos sin aprobación',

	'ACL_M_KB_EDIT'			=> 'Puede editar artículos',
	'ACL_M_KB_DELETE'		=> 'Puede borrar artículos',
	'ACL_M_KB_APPROVE'		=> 'Puede aprobar artículos<br /><em>¡Este permiso incluye desaprobar y denegar!</em>',
	'ACL_M_KB_CHGPOSTER'	=> 'Puede cambiar el autor del artículo',

	'ACL_A_KB_MANAGE'		=> 'Puede gestionar la Base de Conocimiento',
));
