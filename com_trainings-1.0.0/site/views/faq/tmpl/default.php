<?php
/**
 * @version    CVS: 1.0.0
 * @package    com_trainings
 * @author     Vaibhav Sadafule <vaibhav.s@edreamz.in>
 * @copyright  2019 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;


?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_TRAININGS_FORM_LBL_FAQ_CATEGORYNAME'); ?></th>
			<td><?php echo $this->item->categoryname; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_TRAININGS_FORM_LBL_FAQ_QUESTION'); ?></th>
			<td><?php echo $this->item->question; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_TRAININGS_FORM_LBL_FAQ_ANSWER'); ?></th>
			<td><?php echo $this->item->answer; ?></td>
		</tr>

	</table>

</div>

