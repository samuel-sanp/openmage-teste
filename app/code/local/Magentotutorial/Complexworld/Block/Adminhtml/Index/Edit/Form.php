<?php
/**
 * Job edit form
 *
 * @author Fabrizio Branca
 * @since 2014-08-09
 */
class Magentotutorial_Complexworld_Block_Adminhtml_Index_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getData('action'),
            'method' => 'post'
        ));
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
