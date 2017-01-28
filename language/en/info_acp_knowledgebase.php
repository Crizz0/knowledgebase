<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
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
	// ACP modules
	'ACP_KNOWLEDGEBASE'				=> 'Knowledge Base',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Manage categories',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Knowledge Base settings',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Knowledge Base settings changed</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Approved Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Deleted Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Denied Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_UNAPPROVED_LOG'	=> '<strong>Unapproved Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Created new Knowledge Base category</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Updated Knowledge Base category information</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Moved Knowledge Base category</strong> %1$s <strong>below</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Moved Knowledge Base category</strong> %1$s <strong>above</strong> %2$s',
));
