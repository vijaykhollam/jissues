<?php
/**
 * @package     JTracker
 * @subpackage  com_tracker
 *
 * @copyright   Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * The issues add view
 *
 * @package     JTracker
 * @subpackage  com_tracker
 * @since       1.0
 */
class TrackerViewAddHtml extends JViewHtml
{
	/**
	 * Container for the JEditor object
	 *
	 * @var    JEditor
	 * @since  1.0
	 */
	protected $editor;

	/**
	 * Array containing the editor params
	 *
	 * @var    array
	 * @since  1.0
	 */
	protected $editorParams = array();

	/**
	 * @var    JRegistry
	 * @since  1.0
	 */
	protected $lists;

	/**
	 * Method to render the view.
	 *
	 * @return  string  The rendered view.
	 *
	 * @since   1.0
	 * @throws  RuntimeException
	 */
	public function render()
	{
		$this->editor = JEditor::getInstance('kisskontent');

		$this->editorParams = array(
			'preview-url'     => 'index.php?option=com_tracker&task=preview',
			'syntaxpage-link' => 'index.php?option=com_tracker&view=markdowntestpage',
		);

		$this->lists = new JRegistry;
		$this->lists->set('categories', JHtmlProjects::select('com_tracker.categories', 'category', '', 'Select a category', ''));
		$this->lists->set('selects', JHtmlProjects::items('com_tracker.fields'));
		$this->lists->set('textfields', JHtmlProjects::items('com_tracker.textfields'));
		$this->lists->set('checkboxes', JHtmlProjects::items('com_tracker.checkboxes'));

		return parent::render();
	}
}
