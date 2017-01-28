<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace kinerity\knowledgebase\entity;

/**
* Interface for a single article
*
* This describes all of the methods we'll have for a single article
*/
interface article_interface
{
	/**
	* Load the data from the database for this article
	*
	* @param int $id Article identifier
	* @param string $sql_where SQL where clause
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\out_of_bounds
	*/
	public function load($id, $sql_where = '');

	/**
	* Insert the article for the first time
	*
	* Will throw an exception if the article was already inserted (call save() instead)
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\out_of_bounds
	*/
	public function insert();

	/**
	* Save the current settings to the database
	*
	* This must be called before closing or any changes will not be saved!
	* If adding a article (saving for the first time), you must call insert() or an exception will be thrown
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\out_of_bounds
	*/
	public function save();

	/**
	* Get id
	*
	* @return int article identifier
	* @access public
	*/
	public function get_id();

	/**
	* Get author
	*
	* @return string Author
	* @access public
	*/
	public function get_author();

	/**
	* Get time
	*
	* @return int Time identifier
	* @access public
	*/
	public function get_time();

	/**
	* Get edit time
	*
	* @return int Edit time identifier
	* @access public
	*/
	public function get_edit_time();

	/**
	* Get views
	*
	* @return int view identifier
	* @access public
	*/
	public function get_views();

	/**
	* Get visibility
	*
	* @return int Visibility identifier
	* @access public
	*/
	public function get_visibility();

	/**
	* Get title
	*
	* @return string Title
	* @access public
	*/
	public function get_title();

	/**
	* Set title
	*
	* @param string $title
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\unexpected_value
	*/
	public function set_title($title);

	/**
	* Get description
	*
	* @return string Description
	* @access public
	*/
	public function get_description();

	/**
	* Set description
	*
	* @param string $description
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	* @throws \kinerity\knowledgebase\exception\unexpected_value
	*/
	public function set_description($description);

	/**
	* Get message for edit
	*
	* @return string
	* @access public
	*/
	public function get_message_for_edit();

	/**
	* Get message for display
	*
	* @param bool $censor_text True to censor the text (Default: true)
	* @return string
	* @access public
	*/
	public function get_message_for_display($censor_text = true);

	/**
	* Set message
	*
	* @param string $message
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function set_message($message);

	/**
	* Check if bbcode is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_bbcode_enabled();

	/**
	* Enable bbcode on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_bbcode();

	/**
	* Disable bbcode on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_bbcode();

	/**
	* Check if magic_url is enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_magic_url_enabled();

	/**
	* Enable magic url on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_magic_url();

	/**
	* Disable magic url on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_magic_url();

	/**
	* Check if smilies are enabled on the message
	*
	* @return bool
	* @access public
	*/
	public function message_smilies_enabled();

	/**
	* Enable smilies on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_enable_smilies();

	/**
	* Disable smilies on the message
	*
	* @return article_interface $this object for chaining calls; load()->set()->save()
	* @access public
	*/
	public function message_disable_smilies();
}
