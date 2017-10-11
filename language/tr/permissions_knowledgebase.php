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
	'ACL_CAT_KNOWLEDGEBASE'	=> 'Bilgi Tabanı',

	'ACL_U_KB_READ'			=> 'Bilgi Tabanını görüntüleyebilir',
	'ACL_U_KB_POST'			=> 'Yeni makaleler oluşturabilir',
	'ACL_U_KB_EDIT'			=> 'Kendi makalelerini düzenleyebilir',
	'ACL_U_KB_DELETE'		=> 'Kendi makalelerini silebilir',
	'ACL_U_KB_NOAPPROVE'	=> 'Onaylama olmadan makaleler gönderebilir',

	'ACL_M_KB_EDIT'			=> 'Makaleleri düzenleyebilir',
	'ACL_M_KB_DELETE'		=> 'Makaleleri silebilir',
	'ACL_M_KB_APPROVE'		=> 'Makaleleri onaylayabilir<br /><em>Bu izne onaylamama ve reddetme dahildir!</em>',
	'ACL_M_KB_CHGPOSTER'	=> 'Makale yazarını değiştirebilir',

	'ACL_A_KB_MANAGE'		=> 'Bilgi Tabanını yönetebilir',
));
