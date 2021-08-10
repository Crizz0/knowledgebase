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
	'KB_ALL_CATEGORIES'		=> 'All categories',
	'KB_APPROVE'				=> 'Approve',
	'KB_APPROVE_ARTICLE'		=> 'Approve article',
	'KB_APPROVED'				=> 'Approved',
	'KB_ARTICLES'				=> 'Articles',
	'KB_ARTICLE_CONFIRM'		=> 'Are you sure you want to %1$s this article?',
	'KB_ARTICLE_DENIED'		=> 'Article denied',
	'KB_ARTICLE_STORED_MOD'	=> 'This article has been submitted successfully, but it will need to be approved by a moderator before it is publicly viewable.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Article disapproved',
	'KB_AUTHOR'				=> 'Author',

	'KB_BUTTON_APPROVE'		=> 'Approve',
	'KB_BUTTON_DELETE'			=> 'Delete',
	'KB_BUTTON_DENY'			=> 'Deny',
	'KB_BUTTON_EDIT'			=> 'Edit',
	'KB_BUTTON_NEW_ARTICLE'	=> 'New Article',
	'KB_BUTTON_DISAPPROVE'		=> 'Disapprove',

	'KB_CATEGORIES'	=> 'Categories',
	'KB_CHANGE_POSTER'	=> 'Change poster',

	'KB_DELETE_ARTICLE'		=> 'Delete article',
	'KB_DENIED'				=> 'Denied',
	'KB_DENY'					=> 'Deny',
	'KB_DENY_ARTICLE'			=> 'Deny article',
	'KB_DESCRIPTION'			=> 'Description',
	'KB_DISAPPROVE'			=> 'Disapprove',
	'KB_DISAPPROVE_ARTICLE'	=> 'Disapprove article',
	'KB_DISAPPROVED'			=> 'Disapproved',

	'KB_EDIT_ARTICLE'	=> 'Edit article',

	'KB_EMPTY_TITLE'		=> 'You must enter a title when posting an artilce.',
	'KB_EMPTY_DESCRIPTION'	=> 'You must enter a description when posting an artilce.',
	'KB_EMPTY_CATEGORY'	=> 'You must specify at least one category for this article to belong to.',
	'KB_EMPTY_TEXT'		=> 'You must enter a message when posting an artilce.',

	'KB_INVALID_MODE'	=> 'Invalid Mode',
	'KB_INVALID_TYPE'	=> 'Invalid Type',

	'KB_KNOWLEDGEBASE'			=> 'Knowledge Base',
	'KB_KNOWLEDGEBASE_EXPLAIN'	=> 'This section contains detailed articles elaborating on some of the common issues users encounter. Articles submitted by members of the community are checked for accuracy by the team. If you do not find the answer to your question here, we recommend looking through the forums as well as using the search.',
	'KB_KNOWLEDGEBASE_TITLE'	=> 'View the Knowledge Base',

	'KB_LAST_MODIFIED'		=> 'Last modified',
	'KB_LAST_MODIFIED_BY'	=> 'Last modified by',
	'KB_LINK_TO_ARTICLE'	=> 'Link to this article',

	'KB_NARROW_SEARCH'	=> 'Narrow down your search by selecting a category',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Article approved</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Article deleted</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Article denied</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Article disapproved</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Knowledge Base article approval</strong> request: %1$s',

	'KB_NO_ARTICLE'	=> 'The requested article does not exist.',
	'KB_NO_ARTICLES'	=> 'There are no articles in the Knowledge Base or this category.',
	'KB_NO_CATEGORY'	=> 'The requested category does not exist.',
	'KB_NO_PAGE_MODE'	=> 'Invalid or no page mode specified.',

	'KB_POST_ARTICLE'	=> 'Post a new article',

	'KB_TYPE'	=> 'Type',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Viewing Knowledge Base',

	'KB_WRITTEN_BY'	=> 'Written by',
	'KB_WRITTEN_ON'	=> 'Written on',
));
