<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Trainer
 * @author     Vaibhav Sadafule <vaibhav.s@edreamz.in>
 * @copyright  2020 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Trainerdetail controller class.
 *
 * @since  1.6
 */
class TrainingsControllerTrainerdetail extends \Joomla\CMS\MVC\Controller\FormController
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'trainerdetails';
		parent::__construct();
	}
}
