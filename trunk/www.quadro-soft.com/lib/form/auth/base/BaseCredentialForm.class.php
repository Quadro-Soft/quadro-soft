<?php

/**
 * Credential form base class.
 *
 * @package    quadrosoft
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCredentialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'cid'                      => new sfWidgetFormInput(),
      'title'                    => new sfWidgetFormInput(),
      'description'              => new sfWidgetFormTextarea(),
      'account2_credential_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Account')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Credential', 'column' => 'id', 'required' => false)),
      'cid'                      => new sfValidatorString(array('max_length' => 32)),
      'title'                    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'description'              => new sfValidatorString(array('required' => false)),
      'account2_credential_list' => new sfValidatorPropelChoiceMany(array('model' => 'Account', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Credential', 'column' => array('cid')))
    );

    $this->widgetSchema->setNameFormat('credential[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Credential';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['account2_credential_list']))
    {
      $values = array();
      foreach ($this->object->getAccount2Credentials() as $obj)
      {
        $values[] = $obj->getAccountId();
      }

      $this->setDefault('account2_credential_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveAccount2CredentialList($con);
  }

  public function saveAccount2CredentialList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['account2_credential_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(Account2CredentialPeer::CREDENTIAL_ID, $this->object->getPrimaryKey());
    Account2CredentialPeer::doDelete($c, $con);

    $values = $this->getValue('account2_credential_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Account2Credential();
        $obj->setCredentialId($this->object->getPrimaryKey());
        $obj->setAccountId($value);
        $obj->save();
      }
    }
  }

}
