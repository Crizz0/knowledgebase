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
	'ACL_CAT_KNOWLEDGEBASE'	=> 'Knowledge Base',

	'ACL_U_KB_READ'			=> 'Pode ver Knowledge Base',
	'ACL_U_KB_POST'			=> 'Pode criar novos artigos',
	'ACL_U_KB_EDIT'			=> 'Pode editar os próprios artigos ',
	'ACL_U_KB_DELETE'		=> 'Pode deletar os próprios artigos',
	'ACL_U_KB_NOAPPROVE'	=> 'Pode postar artigos sem aprovação',

	'ACL_M_KB_EDIT'			=> 'Pode editar artigos',
	'ACL_M_KB_DELETE'		=> 'Pode deletar artigos',
	'ACL_M_KB_APPROVE'		=> 'Pode aprovar artigos<br /><em> Esta permissão inclui desaprovação e negação!</em>',
	'ACL_M_KB_CHGPOSTER'	=> 'Pode mudar o autor do artigo',

	'ACL_A_KB_MANAGE'		=> 'Pode gerenciar Knowledge Base',
));
