<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 * Turkish translation by ESQARE (http://www.phpbbturkey.com) 
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
	'ACP_KNOWLEDGEBASE'				=> 'Bilgi Tabanı',
	'ACP_KNOWLEDGEBASE_MANAGE'		=> 'Kategorileri yönet',
	'ACP_KNOWLEDGEBASE_SETTINGS'	=> 'Bilgi Tabanı ayarları',

	// ACP Logs
	'ACP_KNOWLEDGEBASE_SETTINGS_LOG'	=> '<strong>Bilgi Tabanı ayarları değiştirildi</strong>',

	'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG'	=> '<strong>Bilgi Tabanı makalesi onaylandı</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG'		=> '<strong>Bilgi Tabanı makalesi silindi</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG'		=> '<strong>Bilgi Tabanı makalesi reddedildi</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG'	=> '<strong>Bilgi Tabanı makalesi onaylanmadı</strong><br />» %s',

	'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG'		=> '<strong>Yeni Bilgi Tabanı kategorisi oluşturuldu</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG'		=> '<strong>Bilgi Tabanı kategorisi silindi</strong><br />» %s',
	'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG'		=> '<strong>Bilgi Tabanı kategori bilgileri güncellendi</strong><br />» %1$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_DOWN_LOG'	=> '<strong>Bilgi Tabanı kategorisi taşındı</strong> %1$s <strong>altına</strong> %2$s',
	'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_UP_LOG'	=> '<strong>Bilgi Tabanı kategorisi taşındı</strong> %1$s <strong>üstüne</strong> %2$s',

	// Settings page
	'ACP_KNOWLEDGEBASE_SETTINGS_EXPLAIN'	=> 'Buradan Bilgi Tabanı için ana ayarları yapabilirsiniz.',
	'ACP_KNOWLEDGEBASE_ENABLE'				=> 'Bilgi Tabanını etkinleştir',
	'ACP_KNOWLEDGEBASE_HEADER_LINK'			=> 'Sayfa üstlerinde Bilgi Tabanı bağlantısını göster',
	'ACP_KNOWLEDGEBASE_FONT_ICON'			=> 'Bilgi Tabanı bağlantı simgesi',
	'ACP_KNOWLEDGEBASE_FONT_ICON_EXPLAIN'	=> 'Sayfa üstlerindeki Bilgi Tabanı bağlantısında kullanılmak üzere bir <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Font Awesome</a> simgesinin adını girin. Bilgi Tabanı için simge kullanmak istemiyorsanız bu alanı boş bırakın.',
	'ACP_KNOWLEDGEBASE_FONT_ICON_INVALID'	=> 'Bilgi Tabanı simgesi geçersiz karakterler içeriyor.',
	'ACP_KNOWLEDGEBASE_SETTINGS_CHANGED'	=> 'Bilgi Tabanı ayarları değiştirildi.',

	// Manage page
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED'	=> array(
		1	=> 'Kategori başarıyla silindi.<br /><br />Not: Bu kategoride zaten yeni kategoriye ait olan %d makale var. Aşağıdaki makaleler zaten mevcut:<br />%s',
	),
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED'	=> array(
		1	=> 'Kategori başarıyla silindi.<br /><br />Not: Bu kategoride zaten diğer bir kategoriye ait olan %d makale var. Aşağıdaki makaleler <b><u>silinmedi</u></b>:<br />%s',
	),


	'ACP_KNOWLEDGEBASE_MANAGE_EXPLAIN'			=> 'Bu sayfadan kategoriler ekleyebilir, düzenleyebilir, silebilir ve yeniden sıralama yapabilirsiniz. Kategori, ilgili makalelerin bir grubudur. Her kategori sınırsız sayıda makaleye sahip olabilir.',
	'ACP_KNOWLEDGEBASE_CATEGORY'				=> 'Kategori',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY'			=> 'Kategori oluştur',
	'ACP_KNOWLEDGEBASE_CREATE_CATEGORY_EXPLAIN'	=> 'Alttaki formu kullanarak Bilgi Tabanında gösterilecek yeni bir kategori oluşturabilirsiniz.',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY'			=> 'Kategoriyi sil',
	'ACP_KNOWLEDGEBASE_DELETE_CATEGORY_EXPLAIN'	=> 'Alttaki formu kullanarak Bilgi Tabanında mevcut bir kategoriyi silebilirsiniz. Bu kategori ile ilişkili tüm makaleleri silebilirsiniz ya da bunları diğer bir kategoriye taşıyabilirsiniz. <strong>Diğer kategorilerdeki mevcut makaleler silinmeyecek ya da taşınmayacaktır.</strong>',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY'			=> 'Kategoriyi düzenle',
	'ACP_KNOWLEDGEBASE_EDIT_CATEGORY_EXPLAIN'	=> 'Alttaki formu kullanarak Bilgi Tabanında gösterilen mevcut bir kategoriyi düzenleyebilirsiniz.',
	'ACP_KNOWLEDGEDABE_INVALID_HASH'			=> 'Bağlantı bozuk. Hash geçersiz.',
	'ACP_ARTICLES'								=> 'Makaleler',
	'ACP_CATEGORIES'							=> 'Kategoriler',
	'ACP_CATEGORY_SETTINGS'						=> 'Kategori ayarları',
	'ACP_CATEGORY_NAME'							=> 'Kategori adı',
	'ACP_CATEGORY_NAME_EXPLAIN'					=> 'Her makale için ana sayfada, kategori görüntüleme sayfasında ve makale görüntüleme sayfasında kategori adları gösterilir. Kategori adları, kategorilerinizi YKP’den yönetirken tanımlamak için de kullanır.',
	'ACP_CATEGORY_DESCRIPTION'					=> 'Kategori açıklaması',
	'ACP_CATEGORY_DESCRIPTION_EXPLAIN'			=> 'Kategori açıklaması, bir kategori seçildiğinde ana sayfada görüntülenir.',
	'ACP_ADD_CATEGORY'							=> 'Yeni kategori oluştur',
	'ACP_DELETE_ARTICLES'						=> 'Makaleleri sil',
	'ACP_MOVE_ARTICLES'							=> 'Makaleleri taşı',
	'ACP_DELETE_CATEGORY_CONFIRM'				=> 'Bu kategoriyi kaldırmak istediğinize emin misiniz?',
	'ACP_CATEGORY_ADDED'						=> 'Kategori başarıyla eklendi.',
	'ACP_CATEGORY_DELETED'						=> 'Kategori başarıyla kaldırıldı.',
	'ACP_CATEGORY_EDITED'						=> 'Kategori başarıyla düzenlendi.',
));
