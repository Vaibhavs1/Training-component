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

use \Joomla\CMS\MVC\Controller\BaseController;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

// Access check.
if (!Factory::getUser()->authorise('core.manage', 'com_trainings'))
{
	throw new Exception(Text::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Trainer', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('TrainingsHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'trainer.php');

$controller = BaseController::getInstance('Trainer');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
