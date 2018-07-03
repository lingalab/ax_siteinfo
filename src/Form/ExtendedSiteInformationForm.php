<?php

namespace Drupal\ax_siteinfo\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;

class ExtendedSiteInformationForm extends SiteInformationForm {

   /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  
    //Load parent form fields  
    $form = parent::buildForm($form, $form_state);
	
	//Get siteapi 
	$site_config = \Drupal::config('ax_siteinfo.settings')->get('siteapikey');
	
	$form['siteapikey'] = array(
	  '#type' => 'textfield',
	  '#title' => $this
		->t('Site API Key'),
	  '#default_value' => $site_config,	
	  '#placeholder' => "Please enter API key",
	  '#size' => 60,
	  '#maxlength' => 128,
	);
	
    //Change form submit button text to 'Update Configuration'
    $form['actions']['submit']['#value'] = t('Update configuration');

	return $form;

}

 public function submitForm(array &$form, FormStateInterface $form_state) {
    /*
     * Call parent form submit 
     */
    parent::submitForm($form, $form_state);
	
	//update siteapi 
    $siteapikey = $form_state->getValue('siteapikey');
    $config = \Drupal::configFactory()->getEditable('ax_siteinfo.settings');
    $config->set('siteapikey', ($siteapikey)?$siteapikey:'');
    $config->save();
	
	//custom message display
    $this->messenger()->addMessage($this->t('The Site API Key has been saved with %siteapikey.', ['%siteapikey' => $siteapikey]));
	
  }
  
}