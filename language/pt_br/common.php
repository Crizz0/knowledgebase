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
	'KB_ALL_CATEGORIES'		=> 'Todas as categorias',
	'KB_APPROVE'				=> 'Aprovar',
	'KB_APPROVE_ARTICLE'		=> 'Aprovar o artigo',
	'KB_APPROVED'				=> 'Aprovado',
	'KB_ARTICLES'				=> 'Artigos',
	'KB_ARTICLE_CONFIRM'		=> 'Você tem certeza que quer %1$s este artigo?',
	'KB_ARTICLE_DENIED'		=> 'Artigo negado',
	'KB_ARTICLE_STORED_MOD'	=> 'Este artigo foi enviado com sucesso, mas precisará ser aprovado por um moderador antes de ser visualizado publicamente.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Artigo reprovado',
	'KB_AUTHOR'				=> 'Autor',

	'KB_BUTTON_APPROVE'		=> 'Aprovar',
	'KB_BUTTON_DELETE'			=> 'Deletar',
	'KB_BUTTON_DENY'			=> 'Negar',
	'KB_BUTTON_EDIT'			=> 'Editar',
	'KB_BUTTON_NEW_ARTICLE'	=> 'Novo artigo ',
	'KB_BUTTON_DISAPPROVE'		=> 'Reprovar',

	'KB_CATEGORIES'	=> 'Categorias',
	'KB_CHANGE_POSTER'	=> 'Alterar autor',

	'KB_DELETE_ARTICLE'		=> 'Deletar artigo',
	'KB_DENIED'				=> 'Negado',
	'KB_DENY'					=> 'Negar',
	'KB_DENY_ARTICLE'			=> 'Negar artigo',
	'KB_DESCRIPTION'			=> 'Descrição',
	'KB_DISAPPROVE'			=> 'Reprovar',
	'KB_DISAPPROVE_ARTICLE'	=> 'Reprovar artigo',
	'KB_DISAPPROVED'			=> 'Reprovado',

	'KB_EDIT_ARTICLE'	=> 'Editar artigo',

	'KB_EMPTY_TITLE'		=> 'Você deve inserir um título ao postar um artigo.',
	'KB_EMPTY_DESCRIPTION'	=> 'Você deve inserir uma descrição ao postar um artigo.',
	'KB_EMPTY_CATEGORY'	=> 'Você deve especificar pelo menos uma categoria ao qual este artigo pertença.',
	'KB_EMPTY_TEXT'		=> 'Você deve inserir uma mensagem ao postar um artigo.',

	'KB_INVALID_MODE'	=> 'Modo inválido',
	'KB_INVALID_TYPE'	=> 'Tipo inválido',

	'KNOWLEDGEBASE'			=> 'Knowledge Base',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'Esta seção contém artigos detalhados que elaboram alguns dos problemas comuns que os usuários encontram. Os artigos apresentados pelos membros da comunidade são verificados quanto à precisão pela equipe. Se você não encontrar a resposta para sua pergunta aqui, recomendamos pesquisar os fóruns e usar a pesquisa.',
	'KNOWLEDGEBASE_TITLE'	=> 'Ver o Knowledge Base',

	'KB_LAST_MODIFIED'		=> 'Última modificação',
'KB_LAST_MODIFIED_BY'	=> 'Last modified by',
	'KB_LINK_TO_ARTICLE'	=> 'Link para este artigo',

	'KB_NARROW_SEARCH'	=> 'Limite sua pesquisa selecionando uma categoria',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artigo aprovado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artigo deletado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artigo negado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artigo reprovado</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Aprovação do artigo da Knowledge Base</strong> pedido: %1$s',

	'KB_NO_ARTICLE'	=> 'O artigo solicitado não existe.',
	'KB_NO_ARTICLES'	=> 'Não há artigos na Knowledge Base ou nesta categoria.',
	'KB_NO_CATEGORY'	=> 'A categoria solicitada não existe.',
	'KB_NO_PAGE_MODE'	=> 'Modo de página inválido ou não especificado.',

	'KB_POST_ARTICLE'	=> 'Postar um novo artigo',

	'KB_TYPE'	=> 'Tipo',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Visualizando Knowledge Base',

	'KB_WRITTEN_BY'	=> 'Escrito por',
	'KB_WRITTEN_ON'	=> 'Escrito em',
));
