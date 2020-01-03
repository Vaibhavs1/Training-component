<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Trainings
 * @author     vaibhav sadafule <vaibhav.s@edreamz.in>
 * @copyright  2019 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

JLoader::registerPrefix('Trainings', JPATH_SITE . '/components/com_trainings/');

/**
 * Class TrainingsRouter
 *
 * @since  3.3
 */
class TrainingsRouter extends \Joomla\CMS\Component\Router\RouterBase
{
	/**
	 * Build method for URLs
	 * This method is meant to transform the query parameters into a more human
	 * readable form. It is only executed when SEF mode is switched on.
	 *
	 * @param   array  &$query  An array of URL arguments
	 *
	 * @return  array  The URL arguments to use to assemble the subsequent URL.
	 *
	 * @since   3.3
	 */
	public function build(&$query)
	{
		$segments = array();
		$view     = null;

		if (isset($query['task']))
		{
			$taskParts  = explode('.', $query['task']);
			$segments[] = implode('/', $taskParts);
			$view       = $taskParts[0];
			unset($query['task']);
		}

		if (isset($query['view']))
		{
			$segments[] = $query['view'];
			$view = $query['view'];
			
			unset($query['view']);
		}

		if (isset($query['id']))
		{
			/*if ($view !== null)
			{
				$segments[] = $query['id'];
			}
			else
			{
				$segments[] = $query['id'];
			}*/
			$db = JFactory::getDbo();
			$qry = $db->getQuery(true);
			$qry->select('alias');
			$qry->from('#__trainings_list');
			$qry->where('id = ' . $db->quote($query['id']));
			$db->setQuery($qry);
			$alias = $db->loadResult();
			$segments[] = $alias;

			unset($query['id']);
		}

		return $segments;
	}

	/**
	 * Parse method for URLs
	 * This method is meant to transform the human readable URL back into
	 * query parameters. It is only executed when SEF mode is switched on.
	 *
	 * @param   array  &$segments  The segments of the URL to parse.
	 *
	 * @return  array  The URL attributes to be used by the application.
	 *
	 * @since   3.3
	 */
	public function parse(&$segments)
	{
		//echo "<pre>";print_r($segments);exit;
		$vars = array();
			$db = JFactory::getDbo();
		$qry = $db->getQuery(true);
		$qry->select('id');
		$qry->from('#__trainings_list');
		$qry->where('alias = ' . $db->quote($segments[1]));
		$db->setQuery($qry);
		$id = $db->loadResult();
        
		if(!empty($id))
		{
			$vars['id'] = $id;
			$vars['view'] = $segments[0];
		}
		// View is always the first element of the array
		//$vars['view'] = array_shift($segments);
		$model        = TrainingsHelpersTrainings::getModel($vars['view']);
		
		/*while (!empty($segments))
		{
			$segment = array_pop($segments);

			// If it's the ID, let's put on the request
			if (is_numeric($segment))
			{
				$vars['id'] = $segment;
			}
			else
			{
				$vars['task'] = $vars['view'] . '.' . $segment;
			}
		}*/

		return $vars;
	}
}
