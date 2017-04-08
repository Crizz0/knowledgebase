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

/**
 * Interface for our admin controller
 *
 * This describes all of the methods we'll use for the admin front-end of this extension
 */
interface admin_interface
{
	/**
	 * Display the options a user can configure for this extension
	 *
	 * @return void
	 * @access public
	 */
	public function display_options();

	/**
	 * Display the categories
	 *
	 * @return void
	 * @access public
	 */
	public function display_categories();

	/**
	 * Add a category
	 *
	 * @return void
	 * @access public
	 */
	public function add_category();

	/**
	 * Edit a category
	 *
	 * @param int $category_id The category identifier to edit
	 * @return void
	 * @access public
	 */
	public function edit_category($category_id);

	/**
	 * Delete a category
	 *
	 * @param int $category_id The category identifier to delete
	 * @return void
	 * @access public
	 */
	public function delete_category($category_id);

	/**
	 * Move a category up/down
	 *
	 * @param int $category_id The category identifier to move
	 * @param string $direction The direction (up|down)
	 * @return void
	 * @access public
	 */
	public function move_category($category_id, $direction);

	/**
	 * Set page url
	 *
	 * @param string $u_action Custom form action
	 * @return void
	 * @access public
	 */
	public function set_page_url($u_action);
}
