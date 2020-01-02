<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Trainer
 * @author     Vaibhav Sadafule <vaibhav.s@edreamz.in>
 * @copyright  2020 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Trainerdetails list controller class.
 *
 * @since  1.6
 */
class TrainingsControllerTrainerdetails extends TrainingsController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Trainerdetails', $prefix = 'TrainingsModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
