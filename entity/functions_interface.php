<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\entity;

/**
 * Interface for a single entity
 */
interface functions_interface
{
	/**
	 * Load the data from the database for this entity
	 *
	 * @param int
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\out_of_bounds
	 */
	public function load($id);

	/**
	 * Insert the entity for the first time
	 *
	 * Will throw an exception if the entity was already inserted (call save() instead)
	 *
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\out_of_bounds
	 */
	public function insert();

	/**
	 * Save the current settings to the database
	 *
	 * This must be called before closing or any changes will not be saved!
	 * If adding a entity (saving for the first time), you must call insert() or an exception will be thrown
	 *
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\out_of_bounds
	 */
	public function save();

	/**
	 * Get id
	 *
	 * @access public
	 */
	public function get_id();

	/**
	* Get title
	*
	* @access public
	*/
	public function get_title();

	/**
	 * Set title
	 *
	 * @param string
	 * @access public
	 * @throws \kinerity\knowledgebase\exception\unexpected_value
	 */
	public function set_title($title);

	/**
	 * Get description for edit
	 *
	 * @access public
	 */
	public function get_description_for_edit();

	/**
	 * Get description for display
	 *
	 * @param bool
	 * @access public
	 */
	public function get_description_for_display($censor_text = true);

	/**
	 * Set description
	 *
	 * @param string
	 * @access public
	 */
	public function set_description($description);

	/**
	 * Check if bbcode is enabled on the description
	 *
	 * @access public
	 */
	public function description_bbcode_enabled();

	/**
	 * Enable bbcode on the description
	 *
	 * @access public
	 */
	public function description_enable_bbcode();

	/**
	 * Disable bbcode on the description
	 *
	 * @access public
	 */
	public function description_disable_bbcode();

	/**
	 * Check if magic_url is enabled on the description
	 *
	 * @access public
	 */
	public function description_magic_url_enabled();

	/**
	 * Enable magic url on the description
	 *
	 * @access public
	 */
	public function description_enable_magic_url();

	/**
	 * Disable magic url on the description
	 *
	 * @access public
	 */
	public function description_disable_magic_url();

	/**
	 * Check if smilies are enabled on the description
	 *
	 * @access public
	 */
	public function description_smilies_enabled();

	/**
	 * Enable smilies on the description
	 *
	 * @access public
	 */
	public function description_enable_smilies();

	/**
	 * Disable smilies on the description
	 *
	 * @access public
	 */
	public function description_disable_smilies();
}
