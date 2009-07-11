<?php

/**
 * SessionFront form base class.
 *
 * @package    quadrosoft
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSessionFrontForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sess_coo'  => new sfWidgetFormInputHidden(),
      'sess_data' => new sfWidgetFormTextarea(),
      'sess_time' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'sess_coo'  => new sfValidatorPropelChoice(array('model' => 'SessionFront', 'column' => 'sess_coo', 'required' => false)),
      'sess_data' => new sfValidatorString(),
      'sess_time' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('session_front[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SessionFront';
  }


}
