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
	'ACL_CAT_KNOWLEDGEBASE'	=> 'Knowledge Base',

	'ACL_U_KB_READ'			=> 'Kann die Knowledge Base sehen',
	'ACL_U_KB_POST'			=> 'Kann neue Beiträge hinzufügen',
	'ACL_U_KB_EDIT'			=> 'Kann eigene Beiträge ändern',
	'ACL_U_KB_DELETE'		=> 'Kann eigene Beiträge löschen',
	'ACL_U_KB_NOAPPROVE'	=> 'Kann Beiträge ohne Freigabe veröffentlichen',

	'ACL_M_KB_EDIT'			=> 'Kann Beiträge hinzufügen',
	'ACL_M_KB_DELETE'		=> 'Kann Beiträge löschen',
	'ACL_M_KB_APPROVE'		=> 'Kann Beiträge genehmigen<br /><em>Die beinhaltet auch ablehnen und verweigern!</em>',
	'ACL_M_KB_CHGPOSTER'	=> 'Kann Autor ändern',

	'ACL_A_KB_MANAGE'		=> 'Kann Knowledge Base verwalten',
));
