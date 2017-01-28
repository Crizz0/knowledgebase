<?php
/**
 *
 * Knowledge Base. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2017, kinerity, https://www.project-w.org
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'APPROVE'				=> 'Approve',
	'APPROVE_ARTICLE'		=> 'Approve article',
	'APPROVED'				=> 'Approved',
	'ARTICLES'				=> 'Articles',
	'ARTICLE_CONFIRM'		=> 'Are you sure you want to %1$s this article?',
	'ARTICLE_DENIED'		=> 'Article denied',
	'ARTICLE_UNAPPROVED'	=> 'Article unapproved',
	'AUTHOR'				=> 'Author',

	'BUTTON_APPROVE'		=> 'Approve',
	'BUTTON_DELETE'			=> 'Delete',
	'BUTTON_DENY'			=> 'Deny',
	'BUTTON_EDIT'			=> 'Edit',
	'BUTTON_NEW_ARTICLE'	=> 'New Article',
	'BUTTON_UNAPPROVE'		=> 'Unapprove',

	'CATEGORIES'	=> 'Categories',
	'CHANGE_POSTER'	=> 'Change poster',

	'DELETE_ARTICLE'	=> 'Delete article',
	'DENIED'			=> 'Denied',
	'DENY'				=> 'Deny',
	'DENY_ARTICLE'		=> 'Deny article',
	'DESCRIPTION'		=> 'Description',

	'EDIT_ARTICLE'	=> 'Edit article',

	'EMTPY_TITLE'		=> 'You must enter a title when posting an artilce.',
	'EMPTY_DESCRIPTION'	=> 'You must enter a description when posting an artilce.',
	'EMPTY_CATEGORY'	=> 'You must specify at least one category for this article to belong to.',
	'EMPTY_TEXT'		=> 'You must enter a message when posting an artilce.',

	'INVALID_MODE'	=> 'Invalid Mode',
	'INVALID_TYPE'	=> 'Invalid Type',

	'KNOWLEDGEBASE'				=> 'Knowledge Base',
	'KNOWLEDGEBASE_EXPLAIN'		=> 'This section contains detailed articles elaborating on some of the common issues users encounter. Articles submitted by members of the community are checked for accuracy by the team. If you do not find the answer to your question here, we recommend looking through the forums as well as using the search.',
	'KNOWLEDGEBASE_TITLE'		=> 'View the Knowledge Base',
	'KNOWLEDGEBASE_VIEWONLINE'	=> 'Viewing Board Rules',

	'LAST_MODIFIED'		=> 'Last modified',
	'LINK_TO_ARTICLE'	=> 'Link to this article',

	'NOTIFICATION_ARTICLE_IN_QUEUE'	=> '<strong>Article approval</strong> request: %1$s',

	'NO_ARTICLE'	=> 'The requested article does not exist.',
	'NO_ARTICLES'	=> 'There are no articles in the Knowledge Base or this category.',
	'NO_CATEGORY'	=> 'The requested category does not exist.',
	'NO_PAGE_MODE'	=> 'Invalid or no page mode specified.',

	'POST_ARTICLE'	=> 'Post a new article',

	'TYPE'	=> 'Type',

	'UNAPPROVE'			=> 'Unapprove',
	'UNAPPROVE_ARTICLE'	=> 'Unapprove article',
	'UNAPPROVED'		=> 'Unapproved',

	'WRITTEN_BY'	=> 'Written by',
	'WRITTEN_ON'	=> 'Written on',
));
