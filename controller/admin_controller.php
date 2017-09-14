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

/**
 * Knowledge Base admin controller
 */
class admin_controller implements admin_interface
{
	/** @var \phpbb\cache\driver\driver_interface */
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

	/** @var string */
	protected $kb_articles_table;

	/** @var string */
	protected $kb_article_category_table;

	/** @var string */
	protected $kb_categories_table;

	/** @var string Custom form action */
	protected $u_action;

	/**
	 * Constructor
	 *
	 * @param \phpbb\cache\driver\driver_interface  $cache
	 * @param \phpbb\config\config                  $config
	 * @param ContainerInterface                    $container
	 * @param \phpbb\controller\helper              $helper
	 * @param \phpbb\db\driver\driver_interface     $db
	 * @param \phpbb\language\language              $lang
	 * @param \phpbb\log\log                        $log
	 * @param \phpbb\request\request                $request
	 * @param \phpbb\template\template              $template
	 * @param \phpbb\user                           $user
	 * @param string                                $root_path
	 * @param string                                $php_ext
	 * @param string                                $kb_articles_table
	 * @param string                                $kb_article_category_table
	 * @param string                                $kb_categories_table
	 */
	public function __construct(\phpbb\cache\driver\driver_interface $cache, \phpbb\config\config $config, ContainerInterface $container, \phpbb\controller\helper $helper, \phpbb\db\driver\driver_interface $db, \phpbb\language\language $lang, \phpbb\log\log $log, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, $root_path, $php_ext, $kb_articles_table, $kb_article_category_table, $kb_categories_table)
	{
		$this->cache = $cache;
		$this->config = $config;
		$this->container = $container;
		$this->helper = $helper;
		$this->db = $db;
		$this->lang = $lang;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->kb_articles_table = $kb_articles_table;
		$this->kb_article_category_table = $kb_article_category_table;
		$this->kb_categories_table = $kb_categories_table;
	}

	/**
	 * Display the options a user can configure for this extension
	 *
	 * @return void
	 * @access public
	 */
	public function display_options()
	{
		// Create a form key for preventing CSRF attacks
		add_form_key('knowledgebase_settings');

		// Create an array to collect errors that will be output to the user
		$errors = array();

		// Is the form being submitted to us?
		if ($this->request->is_set_post('submit'))
		{
			// Test if the submitted form is valid
			if (!check_form_key('knowledgebase_settings'))
			{
				$errors[] = $this->lang->lang('FORM_INVALID');
			}

			// If no errors, process the form data
			if (empty($errors))
			{
				// Set the options the user configured
				$this->set_options();

				// Add option settings change action to the admin log
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'ACP_KNOWLEDGEBASE_SETTINGS_LOG');

				// Option settings have been updated and logged
				// Confirm this to the user and provide link back to previous page
				trigger_error($this->lang->lang('ACP_KNOWLEDGEBASE_SETTINGS_CHANGED') . adm_back_link($this->u_action));
			}
		}

		$s_errors = (bool) count($errors);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_ERROR'	=> $s_errors,
			'ERROR_MSG'	=> $s_errors ? implode('<br />', $errors) : '',

			'U_ACTION'	=> $this->u_action,

			'KNOWLEDGEBASE_FONT_ICON'		=> $this->config['knowledgebase_font_icon'],
			'S_KNOWLEDGEBASE_ENABLE'		=> (bool) $this->config['knowledgebase_enable'],
			'S_KNOWLEDGEBASE_HEADER_LINK'	=> (bool) $this->config['knowledgebase_header_link'],
		));
	}


	/**
	 * Set the options a user can configure
	 *
	 * @return void
	 * @access protected
	 */
	protected function set_options()
	{
		// Validate font icon field characters
		$knowledgebase_font_icon = $this->request->variable('knowledgebase_font_icon', '');
		if (!empty($knowledgebase_font_icon) && !preg_match('/^[a-z0-9-]+$/', $knowledgebase_font_icon))
		{
			trigger_error($this->lang->lang('ACP_KNOWLEDGEBASE_FONT_ICON_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
		}

		$this->config->set('knowledgebase_font_icon', $knowledgebase_font_icon);
		$this->config->set('knowledgebase_enable', $this->request->variable('knowledgebase_enable', 0));
		$this->config->set('knowledgebase_header_link', $this->request->variable('knowledgebase_header_link', 0));
	}

	/**
	 * Display the categories
	 *
	 * @return void
	 * @access public
	 */
	public function display_categories()
	{
		$sql_ary = array(
			'SELECT'   => 'category_id',
			'FROM'     => array($this->kb_categories_table => 'kb'),
			'ORDER_BY' => 'kb.left_id',
		);
		$result = $this->db->sql_query($this->db->sql_build_query('SELECT', $sql_ary));

		while ($row = $this->db->sql_fetchrow($result))
		{
			$category_id = (int) $row['category_id'];

			/** @var \kinerity\knowledgebase\entity\functions $entity */
			$entity = $this->container->get('kinerity.knowledgebase.functions.entity')->load($category_id);

			// Set output block vars for display in the template
			$categories = array(
				'CATEGORY_NAME'        => $entity->get_title(),
				'CATEGORY_DESCRIPTION' => $entity->get_description_for_display(),

				'U_DELETE'    => "{$this->u_action}&amp;action=delete&amp;category_id=" . $entity->get_id(),
				'U_EDIT'      => "{$this->u_action}&amp;action=edit&amp;category_id=" . $entity->get_id(),
				'U_MOVE_DOWN' => "{$this->u_action}&amp;action=move_down&amp;category_id=" . $entity->get_id() . '&amp;hash=' . generate_link_hash('kb_move'),
				'U_MOVE_UP'   => "{$this->u_action}&amp;action=move_up&amp;category_id=" . $entity->get_id() . '&amp;hash=' . generate_link_hash('kb_move'),
			);

			$sql = 'SELECT COUNT(article_id) AS articles
				FROM ' . $this->kb_article_category_table . ' ac
				WHERE category_id = ' . (int) $category_id;
			$articles_result = $this->db->sql_query($sql);
			$categories['ARTICLES'] = $this->db->sql_fetchfield('articles');
			$this->db->sql_freeresult($articles_result);

			$this->template->assign_block_vars('categories', $categories);
		}
		$this->db->sql_freeresult($result);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'U_ACTION'       => "{$this->u_action}",
			'U_ADD_CATEGORY' => "{$this->u_action}&amp;action=add",
		));
	}

	/**
	 * Add a category
	 *
	 * @return void
	 * @access public
	 */
	public function add_category()
	{
		// Add form key
		add_form_key('add_edit_category');

		// Initiate an entity
		/** @var \kinerity\knowledgebase\entity\functions $entity */
		$entity = $this->container->get('kinerity.knowledgebase.functions.entity');

		// Collect the form data
		$data = array(
			'category_name'				=> $this->request->variable('category_name', '', true),
			'category_description'		=> $this->request->variable('category_description', '', true),
			'bbcode'					=> !$this->request->variable('disable_bbcode', false),
			'magic_url'					=> !$this->request->variable('disable_magic_url', false),
			'smilies'					=> !$this->request->variable('disable_smilies', false),
		);

		// Process the new category
		$this->add_edit_category_data($entity, $data);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_ADD_CATEGORY'		=> true,

			'U_ADD_ACTION'		=> "{$this->u_action}&amp;action=add",
		));
	}

	/**
	 * Edit a category
	 *
	 * @param int $category_id The category identifier to edit
	 * @return void
	 * @access public
	 */
	public function edit_category($category_id)
	{
		// Add form key
		add_form_key('add_edit_category');

		// Initiate and load the entity
		/** @var \kinerity\knowledgebase\entity\functions $entity */
		$entity = $this->container->get('kinerity.knowledgebase.functions.entity')->load($category_id);

		// Collect the form data
		$data = array(
			'category_name'				=> $this->request->variable('category_name', $entity->get_title(), true),
			'category_description'		=> $this->request->variable('category_description', $entity->get_description_for_edit(), true),
			'bbcode'					=> !$this->request->variable('disable_bbcode', false),
			'magic_url'					=> !$this->request->variable('disable_magic_url', false),
			'smilies'					=> !$this->request->variable('disable_smilies', false),
		);

		// Process the edited category
		$this->add_edit_category_data($entity, $data);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_EDIT_CATEGORY'		=> true,

			'U_EDIT_ACTION'		=> "{$this->u_action}&amp;category_id={$category_id}&amp;action=edit",
		));
	}

	/**
	 * Process category data to be added or edited
	 *
	 * @param \kinerity\knowledgebase\entity\functions $entity The entity object
	 * @param array                                    $data   The form data to be processed
	 * @return void
	 * @access protected
	 */
	protected function add_edit_category_data($entity, $data)
	{
		// Get form's POST actions (submit)
		$submit = $this->request->is_set_post('submit');

		// Load posting language file for the BBCode editor
		$this->lang->add_lang('posting');

		// Create an array to collect errors that will be output to the user
		$errors = array();

		// Grab the form data's description parsing options (possible values: 1 or 0)
		$description_parse_options = array(
			'bbcode'	=> ($submit) ? $data['bbcode'] : $entity->description_bbcode_enabled(),
			'magic_url'	=> ($submit) ? $data['magic_url'] : $entity->description_magic_url_enabled(),
			'smilies'	=> ($submit) ? $data['smilies'] : $entity->description_smilies_enabled(),
		);

		// Set the description parse options in the entity
		foreach ($description_parse_options as $function => $enabled)
		{
			$entity->{($enabled ? 'description_enable_' : 'description_disable_') . $function}();
		}

		unset($description_parse_options);

		// Grab the form's category data fields
		$category_fields = array(
			'title'			=> $data['category_name'],
			'description'	=> $data['category_description'],
		);

		// Set the category's data in the entity
		foreach ($category_fields as $entity_function => $category_data)
		{
			try
			{
				$entity->{'set_' . $entity_function}($category_data);
			}
			catch (\kinerity\knowledgebase\exception\base $e)
			{
				// Catch exceptions and add them to errors array
				$errors[] = $e->get_message($this->lang);
			}
		}

		unset($category_fields);

		// If the form has been submitted
		if ($submit)
		{
			// Test if the form is valid
			if (!check_form_key('add_edit_category') || $entity->get_title() == '')
			{
				$errors[] = $this->lang->lang('FORM_INVALID');
			}
		}

		// Insert or update category
		if ($submit && empty($errors))
		{
			if ($entity->get_id())
			{
				// Save the edited category entity to the database
				try
				{
					$entity->save();
				}
				catch (\kinerity\knowledgebase\exception\out_of_bounds $e)
				{
					trigger_error($e->get_message($this->lang) . adm_back_link($this->u_action), E_USER_WARNING);
				}

				$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_CATEGORY_EDIT_LOG', time(), array($data['category_name']));

				// Show user confirmation of the saved category and provide link back to the previous page
				trigger_error($this->lang->lang('ACP_CATEGORY_EDITED') . adm_back_link("{$this->u_action}"));
			}
			else
			{
				// Add a new category entity to the database
				try
				{
					$entity->insert();
				}
				catch (\kinerity\knowledgebase\exception\out_of_bounds $e)
				{
					trigger_error($e->get_message($this->lang) . adm_back_link($this->u_action), E_USER_WARNING);
				}

				$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_CATEGORY_ADD_LOG', time(), array($data['category_name']));

				// Show user confirmation of the added category and provide link back to the previous page
				trigger_error($this->lang->lang('ACP_CATEGORY_ADDED') . adm_back_link("{$this->u_action}"));
			}
		}

		$s_errors = (bool) count($errors);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_ERROR'			=> $s_errors,
			'ERROR_MSG'			=> $s_errors ? implode('<br />', $errors) : '',

			'CATEGORY_NAME'				=> $entity->get_title(),
			'CATEGORY_DESCRIPTION'		=> $entity->get_description_for_edit(),

			'S_BBCODE_DISABLE_CHECKED'		=> !$entity->description_bbcode_enabled(),
			'S_SMILIES_DISABLE_CHECKED'		=> !$entity->description_smilies_enabled(),
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$entity->description_magic_url_enabled(),

			'BBCODE_STATUS'			=> $this->lang->lang('BBCODE_IS_ON', '<a href="' . $this->helper->route('phpbb_help_bbcode_controller') . '">', '</a>'),
			'SMILIES_STATUS'		=> $this->lang->lang('SMILIES_ARE_ON'),
			'URL_STATUS'			=> $this->lang->lang('URL_IS_ON'),

			'S_BBCODE_ALLOWED'		=> true,
			'S_SMILIES_ALLOWED'		=> true,
			'S_LINKS_ALLOWED'		=> true,
		));
	}

	/**
	 * Delete a category
	 *
	 * @param int $category_id The category identifier to delete
	 * @return void
	 * @access public
	 */
	public function delete_category($category_id)
	{
		// Add form key
		add_form_key('delete_category');

		// Build an array of categories
		$sql = 'SELECT *
			FROM ' . $this->kb_categories_table . '
			ORDER BY left_id ASC';
		$result = $this->db->sql_query($sql);
		$options_list = $category_name ='';
		$rows = $data = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$rows[] = $row['category_id'];

			if ($row['category_id'] == $category_id)
			{
				$category_name = $row['category_name'];
			}
			else
			{
				$options_list .= '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
			}
		}
		$this->db->sql_freeresult($result);

		// Does the category contain articles?
		$sql = 'SELECT COUNT(article_id) as articles
			FROM ' . $this->kb_article_category_table . '
			WHERE category_id = ' . (int) $category_id;
		$this->db->sql_query($sql);
		$i = $this->db->sql_fetchfield('articles');

		if ($i == 0)
		{
			if (confirm_box(true))
			{
				$sql = 'DELETE FROM ' . $this->kb_categories_table . '
					WHERE category_id = ' . (int) $category_id;
				$this->db->sql_query($sql);

				$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG', time(), array($category_name));

				trigger_error($this->lang->lang('ACP_CATEGORY_DELETED') . adm_back_link("{$this->u_action}"));
			}
			else
			{
				confirm_box(false, $this->lang->lang('ACP_DELETE_CATEGORY_CONFIRM'));
			}
		}
		else
		{
			$in = $out = $new_ary = array();

			// Two queries - one for each array
			$sql = 'SELECT article_id
				FROM ' . $this->kb_article_category_table . '
				WHERE category_id = ' . (int) $category_id;
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$in[] = $row['article_id'];
			}
			$this->db->sql_freeresult($result);

			$sql = 'SELECT article_id
				FROM ' . $this->kb_article_category_table . '
				WHERE category_id != ' . (int) $category_id;
			$result = $this->db->sql_query($sql);
			while ($row = $this->db->sql_fetchrow($result))
			{
				$out[] = $row['article_id'];
			}
			$this->db->sql_freeresult($result);

			$delete_action = $this->request->variable('delete_action', '');
			$id = $this->request->variable('id', 0);

			// Was submit pressed? If so, process the requested action
			if ($this->request->is_set_post('submit'))
			{
				// Test if the form is valid
				if (!check_form_key('delete_category'))
				{
					trigger_error($this->lang->lang('FORM_INVALID'));
				}

				$j = 0;
				$list = $message = '';

				if ($delete_action == 'delete')
				{
					// Validate articles that should NOT be deleted
					$diff_ary = array_diff($in, $out);
					$intersect_ary = array_intersect($in, $out);

					// Delete articles belonging ONLY to this category
					foreach ($diff_ary as $row)
					{
						$sql = 'DELETE FROM ' . $this->kb_articles_table . '
							WHERE article_id = ' . (int) $row;
						$this->db->sql_query($sql);

						$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
							WHERE category_id = ' . (int) $category_id . '
								AND article_id = ' . (int) $row;
						$this->db->sql_query($sql);
					}

					// Build a list of articles belonging to categories and delete
					// the entry in the database for the category being deleting
					foreach ($intersect_ary as $row)
					{
						$j++;

						$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
							WHERE category_id = ' . (int) $category_id . '
								AND article_id = ' . (int) $row;
						$this->db->sql_query($sql);

						$sql = 'SELECT article_title
							FROM ' . $this->kb_articles_table . '
							WHERE article_id = ' . (int) $row;
						$this->db->sql_query($sql);
						$subject = $this->db->sql_fetchfield('article_title');

						$list .= '<br />- ' . $subject;
					}

					$message = $this->lang->lang('ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_DELETED', $j, $list);
				}
				else if ($delete_action == 'move')
				{
					// Build a list of articles in the category we are moving articles to
					$sql = 'SELECT article_id
						FROM ' . $this->kb_article_category_table . '
						WHERE category_id = ' . (int) $id;
					$result = $this->db->sql_query($sql);
					while ($row = $this->db->sql_fetchrow($result))
					{
						$new_ary[] = $row['article_id'];
					}
					$this->db->sql_freeresult($result);

					// Validate articles already in the selected category
					$intersect_ary = array_intersect($in, $new_ary);
					$diff_ary = array_diff($in, $new_ary);

					// Remove entries for articles already in the new category and build a list
					foreach ($intersect_ary as $row)
					{
						$j++;

						$sql = 'DELETE FROM ' . $this->kb_article_category_table . '
							WHERE category_id = ' . (int) $category_id . '
								AND article_id = ' . (int) $row;
						$this->db->sql_query($sql);

						$sql = 'SELECT article_title
							FROM ' . $this->kb_articles_table . '
							WHERE article_id = ' . (int) $row;
						$this->db->sql_query($sql);
						$subject = $this->db->sql_fetchfield('article_title');

						$list .= '<br />- ' . $subject;
					}

					// Move articles from the old category to the new category
					foreach ($diff_ary as $row)
					{
						$sql = 'UPDATE ' . $this->kb_article_category_table . '
							SET category_id = ' . (int) $id . '
							WHERE article_id = ' . (int) $row;
						$this->db->sql_query($sql);
					}

					$message = $this->lang->lang('ACP_KNOWLEDGEBASE_DELETE_CATEGORY_NOT_UPDATED', $j, $list);
				}

				// All articles handled, delete the category and log an entry
				$sql = 'DELETE FROM ' . $this->kb_categories_table . '
					WHERE category_id = ' . (int) $category_id;
				$this->db->sql_query($sql);

				$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_CATEGORY_DELETE_LOG', time(), array($category_name));

				$message = ($j > 0) ? $message : $this->lang->lang('ACP_CATEGORY_DELETED');
				trigger_error($message . adm_back_link($this->u_action));
			}

			// Set output vars for display in the template
			$this->template->assign_vars(array(
				'CATEGORY_NAME'			=> $category_name,
				'MOVE_ARTICLES_OPTIONS'	=> $options_list,

				'S_DELETE_CATEGORY'			=> true,
				'S_MOVE_ARTICLES_OPTIONS'	=> $options_list ? true : false,

				'U_DELETE_ACTION'	=> "{$this->u_action}&amp;category_id={$category_id}&amp;action=delete",
			));
		}
	}

	/**
	 * Move a category up/down
	 *
	 * @param int    $category_id The category identifier to move
	 * @param string $direction   The direction (up|down)
	 * @return void
	 * @access public
	 */
	public function move_category($category_id, $direction)
	{
		// Before moving the currency, with check the link hash.
		// If the hash, is invalid we return an error.
		if (!check_link_hash($this->request->variable('hash', ''), 'kb_move'))
		{
			trigger_error($this->lang->lang('ACP_KNOWLEDGEDABE_INVALID_HASH') . adm_back_link($this->u_action), E_USER_WARNING);
		}

		$sql = 'SELECT *
			FROM ' . $this->kb_categories_table . '
			WHERE category_id = ' . (int) $category_id;
		$result = $this->db->sql_query($sql);
		$item = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		$move_cat_name = $this->move_category_by($item, $direction);

		if ($move_cat_name !== false)
		{
			$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_CATEGORY_' . strtoupper($direction) . '_LOG', time(), array($item['category_name'], $move_cat_name));
			$this->cache->destroy('sql', $this->kb_categories_table);
		}
		if ($this->request->is_ajax())
		{
			$json_response = new \phpbb\json_response;
			$json_response->send(array('success' => ($move_cat_name !== false)));
		}
	}

	/**
	 * Move category position by $steps up/down
	 *
	 * @param array  $cat_row
	 * @param string $direction
	 * @param int    $steps
	 *
	 * @return string
	 */
	private function move_category_by($cat_row, $direction = 'move_up', $steps = 1)
	{
		/**
		 * Fetch all the siblings between the category's current spot
		 * and where we want to move it to. If there are less than $steps
		 * siblings between the current spot and the target then the
		 * category will move as far as possible
		 */
		$sql = 'SELECT category_id, category_name, left_id, right_id
			FROM ' . $this->kb_categories_table . "
			WHERE " . (($direction == 'move_up') ? "right_id < {$cat_row['right_id']} ORDER BY right_id DESC" : "left_id > {$cat_row['left_id']} ORDER BY left_id ASC");
		$result = $this->db->sql_query_limit($sql, $steps);

		$target = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			$target = $row;
		}
		$this->db->sql_freeresult($result);

		if (!sizeof($target))
		{
			// The category is already on top or bottom
			return false;
		}

		/**
		 * $left_id and $right_id define the scope of the nodes that are affected by the move.
		 * $diff_up and $diff_down are the values to substract or add to each node's left_id
		 * and right_id in order to move them up or down.
		 * $move_up_left and $move_up_right define the scope of the nodes that are moving
		 * up. Other nodes in the scope of ($left_id, $right_id) are considered to move down.
		 */
		if ($direction == 'move_up')
		{
			$left_id = $target['left_id'];
			$right_id = $cat_row['right_id'];

			$diff_up = $cat_row['left_id'] - $target['left_id'];
			$diff_down = $cat_row['right_id'] + 1 - $cat_row['left_id'];

			$move_up_left = $cat_row['left_id'];
			$move_up_right = $cat_row['right_id'];
		}
		else
		{
			$left_id = $cat_row['left_id'];
			$right_id = $target['right_id'];

			$diff_up = $cat_row['right_id'] + 1 - $cat_row['left_id'];
			$diff_down = $target['right_id'] - $cat_row['right_id'];

			$move_up_left = $cat_row['right_id'] + 1;
			$move_up_right = $target['right_id'];
		}

		// Now do the dirty job
		$sql = 'UPDATE ' . $this->kb_categories_table . "
			SET left_id = left_id + CASE
				WHEN left_id BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
				ELSE {$diff_down}
			END,
			right_id = right_id + CASE
				WHEN right_id BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
				ELSE {$diff_down}
			END
			WHERE
				left_id BETWEEN {$left_id} AND {$right_id}
				AND right_id BETWEEN {$left_id} AND {$right_id}";
		$this->db->sql_query($sql);

		return $target['cat_name'];
	}

	/**
	 * Set page url
	 *
	 * @param string $u_action Custom form action
	 * @return void
	 * @access public
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
