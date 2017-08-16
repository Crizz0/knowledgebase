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
	'ALL_CATEGORIES'		=> 'Todas as categorias',
	'APPROVE'				=> 'Aprovar',
	'APPROVE_ARTICLE'		=> 'Aprovar o artigo',
	'APPROVED'				=> 'Aprovado',
	'ARTICLES'				=> 'Artigos',
	'ARTICLE_CONFIRM'		=> 'Você tem certeza que quer %1$s este artigo?',
	'ARTICLE_DENIED'		=> 'Artigo negado',
	'ARTICLE_STORED_MOD'	=> 'Este artigo foi enviado com sucesso, mas precisará ser aprovado por um moderador antes de ser visualizado publicamente.',
	'ARTICLE_DISAPPROVED'	=> 'Artigo reprovado',
	'AUTHOR'				=> 'Autor',

	'BUTTON_APPROVE'		=> 'Aprovar',
	'BUTTON_DELETE'			=> 'Deletar',
	'BUTTON_DENY'			=> 'Negar',
	'BUTTON_EDIT'			=> 'Editar',
	'BUTTON_NEW_ARTICLE'	=> 'Novo artigo ',
	'BUTTON_DISAPPROVE'		=> 'Reprovar',

	'CATEGORIES'	=> 'Categorias',
	'CHANGE_POSTER'	=> 'Alterar autor',

	'DELETE_ARTICLE'		=> 'Deletar artigo',
	'DENIED'				=> 'Negado',
	'DENY'					=> 'Negar',
	'DENY_ARTICLE'			=> 'Negar artigo',
	'DESCRIPTION'			=> 'Descrição',
	'DISAPPROVE'			=> 'Reprovar',
	'DISAPPROVE_ARTICLE'	=> 'Reprovar artigo',
	'DISAPPROVED'			=> 'Reprovado',

	'EDIT_ARTICLE'	=> 'Editar artigo',

	'EMTPY_TITLE'		=> 'Você deve inserir um título ao postar um artigo.',
	'EMPTY_DESCRIPTION'	=> 'Você deve inserir uma descrição ao postar um artigo.',
	'EMPTY_CATEGORY'	=> 'Você deve especificar pelo menos uma categoria ao qual este artigo pertença.',
	'EMPTY_TEXT'		=> 'Você deve inserir uma mensagem ao postar um artigo.',

	'INVALID_MODE'	=> 'Modo inválido',
	'INVALID_TYPE'	=> 'Tipo inválido',

	'KNOWLEDGEBASE'			=> 'Knowledge Base',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'Esta seção contém artigos detalhados que elaboram alguns dos problemas comuns que os usuários encontram. Os artigos apresentados pelos membros da comunidade são verificados quanto à precisão pela equipe. Se você não encontrar a resposta para sua pergunta aqui, recomendamos pesquisar os fóruns e usar a pesquisa.',
	'KNOWLEDGEBASE_TITLE'	=> 'Ver o Knowledge Base',

	'LAST_MODIFIED'		=> 'Última modificação',
	'LINK_TO_ARTICLE'	=> 'Link para este artigo',

	'NARROW_SEARCH'	=> 'Limite sua pesquisa selecionando uma categoria',

	'NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Artigo aprovado</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Artigo deletado</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Artigo negado</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Artigo reprovado</strong>: %1$s',
	'NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Aprovação do artigo da Knowledge Base</strong> pedido: %1$s',

	'NO_ARTICLE'	=> 'O artigo solicitado não existe.',
	'NO_ARTICLES'	=> 'Não há artigos na Knowledge Base ou nesta categoria.',
	'NO_CATEGORY'	=> 'A categoria solicitada não existe.',
	'NO_PAGE_MODE'	=> 'Modo de página inválido ou não especificado.',

	'POST_ARTICLE'	=> 'Postar um novo artigo',

	'TYPE'	=> 'Tipo',

	'VIEWING_KNOWLEDGEBASE'	=> 'Visualizando Knowledge Base',

	'WRITTEN_BY'	=> 'Escrito por',
	'WRITTEN_ON'	=> 'Escrito em',
));
