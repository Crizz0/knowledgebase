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

/**
* Interface for our main controller
*
* This describes all of the methods we'll use for the main front-end of this extension
*/
interface main_interface
{
	/**
	* Display the options a user can configure for this extension
	*
	* @param string $page The page to display
	* @return void
	* @access public
	*/
	public function display($page);
}
