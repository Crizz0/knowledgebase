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
	'KB_ALL_CATEGORIES'		=> 'Todas las categorías',
	'KB_APPROVE'				=> 'Aprobar',
	'KB_APPROVE_ARTICLE'		=> 'Aprobar artículo',
	'KB_APPROVED'				=> 'Aprobado',
	'KB_ARTICLES'				=> 'Artículos',
	'KB_ARTICLE_CONFIRM'		=> '¿Está seguro de que quiere %1$s este artículo?',
	'KB_ARTICLE_DENIED'		=> 'Artículo denegado',
	'KB_ARTICLE_STORED_MOD'	=> 'El artículo ha sido enviado correctamente, pero deberá ser aprobado por un Moderador antes de que sea visible públicamente.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Artículo desaprobado',
	'KB_AUTHOR'				=> 'Autor',

	'KB_BUTTON_APPROVE'		=> 'Aprobar',
	'KB_BUTTON_DELETE'			=> 'Borrar',
	'KB_BUTTON_DENY'			=> 'Denegar',
	'KB_BUTTON_EDIT'			=> 'Editar',
	'KB_BUTTON_NEW_ARTICLE'	=> 'Nuevo artículo',
	'KB_BUTTON_DISAPPROVE'		=> 'Desaprobar',

	'KB_CATEGORIES'	=> 'Categorías',
	'KB_CHANGE_POSTER'	=> 'Cambiar autor',

	'KB_DELETE_ARTICLE'		=> 'Borrar artículo',
	'KB_DENIED'				=> 'Denegado',
	'KB_DENY'					=> 'Denegar',
	'KB_DENY_ARTICLE'			=> 'Denegar artículo',
	'KB_DESCRIPTION'			=> 'Description',
	'KB_DISAPPROVE'			=> 'Desaprobar',
	'KB_DISAPPROVE_ARTICLE'	=> 'Desaprobar artículo',
	'KB_DISAPPROVED'			=> 'Desaprobado',

	'KB_EDIT_ARTICLE'	=> 'Editar artículo',

	'KB_EMPTY_TITLE'		=> 'Debe ingresar un título al publicar un artículo.',
	'KB_EMPTY_DESCRIPTION'	=> 'Debe introducir una descripción al publicar un artículo.',
	'KB_EMPTY_CATEGORY'	=> 'Debe especificar al menos una categoría para que este artículo pertenezca a ella.',
	'KB_EMPTY_TEXT'		=> 'Debe introducir un mensaje al publicar un artículo.',

	'KB_INVALID_MODE'	=> 'Modo no válido',
	'KB_INVALID_TYPE'	=> 'Tipo no válido',

	'KNOWLEDGEBASE'			=> 'Base de Conocimiento',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'Esta sección contiene artículos detallados que explican algunos de los problemas comunes que los usuarios encuentran. Los artículos presentados por los miembros de la comunidad son revisados para que el equipo los compruebe con exactitud. Si no encuentra la respuesta a su pregunta aquí, le recomendamos visite los foros y utilice la búsqueda.',
	'KNOWLEDGEBASE_TITLE'	=> 'Ver la Base de Conocimiento',

	'KB_LAST_MODIFIED'		=> 'Última modificación',
'KB_LAST_MODIFIED_BY'	=> 'Last modified by',
	'KB_LINK_TO_ARTICLE'	=> 'Enlace para este artículo',

	'KB_NARROW_SEARCH'	=> 'Limite su búsqueda seleccionando una categoría',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artículo aprobado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artículo borrado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artículo denegado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artículo desaprobado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> 'Solicitud de <strong>aprobación del artículo de la Base de Conocimiento</strong>: %1$s',

	'KB_NO_ARTICLE'	=> 'El artículo solicitado no existe.',
	'KB_NO_ARTICLES'	=> 'No hay artículos en la Base de Conocimiento, o en esta categoría.',
	'KB_NO_CATEGORY'	=> 'La categoría solicitada no existe.',
	'KB_NO_PAGE_MODE'	=> 'No válido, o no se ha especificado el modo de página.',

	'KB_POST_ARTICLE'	=> 'Publicar nuevo artículo',

	'KB_TYPE'	=> 'Tipo',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Viendo la Base de Conocimiento',

	'KB_WRITTEN_BY'	=> 'Escrito por',
	'KB_WRITTEN_ON'	=> 'Escrito en',
));
