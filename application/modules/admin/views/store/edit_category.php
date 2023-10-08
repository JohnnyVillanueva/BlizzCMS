    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-edit"></i> <?= lang('placeholder_edit_category'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= site_url('admin/store'); ?>" class="uk-icon-button"><i class="fas fa-arrow-circle-left"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-body">
            <?= form_open('', 'id="updatecategoryForm" onsubmit="UpdateCategoryForm(event)"'); ?>
              <div class="uk-margin-small">
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= lang('placeholder_name'); ?></label>
                    <div class="uk-form-controls">
                      <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                        <input class="uk-input" type="text" id="store_category_name" value="<?= $this->admin_model->getStoreCategoryName($idlink); ?>" placeholder="<?= lang('placeholder_name'); ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label"><?= lang('table_header_realm'); ?></label>
                    <div class="uk-form-controls">
                      <select class="uk-select" id="store_category_realm">
                        <option value="0"><?= lang('notification_select_realm'); ?></option>
                        <?php foreach ($this->wowrealm->getRealms() as $MultiRealm): ?>
                        <option value="<?= $MultiRealm->realmID ?>" <?php if($this->admin_model->getStoreCategoryRealm($idlink) == $MultiRealm->realmID) echo 'selected'; ?>><?= $this->wowrealm->getRealmName($MultiRealm->realmID); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <label class="uk-form-label"><?= lang('placeholder_route'); ?></label>
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <input class="uk-input" type="text" id="store_category_route" value="<?= $this->admin_model->getStoreCategoryRoute($idlink); ?>" placeholder="<?= lang('placeholder_route'); ?>" required>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <button class="uk-button uk-button-primary uk-width-1-1" type="submit" id="button_upgroup"><i class="fas fa-sync-alt"></i> <?= lang('button_save'); ?></button>
              </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </section>

    <script>
      function UpdateCategoryForm(e) {
        e.preventDefault();

        var id = "<?= $idlink ?>";
        var name = $.trim($('#store_category_name').val());
        var realm = $.trim($('#store_category_realm').val());
        var route = $.trim($('#store_category_route').val());
        if(name == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= lang('notification_title_error'); ?>',
              message: '<?= lang('notification_name_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        if(realm == 0){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= lang('notification_title_error'); ?>',
              message: '<?= lang('notification_select_realm'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        $.ajax({
          url:"<?= site_url('admin/store/category/update'); ?>",
          method:"POST",
          data:{id, name, route, realm},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= lang('notification_title_info'); ?>',
                message: '<?= lang('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response == 'Rouerr') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= lang('notification_title_error'); ?>',
                  message: '<?= lang('notification_route_inuse'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              return false;
            }

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= lang('notification_title_success'); ?>',
                  message: '<?= lang('notification_category_edited'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#updatecategoryForm')[0].reset();
            window.location.replace("<?= site_url('admin/store/category/edit/'.$idlink); ?>");
          }
        });
      }
    </script>
