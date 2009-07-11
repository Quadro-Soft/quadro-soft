<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Credential filter form base class.
 *
 * @package    quadrosoft
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCredentialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cid'                      => new sfWidgetFormFilterInput(),
      'title'                    => new sfWidgetFormFilterInput(),
      'description'              => new sfWidgetFormFilterInput(),
      'account2_credential_list' => new sfWidgetFormPropelChoice(array('model' => 'Account', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cid'                      => new sfValidatorPass(array('required' => false)),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'description'              => new sfValidatorPass(array('required' => false)),
      'account2_credential_list' => new sfValidatorPropelChoice(array('model' => 'Account', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('credential_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addAccount2CredentialListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(Account2CredentialPeer::CREDENTIAL_ID, CredentialPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(Account2CredentialPeer::ACCOUNT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(Account2CredentialPeer::ACCOUNT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Credential';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'cid'                      => 'Text',
      'title'                    => 'Text',
      'description'              => 'Text',
      'account2_credential_list' => 'ManyKey',
    );
  }
}
