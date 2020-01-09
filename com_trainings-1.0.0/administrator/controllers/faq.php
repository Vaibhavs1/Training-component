<?php

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Faq controller class.
 *
 * @since  1.6
 */
class TrainingsControllerFaq extends \Joomla\CMS\MVC\Controller\FormController
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'faqs';
		parent::__construct();
	}
}
