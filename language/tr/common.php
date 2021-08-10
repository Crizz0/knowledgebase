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
	'KB_ALL_CATEGORIES'		=> 'Tüm kategoriler',
	'KB_APPROVE'				=> 'Onayla',
	'KB_APPROVE_ARTICLE'		=> 'Makaleyi onayla',
	'KB_APPROVED'				=> 'Onaylandı',
	'KB_ARTICLES'				=> 'Makaleler',
	'KB_ARTICLE_CONFIRM'		=> 'Bu makaleyi %1$s istediğinize emin misiniz?',
	'KB_ARTICLE_DENIED'		=> 'Makale reddedildi',
	'KB_ARTICLE_STORED_MOD'	=> 'Bu makale başarıyla girildi, fakat herkes tarafından görülebilmesi için bir moderatör tarafından onaylanması gerekiyor.',
	'KB_ARTICLE_DISAPPROVED'	=> 'Makale onaylanmadı',
	'KB_AUTHOR'				=> 'Yazar',

	'KB_BUTTON_APPROVE'		=> 'Onayla',
	'KB_BUTTON_DELETE'			=> 'Sil',
	'KB_BUTTON_DENY'			=> 'Reddet',
	'KB_BUTTON_EDIT'			=> 'Düzenle',
	'KB_BUTTON_NEW_ARTICLE'	=> 'Yeni Makale',
	'KB_BUTTON_DISAPPROVE'		=> 'Onaylama',

	'KB_CATEGORIES'	=> 'Kategoriler',
	'KB_CHANGE_POSTER'	=> 'Yazarı değiştir',

	'KB_DELETE_ARTICLE'		=> 'Makaleyi sil',
	'KB_DENIED'				=> 'Reddedildi',
	'KB_DENY'					=> 'Reddet',
	'KB_DENY_ARTICLE'			=> 'Makaleyi reddet',
	'KB_DESCRIPTION'			=> 'Açıklama',
	'KB_DISAPPROVE'			=> 'Onaylama',
	'KB_DISAPPROVE_ARTICLE'	=> 'Makaleyi onaylama',
	'KB_DISAPPROVED'			=> 'Onaylanmadı',

	'KB_EDIT_ARTICLE'	=> 'Makaleyi düzenle',

	'KB_EMPTY_TITLE'		=> 'Makale gönderirken bir başlık girmelisiniz.',
	'KB_EMPTY_DESCRIPTION'	=> 'Makale gönderirken bir açıklama girmelisiniz.',
	'KB_EMPTY_CATEGORY'	=> 'Bu makale için en az bir kategori belirtmelisiniz.',
	'KB_EMPTY_TEXT'		=> 'Makale gönderirken bir yazı girmelisiniz.',

	'KB_INVALID_MODE'	=> 'Geçersiz Mod',
	'KB_INVALID_TYPE'	=> 'Geçersiz Tür',

	'KB_KNOWLEDGEBASE'			=> 'Bilgi Tabanı',
	'KB_KNOWLEDGEBASE_EXPLAIN'	=> 'Bu bölümde kullanıcıların karşılaştığı bazı genel sorunlarla ilgili ayrıntılı makaleler yer almaktadır. Mesaj panosunun üyeleri tarafından girilen makaleler doğruluk açısından yönetici ve moderatörler tarafından kontrol edilir. Eğer sorunuzun cevabını burada bulamazsanız, hem forumlara bakmanızı hem de arama fonksiyonunu kullanmanızı öneririz.',
	'KB_KNOWLEDGEBASE_TITLE'	=> 'Bilgi Tabanını görüntüle',

	'KB_LAST_MODIFIED'		=> 'Son düzenleme',
'KB_LAST_MODIFIED_BY'	=> 'Last modified by',
	'KB_LINK_TO_ARTICLE'	=> 'Bu makaleye bağlantı',

	'KB_NARROW_SEARCH'	=> 'Bir kategori seçerek aramanızı daraltın',

	'KB_NOTIFICATION_ARTICLE_APPROVED'		=> '<strong>Makale onaylandı</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DELETED'		=> '<strong>Makale silindi</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DENIED'		=> '<strong>Makale reddedildi</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_DISAPPROVED'	=> '<strong>Makale onaylanmadı</strong>: %1$s',
	'KB_NOTIFICATION_ARTICLE_IN_QUEUE'		=> '<strong>Bilgi Tabanı makale onayı</strong> istek: %1$s',

	'KB_NO_ARTICLE'	=> 'İstenen makale mevcut değil.',
	'KB_NO_ARTICLES'	=> 'Bilgi Tabanında ya da bu kategoride hiç bir makale yok.',
	'KB_NO_CATEGORY'	=> 'İstenen kategori mevcut değil.',
	'KB_NO_PAGE_MODE'	=> 'Geçersiz veya hiçbir sayfa modu belirtilmedi.',

	'KB_POST_ARTICLE'	=> 'Yeni bir makale gönder',

	'KB_TYPE'	=> 'Tür',

	'KB_VIEWING_KNOWLEDGEBASE'	=> 'Bilgi Tabanı görüntüleniyor',

	'KB_WRITTEN_BY'	=> 'Yazar',
	'KB_WRITTEN_ON'	=> 'Tarih',
));
