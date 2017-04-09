<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\notification\type;

/**
 * Knowledge Base Notification class
 */
class article_in_queue extends \phpbb\notification\type\base
{
	/** @var \phpbb\controller\helper */
	protected $helper;

	/**
	 * Set the controller helper
	 *
	 * @param \phpbb\controller\helper $helper
	 *
	 * @return void
	 */
	public function set_controller_helper(\phpbb\controller\helper $helper)
	{
		$this->helper = $helper;
	}

	/**
	 * Get notification type name
	 *
	 * @return string
	 */
	public function get_type()
	{
		return 'kinerity.knowledgebase.notification.type.article_in_queue';
	}

	/**
	 * Is this type available to the current user (defines whether or not it will be shown in the UCP Edit notification options)
	 *
	 * @return bool True/False whether or not this is available to the user
	 */
	public function is_available()
	{
		return false;
	}

	/**
	 * Get the id of the notification
	 *
	 * @param array $data The type specific data
	 *
	 * @return int Id of the notification
	 */
	public static function get_item_id($data)
	{
		return $data['article_id'];
	}

	/**
	 * Get the id of the parent
	 *
	 * @param array $data The type specific data
	 *
	 * @return int Id of the parent
	 */
	public static function get_item_parent_id($data)
	{
		// No parent
		return 0;
	}

	/**
	 * Find the users who want to receive notifications
	 *
	 * @param array $data The type specific data
	 * @param array $options Options for finding users for notification
	 * 		ignore_users => array of users and user types that should not receive notifications from this type because they've already been notified
	 * 						e.g.: array(2 => array(''), 3 => array('', 'email'), ...)
	 *
	 * @return array
	 */
	public function find_users_for_notification($data, $options = array())
	{
		// Return an array of users to be notified, storing the user_ids as the array keys
		$users = array();
		$allowed = $this->auth->acl_get_list(false, 'm_kb_approve');

		$sql = 'SELECT user_id
			FROM ' . USERS_TABLE . '
			WHERE user_type <> ' . USER_IGNORE . '
				AND ' . $this->db->sql_in_set('user_id', array_keys($allowed));
		$result = $this->db->sql_query($sql);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$users[$row['user_id']] = $this->notification_manager->get_default_methods();
		}
		$this->db->sql_freeresult($result);

		return $users;
	}

	/**
	 * Users needed to query before this notification can be displayed
	 *
	 * @return array Array of user_ids
	 */
	public function users_to_query()
	{
		return array();
	}

	/**
	 * Get the HTML formatted title of this notification
	 *
	 * @return string
	 */
	public function get_title()
	{
		return $this->language->lang(
			'NOTIFICATION_ARTICLE_IN_QUEUE',
			$this->get_data('article_title')
		);
	}

	/**
	 * Get the url to this item
	 *
	 * @return string URL
	 */
	public function get_url()
	{
		$article_id = $this->get_data('article_id');

		return $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
	}

	/**
	 * Get email template
	 *
	 * @return string|bool
	 */
	public function get_email_template()
	{
		return false;
	}

	/**
	 * Get email template variables
	 *
	 * @return array
	 */
	public function get_email_template_variables()
	{
		return array();
	}

	/**
	 * Function for preparing the data for insertion in an SQL query
	 * (The service handles insertion)
	 *
	 * @param array $data The type specific data
	 * @param array $pre_create_data Data from pre_create_insert_array()
	 *
	 * @return void
	 */
	public function create_insert_array($data, $pre_create_data = array())
	{
		$this->set_data('article_id', $data['article_id']);
		$this->set_data('article_title', $data['article_title']);

		parent::create_insert_array($data, $pre_create_data);
	}
}
