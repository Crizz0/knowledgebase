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
	'ACL_CAT_KNOWLEDGEBASE'	=> 'Base de connaissance',

	'ACL_U_KB_READ'			=> 'Peut consulter la base de connaissance.',
	'ACL_U_KB_POST'			=> 'Peut créer des nouveaux articles.',
	'ACL_U_KB_EDIT'			=> 'Peut modifier ses propres articles.',
	'ACL_U_KB_DELETE'		=> 'Peut supprimer ses propres articles.',
	'ACL_U_KB_NOAPPROVE'	=> 'Peut poster des articles sans approbation.',

	'ACL_M_KB_EDIT'			=> 'Peut modifier les articles.',
	'ACL_M_KB_DELETE'		=> 'Peut supprimer les articles.',
	'ACL_M_KB_APPROVE'		=> 'Peut approuver les articles.<br /><em>Cette permission inclut l’action de désapprobation et de refus d’un article !</em>',
	'ACL_M_KB_CHGPOSTER'	=> 'Peut modifier l’auteur d’un article.',

	'ACL_A_KB_MANAGE'		=> 'Peut gérer la base de connaissance.',
));
