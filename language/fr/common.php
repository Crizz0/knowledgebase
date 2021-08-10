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
	'KB_ALL_CATEGORIES'		=> 'Toutes les catégories',
	'KB_APPROVE'				=> 'Approuver',
	'KB_APPROVE_ARTICLE'		=> 'Approuver l’article',
	'KB_APPROVED'				=> 'Approuvé',
	'KB_ARTICLES'				=> 'Articles',
	'KB_ARTICLE_CONFIRM'		=> 'Êtes-vous sûr de vouloir %1$s cet article ?',
	'KB_ARTICLE_DENIED'		=> 'Article refusé',
	'KB_ARTICLE_STORED_MOD'	=> 'Cet article a été soumis à l’approbation d’un modérateur avant d’être visible publiquement.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Article non approuvé',
	'KB_AUTHOR'				=> 'Auteur',

	'KB_BUTTON_APPROVE'		=> 'Approuver',
	'KB_BUTTON_DELETE'			=> 'Supprimer',
	'KB_BUTTON_DENY'			=> 'Refuser',
	'KB_BUTTON_EDIT'			=> 'Modifier',
	'KB_BUTTON_NEW_ARTICLE'	=> 'Nouvel Article',
	'KB_BUTTON_DISAPPROVE'		=> 'Désapprouver',

	'KB_CATEGORIES'	=> 'Catégories',
	'KB_CHANGE_POSTER'	=> 'Changer l’auteur de l’article',

	'KB_DELETE_ARTICLE'		=> 'Supprimer l’article',
	'KB_DENIED'				=> 'Refusé',
	'KB_DENY'					=> 'Refuser',
	'KB_DENY_ARTICLE'			=> 'Refuser l’article',
	'KB_DESCRIPTION'			=> 'Description',
	'KB_DISAPPROVE'			=> 'Désapprouver',
	'KB_DISAPPROVE_ARTICLE'	=> 'Désapprouver l’article',
	'KB_DISAPPROVED'			=> 'Désapprouvé',

	'KB_EDIT_ARTICLE'	=> 'Modifier l’article',

	'KB_EMPTY_TITLE'		=> 'Vous devez saisir un titre lorsque vous postez un article.',
	'KB_EMPTY_DESCRIPTION'	=> 'Vous devez saisir une description lorsque vous postez un article.',
	'KB_EMPTY_CATEGORY'	=> 'Vous devez spécifier au moins une catégorie pour cet article.',
	'KB_EMPTY_TEXT'		=> 'Vous devez saisir un texte lorsque vous postez un article.',

	'KB_INVALID_MODE'	=> 'Mode invalide',
	'KB_INVALID_TYPE'	=> 'Type invalide',

	'KB_KNOWLEDGEBASE'			=> 'Base de connaissance',
	'KB_KNOWLEDGEBASE_EXPLAIN'	=> 'Cette section contient des articles détaillés basés sur les expériences de certains utilisateurs. Les articles soumis par les membres sont vérifiés par l’équipe. Si vous ne trouvez pas la réponse à votre question ici, nous vous recommandons de faire une recherche dans les forums avec la fonction adéquate.',
	'KB_KNOWLEDGEBASE_TITLE'	=> 'Consulter la base de connaissance',

	'KB_LAST_MODIFIED'		=> 'Dernière modification',
'KB_LAST_MODIFIED_BY'	=> 'Last modified by',
	'KB_LINK_TO_ARTICLE'	=> 'Lien vers cet article',

	'KB_NARROW_SEARCH'	=> 'Affiner la recherche en sélectionnant une catégorie',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Article approuvé</strong> : %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Article supprimé</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Article refusé</strong> : %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Article désapprouvé</strong> : %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Approbation d’article de la base de connaissance</strong> demandée : %1$s',

	'KB_NO_ARTICLE'	=> 'L’article demandé n’existe pas.',
	'KB_NO_ARTICLES'	=> 'Il n’y a pas d’article dans cette catégorie ou dans la base de connaissance.',
	'KB_NO_CATEGORY'	=> 'La catégorie demandée n’existe pas.',
	'KB_NO_PAGE_MODE'	=> 'Mode de la page invalide ou inexistant.',

	'KB_POST_ARTICLE'	=> 'Poster un nouvel article',

	'KB_TYPE'	=> 'Type',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Consulte la base de connaissance',

	'KB_WRITTEN_BY'	=> 'Rédigé par',
	'KB_WRITTEN_ON'	=> 'Rédigé le',
));
