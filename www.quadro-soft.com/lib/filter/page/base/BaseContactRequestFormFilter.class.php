<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ContactRequest filter form base class.
 *
 * @package    quadrosoft
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContactRequestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sess_coo'   => new sfWidgetFormPropelChoice(array('model' => 'SessionFront', 'add_empty' => true)),
      'name'       => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
      'company'    => new sfWidgetFormFilterInput(),
      'phone'      => new sfWidgetFormFilterInput(),
      'message'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'sess_coo'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SessionFront', 'column' => 'sess_coo')),
      'name'       => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'company'    => new sfValidatorPass(array('required' => false)),
      'phone'      => new sfValidatorPass(array('required' => false)),
      'message'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('contact_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactRequest';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'sess_coo'   => 'ForeignKey',
      'name'       => 'Text',
      'email'      => 'Text',
      'company'    => 'Text',
      'phone'      => 'Text',
      'message'    => 'Text',
      'created_at' => 'Date',
    );
  }
}
