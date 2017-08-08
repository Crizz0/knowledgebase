<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase;

/**
 * Knowledge Base Extension base
 */
class ext extends \phpbb\extension\base
{
	/**
	 * Check whether or not the extension can be enabled.
	 * The current phpBB version should meet or exceed
	 * the minimum version required by this extension:
	 *
	 * Requires phpBB 3.2.0 and PHP 5.4.0.
	 *
	 * @return bool
	 * @access public
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');

		return phpbb_version_compare($config['version'], '3.2.0', '>=') && version_compare(PHP_VERSION, '5.4.0', '>=');
	}

	/**
	 * Enable notifications for the extension
	 *
	 * @param mixed $old_state State returned by previous call of this method
	 *
	 * @return mixed Returns false after last step, otherwise temporary state
	 */
	public function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet

				$phpbb_notifications = $this->container->get('notification_manager');
				$phpbb_notifications->enable_notifications('kinerity.knowledgebase.notification.type.article_in_queue');
				$phpbb_notifications->enable_notifications('kinerity.knowledgebase.notification.type.approve_article');
				$phpbb_notifications->enable_notifications('kinerity.knowledgebase.notification.type.delete_article');
				$phpbb_notifications->enable_notifications('kinerity.knowledgebase.notification.type.deny_article');
				$phpbb_notifications->enable_notifications('kinerity.knowledgebase.notification.type.disapprove_article');
				return 'notification';

			break;

			default:

				return parent::enable_step($old_state);

			break;
		}
	}

	/**
	 * Disable notifications for the extension
	 *
	 * @param mixed $old_state State returned by previous call of this method
	 *
	 * @return mixed Returns false after last step, otherwise temporary state
	 */
	public function disable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet

				$phpbb_notifications = $this->container->get('notification_manager');
				$phpbb_notifications->disable_notifications('kinerity.knowledgebase.notification.type.article_in_queue');
				$phpbb_notifications->disable_notifications('kinerity.knowledgebase.notification.type.approve_article');
				$phpbb_notifications->disable_notifications('kinerity.knowledgebase.notification.type.delete_article');
				$phpbb_notifications->disable_notifications('kinerity.knowledgebase.notification.type.deny_article');
				$phpbb_notifications->disable_notifications('kinerity.knowledgebase.notification.type.disapprove_article');
				return 'notification';

			break;

			default:

				return parent::disable_step($old_state);

			break;
		}
	}

	/**
	 * Purge notifications for the extension
	 *
	 * @param mixed $old_state State returned by previous call of this method
	 *
	 * @return mixed Returns false after last step, otherwise temporary state
	 */
	public function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet

				$phpbb_notifications = $this->container->get('notification_manager');
				$phpbb_notifications->purge_notifications('kinerity.knowledgebase.notification.type.article_in_queue');
				$phpbb_notifications->purge_notifications('kinerity.knowledgebase.notification.type.approve_article');
				$phpbb_notifications->purge_notifications('kinerity.knowledgebase.notification.type.delete_article');
				$phpbb_notifications->purge_notifications('kinerity.knowledgebase.notification.type.deny_article');
				$phpbb_notifications->purge_notifications('kinerity.knowledgebase.notification.type.disapprove_article');
				return 'notification';

			break;

			default:

				return parent::purge_step($old_state);

			break;
		}
	}
}
