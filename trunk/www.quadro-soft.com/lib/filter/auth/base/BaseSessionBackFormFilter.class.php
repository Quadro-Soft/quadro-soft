<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * SessionBack filter form base class.
 *
 * @package    quadrosoft
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseSessionBackFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sess_data' => new sfWidgetFormFilterInput(),
      'sess_time' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sess_data' => new sfValidatorPass(array('required' => false)),
      'sess_time' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('session_back_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SessionBack';
  }

  public function getFields()
  {
    return array(
      'sess_coo'  => 'Text',
      'sess_data' => 'Text',
      'sess_time' => 'Number',
    );
  }
}
