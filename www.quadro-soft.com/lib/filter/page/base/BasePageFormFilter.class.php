<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Page filter form base class.
 *
 * @package    quadrosoft
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id'        => new sfWidgetFormPropelChoice(array('model' => 'Page', 'add_empty' => true)),
      'pos'              => new sfWidgetFormFilterInput(),
      'is_active'        => new sfWidgetFormFilterInput(),
      'uri'              => new sfWidgetFormFilterInput(),
      'title'            => new sfWidgetFormFilterInput(),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
      'meta_description' => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'parent_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Page', 'column' => 'id')),
      'pos'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_active'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'uri'              => new sfValidatorPass(array('required' => false)),
      'title'            => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'parent_id'        => 'ForeignKey',
      'pos'              => 'Number',
      'is_active'        => 'Number',
      'uri'              => 'Text',
      'title'            => 'Text',
      'meta_keywords'    => 'Text',
      'meta_description' => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
