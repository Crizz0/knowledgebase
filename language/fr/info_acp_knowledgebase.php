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
	'ACP_KNOWLEDGEBASE'				=> 'Base de connaissance',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Gérer les catégories',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Paramètres de la base de connaissance',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Paramètres de la base de connaissance modifiés</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Article de la base de connaissance approuvé</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Article de la base de connaissance supprimé</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Article de la base de connaissance refusé</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Article de la base de connaissance désapprouvé</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Nouvelle catégorie de la base de connaissance crée</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Catégorie de la base de connaissance supprimée</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Information de catégorie de la base de connaissance mise à jour</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Catégorie de la base de connaissance déplacée</strong> %1$s <strong>en dessous</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Catégorie de la base de connaissance déplacée</strong> %1$s <strong>au dessus</strong> %2$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Ici, vous pouvez modifier les paramètres principaux de la base de connaissance.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Activer la base de connaissance',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Afficher le lien de la base de connaissance dans l’entête',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Lien vers l’icône de la base de connaissance',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Saisissez le nom d’une icône <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> à utiliser pour le lien de la base de connaissance dans l’entête. Laissez ce champ vide pour ne pas utiliser d’icône.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'Le lien de l’icône de la base de connaissance contient des caractères invalides.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Paramètres de la base de connaissance modifiés.',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'La catégorie a été supprimée.<br /><br />Notez qu’il y avait %d article dans cette catégorie qui appartenait déja à la nouvelle catégorie. L’article suivant est déja présent :<br />%s',
		2	=> 'La catégorie a été supprimée.<br /><br />Notez qu’il y avait %d articles dans cette catégorie qui appartenaient déja à la nouvelle catégorie. Les articles suivant sont déja présents :<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'La catégorie a été supprimée.<br /><br />Notez qu’il y avait %d article dans cette catégorie qui appartenait à une autre catégorie. L’article suivant n’a <b><u>pas</u></b> été supprimé :<br />%s',
		2	=> 'La catégorie a été supprimée.<br /><br />Notez qu’il y avait %d articles dans cette catégorie qui appartenaient à une autre catégorie. Les articles suivant n’ont <b><u>pas</u></b> été supprimés :<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'Depuis cette page vous pouvez ajouter, modifier, effacer et réorganiser les catégories. Une catégorie permet de regrouper des articles par thématique. Chaque catégorie peut avoir un nombre illimité d’articles.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Catégorie',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Créer une catégorie',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Le formulaire ci-dessous permet de créer une catégorie qui sera affichée dans la base de connaissance.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Supprimer une catégorie',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Le formulaire ci-dessous permet de supprimer une catégorie existante de la base de connaissance. Vous pouvez supprimer tous les articles associés à cette catégorie ou les déplacer dans une autre catégorie. <strong>Les articles qui existent dans d’autres catégories ne seront pas affectés.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Modifier la catégorie',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Le formulaire ci-dessous permet de mettre à jour une catégorie existante qui sera affichée dans la base de connaissance.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'Le lien est corrompu. Le hachage n’est pas valide.',
	'ACP_ARTICLES'								=> 'Articles',
	'ACP_CATEGORIES'							=> 'Catégories',
	'ACP_CATEGORY_SETTINGS'						=> 'Paramètres de la catégorie',
	'ACP_CATEGORY_NAME'							=> 'Nom de la catégorie',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Le nom des catégories est affiché en tant que lien sur chaque article de la page d’accueil de la base de connaissance et sur la page de visualisation des articles. Le nom des catégories est aussi utilisé pour identifier vos catégories dans le panneau d’administration.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Description de la catégorie',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'La description est affichée sur la page d’index quand une catégorie est sélectionnée.',
	'ACP_ADD_CATEGORY'							=> 'Créer une nouvelle catégorie',
	'ACP_DELETE_ARTICLES'						=> 'Supprimer les articles',
	'ACP_MOVE_ARTICLES'							=> 'Déplacer les articles vers',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> 'Êtes-vous sûr de vouloir supprimer cette catégorie ?',
	'ACP_CATEGORY_ADDED'						=> 'La catégorie a été ajoutée.',
	'ACP_CATEGORY_DELETED'						=> 'La catégorie a été supprimée.',
	'ACP_CATEGORY_EDITED'						=> 'La catégorie a été modifiée.',
));
