<?php

/**
 * Page form base class.
 *
 * @package    quadrosoft
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'parent_id'        => new sfWidgetFormPropelChoice(array('model' => 'Page', 'add_empty' => true)),
      'pos'              => new sfWidgetFormInput(),
      'is_active'        => new sfWidgetFormInput(),
      'uri'              => new sfWidgetFormInput(),
      'title'            => new sfWidgetFormInput(),
      'meta_keywords'    => new sfWidgetFormTextarea(),
      'meta_description' => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'parent_id'        => new sfValidatorPropelChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'pos'              => new sfValidatorInteger(),
      'is_active'        => new sfValidatorInteger(),
      'uri'              => new sfValidatorString(array('max_length' => 64)),
      'title'            => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'meta_keywords'    => new sfValidatorString(array('required' => false)),
      'meta_description' => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Page', 'column' => array('uri')))
    );

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }


}
