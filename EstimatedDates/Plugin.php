<?php

namespace Kanboard\Plugin\EstimatedDates;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Model\TaskModel;
use PicoDb\Table;

class Plugin extends Base
{
    public function initialize()
    {
        $this->hook->on('model:task:creation:prepare', array($this, 'beforeSave'));
        $this->hook->on('model:task:modification:prepare', array($this, 'beforeSave'));

        $this->template->hook->attach('template:task:form:third-column', 'EstimatedDates:task_creation/form');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function beforeSave(array &$values)
    {
        $values = $this->dateParser->convert($values, array('date_estimated_start'));
        $this->helper->model->resetFields($values, array('date_estimated_start'));
        $values = $this->dateParser->convert($values, array('date_actual_due'));
        $this->helper->model->resetFields($values, array('date_actual_due'));
    }

    public function getPluginName()
    {
        return 'EstimatedDates';
    }

    public function getPluginDescription()
    {
        return t('Add two fields that works as Estimated Start Date and Actual Finish Date for tasks');
    }

    public function getPluginAuthor()
    {
        return 'Esteban Monge';
    }

    public function getPluginVersion()
    {
        return '0.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/EstebanMonge/kanboard_estimated_dates';
    }
}
