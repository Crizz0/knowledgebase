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
	'ACP_KNOWLEDGEBASE'				=> 'Base de Conocimiento',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Gestionar categorías',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Ajustes de la Base de Conocimiento',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Ajustes de la Base de Conocimiento cambiados</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Artículo de la Base de Conocimiento aprobado</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Artículo de la Base de Conocimiento borrado</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Artículo de la Base de Conocimiento denegado</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Artículo de la Base de Conocimiento desaprobado</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Nueva categoría de la Base de Conocimiento creada</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Categoría borrada de la Base de Conocimiento</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Información de categoría de la Base de Conocimiento actualizada</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Categoría de la Basa de Conocimiento movida</strong> %1$s <strong>debajo</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Categoría de la Basa de Conocimiento movida</strong> %1$s <strong>encima</strong> %2$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Aquí puede configurar los ajustes principales de la Base de Conocimiento.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Habilitar la Base de Conocimiento',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Mostrar enlace a la Base de Conocimiento en el encabezado',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Icono del enlace de la Base de Conocimiento',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Introduzca el nombre de un icono de <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> para usarlo en el enlace de la Base de Conocimento del encabezado. Deje este campo en blanco para no usar icono en la Base de Conocimiento.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'El enlace de icono de la Base de Conocimiento contiene caracteres no válidos.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Ajustes de la Base de Conocimiento cambiados.',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Categoría borrada correctamente.<br /><br />Tenga en cuenta que había %d artículo en esta categoría que ya pertenecía a la nueva categoría. El siguiente artículo ya estaba presente:<br />%s',
		2	=> 'Categoría borrada correctamente.<br /><br />Tenga en cuenta que había %d artículos en esta categoría que ya pertenecían a la nueva categoría. Los siguientes artículos ya estaban presentes:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Categoría borrada correctamente.<br /><br />Tenga en cuenta que había %d artículo en esta categoría que ya pertenecía a la nueva categoría. El siguiente artículo <b><u>no</u></b> se eliminó:<br />%s',
		2	=> 'Categoría borrada correctamente.<br /><br />Tenga en cuenta que había %d artículos en esta categoría que ya pertenecían a la nueva categoría. Los siguientes artículos <b><u>no</u></b> se eliminaron:<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'Desde esta página puede agregar, editar, borrar y reordenar categorías. Una categoría es un grupo de artículos relacionados. Cada categoría puede tener un número ilimitado de artículos.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Categoría',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Crear categoría',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Utilizando el formulario de abajo, puede crear una nueva categoría que se mostrará en la Base de Conocimiento.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Borrar categoría',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Utilizando el formulario de abajo, puede eliminar una categoría existente en la Base de Conocimiento. Puede eliminar todos los artículos asociados a esta categoría o moverlos a otra categoría. <strong>Los artículos que existen en otras categorías no se eliminarán ni se moverán.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Editar categoría',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Utilizando el formulario de abajo, puede actualizar una categoría existente que se mostrará en la Base de Conocimiento.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'El enlace está dañado. El hash no es válido.',
	'ACP_ARTICLES'								=> 'Artículos',
	'ACP_CATEGORIES'							=> 'Categorías',
	'ACP_CATEGORY_SETTINGS'						=> 'Ajustes de categoría',
	'ACP_CATEGORY_NAME'							=> 'Nombre de la categoría',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Los nombres de categoría se muestran en la página de índice para cada artículo, la página (viendo una categoría), y la página (viendo un artículos). Los nombres de categoría también se utilizan para identificar sus categorías al administrarlas en el PCA.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Descripción de la categoría',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'La descripción de la categoría se muestra en la página de índice cuando se selecciona una categoría.',
	'ACP_ADD_CATEGORY'							=> 'Crear nueva categoría',
	'ACP_DELETE_ARTICLES'						=> 'Borrar artículos',
	'ACP_MOVE_ARTICLES'							=> 'Mover artículos',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> '¿Está segurto de querer eliminar esta categoría?',
	'ACP_CATEGORY_ADDED'						=> 'Categoría añadida correctamente.',
	'ACP_CATEGORY_DELETED'						=> 'Categoría eliminada correctamente.',
	'ACP_CATEGORY_EDITED'						=> 'Categoría editada correctamente.',
));
