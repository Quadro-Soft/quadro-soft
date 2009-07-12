<?php

/**
 * ContactRequest form base class.
 *
 * @package    quadrosoft
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContactRequestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'sess_coo'   => new sfWidgetFormPropelChoice(array('model' => 'SessionFront', 'add_empty' => true)),
      'name'       => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'company'    => new sfWidgetFormInput(),
      'phone'      => new sfWidgetFormInput(),
      'message'    => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'ContactRequest', 'column' => 'id', 'required' => false)),
      'sess_coo'   => new sfValidatorPropelChoice(array('model' => 'SessionFront', 'column' => 'sess_coo', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'company'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'phone'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'message'    => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactRequest';
  }


}
