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
	'ACP_KNOWLEDGEBASE'				=> 'Knowledge Base',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Manage categories',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Knowledge Base settings',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Knowledge Base settings changed</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Approved Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Deleted Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Denied Knowledge Base article</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Disapproved Knowledge Base article</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Created new Knowledge Base category</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Deleted Knowledge Base category</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Updated Knowledge Base category information</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Moved Knowledge Base category</strong> %1$s <strong>below</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Moved Knowledge Base category</strong> %1$s <strong>above</strong> %2$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Here you can configure the main settings for Knowledge Base.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Enable Knowledge Base',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Display Knowledge Base link in the header',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Knowledge Base link icon',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Enter the name of a <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon to use for the Knowledge Base link in the header. Leave this field blank for no Knowledge Base icon.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'The Knowledge Base link icon contained invalid characters.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Knowledge Base settings changed.',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Category successfully deleted.<br /><br />Please note that there was %d article in this category that already belonged to the new category. The following article was already present:<br />%s',
		2	=> 'Category successfully deleted.<br /><br />Please note that there were %d articles in this category that already belonged to the new category. The following articles were already present:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Category successfully deleted.<br /><br />Please note that there was %d article in this category that belonged to another category. The following article was <b><u>not</u></b> deleted:<br />%s',
		2	=> 'Category successfully deleted.<br /><br />Please note that there were %d articles in this category that belonged to another category. The following articles were <b><u>not</u></b> deleted:<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'From this page you can add, edit, delete and re-order categories. A category is a group of related articles. Each category can have an unlimited number of articles.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Category',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Create category',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Using the form below you can create a new category which will be displayed in the Knowledge Base.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Delete category',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Using the form below you can delete an existing category in the Knowledge Base. You can delete all articles associated with this category or move them to another category. <strong>Articles that exist in other categories will not be deleted or moved.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Edit category',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Using the form below you can update an existing category which will be displayed in the Knowledge Base.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'The link is corrupted. The hash is invalid.',
	'ACP_ARTICLES'								=> 'Articles',
	'ACP_CATEGORIES'							=> 'Categories',
	'ACP_CATEGORY_SETTINGS'						=> 'Category settings',
	'ACP_CATEGORY_NAME'							=> 'Category name',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Category names are displayed on the index page for each article, the viewcategory page and the viewarticle page. Category names are also used to identify your categories when managing them in the ACP.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Category description',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'The category description is displayed on the index page when a category is selected.',
	'ACP_ADD_CATEGORY'							=> 'Create new category',
	'ACP_DELETE_ARTICLES'						=> 'Delete articles',
	'ACP_MOVE_ARTICLES'							=> 'Move articles',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> 'Are you sure you want to remove this category?',
	'ACP_CATEGORY_ADDED'						=> 'Category successfully added.',
	'ACP_CATEGORY_DELETED'						=> 'Category successfully removed.',
	'ACP_CATEGORY_EDITED'						=> 'Category successfully edited.',
));
