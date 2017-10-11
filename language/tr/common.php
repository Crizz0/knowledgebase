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
	'ALL_CATEGORIES'		=> 'Tüm kategoriler',
	'APPROVE'				=> 'Onayla',
	'APPROVE_ARTICLE'		=> 'Makaleyi onayla',
	'APPROVED'				=> 'Onaylandı',
	'ARTICLES'				=> 'Makaleler',
	'ARTICLE_CONFIRM'		=> 'Bu makaleyi %1$s istediğinize emin misiniz?',
	'ARTICLE_DENIED'		=> 'Makale reddedildi',
	'ARTICLE_STORED_MOD'	=> 'Bu makale başarıyla girildi, fakat herkes tarafından görülebilmesi için bir moderatör tarafından onaylanması gerekiyor.',
	'ARTICLE_DISAPPROVED'	=> 'Makale onaylanmadı',
	'AUTHOR'				=> 'Yazar',

	'BUTTON_APPROVE'		=> 'Onayla',
	'BUTTON_DELETE'			=> 'Sil',
	'BUTTON_DENY'			=> 'Reddet',
	'BUTTON_EDIT'			=> 'Düzenle',
	'BUTTON_NEW_ARTICLE'	=> 'Yeni Makale',
	'BUTTON_DISAPPROVE'		=> 'Onaylama',

	'CATEGORIES'	=> 'Kategoriler',
	'CHANGE_POSTER'	=> 'Yazarı değiştir',

	'DELETE_ARTICLE'		=> 'Makaleyi sil',
	'DENIED'				=> 'Reddedildi',
	'DENY'					=> 'Reddet',
	'DENY_ARTICLE'			=> 'Makaleyi reddet',
	'DESCRIPTION'			=> 'Açıklama',
	'DISAPPROVE'			=> 'Onaylama',
	'DISAPPROVE_ARTICLE'	=> 'Makaleyi onaylama',
	'DISAPPROVED'			=> 'Onaylanmadı',

	'EDIT_ARTICLE'	=> 'Makaleyi düzenle',

	'EMTPY_TITLE'		=> 'Makale gönderirken bir başlık girmelisiniz.',
	'EMPTY_DESCRIPTION'	=> 'Makale gönderirken bir açıklama girmelisiniz.',
	'EMPTY_CATEGORY'	=> 'Bu makale için en az bir kategori belirtmelisiniz.',
	'EMPTY_TEXT'		=> 'Makale gönderirken bir yazı girmelisiniz.',

	'INVALID_MODE'	=> 'Geçersiz Mod',
	'INVALID_TYPE'	=> 'Geçersiz Tür',

	'KNOWLEDGEBASE'			=> 'Bilgi Tabanı',
	'KNOWLEDGEBASE_EXPLAIN'	=> 'Bu bölümde kullanıcıların karşılaştığı bazı genel sorunlarla ilgili ayrıntılı makaleler yer almaktadır. Mesaj panosunun üyeleri tarafından girilen makaleler doğruluk açısından yönetici ve moderatörler tarafından kontrol edilir. Eğer sorunuzun cevabını burada bulamazsanız, hem forumlara bakmanızı hem de arama fonksiyonunu kullanmanızı öneririz.',
	'KNOWLEDGEBASE_TITLE'	=> 'Bilgi Tabanını görüntüle',

	'LAST_MODIFIED'		=> 'Son düzenleme',
	'LINK_TO_ARTICLE'	=> 'Bu makaleye bağlantı',

	'NARROW_SEARCH'	=> 'Bir kategori seçerek aramanızı daraltın',

	'NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Makale onaylandı</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Makale silindi</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Makale reddedildi</strong>: %1$s',
	'NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Makale onaylanmadı</strong>: %1$s',
	'NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Bilgi Tabanı makale onayı</strong> istek: %1$s',

	'NO_ARTICLE'	=> 'İstenen makale mevcut değil.',
	'NO_ARTICLES'	=> 'Bilgi Tabanında ya da bu kategoride hiç bir makale yok.',
	'NO_CATEGORY'	=> 'İstenen kategori mevcut değil.',
	'NO_PAGE_MODE'	=> 'Geçersiz veya hiçbir sayfa modu belirtilmedi.',

	'POST_ARTICLE'	=> 'Yeni bir makale gönder',

	'TYPE'	=> 'Tür',

	'VIEWING_KNOWLEDGEBASE'	=> 'Bilgi Tabanı görüntüleniyor',

	'WRITTEN_BY'	=> 'Yazar',
	'WRITTEN_ON'	=> 'Tarih',
));
