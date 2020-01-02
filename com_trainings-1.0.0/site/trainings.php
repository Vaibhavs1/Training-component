<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Trainings
 * @author     vaibhav sadafule <vaibhav.s@edreamz.in>
 * @copyright  2019 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Controller\BaseController;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Trainings', JPATH_COMPONENT);
JLoader::register('TrainingsController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = BaseController::getInstance('Trainings');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
