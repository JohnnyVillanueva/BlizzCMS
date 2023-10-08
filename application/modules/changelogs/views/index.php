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
				<li><a href="<?= site_url('donate'); ?>"><i class="fas fa-hand-holding-usd"></i> <?= lang('navbar_donate_panel'); ?></a></li>
				<?php endif; ?>
				<?php if($this->wowmodule->getStatusModule('Vote') == '1'): ?>
				<li><a href="<?= site_url('vote'); ?>"><i class="fas fa-vote-yea"></i> <?= lang('navbar_vote_panel'); ?></a></li>
				<?php endif; ?>
				<?php if($this->wowmodule->getStatusModule('Store') == '1'): ?>
				<li><a href="<?= site_url('store'); ?>"><i class="fas fa-store"></i> <?= lang('tab_store'); ?></a></li>
				<?php endif; ?>
				<li class="uk-nav-divider"></li>
				<?php if($this->wowmodule->getStatusModule('Bugtracker') == '1'): ?>
				<li class="uk-active"><a href="<?= site_url('bugtracker'); ?>"><i class="fas fa-bug"></i> <?= lang('tab_bugtracker'); ?></a></li>
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
            <h4 class="uk-h4 uk-text-uppercase uk-text-bold"><?= lang('tab_changelogs'); ?></h4>
            <?php if($this->changelogs_model->getAll()->num_rows()): ?>
            <div class="uk-grid uk-grid-small uk-child-width-1-1" data-uk-grid>
              <?php foreach($this->changelogs_model->getChangelogs()->result() as $changelogsList): ?>
              <div>
                <div class="uk-card uk-card-default uk-margin-small">
                  <div class="uk-card-header">
                    <div class="uk-grid uk-grid-small" data-uk-grid>
                      <div class="uk-width-expand@s">
                        <h5 class="uk-h5 uk-text-bold"><i class="fas fa-file-alt"></i> <?= $changelogsList->title ?></h5>
                      </div>
                      <div class="uk-width-auto@s">
                        <p class="uk-text-small"><i class="far fa-clock"></i> <?= date('F j, Y, h:i a', $changelogsList->date); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="uk-card-body">
                    <?= $changelogsList->description ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="uk-alert-warning" uk-alert>
              <p class="uk-text-center"><i class="fas fa-exclamation-triangle"></i> <?= lang('alert_changelog_not_found'); ?></p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
