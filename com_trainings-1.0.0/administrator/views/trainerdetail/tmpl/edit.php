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

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;


HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers/html');
HTMLHelper::_('behavior.tooltip');
HTMLHelper::_('behavior.formvalidation');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('behavior.keepalive');

// Import CSS
$document = Factory::getDocument();
$document->addStyleSheet(Uri::root() . 'media/com_trainings/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});

	Joomla.submitbutton = function (task) {
		if (task == 'trainerdetail.cancel') {
			Joomla.submitform(task, document.getElementById('trainerdetail-form'));
		}
		else {
			
			if (task != 'trainerdetail.cancel' && document.formvalidator.isValid(document.id('trainerdetail-form'))) {
				
				Joomla.submitform(task, document.getElementById('trainerdetail-form'));
			}
			else {
				alert('<?php echo $this->escape(Text::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_trainings&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="trainerdetail-form" class="form-validate form-horizontal">

	
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
	<?php echo $this->form->renderField('created_by'); ?>
	<?php echo $this->form->renderField('modified_by'); ?>
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'trainerdetail')); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'trainerdetail', JText::_('COM_TRAININGS_TAB_TRAINERDETAIL', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_TRAININGS_FIELDSET_TRAINERDETAIL'); ?></legend>
				<?php echo $this->form->renderField('trainername'); ?>
				<?php echo $this->form->renderField('trainerdesc'); ?>
				<?php echo $this->form->renderField('trainerdesignation'); ?>
				<?php echo $this->form->renderField('trainerimage'); ?>
				<?php if (!empty($this->item->trainerimage)) : ?>
					<?php $trainerimageFiles = array(); ?>
					<?php foreach ((array)$this->item->trainerimage as $fileSingle) : ?>
						<?php if (!is_array($fileSingle)) : ?>
							<a href="<?php echo JRoute::_(JUri::root() . 'uploads' . DIRECTORY_SEPARATOR . $fileSingle, false);?>"><?php echo $fileSingle; ?></a> | 
							<?php $trainerimageFiles[] = $fileSingle; ?>
						<?php endif; ?>
					<?php endforeach; ?>
					<input type="hidden" name="jform[trainerimage_hidden]" id="jform_trainerimage_hidden" value="<?php echo implode(',', $trainerimageFiles); ?>" />
				<?php endif; ?>
				
				<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
				<?php endif; ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	
	<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<input type="hidden" name="task" value=""/>
	<?php echo JHtml::_('form.token'); ?>

</form>
