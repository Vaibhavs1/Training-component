<?php 
/**
 * 
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * 
 * 
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$trainingList = modTrainingHelper::getTrainingList($params);
require JModuleHelper::getLayoutPath('mod_training');
