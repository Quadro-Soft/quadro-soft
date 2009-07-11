<?php

/**
 * Account2Credential form base class.
 *
 * @package    quadrosoft
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAccount2CredentialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'account_id'    => new sfWidgetFormInputHidden(),
      'credential_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'account_id'    => new sfValidatorPropelChoice(array('model' => 'Account', 'column' => 'id', 'required' => false)),
      'credential_id' => new sfValidatorPropelChoice(array('model' => 'Credential', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('account2_credential[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account2Credential';
  }


}
