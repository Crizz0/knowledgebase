<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 * Brazilian Portuguese translation by eunaumtenhoid [ver 1.0.0] (https://github.com/eunaumtenhoid)
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
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Gerenciar categorias',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Configurações do Knowledge Base',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Configurações do Knowledge Base alteradas</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Artigo do Knowledge Base aprovado</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Artigo do Knowledge Base deletado</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Artigo do Knowledge Base negado</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Artigo do Knowledge Base reprovado</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Criou nova categoria do Knowledge Base</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Deletou uma categoria do Knowledge Base</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Atualizou uma informação da categoria do Knowledge Base category </strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Categoria do Knowledge Base movida</strong> %1$s <strong>abaixo</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Categoria do Knowledge Base movida</strong> %1$s <strong>acima</strong> %2$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Aqui você pode configurar as principais configurações para o Knowledge Base.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Ativar Knowledge Base',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Mostrar o link do Knowledge Base no cabeçalho',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Link do ícone do Knowledge Base',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Digite o nome de um ícone <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> para usar no link do Knowledge Base no cabeçalho. Deixe este campo em branco para nenhum ícone da Knowledge Base.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'O link do ícone do Knowledge Base continha caracteres inválidos.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Configurações do Knowledge Base alteradas.',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Categoria deletada com sucesso.<br /><br />Por favor observe que havia %d artigo nesta categoria que já pertencia à nova categoria. O seguinte artigo já estava presente:<br />%s',
		2	=> 'Categoria deletada com sucesso.<br /><br />Por favor observe que havia %d artigos nesta categoria que já pertencia à nova categoria. O seguinte artigo já estava presente:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Categoria deletada com sucesso.<br /><br />Por favor observe que havia %d artigo nesta categoria que pertencia a outra categoria. O seguinte artigo <b><u>não</u></b> foi deletado:<br />%s',
		2	=> 'Categoria deletada com sucesso.<br /><br />Por favor observe que havia %d artigos nesta categoria que pertencia a outra categoria. Os seguintes artigos <b><u>não</u></b> foram deletados:<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'A partir desta página você pode adicionar, editar, excluir e reordenar categorias. Uma categoria é um grupo de artigos relacionados. Cada categoria pode ter um número ilimitado de artigos.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Categoria',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Criar categoria',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Usando o formulário abaixo, você pode criar uma nova categoria que será exibida no Knowledge Base.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Deletar categoria',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Usando o formulário abaixo, você pode deletar uma categoria existente no Knowledge Base. Você pode deletar todos os artigos associados a esta categoria ou movê-los para outra categoria.<strong>Os artigos que existem em outras categorias não serão deletados ou movidos.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Editar categoria',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Usando o formulário abaixo, você pode atualizar uma categoria existente que será exibida no Knowledge Base.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'O link está corrompido. O hash é inválido.',
	'ACP_ARTICLES'								=> 'Artigos',
	'ACP_CATEGORIES'							=> 'Categorias',
	'ACP_CATEGORY_SETTINGS'						=> 'Configurações da categoria',
	'ACP_CATEGORY_NAME'							=> 'Nome da categoria',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Nomes de categoria são exibidos na página de índice para cada artigo, a página de viewcategory e a página de viewarticle. Nomes de categorias também são usados ​​para identificar suas categorias ao gerenciá-las no ACP.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Descrição da categoria',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'A descrição da categoria é exibida na página de índice quando uma categoria é selecionada.',
	'ACP_ADD_CATEGORY'							=> 'Criar categoria',
	'ACP_DELETE_ARTICLES'						=> 'Deletar artigos',
	'ACP_MOVE_ARTICLES'							=> 'Mover artigos',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> 'Tem certeza de que deseja remover esta categoria?',
	'ACP_CATEGORY_ADDED'						=> 'Categoria adicionada com sucesso.',
	'ACP_CATEGORY_DELETED'						=> 'Categoria removida com sucesso',
	'ACP_CATEGORY_EDITED'						=> 'Categoria editada com sucesso.',
));
