<?php 

class ModTrainingHelper
{
    /**
     * 
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
  
    public static function getTrainingList($params)
    {
        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        $query = $db->getQuery(true)
                    ->select($db->quoteName('*'))
                    ->from($db->quoteName('#__trainings_list'));
                   // ->where('lang = ' . $db->Quote('en-GB'));
        
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        if(!empty($result)){
            
            foreach ($result as $key => $item) {
                $item->url = JRoute::_('index.php?option=com_trainings&view=list&id='.$item->id);
                $item->trainingrequesturl = JRoute::_('index.php/training-request');
            }   
        }
         return $result;
       
    }
}