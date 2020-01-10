<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Trainings
 * @author     vaibhav sadafule <vaibhav.s@edreamz.in>
 * @copyright  2019 Vaibhav Sadafule
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
// No direct access
defined('_JEXEC') or die;
// Import CSS
$document = Factory::getDocument();
$document->addScript('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');// for script
$document->addStyleSheet(Uri::root() . 'media/com_trainings/css/list.css');
$document->addScript(Uri::root() . 'media/com_trainings/js/list.js');
$faqdata = isset($this->item->faqdata)?json_decode(json_encode($this->item->faqdata), true):[];
$trainerdata = isset($this->item->trainerdata)?$this->item->trainerdata:"";
$schedule_list = json_decode($this->item->schedulelist, true);
$imagesrc ="";
$designation ="";
$desc = "";
	if(!empty($trainerdata)){
		$uploadPath = 'uploads' . DIRECTORY_SEPARATOR . $trainerdata->trainerimage;
		$imagesrc = isset($trainerdata->trainerimage)?JRoute::_(JUri::root() . $uploadPath, false):'';
		$designation = $trainerdata->trainerdesignation;
		$desc = $trainerdata->trainerdesc;
	}
?>

<div class="item_fields">

	

<div id="detail_main">
	<div id="detail_left">
		<h3><?php echo $this->item->topicname; ?></h3>

		<p><?php echo $this->item->descriptionen; ?></p>

		<br>

		<p class="duration"><b>Duration: </b>
			<?php echo $this->item->sessionduration; ?>
		</p>

		<p class="language"><b>Language: </b>
			<?php echo $this->item->traininglanguage; ?>
		</p>

		<p class="certificate"><b>Certificate: </b>
			AED 150 (in VAT) / Participant
		</p>

		<p class="location"><b>Location: </b>
			<a href="<?php echo $this->item->locationurl; ?>" target="_blank"><?php echo $this->item->locationname; ?></a>
		</p>

	</div>
	<div id="detail_right">
		<p class="seat"><?php echo $this->item->availableseats; ?>&nbsp;<?php echo JText::_('COM_TRAININGS_FORM_LBL_LIST_SPOTSLEFT'); ?></p>
		<h3 class="price"><?php echo JText::_('COM_TRAININGS_FORM_LBL_LIST_TOPICPRICE'); ?> : <?php echo $this->item->topicprice; ?></h3>
		<p>(inc VAT)</p>

		<button>Book</button>

	</div>
</div>

<div id="tab_">
	<div class="tab">
	  <button class="tablinks active" onclick="openCity(event, 'Training_Overview')"><?php echo JText::_('MOD_TRAINING_LISTS_TRAININGOVERVIEW'); ?></button>
	  <button class="tablinks" onclick="openCity(event, 'Training_Schedule')"><?php echo JText::_('MOD_TRAINING_LISTS_TRAININGSCHEDULE'); ?></button>
	  <button class="tablinks" onclick="openCity(event, 'FAQs')"><?php echo JText::_('COM_TRAININGS_TITLE_FAQS'); ?></button>
	</div>

	<div id="Training_Overview" class="tabcontent">
	 
	  <p><?php echo $this->item->topicdesc; ?> </p>
	
	 <div class="topic_wrapp">
	  	<span class="left-side-c">
	  		<h3><?php echo JText::_('COM_TRAININGS_LISTS_TOPICCOVERED'); ?></h3>
	  		<ul>
	  			<?php echo $this->item->topiccovered;?>
	  		</ul>

	  	</span>
	  	<span class="left-side-c">
	  		<h3><?php echo JText::_('COM_TRAININGS_LISTS_TARGETAUDIENCE'); ?></h3>
	  		<ul>
	  			<?php echo $this->item->targetaudience;?>
	  		</ul>

	  	</span>
	 </div>

	 <div class="topic_wrapp">
	  	<span class="left-side-c">
	  		<h3><?php echo JText::_('COM_TRAININGS_LISTS_DAYS'); ?></h3>
	  		<?php 
	  			$training_days = "";
	  			$ct = 1;
	  			foreach ($schedule_list as $key => $value) {
	  			$days = DateTime::createFromFormat('d', $ct);
	  			$d = $days->format('jS');
	  			$datetime = DateTime::createFromFormat('d-M-Y', $value['scheduleStartDate']);
	  			$training_days .= "<p><b>".$d." Day:</b> ".$datetime->format('l, F, jS, Y')."</p>";
	  			$ct++;
	  			
	  		 	}
	  		 	echo $training_days;
	  		 ?>
	  	</span>
	  	<span class="left-side-c">
	  		<h3><?php echo JText::_('COM_TRAININGS_LISTS_TOPICREQUIREMENTS'); ?></h3>
	  		
	  			<?php echo $this->item->topicrequirements;?>
	  			
	  		

	  	</span>
	 </div>

	 <div class="topic_wrapp_last">
	   		<h3><?php echo JText::_('COM_TRAININGS_TITLE_TRAINERNAME'); ?></h3>
	  		<div class="inst_img">
	  			<img src="<?php echo $imagesrc; ?>">
	  		</div>
	  		<h5><?php echo $this->item->trainername;?></h5>
	  		<p><?php echo $designation;?></p>

	  		<p><?php echo $desc;?></p>
	  	 
	 </div>

	 
	</div>

	<div id="Training_Schedule" class="tabcontent">
		

		<?php

		switch ($this->item->trainingtypecode) {
			case 'F':
				$cnt = 1;
				$day_count = count($schedule_list);
				$html = "<h1>".$day_count.JText::_('COM_TRAININGS_TITLE_FULLDAYSONLY')."</h1>";
				foreach ($schedule_list as $key => $value) {
					$datetime = DateTime::createFromFormat('d-M-Y', $value['scheduleStartDate']);
					 
					$html .="<br><p><b> ".JText::_('COM_TRAININGS_TITLE_DAY').$cnt.": </b> ".$datetime->format('l F jS Y').'</p>' ;
					$html .= "<p><b>Time :  </b> ".date('h:i a', strtotime($value['scheduleStartTime']))." - ".date('h:i a', strtotime($value['scheduleEndTime']))."</p><br>";
					$html .="<p>".$value['trainingCourseDescription']."</p><hr>";
					$cnt ++; 
				}
				echo $html;
				break;
			case 'W':
				
			case 'P':
				$cnt = 1;
				$day_count = count($schedule_list);
				$html = "<h1>".$day_count.JText::_('COM_TRAININGS_TITLE_FULLDAYSONLY')."</h1>";
				foreach ($schedule_list as $key => $value) {
					$datetime = DateTime::createFromFormat('d-M-Y', $value['scheduleStartDate']);
					 
					$html .="<br><p><b> ".JText::_('COM_TRAININGS_TITLE_DAY').$cnt.": </b> ".$datetime->format('l F jS Y').'</p>' ;
					$html .= "<p><b>".JText::_('COM_TRAININGS_TITLE_TIME')." :</b> ".date('h:i a', strtotime($value['scheduleStartTime']))." - ".date('h:i a', strtotime($value['scheduleEndTime']))."</p><br>";
					$html .="<p>".$value['trainingCourseDescription']."</p><hr>";
					$cnt ++; 
				}
				echo $html;
				break;
			default:
				# code...
				break;
		}
		?>
	</div>

	<div id="FAQs" class="tabcontent">
		 <div class="acc-main">
		  <div class="container">
		    <div class="kind">
		      <div class="accordion_container">
		      	<?php
		        		foreach ($faqdata as $key => $value) {
					
		        	?>
		        <div class="accordion-main">
		           <div class="accordion_head"><?php echo $value['question']; ?><span class="plusminus">+</span></div>
		          <div class="accordion_body" id="a1" style="display: none;">
		            <p><?php echo $value['answer']; ?></p>
		          </div>
		        </div>
		    <?php } ?>
		       </div>
		    </div>
		  </div>
		</div>
	</div>
</div>

</div>


