<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\migrations\v10x;

use \phpbb\db\migration\container_aware_migration;

class release_0_0_1 extends \phpbb\db\migration\container_aware_migration
{
	/**
	 * Assign migration file dependencies for this migration
	 *
	 * @return void
	 * @access public
	 */
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v320\v320');
	}

	/**
	 * Add the knowledgebase table schema to the database
	 *
	 * @return void
	 * @access public
	 */
	public function update_schema()
	{
		return array(
			'add_tables'		=> array(
				// Articles table
				$this->table_prefix . 'kb_articles'	=> array(
					'COLUMNS'		=> array(
						'article_id'				=> array('UINT', NULL, 'auto_increment'),
						'article_poster_id'			=> array('UINT', 0),
						'article_poster_name'		=> array('VCHAR:255', ''),
						'article_poster_colour'		=> array('VCHAR:6', ''),
						'article_time'				=> array('TIMESTAMP', 0),
						'article_edit_time'			=> array('TIMESTAMP', 0),
						'enable_bbcode'				=> array('BOOL', 1),
						'enable_smilies'			=> array('BOOL', 1),
						'enable_magic_url'			=> array('BOOL', 1),
						'article_title'				=> array('VCHAR:255', ''),
						'article_description'		=> array('MTEXT_UNI', ''),
						'article_text'				=> array('MTEXT_UNI', ''),
						'bbcode_bitfield'			=> array('VCHAR:255', ''),
						'bbcode_uid'				=> array('VCHAR:8', ''),
						'article_visibility'		=> array('TINT:3', 0),
						'article_views'				=> array('UINT', 0),
					),
					'PRIMARY_KEY'	=> 'article_id',
				),

				// Article <> Category relationship table
				$this->table_prefix . 'kb_article_category'	=> array(
					'COLUMNS'		=> array(
						'category_id'		=> array('UINT', 0),
						'article_id'		=> array('UINT', 0),
					),
				),

				// Categories table
				$this->table_prefix . 'kb_categories'	=> array(
					'COLUMNS'		=> array(
						'category_id'				=> array('UINT', null, 'auto_increment'),
						'left_id'					=> array('UINT', 0),
						'right_id'					=> array('UINT', 0),
						'category_name'				=> array('VCHAR:255', ''),
						'category_description'		=> array('TEXT_UNI', ''),
						'bbcode_bitfield'			=> array('VCHAR:255', ''),
						'bbcode_options'			=> array('TIMESTAMP', 7),
						'bbcode_uid'				=> array('VCHAR:8', ''),
					),
					'PRIMARY_KEY'	=> 'category_id',
				),
			),
		);
	}

	/**
	 * Add or update data in the database
	 *
	 * @return void
	 * @access public
	 */
	public function update_data()
	{
		$data = array(
			// Add config
			array('config.add', array('knowledgebase_enable', '0')),
			array('config.add', array('knowledgebase_header_link', '1')),
			array('config.add', array('knowledgebase_font_icon', 'clone')),

			// Add permissions
			array('permission.add', array('u_kb_read')),
			array('permission.add', array('u_kb_post')),
			array('permission.add', array('u_kb_edit')),
			array('permission.add', array('u_kb_delete')),
			array('permission.add', array('u_kb_noapprove')),

			array('permission.add', array('m_kb_edit')),
			array('permission.add', array('m_kb_delete')),
			array('permission.add', array('m_kb_approve')),
			array('permission.add', array('m_kb_chgposter')),

			array('permission.add', array('a_kb_manage')),

			// Insert sample knowledgebase data
			array('custom', array(array($this, 'insert_sample_data'))),

			// Add module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_KNOWLEDGEBASE'
			)),
			array('module.add', array(
				'acp',
				'ACP_KNOWLEDGEBASE',
				array(
					'module_basename'	=> '\kinerity\knowledgebase\acp\knowledgebase_module',
					'modes'				=> array('settings', 'manage'),
				),
			)),
		);

		if ($this->role_exists('ROLE_USER_STANDARD'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_kb_read'));
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_kb_post'));
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_kb_edit'));
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_kb_delete'));
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_kb_noapprove'));
		}

		if ($this->role_exists('ROLE_USER_FULL'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL', 'u_kb_read'));
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL', 'u_kb_post'));
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL', 'u_kb_edit'));
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL', 'u_kb_delete'));
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL', 'u_kb_noapprove'));
		}

		if ($this->role_exists('ROLE_MOD_STANDARD'))
		{
			$data[] = array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_kb_edit'));
			$data[] = array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_kb_delete'));
			$data[] = array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_kb_approve'));
			$data[] = array('permission.permission_set', array('ROLE_MOD_STANDARD', 'm_kb_chgposter'));
		}

		if ($this->role_exists('ROLE_MOD_FULL'))
		{
			$data[] = array('permission.permission_set', array('ROLE_MOD_FULL', 'm_kb_edit'));
			$data[] = array('permission.permission_set', array('ROLE_MOD_FULL', 'm_kb_delete'));
			$data[] = array('permission.permission_set', array('ROLE_MOD_FULL', 'm_kb_approve'));
			$data[] = array('permission.permission_set', array('ROLE_MOD_FULL', 'm_kb_chgposter'));
		}

		if ($this->role_exists('ROLE_ADMIN_STANDARD'))
		{
			$data[] = array('permission.permission_set', array('ROLE_ADMIN_STANDARD', 'a_kb_manage'));
		}

		if ($this->role_exists('ROLE_ADMIN_FULL'))
		{
			$data[] = array('permission.permission_set', array('ROLE_ADMIN_FULL', 'a_kb_manage'));
		}

		return $data;
	}

	/**
	 * Drop the knowledgebase table schema from the database
	 *
	 * @return void
	 * @access public
	 */
	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array(
				$this->table_prefix . 'kb_articles',
				$this->table_prefix . 'kb_article_category',
				$this->table_prefix . 'kb_categories',
			),
		);
	}

	/**
	 * Custom function query permission roles
	 *
	 * @return void
	 * @access public
	 */
	private function role_exists($role)
	{
		$sql = 'SELECT role_id
			FROM ' . ACL_ROLES_TABLE . "
			WHERE role_name = '" . $this->db->sql_escape($role) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$role_id = $this->db->sql_fetchfield('role_id');
		$this->db->sql_freeresult($result);

		return $role_id;
	}

	/**
	 * Custom function to add sample data to the database
	 *
	 * @return void
	 * @access public
	 */
	public function insert_sample_data()
	{
		$user = $this->container->get('user');

		// Define sample category data
		$sample_data_categories = array(
			array(
				'category_id'				=> 1,
				'left_id'					=> 1,
				'right_id'					=> 2,
				'category_name'				=> 'Example Category 1',
				'category_description'		=> 'A category description.',
				'bbcode_bitfield'			=> 'QQ==',
				'bbcode_options'			=> 7,
				'bbcode_uid'				=> 'a9fmpm6m',
			),
		);

		// Define sample article data
		$sample_data_articles = array(
			array(
				'article_id'				=> 1,
				'article_poster_id'			=> $user->data['user_id'],
				'article_poster_name'		=> $user->data['username'],
				'article_poster_colour'		=> $user->data['user_colour'],
				'article_time'				=> time(),
				'article_edit_time'			=> 0,
				'enable_bbcode'				=> 1,
				'enable_smilies'			=> 1,
				'enable_magic_url'			=> 1,
				'article_title'				=> 'Test Article #1',
				'article_description'		=> 'Sample article description',
				'article_text'				=> 'Test article for the Knowledge Base extension.',
				'bbcode_bitfield'			=> 'QQ==',
				'bbcode_uid'				=> '2p5lkzzx',
				'article_visibility'		=> 1,
				'article_views'				=> 1,
			),
		);

		// Define sample article <> category relationship data
		$sample_data_article_category = array(
			array(
				'category_id'		=> 1,
				'article_id'		=> 1,
			),
		);

		// Insert sample data
		$this->db->sql_multi_insert($this->table_prefix . 'kb_categories', $sample_data_categories);
		$this->db->sql_multi_insert($this->table_prefix . 'kb_articles', $sample_data_articles);
		$this->db->sql_multi_insert($this->table_prefix . 'kb_article_category', $sample_data_article_category);
	}
}
