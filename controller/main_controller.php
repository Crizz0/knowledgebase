<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace kinerity\knowledgebase\controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use kinerity\knowledgebase\constants;

/**
* Main controller
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

	/** @var \phpbb\controller\helper $controller_helper */
	protected $controller_helper;

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
	* @param \phpbb\auth\auth                  $auth                 Auth object
	* @param \phpbb\cache\service              $cache                Cache object
	* @param \phpbb\config\config              $config               Config object
	* @param ContainerInterface                $container            Service container interface
	* @param \phpbb\controller\helper          $controller_helper    Controller helper object
	* @param \phpbb\db\driver\driver_interface $db                   Database object
	* @param \phpbb\language\language          $lang                 Language object
	* @param \phpbb\log\log                    $log                  Log object
	* @param \phpbb\notification\manager       $notification_manager Notification manager
	* @param \phpbb\request\request            $request              Request object
	* @param \phpbb\template\template          $template             Template object
	* @param \phpbb\user                       $user                 User object
	* @param string                            $root_path            phpBB root path
	* @param string                            $php_ext              phpEx
	* @param string                            $kb_articles_table
	* @param string                            $kb_article_category_table
	* @param string                            $kb_categories_table
	* @access public
	*/
	public function __construct(\phpbb\auth\auth $auth, \phpbb\cache\service $cache, \phpbb\config\config $config, ContainerInterface $container, \phpbb\controller\helper $controller_helper, \phpbb\db\driver\driver_interface $db, \phpbb\language\language $lang, \phpbb\log\log $log, \phpbb\notification\manager $notification_manager, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, $root_path, $php_ext, $kb_articles_table, $kb_article_category_table, $kb_categories_table)
	{
		$this->auth = $auth;
		$this->cache = $cache;
		$this->config = $config;
		$this->container = $container;
		$this->controller_helper = $controller_helper;
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

		// Add navlinks
		$this->template->assign_block_vars('navlinks', array(
			'FORUM_NAME'	=> $this->lang->lang('KNOWLEDGEBASE'),
			'U_VIEW_FORUM'	=> $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index')),
		));

		// Individual pages
		switch ($page)
		{
			case 'index':
				$type = $this->request->variable('type', 'approved');

				// Basic pagewide vars
				$this->template->assign_vars(array(
					'TYPE'	=> $this->lang->lang(strtoupper($type)),

					'S_DISPLAY_POST_BUTTON'	=> $this->auth->acl_get('u_kb_post') ? true : false,
					'S_DISPLAY_TYPE_MENU'	=> $this->auth->acl_get('m_kb_approve') ? true : false,

					'U_POST_NEW_ARTICLE'	=> ($this->auth->acl_get('u_kb_post')) ? $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'posting', 'mode' => 'post')) : '',
				));

				// Generate the type list
				$type_array = array('approved', 'unapproved', 'denied');

				foreach ($type_array as $key)
				{
					$this->template->assign_block_vars('types', array(
						'TYPE'	=> $this->lang->lang(strtoupper($key)),

						'U_TYPE'	=> $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index', 'type' => $key)),
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

						case 'unapproved':
							$sql_where .= 'article_visibility = ' . constants::ARTICLE_UNAPPROVED;
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

				// Check for valid type
				if (!in_array($type, $type_array))
				{
					throw new \phpbb\exception\http_exception(404, $this->user->lang('INVALID_TYPE'));
				}

				// Prevent altering the URI to bypass the $sql_where var
				if (!$this->auth->acl_get('m_kb_approve') && $type != 'approved')
				{
					throw new \phpbb\exception\http_exception(403, $this->user->lang('NOT_AUTHORISED'));
				}

				// Grab all articles
				$sql = 'SELECT *
					FROM ' . $this->kb_articles_table . "
					WHERE $sql_where
					ORDER BY article_title ASC";
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$rowset[$row['article_id']] = $row;
					$article_list[] = (int) $row['article_id'];
				}
				$this->db->sql_freeresult($result);

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
						$url = $this->config['enable_mod_rewrite'] ? append_sid("{$this->root_path}kb/viewcategory", 'c=' . (int) $row['category_id']) : append_sid("{$this->root_path}/app.$this->php_ext" . '/kb/viewcategory', 'c=' . (int) $row['category_id']);
						$category_list[$row['article_id']][] = '<a href="' . $url . '">' . $row['category_name'] . '</a>';
					}
					$this->db->sql_freeresult($result);

					foreach ($article_list as $article_id)
					{
						$row = $rowset[$article_id];
						$categories = $category_list[$article_id];

						// Generate all the URIs ...
						$view_article_url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));

						// Send vars to template
						$article_row = array(
							'ARTICLE_ID'			=> (int) $article_id,
							'ARTICLE_AUTHOR_FULL'	=> get_username_string('full', $row['article_poster_id'], $row['article_poster_name'], $row['article_poster_colour']),
							'ARTICLE_TIME'			=> $this->user->format_date($row['article_time']),

							'VIEWS'			=> $row['article_views'],
							'ARTICLE_TITLE'	=> censor_text($row['article_title']),
							'ARTICLE_DESC'	=> censor_text($row['article_desc']),

							'CATEGORIES'	=> implode($this->lang->lang('COMMA_SEPARATOR'), $categories),

							'VISIBILITY_PREFIX'	=> $type != 'approved' ? $this->lang->lang(strtoupper($type)) : '',

							'U_VIEW_ARTICLE'		=> $view_article_url,
						);

						$this->template->assign_block_vars('articlerow', $article_row);

						unset($rowset[$article_id]);
					}
				}

				return $this->controller_helper->render('index_body.html', $this->lang->lang('KNOWLEDGEBASE'));
			break;

			case 'mcp':
				$article_id = $this->request->variable('a', 0);
				$mode = $this->request->variable('mode', '');

				$submit = ($this->request->is_set_post('submit')) ? true : false;
				$cancel = ($this->request->is_set_post('cancel')) ? true : false;

				// Do we have an article or (valid) mode?
				if (!$article_id)
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
				}

				// Check for a valid mode
				if (!in_array($mode, array('approve', 'delete', 'deny', 'unapprove')))
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('INVALID_MODE'));
				}

				$entity = $this->container->get('kinerity.knowledgebase.article.entity')->load($article_id);

				// Was cancel pressed? If so, redirect back to where we were
				if ($cancel)
				{
					$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => $entity->get_id()));
					redirect($url);
				}

				switch ($mode)
				{
					case 'approve':
						if (!$this->auth->acl_get('m_kb_approve') || $entity->get_visibility() == constants::ARTICLE_APPROVED)
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . '
								SET article_visibility = ' . constants::ARTICLE_APPROVED . '
								WHERE article_id = ' . $entity->get_id();
							$this->db->sql_query($sql);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_APPROVED_LOG', time(), array($entity->get_title()));

							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => $entity->get_id()));
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
							$title = $entity->get_title();

							$sql = 'DELETE FROM ' . $this->kb_articles_table . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
								WHERE article_id = ' . (int) $article_id;
							$this->db->sql_query($sql);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_DELETED_LOG', time(), array($title));

							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DELETE'))));
						}
					break;

					case 'deny':
						if (!$this->auth->acl_get('m_kb_approve') || $entity->get_visibility() == constants::ARTICLE_DENIED)
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . '
								SET article_visibility = ' . constants::ARTICLE_DENIED . '
								WHERE article_id = ' . $entity->get_id();
							$this->db->sql_query($sql);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_DENIED_LOG', time(), array($entity->get_title()));

							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => $entity->get_id()));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DENY'))));
						}
					break;

					case 'unapprove':
						if (!$this->auth->acl_get('m_kb_approve') || $entity->get_visibility() == constants::ARTICLE_UNAPPROVED)
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						if (confirm_box(true))
						{
							$sql = 'UPDATE ' . $this->kb_articles_table . '
								SET article_visibility = ' . constants::ARTICLE_UNAPPROVED . '
								WHERE article_id = ' . $entity->get_id();
							$this->db->sql_query($sql);

							// Store the notification data we will use in an array
							$notification_data = array(
								'article_id'	=> $entity->get_id(),
								'article_title'	=> $entity->get_title(),
							);

							/**
							* Delete the old notification before adding a new one. This fixes a bug where a new notification
							* wasn't created when disapproving an article that was already disapproved once. See
							* https://www.phpbb.com/community/viewtopic.php?f=461&t=2249811 for more information.
							*/
							$this->notification_manager->delete_notifications('kinerity.knowledgebase.notification.type.article_in_queue', $notification_data);

							// Create the notification
							$this->notification_manager->add_notifications('kinerity.knowledgebase.notification.type.article_in_queue', $notification_data);

							$this->log->add('mod', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_ARTICLE_UNAPPROVED_LOG', time(), array($entity->get_title()));

							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => $entity->get_id()));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('UNAPPROVE'))));
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

				$submit = ($this->request->is_set_post('submit')) ? true : false;
				$cancel = ($this->request->is_set_post('cancel')) ? true : false;

				// Is there a valid mode?
				if (!in_array($mode, array('delete', 'edit', 'post')))
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('INVALID_MODE'));
				}

				// Was cancel pressed? If so, redirect back to where we were
				if ($cancel)
				{
					$param = $article_id ? array('page' => 'viewarticle', 'a' => (int) $article_id) : array('page' => 'index');
					$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', $param);
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

				$uid = $bitfield = $options = '';
				$allow_bbcode = $allow_urls = $allow_smilies = true;

				switch ($mode)
				{
					case 'delete':
						if (!$this->auth->acl_get('u_kb_delete') || $this->user->data['user_id'] != $row['poster_id'])
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

							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
							redirect($url);
						}
						else
						{
							confirm_box(false, $this->lang->lang('ARTICLE_CONFIRM', strtolower($this->lang->lang('DELETE'))));
						}
					break;

					case 'edit':
						if ((!$this->auth->acl_get('u_kb_edit') || $this->user->data['user_id'] != $row['poster_id']) && !$this->auth->acl_get('m_kb_edit'))
						{
							throw new \phpbb\exception\http_exception(403, $this->lang->lang('NOT_AUTHORISED'));
						}

						decode_message($row['article_text'], $row['bbcode_uid']);
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
					$description = $this->request->variable('article_desc', '', true);
					$category_list = $this->request->variable('category_list', array(0));
					$text = $this->request->variable('article_text', '', true);
				}

				if ($submit)
				{
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
						generate_text_for_storage($text, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);

						// Create an array with all data to be inserted
						$sql_array = array(
							'article_title'			=> $title,
							'article_desc'			=> $description,
							'article_poster_id'		=> $user_row['user_id'],
							'article_poster_name'	=> $user_row['username'],
							'article_poster_colour'	=> $user_row['user_colour'],
							'article_time'			=> ($mode == 'edit') ? $row['article_time'] : $current_time,
							'article_edit_time'		=> ($mode == 'edit') ? $current_time : 0,
							'enable_bbcode'			=> $allow_bbcode,
							'enable_smilies'		=> $allow_smilies,
							'enable_magic_url'		=> $allow_urls,
							'article_text'			=> $text,
							'bbcode_bitfield'		=> $bitfield,
							'bbcode_uid'			=> $uid,
							'article_visibility'	=> ($mode == 'edit') ? $row['article_visibility'] : ($this->auth->acl_get('u_kb_noapprove') ? constants::ARTICLE_APPROVED : constants::ARTICLE_UNAPPROVED),
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

						// Set correct url, show message to users unable to post without approval
						if (!$this->auth->acl_get('m_kb_approve') && !$this->auth->acl_get('u_kb_noapprove'))
						{
							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
							meta_refresh(3, $url);

							$message = $this->lang->lang('ARTICLE_STORED_MOD');
							trigger_error($message);
						}
						else
						{
							$url = $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
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

				// Now assign vars to the template
				$this->template->assign_vars(array(
					'USERNAME'			=> ($mode == 'edit') ? $row['username'] : $username,
					'ARTICLE_TITLE'		=> ($mode == 'edit') ? $row['article_title'] : $title,
					'ARTICLE_DESC'		=> ($mode == 'edit') ? $row['article_desc'] : $description,
					'ARTICLE_TEXT'		=> ($mode == 'edit') ? $row['article_text'] : $text,

					'ERROR'	=> (sizeof($error)) ? implode('<br />', $error) : '',

					'S_CATEGORY_OPTIONS'	=> $s_category_options,
					'S_CHGPOSTER'			=> $this->auth->acl_get('m_kb_chgposter') ? true : false,

					'U_FIND_USERNAME'	=> append_sid("{$this->root_path}memberlist.$this->php_ext", 'mode=searchuser&amp;form=postform&amp;field=username&amp;select_single=true'),
					'U_MORE_SMILIES'	=> append_sid("{$this->root_path}posting.$this->php_ext", 'mode=smilies'),
				));

				return $this->controller_helper->render('posting_body.html', $this->user->lang('KNOWLEDGEBASE') . ' - ' . $this->user->lang('POST_ARTICLE'));
			break;

			/*case 'viewcategory':
				$category_id	= $this->request->variable('c', 0);

				// Do we have a categor id?
				if (!$category_id)
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_CATEGORY'));
				}

				return $this->controller_helper->render('viewcategory_body.html', $this->user->lang('KNOWLEDGEBASE') . ' - ');
			break;*/

			case 'viewarticle':
				$article_id	= $this->request->variable('a', 0);

				// Do we have a article id?
				if (!$article_id)
				{
					throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_ARTICLE'));
				}

				$sql_where = (!$this->auth->acl_get('m_kb_approve')) ? ' AND article_visibility = ' . constants::ARTICLE_APPROVED : '';

				$entity = $this->container->get('kinerity.knowledgebase.article.entity')->load($article_id, $sql_where);

				// Grab the categories this article belongs to
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

					'WHERE'		=> 'ac.article_id = ' . $entity->get_id(),

					'ORDER_BY'	=> 'left_id ASC',
				);
				$sql = $this->db->sql_build_query('SELECT', $sql_ary);
				$result = $this->db->sql_query($sql);
				while ($row = $this->db->sql_fetchrow($result))
				{
					$url = $this->config['enable_mod_rewrite'] ? append_sid("{$this->root_path}kb/viewcategory", 'c=' . (int) $row['category_id']) : append_sid("{$this->root_path}/app.$this->php_ext" . '/kb/viewcategory', 'c=' . (int) $row['category_id']);
					$category_list[] = '<a href="' . $url . '">' . $row['category_name'] . '</a>';
				}
				$this->db->sql_freeresult($result);

				// Update the views counter
				$sql = 'UPDATE ' . $this->kb_articles_table . ' SET article_views = article_views + 1 WHERE article_id = ' . $entity->get_id();
				$this->db->sql_query($sql);

				$board_url = generate_board_url();

				$this->template->assign_vars(array(
					'ARTICLE_ID'			=> $entity->get_id(),
					'ARTICLE_AUTHOR_FULL'	=> $entity->get_author(),

					'ARTICLE_DATE'		=> $this->user->format_date($entity->get_time()),
					'ARTICLE_EDIT_DATE'	=> $entity->get_edit_time() > 0 ? $this->user->format_date($entity->get_edit_time()) : false,
					'ARTICLE_TITLE'		=> $entity->get_title(),
					'CATEGORIES'		=> implode(', ', $category_list),
					'ARTICLE_DESC'		=> $entity->get_description(),
					'MESSAGE'			=> $entity->get_message_for_display(),
					'ARTICLE_VIEWS'		=> $entity->get_views(),

					'U_APPROVE'		=> $this->auth->acl_get('m_kb_approve') ? ($entity->get_visibility() == constants::ARTICLE_APPROVED ? '' : $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'approve', 'a' => $entity->get_id()))) : '',
					'U_DELETE'		=> $this->auth->acl_get('u_kb_delete') && $this->user->data['user_id'] == $article_data['article_poster_id'] ? $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'posting', 'mode' => 'delete', 'a' => $entity->get_id())) : ($this->auth->acl_get('m_kb_delete') ? $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'delete', 'a' => $entity->get_id())) : ''),
					'U_DENY'		=> $this->auth->acl_get('m_kb_approve') ? ($entity->get_visibility() == constants::ARTICLE_DENIED ? '' : $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'deny', 'a' => $entity->get_id()))) : '',
					'U_UNAPPROVE'	=> $this->auth->acl_get('m_kb_approve') ? ($entity->get_visibility() == constants::ARTICLE_APPROVED || $entity->get_visibility() == constants::ARTICLE_DENIED ? $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'mcp', 'mode' => 'unapprove', 'a' => $entity->get_id())) : '') : '',
					'U_EDIT'		=> $this->auth->acl_get('m_kb_edit') || ($this->auth->acl_get('u_kb_edit') && $this->user->data['user_id'] == $article_data['article_poster_id']) ? $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'posting', 'mode' => 'edit', 'a' => $entity->get_id())) : '',

					'U_VIEW_ARTICLE'		=> $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => $entity->get_id())),
					'U_VIEW_ARTICLE_LINK'	=> $this->config['enable_mod_rewrite'] ? append_sid($board_url . '/kb/viewarticle', 'a=' . article_id) : append_sid($board_url . '/app.' . $this->php_ext . '/kb/viewarticle', 'a=' . $entity->get_id()),
				));

				return $this->controller_helper->render('viewarticle_body.html', $this->lang->lang('KNOWLEDGEBASE') . ' - ' . $entity->get_title());
			break;

			default:
				throw new \phpbb\exception\http_exception(404, $this->lang->lang('NO_PAGE_MODE'));
			break;
		}
	}
}
