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
	'ALL_CATEGORIES'		=> 'Toutes les catégories',
	'APPROVE'				=> 'Approuver',
	'APPROVE_ARTICLE'		=> 'Approuver l’article',
	'APPROVED'				=> 'Approuvé',
	'ARTICLES'				=> 'Articles',
	'ARTICLE_CONFIRM'		=> 'Êtes-vous sûr de vouloir %1$s cet article ?',
	'ARTICLE_DENIED'		=> 'Article refusé',
	'ARTICLE_STORED_MOD'	=> 'Cet article a été soumis à l’approbation d’un modérateur avant d’être visible publiquement.',
	'ARTICLE_DISAPPROVED'	=> 'Article non approuvé',
	'AUTHOR'				=> 'Auteur',

	'BUTTON_APPROVE'		=> 'Approuver',
	'BUTTON_DELETE'			=> 'Supprimer',
	'BUTTON_DENY'			=> 'Refuser',
	'BUTTON_EDIT'			=> 'Modifier',
	'BUTTON_NEW_ARTICLE'	=> 'Nouvel Article',
	'BUTTON_DISAPPROVE'		=> 'Désapprouver',

	'CATEGORIES'	=> 'Catégories',
	'CHANGE_POSTER'	=> 'Changer l’auteur de l’article',

	'DELETE_ARTICLE'		=> 'Supprimer l’article',
	'DENIED'				=> 'Refusé',
	'DENY'					=> 'Refuser',
	'DENY_ARTICLE'			=> 'Refuser l’article',
	'DESCRIPTION'			=> 'Description',
	'DISAPPROVE'			=> 'Désapprouver',
	'DISAPPROVE_ARTICLE'	=> 'Désapprouver l’article',
	'DISAPPROVED'			=> 'Désapprouvé',

	'EDIT_ARTICLE'	=> 'Modifier l’article',

	'EMTPY_TITLE'		=> 'Vous devez saisir un titre lorsque vous postez un article.',
	'EMPTY_DESCRIPTION'	=> 'Vous devez saisir une description lorsque vous postez un article.',
	'EMPTY_CATEGORY'	=> 'Vous devez spécifier au moins une catégorie pour cet article.',
	'EMPTY_TEXT'		=> 'Vous devez saisir un texte lorsque vous postez un article.',

	'INVALID_MODE'	=> 'Mode invalide',
	'INVALID_TYPE'	=> 'Type invalide',

	'KNOWLEDGEBASE'			=> 'Base de connaissance',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'Cette section contient des articles détaillés basés sur les expériences de certains utilisateurs. Les articles soumis par les membres sont vérifiés par l’équipe. Si vous ne trouvez pas la réponse à votre question ici, nous vous recommandons de faire une recherche dans les forums avec la fonction adéquate.',
	'KNOWLEDGEBASE_TITLE'	=> 'Consulter la base de connaissance',

	'LAST_MODIFIED'		=> 'Dernière modification',
	'LINK_TO_ARTICLE'	=> 'Lien vers cet article',

	'NARROW_SEARCH'	=> 'Affiner la recherche en sélectionnant une catégorie',

	'NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Article approuvé</strong> : %1$s',
	'NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Article supprimé</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Article refusé</strong> : %1$s',
	'NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Article désapprouvé</strong> : %1$s',
	'NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Approbation d’article de la base de connaissance</strong> demandée : %1$s',

	'NO_ARTICLE'	=> 'L’article demandé n’existe pas.',
	'NO_ARTICLES'	=> 'Il n’y a pas d’article dans cette catégorie ou dans la base de connaissance.',
	'NO_CATEGORY'	=> 'La catégorie demandée n’existe pas.',
	'NO_PAGE_MODE'	=> 'Mode de la page invalide ou inexistant.',

	'POST_ARTICLE'	=> 'Poster un nouvel article',

	'TYPE'	=> 'Type',

	'VIEWING_KNOWLEDGEBASE'	=> 'Consulte la base de connaissance',

	'WRITTEN_BY'	=> 'Rédigé par',
	'WRITTEN_ON'	=> 'Rédigé le',
));
