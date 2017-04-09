<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\acp;

/**
 * Knowledge Base ACP module.
 */
class knowledgebase_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;

		/** @var \phpbb\language\language $lang */
		$lang = $phpbb_container->get('language');

		/** @var \phpbb\request\request $request */
		$request = $phpbb_container->get('request');

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('kinerity.knowledgebase.admin.controller');

		// Requests
		$action = $request->variable('action', '');
		$category_id = $request->variable('category_id', 0);

		// Make the $u_action url available in the admin controller
		$admin_controller->set_page_url($this->u_action);

		// Load the "settings" or "manage" module modes
		switch ($mode)
		{
			case 'settings':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'knowledgebase_settings';

				// Set the page title for our ACP page
				$this->page_title = $lang->lang('ACP_KNOWLEDGEBASE_SETTINGS');

				// Load the display options handle in the admin controller
				$admin_controller->display_options();
			break;

			case 'manage':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'knowledgebase_manage';

				// Set the page title for our ACP page
				$this->page_title = $lang->lang('ACP_KNOWLEDGEBASE_MANAGE');

				// Perform any actions submitted by the user
				switch ($action)
				{
					case 'add':
						// Set the page title for our ACP page
						$this->page_title = $lang->lang('ACP_KNOWLEDGEBASE_CREATE_CATEGORY');

						// Load the add_category handle in the admin controller
						$admin_controller->add_category();

						// Return to stop execution of this script
						return;
					break;

					case 'edit':
						// Set the page title for our ACP page
						$this->page_title = $lang->lang('ACP_KNOWLEDGEBASE_EDIT_CATEGORY');

						// Load the edit_category handle in the admin controller
						$admin_controller->edit_category($category_id);

						// Return to stop execution of this script
						return;
					break;

					case 'move_down':
					case 'move_up':
						// Move a category
						$admin_controller->move_category($category_id, $action);
					break;

					case 'delete':
						// Delete a category
						$admin_controller->delete_category($category_id);
					break;
				}

				$admin_controller->display_categories();
			break;
		}
	}
}
