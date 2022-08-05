<?php
/**
 * Job edit form
 *
 * @author Fabrizio Branca
 * @since 2014-08-09
 */
class Magentotutorial_Complexworld_Block_Adminhtml_Index_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function getPost()
    {
        return Mage::registry('current_post_instance');
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $post = $this->getPost();
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getData('action'),
            'method' => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => $this->__('General')));
        $this->_addElementTypes($fieldset);

        $fieldset->addField(
            'title',
            'text',
            array(
                'name' => 'title',
                'label' => $this->__('Title'),
                'title'    => $this->__('Title'),
                'class' => '',
                'required' => true,
                'disabled' => false,
            )
        );

        $fieldset->addField(
            'content',
            'textarea',
            array(
                'name'               => 'content',
                'label'              => $this->__('Content'),
                'title'              => $this->__('Content'),
                'class'              => '',
                'required'           => true,
            )
        );

        $form->addValues($this->getPost()->getData());

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
