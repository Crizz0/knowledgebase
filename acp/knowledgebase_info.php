<?php
/**
*
* Knowledge Base extension for the phpBB Forum Software package.
*
* @copyright (c) 2017 kinerity <https://www.project-w.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace kinerity\knowledgebase\acp;

class knowledgebase_info
{
	public function module()
	{
		return array(
			'filename'	=> '\kinerity\knowledgebase\acp\main_module',
			'title'		=> 'ACP_KNOWLEDGEBASE',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_KNOWLEDGEBASE_SETTINGS', 'auth' => 'ext_kinerity/knowledgebase && acl_a_board', 'cat' => array('ACP_KNOWLEDGEBASE')),
				'manage'	=> array('title' => 'ACP_KNOWLEDGEBASE_MANAGE', 'auth' => 'ext_kinerity/knowledgebase && acl_a_board', 'cat' => array('ACP_KNOWLEDGEBASE')),
			),
		);
	}
}
