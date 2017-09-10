<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use kinerity\knowledgebase\constants;

/**
 * Knowledge Base main controller
 */
class main_controller implements main_interface
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\cache\service */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var ContainerInterface */
	protected $container;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\notification\manager */
	protected $notification_manager;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	/** @var string kb_articles */
	protected $kb_articles_table;

	/** @var string kb_article_category */
	protected $kb_article_category_table;

	/** @var string kb_categories */
	protected $kb_categories_table;

	/**
	 * Constructor
	 *
	 * @param \phpbb\auth\auth                   $auth
	 * @param \phpbb\cache\service               $cache
	 * @param \phpbb\config\config               $config
	 * @param ContainerInterface                 $container
	 * @param \phpbb\controller\helper           $helper
	 * @param \phpbb\db\driver\driver_interface  $db
	 * @param \phpbb\language\language           $lang
	 * @param \phpbb\log\log                     $log
	 * @param \phpbb\notification\manager        $notification_manager
	 * @param \phpbb\request\request             $request
	 * @param \phpbb\template\template           $template
	 * @param \phpbb\user                        $user
	 * @param string                             $root_path
	 * @param string                             $php_ext
	 * @param string                             $kb_articles_table
	 * @param string                             $kb_article_category_table
	 * @param string                             $kb_categories_table
	 */
	public function __construct(\phpbb\auth\auth $auth, \phpbb\cache\service $cache, \phpbb\config\config $config, ContainerInterface $container, \phpbb\controller\helper $helper, \phpbb\db\driver\driver_interface $db, \phpbb\language\language $lang, \phpbb\log\log $log, \phpbb\notification\manager $notification_manager, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, $root_path, $php_ext, $kb_articles_table, $kb_article_category_table, $kb_categories_table)
	{
		$this->auth = $auth;
		$this->cache = $cache;
		$this->config = $config;
		$this->container = $container;
		$this->helper = $helper;
		$this->db = $db;
		$this->lang = $lang;
		$this->log = $log;
		$this->notification_manager = $notification_manager;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->kb_articles_table = $kb_articles_table;
		$this->kb_article_category_table = $kb_article_category_table;
		$this->kb_categories_table = $kb_categories_table;
	}

	public function display($page)
	{
		// Check for permission to read the Knowledge Base
		if (!$this->auth->acl_get('u_kb_read'))
		{
			throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
		}

		$this->template->assign_block_vars('navlinks', array(
			'FORUM_NAME'	=> $this->lang->lang('KNOWLEDGEBASE'),
			'U_VIEW_FORUM'	=> $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index')),
		));

		// Individual pages
		switch ($page)
		{
			case 'index':
				$type = $this->request->variable('type', 'approved');
				$category_id = $this->request->variable('c', 0);
				$rowset = $article_list = $category_list = array();

				// Basic pagewide vars
				$this->template->assign_vars(array(
					'TYPE'	=> $this->lang->lang(strtoupper($type)),

					'S_DISPLAY_POST_BUTTON'	=> $this->auth->acl_get('u_kb_post') ? true : false,
					'S_DISPLAY_TYPE_MENU'	=> $this->auth->acl_get('m_kb_approve') ? true : false,
					'S_TYPE_APPROVED'		=> $type == 'approved' ? true : false,

					'U_POST_NEW_ARTICLE'	=> ($this->auth->acl_get('u_kb_post')) ? $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'posting', 'mode' => 'post')) : '',
				));

				// Generate the type list
				$type_array = array('approved', 'disapproved', 'denied');

				foreach ($type_array as $key)
				{
					$this->template->assign_block_vars('types', array(
						'TYPE'	=> $this->lang->lang(strtoupper($key)),

						'U_TYPE'	=> $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index', 'type' => $key)),
					));
				}

				$sql_where = '';
				if ($this->auth->acl_get('m_kb_approve') && $type)
				{
					switch ($type)
					{
						case 'approved':
							$sql_where .= 'article_visibility = ' . constants::ARTICLE_APPROVED;
						break;

						case 'disapproved':
							$sql_where .= 'article_visibility = ' . constants::ARTICLE_DISAPPROVED;
						break;

						case 'denied':
							$sql_where .= 'article_visibility = ' . constants::ARTICLE_DENIED;
						break;
					}
				}
				else
				{
					// User has no special moderator permissions, so they only see approved articles
					$sql_where .= 'article_visibility = ' . constants::ARTICLE_APPROVED;
				}

				if ($category_id != 0)
				{
					$sql_where .= ' AND ac.category_id = ' . (int) $category_id . '
									AND a.article_id = ac.article_id';
				}

				// Check for valid type
				if (!in_array($type, $type_array))
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('INVALID_TYPE'));
				}

				// Prevent altering the URI to bypass the $sql_where var
				if (!$this->auth->acl_get('m_kb_approve') && $type != 'approved')
				{
					throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
				}

				// Grab categories
				$sql = 'SELECT *
					FROM ' . $this->kb_categories_table . '
					ORDER BY left_id ASC';
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$this->template->assign_block_vars('categories', array(
						'CATEGORY_ID'	=> $row['category_id'],
						'CATEGORY_NAME'	=> $row['category_name'],

						'S_SELECTED'	=> ($row['category_id'] == $category_id) ? true : false,
					));
				}
				$this->db->sql_freeresult($result);

				// Grab articles
				if ($category_id == 0)
				{
					$sql = 'SELECT *
					FROM ' . $this->kb_articles_table . "
					WHERE $sql_where
					ORDER BY article_title ASC";
				}
				else
				{
					$sql_ary = array(
						'SELECT'	=> 'a.*, ac.category_id',

						'FROM'		=> array(
							$this->kb_articles_table			=> 'a',
							$this->kb_article_category_table	=> 'ac',
						),

						'WHERE'		=> $sql_where,

						'ORDER_BY'	=> 'article_title ASC',
					);
					$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				}
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$rowset[$row['article_id']] = $row;
					$article_list[] = (int) $row['article_id'];
				}
				$this->db->sql_freeresult($result);

				if ($category_id != 0)
				{
					/** @var \kinerity\knowledgebase\entity\functions $entity */
					$entity = $this->container->get('kinerity.knowledgebase.functions.entity')->load($category_id);

					$this->template->assign_vars(array(
						'CATEGORY_DESCRIPTION'	=> $entity->get_description_for_display(),
					));
				}

				if (sizeof($article_list))
				{
					// Get the categories for each article
					$sql_ary = array(
						'SELECT'	=> 'ac.*, c.category_name',

						'FROM'		=> array(
							$this->kb_article_category_table	=> 'ac',
						),

						'LEFT_JOIN'	=> array(
							array(
								'FROM'	=> array($this->kb_categories_table	=> 'c'),
								'ON'	=> 'ac.category_id = c.category_id',
							),
						),

						'WHERE'		=> $this->db->sql_in_set('article_id', $article_list),

						'ORDER_BY'	=> 'left_id ASC',
					);
					$sql = $this->db->sql_build_query('SELECT', $sql_ary);
					$result = $this->db->sql_query($sql);
					while ($row = $this->db->sql_fetchrow($result))
					{
						// Set the category link here, the list will be imploded later
						$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index', 'c' => (int) $row['category_id']));
						$category_list[$row['article_id']][] = '<a href="' . $url . '">' . $row['category_name'] . '</a>';
					}
					$this->db->sql_freeresult($result);

					foreach ($article_list as $article_id)
					{
						$row = $rowset[$article_id];
						$categories = $category_list[$article_id];

						// Send vars to template
						$article_row = array(
							'ARTICLE_ID'			=> (int) $article_id,
							'ARTICLE_AUTHOR_FULL'	=> get_username_string('full', $row['article_poster_id'], $row['article_poster_name'], $row['article_poster_colour']),
							'ARTICLE_TIME'			=> $this->user->format_date($row['article_time']),

							'VIEWS'					=> $row['article_views'],
							'ARTICLE_TITLE'			=> censor_text($row['article_title']),
							'ARTICLE_DESCRIPTION'	=> censor_text($row['article_description']),

							'CATEGORIES'	=> implode($this->lang->lang('COMMA_SEPARATOR'), $categories),

							'U_VIEW_ARTICLE'	=> $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id)),
						);

						$this->template->assign_block_vars('articlerow', $article_row);

						unset($rowset[$article_id]);
					}
				}

				return $this->helper->render('index_body.html', $this->lang->lang('KNOWLEDGEBASE'));
			break;

			case 'mcp':
				$article_id = $this->request->variable('a', 0);
				$mode = $this->request->variable('mode', '');

				$cancel = ($this->request->is_set_post('cancel'));

				// Do we have an article or (valid) mode?
				if (!$article_id)
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
				}

				// Check for a valid mode
				if (!in_array($mode, array('approve', 'delete', 'deny', 'disapprove')))
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('INVALID_MODE'));
				}

				$sql = 'SELECT *
					FROM ' . $this->kb_articles_table . '
					WHERE article_id = ' . (int) $article_id;
				$result = $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				// Was cancel pressed? If so, redirect back to where we were
				if ($cancel)
				{
					$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
					redirect($url);
				}

				switch ($mode)
				{
					case 'approve':
						if (!$this->auth->acl_get('m_kb_approve') || $row['article_visibility'] == constants::ARTICLE_APPROVED)
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . '
								SET article_visibility = ' . constants::ARTICLE_APPROVED . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							// Store the notification data we will use in an array
							$notification_data = array(
								'article_id'		=> (int) $article_id,
								'article_poster_id'	=> (int) $row['article_poster_id'],
								'article_title'		=> $row['article_title'],
							);

							// Create the notification
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.approve_article', $notification_data);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG', time(), array($row['article_title']));

							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('APPROVE'))));
						}
					break;

					case 'delete':
						if (!$this->auth->acl_get('m_kb_delete'))
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							// Set the article title to a var it can be referenced later
							$title = $row['article_title'];

							// Store the notification data we will use in an array
							$notification_data = array(
								'article_id'		=> (int) $article_id,
								'article_poster_id'	=> (int) $row['article_poster_id'],
								'article_title'		=> $row['article_title'],
							);

							// Create the notification
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.delete_article', $notification_data);

							$sql = 'DELETE FROM ' . $this->kb_articles_table . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG', time(), array($title));

							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DELETE'))));
						}
					break;

					case 'deny':
						if (!$this->auth->acl_get('m_kb_approve') || $row['article_visibility'] == constants::ARTICLE_DENIED)
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . '
								SET article_visibility = ' . constants::ARTICLE_DENIED . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							// Store the notification data we will use in an array
							$notification_data = array(
								'article_id'		=> (int) $article_id,
								'article_poster_id'	=> (int) $row['article_poster_id'],
								'article_title'		=> $row['article_title'],
							);

							// Create the notification
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.deny_article', $notification_data);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG', time(), array($row['article_title']));

							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DENY'))));
						}
					break;

					case 'disapprove':
						if (!$this->auth->acl_get('m_kb_approve') || $row['article_visibility'] == constants::ARTICLE_DISAPPROVED)
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . '
								SET article_visibility = ' . constants::ARTICLE_DISAPPROVED . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							// Store the notification data we will use in an array
							$notification_data = array(
								'article_id'		=> (int) $article_id,
								'article_poster_id'	=> (int) $row['article_poster_id'],
								'article_title'		=> $row['article_title'],
							);

							// Create the notification
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.disapprove_article', $notification_data);
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.article_in_queue', $notification_data);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_DISAPPROVED_LOG', time(), array($row['article_title']));

							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DISAPPROVE'))));
						}
					break;
				}
			break;

			case 'posting':
				$mode = $this->request->variable('mode', '');
				$error = $row = array();
				$current_time = time();

				$this->lang->add_lang(array('posting'));

				// $article_id is only present in delete and edit
				if ($mode == 'delete' || $mode == 'edit')
				{
					$article_id = $this->request->variable('a', 0);
				}

				$submit = ($this->request->is_set_post('submit'));
				$cancel = ($this->request->is_set_post('cancel'));

				// Is there a valid mode?
				if (!in_array($mode, array('delete', 'edit', 'post')))
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('INVALID_MODE'));
				}

				// Was cancel pressed? If so, redirect back to where we were
				if ($cancel)
				{
					$param = isset($article_id) ? array('page' => 'viewarticle', 'a' => (int) $article_id) : array('page' => 'index');
					$url = $this->helper->route('kinerity_knowledgebase_main_controller', $param);
					redirect($url);
				}

				// Only allow delete and edit when an article id is provided
				if (in_array($mode, array('delete', 'edit')) && $article_id)
				{
					// Grab all article data
					$sql = 'SELECT a.*, u.username
						FROM ' . $this->kb_articles_table . ' a, ' . USERS_TABLE . ' u
						WHERE a.article_id = ' . (int) $article_id . '
							AND a.article_poster_id = u.user_id';
					$result = $this->db->sql_query($sql);
					$row = $this->db->sql_fetchrow($result);
					$this->db->sql_freeresult($result);

					// Is the article actually in the database?
					if (!$row)
					{
						throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
					}
				}

				// Do we have an article for the correct mode?
				if (in_array($mode, array('delete', 'edit')) && !$article_id)
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
				}

				include ($this->root_path . 'includes/functions_posting.' . $this->php_ext);
				include ($this->root_path . 'includes/functions_display.' . $this->php_ext);

				display_custom_bbcodes();
				generate_smilies('inline', 0);

				// HTML, BBCode, Smilies, Images and Flash status
				$bbcode_status	= ($this->config['allow_bbcode']) ? true : false;
				$smilies_status	= ($this->config['allow_smilies']) ? true : false;
				$img_status		= ($bbcode_status) ? true : false;
				$url_status		= ($this->config['allow_post_links']) ? true : false;
				$flash_status	= ($bbcode_status && $this->config['allow_post_flash']) ? true : false;
				$quote_status	= true;

				$uid = $bitfield = $options = '';

				switch ($mode)
				{
					case 'delete':
						if (!$this->auth->acl_get('u_kb_delete') || $this->user->data['user_id'] != $row['article_poster_id'])
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							// Set the article title to a var it can be referenced later
							$title = $row['article_title'];

							// Now delete all the data
							$sql = 'DELETE FROM ' . $this->kb_articles_table . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							$this->log->add('user', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG', time(), array($title));

							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DELETE'))));
						}
					break;

					case 'edit':
						if ((!$this->auth->acl_get('u_kb_edit') || $this->user->data['user_id'] != $row['article_poster_id']) && !$this->auth->acl_get('m_kb_edit'))
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						decode_message($row['article_text'], $row['bbcode_uid']);
						$article_bbcode		= $row['enable_bbcode'];
						$article_smilies	= $row['enable_smilies'];
						$article_urls		= $row['enable_magic_url'];
					break;

					case 'post':
						if (!$this->auth->acl_get('u_kb_post'))
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}
					break;
				}

				// Set vars for use when submitting articles
				if ($mode == 'post' || $submit)
				{
					$username = $this->auth->acl_get('m_kb_chgposter') ? $this->request->variable('username', $this->user->data['username'], true) : $this->user->data['username'];
					$title = $this->request->variable('article_title', '', true);
					$description = $this->request->variable('article_description', '', true);
					$category_list = $this->request->variable('category_list', array(0));
					$text = $this->request->variable('article_text', '', true);
				}

				if ($submit)
				{
					$article_bbcode		= (!$bbcode_status || $this->request->is_set_post('disable_bbcode')) ? false : true;
					$article_smilies	= (!$smilies_status || $this->request->is_set_post('disable_smilies')) ? false : true;
					$article_urls		= (!$url_status || $this->request->is_set_post('disable_magic_url')) ? false : true;

					// Grab the user_id from the username field
					$sql = 'SELECT *
						FROM ' . USERS_TABLE . "
						WHERE username_clean = '" . $this->db->sql_escape(utf8_clean_string($username)) . "'";
					$result = $this->db->sql_query($sql);
					$user_row = $this->db->sql_fetchrow($result);
					$this->db->sql_freeresult($result);

					// No user?
					if (!$user_row)
					{
						$error[] .= $this->lang->lang('NO_USER');
					}

					// Check posting vars
					if (utf8_clean_string($title) === '')
					{
						$error[] .= $this->lang->lang('EMPTY_TITLE');
					}

					if (utf8_clean_string($description) === '')
					{
						$error[] .= $this->lang->lang('EMPTY_DESCRIPTION');
					}

					if (utf8_clean_string($text) === '')
					{
						$error[] .= $this->lang->lang('EMPTY_TEXT');
					}

					if (!sizeof($category_list))
					{
						$error[] .= $this->lang->lang('EMPTY_CATEGORY');
					}

					if (!sizeof($error))
					{
						generate_text_for_storage($text, $uid, $bitfield, $options, (bool) $article_bbcode, (bool) $article_urls, (bool) $article_smilies);

						// Create an array with all data to be inserted
						$sql_array = array(
							'article_title'			=> $title,
							'article_description'	=> $description,
							'article_poster_id'		=> $user_row['user_id'],
							'article_poster_name'	=> $user_row['username'],
							'article_poster_colour'	=> $user_row['user_colour'],
							'article_time'			=> ($mode == 'edit') ? $row['article_time'] : $current_time,
							'article_edit_time'		=> ($mode == 'edit') ? $current_time : 0,
							'enable_bbcode'			=> (bool) $article_bbcode,
							'enable_smilies'		=> (bool) $article_smilies,
							'enable_magic_url'		=> (bool) $article_urls,
							'article_text'			=> $text,
							'bbcode_bitfield'		=> $bitfield,
							'bbcode_uid'			=> $uid,
							'article_visibility'	=> $this->auth->acl_get('u_kb_noapprove') ? constants::ARTICLE_APPROVED : constants::ARTICLE_DISAPPROVED,
							'article_views'			=> ($mode == 'edit') ? $row['article_views'] : 0,
						);

						// Update the kb_articles_table
						if ($mode == 'post')
						{
							$sql = 'INSERT INTO ' . $this->kb_articles_table . ' ' . $this->db->sql_build_array('INSERT', $sql_array);
						}
						else
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_array) . ' WHERE article_id = ' . (int) $row['article_id'];
						}
						$this->db->sql_query($sql);

						// Set the article_id
						$article_id = (isset($row['article_id'])) ? $row['article_id'] : $this->db->sql_nextid();

						// Delete any existing entries, prevents duplicate category_ids being stored
						if ($mode == 'edit')
						{
							$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
								WHERE article_id = ' . (int) $row['article_id'];
							$this->db->sql_query($sql);
						}

						// Parse through the array and add the data to the kb_article_category_table
						foreach ($category_list as $category)
						{
							$sql_array = array(
								'category_id'   => $category,
								'article_id'    => $article_id,
							);

							$sql = 'INSERT INTO ' . $this->kb_article_category_table . ' ' . $this->db->sql_build_array('INSERT', $sql_array);
							$this->db->sql_query($sql);
						}

						if (($mode == 'post' || $mode == 'edit') && !$this->auth->acl_get('m_kb_approve') && !$this->auth->acl_get('u_kb_noapprove'))
						{
							// Store the notification data we will use in an array
							$notification_data = array(
								'article_id'	=> (int) $article_id,
								'article_poster_id'	=> (int) $user_row['user_id'],
								'article_title'	=> $title,
							);

							if ($mode == 'edit')
							{
								// Delete the notification
								$this->notification_manager->delete_notifications('kinerity.knowledgebase.notification.type.article_in_queue', $notification_data);
							}

							// Create the notification
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.article_in_queue', $notification_data);
						}

						// Set correct url, show message to users unable to post without approval
						if (!$this->auth->acl_get('m_kb_approve') && !$this->auth->acl_get('u_kb_noapprove'))
						{
							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
							meta_refresh(3, $url);

							$message = $this->lang->lang('ARTICLE_STORED_MOD');
							trigger_error($message);
						}
						else
						{
							$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
							redirect($url);
						}
					}
				}

				$categories = array();
				if ($mode == 'edit')
				{
					$sql = 'SELECT category_id
						FROM ' . $this->kb_article_category_table . '
						WHERE article_id = ' . (int) $article_id;
					$result = $this->db->sql_query($sql);
					while ($set = $this->db->sql_fetchrow($result))
					{
						$categories[] = $set['category_id'];
					}
					$this->db->sql_freeresult($result);
				}

				// OK, build the category list
				$sql = 'SELECT category_id, category_name
					FROM ' . $this->kb_categories_table . '
					ORDER BY left_id ASC';
				$result = $this->db->sql_query($sql);
				$s_category_options = '';
				while ($data = $this->db->sql_fetchrow($result))
				{
					$s_selected	= (in_array($data['category_id'], $categories)) ? ' selected="selected"' : '';
					$s_category_options .= '<option value="' . $data['category_id'] . '"' . $s_selected . '>' . $data['category_name'] . '</option>';
				}
				$this->db->sql_freeresult($result);

				$bbcode_checked		= (isset($article_bbcode)) ? !$article_bbcode : (($this->config['allow_bbcode']) ? !$this->user->optionget('bbcode') : 1);
				$smilies_checked	= (isset($article_smilies)) ? !$article_smilies : (($this->config['allow_smilies']) ? !$this->user->optionget('smilies') : 1);
				$urls_checked		= (isset($article_urls)) ? !$article_urls : 0;

				// Now assign vars to the template
				$this->template->assign_vars(array(
					'USERNAME'				=> ($mode == 'edit') ? $row['username'] : $username,
					'ARTICLE_TITLE'			=> ($mode == 'edit') ? $row['article_title'] : $title,
					'ARTICLE_DESCRIPTION'	=> ($mode == 'edit') ? $row['article_description'] : $description,
					'ARTICLE_TEXT'			=> ($mode == 'edit') ? $row['article_text'] : $text,

					'BBCODE_STATUS'			=> $this->lang->lang(($bbcode_status ? 'BBCODE_IS_ON' : 'BBCODE_IS_OFF'), '<a href="' . $this->helper->route('phpbb_help_bbcode_controller') . '">', '</a>'),
					'IMG_STATUS'			=> ($img_status) ? $this->lang->lang('IMAGES_ARE_ON') : $this->lang->lang('IMAGES_ARE_OFF'),
					'FLASH_STATUS'			=> ($flash_status) ? $this->lang->lang('FLASH_IS_ON') : $this->lang->lang('FLASH_IS_OFF'),
					'SMILIES_STATUS'		=> ($smilies_status) ? $this->lang->lang('SMILIES_ARE_ON') : $this->lang->lang('SMILIES_ARE_OFF'),
					'URL_STATUS'			=> ($bbcode_status && $url_status) ? $this->lang->lang('URL_IS_ON') : $this->lang->lang('URL_IS_OFF'),

					'ERROR'	=> (sizeof($error)) ? implode('<br />', $error) : '',

					'S_CATEGORY_OPTIONS'	=> $s_category_options,
					'S_CHGPOSTER'			=> $this->auth->acl_get('m_kb_chgposter') ? true : false,

					'S_BBCODE_ALLOWED'			=> $bbcode_status,
					'S_BBCODE_CHECKED'			=> ($bbcode_checked) ? ' checked="checked"' : '',
					'S_SMILIES_ALLOWED'			=> $smilies_status,
					'S_SMILIES_CHECKED'			=> ($smilies_checked) ? ' checked="checked"' : '',
					'S_LINKS_ALLOWED'			=> $url_status,
					'S_MAGIC_URL_CHECKED'		=> ($urls_checked) ? ' checked="checked"' : '',

					'S_BBCODE_IMG'			=> $img_status,
					'S_BBCODE_URL'			=> $url_status,
					'S_BBCODE_FLASH'		=> $flash_status,
					'S_BBCODE_QUOTE'		=> $quote_status,

					'S_SHOW_SMILEY_LINK'	=> true,
					'S_KNOWLEDGEBASE'		=> true,

					'U_FIND_USERNAME'	=> append_sid("{$this->root_path}memberlist.$this->php_ext", 'mode=searchuser&amp;form=postform&amp;field=username&amp;select_single=true'),
					'U_MORE_SMILIES'	=> append_sid("{$this->root_path}posting.$this->php_ext", 'mode=smilies'),
				));

				return $this->helper->render('posting_body.html', $this->lang->lang('KNOWLEDGEBASE') . ' - ' . $this->lang->lang('POST_ARTICLE'));
			break;

			case 'viewarticle':
				$article_id	= $this->request->variable('a', 0);

				// Do we have a article id?
				if (!$article_id)
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
				}

				$sql_where = (!$this->auth->acl_get('m_kb_approve')) ? ' AND article_visibility = ' . constants::ARTICLE_APPROVED : '';

				$sql = 'SELECT *
					FROM ' . $this->kb_articles_table . '
					WHERE article_id = ' . (int) $article_id . "
						$sql_where";
				$result = $this->db->sql_query($sql);
				$data = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				// Grab the categories this article belongs to
				$category_list = array();
				$sql_ary = array(
					'SELECT'	=> 'c.*',

					'FROM'		=> array(
						$this->kb_categories_table	=> 'c',
					),

					'LEFT_JOIN'	=> array(
						array(
							'FROM'	=> array($this->kb_article_category_table	=> 'ac'),
							'ON'	=> 'ac.category_id = c.category_id',
						),
					),

					'WHERE'		=> 'ac.article_id = ' . (int) $article_id,

					'ORDER_BY'	=> 'left_id ASC',
				);
				$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$url = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index', 'c' => (int) $row['category_id']));
					$category_list[] = '<a href="' . $url . '">' . $row['category_name'] . '</a>';
				}
				$this->db->sql_freeresult($result);

				if ($data['article_visibility'] <> constants::ARTICLE_APPROVED && !$this->auth->acl_get('m_kb_approve'))
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
				}

				// Update the views counter
				$sql = 'UPDATE ' . $this->kb_articles_table . ' SET article_views = article_views + 1 WHERE article_id = ' . (int) $article_id;
				$this->db->sql_query($sql);

				$bbcode_options = (($data['enable_bbcode']) ? OPTION_FLAG_BBCODE : 0) +
					(($data['enable_smilies']) ? OPTION_FLAG_SMILIES : 0) +
					(($data['enable_magic_url']) ? OPTION_FLAG_LINKS : 0);
				$board_url = generate_board_url();

				$this->template->assign_vars(array(
					'ARTICLE_ID'			=> (int) $article_id,
					'ARTICLE_AUTHOR_FULL'	=> get_username_string('full', $data['article_poster_id'], $data['article_poster_name'], $data['article_poster_colour']),

					'ARTICLE_DATE'			=> $this->user->format_date($data['article_time']),
					'ARTICLE_EDIT_DATE'		=> $data['article_edit_time'] > 0 ? $this->user->format_date($data['article_edit_time']) : false,
					'ARTICLE_TITLE'			=> $data['article_title'],
					'CATEGORIES'			=> implode(', ', $category_list),
					'ARTICLE_DESCRIPTION'	=> $data['article_description'],
					'MESSAGE'				=> generate_text_for_display($data['article_text'], $data['bbcode_uid'], $data['bbcode_bitfield'], $bbcode_options),
					'ARTICLE_VIEWS'			=> $data['article_views'],

					'U_APPROVE'		=> $this->auth->acl_get('m_kb_approve') ? ($data['article_visibility'] == constants::ARTICLE_APPROVED ? '' : $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'approve', 'a' => (int) $article_id))) : '',
					'U_DELETE'		=> $this->auth->acl_get('u_kb_delete') && $this->user->data['user_id'] == $data['article_poster_id'] ? $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'posting', 'mode' => 'delete', 'a' => (int) $article_id)) : ($this->auth->acl_get('m_kb_delete') ? $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'delete', 'a' => (int) $article_id)) : ''),
					'U_DENY'		=> $this->auth->acl_get('m_kb_approve') ? ($data['article_visibility'] == constants::ARTICLE_DENIED ? '' : $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'deny', 'a' => (int) $article_id))) : '',
					'U_DISAPPROVE'	=> $this->auth->acl_get('m_kb_approve') ? ($data['article_visibility'] == constants::ARTICLE_APPROVED || $data['article_visibility'] == constants::ARTICLE_DENIED ? $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'disapprove', 'a' => (int) $article_id)) : '') : '',
					'U_EDIT'		=> $this->auth->acl_get('m_kb_edit') || ($this->auth->acl_get('u_kb_edit') && $this->user->data['user_id'] == $data['article_poster_id']) ? $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'posting', 'mode' => 'edit', 'a' => (int) $article_id)) : '',

					'U_VIEW_ARTICLE'		=> $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id)),
					'U_VIEW_ARTICLE_LINK'	=> $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id), true, false, UrlGeneratorInterface::ABSOLUTE_URL),
				));

				return $this->helper->render('viewarticle_body.html', $this->lang->lang('KNOWLEDGEBASE') . ' - ' . $data['article_title']);
			break;

			default:
				throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_PAGE_MODE'));
			break;
		}
	}
}
