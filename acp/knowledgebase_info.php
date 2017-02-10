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
 * Knowledge Base ACP module info.
 */
class knowledgebase_info
{
	public function module()
	{
		return array(
			'filename'	=> '\kinerity\knowledgebase\acp\knowledgebase_module',
			'title'		=> 'ACP_KNOWLEDGEBASE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_KNOWLEDGEBASE_SETTINGS',
					'auth'	=> 'ext_kinerity/knowledgebase && acl_a_kb_manage',
					'cat'	=> array('ACP_KNOWLEDGEBASE')
				),
				'manage'	=> array(
					'title'	=> 'ACP_KNOWLEDGEBASE_MANAGE',
					'auth'	=> 'ext_kinerity/knowledgebase && acl_a_kb_manage',
					'cat'	=> array('ACP_KNOWLEDGEBASE')
				),
			),
		);
	}
}
