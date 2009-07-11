<?php

/**
 * Account form base class.
 *
 * @package    quadrosoft
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAccountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'cid'                      => new sfWidgetFormInput(),
      'email'                    => new sfWidgetFormInput(),
      'password'                 => new sfWidgetFormInput(),
      'first_name'               => new sfWidgetFormInput(),
      'last_name'                => new sfWidgetFormInput(),
      'coo_remember'             => new sfWidgetFormInput(),
      'is_active'                => new sfWidgetFormInput(),
      'is_deleted'               => new sfWidgetFormInput(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'modified_at'              => new sfWidgetFormDateTime(),
      'deleted_at'               => new sfWidgetFormDateTime(),
      'account2_credential_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Credential')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Account', 'column' => 'id', 'required' => false)),
      'cid'                      => new sfValidatorString(array('max_length' => 64)),
      'email'                    => new sfValidatorString(array('max_length' => 64)),
      'password'                 => new sfValidatorString(array('max_length' => 64)),
      'first_name'               => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'last_name'                => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'coo_remember'             => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'is_active'                => new sfValidatorInteger(),
      'is_deleted'               => new sfValidatorInteger(),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
      'modified_at'              => new sfValidatorDateTime(array('required' => false)),
      'deleted_at'               => new sfValidatorDateTime(array('required' => false)),
      'account2_credential_list' => new sfValidatorPropelChoiceMany(array('model' => 'Credential', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Account', 'column' => array('cid'))),
        new sfValidatorPropelUnique(array('model' => 'Account', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['account2_credential_list']))
    {
      $values = array();
      foreach ($this->object->getAccount2Credentials() as $obj)
      {
        $values[] = $obj->getCredentialId();
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
    $c->add(Account2CredentialPeer::ACCOUNT_ID, $this->object->getPrimaryKey());
    Account2CredentialPeer::doDelete($c, $con);

    $values = $this->getValue('account2_credential_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Account2Credential();
        $obj->setAccountId($this->object->getPrimaryKey());
        $obj->setCredentialId($value);
        $obj->save();
      }
    }
  }

}
