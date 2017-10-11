<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Knowledge Base Event listener.
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\language\language */
	protected $lang;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpEx */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\auth\auth          $auth       Authentication object
	 * @param \phpbb\config\config      $config     Configuration object
	 * @param \phpbb\controller\helper  $helper     Controller helper object
	 * @param \phpbb\language\language  $lang       Language object
	 * @param \phpbb\template\template  $template   Template object
	 * @param string                    $php_ext    phpEx
	 */
	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\language\language $lang, \phpbb\template\template $template, $php_ext)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->helper = $helper;
		$this->lang = $lang;
		$this->template = $template;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'				=> 'load_language_on_setup',
			'core.page_header'				=> 'add_page_header_link',
			'core.viewonline_overwrite_location'	=> 'viewonline_page',
			'core.permissions'	=> 'add_permission',
		);
	}

	/**
	 * Load common language files during user setup
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'kinerity/knowledgebase',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * Add a link to the controller in the forum navbar
	 */
	public function add_page_header_link()
	{
		$this->template->assign_vars(array(
			'KNOWLEDGEBASE_FONT_ICON' => $this->config['knowledgebase_font_icon'],
			'S_KNOWLEDGEBASE_LINK_ENABLED' => !empty($this->config['knowledgebase_enable']) && !empty($this->config['knowledgebase_header_link']) && $this->auth->acl_get('u_kb_read'),
			'U_KNOWLEDGEBASE' => $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index')),
		));
	}

	/**
	 * Show users viewing Knowledge Base on the Who Is Online page
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function viewonline_page($event)
	{
		if ($event['on_page'][1] === 'app' && (strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/kb/index') === 0 || strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/kb/viewcategory') === 0 || strrpos($event['row']['session_page'], 'app.' . $this->php_ext . '/kb/viewarticle') === 0))
		{
			$event['location'] = $this->lang->lang('VIEWING_KNOWLEDGEBASE');
			$event['location_url'] = $this->helper->route('kinerity_knowledgebase_main_controller', array('page' => 'index'));
		}
	}

	/**
	 * Add permissions for Knowledge Base
	 *
	 * @param \phpbb\event\data $event The event object
	 */
	public function add_permission($event)
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

		$permissions['a_kb_manage'] = array('lang' => 'ACL_A_KB_MANAGE', 'cat' => 'knowledgebase');

		$event['categories'] = $categories;
		$event['permissions'] = $permissions;
	}
}
