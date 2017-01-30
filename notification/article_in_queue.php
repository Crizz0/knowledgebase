<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace kinerity\knowledgebase\notification;

/**
* Knowledge Base notifications class
* This class handles notifications for Knowledge Base articles in the queue
*
* @package notifications
*/
class article_in_queue extends \phpbb\notification\type\base
{
	/** @var \phpbb\controller\helper */
	protected $helper;

	/**
	 * Set the controller helper
	 *
	 * @param \phpbb\controller\helper $helper
	 * @return void
	 */
	public function set_controller_helper(\phpbb\controller\helper $helper)
	{
		$this->helper = $helper;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_type()
	{
		return 'kinerity.knowledgebase.notification.type.article_in_queue';
	}

	/**
	* Language key used to output the text
	*
	* @var string
	*/
	protected $language_key = 'NOTIFICATION_ARTICLE_IN_QUEUE';

	/**
	 * {@inheritdoc}
	 */
	public function is_available()
	{
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function get_item_id($data)
	{
		return $data['article_id'];
	}

	/**
	 * {@inheritdoc}
	 */
	public static function get_item_parent_id($data)
	{
		// No parent
		return 0;
	}

	/**
	 * {@inheritdoc}
	 */
	public function find_users_for_notification($data, $options = array())
	{
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
	 * {@inheritdoc}
	 */
	public function users_to_query()
	{
		return array();
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_title()
	{
		return $this->language->lang(
            $this->language_key,
            $this->get_data('article_title')
        );
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_url()
	{
		$article_id = $this->get_data('article_id');

		return $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'viewarticle', 'a' => (int) $article_id));
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_email_template()
	{
		return false;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_email_template_variables()
	{
		return array();
	}

	/**
	 * {@inheritdoc}
	 */
	public function create_insert_array($data, $pre_create_data = array())
	{
		$this->set_data('article_id', $data['article_id']);
		$this->set_data('article_title', $data['article_title']);

		parent::create_insert_array($data, $pre_create_data);
	}
}
