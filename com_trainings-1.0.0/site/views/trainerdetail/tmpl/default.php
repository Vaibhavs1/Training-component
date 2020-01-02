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


?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo JText::_('COM_TRAININGS_FORM_LBL_TRAINERDETAIL_TRAINERIMAGE'); ?></th>
			<td>
			<?php
			foreach ((array) $this->item->trainerimage as $singleFile) : 
				if (!is_array($singleFile)) : 
					$uploadPath = 'uploads' . DIRECTORY_SEPARATOR . $singleFile;
					 echo '<a href="' . JRoute::_(JUri::root() . $uploadPath, false) . '" target="_blank">' . $singleFile . '</a> ';
				endif;
			endforeach;
		?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_TRAININGS_FORM_LBL_TRAINERDETAIL_TRAINERDESC'); ?></th>
			<td><?php echo nl2br($this->item->trainerdesc); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_TRAININGS_FORM_LBL_TRAINERDETAIL_TRAINERDESIGNATION'); ?></th>
			<td><?php echo $this->item->trainerdesignation; ?></td>
		</tr>

	</table>

</div>

