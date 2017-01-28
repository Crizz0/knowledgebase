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
	// Settings page
	'ACP_KNOWLEDGEBASE'						=> 'Knowledge Base',
	'ACP_KNOWLEDGEBASE_SETTINGS'			=> 'Knowledge Base settings',
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Here you can configure the main settings for Knowledge Base.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Enable Knowledge Base',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Display Knowledge Base link in the header',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Knowledge Base link icon',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Enter the name of a <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> icon to use for the Knowledge Base link in the header. Leave this field blank for no Knowledge Base icon.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'The Knowledge Base link icon contained invalid characters.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Knowledge Base settings changed.',

	// Manage page
	'ACP_KNOWLEDGEBASE_MANAGE'					=> 'Manage categories',
	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'From this page you can add, edit, delete and re-order categories. A category is a group of related articles. Each category can have an unlimited number of articles.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Category',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Create category',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Using the form below you can create a new category which will be displayed in your Knowledge Base.',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Edit category',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Using the form below you can update an existing category which will be displayed in your Knowledge Base.',
	'ACP_CATEGORY_SETTINGS'						=> 'Category settings',
	'ACP_CATEGORIES'							=> 'Categories',
	'ACP_CATEGORY_NAME'							=> 'Category name',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Category names are displayed on the index, viewcategory and viewarticle page. Category names are also used to identify your categories when managing them in the ACP.',
	'ACP_CATEGORY_DESC'							=> 'Category description',
	'ACP_CATEGORY_DESC_EXPLAIN'					=> 'The category description is displayed on the viewcategory page.',
	'ACP_ADD_CATEGORY'							=> 'Create new category',
	//'ACP_DELETE_RULE_CONFIRM'				=> 'Are you sure you want to remove this rule?<br />Warning: Removing a rule category will also remove all rules contained within it.',
	'ACP_CATEGORY_ADDED'						=> 'Category successfully added.',
	//'ACP_RULE_DELETED'						=> 'Rule successfully removed.',
	'ACP_CATEGORY_EDITED'						=> 'Category successfully edited.',
	'ACP_CATEGORY_NAME_EMPTY'					=> 'You must enter a name for this category.',
	'ACP_ARTICLES'								=> 'Articles',
));
