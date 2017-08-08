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
	'ALL_CATEGORIES'		=> 'All categories',
	'APPROVE'				=> 'Approve',
	'APPROVE_ARTICLE'		=> 'Approve article',
	'APPROVED'				=> 'Approved',
	'ARTICLES'				=> 'Articles',
	'ARTICLE_CONFIRM'		=> 'Are you sure you want to %1$s this article?',
	'ARTICLE_DENIED'		=> 'Article denied',
	'ARTICLE_STORED_MOD'	=> 'This article has been submitted successfully, but it will need to be approved by a moderator before it is publicly viewable.',
	'ARTICLE_DISAPPROVED'	=> 'Article disapproved',
	'AUTHOR'				=> 'Author',

	'BUTTON_APPROVE'		=> 'Approve',
	'BUTTON_DELETE'			=> 'Delete',
	'BUTTON_DENY'			=> 'Deny',
	'BUTTON_EDIT'			=> 'Edit',
	'BUTTON_NEW_ARTICLE'	=> 'New Article',
	'BUTTON_DISAPPROVE'		=> 'Disapprove',

	'CATEGORIES'	=> 'Categories',
	'CHANGE_POSTER'	=> 'Change poster',

	'DELETE_ARTICLE'		=> 'Delete article',
	'DENIED'				=> 'Denied',
	'DENY'					=> 'Deny',
	'DENY_ARTICLE'			=> 'Deny article',
	'DESCRIPTION'			=> 'Description',
	'DISAPPROVE'			=> 'Disapprove',
	'DISAPPROVE_ARTICLE'	=> 'Disapprove article',
	'DISAPPROVED'			=> 'Disapproved',

	'EDIT_ARTICLE'	=> 'Edit article',

	'EMTPY_TITLE'		=> 'You must enter a title when posting an artilce.',
	'EMPTY_DESCRIPTION'	=> 'You must enter a description when posting an artilce.',
	'EMPTY_CATEGORY'	=> 'You must specify at least one category for this article to belong to.',
	'EMPTY_TEXT'		=> 'You must enter a message when posting an artilce.',

	'INVALID_MODE'	=> 'Invalid Mode',
	'INVALID_TYPE'	=> 'Invalid Type',

	'KNOWLEDGEBASE'			=> 'Knowledge Base',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'This section contains detailed articles elaborating on some of the common issues users encounter. Articles submitted by members of the community are checked for accuracy by the team. If you do not find the answer to your question here, we recommend looking through the forums as well as using the search.',
	'KNOWLEDGEBASE_TITLE'	=> 'View the Knowledge Base',

	'LAST_MODIFIED'		=> 'Last modified',
	'LINK_TO_ARTICLE'	=> 'Link to this article',

	'NARROW_SEARCH'	=> 'Narrow down your search by selecting a category',

	'NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Article approved</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Article deleted</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Article denied</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Article disapproved</strong>: %1$s',
	'NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Knowledge Base article approval</strong> request: %1$s',

	'NO_ARTICLE'	=> 'The requested article does not exist.',
	'NO_ARTICLES'	=> 'There are no articles in the Knowledge Base or this category.',
	'NO_CATEGORY'	=> 'The requested category does not exist.',
	'NO_PAGE_MODE'	=> 'Invalid or no page mode specified.',

	'POST_ARTICLE'	=> 'Post a new article',

	'TYPE'	=> 'Type',

	'VIEWING_KNOWLEDGEBASE'	=> 'Viewing Knowledge Base',

	'WRITTEN_BY'	=> 'Written by',
	'WRITTEN_ON'	=> 'Written on',
));
