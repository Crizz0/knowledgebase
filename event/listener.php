<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace kinerity\knowledgebase\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpEx */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\auth\auth         $auth              Auth object
	* @param \phpbb\config\config     $config            Config object
	* @param \phpbb\controller\helper $controller_helper Controller helper object
	* @param \phpbb\language\language $lang              Language object
	* @param \phpbb\template\template $template          Template object
	* @param string                   $php_ext           phpEx
	* @access public
	*/
	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\controller\helper $controller_helper, \phpbb\language\language $lang, \phpbb\template\template $template, $php_ext)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->controller_helper = $controller_helper;
		$this->lang = $lang;
		$this->template = $template;
		$this->php_ext = $php_ext;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'	=> 'page_header',
			'core.permissions'	=> 'permissions',

			'core.user_setup'	=> 'user_setup',

			'core.viewonline_overwrite_location'	=> 'viewonline_overwrite_location',
		);
	}

	/**
	* Create a URL to the Knowledge Base controller file for the header link list
	*
	* @return void
	* @access public
	*/
	public function page_header()
	{
		$this->template->assign_vars(array(
			'KNOWLEDGEBASE_FONT_ICON' => $this->config['knowledgebase_font_icon'],
			//'S_KNOWLEDGEBASE_AUTH_READ' => $this->auth->acl_get('u_kb_read'), // not used yet
			'S_KNOWLEDGEBASE_LINK_ENABLED' => !empty($this->config['knowledgebase_enable']) && !empty($this->config['knowledgebase_header_link']),
			'U_KNOWLEDGEBASE' => $this->controller_helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index')),
		));
	}

	/**
	* Add administrative permissions to manage Knowledge Base
	*
	* @param \phpbb\event\data $event The event object
	* @return void
	* @access public
	*/
	public function permissions($event)
	{
		$permissions = $event['permissions'];
		$categories = $event['categories'];

		$categories['knowledgebase'] = 'ACL_CAT_KNOWLEDGEBASE';

		$permissions['u_kb_read'] = array('lang' => 'ACL_U_KB_READ', 'cat' => 'knowledgebase');
		$permissions['u_kb_post'] = array('lang' => 'ACL_U_KB_POST', 'cat' => 'knowledgebase');
		$permissions['u_kb_edit'] = array('lang' => 'ACL_U_KB_EDIT', 'cat' => 'knowledgebase');
		$permissions['u_kb_delete'] = array('lang' => 'ACL_U_KB_DELETE', 'cat' => 'knowledgebase');
		$permissions['u_kb_noapprove'] = array('lang' => 'ACL_U_KB_NOAPPROVE', 'cat' => 'knowledgebase');

		$permissions['m_kb_edit'] = array('lang' => 'ACL_M_KB_EDIT', 'cat' => 'knowledgebase');
		$permissions['m_kb_delete'] = array('lang' => 'ACL_M_KB_DELETE', 'cat' => 'knowledgebase');
		$permissions['m_kb_approve'] = array('lang' => 'ACL_M_KB_APPROVE', 'cat' => 'knowledgebase');
		$permissions['m_kb_chgposter'] = array('lang' => 'ACL_M_KB_CHGPOSTER', 'cat' => 'knowledgebase');
		$permissions['m_kb_chgposter'] = array('lang' => 'ACL_M_KB_CHGPOSTER', 'cat' => 'knowledgebase');

		$permissions['a_kb_manage'] = array('lang' => 'ACL_A_KB_MANAGE', 'cat' => 'misc');

		$event['categories'] = $categories;
		$event['permissions'] = $permissions;
	}

	/**
	* Load common Knowledge Base language files during user setup
	*
	* @param \phpbb\event\data $event The event object
	* @return void
	* @access public
	*/
	public function user_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'kinerity/knowledgebase',
			'lang_set' => 'knowledgebase_common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* Show users as viewing the Knowledge Base on Who Is Online page
	*
	* @param \phpbb\event\data $event The event object
	* @return void
	* @access public
	*/
	public function viewonline_overwrite_location($event)
	{
		if ($event['on_page'][1] === 'app' && (strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/kb/index') === 0 || strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/kb/viewcategory') === 0 || strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/kb/viewarticle') === 0))
		{
			$event['location'] = $this->lang->lang('KNOWLEDGEBASE_VIEWONLINE');
			$event['location_url'] = $this->controller_helper->route('kinerity_knowledgebase_main_controller');
		}
	}
}
