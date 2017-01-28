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

/**
* Admin controller
*/
class admin_controller implements admin_interface
{
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

	/** @var string kb_article_category */
	protected $kb_article_category_table;

	/** @var string kb_categories */
	protected $kb_categories_table;

	/** @var string Custom form action */
	protected $u_action;

	/**
	* Constructor
	*
	* @param \phpbb\cache\service              $cache             Cache object
	* @param \phpbb\config\config              $config            Config object
	* @param ContainerInterface                $container         Service container interface
	* @param \phpbb\controller\helper          $controller_helper Controller helper object
	* @param \phpbb\db\driver\driver_interface $db                Database object
	* @param \phpbb\language\language          $lang              Language object
	* @param \phpbb\log\log                    $log               Log object
	* @param \phpbb\request\request            $request           Request object
	* @param \phpbb\template\template          $template          Template object
	* @param \phpbb\user                       $user              User object
	* @param string                            $root_path         phpBB root path
	* @param string                            $php_ext           phpEx
	* @param string                            $kb_article_category_table
	* @param string                            $kb_categories_table
	* @access public
	*/
	public function __construct(\phpbb\cache\service $cache, \phpbb\config\config $config, ContainerInterface $container, \phpbb\controller\helper $controller_helper, \phpbb\db\driver\driver_interface $db, \phpbb\language\language $lang, \phpbb\log\log $log, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, $root_path, $php_ext, $kb_article_category_table, $kb_categories_table)
	{
		$this->cache = $cache;
		$this->config = $config;
		$this->container = $container;
		$this->controller_helper = $controller_helper;
		$this->db = $db;
		$this->lang = $lang;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
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
		$sql = 'SELECT *
			FROM ' . $this->kb_categories_table . '
			ORDER BY left_id ASC';
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$rowlist[] = (int) $row['category_id'];
			$rowset[$row['category_id']] = $row;
		}
		$this->db->sql_freeresult($result);

		foreach ($rowlist as $category_id)
		{
			$row = $rowset[$category_id];

			$entity = $this->container->get('kinerity.knowledgebase.category.entity')->load($row['category_id']);

			// Set output block vars for display in the template
			$categories = array(
				'CATEGORY_NAME'	=> $entity->get_title(),
				'CATEGORY_DESC'	=> $entity->get_description_for_display(),

				'U_DELETE'		=> "{$this->u_action}&amp;action=delete&amp;category_id=" . $entity->get_id(),
				'U_EDIT'		=> "{$this->u_action}&amp;action=edit&amp;category_id=" . $entity->get_id(),
				'U_MOVE_DOWN'	=> "{$this->u_action}&amp;action=move_down&amp;category_id=" . $entity->get_id(),
				'U_MOVE_UP'		=> "{$this->u_action}&amp;action=move_up&amp;category_id=" . $entity->get_id(),
			);

			$sql = 'SELECT COUNT(article_id) AS articles
				FROM ' . $this->kb_article_category_table . ' ac
				WHERE category_id = ' . $row['category_id'];
			$result = $this->db->sql_query($sql);
			while ($data = $this->db->sql_fetchrow($result))
			{
				$categories['ARTICLES'] = $data['articles'];
			}
			$this->db->sql_freeresult($result);

			$this->template->assign_block_vars('categories', $categories);

			unset($rowset[$category_id]);
		}

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'U_ACTION'		=> "{$this->u_action}",
			'U_ADD_CATEGORY'	=> "{$this->u_action}&amp;action=add",
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

		// Initiate a category entity
		$entity = $this->container->get('kinerity.knowledgebase.category.entity');

		// Collect the form data
		$data = array(
			'category_name'		=> $this->request->variable('category_name', '', true),
			'category_desc'		=> $this->request->variable('category_desc', '', true),
			'bbcode'			=> !$this->request->variable('disable_bbcode', false),
			'magic_url'			=> !$this->request->variable('disable_magic_url', false),
			'smilies'			=> !$this->request->variable('disable_smilies', false),
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

		// Initiate and load the category entity
		/* @var $entity \kinerity\knowledgebase\entity\category */
		$entity = $this->container->get('kinerity.knowledgebase.category.entity')->load($category_id);

		// Collect the form data
		$data = array(
			'category_name'	=> $this->request->variable('category_name', $entity->get_title(), true),
			'category_desc'	=> $this->request->variable('category_desc', $entity->get_description_for_edit(), true),
			'bbcode'		=> !$this->request->variable('disable_bbcode', false),
			'magic_url'		=> !$this->request->variable('disable_magic_url', false),
			'smilies'		=> !$this->request->variable('disable_smilies', false),
		);

		// Process the edited category
		$this->add_edit_category_data($entity, $data);

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'S_EDIT_CATEGORY'	=> true,

			'U_EDIT_ACTION'	=> "{$this->u_action}&amp;category_id={$category_id}&amp;action=edit",
		));
	}

	/**
	* Process category data to be added or edited
	*
	* @param \kinerity\knowledgebase\entity\category_interface $entity The category entity object
	* @param array $data The form data to be processed
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
			'description'	=> $data['category_desc'],
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
			if (!check_form_key('add_edit_category'))
			{
				$errors[] = $this->lang->lang('FORM_INVALID');
			}

			// Do not allow an empty rule title
			if ($entity->get_title() == '')
			{
				$errors[] = $this->lang->lang('ACP_CATEGORY_NAME_EMPTY');
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
					trigger_error($e->get_message($this->user) . adm_back_link($this->u_action), E_USER_WARNING);
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
					trigger_error($e->get_message($this->user) . adm_back_link($this->u_action), E_USER_WARNING);
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

			'CATEGORY_NAME'		=> $entity->get_title(),
			'CATEGORY_DESC'		=> $entity->get_description_for_edit(),

			'S_BBCODE_DISABLE_CHECKED'		=> !$entity->description_bbcode_enabled(),
			'S_SMILIES_DISABLE_CHECKED'		=> !$entity->description_smilies_enabled(),
			'S_MAGIC_URL_DISABLE_CHECKED'	=> !$entity->description_magic_url_enabled(),

			'BBCODE_STATUS'			=> $this->lang->lang('BBCODE_IS_ON', '<a href="' . $this->controller_helper->route('phpbb_help_bbcode_controller') . '">', '</a>'),
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
		// TODO
	}

	/**
	* Move a category up/down
	*
	* @param int $category_id The category identifier to move
	* @param string $direction The direction (up|down)
	* @param int $amount The number of places to move the category
	* @return void
	* @access public
	*/
	public function move_category($category_id, $direction, $amount = 1)
	{
		$sql = 'SELECT *
			FROM ' . $this->kb_categories_table . '
			WHERE category_id = ' . (int) $category_id;
		$result = $this->db->sql_query($sql);
		$item = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		/**
		* Fetch all the siblings between the module's current spot
		* and where we want to move it to. If there are less than $amount
		* siblings between the current spot and the target then the
		* module will move as far as possible
		*/
		$sql = 'SELECT category_id, category_name, left_id, right_id
			FROM ' . $this->kb_categories_table . "
			WHERE " . (($direction == 'up') ? "right_id < {$item['right_id']} ORDER BY right_id DESC" : "left_id > {$item['left_id']} ORDER BY left_id ASC");
		$result = $this->db->sql_query_limit($sql, $amount);

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
		* $diff_up and $diff_down are the values to subtract or add to each node's left_id
		* and right_id in order to move them up or down.
		* $move_up_left and $move_up_right define the scope of the nodes that are moving
		* up. Other nodes in the scope of ($left_id, $right_id) are considered to move down.
		*/
		if ($direction == 'up')
		{
			$left_id = $target['left_id'];
			$right_id = $item['right_id'];

			$diff_up = $item['left_id'] - $target['left_id'];
			$diff_down = $item['right_id'] + 1 - $item['left_id'];

			$move_up_left = $item['left_id'];
			$move_up_right = $item['right_id'];
		}
		else
		{
			$left_id = $item['left_id'];
			$right_id = $target['right_id'];

			$diff_up = $item['right_id'] + 1 - $item['left_id'];
			$diff_down = $target['right_id'] - $item['right_id'];

			$move_up_left = $item['right_id'] + 1;
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

		$this->log->add('admin', $this->user->data['user_id'], $this->user->data['user_ip'], 'ACP_KNOWLEDGEBASE_CATEGORY_MOVE_' . strtoupper($direction) . '_LOG', time(), array($item['category_name'], $target['category_name']));
		$this->cache->destroy('sql', $this->kb_categories_table);
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
