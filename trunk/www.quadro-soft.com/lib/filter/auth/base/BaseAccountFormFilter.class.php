<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Account filter form base class.
 *
 * @package    quadrosoft
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAccountFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cid'                      => new sfWidgetFormFilterInput(),
      'email'                    => new sfWidgetFormFilterInput(),
      'password'                 => new sfWidgetFormFilterInput(),
      'first_name'               => new sfWidgetFormFilterInput(),
      'last_name'                => new sfWidgetFormFilterInput(),
      'coo_remember'             => new sfWidgetFormFilterInput(),
      'is_active'                => new sfWidgetFormFilterInput(),
      'is_deleted'               => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'modified_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'deleted_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'account2_credential_list' => new sfWidgetFormPropelChoice(array('model' => 'Credential', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cid'                      => new sfValidatorPass(array('required' => false)),
      'email'                    => new sfValidatorPass(array('required' => false)),
      'password'                 => new sfValidatorPass(array('required' => false)),
      'first_name'               => new sfValidatorPass(array('required' => false)),
      'last_name'                => new sfValidatorPass(array('required' => false)),
      'coo_remember'             => new sfValidatorPass(array('required' => false)),
      'is_active'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_deleted'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'modified_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'account2_credential_list' => new sfValidatorPropelChoice(array('model' => 'Credential', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('account_filters[%s]');

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

    $criteria->addJoin(Account2CredentialPeer::ACCOUNT_ID, AccountPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(Account2CredentialPeer::CREDENTIAL_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(Account2CredentialPeer::CREDENTIAL_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Account';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'cid'                      => 'Text',
      'email'                    => 'Text',
      'password'                 => 'Text',
      'first_name'               => 'Text',
      'last_name'                => 'Text',
      'coo_remember'             => 'Text',
      'is_active'                => 'Number',
      'is_deleted'               => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'modified_at'              => 'Date',
      'deleted_at'               => 'Date',
      'account2_credential_list' => 'ManyKey',
    );
  }
}
