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
		if (task == 'list.cancel') {
			Joomla.submitform(task, document.getElementById('list-form'));
		}
		else {
			
			if (task != 'list.cancel' && document.formvalidator.isValid(document.id('list-form'))) {
				
				Joomla.submitform(task, document.getElementById('list-form'));
			}
			else {
				alert('<?php echo $this->escape(Text::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_trainings&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="list-form" class="form-validate form-horizontal">

	
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'list')); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'list', JText::_('COM_TRAININGS_TAB_LIST', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_TRAININGS_FIELDSET_LIST'); ?></legend>
				<?php echo $this->form->renderField('trainingid'); ?>
				<?php echo $this->form->renderField('topicname'); ?>
				<?php echo $this->form->renderField('titleen'); ?>
				<?php echo $this->form->renderField('descriptionen'); ?>
				<?php echo $this->form->renderField('startdate'); ?>
				<?php echo $this->form->renderField('starttime'); ?>
				<?php echo $this->form->renderField('testdate'); ?>
				<?php echo $this->form->renderField('traininglanguage'); ?>
				<?php echo $this->form->renderField('businessunitcode'); ?>
				<?php echo $this->form->renderField('businessunitname'); ?>
				<?php echo $this->form->renderField('topiclogo'); ?>
				<?php echo $this->form->renderField('trainingtype'); ?>
				<?php echo $this->form->renderField('trainingtypecode'); ?>
				<?php echo $this->form->renderField('availableseats'); ?>
				<?php echo $this->form->renderField('isloggedin'); ?>
				<?php echo $this->form->renderField('issubscribed'); ?>
				<?php echo $this->form->renderField('topiccovered'); ?>
				<?php echo $this->form->renderField('topicrequirements'); ?>
				<?php echo $this->form->renderField('topicprice'); ?>
				<?php echo $this->form->renderField('categoriesname'); ?>
				<?php echo $this->form->renderField('targetaudience'); ?>
				<?php echo $this->form->renderField('sessionduration'); ?>
				<?php echo $this->form->renderField('locationname'); ?>
				<?php echo $this->form->renderField('locationurl'); ?>
				<?php echo $this->form->renderField('topicpaid'); ?>
				<?php echo $this->form->renderField('topicdesc'); ?>
				<?php echo $this->form->renderField('trainername'); ?>
				<?php echo $this->form->renderField('schedulelist'); ?>
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
