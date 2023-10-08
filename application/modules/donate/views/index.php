<?php
if (isset($_POST['button_donate'])):
  $this->donate_model->getDonate($_POST['button_donate']);
endif; ?>

    <section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
      <div class="uk-background-cover uk-height-small header-section"></div>
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-4@m">
            <ul class="uk-nav uk-nav-default myaccount-nav">
				<?php if($this->wowmodule->getStatusModule('User Panel')): ?>
				<li><a href="<?= site_url('panel'); ?>"><i class="fas fa-user-circle"></i> <?= lang('tab_account'); ?></a></li>
				<?php endif; ?>
				<li class="uk-nav-divider"></li>
				<?php if($this->wowmodule->getStatusModule('Donation') == '1'): ?>
				<li class="uk-active"><a href="<?= site_url('donate'); ?>"><i class="fas fa-hand-holding-usd"></i> <?= lang('navbar_donate_panel'); ?></a></li>
				<?php endif; ?>
				<?php if($this->wowmodule->getStatusModule('Vote') == '1'): ?>
				<li><a href="<?= site_url('vote'); ?>"><i class="fas fa-vote-yea"></i> <?= lang('navbar_vote_panel'); ?></a></li>
				<?php endif; ?>
				<?php if($this->wowmodule->getStatusModule('Store') == '1'): ?>
				<li><a href="<?= site_url('store'); ?>"><i class="fas fa-store"></i> <?= lang('tab_store'); ?></a></li>
				<?php endif; ?>
				<li class="uk-nav-divider"></li>
				<?php if($this->wowmodule->getStatusModule('Bugtracker') == '1'): ?>
				<li><a href="<?= site_url('bugtracker'); ?>"><i class="fas fa-bug"></i> <?= lang('tab_bugtracker'); ?></a></li>
				<?php endif; ?>
				<?php if($this->wowmodule->getStatusModule('Changelogs') == '1'): ?>
				<li><a href="<?= site_url('changelogs'); ?>"><i class="fas fa-scroll"></i> <?= lang('tab_changelogs'); ?></a></li>
				<?php endif; ?>
				<?php if($this->wowmodule->getStatusModule('Download') == '1'): ?>
				<li><a href="<?= site_url('download'); ?>"><i class="fas fa-download"></i> <?= lang('tab_download'); ?></a></li>
				<?php endif; ?>
            </ul>
          </div>
          <div class="uk-width-3-4@m">
            <h4 class="uk-h4 uk-text-uppercase uk-text-bold"><?= lang('tab_donate'); ?></h4>
            <?php if($this->session->flashdata('donation_status') == 'success'): ?>
            <div class="uk-alert-success" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><span class="uk-text-bold"><i class="far fa-check-circle"></i> <span class="uk-text-bold"><?= lang('notification_title_success'); ?>:</span> <?= lang('notification_donation_successful'); ?></p>
            </div>
            <?php elseif($this->session->flashdata('donation_status') == 'canceled'): ?>
            <div class="uk-alert-warning" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><span class="uk-text-bold"><i class="fas fa-exclamation-circle"></i> <?= lang('notification_title_warning'); ?>:</span> <?= lang('notification_donation_canceled'); ?></p>
            </div>
            <?php elseif($this->session->flashdata('donation_status') == 'error'): ?>
            <div class="uk-alert-danger" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><span class="uk-text-bold"><i class="far fa-times-circle"></i> <?= lang('notification_title_error'); ?>:</span> <?= lang('notification_donation_error'); ?></p>
            </div>
            <?php endif; ?>
            <div class="uk-grid-small uk-grid-match uk-child-width-1-1 uk-child-width-1-3@s uk-flex-center" uk-grid>
              <?php foreach($this->donate_model->getDonations()->result() as $donateList): ?>
              <div>
                <div class="uk-transition-toggle" tabindex="0">
                  <div class="uk-card uk-card-body uk-card-donate uk-text-center uk-transition-scale-up uk-transition-opaque">
                    <i class="fab fa-paypal fa-3x"></i>
                    <h2 class="uk-margin-small uk-text-bold"><?= $donateList->name ?><br>
                      <sup><?= config_item('paypal_currency_symbol'); ?></sup><?= $donateList->price ?>
                    </h2>
                    <h5 class="uk-margin-small"><span uk-icon="icon: plus-circle"></span> <?= lang('donate_get'); ?> <span class="uk-text-bold"><?= $donateList->points ?></span> <?= lang('panel_dp'); ?>
                    </h5>
                    <form action="" method="post" accept-charset="utf-8">
                      <div class="uk-margin">
                        <button class="uk-button uk-button-secondary" type="submit" value="<?= $donateList->id ?>" name="button_donate"><i class="fas fa-donate"></i> <?= lang('button_donate'); ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
