<?php
/**
 * @version    CVS: 1.0.0
 * @package    com_trainings
 * @author     Vaibhav Sadafule <vaibhav.s@edreamz.in>
 * @copyright  2019 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Controller\BaseController;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Faq', JPATH_COMPONENT);
JLoader::register('FaqController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = BaseController::getInstance('Faq');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
