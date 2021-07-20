<?php
/**
 *
 * Knowledge Base extension for the phpBB Forum Software package
 *
 * @copyright (c) 2021, Mike-on-Tour, https://www.mike-on-tour.com
 * @copyright (c) 2017, kinerity, https://www.acsyste.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace kinerity\knowledgebase\migrations\v11x;

class release_1_1_0 extends \phpbb\db\migration\migration
{

	/**
	* Check for migration release_0_0_1 to be installed
	*/
	public static function depends_on()
	{
		return ['\kinerity\knowledgebase\migrations\v10x\release_0_0_1'];
	}

	public function update_schema()
	{
		return [
			'add_columns' => [
				$this->table_prefix . 'kb_articles' => [
					'article_edit_name'	=> ['VCHAR:255', ''],
				],
			]
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns' => [
				$this->table_prefix . 'kb_articles' => [
					'article_edit_name',
				],
			]
		];
	}
}
